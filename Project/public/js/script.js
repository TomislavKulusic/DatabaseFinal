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