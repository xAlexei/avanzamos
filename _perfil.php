<?php 

session_start();
if(!isset($_SESSION['username']) && !($_SESSION['name'])){
    header("Location: index.html");
}

$username = $_SESSION['username'];

require_once "_config.php";
$conn = $link;

$query = "SELECT * FROM users WHERE username = '$username'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_array($res);

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
        <a href="index.html" class="header-title">Perfil </a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

    <div class="page-title page-title-fixed">
        <h1>Perfil</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>

    <div class="page-content">

        <div class="mb-4">
            <div class="divider mb-4"></div>
            <div class="d-flex content mt-0 mb-1">
                <!-- right side of profile. increase image width to increase column size-->
                <div>
                    <img src="image/avatars/2l.png" data-src="images/avatars/2s.png" width="85" class="rounded-circle me-3 shadow-xl preload-img">
                </div>
                <!-- left side of profile -->
                <div class="flex-grow-1">
                    <h2><?php echo $row['username']?></h2>
                    <form method="POST">
                    <button name="editar" type="submit" class="mt-3 btn btn-xs font-600 btn-border border-yellow-dark color-yellow-dark">
                        Editar Perfil
                    </button>
                    </form>
                </div>
            </div>

            <div class="content">
                <h6><?php if(($row['verification']) == 2){
                        echo "".$row['name']."<i class='fa fa-check-circle color-green-dark font-18 mt-2 ms-3'></i>";
                    }else if(($row['verification']) == 1){
                        echo "".$row['name']."<i class='fa fa-check-circle color-white font-18 mt-2 ms-3'></i>";
                    }else{
                        echo "";
                    }                           
                ?> </h6>
                <p class="mb-n3"><?php echo $row['description']?></p>
                <br><p class="mb-n3">Correo Electronico: <?php echo $row['email']?>
                    <br>Teléfono: <?php echo $row['phone']?>
                    <br>Direccion: <?php echo $row['address']?>
                    <br>Empresa: <?php echo $row['companyName']?></p><br>
            </div>

            <!-- follow buttons-->
            <div class="divider mb-2"></div>                       
        </div>
    <?php 

    $editar = $_POST['editar'] ?? null;
    
    if(!isset($_POST['editar'])){
        echo "";
    }else{
    ?>

<div class="card card-style">
            <div class="content mb-0">   
                <form method="POST">                     
                <!-- Nombre de usuario -->
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-user"></i>
                    <input type="name" class="form-control validate-name" name="username" placeholder="<?php echo $row['username']?>" required>
                    <label for="form1a" class="color-highlight">Usuario</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <!-- Password -->
                <div class="input-style no-borders no-icon validate-field mb-4">
                    <input type="password" class="form-control validate-text" name="password" placeholder="Por favor, ingresa tu contraseña" required>
                    <label for="form2a" class="color-highlight">Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <!-- Correo -->
                <div class="input-style no-borders no-icon validate-field mb-4">
                    <input type="email" class="form-control validate-text" name="email" placeholder="<?php echo $row['email']?>" required>
                    <label for="form3a" class="color-highlight">Email</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <!-- Nombre completo -->                
                <div class="input-style no-borders no-icon validate-field mb-4">
                    <input type="text" class="form-control validate-text" name="name" placeholder="Nombre Completo" required>
                    <label for="form4a" class="color-highlight">Nombre Completo</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <!-- Telefono -->
                <div class="input-style no-borders no-icon validate-field mb-4">
                    <input type="tel" class="form-control validate-text" name="phone" placeholder="Numero de Telefono" required>
                    <label for="form4aa" class="color-highlight">Teléfono</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <!-- Nombre de la empresa -->
                <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa-solid fa-building"></i>
                        <input type="text" class="form-control validate-name" name="company" id="companyName" placeholder="Nombre de la empresa" required>
                        <label for="form1ab" class="color-highlight">Nombre de la empresa</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                <!-- Descripcion de la empresa -->
                    <div class="input-style has-borders no-icon validate-field mb-4">
                        <textarea id="description" style="width: 100%;" name="description" placeholder="Descripcion de la empresa" required></textarea>
                        <label for="form1ad" class="color-highlight">Descripcion</label>
                        <em class="mt-n6">(required)</em>
                    </div>
                <!-- Categoria -->
                <div class="input-style no-borders no-icon mb-4">
                    <label for="form5a" class="color-highlight">Select A Value</label>
                    <select id="category" name="category">
                            <option class="bg-dark-dark" value="default" disabled selected>Selecciona una opcion</option>
                            <option class="bg-dark-dark" value="Moda y Eventos">Moda y Eventos</option>
                            <option class="bg-dark-dark" value="Salud">Salud</option>
                            <option class="bg-dark-dark" value="Servicios">Servicios</option>
                            <option class="bg-dark-dark" value="Construccion">Construcción</option>
                            <option class="bg-dark-dark" value="Legal y Contable">Legal y Contable</option>
                            <option class="bg-dark-dark" value="Tecnologia y Marketing">Tecnología y Marketing</option>
                            <option class="bg-dark-dark" value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                        </select>
                    <span><i class="fa fa-chevron-down"></i></span>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                    <em></em>
                </div>
                 <!-- Direccion de la empresa -->
                 <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                   <i class="fa-solid fa-location-dot"></i>
                    <input type="text" class="form-control validate-name" name="address" id="address" placeholder="Direccion" required>
                    <label for="form1ab" class="color-highlight">Nombre de la empresa</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                    <div class="col-12">
                        <button name="actualizar" type="submit" class="btn btn-full btn-l font-600 font-13 mt-4 rounded-s" style="width: 100%; background-color: #F1BE35;">
                            ACTUALIZAR DATOS
                        </button>
                    <br></div>
                </form>
                <!--  -->
            </div>
        </div>

    <?php 
    }

    

    if(!isset($_POST['actualizar'])){
        echo "";
    }else{
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $nombre = $_POST['name'];
        $phone = $_POST['phone'];
        $company = $_POST['company'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $address = $_POST['address'];

        $query = "UPDATE users SET 
        username = '$user',
        password = '$pass',
        email = '$email',
        name = '$nombre',
        phone = '$phone',
        companyName = '$company',
        description = '$description',
        category = '$category',
        address = '$address' WHERE username = '$username'";
        $res = mysqli_query($link, $query);
        if($res = TRUE){
            echo "
            <div class='ms-3 me-3 alert alert-small rounded-s shadow-xl bg-green-dark' role='alert'>
                <span><i class='fa fa-check color-white'></i></span>
                <strong class='color-white'>Guardado!</strong>
                <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
            </div>";
        }

    }


    mysqli_close($link);
    ?>
    </div>
    <!-- Page content ends here-->

    <!-- Story Menu -->
    <div id="menu-story"
         class="menu menu-box-modal bg-dark-dark"
         data-menu-width="cover"
         data-menu-height="cover">
        <div class="card bg-6 rounded-0 mb-0" data-card-height="cover-full">
            <div class="card-top">
                 <h1 class="color-white font-18 ms-3 mt-4">
                     <img src="images/pictures/6s.jpg" width="30" class="rounded-xl me-2 mt-n1">
                     Jane Louder
                     <span class="opacity-60 font-300 font-12 ps-3 pb-3">12w</span>
                     <a href="#" class="close-menu float-end me-3 mt-0 color-white font-20"><i class="fa fa-times"></i></a>
                </h1>
            </div>
            <div class="card-center text-center">
                <h1 class="color-white mb-3 font-50 text-uppercase font-900">Create</h1>
                <h1 class="color-white mb-3 font-38 text-uppercase font-900">Awesome</h1>
                <h1 class="color-white mb-0 font-48 text-uppercase font-900">Stories</h1>
                <p class="color-white boxed-text-l font-16 mt-4">
                    Simulate Stories with ease. It's a great and super easy to use feature.
                </p>
                <a href="#" class="btn btn-center-s rounded-s close-menu btn-m font-13 border-gray-light font-700 text-uppercase color-white">Awesome</a>
            </div>
            <div class="card-overlay bg-black opacity-80"></div>
        </div>
    </div>




    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280"></div>

    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>

    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>


</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
