<?php

include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Renter.php");
include_once(LIBRARY_PATH . "WatchLaterC.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$watchLater = "";

if ($database->connect()) {
    $watchLater = new WatchLaterC($database);

    $watchLater->fetch(getDecodedData()->data->renterid);

    $database->close();
}

include(TEMPLATES_PATH . "navigation.php");

?>

<main class="mdl-layout__content">
    <h3>Watch Later</h3>
    <div class="mdl-grid">
        <?php

        $watchLater->printAll()

        ?>
    </div>
    <div id="watchLaterS" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
</main>
</div>
