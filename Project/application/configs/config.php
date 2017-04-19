<?php

$config = array(
    "db"=>array(
        "dbName" => "mydb",
        "username" => "root",
        "password" => "root",
        "host" => "localhost"
    )
);

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath('../application/library'));