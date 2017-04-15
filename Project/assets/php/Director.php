<?php

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
        // TODO: Implement fetch() method.
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
}