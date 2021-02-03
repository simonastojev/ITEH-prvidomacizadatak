<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/porudzbine.php";

$order = '';

$porudzbine = Porudzbina::vratiSve($mysqli,$order);
 ?>

<html>
<head>
    <?php
        include('head.php');
    ?>
        <title>Prikaz svih porudžbina</title>
</head>

<body>
    <div id="background-img">
    </div>

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

                <div class="table-responsive" id="tabela-porudzbina">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th><a class="column_sort" id="naziv" data-order="desc" href="#">Naziv porudžbine</a></th>
                                <th><a class="column_sort" id="cena" data-order="desc" href="#">Cena</a></th>
                                <th><a class="column_sort" id="tip_porudzbine" data-order="desc" href="#">Tip porudžbine</a></th>
                                <th><a class="column_sort" id="datum_porucivanja" data-order="desc" href="#">Datum poručivanja</a></th>
                                <th>Vrsta porudžbine</th>
                                <th>Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($porudzbine as $porudzbina):	
                            ?>
                                <tr>
                                    <td><?php echo $porudzbina->naziv;?></td>
                                    <td><?php echo $porudzbina->cena;?></td>
                                    <td><?php echo $porudzbina->tip_porudzbine;?></td>
                                    <td><?php echo $porudzbina->datum_porucivanja;?></td>
                                    <td><?php echo $porudzbina->vrsta_por->naziv_vrste?></td>
                                   
                                    <td>
                                    <a href="izmenaporudzbine.php?id=<?php echo $porudzbina->id_porudzbine;?>">
                                            <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
                                        </a>
                                    <a href="brisanjeporudzbine.php?id=<?php echo $porudzbina->id_porudzbine;?>">
                                            <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
                                        </a>
                                      
                                    </td>

                                </tr>
                        
                            <?php endforeach; ?> 
                    
                        </tbody>
                    </table>
                </div>

            <div id="output" >

        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        </div>
        <div class="col-md-2"></div>
    </div>

</body>


</html>
<script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"server/sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#tabela-porudzbina').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  

 </script> 