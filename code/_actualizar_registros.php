<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

require_once "_config.php";
$conn = $link;
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$alumnos="SELECT * FROM asistencia";
$resAlumnos = mysqli_query($link, $alumnos);
?>

<html lang="es">
	<head>
		<title>Actualizar Registros PHP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Actualizar Registros de la BD con PHP</h2>
			</div>
		</header>
		<section>
			<form method="post">
			<table class="table">
				<tr>
					<th>ID_Alumno</th>
					<th>Nombre</th>
					<th>Carrera</th>
				</tr>

				<?php

				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						<td hidden><input name="idalu[]" value="'.$registroAlumnos['id'].'" /></td>
						 <td><input name="idalu2['.$registroAlumnos['id'].']" value="'.$registroAlumnos['id'].'" /></td>			
                         <td>
                            <select name="carr['.$registroAlumnos['id'].']">
                                <option value="0"> Si </option>
                                <option value="1"> No </option>
                            </select>
                         </td>
						 </tr>';
				}
				?>
			</table>
			<input type="submit" name="actualizar" value="Actualizar Registros" class="btn btn-info col-md-offset-9" />
		</form>

		<?php
			if(isset($_POST['actualizar']))
			{
				foreach ($_POST['idalu'] as $ids) 
				{
                    $editID=mysqli_real_escape_string($link, $_POST['idalu2'][$ids]);
					$editNom = mysqli_real_escape_string($link, $_POST['carr'][$ids]);

					$actualizar= mysqli_query($link, "UPDATE asistencia SET asistencia = (asistencia + $editNom) WHERE id='$ids'");
				}

				if($actualizar==true)
				{
					echo "FUNCIONA! <a href='actualizar_registros.php'>CLICK AQUÍ</a>";
				}

				else
				{
					echo "NO FUNIONA!";
				}
			}
		?>
		</section>
		<footer>
		</footer>
	</body>
</html>


<?php                         
                        $asistencia = "SELECT * FROM asistencia";
                        $res = mysqli_query($link, $asistencia);
                        while($row = mysqli_fetch_array($res)):
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $row['eventName']?>
                                <br><?php echo $row['fecha']?></th>
                            <th scope="row"><?php echo $row['username']?></th>
                            <td>
                                <select name="asist" class="form-select">
                                    <option value="0"> Si </option>
                                    <option value="1"> No</option>
                                </select>
                            </td>
                        </tr>
                        <?php
                        endwhile;
                        ?>