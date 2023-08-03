<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '208.109.58.44');
define('DB_USERNAME', 'avanzamos');
define('DB_PASSWORD', 'avanzamos0912');
define('DB_NAME', 'avanzamosmas');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    echo "no se puede conectar";
}
?>