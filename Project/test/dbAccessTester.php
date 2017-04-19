<?php
/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 04:53 PM
 */

include_once("../assets/php/TheDatabase.php");
include_once("../assets/php/Renter.php");
include_once("../assets/php/User.php");

$page = "Test";
$path = "../";

include("../assets/includes/header.php");

$database = new TheDatabase("localhost", "root", "root", "mydb");

if ($database->connect()) {
    echo "Connected<br><br>";

/*    $renter = new Renter('1', '', '', '', '', $database);

    $renter->fetch();

    $renter->setRentedMovies(true);

    print_r($renter->getRentedMovies());*/

    $user = new User("Pero", "Peric", "", $database);

    if ($user->login())
        echo "Ok";
    else
        echo "Error";

    if ($database->close()) {
        echo "<br><br>Closed";
    }
}

include('../assets/includes/footer.php');