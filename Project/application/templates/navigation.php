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
                <a class="mdl-navigation__link" href="">Search</a>
                <a class="mdl-navigation__link" href="">Cart</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="<?php echo $path . 'pages/rented.php'?>">Rented Movies</a>
            <a class="mdl-navigation__link" href="">All Movies</a>
            <a class="mdl-navigation__link" href="">Watch Later</a>
            <a class="mdl-navigation__link" href="">History</a>
        </nav>
    </div>

