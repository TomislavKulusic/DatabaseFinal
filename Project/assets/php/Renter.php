<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 11:01 PM
 */
class Renter implements InterfaceClass
{

    private $renterID;
    private $firstName;
    private $lastName;
    private $email;
    private $cardNo;
    private $dateJoined;
    private $lastLogin;
    private $database;
    private $rentedMovies;

    /**
     * Renter constructor.
     * @param $renterID
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $cardNo
     * @param $dateJoined
     * @param $lastLogin
     */
    public function __construct($renterID, $firstName, $lastName, $email, $cardNo, $dateJoined, $lastLogin, $database)
    {
        $this->renterID = $renterID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->cardNo = $cardNo;
        $this->dateJoined = $dateJoined;
        $this->lastLogin = $lastLogin;
        $this->database = $database;
    }

    public function __construct1($renterID) {
        $this->$renterID = $renterID;
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

    public function setRentedMovies() {
        global $database;

        $query = "SELECT * FROM Movie_Renter LEFT JOIN Renter ON Render_ID WHERE Movie_Renter.Render_ID = ?;";

        $result = $database.getData($query, array($this->renterID));

        //TODO Finish this
    }
}