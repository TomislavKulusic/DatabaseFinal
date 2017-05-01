<?php

include_once (LIBRARY_PATH . "Renter.php");
include_once (LIBRARY_PATH . "TheDatabase.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$movies;

if ($database->connect()) {
    $renter = new Renter("", getDecodedData()->data->username, "", "", "", "", $database);

    $renter->fetchU("");

    $renter->setRentedMovies(false);

    $movies = $renter->getRentedMovies();

    foreach ($movies as $movie)
        $movie->setCategories();

    $database->close();
}

include(TEMPLATES_PATH . 'navigation.php');
?>

<main class="mdl-layout__content">
    <h3>Rented Movies</h3>
    <div class="mdl-grid">
<!--        <div class="mdl-cell mdl-cell--4-col demo-card-image mdl-card mdl-shadow--4dp">
            <div class="vignette"></div>
            <div class="mdl-card__title mdl-card--expand"></div>
            <div class="mdl-card__actions">
                <span class="demo-card-image__filename">Wings</span>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col demo-card-image mdl-card mdl-shadow--4dp">
            <div class="vignette"></div>
            <div class="mdl-card__title mdl-card--expand"></div>
            <div class="mdl-card__actions">
                <span class="demo-card-image__filename">Cimarron</span>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col demo-card-image mdl-card mdl-shadow--4dp">
            <div class="vignette"></div>
            <div class="mdl-card__title mdl-card--expand"></div>
            <div class="mdl-card__actions">
                <span class="demo-card-image__filename">It Happened One Night</span>
            </div>
        </div>-->
        <?php

        foreach ($movies as $movie)
            $movie->printMovie("ren");

        ?>
    </div>
</main>
</div>