var movies = [];

function addToCart(movieId) {
    movies.push(movieId);
    localStorage.setItem("movies", movies);
}
