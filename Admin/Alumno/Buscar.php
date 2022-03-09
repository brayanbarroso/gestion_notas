<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<!-- Tabla de Datos-->
	<?php
	include("../../Conexion/Conexion.php");

	$search = $_POST['busca'];

	$sql = "SELECT * FROM Alumno WHERE Id = '$search' OR pApellido = '$search'";
	$result = $pdo->prepare($sql);
	$result->execute();
	$rows = $result->fetchAll();

	?>

	<table class="table">
		<thead>
			<tr>
				<th>Identificación</th>
				<th>Nombres</th>
				<th>Primer Apellido</th>
				<th>Segundo Apellido</th>
				<th>Dirección</th>
				<th>Telefono</th>
				<th>Correo</th>
				<th>Actualizar</th>
			</tr>
		</thead>
		<?php
		foreach ($rows as $row) :
		?>
			<tbody>
				<tr>
					<td><?php echo $row['Id']; ?></td>
					<td><?php echo $row['Nombres']; ?></td>
					<td><?php echo $row['pApellido']; ?></td>
					<td><?php echo $row['sApellido']; ?></td>
					<td><?php echo $row['Direccion']; ?></td>
					<td><?php echo $row['Telefono']; ?></td>
					<td><?php echo $row['Correo']; ?></td>
					<td>
						<a href="form-update.php?cc=<?php echo $row['Id']; ?>" class="btn btn-warning">Editar</a>
					</td>
					<td>
						<a href="delete.php?ced=<?php echo $row['Id']; ?>" class="btn btn-primary">Eliminar</a>
					</td>
				</tr>
			</tbody>
		<?php
		endforeach;
		?>
	</table>
</body>

</html>