<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<?php 

session_start();
if(!$_SESSION['username']){
    header("Location: index.html");
}
require_once "_config.php";
$conn = $link;

$id = $_GET['id'];

$query = "DELETE FROM events WHERE _idEvent = '$id'";
$res = mysqli_query($link, $query);
if($link->query($query)){
    echo "
    <script>alert('Eliminado')
    window.location.replace('_eventosProgramados.php');
    </script>
    ";
}else{
    die(mysqli_error());
}

mysqli_close($link);


?>