/**
 * Created by Kovacevic on 4/28/2017.
 */

$(document).ready(function () {

    $("#addReview").click(function () {

        if (!($("#reviewText").val().length === 0)) {

            $.post('js/addReviewMovie.php?review=' + $("#reviewText").val() + "&rating=" + $("#rating").val() + "&movieid=" + $("#movieId").val(), function (resp) {

                console.log(resp);


            });

        } else {
            console.log("Text je prazan!");
        }

        $("#reviewText").val("");

    });

});



