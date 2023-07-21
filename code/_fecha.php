<?php 

require_once "_config.php";
$conn = $link;

$day = date('d');
$month = date('m');
$year = date('Y');
echo $year;
echo $month;

$query = "SELECT * FROM asistencia WHERE MONTH (fecha) = $month AND YEAR (fecha) = $year AND DAY (fecha) > $day";
$res = mysqli_query($link, $query);
while($row = mysqli_fetch_array($res)){
    echo $row['eventName'];
}

?>