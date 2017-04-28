<?php
	include_once("../../application/configs/config.php");
      include_once("../../application/library/TheDatabase.php");
      include_once("../../application/library/Review.php");

   $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);

if ($database->connect()) {
      echo "connected to db";
      
      
   $review = $_GET['review'];
   $rating = $_GET['rating'];
   $movie = $_GET['movieid'];
   
   $review = new Review(null, $movie, $rating, $review, $database);
   $review->post();
   
   
 //  $sql = "INSERT INTO reviews (movie_id,rating,review) VALUES (?,?,?)";

  // if($database->setData($sql,array(1,1))) {
  //     echo"Stored";
  // } else {
   //    echo "not stored";
 //  }


} else {

}




//}



?>
