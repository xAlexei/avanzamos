<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}else{
    $user = $_SESSION['username'];
}

$id = $_GET['idmeeting'];

require_once "_config.php";

$query = mysqli_query($link, "UPDATE events SET active = 0 WHERE _idEvent = '$id'");
if($query == TRUE){
    header("Location: _adminPage.php");
}else{
    echo "<script>
    alert('Algo ocurrio, intenta de nuevo por favor');
    </script>";
}

mysqli_close($link);

?>