<?php
echo '<h1><a href=" ' .URL. '">Oglasnik</a></h1>';
echo '<h2>Pregled statistike</h2>';

echo '<p>Broj registriranih korisnika: ' . $users->count . '</p>';
echo '<p>Broj oglasa u bazi: '.$oglasi->count.'</p>';
echo '<p>Broj kategorija: '.$kategorije->count.'</p>';
echo '<p>Broj prijava u sustav: '.$logs->count.'</p>';
echo '<p>Broj pregleda svih oglasa: '.$pogledi->count.'</p>';

echo '<p><a href=" ' .URL. '/dash">Natrag</a></p>';