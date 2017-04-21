<?php
/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 04:53 PM
 */

include('../application/configs/config.php');

include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Renter.php");
include_once(LIBRARY_PATH . "User.php");

$page = "Test";
$path = "../";

include(TEMPLATES_PATH . "header.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);

if ($database->connect()) {
    echo "Connected<br><br>";

    /*    $renter = new Renter('1', '', '', '', '', $database);

        $renter->fetch();

        $renter->setRentedMovies(true);

        print_r($renter->getRentedMovies());

        $user = new User("Pero", "Peric", "", "", $database);

        if ($user->login())
            echo "Ok";
        else
            echo "Error";
    */

    if ($database->close()) {
        echo "<br><br>Closed";
    }
}

include(TEMPLATES_PATH . 'footer.php');