<?php

include_once('InterfaceClass.php');

/**
 * Created by Eclipse IDEA.
 * User: Ivan Kovacevic
 * Date: 25.4.2017.
 * Time: 12:27
 */
class Category implements InterfaceClass
{

    private $category_id;
    private $category_name;


    public function __construct($category_id, $category_name)
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
    }

    public function fetch($id)
    {
        global $database;

        if ($id = '')
            $id = $this->category_id;

        $query = "SELECT * FROM category WHERE category_id = ?;";

        $result = $database->getData($query, array($id));

        $this->category_id = $result['category_id'];
        $this->category_name = $result['category_name'];

    }

    public function put()
    {
        global $database;

        $query = "UPDATE category SET category_name = ? WHERE category_id = ?;";

        $database->setData($query, array($this->category_name, $this->category_id));
    }

    public function post()
    {
        global $database;

        $query = "INSERT INTO category (category_name) VALUE (?);";

        $database->setData($query, array($this->category_name));
    }

    public function delete()
    {
        global $database;

        $query = "DELETE FROM category WHERE category_id = ?;";

        $database->setData($query, array($this->category_id));
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * @return mixed
     */
    public function getCategoryNameFormatted()
    {
        return str_replace(' ', '', $this->category_name);
    }

    /**
     * @param mixed $category_name
     */
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
    }


} // end of Category Class