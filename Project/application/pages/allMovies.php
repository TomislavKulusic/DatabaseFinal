<?php

include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Movies.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$allMovies = "";

if ($database->connect()) {

    $allMovies = new Movies($database);

    $allMovies->setAllMovies();

    $database->close();
}

include(TEMPLATES_PATH . "navigation.php");

?>

<main class="mdl-layout__content">
    <h3>All Movies</h3>
    <div class="mdl-grid">
        <?php

        $allMovies->printAllMovies();

        ?>
    </div>
    <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
</main>
</div>
