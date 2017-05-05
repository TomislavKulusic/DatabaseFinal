<?php
include_once(LIBRARY_PATH . "Renter.php");
include_once(LIBRARY_PATH . "Movie.php");

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 1. 5. 2017.
 * Time: 08:40 PM
 */
class Movies
{
    private $database;
    private $allMovies;
    private $rentedMovies;
    private $movie;
    private $rented;
    private $user;

    /**
     * Movies constructor.
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function setAllMovies()
    {
        global $database;

        $classValues = array("", "", "", "", "", "", $database);

        $result = $database->getDataClass("SELECT * FROM movies;", null, "Movie", $classValues);

        foreach ($result as $movie)
            $movie->setCategories();

        $this->allMovies = $result;
    }

    public function printAllMovies()
    {
        $movies = $this->allMovies;

        foreach ($movies as $movie)
            $movie->printMovie("all");
    }

    public function setRentedMovies()
    {
        global $database;

        $renter = new Renter("", getDecodedData()->data->username, "", "", "", "", $database);

        $renter->fetchU("");

        $renter->setRentedMovies(false);

        $movies = $renter->getRentedMovies();

        foreach ($movies as $movie)
            $movie->setCategories();

        $this->rentedMovies = $movies;
    }

    public function printRentedMovies()
    {
        $movies = $this->rentedMovies;

        foreach ($movies as $movie)
            $movie->printMovie("ren");
    }

    public function hasRented($username)
    {
        global $database;

        $user = new Renter("", $username, "", "", "", "", $database);
        $user->fetchU(null);
        $user->setRentedMovies(false);

        $this->rented = $user->hasMovie($_GET['name']);
    }

    public function setMovie($movieTitle)
    {
        global $database;

        $movie = new Movie("", $movieTitle, "", "", "", "", $database);
        $movie->fetchN(null);
        $movie->setAll();

        $this->movie = $movie;
    }

    public function printDirectors()
    {
        $movie = $this->movie;

        foreach ($movie->getDirectors() as $director)
            echo $director->getFullName() . "<br>";
    }

    public function printActors()
    {
        $movie = $this->movie;

        foreach ($movie->getActors() as $actor)
            echo $actor->getFullName() . "<br>";
    }

    public function printCategories()
    {
        $movie = $this->movie;

        echo $movie->getCategory()[0]->getCategoryName();
    }

    public function printDate()
    {
        $movie = $this->movie;

        $date = new DateTime($movie->getReleaseDate());
        echo $date->format('d. F Y.');
    }

    public function rentOrWatch($name)
    {
        if ($this->rented)
            echo '<button id="show-dialog" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-shadow--6dp">' .
                'Watch' .
                '</button>';
        else
            echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-shadow--6dp" onclick="addToCart(\'' . $name . '\')">' .
                'Rent' .
                '</button>';
    }

    public function printReviews()
    {
        $reviews = $this->movie->getReviews();

        foreach ($reviews as $review) {
            echo "<b>Rating:</b> " . $review->getRating() . " <b>Comment:</b> " . $review->getReview() . "<br>";
            if ($review !== end($reviews))
                echo '<hr>';
        }
    }

    public function getMovie()
    {
        return $this->movie;
    }

    public function printMovieVideo()
    {
        if ($this->rented)
            echo "<dialog class=\"mdl-dialog\">
    <h4 class=\"mdl-dialog__title\">" . $_GET['name'] . "</h4>
    <div class=\"mdl-dialog__content\">
    <iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/" . $this->movie->getMovieLink() . "\" frameborder=\"0\" allowfullscreen></iframe>
    </div>
    <div class=\"mdl-dialog__actions mdl-dialog__actions--full-width\">
      <button type=\"button\" class=\"mdl-button close\">Close</button>
    </div>
  </dialog>
      <script>
        var dialog = document.querySelector('dialog');
        var showDialogButton = document.querySelector('#show-dialog');
        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function() {
            dialog.close();
        });
    </script>";
    }

    public function rentMovie($movieTitle, $renterID)
    {
        global $database;

        $movie = new Movie("", $movieTitle, "", "", "", "", $database);

        $movie->fetchN(null);

        $date = date("Y-m-d");

        $movie->setRentalDate($date);

        $movie->setDueDate(date("Y-m-d", strtotime("$date +7 day")));

        $movie->postMR($renterID);
    }

    /**
     * @return mixed
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param mixed $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * @return mixed
     */
    public function getRentedMovies()
    {
        return $this->rentedMovies;
    }


    public function deleteExpiredMovies()
    {
        $movies = $this->rentedMovies;

        $format = "Y-m-d";

        $deleted = false;

        foreach ($movies as $movie) {
            $dueDate = $movie->getDueDate();
            $todayDate = date($format);

            if ($todayDate < $dueDate) {
                //echo "There is still time!"; //Test
            } else {
                $movie->removeRented();
                $deleted = true;
            }
        }

        if ($deleted)
            $this->setRentedMovies();
    }

    public function deleteExpiredMovie($id)
    {
        if ($this->rented) {
            $movie = $this->movie;

            $format = "Y-m-d";

            $movie->setDueDateID($movie->getMovieID(), $id);

            $dueDate = $movie->getDueDate();
            $todayDate = date($format);

            if ($todayDate < $dueDate) {
                //echo "There is still time!"; //Test
            } else {
                $movie->removeRented();
                $this->rented = false;
            }
        }
    }

}