<?php

include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Renter.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

if ($database->connect()) {
    $renter = new Renter("", getDecodedData()->data->username, "", "", "", "", $database);

    $renter->fetchU("");

    $renter->setRentedMovies(false);

    $movies = $renter->getRentedMovies();

    $classValues = array("", "", "", "", "", $database);

    $result = $database->getDataClass("SELECT * FROM movies;", null, "Movie", $classValues);

    $database->close();
}

include(TEMPLATES_PATH . "navigation.php");

?>

<main class="mdl-layout__content">
    <h3>All Movies</h3>
    <div class="mdl-grid">
        <?php

        foreach ($result as $movie)
            $movie->printMovie("all");

        ?>
    </div>
    <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
</main>
</div>
