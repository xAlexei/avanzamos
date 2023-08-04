<?php 

session_start();
if(!isset($_SESSION['username'])){
    header('Location: index.html');
}

$username = $_SESSION['username'];
require_once "_config.php";
$conn = $link;

$fecha_actual = date("Y-m-d");

$idevent = $_POST['idEvent'];
$eventname = $_POST['eventName'];
$description = $_POST['description'];
$userName = $_POST['username'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO asistencia (idEvent, eventName, description, username, fecha)
VALUES ($idevent, '$eventname', '$description', '$userName', '$fecha')";
$res = mysqli_query($link, $query);
if($res){
    echo "
    <script>
    alert('¡Gracias por inscribirte!')
    window.location.replace('_mis_eventos.php');
    </script>
    ";
}else{
    die(mysqli_error($link));
    
}

mysqli_close($link);

?>