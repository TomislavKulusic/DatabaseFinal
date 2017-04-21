<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'Login';

include('../application/configs/config.php');

include(TEMPLATES_PATH . 'header.php');

switch ($page) {
    case 'Login':
        include (PAGES_PATH . 'landing.php');
        break;
    case 'Rented Movies':
        include (PAGES_PATH . 'rented.php');
        break;
    default:
        include (PAGES_PATH . 'landing.php');
}

include(TEMPLATES_PATH . 'footer.php');

?>
