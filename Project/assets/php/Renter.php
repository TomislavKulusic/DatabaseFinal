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
    public function __construct($renterID, $firstName, $lastName, $email, $cardNo, $dateJoined, $lastLogin)
    {
        $this->renterID = $renterID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->cardNo = $cardNo;
        $this->dateJoined = $dateJoined;
        $this->lastLogin = $lastLogin;
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
}