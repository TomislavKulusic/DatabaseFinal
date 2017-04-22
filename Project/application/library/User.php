<?php

include_once ('Privileges.php');

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
    protected $role;
    private $database;

    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $email
     * @param $role
     * @param $database
     */
    public function __construct($username, $password, $email, $role, $database)
    {
        $this->username = $username;
        $this->password = hash('md5', $password);
        $this->email = $email;
        $this->role = $role;
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

        $query = "SELECT
                    users.username,
                    password,
                    email,
                    role_name,
                    GROUP_CONCAT(privileges.privilege_desc SEPARATOR '|') AS 'Privilege'
                  FROM users
                    LEFT JOIN user_roles ON users.username = user_roles.username
                    LEFT JOIN roles ON user_roles.role_id = roles.role_id
                    LEFT JOIN role_privileges ON roles.role_id = role_privileges.role_id
                    LEFT JOIN privileges ON role_privileges.priviledge_id = privileges.privilege_id
                  WHERE users.username = ? AND PASSWORD = ? GROUP BY users.username;";

        $array = array($this->username, $this->password);

        $result = $database->getData($query, $array);

        if (empty($result))
            return false;

        $result = $result[0];

        if ($this->checkUsername($result['username']) && $this->checkPassword($result['password'])) {
            $this->email = $result['email'];
            $this->role = new Privileges($result['role_name'], $result['Privilege']);

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
    public function getRole()
    {
        return $this->role;
    }

}