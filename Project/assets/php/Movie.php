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

    }

    public function put()
    {
        // TODO: Implement put() method.
    }

    public function post()
    {
        // TODO: Implement post() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function setCategories() {
        global $database;

        $query = "SELECT * FROM Category LEFT JOIN Movies ON category.category_id = movies.category_id;";

        $this->categories = $database.getData($query, null);
    }

    public function setActors() {
        global $database;

        $query = "SELECT * FROM Movie_Actors LEFT JOIN Movies ON movie_id WHERE Movies.movie_id = ?;";

        $this->actors = $database.getDataClass($query, array($this->movieID), 'Actor');
    }

    public function setReviews() {
        global $database;

        $query = "";

        $this->reviews = $database.getDataClass($query, null, 'Review');
    }
    
    public function setDirectors() {
        global $database;
        
        $queary = "";
        
        $this->directors = $database.getDataClass($queary, null, 'Director');
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

}