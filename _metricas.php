<?php 

session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.html");
}

$mesActual = date("m");
$añoActual = date("Y");

require_once "_config.php";
$conn = $link;
$sql = "SELECT MONTH(fecha) as Mes, sum(amount) AS total FROM rewards WHERE MONTH(fecha) = $mesActual";
$query = $conn->query($sql); 
$data = array(); 
while($r = $query->fetch_object()){ 
    $data[]=$r; 
}

$stmt = "SELECT MONTH(fecha) AS mes, SUM(amount) AS totalMes FROM rewards WHERE YEAR(fecha) = $añoActual GROUP BY MONTH(fecha)";
$consult = $conn->query($stmt);
$array = array();
while($row = $consult->fetch_object()){ 
    $array[]=$row; 
}

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
<title>AppKit Mobile</title>
<link rel="icon" type="image/png" href="uploads/avanzare.png">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="index.html" class="header-title">List Groups</a>
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
        <h1>Graficas</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main-admin"><i class="fa fa-bars"></i></a>
    </div>

    <div class="page-title-clear"></div>
        
    <div class="page-content">
            <div class="card card-style">
                <div class="content">
                    <button class="btn btn-m rounded border-yellow-dark" style="width: 100%;" onClick="window.location.reload()">ACTUALIZAR GRAFICAWS</button>
                    </div>
                </div>
            <div>
            <div class="card card-style">
                <div class="content">
                    <h1 class="text-center">Total Generado en <?php echo $monthNameSpanish?> </h1>
                    <canvas id="myChart"></canvas>      
                </div>
            </div>
            <div class="card card-style">
                <div class="content">
                    <h1 class="text-center">Total generado por mes</h1>
                    <canvas id="totalMes"></canvas>
                </div>
            </div>   
        </div>     
    </div>
    <!-- Page content ends here-->

    <!-- Main Menu--> 
    <div id="menu-main-admin" class="menu menu-box-left rounded-0" data-menu-load="menu-main-admin.html"></div>
    
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
     
    
</div>
<script>    
const ctx = document.getElementById('myChart');

  var data = {
        labels: [ 
        <?php foreach($data as $d):?>
        "<?php 
     
switch($d->Mes)
{   
    case "1":
    $monthNameSpanish = "Enero";
    break;

    case "2":
    $monthNameSpanish = "Febrero";
    break;

    case "3":
    $monthNameSpanish = "Marzo";
    break;

    case "4":
    $monthNameSpanish = "Abril";
    break;

    case "5":
    $monthNameSpanish = "Mayo";
    break;

    case "6":
    $monthNameSpanish = "Junio";
    break;

    case "7":
    $monthNameSpanish = "Julio";
    break;
    
    case "8":
    $monthNameSpanish = "Agosto";
    break;

    case "9":
    $monthNameSpanish = "Septiembre";
    break;

    case "10":
    $monthNameSpanish = "Octubre";
    break;

    case "11":
    $monthNameSpanish = "Noviembre";
    break;

    case "12":
    $monthNameSpanish = "Diciembre";
    break;
}
        echo $monthNameSpanish?>", 
        <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Total Generado en el Mes',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->total;?>, 
        <?php endforeach; ?>
            ],
            backgroundColor: "#F6BB42",
            borderRadius: "black",
            borderWidth: 2
        }]
    };
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
const ctx2 = document.getElementById('totalMes');
//TABLA 2 
  var table = {
        labels: [ 
        <?php foreach($array as $a):?>
        "<?php 
     
switch($a->mes)
{   
    case "1":
    $monthNameSpanish = "Enero";
    break;

    case "2":
    $monthNameSpanish = "Febrero";
    break;

    case "3":
    $monthNameSpanish = "Marzo";
    break;

    case "4":
    $monthNameSpanish = "Abril";
    break;

    case "5":
    $monthNameSpanish = "Mayo";
    break;

    case "6":
    $monthNameSpanish = "Junio";
    break;

    case "7":
    $monthNameSpanish = "Julio";
    break;
    
    case "8":
    $monthNameSpanish = "Agosto";
    break;

    case "9":
    $monthNameSpanish = "Septiembre";
    break;

    case "10":
    $monthNameSpanish = "Octubre";
    break;

    case "11":
    $monthNameSpanish = "Noviembre";
    break;

    case "12":
    $monthNameSpanish = "Diciembre";
    break;
}
        echo $monthNameSpanish?>", 
        <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Total Generado en el Mes',
            data: [
        <?php foreach($array as $a):?>
        <?php echo $a->totalMes;?>, 
        <?php endforeach; ?>
            ],
            backgroundColor: "#F6BB42",
            borderColor: "#fff",
            borderWidth: 2
        }]
    };
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart2 = new Chart(ctx2, {
    type: 'line', /* valores: line, bar*/
    data: table,
    options: options
});

//TABLA 2 

</script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
