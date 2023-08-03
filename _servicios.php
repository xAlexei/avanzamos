<?php 
session_start();
if(!isset($_SESSION['username']) && !($_SESSION['name'])){
    header("Location: index.html");
}
require_once "_config.php";
date_default_timezone_set('America/Mexico_City');
$conn = $link;
$user = $_SESSION['username'];
$name = $_SESSION['name'];

$mesActual = date("m");
$monthNum  = $mesActual;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); 

switch($monthName)
{   
    case "January":
    $monthNameSpanish = "Enero";
    break;

    case "February":
    $monthNameSpanish = "Febrero";
    break;

    case "March":
    $monthNameSpanish = "Marzo";
    break;

    case "April":
    $monthNameSpanish = "Abril";
    break;

    case "May":
    $monthNameSpanish = "Mayo";
    break;

    case "June":
    $monthNameSpanish = "Junio";
    break;

    case "July":
    $monthNameSpanish = "Julio";
    break;
    
    case "August":
    $monthNameSpanish = "Agosto";
    break;

    case "September":
    $monthNameSpanish = "Septiembre";
    break;

    case "October":
    $monthNameSpanish = "Octubre";
    break;

    case "November":
    $monthNameSpanish = "Noviembre";
    break;

    case "Diciembre":
    $monthNameSpanish = "Diciembre";
    break;
}

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

    <div class="page-title page-title-fixed">
        <h1>AVANZAMOS <img src="uploads/avanzare.png" width="25px"></h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        <div class="content mt-n3 mb-4">
            
        </div> 

        <?php 
        $query = $conn->query("SELECT FORMAT(sum(amount),2) AS total FROM rewards WHERE MONTH(fecha) = '$mesActual'");
        $res = mysqli_fetch_array($query);
        ?>
        <div class="card card-style mt-n3">
            <div class="content mb-2 mt-3">
                <div class="row mb-0">
                    <div class="col-6 pe-1">
                    <p class="font-600 font-15 color-highlight mb-0">Total Generado <?php echo $monthNameSpanish?></p>
                        <h2 class="color-brown-dark mb-0"><?php ?></h2>
                    </div>
                    <div class="col-6 ps-1">
                        <h6 class="font-12 font-500">Cantidad</h6>
                        <h2 class=" mb-0">$<?php echo $res['total']?></h2>
                    </div>
                    <div class="col-12 pb-3"></div>
                </div>
            </div>
        </div>
             
        <?php 
        $user = '';

        if(!isset($_POST['username'])){
            echo "";
        }else if($_POST['username']){
            $user = $_POST['username'];
            $query = "SELECT * FROM users WHERE username = '$user' OR name = '$user'";
            $res = mysqli_query($link, $query);
            while($row = mysqli_fetch_array($res)){?>
            <div class='card card-style'>            
                <div class='d-flex content mb-1'>
                    <!-- left side of profile -->
                    <div class='flex-grow-1'>
                        <h2>
                            <?php if(($row['verification']) == 2){
                                echo "".$row['name']."<i class='fa fa-check-circle color-green-dark font-18 mt-2 ms-3'></i>";
                            }else if(($row['verification']) == 1){
                                echo "".$row['name']."<i class='fa fa-check-circle color-white font-18 mt-2 ms-3'></i>";
                            }else{
                                echo "".$row['name']."<p>Usuario sin verificar</p>";
                            }                           
                            ?>
                        </h2>
                        <p class='font-900 font-14 mb-3'>
                           <br>Nombre de la Compañia: <?php echo $row['companyName']?>
                           <br>Email: <?php echo $row['email']?>
                           <br>Télefono: <a href="#"> <?php echo $row['phone']?></a>
                           <br>Direccion: <?php echo $row['address']?>
                        </p>
                        <p class="font-10">
                        <p class="mb-0"><?php echo $row['description']?></p>
                        </p>
                    </div>
                    <!-- right side of profile. increase image width to increase column size-->
                    <img src='images/avatars/2s.png' width='115' height='103' class='rounded-circle mt-3 shadow-xl'>
                </div>
                <!-- follow buttons-->
                <div class='content mb-0'>
                    <div class='row mb-0'>
                        <div class='col-6'>
                            <a href='_reunionForm.php?name=<?php echo $row['name']?>' class='btn btn-full btn-sm rounded-s font-600 font-13 bg-yellow-dark'>Agendar cita</a>
                        </div>
                        <div class='col-6'>
                            <a href='_addAgradecimientos.php?name=<?php echo $row['name']?>' class='btn btn-full btn-sm rounded-s font-600 font-13 color-bg-yellow-dark border-yellow-dark'>Agradecimiento</a>
                        
                            <br></div>
                    </div>
               <br></div>               
        <?php
            }
        }
        ?>
    <div class="divider divider-margins"></div>

    <div class="page-content">
    
    <div class="card card-style">
            <div class="content mb-0">
                <p class="text-center pt-3">
                    <i class="fa fa-quote-left fa-4x color-yellow-dark"></i>
                </p>
                <h1 class="text-center font-700 pb-3">Las reuniones semanales <br> se llevan a cabo en</h1>
                <p class="text-center pb-4 color-highlight"><a href="https://goo.gl/maps/GEXJg3afLcoNfvJA8">
                     OUI Restaurante Bar</a></p>
            </div>
        </div>
        <!-- EVENTOS DESTACADOS -->
        <?php 
        $query = "SELECT * FROM specialEvents";
        $res = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($res)):
        ?>
        <div class="divider divider-margins"></div>
        <div class="card card-style">
            <div class="content">
                <h1 class="text-center">EVENTOS DESTACADOS </h1>      
            </div>
        </div>
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
        <div class="divider divider-margins"></div>
        <div class="card card-style">
            <div class="content">
                <h1 class="text-center font-20"><i class="fa-solid fa-star color-yellow-dark"></i>USUARIOS DESTACADOS <i class="fa-solid fa-star color-yellow-dark"></i></h1>      
            </div>
        </div>
        <?php
        $query = "SELECT * FROM rewards ORDER BY amount DESC LIMIT 3";
        $res = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($res)):
        ?>
        <div class="card card-style">
            <div class="content text-center">
                <img src="https://www.pngmart.com/files/22/User-Avatar-Profile-PNG-Isolated-Transparent-Picture.png" class="mx-auto rounded-circle shadow-xl" width="150">
                <h1 class="mt-4 font-20 font-700 mb-n1"><?php echo $row['username']?></h1>
                <span>
                    <i class="fa fa-star font-18 color-yellow-dark"></i>
                    <i class="fa fa-star font-18 color-yellow-dark"></i>
                    <i class="fa fa-star font-18 color-yellow-dark"></i>
                    <i class="fa fa-star font-18 color-yellow-dark"></i>
                    <i class="fa fa-star font-18 color-yellow-dark"></i>
                    <p class="line-height-l boxed-text-xl font-14 pb-3">
                        ¡Agradecemos las contribuciones que realizas con tus compañeros!
                    </p>
                </span>
            </div>
        </div>
        <?php endwhile; mysqli_close($link);?>  
        <div class="card card-style">
            <iframe
			src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14931.510530327723!2d-103.3906055!3d20.6745568!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae72bfeceaf5%3A0x6a0a9dfc0d56d667!2sOUI%20Restaurant%20Bar!5e0!3m2!1ses-419!2smx!4v1684782770664!5m2!1ses-419!2smx"
				width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
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
