<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: _index.hmtl");
}

require_once "_config.php";
$conn = $link;

$id = $_GET['id'];

$query = "UPDATE users SET verification = 2 WHERE _idUser = '$id'";
$res = mysqli_query($link, $query);
if($res){
    echo "
    <script>alert('Verificado')
    window.location.replace('_verification.php')
    </script>";
}


?>