<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: _index.html");
}

$user = $_SESSION['username'];
require_once "_config.php";
$conn = $link;

$id = $_GET['id'];


?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Reuniones</title>
<link rel="icon" type="image/png" href="uploads/avanzare.png">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

      <?php 

      $consulta = "SELECT * FROM users WHERE username = '$user'";
      $result = mysqli_query($link, $consulta);
      $fila = mysqli_fetch_array($result);
      $userName = $fila['name'];
      
      $query = "SELECT * FROM events WHERE _idEvent = '$id'";
      $res = mysqli_query($link, $query);
      while($row = mysqli_fetch_array($res)):

      ?>
        <div class="card card-style">            
            <div class="content">
            <h1><?php echo $row['eventName']?></h1>
                <p class="font-600 color-highlight mb-n1">FECHA: <?php echo $row['fecha']?> <span>Hora limite de inscripción <?php echo $row['hora']?></span></p>
                <h1 class="font-30 font-800"></h1>
                <p class="font-900 font-14 mb-3">
                    Expositor: Israel
                </p>
                <p class="font-14 mb-3"> <?php echo $row['description'];?></p>
                <p class="opacity-80">                                        
                    <i class="fa icon-30 text-center fa-map-marker  pe-2"></i>Lugar: <?php echo $row['ubication'];?>
                </p>
            </div>
            <?php 

            date_default_timezone_set('America/Mexico_City');            
            $horaActual = strtotime(date("h:i:s"));
            $hora_reunion = $row['hora'];
            $fecha_actual = date("Y-m-d");
            $fecha_reunion = $row['fecha'];

            if($fecha_actual >= $fecha_reunion && $horaActual > $hora_reunion){
                echo "<div class='alert me-3 ms-3 rounded-s bg-red-dark ' role='alert'>
                <span class='alert-icon color-white'><i class='fa fa-times-circle font-18'></i></span>
                <h4 class='color-white'>Ups!</h4>
                <strong class='alert-icon-text color-white'>La fecha limite para asistir ya expiro</strong>
                <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
            </div>  ";
            }else{  
            ?>
            <form action="_inscribirse.php" method="POST">
            <input type="hidden" value="<?php echo $row['_idEvent'];?>" name="idEvent">
            <input type="hidden" value="<?php echo $row['description']?>" name="description">
            <input type="hidden" value="<?php echo $userName?>" name="username">
            <input type="hidden" value="<?php echo $row['eventName'];?>" name="eventName">
            <input type="hidden" value="<?php echo $row['fecha']?>" name="fecha">            
            <button type="submit" class="btn btn-full btn-margins rounded-sm color-black bg-white font-14 font-600 btn-xl" style="width: 92%;">
                Inscribirse
            </button>
        </form>
        <?php }?>
            
        </div>
        
        <?php endwhile; ?>
        
        <div data-menu-load="menu-footer.html"></div>
        
    </div>
    
    <!-- Page content ends here-->



    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-pages"></div>

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
                        <h5></h5>
                    </div>
                    <div class="m-auto">
                    <i class="fa-sharp fa-solid color-green-dark fa-tag font-18"></i>
                        <br>
                        <h5>$</h5>
                    </div>
                    <div class="m-auto">
                        <i class="fa fa-map-pin color-red-dark font-18"></i>
                        <br>
                        <h5></h5>
                    </div>
                </div>
                <div class="divider mt-2"></div>
                <a href="#" class="btn btn-m rounded-sm btn-full text-uppercase font-700 gradient-green border-0">ENTENDIDO</a>
            </div>
        </div>
        <?php ?>
    </div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>