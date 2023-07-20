<?php 

if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}else{
    $user = $_SESSION['username'];
}

require_once "_config.php";
$conn = $link;
$id = $_GET['idmeeting'];

$query = mysqli_query($link, "DELETE events WHERE _idEvent = '$id'");
if($query == TRUE){
    header("Location: _adminPage.php");
}else{
    echo "<script>
    alert('Algo ocurrio, por favor intentalo de nuevo')
    window.location.replace('_adminPage.php')
    </script>";
}

?>