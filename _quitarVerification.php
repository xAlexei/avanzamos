<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

require_once "_config.php";
$conn = $link;
$id = $_GET['id'];
$query = "UPDATE users SET verification = 0 WHERE _idUser = '$id'";
$res = mysqli_query($link, $query);
if($res == TRUE){
    echo "
    <script>
    alert('Degragado')
    window.location.replace('_verification.php')
    </script>";
}else{
    die(mysqli_error($link));
}

mysqli_close($link);
?>