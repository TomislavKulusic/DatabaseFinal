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

    /**
     * Actor constructor.
     * @param $actor_id
     * @param $first_name
     * @param $last_name
     */
    public function __construct($actor_id, $first_name, $last_name)
    {
        $this->actor_id = $actor_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    //TODO second constructor

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