<?php 

session_start();
require_once "_config.php";
$conn = $link;

if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE _idUser = '$id'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_array($res);

$result = mysqli_query($link, "UPDATE users SET verification = 1 WHERE _idUser = '$id'");
if($result){
    echo "
    <script>
    alert('Verificado')
    window.location.replace('_verification.php')
    </script>
    ";
}else{
    die(mysqli_error($link));
}


mysqli_close($link);

?>