<?php
include_once(LIBRARY_PATH . "TheDatabase.php");
include_once(LIBRARY_PATH . "Renter.php");
$movieTitle = "";

if (isset($_GET['name']))
    $movieTitle = $_GET['name'];

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'],
    $config['db']['dbName']);

$rented = false;
$movie = "";

if ($database->connect()) {
    $user = new Renter("", getDecodedData()->data->username, "", "", "", "", $database);
    $user->fetchU(null);
    $user->setRentedMovies(false);
    $rented = $user->hasMovie($_GET['name']);
    $movie = new Movie("", $movieTitle, "", "", "", "", $database);
    $movie->fetchN(null);
    $movie->setAll();
    $database->close();
}

$reviews = $movie->getReviews();

include(TEMPLATES_PATH . "navigation.php");
$path = "background: url('img/movie-images/" . preg_replace("/[^ \w]+/", "", $movieTitle);
?>


<main class="mdl-layout__content">
    <div class="mdl-grid movie">
        <div class="mdl-cell--8-col texts">
            <div class="flex">
                <div class="test">
                    <h1><?php echo $movieTitle; ?></h1>
                    <p><?php echo $movie->getDescription(); ?></p>
                </div>
                <div style="<?php echo $path ?>/cover/image-cover.jpg') center / cover;"
                     class="mdl-card banner mdl-shadow--6dp mdl-cell--4-col"></div>
            </div>
        </div>
        <div class="mdl-cell--8-col texts">
            <div class="flex">
                <div>
                    <h5>Directors</h5>
                    <?php
                    foreach ($movie->getDirectors() as $director)
                        echo $director->getFullName() . "<br>";
                    ?>
                    <h5>Actors</h5>
                    <?php
                    foreach ($movie->getActors() as $actor)
                        echo $actor->getFullName() . "<br>";
                    ?>
                    <h5>Category</h5>
                    <?php
                    echo $movie->getCategory()[0]->getCategoryName();
                    ?>


                </div>
                <div class="buttons flex column">
                    <?php
                    if ($rented)
                        echo '<button id="show-dialog" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">' .
                            'Watch' .
                            '</button>';
                    else
                        echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick="addToCart(\'' . $_GET['name'] . '\')">' .
                            'Rent' .
                            '</button>';
                    ?>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
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
            <h5>Reviews</h5>
            <?php
            foreach ($reviews as $review) {
                echo "<b>Rating:</b> " . $review->getRating() . " <b>Comment:</b> " . $review->getReview() . "<br>";
                if ($review !== end($reviews))
                    echo '<hr>';
            }

            ?>
        </div>

        <div class="mdl-cell--4-col contR">
            <form class="mdl-card mdl-shadow--4dp reviewW" action="#">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <textarea class="mdl-textfield__input" type="text" rows="3" id="reviewText"></textarea>
                    <label class="mdl-textfield__label" for="reviewText">Review</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="rating" pattern="^[0-9]{1}$">
                    <label class="mdl-textfield__label" for="rating">Rating</label>
                    <span class="mdl-textfield__error">Input is not one number!</span>
                </div>
                <input id="movieId" style="display:none" value="<?php echo $movie->getMovieID(); ?>" title="">
            </form>

            <button class="subR mdl-button mdl-js-button mdl-button--fab mdl-button--colored" type="button"
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
    if ($rented)
        echo "<dialog class=\"mdl-dialog\">
    <h4 class=\"mdl-dialog__title\">" . $_GET['name'] . "</h4>
    <div class=\"mdl-dialog__content\">
    <iframe width=\"854\" height=\"480\" src=\"" . $movie->getMovieLink() . "\" frameborder=\"0\" allowfullscreen></iframe>
    </div>
    <div class=\"mdl-dialog__actions mdl-dialog__actions--full-width\">
      <button type=\"button\" class=\"mdl-button close\">Close</button>
    </div>
  </dialog>";
    ?>

    <script>
        var dialog = document.querySelector('dialog');
        var showDialogButton = document.querySelector('#show-dialog');
        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function() {
            dialog.close();
        });
    </script>

    <script type="text/javascript" src="../public/js/addReview.js"></script>
</main>
</div>
