<?php

include_once(LIBRARY_PATH . 'check.php');

?>

<div id="box">
    <div id="text">
        <h6>Rent it NOW!!1 (╯°□°）╯︵ /(.□. \)</h6>
        <h1>Movie Rental Page</h1>
        <div class="flex">
            <hr>
            <p>Lorem ipsum dolor sit amet, enim eiusmod commodo vel metus, vitae nec, tellus eros porta consectetuer.
                Nascetur et rutrum nunc nascetur dictumst est, consequat nulla. Cursus et adipiscing eu, adipiscing
                proin a ᵔᴥᵔ ut nunc. Wisi risus, eget sed neque libero. Volutpat lorem sed turpis vestibulum, venenatis
                eu et luctus auctor nulla, sollicitudin orci.</p>
        </div>
    </div>
    <div id="login" class="mdl-card mdl-shadow--6dp">
        <div id="img1"></div>
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#login-panel" class="mdl-tabs__tab is-active">Login</a>
                <a href="#register-panel" class="mdl-tabs__tab">Register</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="login-panel">
                <form id="loginForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="usernameIn" name="username"
                               pattern="^[a-zA-Z0-9_]*$">
                        <label class="mdl-textfield__label" for="usernameIn">Username</label>
                        <span class="mdl-textfield__error">Only letters and numbers!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="usernameIn" name="password">
                        <label class="mdl-textfield__label" for="usernameIn">Password</label>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                            name="login">Login
                    </button>
                </form>
            </div>
            <div class="mdl-tabs__panel" id="register-panel">
                <form id="registerForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="email" id="usernameIn" name="email">
                        <label class="mdl-textfield__label" for="usernameIn">Email</label>
                        <span class="mdl-textfield__error">Please enter valid email!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="usernameIn" name="username"
                               pattern="^[a-zA-Z0-9_]*$">
                        <label class="mdl-textfield__label" for="usernameIn">Username</label>
                        <span class="mdl-textfield__error">Only letters and numbers!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="usernameIn" name="password">
                        <label class="mdl-textfield__label" for="usernameIn">Password</label>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                            name="register">Register
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
/*        $("#loginForm").submit(function (e) {
            e.preventDefault();
            $.post('../application/pages/check.php?action=login', $("#loginForm").serialize(), function (data) {
                alert(data);
                var data = jQuery.parseJSON(data);
                alert(data);
                document.cookie = "tokanVal=" + data['resp']['jwt'];

                window.location.reload(true);
            });
        });*/
    </script>