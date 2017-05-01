<?php

include_once (LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Movies.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$rentedMovies = "";

if ($database->connect()) {
    $rentedMovies = new Movies($database);

    $rentedMovies->setRentedMovies();

    $database->close();
}

include(TEMPLATES_PATH . 'navigation.php');
?>

<main class="mdl-layout__content">
    <h3>Rented Movies</h3>
    <div class="mdl-grid">
        <?php

        $rentedMovies->printRentedMovies();

        ?>
    </div>
</main>
</div>