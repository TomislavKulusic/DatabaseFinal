<?php

/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 1. 5. 2017.
 * Time: 01:22 PM
 */

include_once("Category.php");

class Categories
{
    private $categories;

    private $database;

    /**
     * Categories constructor.
     * @param $categories
     * @param $database
     */
    public function __construct($categories, $database)
    {
        $this->categories = $categories;
        $this->database = $database;
    }

    public function setAll()
    {
        global $database;

        $query = "SELECT * FROM category;";

        $array = array("", "");

        $this->categories = $database->getDataClass($query, array(), "Category", $array);
    }

    public function printCategories()
    {
        foreach ($this->categories as $category)
            echo "  <li class=\"mdl-list__item\">
                        <span class=\"mdl-list__item-primary-content\">
                            " . $category->getCategoryName() . "
                        </span>
                        <span class=\"mdl-list__item-secondary-action\">
                            <label class=\"mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect\" for=\"" . $category->getCategoryNameFormatted() . "\" onchange='toggleSpec(\"" . $category->getCategoryNameFormatted() . "\")'>
                                <input type=\"checkbox\" id=\"" . $category->getCategoryNameFormatted() . "\" class=\"mdl-checkbox__input\" checked/>
                            </label>
                        </span>
                    </li>";
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }


}