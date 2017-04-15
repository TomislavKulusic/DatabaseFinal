<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano Nola
 * Date: 15.4.2017.
 * Time: 11:40
 */
class Actor implements InterfaceClass
{

    private $actor_id;
    private $first_name;
    private $last_name;
    private $database;

    /**
     * Actor constructor.
     * @param $actor_id
     * @param $first_name
     * @param $last_name
     * @param $database
     */
    public function __construct($actor_id, $first_name, $last_name, $database)
    {
        $this->actor_id = $actor_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->database = $database;
    }

    public function fetch()
    {
        global $database;

        $query = "SELECT * FROM actors WHERE actor_id = ?;";

        $result = $database->getData($query, array($this->actor_id));

        $this->actor_id = $result['actor_id'];
        $this->first_name = $result['first_name'];
        $this->last_name = $result['last_name'];
    }

    public function put()
    {
        global $database;

        $query = "UPDATE actors SET first_name = ?, last_name = ? WHERE actors = ?;";

        $database->setData($query, array($this->first_name, $this->last_name, $this->actor_id));
    }

    public function post()
    {
        global $database;

        $query = "INSERT INTO actors (first_name, last_name) VALUE (?, ?);";

        $database->setData($query, array($this->first_name, $this->last_name));
    }

    public function delete()
    {
        global $database;

        $query = "DELETE FROM actors WHERE last_name = ?;";

        $database->setData($query, array($this->last_name));
    }
}