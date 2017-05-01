<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tomislav
 * Date: 4/27/2017
 * Time: 6:22 PM
 */

if (isset($_GET['movieid'])) {

    include_once("../../application/library/check.php");
    include_once("../../application/library/TheDatabase.php");
    include_once("../../application/configs/config.php");
    include_once("../../application/library/Renter.php");

    $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);

    if ($database->connect()) {

        $userId = getDecodedDataCookie($_GET['cookie'])->data->renterid;
        $movieId = $_GET['movieid'];

        $sql = "INSERT INTO watch_later VALUES (?,?)";
        if ($database->setData($sql, array($movieId, $userId))) {
            echo "Stored";
        } else {
            echo "not stored";
        }

    } else {

    }

}


?>
