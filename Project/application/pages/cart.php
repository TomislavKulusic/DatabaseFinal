<?php

include(TEMPLATES_PATH . "navigation.php");

?>
<main class="mdl-layout__content">
    <div class="flex">
        <div id="items" class="flex column">

        </div>

        <div id="checkout">

        </div>
    </div>
</main>

<script>
    var items = document.getElementById("items");
    var movies = [];
    if (localStorage.movies)
        movies = JSON.parse(localStorage.getItem("movies"));

    var x = "";

    for (var i = 0; i < movies.length; i++) {
        x += '<div class="item flex">' +
            '<div class="img img1">' +
            '</div>' +
            '<div class="title">' + movies[i] + '</div>' +
            '</div>';
    }

    items.innerHTML = x;
</script>

</div>