<?php

/**
 * Created by IntelliJ IDEA.
 * User: Nikola
 * Date: 30.04.2017.
 * Time: 22:36
 */
class History
{

    private $database;
    private $movieid;
    private $renterid;
    private $historyMovies;

    /**
     * History constructor.
     * @param $database
     * @param $movieid
     * @param $renterid
     */
    public function __construct($database, $movieid, $renterid)
    {
        $this->database = $database;
        $this->movieid = $movieid;
        $this->renterid = $renterid;
    }


    public function fetch($renterid){

        global $database;

        $query = "SELECT movie_title FROM history LEFT JOIN movies ON history.movie_id = movies.movie_id WHERE history.renter_id = ?;";

        $result = $database -> getData($query, array($renterid));

        $array = array('', '', '', '', '', '', $database);

        $this->historyMovies = $database->getDataClass($query, array($this->renterid), 'Movie', $array);

        return $this -> historyMovies;

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
    public function getmovieid()
    {
        return $this->movieid;
    }

    /**
     * @param mixed $movieid
     */
    public function setmovieid($movieid)
    {
        $this->movieid = $movieid;
    }

    /**
     * @return mixed
     */
    public function getRenterid()
    {
        return $this->renterid;
    }

    /**
     * @param mixed $renterid
     */
    public function setRenterid($renterid)
    {
        $this->renterid = $renterid;
    }



}