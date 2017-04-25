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

cart.setAttribute("data-badge", movies.length.toString());
