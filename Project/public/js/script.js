function addSelect(element, what) {
    document.getElementById("add" + what + "B").remove();

    var label = document.createElement("label");

    var select = document.createElement("select");
    select.appendChild(new Option("Select " + what));

    label.appendChild(select);
    label.className = "selectors";

    var button = document.createElement("button");
    button.className = "mdl-button mdl-js-button mdl-button--icon";
    button.type = "button";
    button.setAttribute("onclick", "addSelect(this.parentElement, '" + what + "')");
    button.id = "add" + what + "B";

    var i = document.createElement("i");
    i.className = "material-icons";
    i.appendChild(document.createTextNode("add_circe_outline"));

    button.appendChild(i);

    label.appendChild(button);

    element.parentElement.insertBefore(label, element.nextSibling);
}

if (document.cookie) {
    $.post('../application/pages/check.php?action=authenticate&' + document.cookie, function (resp) {
        if (resp.done()) {
            alert("YAY");
        } else {
            alert("NAY");
            /*deleteAllCookies();

            window.location.replace("index.php?page=Login");*/
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
}