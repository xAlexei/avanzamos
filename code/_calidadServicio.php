<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}
require_once "_config.php";
$conn = $link;

$username = $_SESSION['username'];
$userId = $_GET['id'];
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>AppKit Mobile</title>
<link rel="icon" type="image/png" href="uploads/avanzare.png">
<link rel="preload" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<style>





</style>
</head>
    
<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="index.html" class="header-title">Reviews</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    
    <div class="page-title page-title-fixed">
        <h1>Reviews</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
    <div class="page-content">    
        <?php         
        $consulta = $link->query("SELECT FORMAT(AVG(rating),1) AS averageRating FROM rating WHERE userId = '$userId'");
        $result = mysqli_fetch_array($consulta);
        $query = $link->query("SELECT * FROM users WHERE _idUser = '$userId'");
        while($row = mysqli_fetch_array($query)):
        ?>
        <div class="card card-style">
            <div class="content">
                <h1 class="mb-n2 font-22 font-800"><?php echo $row['name']?></h1>
                <h1 class="float-end font-900 font-40 mt-n3"><?php echo $result['averageRating'];?></h1>
                <?php 
                if($row['verification'] == 2){
                ?>
                <p class="mb-2"><i class="fa fa-check-circle color-green-dark scale-icon me-2"></i>Usuario Verificado</p>
                <?php }else if($row['verification'] == 1){?>
                    <p class="mb-2"><i class="fa fa-check-circle color-white scale-icon me-2"></i>Usuario Verificado</p>
                <?php }else{?>
                    <p>Usuario no verificado</p>
                <?php }?>
                <div class="row mb-0">
                    <h5 class="col-6">Calidad de Servicio</h5> 
                    <?php 
                
                $query = $link->query("SELECT FORMAT(AVG(rating),1) AS averageRating FROM rating WHERE userId = '$userId'");
                $row = mysqli_fetch_array($query);
                if($row['averageRating'] >= 5){
                    echo "
                    <p class='col-6 mb-3 text-end'>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                    </p>"; 
                }else if($row['averageRating'] >= 4){
                    echo "
                    <p class='col-6 mb-3 text-end'>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                    </p>"; 
                }else if($row['averageRating'] >=3 ){
                    echo "
                    <p class='col-6 mb-3 text-end'>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                    </p>"; 
                }else if($row['averageRating'] >=2 ){
                    echo "
                    <p class='col-6 mb-3 text-end'>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                    </p>"; 
                }else if($row['averageRating'] >=1){
                    echo "
                    <p class='col-6 mb-3 text-end'>
                        <i class='fa fa-star color-yellow-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>                
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                    </p>"; 
                }else{
                    echo "
                    <p class='col-6 mb-3 text-end'>
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                        <i class='fa fa-star color-gray-dark'></i>
                    </p>";
                }
                ?>                    
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <!--  -->    
        <div class="card card-style">
            <div class="content">
                <h5>Calidad del servicio</h5>
                <form method="POST">
                <select name="rating" class="form-select form-style rounded">
                    <option class="bg-dark" value="1">Malo</option>
                    <option class="bg-dark" value="2">Regular</option>
                    <option class="bg-dark" value="3">Bueno</option>
                    <option class="bg-dark" value="4">Muy Bueno</option>
                    <option class="bg-dark" value="5">Excelente</option>
                </select>    
                <input type="hidden" value="<?php echo $userId;?>">
                <br><button type="submit" class="btn btn-m rounded border-yellow-dark" style="width: 100%;">
                    Calificar
                </button>
                </form>                
            </div>
            <?php 
    
    $rating = $_POST['rating'] ?? null;
    if(!isset($_POST['rating'])){
        echo "";
    }else{
        $query = $link->query("SELECT * FROM rating WHERE userId = '$userId' AND username = '$username'");
        $row = mysqli_num_rows($query);
        if($row > 0){
            echo "
            <div class='ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark' role='alert'>
                    <span><i class='fa fa-times color-white'></i></span>
                    <strong class='color-white'>No puedes calificar dos veces</strong>
                    <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
                </div>
            ";
        }else{
            $query = $link->query("INSERT INTO rating (userId, rating, username) VALUES ($userId, $rating, '$username')");
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
        }
    }
    
    ?>
        </div>
    
        </div>
    </div>
   
    <!-- Page content ends here-->
    
    <!-- Main Menu--> 
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-components"></div>
    
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
     
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>

