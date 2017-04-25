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
    }
}

function removeCart(movieTitle) {
    if (localStorage.movies) {
        movies = JSON.parse(localStorage.getItem("movies"));
    }

    movies.splice(movies.indexOf(movieTitle), 1);

    localStorage.setItem("movies", JSON.stringify(movies));

    document.getElementById(movieTitle).remove();
    cart.setAttribute("data-badge", movies.length.toString());

    document.getElementsByTagName("h3")[0].innerHTML = "Cart (" + movies.length + ")";
}

cart.setAttribute("data-badge", movies.length.toString());
