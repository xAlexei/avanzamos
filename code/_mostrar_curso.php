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
        <a href="index.html" class="header-title">Event Details</a>
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
        <h1>Event Details</h1>
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
<?php }?>
        
        <a href="#" class="btn btn-full btn-margins rounded-sm color-black bg-white font-14 font-600 btn-xl">Inscribirse</a>
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
                <div class="ms-auto me-4">
                    <div class="custom-control ios-switch">
                        <input type="checkbox" class="ios-input" id="toggle-id-1" checked>
                        <label class="custom-control-label" for="toggle-id-1"></label>
                    </div>
                </div>
            </div>
            <div class="input-style input-style-2 input-required">
                <em class="color-highlight">John Doe</em>
                <input class="form-control" type="name" placeholder="Your Name">
            </div>
            <div class="input-style input-style-2 input-required">
                <em class="color-highlight">+1 234 567 789</em>
                <input class="form-control" type="tel" placeholder="Phone Number">
            </div>
            <div class="input-style input-style-2 input-required">
                <em class="color-highlight">mail@domain.com</em>
                <input class="form-control" type="email" placeholder="Email Address">
            </div>
            <div class="input-style input-style-2 input-required">
                <em class="color-highlight">12</em>
                <input class="form-control" type="email" placeholder="Number of Total Guests">
            </div>
            <div class=""></div>
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
