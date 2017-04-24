<?php

include_once('Movie.php');

/**
 * Class TheDatabase
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
        global $connection;

        try {
            $connection = new PDO('mysql:dbname=' . $this->DBName . ';host=' . $this->DBHostName, $this->DBUserName, $this->DBPassword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return true;
        } catch (PDOException $e) {
            error_log("Error connecting: " . $e->getMessage() . "!\r\n", 3, "errors.log");
            return false;
        }
    }

    public function close()
    {
        global $connection;

        try {
            $connection = null;

            return true;
        } catch (PDOException $e) {
            error_log("Error closing: " . $e->getMessage() . "!\r\n", 3, "errors.log");

            return false;
        }
    }

    public function getData($query, $values)
    {
        global $connection;

        try {
            $statement = $connection->prepare($query);

            if ($values === null)
                $statement->execute();
            else
                $statement->execute($values);

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting data: " . $e->getMessage() . "!\r\n", 3, "errors.log");

            return false;
        }
    }

    /**
     * @param $query
     * @param $values
     * @param $className
     * @return string Returns objects of the class specified
     */
    public function getDataClass($query, $values, $className, $classValues)
    {
        global $connection;

        try {

            $statement = $connection->prepare($query);

            if ($values === null)
                $statement->execute();
            else
                $statement->execute($values);

            return $statement->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $className, $classValues);

        } catch (PDOException $e) {
            error_log("Error getting data as class: " . $e->getMessage() . "!\r\n", 3, "errors.log");

            return false;
        }
    }

    /**
     * @param $query string Example: "INSERT INTO fruit(name, colour) VALUES (?, ?)"
     * @param $values array Example: array('apple', 'green')
     * @return bool
     */
    public function setData($query, $values)
    {
        global $connection;

        try {

            $insert = $connection->prepare($query);

            $insert->execute($values);

            return true;
        } catch (PDOException $e) {
            error_log("Error setting data: " . $e->getMessage() . "!\r\n", 3, "errors.log");
            return false;
        }
    }

    public function startTransaction()
    {
        global $connection;

        $connection->beginTransaction();
    }

    public function rollback()
    {
        global $connection;

        $connection->rollBack();
    }

    public function endTransaction()
    {
        global $connection;

        $connection->commit();
    }

    public function getLastID() {

        global $connection;

        return $connection->lastInsertId();
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