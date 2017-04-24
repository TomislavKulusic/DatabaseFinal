function addToCart(movieId) {
    if (localStorage.movies)
        localStorage.movies += "|";
    else
        localStorage.movies = "";

    localStorage.movies += movieId;
}