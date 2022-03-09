<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Alumno</title>
	<link rel="stylesheet" href="../../estilos/css/jquery-ui.css">
	<link rel="stylesheet" href="../../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../estilos/css/estilo.css">
</head>

<body>

	<?php
	include("../../Login/seguridad.php");
	include("../header.php");
	?>

	<!-- Formulario de Busqueda -->
	<div class="contenido">
		<form action="Buscar.php" method="post" class="buscar">
			<label for="busca">Buscar:</label>
			<input type="text" id="busca" name="busca" placeholder="Identificación o Apellido">
			<button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Consultar</button>
		</form>

		<!-- Formulario Para Agregar Alumnos -->
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-plus"></span> Nuevo Alumno
		</button>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Ingreso De Alumnos</h4>
				</div>
				<div class="modal-body">
					<form action="insert-alumno.php" class="form-inline" method="post">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="tipo">Tipo Documento:</label>
									<select name="tipo" id="tipo" class="form-control">
										<option value="">Seleccionar...</option>
										<option value="RC">Registro Civil</option>
										<option value="TI">Tarjeta Identidad</option>
										<option value="CC">Cedula</option>
										<option value="CE">Cedula de Extranjeria</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="nid">Identificación:</label>
									<input type="text" class="form-control" id="nid" name="nid">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="nombre">Primer Nombres:</label>
									<input type="text" class="form-control" id="nombre" name="nombre">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="nombre">Segundo Nombre:</label>
									<input type="text" class="form-control" id="snombre" name="snombre">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="pape">Primer Apellido:</label>
									<input type="text" class="form-control" id="pape" name="pape">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="sape">Segundo Apellido:</label>
									<input type="text" class="form-control" id="sape" name="sape">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="tel">Teléfono</label>
									<input type="text" class="form-control" id="tel" name="tel">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="dir">Dirección:</label>
									<input type="text" class="form-control" id="dir" name="dir">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="email">Correo Electronico:</label>
									<input type="email" class="form-control" id="email" name="email">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="campo">
									<label for="asign">Usuario:</label>
									<input type="text" class="form-control" id="user" name="user" placeholder="usuario">
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Tabla de Datos-->
	<?php
	include("../../Conexion/Conexion.php");

	$sql = "SELECT * FROM Alumno ORDER BY Alumno.`pApellido` ASC";
	$result = $pdo->prepare($sql);
	$result->execute();
	$rows = $result->fetchAll();

	?>
	<div class="contenido">
		<table class="table table-striped">
			<thead>
				<tr>
					<th colspan="13">
						<h4>Alumnos Registrados</h4>
					</th>
				</tr>
				<tr>
					<th>Tipo Documento</th>
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
			foreach ($rows as $row) :
			?>
				<tbody>
					<tr>
						<td><?php echo $row['Tipo']; ?></td>
						<td><?php echo $row['Doc']; ?></td>
						<td><?php echo $row['Nombres'];
								echo " ";
								echo $row['Snom']; ?></td>
						<td><?php echo $row['pApellido'];
								echo " ";
								echo $row['sApellido']; ?></td>
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
	<script type="text/javascript" src="../../estilos/js/jquery-ui.js"></script>
</body>

</html>