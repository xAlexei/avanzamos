<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

$name = $_GET['name'];
require_once "_config.php";

$conn = $link;
$fecha = date("Y-m-d");



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
    <div class="header header-fixed header-logo-center">
        <a href="index.html" class="header-title">Agradecimiento</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

    <div class="page-title-clear"></div>
        
    <div class="page-content">
        <div class="card card-style">
            <div class="content mb-0">        
                <h3 class="text-center"><i class="fa-solid fa-star color-yellow-dark"></i>Agredece a tus compañero <?php echo $name?></h3>        
                <br><form method="POST">        
                <input type="hidden" name="fecha" value="<?php echo $fecha;?>">
                <!-- Usuario para agradacer -->
                <div class="input-style has-borders no-icon mb-4">
                    <input type="hidden" value="<?php echo $name;?>" class="form-control validate-text" name="username" required>
                </div>
                <!-- Cantidad generada -->
                <div class="input-style has-borders no-icon mb-4">
                    <input type="text" class="form-control validate-text" id="amount" name="amount" placeholder="¿Qué cantidad te ayudo a generar esta persona?" required>
                    <label for="" class="for">Cantidad</label>
                </div>
                <div class="input-style">
                <button name="submit" type="submit" class="btn btn-full btn-l font-600 font-13 mt-4 rounded-s" style="width: 100%; background-color: #F1BE35;">
                        AGRADACER
                </button>
                </div>
            </form>
            </div>
        </div>
        <?php 
       
       if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $amount = $_POST['amount'];
        $fecha_actual = $_POST['fecha'];
        
        $query = "INSERT IGNORE rewards (username, amount, fecha) VALUES ('$username', $amount, '$fecha_actual')";
        $result = $link->query($query);
        if($result){
            echo "
            <div class='ms-3 me-3 alert alert-small rounded-s shadow-xl bg-green-dark' role='alert'>
                <span><i class='fa fa-check color-white'></i></span>
                <strong class='color-white'>Gracias por tu agradecimiento!</strong>
                <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
            </div> ";
        }

       }
       
         
        ?>
       
      
    </div>
    <!-- Page content ends here-->
    
    <!-- Main Menu--> 
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-components"></div>
    
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
     
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
