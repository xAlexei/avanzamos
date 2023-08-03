<?php 

require_once "_config.php";
$conn = $link;
session_start();
if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}

$user = $_SESSION['username'];
$mesActual = date("m");
$monthNum  = $mesActual;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); 

switch($monthName)
{   
    case "January":
    $monthNameSpanish = "Enero";
    break;

    case "February":
    $monthNameSpanish = "Febrero";
    break;

    case "March":
    $monthNameSpanish = "Marzo";
    break;

    case "April":
    $monthNameSpanish = "Abril";
    break;

    case "May":
    $monthNameSpanish = "Mayo";
    break;

    case "June":
    $monthNameSpanish = "Junio";
    break;

    case "July":
    $monthNameSpanish = "Julio";
    break;
    
    case "August":
    $monthNameSpanish = "Agosto";
    break;

    case "September":
    $monthNameSpanish = "Septiembre";
    break;

    case "October":
    $monthNameSpanish = "Octubre";
    break;

    case "November":
    $monthNameSpanish = "Noviembre";
    break;

    case "November":
    $monthNameSpanish = "Diciembre";
    break;
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Inicio</title>
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
        <a href="index.html" class="header-title">Careers</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main-admin" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    <div class="page-title page-title-fixed">
        <h1>AVANZAMOS <img src="uploads/avanzare.png" width="25px"></h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main-admin"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">
         <!-- USUARIOS CON MAS REUNIONES PERSONALES -->
         <div class="card card-style">
            <div class="content mb-2">
                <h4 class="text-center">Usuarios con mas reuniones personales en el mes de <?php echo $monthNameSpanish?></h4>
                <div class="divider mt-3"></div>        
                <div class="list-group list-custom-small list-menu ms-0 me-1">
                    <?php 
                    $query = $conn->query("SELECT username, COUNT(*) AS num FROM personalmeetings 
                    WHERE MONTH(fecha) = $mesActual GROUP BY username ORDER BY num DESC");
                    while($row = mysqli_fetch_array($query)):
                    ?>
                    <a href="#">
                        <img src="images/avatars/2s.png">
                        <span class="font-20"><?php echo $row['username']?></span>
                        <p class="float-end font-20">Total: <?php echo $row['num']?></p>
                    </a>    
                    <?php endwhile;?>    
                </div>
                <div class="divider mt-3"></div>                
            </div>  
        </div>

        <!-- EVENTOS DESTACADOS -->
         
        
                
     </div>
    <!-- Page content ends here-->

    <div id="menu-main-admin" class="menu menu-box-left rounded-0" data-menu-load="menu-main-admin.html" data-menu-width="280" data-menu-active="nav-pages"></div>       
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
