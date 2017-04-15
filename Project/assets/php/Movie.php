<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 10:33 PM
 */
class Movie implements InterfaceClass
{

    private $movieID;
    private $movieTitle;
    private $description;
    private $categoryID;
    private $directorID;
    private $releaseDate;

    private $rentalDate;
    private $dueDate;
    private $returned;

    private $database;

    private $categories;
    private $reviews;
    private $actors;
    private $directors;

    /**
     * Movies constructor.
     * @param $movieID
     * @param $movieTitle
     * @param $description
     * @param $categoryID
     * @param $directorID
     * @param $releaseDate
     * @param $database
     */
    public function __construct($movieID, $movieTitle, $description, $categoryID, $directorID, $releaseDate, $database)
    {
        $this->movieID = $movieID;
        $this->movieTitle = $movieTitle;
        $this->description = $description;
        $this->categoryID = $categoryID;
        $this->directorID = $directorID;
        $this->releaseDate = $releaseDate;
        $this->database = $database;
    }

    public function fetch()
    {
        global $database;

        $query = "SELECT * FROM Movies WHERE movie_id = ?;";

        $result = $database->getData($query, array($this->movieID));

        $this->movieTitle = $result['movie_title'];
        $this->description = $result['movie_description'];
        $this->categoryID = $result['category_id'];
        $this->directorID = $result['director_id'];
        $this->releaseDate = $result['release_date'];
    }

    public function put()
    {
        global $database;

        $query = "UPDATE movies SET movie_title = ?, description = ?, category_id = ?, director_id = ?, release_date = ? WHERE movie_id = ?;";

        $database->setData($query, array($this->movieTitle, $this->description, $this->categoryID,
            $this->directorID, $this->releaseDate, $this->movieID));
    }

    public function post()
    {
        global $database;

        $query = "INSERT INTO movies (movie_id, movie_title, description, category_id, director_id, release_date) VALUE (?, ?, ?, ?, ?, ?);";

        $database->setData($query, array($this->movieID, $this->movieTitle, $this->description, $this->categoryID,
            $this->directorID, $this->releaseDate));
    }

    public function delete()
    {
        global $database;

        $query = "DELETE FROM movies WHERE movie_id = ?;";

        $database->setData($query, array($this->movieID));
    }

    public function setCategories() {
        global $database;

        $query = "SELECT * FROM Category LEFT JOIN Movies ON category.category_id = movies.category_id;";

        $this->categories = $database->getData($query, null);
    }

    public function setActors() {
        global $database;

        $query = "SELECT * FROM Movie_Actors LEFT JOIN Movies ON movie_id WHERE Movies.movie_id = ?;";

        $this->actors = $database->getDataClass($query, array($this->movieID), 'Actor');
    }

    public function setReviews() {
        global $database;

        $query = "";

        $this->reviews = $database->getDataClass($query, null, 'Review');
    }
    
    public function setDirectors() {
        global $database;
        
        $queary = "";
        
        $this->directors = $database->getDataClass($queary, null, 'Director');
    }

    public function setAll() {
        $this->setActors();
        $this->setCategories();
        $this->setReviews();
        $this->setDirectors();
    }

    /**
     * @return mixed
     */
    public function getMovieID()
    {
        return $this->movieID;
    }

    /**
     * @param mixed $movieID
     */
    public function setMovieID($movieID)
    {
        $this->movieID = $movieID;
    }

    /**
     * @return mixed
     */
    public function getMovieTitle()
    {
        return $this->movieTitle;
    }

    /**
     * @param mixed $movieTitle
     */
    public function setMovieTitle($movieTitle)
    {
        $this->movieTitle = $movieTitle;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * @param mixed $categoryID
     */
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;
    }

    /**
     * @return mixed
     */
    public function getDirectorID()
    {
        return $this->directorID;
    }

    /**
     * @param mixed $directorID
     */
    public function setDirectorID($directorID)
    {
        $this->directorID = $directorID;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return mixed
     */
    public function getRentalDate()
    {
        return $this->rentalDate;
    }

    /**
     * @param mixed $rentalDate
     */
    public function setRentalDate($rentalDate)
    {
        $this->rentalDate = $rentalDate;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getReturned()
    {
        return $this->returned;
    }

    /**
     * @param mixed $returned
     */
    public function setReturned($returned)
    {
        $this->returned = $returned;
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