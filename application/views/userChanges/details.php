<?php
    echo '<h1><a href="' .URL. '">Oglasnik</a></h1>';
    echo '<h2>Korisnički podaci</h2>';
    echo '<form method="post" action="' .URL. '/userChanges/savedata">';
    echo '<p>Ime: <input type="text" name="ime" value="' . $data->ime . '"></p>';
    echo '<p>Prezime: <input type="text" name="prezime" value="' . $data->prezime . '"></p>';
    echo '<p>Zupanija: <select name="zupanija">';
    foreach($zupanije as $zupanija) {
        echo '<option value="' . $zupanija->id_zupanija . '"';
        if ($data->id_zupanija == $zupanija->id_zupanija) {
            echo 'selected="selected"';
        }
        echo '>' . $zupanija->naziv . '</option>';
    }
    echo '</select></p>';
    echo '<p>Broj telefona: <input type="tel" name="tel" value="' . $data->br_tel . '"></p>';
    echo '<p>Email: <input type="email" name="email" value="' . $data->email . '"></p>';
    echo '<p><input type="submit" name="submit" value="Spremi promjene"></p>';
    echo '</form>';

    echo '<a href="' .URL. '/dash">Natrag</a>';