<?php

include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Renter.php");

$movieTitle = "";

if (isset($_GET['name']))
    $movieTitle = $_GET['name'];

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);


$rented = false;
$movie = "";

if ($database->connect()) {
    $user = new Renter("", getDecodedData()->data->username, "", "", "", "", $database);

    $user->fetchU(null);

    $user->setRentedMovies(false);

    $rented = $user->hasMovie($_GET['name']);

    $movie = new Movie("", $movieTitle, "", "", "", "", $database);

    $movie->fetchN(null);

    $movie->setAll();

    $database->close();
}

include(TEMPLATES_PATH . "navigation.php");

$path = "background: url('img/movie-images/" . preg_replace("/[^ \w]+/", "", $movieTitle);

?>


<main class="mdl-layout__content">
    <div class="mdl-grid movie">
        <div class="mdl-cell--8-col texts">
            <div class="flex">
                <div class="test">
                    <h1><?php echo $movieTitle; ?></h1>
                    <p><?php echo $movie->getDescription(); ?></p>
                </div>
                <div style="<?php echo $path ?>/cover/image-cover.jpg') center / cover;"
                     class="mdl-card banner mdl-shadow--6dp mdl-cell--4-col"></div>
            </div>
        </div>
        <div class="mdl-cell--8-col texts">
            <div class="flex">
                <div>
                    <h5>Directors</h5>
                    <?php
                    foreach ($movie->getDirectors() as $director)
                        echo $director->getFullName() . "<br>";
                    ?>
                    <h5>Actors</h5>
                    <?php
                    foreach ($movie->getActors() as $actor)
                        echo $actor->getFullName() . "<br>";
                    ?>
                    <h5>Category</h5>
                    <?php
                    echo $movie->getCategory()[0]->getCategoryName();
                    ?>
                    <h5>Reviews</h5>
                    <?php
                    foreach ($movie->getReviews() as $review)
                        echo $review->getReview() . "<br>";
                    ?>


                </div>
                <div class="buttons flex column">
                    <?php
                    if ($rented)
                        echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">' .
                            'Watch' .
                            '</button>';
                    else
                        echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">' .
                            'Rent' .
                            '</button>';
                    ?>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Watch Later
                    </button>
                </div>
            </div>
        </div>
        <div class="mdl-card mdl-cell--4-col mdl-shadow--4dp imgM"
             style="<?php echo $path ?>/image-1.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--6-col mdl-shadow--4dp imgM"
             style="<?php echo $path ?>/image-2.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--6-col mdl-shadow--4dp imgM"
             style="<?php echo $path ?>/image-3.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--4-col mdl-shadow--4dp imgM"
             style="<?php echo $path ?>/image-4.jpg') center / cover;"></div>


        <form action="#">
            <div class="mdl-textfield mdl-js-textfield">
                <input id="movieId" style="display:none" value="<?php echo $movie->getMovieID(); ?>">
                <input id="rating">
                <textarea id="reviewText" class="mdl-textfieldinput" type="text" rows= "3" id="sample5" ></textarea>
                <label class="mdl-textfieldlabel" for="sample5">Text lines...</label>
            </div>
        </form>

        <button type="button" id="addReview"> Post a review </button>

    </div>
    <script type="text/javascript" src="../public/js/addReview.js"></script>
</main>
</div>

