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
<title>Agradecimientos</title>
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
        <a href="index.html" class="header-title">Store</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    
    <div class="page-title page-title-fixed">
        <h1>Rewards</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">
        <div class="content mt-n3 mb-4">
                <form method="POST">
            <div class="search-box search-dark shadow-m border-0 mt-4 bg-theme rounded-m bottom-0">
                <i class="fa fa-search ms-1"></i>
                <input type="text" name="keyword" class="border-0" placeholder="Ingresa el nombre de la persona, ejemplo 'John Doe'" data-menu="menu-success-2">
            </div>   
                </form>
        </div> 
        <?php 
        
        $aKeyword = explode(" ", $_POST['keyword'] ?? null);
        if(!isset($_POST['keyword'])){
            echo "";
        }else{        
        $query ="SELECT * FROM users WHERE name like '%" . $aKeyword[0] . "%' OR username like '%" . $aKeyword[0] . "%'";  
             for($i = 1; $i < count($aKeyword); $i++) {
                if(!empty($aKeyword[$i])) {
                    echo "";
                }
             }
            $result = $conn->query($query);
            if(mysqli_num_rows($result) > 0) {
                
            $row_count=0;
            While($row = $result->fetch_assoc()) {
                $userId = $row['_idUser'];
                $consulta = $link->query("SELECT FORMAT(AVG(rating),1) AS averageRating FROM rating WHERE userId = '$userId'");
                
            ?>
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
                            <a href='_reunionForm.php?name=<?php echo $row['name']?>' class='btn btn-full btn-sm rounded-s font-600 font-13 color-bg-yellow-dark border-yellow-dark'>Cita Personal</a>
                        </div>
                        <div class='col-6'>
                            <a href='_addAgradecimientos.php?name=<?php echo $row['name']?>' class='btn btn-full btn-sm rounded-s font-600 font-13 color-bg-yellow-dark border-yellow-dark'>Agradecimiento</a>                        
                    <br></div>
                        <div class='col-6' style="width: 100%;">
                            <a href='_calidadServicio.php?id=<?php echo $row['_idUser']?>' class='btn btn-full btn-sm rounded-s font-600 font-13 bg-yellow-dark'>CALIDAD DE SERVICIO</a>
                        <br></div>
                    </div>
               </div>    
            </div>                     
        <?php        
            }
        }else {
            echo " <div class='ms-3 me-3 alert alert-small rounded-s shadow-xl bg-yellow-dark' role='alert'>
            <span><i class='fa fa-exclamation-triangle color-white'></i></span>
            <strong class='color-white'>Lo sentimos, no encontramos resultados</strong>
            <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
        </div>";
        }
    }
        ?>
        
       
    </div>
    <!-- Page content ends here-->
    
    <!-- Main Menu--> 
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-pages"></div>
    
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
     
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
