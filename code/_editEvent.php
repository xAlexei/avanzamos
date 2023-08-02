<?php 
session_start();

require_once "_config.php";
$conn = $link;

if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}

if($_GET['id']){
    $idEvent = $_GET['id'];
}

$eventName = $_POST['eventName'];
$description = $_POST['description'];
$ubication = $_POST['ubication'];
$fecha = $_POST['fecha'];

$query = "UPDATE events SET
eventName = '$eventName',
description = '$description',
ubication = '$ubication',
fecha = '$fecha' WHERE _idEvent = '$idEvent'";

if($link->query($query) == TRUE){
    echo "
    <script>alert('Editado')
    window.location.replace('_eventosProgramados.php')</script>
    ";
}else{
    die(mysqli_error());
}

mysqli_close($link);


?>