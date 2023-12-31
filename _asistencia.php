<?php 

session_start();
if(!isset($_SESSION['username'])){
    header('Location: index.html');
} 

date_default_timezone_set('America/Mexico_City');

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

    case "November":
    $monthNameSpanish = "Diciembre";
    break;
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
<title>Asitencia</title>
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
        <a href="index.html" class="header-title">Tables</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main-admin" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

  

    <div class="page-title page-title-fixed">
        <h1>Lista de Asistencia</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main-admin"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>

    <div class="page-content">

        <div class="card card-style">
            <div class="content mb-2">
                <h4 class="text-center"> ASISTENCIA DE REUNIONES SEMANALES </h4>
                <br><form method="POST">
                <table class="table bg-ye table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                        <tr class="bg-yellow-dark">
                            <th scope="col" class="color-white py-3 font-14">Participantes</th>
                            <th scope="col" class="color-white py-3 font-14">Asistencia</th>
                            <th scope="col" class="color-white py-3 font-14">Faltas</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                     $asistencia = "SELECT * FROM asistencia WHERE MONTH(fecha) = $mesActual";
                     $res = mysqli_query($link, $asistencia);
                    while ($row = $res->fetch_array(MYSQLI_BOTH))
                        {
                            echo'<tr>
                                <td hidden><input name="id[]" value="'.$row['id'].'" /></td>
                                <th scope="row">'.$row['username'].' </th>			
                                <td>
                                    <select class="form-select" name="asist['.$row['id'].']">
                                        <option class="bg-dark" value="0"> Si </option>
                                        <option class="bg-dark" value="1"> No </option>
                                    </select>
                                </td>';
                                if($row['asistencia'] == 1){
                                    echo "<td><i class='fa-solid fa-x color-red-dark'></i>|</td>
                                    </tr>";
                                }else if($row['asistencia'] == 2){
                                    echo "<td>|<i class='fa-solid fa-x color-red-dark'></i>|<i class='fa-solid fa-x color-red-dark'></i>|</td></tr>";
                                }else if($row['asistencia'] == 3){
                                    echo "<td>|<i class='fa-solid fa-x color-red-dark'></i>|<i class='fa-solid fa-x color-red-dark'></i>|<i class='fa-solid fa-x color-red-dark'></i>|</td></tr>";
                                }else if($row['asistencia'] == 4){
                                    echo "<td>|<i class='fa-solid fa-x color-red-dark'></i>|<i class='fa-solid fa-x color-red-dark'></i>|<i class='fa-solid fa-x color-red-dark'></i>|<i class='fa-solid fa-x color-red-dark'></i>|</td></tr>";
                                }else{
                                    echo "";
                                }
                            }
                    ?>                                            
                    </tbody>                    
                </table>
                <button name="actualizar" type="submit" class="btn btn-m bg-yellow-dark font-700 rounded" type="submit" style="width: 100%;">
                    GUARDAR
                </button>
                </form>
               <br>
            </div>
        </div>
        <?php
			if(isset($_POST['actualizar']))
			{
				foreach ($_POST['id'] as $ids) 
				{
					$editAssist = mysqli_real_escape_string($link, $_POST['asist'][$ids]);
					$actualizar= mysqli_query($link, "UPDATE asistencia SET asistencia = (asistencia + $editAssist) WHERE id='$ids'");
				}
				if($actualizar==true)
				{
					echo "
                    <div class='ms-3 me-3 alert alert-small rounded-s shadow-xl bg-green-dark' role='alert'>
                        <span><i class='fa fa-check color-white'></i></span>
                        <strong class='color-white'>Guardado!</strong>
                        <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
                    </div> ";
				}
				else
				{
					echo " <div class='ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark' role='alert'>
                    <span><i class='fa fa-times color-white'></i></span>
                    <strong class='color-white'>We have a problem here</strong>
                    <button type='button' class='close color-white opacity-60 font-16' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
                </div>";
				}
			}

            
		?>
        <!-- Reuniones -->
        <div class="card card-style">
            <div class="content">
                <h1 class="text-center">Faltas totales en <?php echo $monthNameSpanish?></h1>
                <div class="list-group list-custom-small list-menu ms-0 me-1">
                    <?php 
                    $query = $conn->query("SELECT username, SUM(asistencia) AS faltasTotales FROM asistencia WHERE MONTH(fecha) = $mesActual GROUP BY username");
                    while($row = mysqli_fetch_array($query)):
                    ?>
                    <a href="#">
                        <img src="images/avatars/2s.png">
                        <span><?php echo $row['username']?></span>
                        <p class="float-end">Faltas: <?php echo $row['faltasTotales']?></p>
                    </a>    
                    <?php endwhile; mysqli_close($link);?>    
                </div>
            </div>
        </div>
    </div>
    <!-- Page content ends here-->

    <!-- Main Menu-->
    <div id="menu-main-admin" class="menu menu-box-left rounded-0" data-menu-load="menu-main-admin.html"></div>

    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>

</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
