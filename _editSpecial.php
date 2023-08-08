<?php 

require_once "_config.php";
$conn = $link;

$id = $_GET['id'];

$eventname = $_POST['eventname'];
$description = $_POST['description'];
$ubication = $_POST['ubication'];
$fecha = $_POST['fecha'];

$query = "UPDATE specialEvents SET 
    eventName = '$eventname',
    description = '$description',
    ubication = '$ubication',
    fecha = '$fecha' WHERE id = '$id'";
$res = mysqli_query($link, $query);
if($res == TRUE){
    echo "
    <script>
    alert('Editado Correctamente')
    window.location.replace('_adminPage.php')
    </script>";
}else{
    echo "
    <script>
    alert('Algo ocurrio.. intente de nuevo mas tarde')
    window.location.replace('_adminPage.php')
    </script>";
}

?>