<?php

$id = $_GET['id_vrste'];


include "konekcija.php";
include "domain/porudzbine.php";
include "domain/vrste.php";

$result = Porudzbina::vratiSve($mysqli, " where p.id_vrste =".$id);

 $nalepi = '<table class="table "><thead><tr>
 <th>Naziv</th><th>Cena</th>
 <th>Tip porudzbine</th>
 <th>Datum porucivanja</th>
 <th>Vrsta porudzbine</th></thead><tbody>';

 foreach($result as $porudzbina){
    $nalepi = $nalepi.'<tr>';
    $nalepi = $nalepi.'<td>'.$porudzbina->naziv.'</td>';
    $nalepi = $nalepi.'<td>'.$porudzbina->cena.'</td>';
    $nalepi = $nalepi.'<td>'.$porudzbina->tip_porudzbine.'</td>';
    $nalepi = $nalepi.'<td>'.$porudzbina->datum_porucivanja.'</td>';
    $nalepi = $nalepi.'<td>'.$porudzbina->vrsta->naziv_vrste.'</td>';
    $nalepi = $nalepi.'</tr>';
 }
 
$nalepi = $nalepi.'</tbody></table>';          
echo($nalepi);
 ?>