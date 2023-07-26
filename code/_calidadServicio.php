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
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<style>
.star-rating {
	white-space: nowrap;
}
.star-rating [type="radio"] {
	appearance: none;
}
.star-rating i {
	font-size: 1.2em;
	transition: 0.3s;
}

.star-rating label:is(:hover, :has(~ :hover)) i {
	transform: scale(1.35);
	color: #fffdba;
	animation: jump 0.5s calc(0.3s + (var(--i) - 1) * 0.15s) alternate infinite;
}
.star-rating label:has(~ :checked) i {
	color: #faec1b;
	text-shadow: 0 0 2px #ffffff, 0 0 10px #ffee58;
}


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

    <div id="footer-bar" class="footer-bar-6">
        <a href="index-components.html" class="active-nav"><i class="fa fa-layer-group"></i><span>Features</span></a>
        <a href="index-pages.html"><i class="fa fa-file"></i><span>Pages</span></a>
        <a href="index.html" class="circle-nav"><i class="fa fa-home"></i><span>Welcome</span></a>
        <a href="index-projects.html"><i class="fa fa-camera"></i><span>Projects</span></a>
        <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
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
            <h2>¿Cómo calificarios los servicios de esta peronsa?</h2>
            <br><div class="rating-stars float-lg-start">
                <form method="POST">
                <span class="star-rating">
                <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                <input type="radio" name="rating" id="rate-1" value="1">
                <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                <input type="radio" name="rating" id="rate-2" value="2" checked>
                <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                <input type="radio" name="rating" id="rate-3" value="3">
                <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" name="rating" id="rate-4" value="4">
                <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                <input type="radio" name="rating" id="rate-5" value="5">
            </span>
                <input type="hidden" name="userId" value="<?php echo $userId;?>">
                <span class="rating-counter" name="rate"></span>
            </div>
            <br><button type="submit" style="width: 100%;" class="btn btn-n rounded border-yellow-dark">
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

