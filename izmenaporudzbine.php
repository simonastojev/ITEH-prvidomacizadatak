<!DOCTYPE html>
<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/porudzbine.php";

$id_por = $_GET['id'];

$porudzbina = Porudzbina::vratiSve($mysqli," where p.id_porudzbine=".$id);
$vrste_porudzbina = Vrsta::vratiSve($mysqli);
$poruka = '';

if (isset($_POST['update'])) {
    $naziv = $_POST['naziv'];
    $cena = $_POST['cena'];
    $tip_porudzbine = $_POST['$tip_porudzbine'];
    $datum_porucivanja = $_POST['datum_porucivanja'];
    $vrste_porudzbina = $_POST['$vrste_porudzbina'];       

    $mysqli->query("UPDATE porudzbine SET naziv='$naziv', cena='$cena', $tip_porudzbine='$tip_porudzbine', 
    datum_porucivanja='$datum_porucivanja',id_vrste='$vrsta_porudzbine' WHERE id_porudzbine=$id");
    header('location: katalog.php');
}
 ?>
<html>

<head>
    <?php
        include('head.php');
    ?>
    <title>Izmena porudžbine</title>
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
        <div id="baloni-img" class="col-md-4"></div>
        <div class="col-md-4">

            <form style="padding: 25px;" class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label for="naziv">Naziv porudžbine:</label>
                    <input type="text" class="form-control" name="naziv" id="naziv"
                        value="<?php echo $porudzbina[0]->naziv; ?>">
                </div>
                <div class="form-group">
                    <label for="cena">Cena:</label>
                    <input type="text" class="form-control" name="cena" id="cena"
                        value="<?php echo $porudzbina[0]->cena; ?>">
                </div>
                <div class="form-group">
                    <label for="tip_porudzbine">Tip porudžbine:</label>
                    <input type="text" class="form-control" name="tip_porudzbine" id="tip_porudzbine"
                        value="<?php echo $porudzbina[0]->$tip_porudzbine; ?>">
                </div>
                <div class="form-group">
                    <label for="datum_porucivanja">Datum poručivanja:</label>
                    <input type="date" class="form-control" name="datum_porucivanja" id="datum_porucivanja"
                        value="<?php echo $porudzbina[0]->datum_porucivanja; ?>">
                </div>
                <div class="form-group">
                    <label for="vrste_porudzbina">Vrsta porudzbine:</label>
                    <select class="form-control" name="vrste_porudzbina" id="vrste_porudzbina">
                        <?php foreach($vrste_porudzbina as $v): ?>
                        <option value="<?php echo $v->id_vrste;?>">
                            <?php echo $v->naziv_vrste;?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>