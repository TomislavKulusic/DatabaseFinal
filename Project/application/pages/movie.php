<?php
include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "History.php");
include_once(LIBRARY_PATH . "Movies.php");
$movieTitle = "";

if (isset($_GET['name']))
    $movieTitle = $_GET['name'];
else {
    header("location:index.php?page=Login");
    exit();
}

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$movies = "";

if ($database->connect()) {
    $movies = new Movies($database);

    $movies->hasRented(getDecodedData()->data->username);

    $movies->setMovie($movieTitle);

    $movies->deleteExpiredMovie(getDecodedData()->data->renterid);

    $history = new History($database, $movies->getMovie()->getMovieID(), getDecodedData()->data->renterid);

    $history->post($history->getmovieid(), $history->getRenterid());

    $database->close();
}

include(TEMPLATES_PATH . "navigation.php");
$path = "background: url('img/movie-images/" . preg_replace("/[^ \w]+/", "", $movieTitle);
?>


<main class="mdl-layout__content">
    <div class="mdl-grid movie">
        <div id="back" class="mdl-card mdl-shadow--4dp"></div>
        <div class="mdl-cell--8-col texts" id="texts">
            <div class="flex">
                <div class="test">
                    <h1><?php echo $movieTitle; ?></h1>
                    <p><?php echo $movies->getMovie()->getDescription(); ?></p>
                </div>
                <div style="<?php echo $path ?>/cover/image-cover.jpg') center / cover;"
                     class="mdl-card banner mdl-shadow--6dp mdl-cell--4-col"></div>
            </div>
        </div>
        <div class="mdl-cell--8-col texts" id="infoText">
            <div class="flex mDesc">
                <div class="padd">
                    <ul class="mdl-list">
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content movieInfo">
                                <i class="material-icons mdl-list__item-icon">movie</i>
                                Directors
                            </span>
                        </li>
                    </ul>
                    <?php
                    $movies->printDirectors();
                    ?>
                    <ul class="mdl-list">
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content movieInfo">
                                <i class="material-icons mdl-list__item-icon">person</i>
                                Actors
                            </span>
                        </li>
                    </ul>
                    <?php
                    $movies->printActors();
                    ?>
                    <ul class="mdl-list">
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content movieInfo">
                                <i class="material-icons mdl-list__item-icon">location_city</i>
                                Category
                            </span>
                        </li>
                    </ul>
                    <?php
                    $movies->printCategories();
                    ?>
                    <ul class="mdl-list">
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content movieInfo">
                                <i class="material-icons mdl-list__item-icon">today</i>
                                Release date
                            </span>
                        </li>
                    </ul>
                    <?php
                    $movies->printDate();
                    ?>

                </div>
                <div class="buttons flex column">
                    <?php
                    $movies->rentOrWatch($movieTitle);
                    ?>
                    <button name="<?php echo $movies->getMovie()->getMovieID(); ?>"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-shadow--6dp addWatchLater">
                        Watch Later
                    </button>
                </div>
            </div>
        </div>
        <div class="mdl-card mdl-cell--6-col mdl-shadow--4dp imgM"
             style="<?php echo $path ?>/image-1.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--4-col mdl-shadow--4dp imgM"
             style="<?php echo $path ?>/image-2.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--4-col mdl-shadow--4dp imgM"
             style="<?php echo $path ?>/image-3.jpg') center / cover;"></div>
        <div class="mdl-card mdl-cell--6-col mdl-shadow--4dp imgM"
             style="<?php echo $path ?>/image-4.jpg') center / cover;"></div>

        <div class="mdl-cell--6-col mdl-card mdl-shadow--4dp rews">
            <ul class="mdl-list">
                <li class="mdl-list__item">
                    <span class="mdl-list__item-primary-content movieInfo">
                        <i class="material-icons mdl-list__item-icon">rate_review</i>
                        Reviews
                    </span>
                </li>
            </ul>
            <?php
            $movies->printReviews();
            ?>
        </div>

        <div class="mdl-cell--4-col contR">
            <form class="mdl-card mdl-shadow--4dp reviewW" action="#">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <textarea class="mdl-textfield__input" type="text" rows="3" id="reviewText"></textarea>
                    <label class="mdl-textfield__label" for="reviewText">Review</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield ratingI">
                    <input class="mdl-textfield__input" style="text-align: center;" type="text" id="rating"
                           pattern="^[0-9]{1}$" value="1" disabled>
                    <label class="mdl-textfield__label" for="rating">Rating</label>
                    <span class="mdl-textfield__error">Input is not one number!</span>
                </div>
                <input class="mdl-slider mdl-js-slider" type="range"
                       min="1" max="9" value="0" step="1" tabindex="0" title="" oninput="showVal(this.value)">
                <input id="movieId" style="display:none" value="<?php echo $movies->getMovie()->getMovieID(); ?>"
                       title="">
            </form>

            <button class="subR mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-shadow--8dp"
                    type="button"
                    id="addReview">
                <i class="material-icons">add</i>
            </button>
        </div>

    </div>
    <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>

    <?php
    $movies->printMovieVideo();
    ?>

    <script>
        $(document).ready(function () {
            var height = $("#infoText").outerHeight(true) + $("#texts").outerHeight(true) - 39;

            $("#back").css("height", height);
        });
    </script>
    <div id="watchLaterS" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
    <script type="text/javascript" src="../public/js/watchLater.js"></script>
    <script type="text/javascript" src="../public/js/addReview.js"></script>
</main>
</div>
