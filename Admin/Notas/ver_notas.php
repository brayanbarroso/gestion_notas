<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Ver notas</title>
</head>

<body>
	<?php
	include("../../Conexion/Conexion.php");

	$selecion = $_POST['opcion'];
	$codi = $_POST['ncod'];

	if ($selecion == 'Asignatura') {
		$sql = "SELECT nota.`Asignatura_Codigo`,nota.`Alumno_Id`,alumno.`Nombres`,CONCAT(alumno.`pApellido`,' ',alumno.`sApellido`)AS Apellidos, nota.`Nota1` ,nota.`Fecha1`,
                  nota.`Nota2`,nota.`Fecha2`,nota.`Nota3`,nota.`Fecha3`,nota.`NotaFinal`
                FROM nota,asignatura,alumno
                WHERE nota.`Alumno_Id` = alumno.`Id` AND nota.`Asignatura_Codigo` = asignatura.`Codigo` AND nota.`Asignatura_Codigo` = '$codi'";

		$result = $pdo->prepare($sql);
		$result->execute(array($selecion, $codi));
		$rows = $result->fetch();
	?>

		<!-- Mostrar Notas Por Alumnos -->
		<table>
			<thead>
				<tr>
					<th>Asignatura</th>
					<th>Identificación</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Nota 1</th>
					<th>Fecha</th>
					<th>Nota 2</th>
					<th>Fecha</th>
					<th>Nota 3</th>
					<th>Fecha</th>
					<th>Nota Final</th>
					<th>Calificar</th>
				</tr>
			</thead>
			<?php
			foreach ($rows as $row) :
			?>
				<tbody>
					<tr>
						<td><?php echo $row['Asignatura_Codigo']; ?></td>
						<td><?php echo $row['Alumno_Id']; ?></td>
						<td><?php echo $row['Nombres']; ?></td>
						<td><?php echo $row['Apellidos']; ?></td>
						<td><?php echo $row['Nota1']; ?></td>
						<td><?php echo $row['Fecha1']; ?></td>
						<td><?php echo $row['Nota2']; ?></td>
						<td><?php echo $row['Fecha2']; ?></td>
						<td><?php echo $row['Nota3']; ?></td>
						<td><?php echo $row['Fecha3']; ?></td>
						<td><?php echo $row['NotaFinal']; ?></td>
						<td>
							<a href="add_nota.php?cod=<?php echo $row['Asignatura_Codigo']; ?>&id=<?php echo $row['Alumno_Id']; ?>">Calificar</a>
						</td>
					</tr>
				</tbody>
			<?php
			endforeach;
			?>
		</table>
	<?php
	} elseif ($selecion == 'Alumno') {
		$sql = "SELECT nota.`Alumno_Id`,nota.`Asignatura_Codigo`,asignatura.`Nombre`, nota.`Nota1`,nota.`Fecha1`,
       nota.`Nota2`,nota.`Fecha2`,nota.`Nota3`,nota.`Fecha3`,nota.`NotaFinal`
                     FROM nota,asignatura,alumno
                     WHERE nota.`Alumno_Id` = alumno.`Id` AND nota.`Asignatura_Codigo` = asignatura.`Codigo` AND nota.`Alumno_Id` = '$codi'";

		$result = $pdo->prepare($sql);
		$result->execute(array($selecion, $codi));
		$rows = $result->fetch();

	?>
		<!-- Mostrar Notas Por Asignatura -->
		<table>
			<thead>
				<tr>
					<th>Alumno</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Nota 1</th>
					<th>Fecha</th>
					<th>Nota 2</th>
					<th>Fecha</th>
					<th>Nota 3</th>
					<th>Fecha</th>
					<th>Nota Final</th>
					<th>Calificar</th>
				</tr>
			</thead>
			<?php
			foreach ($rows as $row) :
			?>
				<tbody>
					<tr>
						<td><?php echo $row['Alumno_Id']; ?></td>
						<td><?php echo $row['Asignatura_Codigo']; ?></td>
						<td><?php echo $row['Nombre']; ?></td>
						<td><?php echo $row['Nota1']; ?></td>
						<td><?php echo $row['Fecha1']; ?></td>
						<td><?php echo $row['Nota2']; ?></td>
						<td><?php echo $row['Fecha2']; ?></td>
						<td><?php echo $row['Nota3']; ?></td>
						<td><?php echo $row['Fecha3']; ?></td>
						<td><?php echo $row['NotaFinal']; ?></td>
						<td>
							<a href="add_nota.php?cod=<?php echo $row['Asignatura_Codigo']; ?>&id=<?php echo $row['Alumno_Id']; ?>">Calificar</a>
						</td>
					</tr>
				</tbody>
			<?php
			endforeach;
			?>
		</table>
	<?php
	}
	?>
</body>

</html>