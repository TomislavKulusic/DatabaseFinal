<?php

include_once("InterfaceClass.php");
include_once("Actor.php");
include_once("Review.php");
include_once("Director.php");

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 11:01 PM
 */
class Renter implements InterfaceClass
{

    private $renterID;
    private $username;
    private $firstName;
    private $lastName;
    private $email;
    private $cardNo;

    private $database;
    private $rentedMovies;

    /**
     * Renter constructor.
     * @param $renterID
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $cardNo
     * @param $database
     */
    public function __construct($renterID, $username, $firstName, $lastName, $email, $cardNo, $database)
    {
        $this->renterID = $renterID;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->cardNo = $cardNo;
        $this->database = $database;
    }

    public function fetch($id)
    {
        global $database;

        if (empty($id))
            $id = $this->renterID;

        $query = "SELECT * FROM renter WHERE renter_id = ?;";

        $result = $database->getData($query, array($id))[0];

        $this->renterID = $result['renter_id'];
        $this->firstName = $result['first_name'];
        $this->lastName = $result['last_name'];
        $this->email = $result['email'];
        $this->cardNo = $result['card_no'];
    }

    public function fetchU($username) {
        global $database;

        if (empty($username))
            $username = $this->username;

        $query = "SELECT * FROM renter WHERE username = ?;";

        $result = $database->getData($query, array($username))[0];

        $this->renterID = $result['renter_id'];
        $this->firstName = $result['first_name'];
        $this->lastName = $result['last_name'];
        $this->email = $result['email'];
        $this->cardNo = $result['card_no'];
    }

    public function put()
    {
        global $database;

        $query = "UPDATE renter SET first_name = ?, last_name = ?, email = ?, card_no = ? WHERE renter_id = ?;";

        $database->setData($query, array($this->firstName, $this->lastName, $this->email, $this->cardNo,
            $this->renterID));
    }

    public function post()
    {
        global $database;

        $query = "INSERT INTO renter (renter_id, first_name, last_name, email, card_no) VALUE (?, ?, ?, ?, ?);";

        $database->setData($query, array($this->renterID, $this->firstName, $this->lastName, $this->email, $this->cardNo));
    }

    public function delete()
    {
        global $database;

        $query = "DELETE FROM renter WHERE renter_id = ?;";

        $database->setData($query, array($this->renterID));
    }

    public function setRentedMovies($updateAll)
    {
        global $database;

        $query = "SELECT * FROM Movie_Renter LEFT JOIN movies ON movie_renter.movie_id = movies.movie_id WHERE movie_renter.renter_id = ?;";

        $array = array('', '', '', '', '', '', $database);

        $this->rentedMovies = $database->getDataClass($query, array($this->renterID), 'Movie', $array);

        if ($updateAll)
            foreach ($this->rentedMovies as $asd)
                $asd->setAll();
    }

    public function hasMovie($movieTitle) {
        foreach ($this->rentedMovies as $movie)
            if ($movie->getMovieTitle() == $movieTitle)
                return true;

        return false;
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

    public function getRentedMovies()
    {
        return $this->rentedMovies;
    }

    public function getUsername()
    {
        return $this->username;
    }
}