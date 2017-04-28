<?php

include(TEMPLATES_PATH . "navigation.php");

$counter = 0;

if (isset($_POST["movie_title$counter"])) {
    include_once(LIBRARY_PATH . "Movie.php");
    include_once(LIBRARY_PATH . "TheDatabase.php");
    include_once(LIBRARY_PATH . "Renter.php");

    $database = new TheDatabase($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbName']);

    if ($database->connect()) {
        while (isset($_POST['movie_title' . $counter])) {
            $movie = new Movie("", $_POST["movie_title$counter"], "", "", "", "", $database);

            $movie->fetchN(null);

            $date = date("Y-m-d");

            $movie->setRentalDate($date);

            $movie->setDueDate(date("Y-m-d", strtotime("$date +7 day")));

            $renter = new Renter("", "", "", "", "", "", $database);

            $renter->fetchU(getDecodedData()->data->username);

            $movie->postMR($renter->getRenterID());

            $counter = $counter + 1;
        }

        $database->close();
    }
}

?>

<main class="mdl-layout__content">
    <h3>Cart</h3>
    <div class="flex cart">
        <form id="items" class="flex column" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=Cart">

        </form>

        <div id="checkout">
            <h4>Summary</h4>
            <div class="flex">
                <div id="text">Subtotal<br></div>
                <div id="price"></div>
            </div>
            <button type="submit" form="items"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                CHECKOUT NOW
            </button>
        </div>
    </div>
    <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
</main>

<script>
    function fillCart() {
        var items = document.getElementById("items");
        var price = document.getElementById("price");
        var movies = [];
        if (localStorage.movies)
            movies = JSON.parse(localStorage.getItem("movies"));

        var x = "";

        for (var i = 0; i < movies.length; i++) {
            x += '<div class="item flex" id="' + movies[i] + '">' +
                '<div class="img img1">' +
                '</div>' +
                '<div class="flex spaceBetween"><div class="title">' + movies[i] + '</div>' +
                '<button class="mdl-button mdl-js-button mdl-button--icon" onclick="removeCart(\'' + movies[i] + '\')">' +
                '<i class="material-icons">clear</i>' +
                '</button><input name="movie_title' + i + '" type="text" style="display: none;" value="' + movies[i] + '"></div>' +
                '</div>';
        }

        items.innerHTML = x;
        price.innerHTML = movies.length * 10 + "$";
        document.getElementById("cartN").setAttribute("data-badge", movies.length.toString());
        document.getElementsByTagName("h3")[0].innerHTML = "Cart (" + movies.length + ")";
    }
    fillCart();

</script>

</div>