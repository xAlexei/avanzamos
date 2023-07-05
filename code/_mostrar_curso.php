<?php 

require_once "_config.php";
$conn = $link;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = "SELECT * FROM eventos WHERE id_curso = '$id'";
$res = mysqli_query($link, $query);
while($row = mysqli_fetch_array($res)){

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
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="index.html" class="header-title">Evento</a>
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
        <h1>Evento</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>

    <div class="page-content">


        <div class="card card-style">
            <div class="card mb-0 rounded-0 bg-0" data-card-height="250">
                <div class="card-bottom">
                    
                </div>
            </div>
            <div class="content">
                <p class="font-600 color-highlight mb-n1">FECHA: <?php echo $row['fechas']?></p>
                <h1 class="font-30 font-800"><?php echo $row['Nombre']?></h1>
                <p class="font-14 mb-3">
                    Expositor: <?php echo $row['creador']?>
                </p>
                <p class="opacity-80">
                    <i class="fa icon-30 text-center fa-star pe-2"></i>Categoria: <?php echo $row['categoria']?><br>
                    <i class="fa icon-30 text-center fa-tag pe-2"></i> $ <?php echo $row['costo']?> <br>
                    <i class="fa icon-30 text-center fa-map-marker  pe-2"></i>Lugar: <?php echo $row['lugar']?>
                </p>

                <span class="pt-3 ps-2 font-700">Cupo de personas: <?php echo $row['cupo']?></span>
            </div>
        </div>
      
        <a href="#" data-menu="menu-event-accepted" class="btn btn-full btn-margins rounded-sm color-black bg-white font-14 font-600 btn-xl">Inscribirse</a>
        <div data-menu-load="menu-footer.html"></div>
    </div>
    <!-- Page content ends here-->



    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.html" data-menu-width="280" data-menu-active="nav-pages"></div>

    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>

    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>


</div>
<div id="menu-event-accepted" class="menu menu-box-bottom rounded-m" data-menu-height="420">
        <div class="content">
            <div class="text-center">
                <i class="fa fa-check-circle color-green-dark fa-5x scale-box px-3 py-2"></i>
                <h1 class="pt-2 mb-0">¡Genial!</h1>
                <p class="boxed-text-xl mb-3">Estamos emocionados de que asistas</p>
                <div class="row mb-3">
                    <div class="col-6">
                        <img src="images/avatars/5s.png" class="float-start border border-white bg-highlight rounded-circle me-n2" width="25">
                        <span href="#" class="float-start ps-4 font-10 color-theme opacity-30">Hosted by <?php echo $row['creador']?></span>
                    </div>
                    <div class="col-6">
                        <img src="images/avatars/1s.png" class="float-start border border-white bg-yellow-light rounded-circle me-n2" width="25">
                        <img src="images/avatars/4s.png" class="float-start border border-white bg-mint-dark rounded-circle me-n2" width="25">
                        <img src="images/avatars/5s.png" class="float-start border border-white bg-highlight rounded-circle me-n2" width="25">
                        <img src="images/avatars/1s.png" class="float-start border border-white bg-yellow-light rounded-circle me-n2" width="25">
                        <span href="#" class="float-start ps-4 font-10 color-theme opacity-30">+135 others</span>
                    </div>
                </div>
                <div class="divider mb-3"></div>
                <div class="d-flex text-center">
                    <div class="m-auto">
                        <i class="fa fa-calendar color-blue-dark font-18"></i>
                        <br>
                        <h5><?php echo $row['fechas'] ?></h5>
                    </div>
                    <div class="m-auto">
                    <i class="fa-sharp fa-solid color-green-dark fa-tag font-18"></i>
                        <br>
                        <h5>$<?php echo $row['costo']?></h5>
                    </div>
                    <div class="m-auto">
                        <i class="fa fa-map-pin color-red-dark font-18"></i>
                        <br>
                        <h5><?php echo $row['lugar']?></h5>
                    </div>
                </div>
                <div class="divider mt-2"></div>
                <a href="#" class="btn btn-m rounded-sm btn-full text-uppercase font-700 gradient-green border-0">ENTENDIDO</a>
            </div>
        </div>
        <?php }?>
    </div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
