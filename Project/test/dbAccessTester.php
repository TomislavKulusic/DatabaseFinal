<?php
/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 04:53 PM
 */

include("../assets/php/TheDatabase.php");

$database = new TheDatabase("localhost", "root", "root", "frano");

if ($database->connect()) {
    echo "Connected<br><br>";

    $renter = new Renter('2', '', '', '', '', '', '', $database);

    if ($database->close()) {
        echo "<br><br>Closed";
    }
}