<?php 

session_start();
if(!isset($_SESSION['username'])){
    header('Location: index.html');
} 

$id = $_GET['id'];

require_once "_config.php";
$conn = $link;

$query = "DELETE FROM specialEvents WHERE id = '$id'";
$res = mysqli_query($link, $query);

if($res){
    echo "
    <script>
    alert('Eliminado correctamente')
    window.location.replace('_adminPage.php')
    </script>
    ";
}else{
    echo "
    <script>alert('Algo ocurrio.. intenta de nuevo mas tarde')</script>
    ";
}

?>