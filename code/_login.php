<?php
session_start();

require_once "_config.php";

$username = $_POST["username"];
$password = $_POST["password"];

$conn = $link;

// Check connection
//if ($conn->connect_error) {
   // die("Connection failed: " . $conn->connect_error);
//} 

$query = "SELECT * FROM users WHERE username = '$username'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_array($res);
$password_hash = $row['password'];
$typeUser = $row['typeUser'];
$name = $row['name'];

if(!password_verify($password, $password_hash) && $typeUser == 'USER'){
    echo "
    <script>alert('Usuario o contraseña incorrectos')
    window.location.replace('_index.html')
    </script>
    ";
}else if(password_verify($password, $password_hash) && $typeUser == 'USER'){
  $_SESSION['username'] = $username;
  $_SESSION['name'] = $name;
  header("Location: _servicios.php");
}else{
  echo " <div class='ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark' role='alert'>
                <span><i class='fa fa-times color-white'></i></span>
                <strong class='color-white'>We have a problem here</strong>
              <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
          </div>";
          header("Location: _index.html");

}


$conn->close();
?>