<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: _index.html");
}

$user = $_SESSION["username"];

// Destruye la sesión
session_unset($user);
session_destroy();



// Redirecciona a la página de inicio de sesión o a otra página que desees
header("Location: _index.html");

?>
