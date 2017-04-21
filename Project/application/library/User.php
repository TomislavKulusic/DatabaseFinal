<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 16. 4. 2017.
 * Time: 04:56 PM
 *
 * TODO ROLES
 */
class User
{
    protected $username;
    protected $password;
    protected $email;
    private $database;

    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $email
     * @param $database
     */
    public function __construct($username, $password, $email, $database)
    {
        $this->username = $username;
        $this->password = hash('md5', $password);
        $this->email = $email;
        $this->database = $database;
    }

    /**
     * @param $userN
     * @return bool
     */
    private function checkUsername($userN)
    {
        return $userN === $this->username ? true : false;
    }

    /**
     * @param $userP
     * @return bool
     */
    private function checkPassword($userP)
    {
        return $userP === $this->password ? true : false;
    }

    /**
     * @return bool
     */
    public function register()
    {
        global $database;

        $query = "INSERT INTO users (username, password, email) VALUES(?, ?, ?);";

        $array = array($this->username, $this->password, $this->email);

        return $database->setData($query, $array);
    }

    /**
     * @return bool
     */
    public function login()
    {
        global $database;

        $query = "SELECT * FROM users WHERE username = ? AND password = ?";

        $array = array($this->username, $this->password);

        $result = $database->getData($query, $array);

        if (empty($result))
            return false;

        $result = $result[0];

        if ($this->checkUsername($result['username']) && $this->checkPassword($result['password'])) {
            $this->email = $result['email'];

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


}