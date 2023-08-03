<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}

$id = $_GET['id'];

require_once "_config.php";
$conn = $link;
$query = "DELETE FROM meetings WHERE _idMeet = '$id'";
$res = mysqli_query($link, $query);
if($link->query($query)){
    echo "
    <script>alert('Eliminado')
    window.location.replace('_eventosProgramados.php')
    </script>
    ";
}

mysqli_close($link);

?>