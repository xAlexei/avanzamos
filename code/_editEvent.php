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
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];
$ubication = $_POST['ubication'];
$fecha = $_POST['fecha'];
$places = $_POST['places'];
$hostedBy = $_POST['hostedBy'];

$query = "UPDATE events SET
eventName = '$eventName',
price = '$price',
description = '$description',
category = '$category',
ubication = '$ubication',
fecha = '$fecha',
places = '$places',
hostedBy = '$hostedBy' WHERE _idEvent = '$idEvent'";

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