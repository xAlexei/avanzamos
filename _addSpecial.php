<?php 

require_once "_config.php";
$conn = $link;

$eventname = $_POST['eventname'];
$description = $_POST['description'];
$ubication = $_POST['ubication'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO specialEvents (eventName, description, ubication, fecha) 
VALUES ('$eventname', '$description', '$ubication', '$fecha')";
$res = mysqli_query($link, $query);

if($res == TRUE){
    echo "
    <script>
    alert('¡Evento creado!')
    window.location.replace('_adminPage.php')
    </script>
    ";
}else{
    echo "
    <script>
    alert('Algo ocurrio..intenta mas tarde')
    window.location.replace('_adminPage.php')
    </script>
    ";
}

?>