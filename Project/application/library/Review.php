<?php

include_once ('InterfaceClass.php');

/**
 * Created by IntelliJ IDEA.
 * User: Frano Nola
 * Date: 15.4.2017.
 * Time: 12:06
 */
class Review implements InterfaceClass
{

    private $review_id;
    private $movie_id;
    private $rating;
    private $review;
    private $database;

    /**
     * Review constructor.
     * @param $review_id
     * @param $movie_id
     * @param $rating
     * @param $review
     * @param $database
     */
    public function __construct($review_id, $movie_id, $rating, $review, $database)
    {
        $this->review_id = $review_id;
        $this->movie_id = $movie_id;
        $this->rating = $rating;
        $this->review = $review;
        $this->database = $database;
    }

    public function fetch($id)
    {
        global $database;

        if ($id = '')
            $id = $this->review_id;

        $query = "SELECT * FROM reviews WHERE review_id = ?;";

        $result = $database->getData($query, array($id))[0];

        $this->review_id = $result['review_id'];
        $this->movie_id = $result['movie_id'];
        $this->rating = $result['rating'];
        $this->review = $result['review'];
    }

    public function put()
    {
        global $database;

        $query = "UPDATE reviews SET movie_id = ?, rating = ?, review = ? WHERE review_id = ?;";

        $database->setData($query, array($this->movie_id, $this->rating, $this->review, $this->review_id));
    }

    public function post()
    {
        global $database;

        $query = "INSERT INTO reviews (review_id, movie_id, rating, review) VALUE (?, ?, ?, ?);";

        $database->setData($query, array($this->review_id, $this->movie_id, $this->rating, $this->review));
    }

    public function delete()
    {
        global $database;

        $query = "DELETE FROM reviews WHERE review_id = ?;";

        $database->setData($query, array($this->review_id));
    }

    /**
     * @return mixed
     */
    public function getReviewId()
    {
        return $this->review_id;
    }

    /**
     * @param mixed $review_id
     */
    public function setReviewId($review_id)
    {
        $this->review_id = $review_id;
    }

    /**
     * @return mixed
     */
    public function getMovieId()
    {
        return $this->movie_id;
    }

    /**
     * @param mixed $movie_id
     */
    public function setMovieId($movie_id)
    {
        $this->movie_id = $movie_id;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @param mixed $review
     */
    public function setReview($review)
    {
        $this->review = $review;
    }

    /**
     * @return mixed
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param mixed $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }


}