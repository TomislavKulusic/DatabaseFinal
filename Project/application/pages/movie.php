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

    $movie = new Movie("", $movieTitle, "", "", "", $database);

    $movie->fetchN("");

    $database->close();
}

include(TEMPLATES_PATH . "navigation.php");

$path = "background: url('img/movie-images/" . preg_replace("/[^ \w]+/", "", $movieTitle);

?>

<main class="mdl-layout__content">
    <div class="mdl-grid movie">
        <div class="mdl-cell--4-col texts">
            <h1><?php echo $movieTitle; ?></h1>
            <p><?php echo $movie->getDescription();?></p>
        </div>
        <div style="<?php echo $path ?>/cover/image-cover.jpg') center / cover;"
             class="banner mdl-card mdl-shadow--6dp mdl-cell--4-col"></div>
    </div>
    <div class="mdl-grid movie">
        <div class="mdl-card mdl-cell--4-col mdl-shadow--4dp imgM" style="<?php echo $path ?>/image-1.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--4-col mdl-shadow--4dp imgM" style="<?php echo $path ?>/image-2.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--4-col mdl-shadow--4dp imgM" style="<?php echo $path ?>/image-3.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--4-col mdl-shadow--4dp imgM" style="<?php echo $path ?>/image-4.jpg') center / cover;"></div>
    </div>
</main>
</div>

