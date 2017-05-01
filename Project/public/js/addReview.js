/**
 * Created by Kovacevic on 4/28/2017.
 */

$(document).ready(function () {

    $("#addReview").click(function () {

        if (($("#reviewText").val().length !== 0) && !$("#rating").val().length !== 0) {
            $.post('js/addReviewMovie.php?review=' + $("#reviewText").val() + "&rating=" + $("#rating").val() + "&movieid=" + $("#movieId").val(), function (resp) {

            });

        } else {
            alert("Please fill all inputs before submitting");
        }

        $("#reviewText").val("");
        $("#rating").val("");

    });

});



