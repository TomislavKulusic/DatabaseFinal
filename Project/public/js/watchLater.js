/**
 * Created by Tomislav on 4/27/2017.
 */

$(document).ready(function () {

    $("#test").click(function () {
        $.post('js/watchLaterMovies.php?movieid=' + this.name, function (resp) {


        });
        // $.post('js/watchLaterMovies.php', function (resp) {
        // });
    });


});



