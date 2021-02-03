<?php
include "server/konekcija.php";

$id = $_GET['id'];
$sql = "DELETE FROM porudzbine WHERE id_porudzbine='".$id."'";
$mysqli->query($sql) or die($sql);

header("Location:katalog.php");
 ?>