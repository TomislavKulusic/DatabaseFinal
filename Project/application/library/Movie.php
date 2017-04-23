<?php

include_once('InterfaceClass.php');

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 10:33 PM
 */
class Movie implements InterfaceClass
{

    private $movie_id;
    private $movie_title;
    private $movie_description;
    private $category_id;
    private $release_date;

    private $rental_date;
    private $due_date;
    private $returned;

    private $database;

    private $categories;
    private $reviews;
    private $actors;
    private $directors;

    /**
     * Movies constructor.
     * @param $movie_id
     * @param $movie_title
     * @param $movie_description
     * @param $category_id
     * @param $release_date
     * @param $database
     */
    public function __construct($movie_id, $movie_title, $movie_description, $category_id, $release_date, $database)
    {
        $this->movie_id = $movie_id;
        $this->movie_title = $movie_title;
        $this->movie_description = $movie_description;
        $this->category_id = $category_id;
        $this->release_date = $release_date;
        $this->database = $database;
    }

    public function fetch($id)
    {
        global $database;

        if ($id = '')
            $id = $this->movie_id;

        $query = "SELECT * FROM Movies WHERE movie_id = ?;";

        $result = $database->getData($query, array($id))[0];

        $this->movie_id = $result['movie_id'];
        $this->movie_title = $result['movie_title'];
        $this->movie_description = $result['movie_movie_description'];
        $this->category_id = $result['category_id'];
        $this->release_date = $result['release_date'];
    }

    public function put()
    {
        global $database;

        $query = "UPDATE movies SET movie_title = ?, movie_description = ?, release_date = ? WHERE movie_id = ?;";

        $database->setData($query, array($this->movie_title, $this->movie_description, $this->category_id,
            $this->release_date, $this->movie_id));
    }

    public function post()
    {
        global $database;

        $query = "INSERT INTO movies (movie_id, movie_title, movie_description, category_id, release_date) VALUE (?, ?, ?, ?, ?);";

        $database->setData($query, array($this->movie_id, $this->movie_title, $this->movie_description, $this->category_id,
            $this->release_date));
    }

    public function delete()
    {
        global $database;

        $query = "DELETE FROM movies WHERE movie_id = ?;";

        $database->setData($query, array($this->movie_id));
    }

    public function setCategories()
    {
        global $database;

        $query = "SELECT * FROM Category WHERE category_id = ?;";

        $this->categories = $database->getData($query, array($this->category_id));
    }

    public function setActors()
    {
        global $database;

        $query = "SELECT * FROM Movie_Actors LEFT JOIN actors ON movie_actors.actor_id = actors.actor_id WHERE movie_actors.movie_id = ?;";

        $array = array("", "", "", $database);

        $this->actors = $database->getDataClass($query, array($this->movie_id), 'Actor', $array);
    }

    public function setReviews()
    {
        global $database;

        $query = "SELECT * FROM reviews WHERE movie_id = ?;";

        $array = array("", "", "", "", $database);

        $this->reviews = $database->getDataClass($query, array($this->movie_id), 'Review', $array);
    }

    public function setDirectors()
    {
        global $database;

        $queary = "SELECT * FROM movie_directors LEFT JOIN directors ON movie_directors.director_id = directors.director_id WHERE movie_id = ?;";

        $array = array("", "", "", $database);

        $this->directors = $database->getDataClass($queary, array($this->movie_id), 'Director', $array);
    }

    public function setAll()
    {
        $this->setActors();
        $this->setCategories();
        $this->setReviews();
        $this->setDirectors();
    }

    /**
     * @return mixed
     */
    public function getMovieID()
    {
        return $this->movie_id;
    }

    /**
     * @param mixed $movie_id
     */
    public function setMovieID($movie_id)
    {
        $this->movie_id = $movie_id;
    }

    /**
     * @return mixed
     */
    public function getMovieTitle()
    {
        return $this->movie_title;
    }

    /**
     * @param mixed $movie_title
     */
    public function setMovieTitle($movie_title)
    {
        $this->movie_title = $movie_title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->movie_description;
    }

    /**
     * @param mixed $movie_description
     */
    public function setDescription($movie_description)
    {
        $this->movie_description = $movie_description;
    }

    /**
     * @return mixed
     */
    public function getCategoryID()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryID($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * @param mixed $release_date
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }

    /**
     * @return mixed
     */
    public function getRentalDate()
    {
        return $this->rental_date;
    }

    /**
     * @param mixed $rental_date
     */
    public function setRentalDate($rental_date)
    {
        $this->rental_date = $rental_date;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param mixed $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
    }

    /**
     * @return mixed
     */
    public function getReturned()
    {
        return $this->returned;
    }

    /**
     * @param mixed $returned
     */
    public function setReturned($returned)
    {
        $this->returned = $returned;
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


}