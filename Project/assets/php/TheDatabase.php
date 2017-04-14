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
 *
 * Usefull link http://php.net/manual/en/pdostatement.fetchall.php
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
     * @param $DBHostName
     * @param $DBUserName
     * @param $DBPassword
     * @param $DBName
     */
    public function __construct($DBHostName, $DBUserName, $DBPassword, $DBName)
    {
        $this->DBHostName = $DBHostName;
        $this->DBUserName = $DBUserName;
        $this->DBPassword = $DBPassword;
        $this->DBName = $DBName;
    }

    public function connect()
    {
        global $DBHostName, $DBUserName, $DBPassword, $DBName;

        try {
            $this->connection = new PDO('mysql:dbname=' . $DBName . ';host=' . $DBHostName, $DBUserName, $DBPassword);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            //TODO Handle the exception

            return false;
        }
    }

    public function close()
    {
        global $connection;

        return $connection = null;
    }

    //TODO Try catch

    public function getData($query) {
        $statement = $this->connection->prepare($query);

        return $statement.fetchAll();
    }

    /**
     * @param $query
     * @param $className
     * @return string Returns objects of the class specified
     */
    public function getDataClass($query, $className) {
        $statement = $this->connection->prepare($query);

        return $statement.fetchAll(PDO::FETCH_CLASS, $className);
    }

    /**
     * @param $query Example: "INSERT INTO fruit(name, colour) VALUES (?, ?)"
     * @param $values Example: array('apple', 'green')
     */
    public function setData($query, $values) {
        $insert = $this->connection->prepare($query);

        $insert->execute($values);
    }



    //Getters and setters


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