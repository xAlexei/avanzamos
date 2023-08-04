<?php 

require_once "_config.php";
$conn = $link;
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
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
                <h4>Usuarios que mas reuniones personales han concretado</h4>
                <div class="list-group list-custom-small list-menu ms-0 me-1">
                    <?php 
                    $query = $conn->query("SELECT a.username, COUNT(*) AS num
                    FROM personalmeetings AS a 
                   GROUP BY a.username  ORDER BY num desc LIMIT 3");
                    while($row = mysqli_fetch_array($query)):
                    ?>
                    <a href="#">
                        <img src="images/avatars/2s.png">
                        <span><?php echo $row['username']?></span>
                        <p class="float-end">Total de reuniones: <?php echo $row['num']?></p>
                    </a>    
                    <?php endwhile;?>    
                </div>
                <div class="divider mt-3"></div>
                <a href="_userlist.php" class="btn btn-full btn-m font-600 font-13 mt-4 rounded-s mb-2 bg-yellow-dark">VER LISTA COMPLETA</a>
            </div>  
        </div>
          <?php 
          $query = mysqli_query($link, "SELECT * FROM events WHERE active = 1");
          while($row = mysqli_fetch_array($query)):
          ?>
            <!-- Reuniones Avanzamos -->
            <div class="card card-style">
                <div class="content">
                    <h1 class="text-center">REUNIONES ACTIVAS </h1>      
                </div>             
            </div>
            <div class="card card-style">            
            <div class="content">
                <p class="font-600 color-highlight mb-n1">FECHA: <?php echo $row['fecha'];?></p>
                <h1 class="font-20 font-800"><?php echo $row['eventName']?></h1>
                <p class="font-900 font-14 mb-3">
                    <?php echo $row['description'] ?>
                </p>
                <p class="opacity-80">
                    <a href="" data-menu="menu-option-1" class="btn btn-m bg-yellow-dark font-700 rounded"> Finalizar Reunion </a>
                    <a href="" data-menu="menu-option-2" class="btn btn-m btn-danger font-700 rounded"> Cancelar reunion </a>                    
                </p>
            </div>
        </div>
    </div> 
    <div id="menu-option-1" 
         class="menu menu-box-modal rounded-m" 
         data-menu-height="200" 
         data-menu-width="350">
        <div class="menu-title">
            <i class="fa fa-question-circle scale-box float-start me-3 ms-3 fa-3x mt-1 color-blue-dark"></i>
            <p class="color-highlight">We need to know,</p>
            <h1 class="font-20">Finalizar la reunion?</h1>
            <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
        </div>
        <div class="content mt-0">
            <p class="pe-3">
                Por favor, confirma antes de continuar
            </p>
            <div class="row mb-0">
                <div class="col-6">
                    <a href="#" class="btn close-menu btn-full btn-m bg-red-dark font-600 rounded-s">No, cancelar</a>
                </div>
                <div class="col-6">
                    <a href="_endMeet.php?idmeeting=<?php echo $row['_idEvent']?>"  class="btn close-menu btn-full btn-m bg-success font-600 rounded-s">Si, proceder!</a>
                </div>
            </div>
        </div>
    </div>
<!-- MENU PARA CANCELAR LA REUNION -->
    <div id="menu-option-2" 
         class="menu menu-box-modal rounded-m" 
         data-menu-height="200" 
         data-menu-width="350">
        <div class="menu-title">
            <i class="fa fa-question-circle scale-box float-start me-3 ms-3 fa-3x mt-1 color-blue-dark"></i>
            <p class="color-highlight">We need to know,</p>
            <h1 class="font-20">Cancelar reunion?</h1>
            <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
        </div>
        <div class="content mt-0">
            <p class="pe-3">
            Por favor, confirma antes de continuar
            </p>
            <div class="row mb-0">
                <div class="col-6">
                    <a href="#" class="btn close-menu btn-full btn-m bg-red-dark font-600 rounded-s">No, cancelar</a>
                </div>
                <div class="col-6">
                    <a href="_cancelarEvento.php?id=<?php echo $row['_idEvent']?>"  class="btn close-menu btn-full btn-m bg-success font-600 rounded-s">Si, proceder!</a>
                </div>
            </div>
        </div>
    </div>
         <?php endwhile; mysqli_close($link)?>
               
     
    <!-- Page content ends here-->

    <div id="menu-main-admin" class="menu menu-box-left rounded-0" data-menu-load="menu-main-admin.html"></div>    

    
<!-- Menu de confirmacion -->

</div>


<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
