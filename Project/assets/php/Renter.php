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

    public function fetch()
    {
        global $database;

        $query = "SELECT * FROM renter WHERE renter_id = ?;";

        $result = $database->getData($query, array($this->renterID));

        $this->firstName = $result['first_name'];
        $this->lastName = $result['last_name'];
        $this->email = $result['email'];
        $this->cardNo = $result['card_no'];
        $this->dateJoined = $result['date_joined'];
        $this->lastLogin = $result['last_login'];
    }

    public function put()
    {
        global $database;

        $query = "UPDATE renter SET first_name = ?, last_name = ?, email = ?, card_no = ?, date_joined = ?, last_login = ? WHERE renter_id = ?;";

        $database->setData($query, array($this->firstName, $this->lastName, $this->email, $this->cardNo,
            $this->dateJoined, $this->lastLogin, $this->renterID));
    }

    public function post()
    {
        global $database;

        $query = "INSERT INTO renter (renter_id, first_name, last_name, email, card_no, date_joined, last_login) VALUE (?, ?, ?, ?, ?, ?);";

        $database->setData($query, array($this->renterID, $this->firstName, $this->lastName, $this->email, $this->cardNo,
            $this->dateJoined, $this->lastLogin));
    }

    public function delete()
    {
        global $database;

        $query = "DELETE FROM renter WHERE renter_id = ?;";

        $database->setData($query, array($this->renterID));
    }

    public function setRentedMovies() {
        global $database;

        $query = "SELECT * FROM Movie_Renter LEFT JOIN Renter ON Render_ID WHERE Movie_Renter.Render_ID = ?;";

        $this->rentedMovies = $database->getDataClass($query, array($this->renterID), 'Movie');
    }

    /**
     * @return mixed
     */
    public function getRenterID()
    {
        return $this->renterID;
    }

    /**
     * @param mixed $renterID
     */
    public function setRenterID($renterID)
    {
        $this->renterID = $renterID;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * @param mixed $cardNo
     */
    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;
    }

    /**
     * @return mixed
     */
    public function getDateJoined()
    {
        return $this->dateJoined;
    }

    /**
     * @param mixed $dateJoined
     */
    public function setDateJoined($dateJoined)
    {
        $this->dateJoined = $dateJoined;
    }

    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param mixed $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
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


}