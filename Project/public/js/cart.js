function addToCart(movieTitle) {
    var movies = [];

    if (localStorage.movies) {
        movies = JSON.parse(localStorage.getItem("movies"));
    }

    if (movies.indexOf(movieTitle) === -1) {
        movies.push(movieTitle);

        localStorage.setItem("movies", JSON.stringify(movies));
    }
}
