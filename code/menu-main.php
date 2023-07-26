<?php 

session_start();
if (!isset($_SESSION["username"])) {
	header("Location: _index.html");
}else{
    $user = $_SESSION['username'];
}

require_once "_config.php";
$conn = $link;
$query = "SELECT * FROM users WHERE username = '$user'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_array($res);

?>
<div class="card rounded-0 bg-6" data-card-height="150" style="background-image: url('uploads/background_avanzamos.png');">
    <div class="card-top">
        <a href="#" class="close-menu float-end me-2 text-center mt-3 icon-40 notch-clear"><i class="fa fa-times color-white"></i></a>
    </div>
    <div class="card-bottom">
        <h1 class="color-white ps-3 mb-n1 font-28"></h1>
        <p class="mb-2 ps-3 font-12 color-white">
        <?php if(($row['verification']) == 2){
                        echo "".$row['name']."<i class='fa fa-check-circle color-green-dark font-18 mt-2 ms-3'></i>";
                    }else if(($row['verification']) == 1){
                        echo "".$row['name']."<i class='fa fa-check-circle color-white font-18 mt-2 ms-3'></i>";
                    }else{
                        echo "";
                    }                           
                ?>    
        </p>
    </div>
    <div class="card-overlay bg-gradient"></div>
</div>
<div class="mt-4"></div>
<h6 class="menu-divider">MENU</h6>
<div class="list-group list-custom-small list-menu">
    <a id="nav-welcome" href="_servicios.php">
        <i class="fa-solid fa-house color-yellow-dark"></i>
        <span>Inicio</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-homepages" href="_mis_eventos.php">
        <i class="fa-solid fa-calendar-check color-yellow-dark" ></i>
        <span>Agendado</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-pages" href="_mis_reuniones.php">
        <i class="fa-sharp fa-solid fa-users color-yellow-dark" ></i>
        <span>Mis reuniones personales</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-pages" href="_integrantes.php">
    <i class="fa-solid fa-circle-user color-yellow-dark"></i>
        <span>Integrantes del grupo</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-components" href="_calendario.php">
        <i class="fa-solid fa-calendar-plus color-yellow-dark" ></i>
        <span>Reuniones Semanales</span>
        <i class="fa fa-angle-right"></i>
    </a>
    
    <a id="nav-pages" href="_agradecimientos.php">
    <i class="fa-solid fa-star color-yellow-dark"></i>
        <span>Agradecimientos</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<h6 class="menu-divider mt-4">Otras opciones</h6>
<div class="list-group list-custom-small list-menu">
    <a href="_logout.php">
        <i class="fa-solid fa-right-from-bracket color-yellow-dark"></i>
        <span>Cerrar Sesión</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a href="#" data-toggle-theme="" data-trigger-switch="switch-dark-mode">
        <i class="fa-solid fa-moon color-yellow-dark"></i>
        <span>Dark Mode</span>
        <div class="custom-control small-switch ios-switch">
            <input data-toggle-theme type="checkbox" class="ios-input" id="toggle-dark-menu">
            <label class="custom-control-label" for="toggle-dark-menu"></label>
        </div>
    </a>
</div>
<h6 class="menu-divider mt-4">Redes Sociales</h6>
<div class="list-group list-custom-small list-menu">
    <a href="#">
        <i class="fab fa-facebook-f color-yellow-dark"></i>
        <span>Facebook</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a href="#">
    <i class="fa-brands fa-youtube color-yellow-dark"></i>
        <span>YouTube</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a href="#">
    <i class="fa-brands fa-spotify color-yellow-dark"></i>
        <span>Spotify</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>

