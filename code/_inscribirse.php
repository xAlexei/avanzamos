<?php 

session_start();
if(!isset($_SESSION['username'])){
    header('Location: _index.html');
}

$username = $_SESSION['username'];
require_once "_config.php";
$conn = $link;

$idevent = $_POST['idEvent'];
$eventname = $_POST['eventName'];
$description = $_POST['description'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO asistencia (idEvent, eventName, description, username, fecha)
VALUES ($idevent, '$eventname', '$description', '$username', '$fecha')";
$res = mysqli_query($link, $query);
if($res){
    echo "
    <script>
    alert('Insertado')
    window.location.replace('_mis_eventos.php');
    </script>
    ";
}else{
    die(mysqli_error($link));
    
}

mysqli_close($link);

?>