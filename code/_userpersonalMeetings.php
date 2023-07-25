<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}

require_once "_config.php";
$conn;

$query = $conn->query("SELECT a.username, COUNT(*) AS num
FROM personalmeetings AS a 
GROUP BY a.username");

?>