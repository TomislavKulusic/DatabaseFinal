<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tomislav
 * Date: 4/27/2017
 * Time: 6:22 PM
 */



echo "ovo je pravi";

//if ($_POST && isset($_POST['a'])) {

      //include_once("../../application/library/check.php");
      include_once("../../application/library/TheDatabase.php");
      include_once("../../application/configs/config.php");

   $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);

if ($database->connect()) {
      echo "connected to db";
   $sql = "INSERT INTO watch_later VALUES (?,?)";

   if($database->setData($sql,array(1,1))) {
       echo"Stored";
   } else {
       echo "not stored";
   }


} else {
   Console.log("Cannot Connect");
}




//}



?>
