<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: _index.html");
}
$username = $_SESSION['username'];

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
    
    <div class="page-title page-title-fixed">
        <h1>Historial</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>

    <!-- Eventos -->
    <div class="page-content">  
        <!-- Eventos  -->
        <div class="card card-style">
            <div class="content text-center">
                <h1> REUNIONES SEMANALES</h1>       
            </div>
        </div>
        <?php 
        require_once "_config.php";
        $conn = $link;

        $consulta = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($link, $consulta);
        $filas = mysqli_fetch_array($result);
        $name = $filas['name'];

        $query = "SELECT * FROM asistencia WHERE username = '$name' ORDER BY fecha DESC";
        $res = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($res)):

        ?>
        <div class="card card-style card-full-right" style="background-image:url(images/avanzback.png)" data-card-height="250">
            <div class="card-top pt-4 ps-3">
                <p class="color-white font-10 bg-yellow-dark d-inline px-2 py-1 rounded-xs text-uppercase"><?php echo $row['fecha']?></p>
                <h1 class="color-white font-800 font-40 mb-0 mt-4"><?php echo $row['eventName']?></h1>
                <h1 class="color-white font-800 font-40 mb-4"></h1>
                <p class="color-white font-700 font-15 opacity-90">
                    <?php echo $row['description']?>
                </p>
            </div>
                      
            <div class="card-overlay bg-black opacity-80"></div>
        </div>
        </a>
        <?php endwhile; mysqli_close($link);?>
    </div>
    <!-- Page content ends here-->
    
    <!-- Main Menu--> 
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-pages"></div>
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
