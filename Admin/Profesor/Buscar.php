<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Docentes</title>
	<link rel="stylesheet" href="../../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../estilos/css/estilo.css">
</head>

<body>
	<!-- Tabla de Datos-->
	<?php

	include("../../Login/seguridad.php");
	include("../header.php");

	include("../../Conexion/Conexion.php");

	$search = $_POST['busca'];

	$sql = "SELECT * FROM Profesor WHERE Doc = '$search' OR pApellido = '$search'";
	$result = $pdo->prepare($sql);
	$result->execute(array($search));
	$filas = $result->fetchAll();

	?>

	<div class="contenido">
		<table class="table">
			<thead>
				<tr>
					<th colspan="10">
						<h4>Docentes</h4>
					</th>
				</tr>
				<tr>
					<th>Tipo</th>
					<th>Identificación</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Dirección</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Usuario</th>
					<th>Actualizar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<?php
			foreach ($filas as $row) :
			?>
				<tbody>
					<tr>
						<td><?php echo $row['Tipo'];  ?></td>
						<td><?php echo $row['Doc']; ?></td>
						<td><?php echo $row['Nombres'];
								echo " ";
								echo $row['Snom']; ?>
						</td>
						<td>
							<?php echo $row['pApellido'];
							echo " ";
							echo $row['sApellido']; ?>
						</td>
						<td><?php echo $row['Direccion']; ?></td>
						<td><?php echo $row['Telefono']; ?></td>
						<td><?php echo $row['Correo']; ?></td>
						<td><?php echo $row['Usuario']; ?></td>
						<td>
							<a href="form-update.php?cc=<?php echo $row['Id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						</td>
						<td>
							<a href="delete.php?ced=<?php echo $row['Id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						</td>
					</tr>
				</tbody>
			<?php
			endforeach;
			?>
		</table>
	</div>

	<?php include("../footer.php"); ?>

	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/modal.js"></script>
</body>

</html>