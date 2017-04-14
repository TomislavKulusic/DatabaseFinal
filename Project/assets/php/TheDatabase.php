<?php


/**
 * Class TheDatabase
 *
 * This is the class I used for my personal project. TODO We need to modify this class so it has PHP PDO
 * Here are some links for how to do it:
 *  - http://php.net/manual/en/book.pdo.php
 *  - https://www.w3schools.com/php/php_mysql_prepared_statements.asp
 *
 * The goal is to make this class same as the one that we did in our Java homework
 */
class TheDatabase
{
    private $DBHostName;
    private $DBUserName;
    private $DBPassword;
    private $DBName;
    private $connection;

    /**
     * TheDatabase constructor.
     */
    public function __construct()
    {
    }

    public function connect()
    {
        global $DBHostName, $DBUserName, $DBPassword, $connection, $DBName;

        $DBHostName = "///////////";
        $DBUserName = "///////////";
        $DBPassword = "///////////";
        $DBName = "///////////////";

        $conn = mysqli_connect($DBHostName, $DBUserName, $DBPassword)
            or die ('Error connecting to mysql');

        if (!$conn)
            return false;
        else {
            $connection = $conn;
            mysqli_select_db($connection, $DBName);
            return true;
        }
    }

    public function close()
    {
        global $connection;

        return mysqli_close($connection);
    }

    public function getInfoSpecific($query)
    {
        global $connection;

        $result = mysqli_query($connection, $query)
            or die ('Error getting info: ' . mysqli_error($connection));

        return $result;
    }

    public function updateInfoSpecific($query)
    {
        global $connection;

        return mysqli_query($connection, $query)
            or die ('Error setting the info: ' . mysqli_error($connection));

    }

    /**
     * @return string
     */
    public function getDBHostName(): string
    {
        return $this->DBHostName;
    }

    /**
     * @param string $DBHostName
     */
    public function setDBHostName(string $DBHostName)
    {
        $this->DBHostName = $DBHostName;
    }

    /**
     * @return string
     */
    public function getDBUserName(): string
    {
        return $this->DBUserName;
    }

    /**
     * @param string $DBUserName
     */
    public function setDBUserName(string $DBUserName)
    {
        $this->DBUserName = $DBUserName;
    }

    /**
     * @return string
     */
    public function getDBPassword(): string
    {
        return $this->DBPassword;
    }

    /**
     * @param string $DBPassword
     */
    public function setDBPassword(string $DBPassword)
    {
        $this->DBPassword = $DBPassword;
    }

    /**
     * @return string
     */
    public function getDBName(): string
    {
        return $this->DBName;
    }

    /**
     * @param string $DBName
     */
    public function setDBName(string $DBName)
    {
        $this->DBName = $DBName;
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param mixed $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }


}