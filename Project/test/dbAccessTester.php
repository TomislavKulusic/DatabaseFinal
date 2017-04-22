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
*/

    $user = new User("AdminEx", "123", "", "", $database);

    if ($user->login())
        echo "Logged in<br>";
    else
        echo "Wrong username or password<br>";

    if ($user->getRole()->checkPrivilege('Delete movies'))
        echo "Can<br>";
    else
        echo "Can't<br>";

    $user1 = new User("UserEx", "123", "", "", $database);

    if ($user1->login())
        echo "Logged in<br>";
    else
        echo "Wrong username or password<br>";

    if ($user1->getRole()->checkPrivilege('Delete movies'))
        echo "Can<br>";
    else
        echo "Can't<br>";

    $user2 = new User("ViewerEx", "123", "", "", $database);

    if ($user2->login())
        echo "Logged in<br>";
    else
        echo "Wrong username or password<br>";

    if ($user2->getRole()->checkPrivilege('Delete movies'))
        echo "Can<br>";
    else
        echo "Can't<br>";

    if ($database->close()) {
        echo "<br><br>Closed";
    }
}

include(TEMPLATES_PATH . 'footer.php');