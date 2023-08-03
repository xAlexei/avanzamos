<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

require_once "_config.php";
$conn = $link;

$userId = $_POST['userId'];
$rating = $_POST['rating'];

$query = $link->query("INSERT INTO rating (userId, rating) VALUES ($userId, $rating)");
if($query == TRUE){
    echo "
    <div class='ms-3 me-3 alert alert-small rounded-s shadow-xl bg-green-dark' role='alert'>
    <span><i class='fa fa-check color-white'></i></span>
    <strong class='color-white'>Everything's okay here!</strong>
    <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
</div> 
    ";
}else{
    echo "
    <div class='ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark' role='alert'>
            <span><i class='fa fa-times color-white'></i></span>
            <strong class='color-white'>We have a problem here</strong>
            <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
        </div>
    ";
}


?>