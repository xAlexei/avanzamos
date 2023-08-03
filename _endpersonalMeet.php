<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

require_once "_config.php";
$conn = $link;
$id = $_GET['idmeeting'];

$query = "UPDATE personalmeetings SET active = 0 WHERE id='$id'";
$res = mysqli_query($link, $query);
if($res == TRUE){
    header("Location: _mis_reuniones.php");
}

mysqli_close($link);

?>