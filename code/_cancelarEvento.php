<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}

require_once "_config.php";
$conn = $link;
$id = $_GET['id'];

$query = "DELETE FROM events WHERE _idEvent = '$id'";
$res = mysqli_query($link, $query);
if($query == TRUE){
    header("Location: _adminPage.php");
}else{
    echo "<script>
    alert('Algo ocurrio, por favor intentalo de nuevo')
    window.location.replace('_adminPage.php')
    </script>";
}

?>