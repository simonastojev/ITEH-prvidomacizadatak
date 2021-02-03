<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "katalog";
$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($mysqli->connect_errno) {
    printf("Niste uspeli da se konektujete na bazu!: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");
?>
