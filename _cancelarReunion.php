<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

require_once "_config.php";
$conn = $link;

$id = $_GET['idmeeting'];

$query = "DELETE FROM personalmeetings WHERE id = '$id'";
$res = mysqli_query($link, $query);
if($res){
    echo "
    <script>alert('Eliminado')
    window.location.replace('_mis_reuniones.php')
    </script>
    ";
}

mysqli_close($link);
?>