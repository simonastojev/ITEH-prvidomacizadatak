<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/porudzbine.php";

$vrste_porudzbina = Vrsta::vratiSve($mysqli);
?>

<html>

<head>

    <?php include('head.php');?>

    <title>Pretraga porudžbina</title>

    <script>
        function find() {

            var pretraga = $("#vrsta_porudzbina").val();
            $.ajax({
                url: "server/pretraga.php",
                data: "id_vrste=" + pretraga,
                success: function(result) {
                    $('#output').html(result);
                },

            });

        }
    </script>
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
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label for="vrsta_porudzbine">Vrsta porudžbine:</label>
                    <div class="d-flex">
                        <select class="form-control"  name="vrsta_porudzbine" id="vrsta_porudzbine">
                            <option value="1"> Neobrađena </option>
                            <option value="2"> U izradi </option>
                            <option value="3"> Otkazana </option>
                            <option value="4"> U pripremi za isporuku </option>
                            <option value="5"> Pristigla </option>
                            </select>

                        <button type="button" id="btn_find" name="pronadji" 
                        class="btn-round-custom" onclick="find()">Pronađi</button>
                    </div>

                </div>

            </form>
            <div id="output">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>