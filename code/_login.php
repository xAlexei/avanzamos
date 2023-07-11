<?php
session_start();

require_once "_config.php";

$username = $_POST["username"];
$password = $_POST["password"];

// Create connection
  $conn = $link;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$consulta="SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result=mysqli_query($conn, $consulta);
$filas=mysqli_fetch_array($result);


if ($filas['typeUser'] == 'ADMIN') {
    $_SESSION['username'] = $username;
    header("Location: _adminPage.php");
}else if($filas['typeUser'] == 'USER'){
    header("Location: _servicios.php");
}

$conn->close();
?>