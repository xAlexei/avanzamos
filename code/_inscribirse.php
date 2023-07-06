<?php 

session_start();
require_once "_config.php";

$userID = $_POST['id'];
$cursoID = $_POST['id_curso'];
$fecha = date ('y-m-d');
$username = $_SESSION['username'];

$conn = $link;

$query = "INSERT INTO asistencia (id_cuenta, idevento, cuenta, registro, registrofecha)
VALUES ('$userID', '$cursoID', '$username', '1', '$fecha')";


?>