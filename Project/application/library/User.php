<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 16. 4. 2017.
 * Time: 04:56 PM
 */
class User
{
    protected $username;
    protected $password;
    protected $email;
    protected $role_name;
    private $database;

    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $email
     * @param $role_name
     * @param $database
     */
    public function __construct($username, $password, $email, $role_name, $database)
    {
        $this->username = $username;
        $this->password = hash('md5', $password);
        $this->email = $email;
        $this->role_name = $role_name;
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

        $query = "SELECT users.username, password, email, role_name FROM users 
                    LEFT JOIN user_roles ON users.username = user_roles.username
                    LEFT JOIN roles ON user_roles.role_id = roles.role_id
                     WHERE users.username = ? AND password = ? GROUP BY users.username;";

        $array = array($this->username, $this->password);

        $result = $database->getData($query, $array);

        if (empty($result))
            return false;

        $result = $result[0];

        if ($this->checkUsername($result['username']) && $this->checkPassword($result['password'])) {
            $this->email = $result['email'];
            $this->role_name = $result['role_name'];

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

    /**
     * @return mixed
     */
    public function getRole_name()
    {
        return $this->role_name;
    }

}