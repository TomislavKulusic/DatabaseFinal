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
</main>
</div>
