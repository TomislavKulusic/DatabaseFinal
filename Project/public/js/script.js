function addSelect(element, what, counter) {
    document.getElementById("add" + what + "B").remove();

    var options = document.getElementById("options" + what);

    var label = document.createElement("label");
    var counter1 = counter + 1;
    var counterInt = parseInt(counter1);

    var select = document.createElement("select");
    select.appendChild(new Option("Select " + what));
    select.name = what + counter1;

    label.appendChild(select);
    label.className = "selectors";

    var button = document.createElement("button");
    button.className = "mdl-button mdl-js-button mdl-button--icon";
    button.type = "button";
    button.setAttribute("onclick", "addSelect(this.parentElement, '" + what + "'," + counterInt + ")");
    button.id = "add" + what + "B";

    var i = document.createElement("i");
    i.className = "material-icons";
    i.appendChild(document.createTextNode("add_circe_outline"));

    button.appendChild(i);

    label.appendChild(button);

    element.parentElement.insertBefore(label, element.nextSibling);

    select.innerHTML = options.innerHTML;
}

var movies = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '../application/library/search.php',
    remote: {
        url: '../application/library/search.php?query=%QUERY',
        wildcard: '%QUERY'
    }
});

$('#remote .typeahead').typeahead(null, {
    name: 'movies',
    display: 'movie_title',
    source: movies
});

$('#searchB').click(function () {
    $('#search').css("visibility", "visible");
    $('#search').focus();
});

$(document).ready(function() {
    $(document.body).delegate('#searchF', 'keypress', function(e) {
        if (e.which === 13) { // if is enter
            location.href = 'index.php?page=Movie&' + $('#searchF').serialize();
        }
    });
});

/*if (document.cookie) {
 $.post('../application/pages/check.php?action=authenticate&' + document.cookie, function (resp) {
 if (resp.done()) {
 alert("YAY");
 } else {
 alert("NAY");
 /!*deleteAllCookies();

 window.location.replace("index.php?page=Login");*!/
 }
 }, 'json');
 }

 function deleteAllCookies() {
 var cookies = document.cookie.split(";");

 for (var i = 0; i < cookies.length; i++) {
 var cookie = cookies[i];
 var eqPos = cookie.indexOf("=");
 var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
 document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
 }
 }*/