<?php 

require_once "_config.php";

$conn = $link;

$username = $_POST['userName'];
$person = $_POST['person'];
$description = $_POST['description'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO personalmeetings (userName, person, description, fecha)
VALUES ('$username', '$person', '$description', '$fecha')";
$res = mysqli_query($link, $query);

if($res){
    echo "
    <script>alert('Agendado')
    window.location.replace('_servicios.php')
    </script>
    ";
}

?>