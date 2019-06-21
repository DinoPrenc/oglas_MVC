<?php
echo '<h1><a href="' .URL. '">Oglasnik</a></h1>';
echo '<h2>Oglasi</h2>';
echo '<form method="post" action="' .URL. '/pretraga/privatni">';
echo '<p>Trazi: <input type="text" name="search"></p>';
echo '<p>Sortiraj<select name="order">';
echo '<option value="ASC">Cijena od vece</option>';
echo '<option value="DESC">Cijena od manje</option>';
echo '</select></p>';
echo '<p>Kategorija<select name="kategorija">';
echo '<option value=0>Sve kategorije</option>';
foreach ($kategorije as $kategorija){
    echo '<option value=' . $kategorija->id_kategorija . '>' . $kategorija->naziv . '</option>';
}
echo '</select></p>';
echo '<p><input type="submit" name="trazi" value="Pretrazi"></p>';
echo '<form>';
echo '<table border=1>';
echo '<tr align="center">';
echo '<td>Naslov</td>';
echo '<td>Cijena</td>';
echo '</tr>';
foreach ($oglasi as $oglas){
    echo '<tr align="center">';
    echo '<td width=300px height=75px>' . $oglas->naslov . '</td>';
    echo '<td width=200px>' . $oglas->cijena . 'kn</td>';
    echo '<td width=120px><a href="' .URL. '/oglasi/izmjena_form/' . $oglas->id_oglas . '">IZMJENA</a></td>';
    echo '<td width=120px><a href="' .URL. '/oglasi/brisi/' . $oglas->id_oglas . '">BRISI</a></td>';
    echo '</tr>';
}
echo '</table>';