<?php 

require_once "_config.php";
$conn = $link;

$eventName = $_POST['eventName'];
$description = $_POST['description'];
$ubication = $_POST['ubication'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO events (eventName, description, ubication, fecha) 
VALUES ('$eventName', '$description', '$ubication', '$fecha')";
$res = mysqli_query($link, $query);

if($res){
    echo "<script>alert('Insertado');
    window.location.replace('_adminPage.php')
    </script>";
}else{
    die(mysqli_error());
}

mysqli_close($link);

?>