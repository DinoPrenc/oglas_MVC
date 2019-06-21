<h1><a href="<?php echo URL ?>">Oglasnik</a></h1>
<h2>Izmjena oglasa</h2>
<form method="post" action="<?php echo URL ?>/oglasi/izmjena">      <!--testirat ako valja link za action -->
<?php
foreach($detalji as $detalj){
echo '<input type="hidden" name="id" value="' . $detalj->id_oglas . '">';
echo '<p>Naslov: <input type="text" name="naslov" value="' . $detalj->naslov . '"></p>';
echo '<p><textarea name="opis" rows="15" cols="60">' . $detalj->opis . '</textarea></p>';
echo '<p>Cijena: <input type="number" name="cijena" min="1" step="0.01" value="' . $detalj->cijena . '"></p>';
echo '<p>Kategorija<select name="kategorija">';
foreach ($kategorije as $kategorija){
    echo '<option value="' . $kategorija->id_kategorija . '"';
    if($kategorija->id_kategorija == $detalj->id_kategorija){echo 'select="selected"';}
    echo  '>' . $kategorija->naziv . '</option></p>';
}
}
echo '</select></p>';
echo '<p>Zelite li da oglas bude aktivan?</p>';
echo '<input type="radio" name="aktivan" value="DA" checked>DA';
echo '<input type="radio" name="aktivan" value="NE">NE<br>';
echo '<p><input type="submit" name="submit_changes" value="Predaj oglas"></p>';
echo '</form>';
echo '<p><a href=" ' .URL. '/pretraga/privatni ">Natrag</a></p>';