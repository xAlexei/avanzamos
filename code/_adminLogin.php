<?php
session_start();

require_once "_config.php";

$username = $_POST["username"];
$password = $_POST["password"];


// Create connection
  $conn = $link;

$query = "SELECT * FROM users WHERE username = '$username'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_array($res);
$password_hash = $row['password'];
$typeUser = $row['typeUser'];

if(!password_verify($password, $password_hash) && $typeUser == 'ADMIN'){
    echo "Usuario o contrasñeas incorrectos";
}else if(password_verify($password, $password_hash) && $typeUser == 'ADMIN'){
  $_SESSION['username'] = $username;
  $_SESSION['name'] = $name;
  header("Location: _adminPage.php");
}else{
  echo "<script>
  alert('Usuario o contraseña incorrectos')
  window.location.replace('_index.html')
  </script>";
}




$conn->close();
?>