<?php
/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 11:24 AM
 */
include_once(LIBRARY_PATH . "User.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$button = "";

$canDelete = false;

if ($database->connect()) {
    $user = new User(getDecodedData()->data->username, "", "", "", $database);
    $user->setRole();

    if ($user->getRole()->checkPrivilege("Add movies"))
        $button = "<li class=\"mdl-menu__item\"><a href='index.php?page=AddMovie'>Admin Panel</a></li>";
    else if (!$user->getRole()->checkPrivilege("Add movies") && $page == "AddMovie") {
        header("location:index.php?page=Login");
        exit();
    } else
        $button = "<li disabled class=\"mdl-menu__item\">Admin Panel</li>";

    if ($page == "AddMovie")
        $canDelete = $user->getRole()->checkPrivilege("Delete movies");

    $database->close();
}
?>

<div class="demo-layout-transparent mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
    <header class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row">
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation -->
            <nav class="mdl-navigation">
                <form id="searchF">
                    <div class="mdl-textfield mdl-js-textfield" id="remote">
                        <input class="mdl-textfield__input typeahead" placeholder="Search" name="name" type="text"
                               id="search" style="visibility: hidden;">
                        <label class="mdl-button mdl-js-button mdl-button--icon" for="search" id="searchB">
                            <i class="material-icons">search</i>
                        </label>
                    </div>
                </form>
                <a class="mdl-navigation__link" href="index.php?page=Cart">
                    <div id="cartN" class="material-icons mdl-badge mdl-badge--overlap">shopping_cart</div>
                </a>
                <button id="demo-menu-lower-right"
                        class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="material-icons">more_vert</i>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                    for="demo-menu-lower-right">
                    <li class="mdl-menu__item mdl-menu__item--full-bleed-divider"><a href="index.php?page=Profile">Profile</a>
                    </li>
                    <?php
                    echo $button;
                    ?>
                    <li class="mdl-menu__item"><a href="index.php?logout">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title title titleM">Movie Renting Page</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php?page=Rented Movies">Rented Movies</a>
            <a class="mdl-navigation__link" href="index.php?page=All Movies">All Movies</a>
            <a class="mdl-navigation__link" href="index.php?page=Watch Later">Watch Later</a>
            <a class="mdl-navigation__link" href="index.php?page=History">History</a>
        </nav>
        <hr style="border-top-color: rgba(255, 255, 255, 0.16);">
        <?php if ($page != "Movie" && $page != "Cart" && $page != "AddMovie") {
            include_once(LIBRARY_PATH . "Categories.php");

            if ($database->connect()) {
                $categories = new Categories("", "");
                $categories->setAll();

                echo "<div id=\"filters\">
                    <div id=\"categoryFC\">
                        <button class=\"mdl-button mdl-js-button mdl-button--primary\" id=\"categoryB\" onclick=\"toggle('categoryF')\">
                            Categories
                        </button>
                        <ul class=\"demo-list-control mdl-list category\" style=\"display: none\" id=\"categoryF\">";

                $categories->printCategories();

                echo "         </ul>
                   </div>
                </div>";

                $database->close();
            }
        }
        ?>
    </div>
    <div class="mdl-tooltip" data-mdl-for="categoryB">
        Filter movies
    </div>
    <div class="mdl-tooltip" data-mdl-for="searchB">
        Search
    </div>
    <div class="mdl-tooltip" data-mdl-for="cartN">
        Cart
    </div>

