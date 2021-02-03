<?php  
 //sort.php  
 include "konekcija.php";
 include "domain/porudzbine.php";
 include "domain/vrste.php";

 $output = '';  
 $order = $_POST["order"];

 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  

 $uslov = " ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $porudzbine = Porudzbina::vratiSve($mysqli,$uslov);
 $output .= '  
 <table class="table"> <tbody> 
      <tr>  
        <th><a class="column_sort" id="naziv" data-order="'.$order.'" href="#">Naziv</a></th>
        <th><a class="column_sort" id="cena" data-order="'.$order.'" href="#">Cena</a></th>
        <th><a class="column_sort" id="tip_porudzbine" data-order="'.$order.'" href="#">Tip porudžbine</a></th>
        <th><a class="column_sort" id="datum_porucivanja" data-order="'.$order.'" href="#">Datum poručivanja</a></th>
        <th>Vrsta porudžbine</th>
        <th>Opcije</th>     
      </tr>  
 ';  
 foreach($porudzbine as $porudzbina){
    $output=$output.'<tr>';
    $output=$output.'<td>'.$porudzbina->naziv.'</td>';
    $output=$output.'<td>'.$porudzbina->cena.'</td>';
    $output=$output.'<td>'.$porudzbina->tip_porudzbine.'</td>';
    $output=$output.'<td>'.$porudzbina->datum_porucivanja.'</td>';
    $output=$output.'<td>'.$porudzbina->vrsta_porudzbine->naziv_vrste.'</td>';
    $output=$output.'<td><a href="brisanjeporudzbine.php?id='.$porudzbina->id_porudzbine.'">
    <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
</a>
<a href="izmenaporudzbine.php?id='.$porudzbina->id_porudzbine.'">
    <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
</a></td>';
    $output=$output.'</tr>';
 }
 $output .= '</tbody></table>';  
 echo $output;  
 ?>  