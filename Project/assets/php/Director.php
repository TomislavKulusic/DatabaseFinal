<?php

include_once ('InterfaceClass.php');

/**
 * Created by IntelliJ IDEA.
 * User: Frano Nola
 * Date: 15.4.2017.
 * Time: 12:26
 */
class Director implements InterfaceClass
{

    private $director_id;
    private $first_name;
    private $last_name;
    private $database;

    /**
     * Director constructor.
     * @param $director_id
     * @param $first_name
     * @param $last_name
     * @param $database
     */
    public function __construct($director_id, $first_name, $last_name, $database)
    {
        $this->director_id = $director_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->database = $database;
    }

    public function fetch()
    {
        global $database;

        $query = "SELECT * FROM directors WHERE director_id = ?;";

        $result = $database->getData($query, array($this->director_id));

        $this->first_name = $result['first_name'];
        $this->last_name = $result['last_name'];
    }

    public function put()
    {
        global $database;

        $query = "UPDATE directors SET first_name = ?, last_name = ? WHERE director_id = ?;";

        $database->setData($query, array($this->first_name, $this->last_name, $this->director_id));
    }

    public function post()
    {
        global $database;

        $query = "INSERT INTO directors (first_name, last_name) VALUE (?, ?);";

        $database->setData($query, array($this->first_name, $this->last_name));
    }

    public function delete()
    {
        global $database;

        $query = "DELETE FROM directors WHERE director_id = ?;";

        $database->setData($query, array($this->director_id));
    }
}