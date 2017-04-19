<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 10:14 PM
 */
interface InterfaceClass
{

    /**
     * This method should get information from database and update all the variables
     */
    public function fetch();

    /**
     * This method should update rows
     */
    public function put();

    /**
     * This method should insert data into database
     */
    public function post();

    /**
     * This method should delete data from database
     */
    public function delete();

}