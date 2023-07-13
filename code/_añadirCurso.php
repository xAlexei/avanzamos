<?php 

require_once "_config.php";
$conn = $link;

$eventName = $_POST['eventName'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];
$ubication = $_POST['ubication'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO events (eventName, price, description, category, ubication, fecha) 
VALUES ('$eventName', '$price', '$description', '$category', '$ubication', '$fecha')";
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