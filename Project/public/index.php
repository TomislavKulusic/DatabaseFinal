<?php

session_start();

$isLoggedIn = isset($_SESSION['user']);

if (!$isLoggedIn)
    $page = isset($_GET['page']) ? $_GET['page'] : 'Login';
else
    $page = isset($_GET['page']) ? $_GET['page'] : 'All Movies';

include('../application/configs/config.php');

include(LIBRARY_PATH . "User.php");
include(TEMPLATES_PATH . 'header.php');

include(LIBRARY_PATH . "Check.php");

if ($isLoggedIn)
    switch ($page) {
        case 'Rented Movies':
            include(PAGES_PATH . 'rented.php');
            break;
        case 'AddMovie':
            include(PAGES_PATH . 'addMovie.php');
            break;
        case 'All Movies':
            include(PAGES_PATH . 'allMovies.php');
            break;
        case 'Cart':
            include(PAGES_PATH . 'cart.php');
            break;
        default:
            include(PAGES_PATH . 'allMovies.php');
    }
else
    include(PAGES_PATH . 'login.php');

include(TEMPLATES_PATH . 'footer.php');

?>
