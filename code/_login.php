<?php
session_start();

require_once "_config.php";

$username = $_POST["username"];
$password = $_POST["password"];



// Create connection
  $conn = $link;

// Check connection
//if ($conn->connect_error) {
   // die("Connection failed: " . $conn->connect_error);
//} 

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_array($res);

if($row['typeUser'] == 'USER'){
    $_SESSION['username'] = $username;
    header("Location: _servicios.php");
}else{
    echo "
    <script>alert('Usuario o contraseñas incorrectos')
    window.location.replace('_index.html');
    </script>
    ";
}



$conn->close();
?>