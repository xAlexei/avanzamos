<?php 

session_start();
if(!isset($_SESSION['username'])){
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
<title>Añadir Evento</title>
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
        <a href="index.html" class="header-title">Inputs</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main-admin" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

    <div id="footer-bar" class="footer-bar-6">
        <a href="index-components.html"><i class="fa-solid fa-square-plus"></i><span>Agendar</span></a>
        <a href="_mis_eventos.php" class="active-nav"><i class="fa-solid fa-calendar-check"></i><span>Eventos</span></a>
        <a href="_servicios.php" class="circle-nav color-yellow"><i class="fa-solid fa-house" style="color: #f0d419;"></i><span>Inicio</span></a>
        <a href="_mis_reuniones.php"><i class="fa-sharp fa-solid fa-users"></i><span>Reuniones</span></a>
        <a href="#" data-menu="menu-main-admin"><i class="fa fa-bars"></i><span>Menu</span></a>
    </div>

    <div class="page-title page-title-fixed">
        <h1>Reuniones Semanales</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main-admin"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">
        <div class="card card-style">
            <div class="content mb-0">        
                <h3> Datos de la reunion semanal</h3>        
                <!--Nombre del evento -->
                <br><form action="_añadirCurso.php" method="POST">
                    <input type="hidden" class="form-control validate-name" name="eventName" value="Reunion Semanal">
                <!--Descripcion del evento -->
                <div class="input-style has-borders no-icon mb-4">
                    <textarea id="description" name="description" placeholder="Enter your message"></textarea>
                    <label for="form7" class="color-highlight">Descripcion del evento</label>
                    <em class="mt-n3">(required)</em>
                </div>
                <!--Ubicacion -->
                    <input type="hidden" class="form-control validate-text" name="ubication" value="OUI Restaurante Bar">
                <!--Fecha del evento -->
                <div class="input-style has-borders no-icon mb-4">
                    <input type="date" max="2030-01-01" min="2021-01-01" class="form-control validate-text" name="fecha" placeholder="Fecha">
                    <label for="form6" class="color-highlight">Select Date</label>
                    <i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>
                    <i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>
                </div>
                <div class="input-style">
                <button type="submit" class="btn btn-full btn-l font-600 font-13 mt-4 rounded-s" style="width: 100%; background-color: #F1BE35;">
                        AÑADIR EVENTO
                </button>
                </div>
            </form>
            </div>
        </div>
       

        <div data-menu-load="menu-footer.html"></div>
    </div>
    <!-- Page content ends here-->
    
    <!-- Main Menu--> 
    <div id="menu-main-admin" class="menu menu-box-left rounded-0" data-menu-load="menu-main-admin.html" data-menu-width="280" data-menu-active="nav-components"></div>
    
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
