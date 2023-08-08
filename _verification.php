<?php 

session_start();
require_once "_config.php";
$conn = $link;

if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

$username = $_SESSION['username'];
$query = "SELECT * FROM users";
$res = mysqli_query($link, $query);
                                                         
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

    <div class="header header-fixed header-logo-center">
        <a href="index.html" class="header-title">Verificacion</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main-admin" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    <div class="page-title-clear"></div>

    <div class="page-content">
        <div class="card card-style">
            <div class="content mb-2">
                <h4>Usuarios MAS CONFIABLES</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-yellow-dark">
                            <th scope="col" class="color-white py-3 font-14">Usuario</th>
                            <th scope="col" class="color-white py-3 font-14">Nivel de verificacion</th>
                            <th scope="col" class="color-white py-3 font-14">Bajar nivel</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php                         
                        $query = "SELECT * FROM users WHERE verification = 2 ORDER BY name";
                        $res = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($res)):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['name']?></th>
                            <td> <i class='fa-sharp fa-solid fa-circle-check font-25' style='color: #239414;'></i></td>
                            <td><a href="_degradarVerification.php?id=<?php echo $row['_idUser']?>" name="bajar" class="btn btn-m bg-danger font-700 rounded">Degradar</a></td>
                        </tr>
                        <?php
                        endwhile;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-style" >
            <div class="content mb-2" style="padding: 10px;">
                <h4>Usuarios verificados</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-yellow-dark">
                            <th scope="col" class="color-white py-3 font-14">Usuario</th>
                            <th scope="col" class="color-white py-3 font-14">Nivel de verificacion</th>
                            <th scope="col" class="color-white py-3 font-14">Subir Nivel</th>
                            <th scope="col" class="color-white py-3 font-14">Bajar Nivel</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php                         
                        $query = "SELECT * FROM users WHERE verification = 1 ORDER BY name";
                        $res = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($res)):        
                        ?>  
                        <tr>
                            <th scope="row"><?php echo $row['name']?></th>
                            <td><i class='fa-sharp fa-solid fa-circle-check font-25 color-white'></td>
                            <td><a href="_safeuserVerification.php?id=<?php echo $row['_idUser']?>"><i class="fa-solid fa-arrow-up font-20 color-green-dark"></i></a></td>
                            <td><a href="_quitarVerification.php?id=<?php echo $row['_idUser']?>"><i class="fa-solid fa-arrow-down font-20 color-red-dark"></i></a></td>
                        </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-style">
            <div class="content mb-2">
                <h4>Usuarios por verificar</h4>
                <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-yellow-dark">
                            <th scope="col" class="color-white py-3 font-14">Usuario</th>
                            <th scope="col" class="color-white py-3 font-14">Verificar</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php                         
                        $query = "SELECT * FROM users WHERE verification = 0";
                        $res = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($res)):                            
                        ?>  
                        <tr>
                            <th scope="row"><?php echo $row['name']?></th>
                            <td><a href="_addVerification.php?id=<?php echo $row['_idUser']?>" class="btn btn-m bg-success font-700 rounded">Verificar</a></td>
                        </tr>
                        <?php
                        endwhile;
                        mysqli_close($link);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Page content ends here-->

    <!-- Main Menu-->
    <div id="menu-main-admin" class="menu menu-box-left rounded-0" data-menu-load="menu-main-admin.html" ></div>

    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>

    <!-- Colors Menu-->


</div>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
