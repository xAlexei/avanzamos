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

    <div id="footer-bar" class="footer-bar-6">
        <a href="index-components.html"><i class="fa-solid fa-square-plus"></i><span>Agendar</span></a>
        <a href="_mis_eventos.php"><i class="fa-solid fa-calendar-check"></i><span>Eventos</span></a>
        <a href="_servicios.php" class="circle-nav color-yellow"><i class="fa-solid fa-house" style="color: #f0d419;"></i><span>Inicio</span></a>
        <a href="_mis_reuniones.php"  class="active-nav"><i class="fa-sharp fa-solid fa-users"></i><span>Reuniones</span></a>
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

    <!-- Eventos -->
    <div class="page-content">  
        <!-- Eventos  -->
        <div class="card card-style">
            <div class="content text-center">
                <h1> REUNIONES PERSONALES </h1>       
            </div>
        </div>
        <?php 
        require_once "_config.php";
        $conn = $link;

        $consulta = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($link, $consulta);
        $fila = mysqli_fetch_array($result);
        $name = $fila['name'];

        $query = "SELECT * FROM personalmeetings WHERE userName = '$username' OR person = '$name' ORDER BY fecha ASC";
        $res = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($res)):
        
        ?>
        <div class="card card-style">            
            <div class="content">
                <p class="font-600 color-highlight mb-n1">FECHA: <?php echo $row['fecha'];?></p>
                <h1 class="font-30 font-800"></h1>
                <p class="font-900 font-14 mb-3">
                    Reunion con: <?php echo $row['person'] ?>
                </p>
                <p class="font-14 mb-3">Tema a tratar en la reunion: <?php echo $row['description'];?></p>
                <p class="opacity-80">
                    <a href="_cancelarReunion.php?idmeeting=<?php echo $row['id']?>" class="btn btn-m btn-danger font-700 rounded"> Cancelar reunion </a>
                    <a href="_cancelarReunion.php?idmeeting=<?php echo $row['id']?>" class="btn btn-m btn-success font-700 rounded"> Concluir reunion </a>
                </p>
            </div>
        </div>
        <?php endwhile; 
        mysqli_close($link);
        ?>
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
