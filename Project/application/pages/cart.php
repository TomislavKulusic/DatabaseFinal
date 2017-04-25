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
    var movies = localStorage.getItem("movies").split(",");
    var x = "";

    for(var i = 0; i < movies.length; i++){

        x += '<div class="item">' +
                '<div class="img'+(i+1)+'">' +
                '</div>' +
            '</div>'

    }

    items.innerHTML = x;




</script>

</div>