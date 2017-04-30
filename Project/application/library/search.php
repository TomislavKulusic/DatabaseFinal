<?php
include_once("../configs/config.php");
include_once("TheDatabase.php");

if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];

    $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);

    if ($database->connect()) {

        $result = $database->getData("SELECT movie_title FROM mydb.movies WHERE movie_title LIKE ?;", array("%$query%"));

        echo json_encode($result);

        $database->close();
    }
}

//