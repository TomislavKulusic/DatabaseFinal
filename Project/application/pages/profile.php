<?php

include(LIBRARY_PATH . "TheDatabase.php");
include(TEMPLATES_PATH . "navigation.php");
include_once(LIBRARY_PATH . "Renter.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$user = "";

if ($database->connect()) {
    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['eMail']) && isset($_POST['cardNo'])) {
        $firstN = htmlentities(strip_tags(trim($_POST['firstName'])));
        $lastN = htmlentities(strip_tags(trim($_POST['lastName'])));
        $eMail = htmlentities(strip_tags(trim($_POST['eMail'])));
        $cardNo = htmlentities(strip_tags(trim($_POST['cardNo'])));

        $user = new Renter(getDecodedData()->data->renterid, "", $firstN, $lastN, $eMail, $cardNo, $database);

        $user->put();
    } else
        $user = new Renter("", "", "", "", "", "", $database);

    $user->fetch(getDecodedData()->data->renterid);

    $database->close();
}

?>

<main class="mdl-layout__content">

    <form class="profile" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=Profile">
        <h4>User Information</h4>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="firstName" type="text" id="firstName" value="<?php echo $user->getFirstName()?>" required>
            <label class="mdl-textfield__label" for="firstName">First Name</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="lastName" type="text" id="lastName" value="<?php echo $user->getLastName()?>" required>
            <label class="mdl-textfield__label" for="lastName">Last Name</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="eMail" type="text" id="eMail" value="<?php echo $user->getEmail()?>" required>
            <label class="mdl-textfield__label" for="eMail">eMail</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="cardNo" type="text" id="cardNo" value="<?php echo $user->getCardNo()?>" required>
            <label class="mdl-textfield__label" for="cardNo">Card no.</label>
        </div>
        <button class="mdl-button mdl-js-button mdl-button--primary mdl-js-ripple-effect">
            Update
        </button>
    </form>

</main>
</div>
