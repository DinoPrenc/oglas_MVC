<h1><a href="<?php echo URL ?>">Oglasnik</a></h1>
    <h2>Kontrolna ploča</h2>
    <?php
    echo '<p>Bok, <strong>' . $_SESSION['ime'] . '</strong>. </p>'; ?>
    <p><a href="<?php echo URL ?>/oglasi/predaja">Predaja oglasa</a></p>
    <p><a href="<?php echo URL ?>/pretraga/privatni">Pregled oglasa</a></p>
    <hr>
    <p><a href="<?php echo URL ?>/userChanges/data">Pregled i promjena korisnickih podataka</a></p>
    <p><a href="<?php echo URL ?>/UserChanges">Promjena lozinke</a></p><br>
    <p><a href="<?php echo URL ?>/index">Povratak na pocetnu</a></p>
    <p><a href="<?php echo URL ?>/login/logout">ODJAVA</a></p>
    