<?php 

session_start();
if(!isset($_SESSION['username'])){
    header('Location: _index.html');
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
<title>Eventos Programados</title>
<link rel="icon" type="image/png" href="uploads/avanzare.png">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="index.html" class="header-title">Tables</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main-admin" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

    <div id="footer-bar" class="footer-bar-6">
        <a href="index-components.html" class="active-nav"><i class="fa fa-layer-group"></i><span>Features</span></a>
        <a href="index-pages.html"><i class="fa fa-file"></i><span>Pages</span></a>
        <a href="index.html" class="circle-nav"><i class="fa fa-home"></i><span>Welcome</span></a>
        <a href="index-projects.html"><i class="fa fa-camera"></i><span>Projects</span></a>
        <a href="#" data-menu="menu-main-admin"><i class="fa fa-bars"></i><span>Menu</span></a>
    </div>

    <div class="page-title page-title-fixed">
        <h1>Lista de Eventos</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main-admin"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>

    <div class="page-content">


        <div class="card card-style">
            <p class="content">
                Aqui se muestran los eventos programados ordenados por fecha.
            </p>
        </div>
        <div class="card card-style">
            <div class="content mb-2">
                <h4>REUNIONES SEMANALES</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-blue-dark">
                            <th scope="col" class="color-white py-3 font-14">Evento</th>
                            <th scope="col" class="color-white py-3 font-14">Acciones</th>
                            <th scope="col "class="color-white py-3 font 14">Asistencia</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php                         
                        $query = "SELECT _idEvent, eventName, fecha FROM events ORDER BY fecha DESC";
                        $res = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($res)):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['eventName']?></th>
                            <td>
                                <a href="_editarEvento.php?id=<?php echo $row['_idEvent']?>" ><i class="fa-solid fa-pen-to-square font-20" ></i></a>
                                <a href="_eliminarEvento.php?id=<?php echo $row['_idEvent']?>"><i class="fa-solid fa-trash font-20" style="color: #eb0a0a;"></i></a>
                            </td>
                            <td><a href="_asistencia.php" class="btn btn-m bg-success font-900 rounded">Lista</a></td>
                            
                        </tr>
                        <?php
                        endwhile;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- Reuniones -->
        <div class="card card-style">
            <div class="content mb-2">
                <h4>ASISTENCIA</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-blue-dark">
                            <th scope="col" class="color-white py-3 font-14">Evento</th>
                            <th scope="col" class="color-white py-3 font-14">Fecha</th>
                            <th scope="col" class="color-white py-3 font-14">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                         
                        $query = "SELECT username FROM asistencia ORDER BY username ASC";
                        $res = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($res)):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['username']?></th>
                            
                            <td>
                 
                            </td>
                        </tr>
                        <?php
                        endwhile;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        

        <div data-menu-load="menu-footer.html"></div>
    </div>
    <!-- Page content ends here-->

    <!-- Main Menu-->
    <div id="menu-main-admin" class="menu menu-box-left rounded-0" data-menu-load="menu-main-admin.html" data-menu-width="280" data-menu-active="nav-components"></div>

    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>

    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>


</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>