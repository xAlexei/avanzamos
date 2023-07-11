<?php
    session_start();

    require_once "_config.php";

    $conn = $link;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $companyName = $_POST['company'];
    $description = $_POST['description'];
    $typeUser = $_POST['typeUser'];

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password, email, name, phone, companyName, description, typeUser) 
    VALUES ('$username', '$hash_password', '$email', '$name', '$phone', '$companyName', '$description', typeUser)";

    if($link->query($query)){
        echo "<script>
        alert('Insertado correctamente')
        window.location.replace('_index.html')
        </script>
        ";
    }

    mysqli_close($conn);

?>