<?php 

session_start();
if(!isset($_SESSION['username'])){
    header('Location: _index.html');
}

$username = $_SESSION['username'];
require_once "_config.php";
$conn = $link;

$eventName = $_POST['eventName'];
$username = $_POST['username'];
$category = $_POST['category'];
$ubication = $_POST['ubication'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO participation (eventName, username, category, ubication, fecha)
VALUES ('$eventName', '$username', '$category', '$ubication', '$fecha')";
$res = mysqli_query($link, $query);
if($res){
    echo "
    <script>alert('Insertado')
    window.location.replace('_mis_eventos.php');
    </script>
    ";
}else{
    die(mysqli_error($link));
}

mysqli_close($link);
?>