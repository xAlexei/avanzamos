<head>

<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.min.css
" rel="stylesheet">
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js
"></script>
<script src="sweetalert2.all.min.js"></script>

<?php 

session_start();
require_once "_config.php";
if(!isset($_SESSION['username'])){
    header("Location: _index.php");
}

$id = $_GET['id'];
$conn = $link;
$query = "SELECT * FROM users WHERE _idUser = '$id'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_array($res);
$verification = $row['verification'];

if($verification > 0){
    $query2 = "UPDATE users SET verification = 1 WHERE _idUser = '$id'";
    $result = mysqli_query($link, $query2);
    if($result){
        echo "
        <script>
        alert('Degradado')
        window.location.replace('_verification.php')
        </script>
        ";
    }else{
        die(mysqli_error($link));
    }
}

mysqli_close($link)

?>

</head>