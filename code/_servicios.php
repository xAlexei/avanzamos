<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}

$user = $_SESSION['username'];

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
        <a href="index.html" class="header-title">Inicio</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

    <div id="footer-bar" class="footer-bar-6">
        <a href="index-components.html"><i class="fa-solid fa-square-plus"></i><span>Agendar</span></a>
        <a href="_mis_eventos.php"><i class="fa-solid fa-calendar-check"></i><span>Eventos</span></a>
        <a href="_servicios.php" class="circle-nav active-nav"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
        <a href="_mis_reuniones.php"><i class="fa-sharp fa-solid fa-users"></i><span>Reuniones</span></a>
        <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
    </div>

    <div class="page-title page-title-fixed">
        <h1>AVANZAMOS <img src="uploads/avanzare.png" width="25px"></h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">
         
        <!-- Reuniones Avanzamos -->
        <div class="card card-style">
            <div class="content">
                <h1 class="text-center">EVENTOS DESTACADOS </h1>      
            </div>
        </div>
        <div class="content mt-n3 mb-4">
            <div class="search-box search-dark shadow-m border-0 mt-4 bg-theme rounded-m bottom-0">
                <form method="POST">  
                        <i class="fa fa-search ms-1"></i>
                    <input type="text" name ="searcher" class="border-0" placeholder="Buscar compañeros">
                </form>
            </div>   
        </div>
        <!-- EVENTOS DESTACADOS -->
        <?php 
        require_once "_config.php";
        $conn = $link;

        $query = "SELECT * FROM specialEvents";
        $res = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($res)):

        ?>
        <div class="card card-style s card-full-left" data-card-height="230" id="resultado_busqueda">
            <div class="card rounded-0 shadow-xl" data-card-height="cover" style="width:100px; z-index:99;">
                <div class="card-center text-center">
                    <h1 class="font-30 text-uppercase font-900 opacity-30"><?php echo $row['fecha']; ?></h1>
                    <h1 class="font-18 font-900">$ <?php echo $row['price'];?>MXN</h1>
                    <a href="_mostrar_curso.php?id=<?php echo $row['id']?>" data-menu="menu-join" class="btn btn-m bg-white color-black font-700">Asistir</a>
                </div>
            </div>
            <div class="card-top bg-0 ps-5 ms-5 pt-3">
                <div class="ps-4">
                    <h1 class="color-white"> <?php echo $row['eventName']?> </h1>
                    <p class="color-white "><?php echo $row['description'] ?> </p>
                    <p class="color-white mb-0"><i class="fa fa-map-pin color-white pe-3 icon-30"></i><?php echo $row['ubication'];?></p>                    
                </div>
            </div>
            <div class="card-overlay opacity-70"></div>
        </div>
        <?php endwhile; ?>
        <div class="card card-style">
            <iframe
			src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14931.510530327723!2d-103.3906055!3d20.6745568!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae72bfeceaf5%3A0x6a0a9dfc0d56d667!2sOUI%20Restaurant%20Bar!5e0!3m2!1ses-419!2smx!4v1684782770664!5m2!1ses-419!2smx"
				width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
        <div data-menu-load="menu-footer.html"></div>
    </div>
    <!-- Page content ends here-->
    
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-pages"></div>  

 
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
     
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
