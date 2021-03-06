<?php

include_once(LIBRARY_PATH . 'TheDatabase.php');
include_once(LIBRARY_PATH . 'Actor.php');
include_once(LIBRARY_PATH . 'Category.php');
include_once(LIBRARY_PATH . 'Director.php');
include_once(LIBRARY_PATH . 'Movie.php');
include_once(LIBRARY_PATH . 'check.php');
include_once(LIBRARY_PATH . 'Privileges.php');

include(TEMPLATES_PATH . "navigation.php");

$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);

$user = "";

if (isset($_POST['movie'])) {

    $movie_title = $_POST['movie_title'];
    $movie_description = $_POST['movie_description'];
    $movie_date = $_POST['movie_date'];
    $category_id = $_POST['category'];
    $director_id = $_POST['Director1'];
    $movie_link = $_POST['movie_link'];

    $movie = new Movie('', $movie_title, $movie_description, $category_id, $movie_date, $movie_link, $database); //Testing with NULL

    if ($database->connect()) {

        $database->startTransaction();

        //Adding movie
        $movie->postNoId();

        $movie_id = $database->getLastID();

        // ADDING ACTOR

        $counter = 1;
        $movie_actors_query = "INSERT INTO movie_actors (movie_id, actor_id) VALUES ";
        $values = [];

        while (isset($_POST['Actor' . $counter])) {
            array_push($values, $movie_id, $_POST['Actor' . $counter]);

            if ($counter != 1)
                $movie_actors_query .= ",";

            $movie_actors_query .= "(? , ?)";

            $counter = $counter + 1;
        }

        $database->setData($movie_actors_query, $values);

        // ADDING DIRECTOR

        $director_actors_query = "INSERT INTO movie_directors (director_id, movie_id) VALUES ";
        $values = [];
        $counter = 1;

        while (isset($_POST['Director' . $counter])) {
            array_push($values, $_POST['Director' . $counter], $movie_id);

            if ($counter != 1)
                $director_actors_query .= ",";

            $director_actors_query .= "(? , ?)";

            $counter = $counter + 1;
        }

        $database->setData($director_actors_query, $values);

        $database->endTransaction();

        $database->close();
    }


} else if (isset($_POST['delete']) && $canDelete) {

    //Getting the input from the input box in the HTML name:inputDeletee
    $movie_id = $_POST['inputDelete'];

    //Connecting to a databasee

    if ($database->connect()) {
        //Creating a movie with a id from the input
        $movie = new Movie($movie_id, "", "", "", "", "", $database);

        //Deleting a movie.
        $movie->delete();

        $database->close();

    }


} else if (isset($_POST['director'])) {

    $director_fn = $_POST['directorFN'];
    $director_ln = $_POST['directorLN'];

    //Connecting to a database

    if ($database->connect()) {

        //Creating a director from input
        $director = new Director(null, $director_fn, $director_ln, $database);

        //Deleting a movie.
        $director->post();

        $database->close();

    }

} else if (isset($_POST['category'])) {

    // $category_id = $_POST['categoryID'];
    $category_name = $_POST['categoryNAME'];

    //Connecting to a databasee

    if ($database->connect()) {
        //Creating a actor from input
        $category = new Category('', $category_name);

        //Deleting a movie.
        $category->post();

        $database->close();
    }

} else if (isset($_POST['actor'])) {

    //  $actor_id = $_POST['actorID'];
    $actor_fn = $_POST['actorFN'];
    $actor_ln = $_POST['actorLN'];

    //Connecting to a database

    if ($database->connect()) {

        //Creating a actor from input
        $actor = new Actor(null, $actor_fn, $actor_ln, $database);

        //Deleting a movie.
        $actor->post();
    }

    $database->close();

}

if ($database->connect()) {

    $queryCategory = "SELECT * FROM Category;";
    $queryDirector = "SELECT * FROM directors;";
    $queryActor = "SELECT * FROM Actors;";

    $arrayCat = array("", "");
    $arrayDir = array("", "", "", "");
    $arrayAct = array("", "", "", "");

    $resultCategory = $database->getDataClass($queryCategory, null, 'Category', $arrayCat);
    $resultDirector = $database->getDataClass($queryDirector, null, 'Director', $arrayDir);
    $resultActor = $database->getDataClass($queryActor, null, 'Actor', $arrayAct);

    $database->close();
}

?>

<main class="mdl-layout__content">
    <div id="addMovieForm">
        <div class="mdl-grid">
            <form action="<?php echo $_SERVER["PHP_SELF"] . '?page=AddMovie'; ?>" method="post"
                  class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
                <h3>Director</h3>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="directorFN" class="mdl-textfield__input" type="text" pattern="[a-zA-Z0-9]+"
                           id="sample5">
                    <label class="mdl-textfield__label" for="sample5">Director First Name</label>
                    <span class="mdl-textfield__error">Input is not a number!</span>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="directorLN" class="mdl-textfield__input" type="text" id="sample6"
                           pattern="[a-zA-Z0-9]+">
                    <label class="mdl-textfield__label" for="sample6">Director Last Name</label>
                </div>
                <button class="mdl-button mdl-js-button mdl-button--primary" name="director">
                    Add
                </button>
            </form>

            <form action="<?php echo $_SERVER["PHP_SELF"] . '?page=AddMovie'; ?>" method="post"
                  class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
                <h3>Category</h3>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="categoryNAME" class="mdl-textfield__input" type="text" id="sample8">
                    <label class="mdl-textfield__label" for="sample8">Category Name</label>
                </div>
                <button class="mdl-button mdl-js-button mdl-button--primary" name="category">
                    Add
                </button>
            </form>

            <!--  ACTOR  -->

            <form action="<?php echo $_SERVER["PHP_SELF"] . '?page=AddMovie'; ?>" method="post" name="actor"
                  class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
                <h3>Actor</h3>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="actorFN" class="mdl-textfield__input" type="text" id="sample10" pattern="^[a-zA-Z]+$">
                    <label class="mdl-textfield__label" for="sample10">First Name</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="actorLN" class="mdl-textfield__input" type="text" id="sample11" pattern="^[a-zA-Z]+$">
                    <label class="mdl-textfield__label" for="sample11">Last Name</label>
                </div>
                <button class="mdl-button mdl-js-button mdl-button--primary" name="actor">
                    Add
                </button>
            </form>

            <form action="<?php echo $_SERVER["PHP_SELF"] . '?page=AddMovie'; ?>" method="post" name="movie"
                  class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
                <h3>Movie</h3>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="movie_title" class="mdl-textfield__input" type="text" id="sample2">
                    <label class="mdl-textfield__label" for="sample2">Movie Title</label>
                    <span class="mdl-textfield__error">Input is not valid</span>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <textarea name="movie_description" class="mdl-textfield__input" type="text" rows="3"
                              id="sample3"></textarea>
                    <label class="mdl-textfield__label" for="sample3">Movie Description</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="movie_link" class="mdl-textfield__input" type="text" id="sample54">
                    <label class="mdl-textfield__label" for="sample54">Movie Link</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="movie_date" class="mdl-textfield__input" type="text"
                           pattern="^(\d{4})-(\d{1,2})-(\d{1,2})$" id="sample12">
                    <label class="mdl-textfield__label" for="sample12">Release Date</label>
                    <span class="mdl-textfield__error">Input is not a date!</span>
                </div>
                <label class="selectors">
                    <select name="category">
                        <option>Select Category</option>
                        <?php

                        foreach ($resultCategory as $category) {
                            echo("<option value='" . $category->getCategoryId() . "' >" . $category->getCategoryName() . "</option>");
                        }

                        ?>
                    </select>
                </label>
                <label class="selectors">
                    <select name="Director1">
                        <option>Select Director</option>
                        <?php

                        foreach ($resultDirector as $director) {
                            echo("<option value='" . $director->getDirectorId() . "' >" . $director->getFullName() . "</option>");
                        }

                        ?>
                    </select>
                    <button class="mdl-button mdl-js-button mdl-button--icon" type=button
                            onclick="addSelect(this.parentElement, 'Director', 1)" id="addDirectorB">
                        <i class="material-icons">add_circe_outline</i>
                    </button>
                </label>
                <label class="selectors">
                    <select name="Actor1">
                        <option>Select Actor</option>
                        <?php

                        foreach ($resultActor as $actor) {
                            echo("<option value='" . $actor->getActorId() . "' >" . $actor->getFullName() . "</option>");
                        }

                        ?>
                    </select>
                    <button class="mdl-button mdl-js-button mdl-button--icon" type=button
                            onclick="addSelect(this.parentElement, 'Actor', 1)" id="addActorB">
                        <i class="material-icons">add_circe_outline</i>
                    </button>
                </label>
                <button class="mdl-button mdl-js-button mdl-button--primary" name="movie">
                    Add
                </button>
            </form>

            <form action="<?php echo $_SERVER["PHP_SELF"] . '?page=AddMovie'; ?>" method="post" name="delete"
                  class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
                <h3>Delete Movie</h3>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input name="inputDelete" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                           id="sample30">
                    <label class="mdl-textfield__label" for="sample30">Movie ID</label>
                    <span class="mdl-textfield__error">Input is not a number!</span>
                </div>
                <button class="mdl-button mdl-js-button mdl-button--primary" name="delete">
                    Delete
                </button>
            </form>
        </div>


        <div style="display:none" id="optionsDirector">

            <option>Select Director</option>
            <?php

            foreach ($resultDirector as $director) {
                echo("<option value='" . $director->getDirectorId() . "' >" . $director->getFullName() . "</option>");
            }

            ?>

        </div>

        <div style="display:none" id="optionsActor">

            <option>Select Actor</option>

            <?php

            foreach ($resultActor as $actor) {
                echo("<option value='" . $actor->getActorId() . "' >" . $actor->getFullName() . "</option>");
            }

            ?>

        </div>
    </div>
</main>
</div>