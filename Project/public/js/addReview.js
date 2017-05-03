/**
 * Created by Kovacevic on 4/28/2017.
 */

$(document).ready(function () {

    $("#addReview").click(function () {
        var review = $("#reviewText").val();
        var rating = $("#rating").val();

        if (review.length !== 0 && !rating.length !== 0) {
            var reviewsD = $(".rews");
            var reviews = reviewsD.html();

            $.post('../application/library/addReviewMovie.php?review=' + review + "&rating=" + rating + "&movieid=" + $("#movieId").val(), function (resp) {
                if (reviews !== "<h5>Reviews</h5>")
                    reviewsD.html(reviews + "<hr>");

                reviews = reviewsD.html();

                reviewsD.html(reviews + "<b>Rating:</b> " + rating + " <b>Comment:</b> " + review + "<br>");

                $("#reviewText").val("");
                $("#rating").val("");
            });
        } else {
            alert("Please fill all inputs before submitting");
        }

    });

});

function showVal(value) {
    $("#rating").val(value);
}



//" . $review->getRating() . " <b>Comment:</b> " . $review->getReview() . "<br>"