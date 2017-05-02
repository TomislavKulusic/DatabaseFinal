<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 2. 5. 2017.
 * Time: 01:39 PM
 */

include_once("Movie.php");

class WatchLaterC
{
    private $database;
    private $movie;
    private $movies;

    /**
     * WatchLaterC constructor.
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addWatchLater($movieId, $userId)
    {
        global $database;

        $sql = "INSERT INTO watch_later VALUES (?, ?);";

        $movie = new Movie("", "", "", "", "", "", $database);

        if ($database->setData($sql, array($movieId, $userId)))
            echo $movie->getMovieTitleID($movieId) . " added to watch later!";
        else
            echo "Movie already added!";
    }

    public function fetch($id) {
        global $database;

        $query = "SELECT movie_title, category_id FROM watch_later LEFT JOIN movies ON watch_later.movie_id = movies.movie_id WHERE watch_later.renter_id = ?;";

        $array = array('', '', '', '', '', '', $database);

        $result = $database->getDataClass($query, array($id), 'Movie', $array);

        foreach ($result as $movie)
            $movie->setCategories();

        $this->movies = $result;
    }
}