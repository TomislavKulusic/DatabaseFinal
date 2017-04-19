<?php
/**
 * Created by IntelliJ IDEA.
 * User: Frano
 * Date: 14. 4. 2017.
 * Time: 11:14 AM
 */

$page = 'Rented Movies';
$path = '../';

include($path . 'assets/includes/header.php');
include($path . 'assets/includes/navigation.php');
?>
<main class="mdl-layout__content">
    <h3>Rented Movies</h3>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col demo-card-image mdl-card mdl-shadow--4dp">
            <div class="vignette"></div>
            <div class="mdl-card__title mdl-card--expand"></div>
            <div class="mdl-card__actions">
                <span class="demo-card-image__filename">Wings</span>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col demo-card-image mdl-card mdl-shadow--4dp">
            <div class="vignette"></div>
            <div class="mdl-card__title mdl-card--expand"></div>
            <div class="mdl-card__actions">
                <span class="demo-card-image__filename">Cimarron</span>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col demo-card-image mdl-card mdl-shadow--4dp">
            <div class="vignette"></div>
            <div class="mdl-card__title mdl-card--expand"></div>
            <div class="mdl-card__actions">
                <span class="demo-card-image__filename">It Happened One Night</span>
            </div>
        </div>
    </div>
</main>
</div>
<?php

include($path . 'assets/includes/footer.php');

?>
