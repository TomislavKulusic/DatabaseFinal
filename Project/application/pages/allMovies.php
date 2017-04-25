<?php

include('../application/configs/config.php');

include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Movie.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$database->connect();

$classValues = array("", "", "", "", "", $database);

$result = $database->getDataClass("SELECT * FROM movies;", null, "Movie", $classValues);

$database->close();

include (TEMPLATES_PATH . "navigation.php");

?>

<main class="mdl-layout__content">
    <h3>All Movies</h3>
    <div class="mdl-grid">
<?php

foreach ($result as $movie)
    $movie->printMovie();

?>
    </div>

</main>
</div>
