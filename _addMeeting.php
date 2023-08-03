<?php 

require_once "_config.php";
$conn = $link;

$meetName = $_POST['meetName'];
$creator = $_POST['creator'];
$category = $_POST['category'];
$ubication = $_POST['ubication'];
$fecha = $_POST['fecha'];
$username = $_POST['username'];

$query = "INSERT INTO meetings (meetName, creator, category, ubication, fecha, username)
VALUES ('$meetName', '$creator', '$category', '$ubication', '$fecha', '$username')";
$res = mysqli_query($link, $query);
if($res){
    echo "
    <script>alert('Insertado')
    window.location.replace('_eventosProgramados.php')
    </script>
    ";
}else{
    die(mysqli_error());
}

mysqli_close($link);

?>