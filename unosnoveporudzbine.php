<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/porudzbine.php";

$vrsta_porudzbine = Vrsta::vratiSve($mysqli);

if(isset( $_POST['dodaj'] )){
	
	$naziv = trim($_POST['naziv']);
	$cena = trim($_POST['cena']);
    $tip_porudzbine = trim($_POST['tip_porudzbine']);
    $datum_porucivanja = trim($_POST['datum_porucivanja']);
    $vrsta_porudzbine = $_POST['vrsta_porudzbine'];
    
	$data = Array (
				"naziv" => $naziv, 
				"cena" => $cena,
				"tip_porudzbine" => $tip_porudzbine,					
				"datum_porucivanja" => $datum_porucivanja,					
                "id_vrste" => $vrsta_porudzbine,    
        );	
        
	$porudzbina = new Porudzbina(null, $naziv, $cena, $tip_porudzbine, $datum_porucivanja, $vrsta_porudzbine);
		
		$porudzbina->ubaciPorudzbinu($data,$mysqli);
		
        $porudzbina = $porudzbina->getPoruka();
        header("Location:unosnoveporudzbine.php");
        
}
?>

<html>

<head>
    <?php
        include('head.php');
    ?>
    <title>Unos nove porudžbine</title>
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
    <div id="insert-form" class="row form-container">
        <div class="col-md-2"></div>
        <div id="baloni-bg-img" class="col-md-4"></div>
        <div class="col-md-4">
            <form name="unosPorudzbine" action="" onsubmit="return validateForm()" method="POST" role="form">
                <div class="form-group">
                    <label for="naziv_porudzbine">Naziv porudžbine:</label>
                    <input type="text" class="form-control" name="naziv" id="naziv" placeholder="Unesite naziv porudžbine"> 
               </div>
                <div class="form-group">
                    <label for="cena">Cena porudžbine:</label>
                    <input type="text" class="form-control" name="cena" id="cena" placeholder="Unesite cenu porudžbine">
                </div>
                <div class="form-group">
                    <label for="tip">Tip porudžbine:</label>
                    <input type="text" class="form-control" name="tip" id="tip_porudzbine" 
                    placeholder="Unesite tip porudžbine">
                </div>
                <div class="form-group">
                    <label for="datum_porucivanja">Datum poručivanja:</label>
                    <input type="date" class="form-control" name="datum_porucivanja" id="datum_porucivanja" 
                    placeholder="Unesite datum poručivanja narudzbine" min="1990-01-01" max="2050-12-31">
                </div>
                <div class="form-group">
                    <label for="vrsta_porudzbine">Vrsta porudžbine:</label>
                    <select class="form-control" name="vrsta_porudzbine" id="vrsta_porudzbine">
                        <option value="1"> Neobrađena </option>
                        <option value="2"> U izradi </option>       
                        <option value="3"> Otkazana </option>
                        <option value="4"> U pripremi za isporuku</option>
                        <option value="5"> Pristigla </option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Dodaj porudžbinu</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>