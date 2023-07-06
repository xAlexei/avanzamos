<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: _index.html");
}

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

    <!-- Eventos -->
    <div class="page-content">  
        <div class="card card-style">
            <div class="content">
                <h1>Evento por categoria</h1>
                <form action="_buscar.php" method="POST"> 
                <div class="col-4">
                    <div class="input-style input-style-always-active has-borders no-icon mb-4">
                        <select name="giro" id="giro">
                            <option value="Moda y Eventos">Moda y Eventos</option>
							<option value="Salud">Salud</option>
							<option value="Servicios">Servicios</option>
							<option value="Construccion">Construcción</option>
							<option value="Legal y Contable">Legal y Contable</option>
							<option value="Tecnologia y Marketing">Tecnología y Marketing</option>
							<option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                        </select>
                        <span><i class="fa fa-chevron-down"></i></span>
                    </div>
                </div>
                <button style="margin-left: 150px; margin-top: -110px;" 
                type="submit" name="buscar" class="btn btn-m bg-white color-black font-700"
                onclick="buscar_filtro($('#giro').val); ">
					Buscar
				</button>
                </form>         
            </div>
        </div>
        <!-- Eventos  -->
        <?php 
        require_once "_config.php";
        $conn = $link;


        $query = "SELECT * FROM eventos ORDER BY fechas";
        $res = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($res)){
        ?>
        <div class="card card-style s card-full-left bg-17" data-card-height="230" id="resultado_busqueda">
            <div class="card rounded-0 shadow-xl" data-card-height="cover" style="width:100px; z-index:99;">
                <div class="card-center text-center">
                    <h1 class="font-30 text-uppercase font-900 opacity-30"><?php echo $row['fechas']?></h1>
                    <h1 class="font-24 font-900">$ <?php echo $row['costo']?></h1>
                </div>
            </div>
            <div class="card-top bg-0 ps-5 ms-5 pt-3">
                <div class="ps-4">
                    <h1 class="color-white pt-3 pb-3"> <?php echo $row['Nombre']?> </h1>
                    <p class="color-white mb-0"><i class="fa fa-mobile color-white pe-2 icon-30"></i> <?php echo $row['categoria']?> </p>
                    <p class="color-white"><i class="fa fa-map-marker color-white pe-2 icon-30"></i>Ubicacion</p>
                    <a href="_mostrar_curso.php?id=<?php echo $row['id_curso']?>" data-menu="menu-join" class="btn btn-m bg-white color-black font-700">Asistir</a>
                </div>
            </div>
            <div class="card-overlay bg-black opacity-70"></div>
        </div>
        <?php }?>
    </div>
    <!-- Page content ends here-->
    
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
