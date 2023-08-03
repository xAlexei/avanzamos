<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

$id = $_GET['id'];
require_once "_config.php";
$conn = $link;

$query = "DELETE FROM asistencia WHERE id = '$id'";
$res = mysqli_query($link, $query);
if($res){
    echo "
    <script>alert('Cancelada')
    window.location.replace('_mis_eventos.php')
    </script>
    ";
}else{
    die(mysqli_error($link));
}

mysqli_close($link);

?>