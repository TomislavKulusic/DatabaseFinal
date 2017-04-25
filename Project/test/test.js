$.post('test.php?action=authenticate&' + document.cookie, function (resp) {
    //alert(resp);
    if (resp.success === true) {
        document.innerHTML = "YAY";
    }
    else {
        document.innerHTML = "NAY";
    }
}, 'json');