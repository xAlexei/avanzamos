<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Registrate</title>
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


    <div class="page-content pb-0">

        <div data-card-height="cover-full" class="card mb-0" style="">
            <div class="card-center">
                <div class="text-center">
                    <h1 class="font-20 color-white"></h1>
                    <p class="boxed-text-xl color-white opacity-50 pt-3 font-15">
                    Por favor, complete con sus datos
                    </p>
                </div>
            <form action="_registration.php" method="post" enctype="multipart/form-data">
                <div class="content px-4">
                    <!-- Nombre de la usuario -->
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control validate-name" name="username" id="username" placeholder="Nombre de usuario (Tu nombre/De tu empresa)">
                        <label for="form1ab" class="color-highlight">Nombre de usuario</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <!-- Nombre completo -->
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control validate-name" name="nombre" id="nombre" placeholder="Nombre completo">
                        <label for="form1ab" class="color-highlight">Nombre</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <!-- Correo electronico -->
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-at"></i>
                        <input type="email" class="form-control validate-email" name="email" id="email" placeholder="Correo electronico">
                        <label for="form1ac" class="color-highlight">Email</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                   <!-- Nombre de la empresa -->
                   <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa-solid fa-building"></i>
                        <input type="text" class="form-control validate-name" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre de la empresa">
                        <label for="form1ab" class="color-highlight">Nombre de la empresa</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <!-- Telefono -->
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa-solid fa-phone"></i>
                        <input type="number" class="form-control validate-password" name="tel_personal" id="tel_personal" placeholder="Numero de telefono">
                        <label for="form1ad" class="color-highlight">Télefono</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <!-- Giro -->
                    <div class="input-style input-style-always-active has-borders no-icon mb-4">
                        <select id="giro" name="giro">
                            <option value="default">Selecciona una opcion</option>
                            <option value="Moda y Eventos">Moda y Eventos</option>
                            <option value="Salud">Salud</option>
                            <option value="Servicios">Servicios</option>
                            <option value="Construccion">Construccion</option>
                            <option value="Legal y Contable">Legal y Contable</option>
                            <option value="Tecnologia y Marketing">Tecnología y Marketing</option>
                            <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                        </select>
                        <span><i class="fa fa-chevron-down"></i></span>
                    </div>
                    <!-- Descripcion de la empresa -->
                    <div class="input-style has-borders no-icon validate-field mb-4">
                        <textarea id="descripcion" style="width: 100%;" name="descripcion" placeholder="Descripcion de la empresa"></textarea>
                        <label for="form1ad" class="color-highlight">Descripcion</label>
                        <em class="mt-n6">(required)</em>
                    </div>
                     <!-- Contraseña -->
                     <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control validate-password" name="password" id="password" placeholder="Contraseña">
                        <label for="form1ad" class="color-highlight">Contraseña</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <!-- Foto de perfil -->
                    <div class="user-box">
                        <input for="imagen" type="file" class="imagen" id="imagen" name="imagen">
                        <label>Elige una imagen de foto de perfil</label>
                    </div>
                    <!-- PIN -->
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa-solid fa-lock"></i>
                        <input type="text" class="form-control validate-password" name="pin" id="pin" placeholder="Crea un PIN de 4 digitos">
                        <label for="form1ad" class="color-highlight">PIN</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-full btn-l font-600 font-13 mt-4 rounded-s" style="width: 100%; background-color: #F1BE35;">
                        REGISTRARSE
                    </button>
                </div>
            </form>   
                    <!-- Termina el fofrmulario -->
                    <div class="row pt-3 mb-3">
                        <div class="col-6 text-start font-11">
                            <a class="color-white opacity-50" href="page-system-forgot-2.html">Olvidaste tu contraseña?</a>
                        </div>
                        <div class="col-6 text-end font-11">
                            <a class="color-white opacity-50" href="_index.html">Iniciar Sesion</a>
                        </div>
                    </div>

                </div>


            </div>
            <div class="card-overlay bg-black opacity-85"></div>
        </div>


    </div>
    <!-- Page content ends here-->

</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
