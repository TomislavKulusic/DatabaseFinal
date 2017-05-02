<?php

include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Renter.php");
include_once(LIBRARY_PATH . "History.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$history = "";

if ($database->connect()) {
    $history = new History($database, "", "");

    $history->fetch(getDecodedData()->data->renterid);

    $database->close();
}

include(TEMPLATES_PATH . "navigation.php");

?>

<main class="mdl-layout__content">
    <h3>History</h3>
    <div class="mdl-grid">
        <?php

        $history->printAll()

        ?>
    </div>
    <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
</main>
</div>
