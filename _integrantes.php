<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

require_once "_config.php";
$conn = $link;

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
    
    <div class="header header-fixed header-logo-center">
        <a href="index.html" class="header-title">Lista</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    
    <div class="page-title-clear"></div>
        
    <div class="page-content">
        
        <div class="card card-style">
            <div class="content mb-0">
                <p class="mb-n1 color-yellow-dark font-600">INTEGRANTES DEL GRUPO</p>                
                <br>   
                <?php                         
                    $query = "SELECT * FROM users WHERE verification < 3";
                    $res = mysqli_query($link, $query);
                    while($row = mysqli_fetch_array($res)):
                ?>                                    
                <div class="d-flex mb-4">                 
                    <div class="align-self-center">
                        <p class="color-yellow-dark font-11 mb-n2 font-900"><?php echo $row['name']?></p>
                        <h2 class="font-15 line-height-s mt-1 mb-1"></h2>
                        <p>Correo Electronico <?php echo $row['email']?>
                        <br>Télefono: <?php echo $row['phone']?></p>

                    </div>
                    <div class="ms-auto ps-3 align-self-center text-center">                        
                    <a href="_detalleUsuario.php?id=<?php echo $row['_idUser']?>"><button class="btn btn-m rounded bg-yellow-dark font-900">
                            Detalles
                        </button></a>
                    </div>
                </div>   
                <?php endwhile; ?>             
            </div>
                <div class="divider"></div>
        </div> 
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
