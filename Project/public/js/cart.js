var movies = [];
var cart = document.getElementById("cartN");

if (localStorage.movies)
    movies = JSON.parse(localStorage.getItem("movies"));

function addToCart(movieTitle) {
    if (localStorage.movies) {
        movies = JSON.parse(localStorage.getItem("movies"));
    }

    if (movies.indexOf(movieTitle) === -1) {
        movies.push(movieTitle);

        localStorage.setItem("movies", JSON.stringify(movies));
        cart.setAttribute("data-badge", movies.length.toString());

        'use strict';
        var snackbarContainer = document.querySelector('#demo-toast-example');
        var data = {message: movieTitle + ' added to cart!'};
        snackbarContainer.MaterialSnackbar.showSnackbar(data);
    }
}

$('#items').submit(function() {
    localStorage.clear();

    return true;
});

function removeCart(movieTitle) {
    var disable = true;

    if (localStorage.movies) {
        movies = JSON.parse(localStorage.getItem("movies"));
    }

    var undoMovieIndex = movies.indexOf(movieTitle);

    movies.splice(movies.indexOf(movieTitle), 1);

    localStorage.setItem("movies", JSON.stringify(movies));

    document.getElementById(movieTitle).remove();
    cart.setAttribute("data-badge", movies.length.toString());

    document.getElementsByTagName("h3")[0].innerHTML = "Cart (" + movies.length + ")";

    'use strict';
    var snackbarContainer = document.querySelector('#demo-snackbar-example');
    var handler = function () {
        if (disable) {
            movies.splice(undoMovieIndex, 0, movieTitle);
            localStorage.setItem("movies", JSON.stringify(movies));
            fillCart();
            disable = false; //FOOLPROOF 101
        }
    };
    var data = {
        message: movieTitle + ' removed from cart!',
        timeout: 2000,
        actionHandler: handler,
        actionText: 'Undo'
    };

    document.getElementById("price").innerHTML = movies.length * 10 + "$";
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
}

if (cart)
    document.getElementById("cartN").setAttribute("data-badge", movies.length.toString());