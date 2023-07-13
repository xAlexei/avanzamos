<?php 

session_start();
if (!isset($_SESSION["username"])) {
	header("Location: _index.html");
}else{
    $user = $_SESSION['username'];
}

?>
<div class="card rounded-0 bg-6" data-card-height="150" style="background-image: url('uploads/background_avanzamos.png');">
    <div class="card-top">
        <a href="#" class="close-menu float-end me-2 text-center mt-3 icon-40 notch-clear"><i class="fa fa-times color-white"></i></a>
    </div>
    <div class="card-bottom">
        <h1 class="color-white ps-3 mb-n1 font-28"></h1>
        <p class="mb-2 ps-3 font-12 color-white opacity-50">Usuario: <?php echo $user;?></p>
    </div>
    <div class="card-overlay bg-gradient"></div>
</div>
<div class="mt-4"></div>
<h6 class="menu-divider">MENU</h6>
<div class="list-group list-custom-small list-menu">
    <a id="nav-welcome" href="_servicios.php">
        <i class="fa-solid fa-house" style="color: #f0d419;"></i>
        <span>Inicio</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-homepages" href="_mis_eventos.php">
        <i class="fa-solid fa-calendar-check" style="color: #f0d419;"></i>
        <span>Agendado</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-components" href="_calendario.php">
        <i class="fa-solid fa-calendar-plus" style="color: #f0d419;"></i>
        <span>Reuniones Semanales</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-pages" href="_mis_reuniones.php">
        <i class="fa-sharp fa-solid fa-users" style="color: #f0d419;"></i>
        <span>Mis reuniones</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-pages" href="_agendarReunion.php">
    <i class="fa-solid fa-calendar-plus" style="color: #f0d419;"></i>
        <span>Agendar Reunion</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-pages" href="_agendarReunion.php">
    <i class="fa-solid fa-star" style="color: #f0d419;"></i>
        <span>Agradecimientos</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<h6 class="menu-divider mt-4">Otras opciones</h6>
<div class="list-group list-custom-small list-menu">
    <a href="_logout.php">
        <i class="fa-solid fa-right-from-bracket" style="color: #f0d419;"></i>
        <span>Cerrar Sesión</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a href="#" data-toggle-theme="" data-trigger-switch="switch-dark-mode">
        <i class="fa-solid fa-moon" style="color: #f0d419;"></i>
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
        <i class="fab fa-facebook-f" style="color: #f0d419;"></i>
        <span>Facebook</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a href="#">
        <i class="fa-brands fa-instagram" style="color: #f0d419;"></i>
        <span>Instagram</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a href="#">
        <i class="fa-brands fa-twitter" style="color: #f0d419;"></i>
        <span>Twiter</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>

