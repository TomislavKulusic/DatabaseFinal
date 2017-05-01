<?php
include_once(LIBRARY_PATH . "Renter.php");
include_once(LIBRARY_PATH . "Movie.php");

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 1. 5. 2017.
 * Time: 08:40 PM
 */
class Movies
{
    private $database;
    private $allMovies;
    private $rentedMovies;

    /**
     * Movies constructor.
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function setAllMovies() {
        global $database;

        $classValues = array("", "", "", "", "", "", $database);

        $result = $database->getDataClass("SELECT * FROM movies;", null, "Movie", $classValues);

        foreach ($result as $movie)
            $movie->setCategories();

        $this->allMovies = $result;
    }

    public function printAllMovies() {
        $movies = $this->allMovies;

        foreach ($movies as $movie)
            $movie->printMovie("all");
    }

    public function setRentedMovies() {
        global $database;

        $renter = new Renter("", getDecodedData()->data->username, "", "", "", "", $database);

        $renter->fetchU("");

        $renter->setRentedMovies(false);

        $movies = $renter->getRentedMovies();

        foreach ($movies as $movie)
            $movie->setCategories();

        $this->rentedMovies = $movies;
    }

    public function printRentedMovies() {
        $movies = $this->rentedMovies;

        foreach ($movies as $movie)
            $movie->printMovie("ren");
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

    /**
     * @return mixed
     */
    public function getRentedMovies()
    {
        return $this->rentedMovies;
    }

}