<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tomislav
 * Date: 4/27/2017
 * Time: 6:22 PM
 */

include("WatchLaterC.php");
include("TheDatabase.php");
include("../configs/config.php");
include("check.php");

if (isset($_GET['movieid'])) {

    include_once("../../application/library/check.php");
    include_once("../../application/library/TheDatabase.php");
    include_once("../../application/configs/config.php");
    include_once("../../application/library/Renter.php");

    $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);

    if ($database->connect()) {
        $database->setRootPath("../../data/log/");

        $watchLater = new WatchLaterC($database);

        $watchLater->addWatchLater($_GET['movieid'], getDecodedDataCookie($_GET['cookie'])->data->renterid);

        $database->close();
    }

}


?>
