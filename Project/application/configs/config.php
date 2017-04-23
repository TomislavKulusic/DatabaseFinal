<?php

$config = array(
    "db" => array(
        "dbName" => "mydb",
        "username" => "root",
        "password" => "root",
        "host" => "localhost"
    )
);

defined("LIBRARY_PATH")
or define("LIBRARY_PATH", '../application/library/');

defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", '../application/templates/');

defined("PAGES_PATH")
or define("PAGES_PATH", '../application/pages/');

ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/data/session'));