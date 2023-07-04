<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: index.php");
}

$user = $_SESSION["username"];
require_once "_config.php";
$conn = $link;

// Attempt select query execution
$sql = "SELECT * FROM eventos ORDER BY fechas";
$resultado = mysqli_query($link, $sql);

$query = "SELECT * FROM users WHERE username like '$user'";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
} else {
	echo '<script type="text/javascript">
        alert("Error al obtener los datos de usuario, intente de nuevo");
        window.location.href="calendario.php";
        </script>';
}
//colores de las tarjetas
$colores = array("#E3FFA8", "#9DCDC0", "#BDBBB7");

//Contadores
$i = 0;
$contador = 0;

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Eventos</title>
<link rel="icon" type="image/png" href="uploads/avanzare.png">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
    
<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="index.html" class="header-title">Proximos Eventos</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

    <div id="footer-bar" class="footer-bar-6">
        <a href="index-components.html"><i class="fa fa-layer-group"></i><span>Features</span></a>
        <a href="index-pages.html" class="active-nav"><i class="fa fa-file"></i><span>Pages</span></a>
        <a href="index.html" class="circle-nav"><i class="fa fa-home"></i><span>Welcome</span></a>
        <a href="index-projects.html"><i class="fa fa-camera"></i><span>Projects</span></a>
        <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
    </div>
    
    <div class="page-title page-title-fixed">
        <h1>Proximos Eventos</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">  
        <div class="card card-style s card-full-left bg-17" data-card-height="230">
            <div class="card rounded-0 shadow-xl" data-card-height="cover" style="width:100px; z-index:99;">
                <div class="card-center text-center">
                    <h1 class="font-30 text-uppercase font-900 opacity-30">FRI</h1>
                    <h1 class="font-24 font-900">15th</h1>
                </div>
            </div>
            <div class="card-top ps-5 ms-5 pt-3">
                <div class="ps-4">
                    <h1 class="color-white pt-3 pb-3">Apple Event </h1>
                    <p class="color-white mb-0"><i class="fa fa-mobile color-white pe-2 icon-30"></i> Bench Pressing and Squats</p>
                    <p class="color-white"><i class="fa fa-map-marker color-white pe-2 icon-30"></i> Steve Jobs Theater, Palo Alto</p>
                    <a href="#" data-menu="menu-join" class="btn btn-m bg-white color-black font-700">Accept</a>
                    <a href="#" data-menu="menu-join" class="btn btn-m border-white color-white font-700 ms-3">Decline</a>
                </div>
            </div>
            <div class="card-overlay bg-black opacity-70"></div>
        </div>
        
        <div data-menu-load="menu-footer.html"></div>
    </div>
    <!-- Page content ends here-->
    

    <div id="menu-join" 
         class="menu menu-box-modal rounded-m" 
         data-menu-width="350"
         data-menu-height="570">
        <div class="card bg-31 rounded-0 mb-0" data-card-height="150">
            <div class="card-center ps-3">
                <h1 class="color-white font-20 mb-0">Awesome Event </h1>
                <h1 class="color-white font-28 mt-n2">Registration</h1>
            </div>
            <div class="card-overlay bg-gradient"></div>
        </div>

        <div class="content">
            <div class="d-flex mb-4">
                <div class="align-self-center">
                    <h5 data-activate="toggle-id-1" class="font-700 font-16 mt-1 mb-0">Attending Event?</h5>
                </div>
                <div class="ms-auto me-4 mt-5 mb-n3">
                    <div class="custom-control ios-switch scale-switch">
                        <input type="checkbox" class="ios-input" id="toggle-id-1" checked>
                        <label class="custom-control-label" for="toggle-id-1"></label>
                    </div>
                </div>
            </div>
            <div class="input-style has-borders no-icon validate-field mb-4">
                <input type="name" class="form-control validate-name" id="form1" placeholder="Your Name">
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em class="color-blue-dark opacity-90">John Doe</em>
            </div>
            <div class="input-style has-borders no-icon validate-field mb-4">
                <input type="tel" class="form-control validate-te" id="form2" placeholder="Phone Number">
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em class="color-blue-dark opacity-90">+1 234 567 7890</em>
            </div>
            <div class="input-style has-borders no-icon validate-field mb-4">
                <input type="email" class="form-control validate-email" id="form3" placeholder="Email Address">
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em class="color-blue-dark opacity-90">name@domain.com</em>
            </div>
            <div class="input-style has-borders no-icon validate-field mb-4">
                <input type="number" class="form-control validate-number" id="form5" placeholder="Number of Total Guests">
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em class="color-blue-dark opacity-90">12</em>
            </div>
            <a href="#" class="close-menu mt-4 btn btn-l btn-full rounded-sm gradient-blue font-600">Save</a>
        </div>
    </div>
    
    <!-- Main Menu--> 
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.html" data-menu-width="280" data-menu-active="nav-pages"></div>
    
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
     
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
