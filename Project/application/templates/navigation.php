<?php
/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 11:24 AM
 */
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
                    <li class="mdl-menu__item">Some Action</li>
                    <li class="mdl-menu__item mdl-menu__item--full-bleed-divider">Another Action</li>
                    <li disabled class="mdl-menu__item">Disabled Action</li>
                    <li class="mdl-menu__item">Yet Another Action</li>
                    <li class="mdl-menu__item"><a href="index.php?logout">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Movie Renting Page</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php?page=Rented Movies">Rented Movies</a>
            <a class="mdl-navigation__link" href="index.php?page=All Movies">All Movies</a>
            <a class="mdl-navigation__link" href="index.php?page=Watch Later">Watch Later</a>
            <a class="mdl-navigation__link" href="index.php?page=History">History</a>
        </nav>
        <hr style="border-top-color: rgba(255, 255, 255, 0.16);">
        <?php if ($page != "Movie" && $page != "Cart") {
            include_once(LIBRARY_PATH . "Categories.php");

            $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
                $config['db']['dbName']);

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

