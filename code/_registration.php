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
    $category = $_POST['category'];
    $address = $_POST['address'];
    $typeUser = $_POST['typeUser'];

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password, email, name, phone, companyName, description, category, address, typeUser) 
    VALUES ('$username', '$hash_password', '$email', '$name', '$phone', '$companyName', '$description', '$category', '$address', '$typeUser')";

    if($link->query($query)){
        echo "<script>
        alert('Insertado correctamente')
        window.location.replace('_index.html')
        </script>
        ";
    }

    mysqli_close($conn);

?>