<?php

if (isset($_POST['movie'])) {
//TODO
} else if (isset($_POST['delete'])) {
	
	//Getting the input from the input box in the HTML name:inputDeletee
	$movie_id =  $_POST['inputDelete'];
	
	//Connecting to a databasee
	$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);
	
	//Creating a movie with a id from the input
	$movie = new Movie($movie_id, "", "", "","", $database);
	
	//Deleting a movie.
	$movie->delete();
	
	
	
} else if (isset($_POST['director'])) {

	$director_fn =  $_POST['directorFN'];
	$director_ln =  $_POST['directorLN'];
	
	
	//Connecting to a database
	$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);
	
	//Creating a director from input
	$director = new Director(null, $director_fn, $director_ln, $database);
	
	//Deleting a movie.
	$director->post();

	
	
} else if (isset($_POST['category'])) {
	
	$category_id =  $_POST['categoryID'];
	$category_name =  $_POST['categoryNAME'];
	
	
	//Connecting to a databasee
	$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);
	
	//Creating a actor from input
	$category = new Category($category_id, $category_name);
	
	//Deleting a movie.
	$category->post();
	

} else if (isset($_POST['actor'])) {

	
	$actor_id =  $_POST['actorID'];
	$actor_fn =  $_POST['actorFN'];
	$actor_ln =  $_POST['actorLN'];
	
	//Connecting to a database
	$database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);
	
	//Creating a actor from input
	$actor = new Actor($actor_id, $actor_fn, $actor_ln, $database);
	
	//Deleting a movie.
	$actor->post();
	
}

?>


<div id="addMovieForm">
    <div class="mdl-grid">
        <form class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
            <h3>Director</h3>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="directorFN" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample5">
                <label class="mdl-textfield__label" for="sample5">Director First Name</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="sample6">
                <label input="directorLN" class="mdl-textfield__label" for="sample6">Director Last Name</label>
            </div>
            <button class="mdl-button mdl-js-button mdl-button--primary" name="director">
                Add
            </button>
        </form>

        <form class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
            <h3>Category</h3>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="categoryID" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample7">
                <label class="mdl-textfield__label" for="sample7">Category ID</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="categoryNAME" class="mdl-textfield__input" type="text" id="sample8">
                <label class="mdl-textfield__label" for="sample8">Category Name</label>
            </div>
            <button class="mdl-button mdl-js-button mdl-button--primary" name="category">
                Add
            </button>
        </form>

		<!--  ACTOR  -->

        <form class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
            <h3>Actor</h3>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="actorID" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample9">
                <label class="mdl-textfield__label" for="sample9">Actor ID</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="actorFN" class="mdl-textfield__input" type="text" id="sample10">
                <label class="mdl-textfield__label" for="sample10">First Name</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="actorLN" class="mdl-textfield__input" type="text" id="sample11">
                <label class="mdl-textfield__label" for="sample11">Last Name</label>
            </div>
            <button class="mdl-button mdl-js-button mdl-button--primary" name="actor">
                Add
            </button>
        </form>

        <form class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
            <h3>Movie</h3>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample1">
                <label class="mdl-textfield__label" for="sample1">Movie ID</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="sample2">
                <label class="mdl-textfield__label" for="sample2">Movie Title</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="sample3">
                <label class="mdl-textfield__label" for="sample3">Movie Description</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" pattern="^(\d{1,2})-(\d{1,2})-(\d{4})$" id="sample12">
                <label class="mdl-textfield__label" for="sample12">Release Date</label>
                <span class="mdl-textfield__error">Input is not a date!</span>
            </div>
            <label class="selectors">
                <select>
                    <option>Select Category</option>
                </select>
                <!--<button class="mdl-button mdl-js-button mdl-button--icon" type=button
                    onclick="addSelect(this.parentElement, 'Category')" id="addCategoryB">
                    <i class="material-icons">add_circe_outline</i>
                </button>-->
            </label>
            <label class="selectors">
                <select>
                    <option>Select Director</option>
                </select>
                <button class="mdl-button mdl-js-button mdl-button--icon" type=button
                        onclick="addSelect(this.parentElement, 'Director')" id="addDirectorB">
                    <i class="material-icons">add_circe_outline</i>
                </button>
            </label>
            <label class="selectors">
                <select>
                    <option>Select Actor</option>
                </select>
                <button class="mdl-button mdl-js-button mdl-button--icon" type=button
                        onclick="addSelect(this.parentElement, 'Actor')" id="addActorB">
                    <i class="material-icons">add_circe_outline</i>
                </button>
            </label>
            <button class="mdl-button mdl-js-button mdl-button--primary" name="movie">
                Add
            </button>
        </form>

        <form class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--6dp">
            <h3>Delete Movie</h3>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="inputDelete" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample30">
                <label class="mdl-textfield__label" for="sample30">Movie ID</label>
                <span class="mdl-textfield__error">Input is not a number!</span>
            </div>
            <button class="mdl-button mdl-js-button mdl-button--primary" name="delete">
                Delete
            </button>
        </form>
    </div>
</div>