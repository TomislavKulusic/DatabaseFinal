<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano Nola
 * Date: 15.4.2017.
 * Time: 12:06
 */
class Review implements InterfaceClass
{

    private $review_id;
    private $first_name;
    private $last_name;

    /**
     * Review constructor.
     * @param $review_id
     * @param $first_name
     * @param $last_name
     */
    public function __construct($review_id, $first_name, $last_name)
    {
        $this->review_id = $review_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
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