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

    /*This works

    $result = $database->getData("SELECT * FROM practice;");

    print_r($result);

    */

    /*This also works

    $database->setData("INSERT INTO comments (id, name, comment) VALUES (?, ?, ?)", array("50", "ASDFG", "Aasdasd"));

    */

    if ($database->close()) {
        echo "<br><br>Closed";
    }
}

