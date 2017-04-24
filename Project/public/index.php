<?php


session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'Login';

include('../application/configs/config.php');

include(LIBRARY_PATH . "User.php");
include(TEMPLATES_PATH . 'header.php');

if (isset($_SESSION['login_user']))
    switch ($page) {
        case 'Rented Movies':
            include(PAGES_PATH . 'rented.php');
            break;
        case 'AddMovie':
            include(PAGES_PATH . 'addMovie.php');
            break;
        default:
            include(PAGES_PATH . 'rented.php');
    }
else
    include(PAGES_PATH . 'rented.php');

include(TEMPLATES_PATH . 'footer.php');

?>
