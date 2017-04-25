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
                <form action="#">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                        <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                            <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="text" id="sample6">
                            <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
                        </div>
                    </div>
                </form>
                <a class="mdl-navigation__link" href="index.php?page=Cart"><div id="cartN" class="material-icons mdl-badge mdl-badge--overlap">shopping_cart</div></a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php?page=Rented Movies">Rented Movies</a>
            <a class="mdl-navigation__link" href="index.php?page=All Movies">All Movies</a>
            <a class="mdl-navigation__link" href="index.php?page=Watch Later">Watch Later</a>
            <a class="mdl-navigation__link" href="index.php?page=History">History</a>
        </nav>
    </div>

