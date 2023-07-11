<?php 

session_start();
if(!$_SESSION['username']){
    header("Location: _index.html");
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