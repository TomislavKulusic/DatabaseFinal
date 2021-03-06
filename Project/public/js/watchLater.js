/**
 * Created by Tomislav on 4/27/2017.
 */

$(document).ready(function () {

    $(".addWatchLater").click(function () {

        $.post('../application/library/watchLater.php?movieid=' + this.name + '&cookie=' + getCookie("user"), function (resp) {
            'use strict';
            var data = {message: resp};
            document.querySelector('#watchLaterS').MaterialSnackbar.showSnackbar(data);
        });
    });

});

function removeWatchL(id, elem) {
    $.post('../application/library/watchLater.php?remove&movieid=' + id + '&cookie=' + getCookie("user"), function (resp) {
        if (resp !== "Movie already removed!")
            elem.parentNode.remove();

        'use strict';
        var data = {message: resp};
        document.querySelector('#watchLaterS').MaterialSnackbar.showSnackbar(data);
    });
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');

    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];

        while (c.charAt(0) == ' ')
            c = c.substring(1);

        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }

    return "";
}



