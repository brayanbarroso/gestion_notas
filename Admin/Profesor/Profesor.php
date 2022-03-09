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
	<?php
	include("../../Login/seguridad.php");
	include("../header.php");
	?>
	<!-- Formulario Para Agregar Alumnos -->

	<div class="contenido">
		<form action="Buscar.php" method="post" class="buscar">
			<label for="busca">Buscar:</label>
			<input type="text" id="busca" name="busca" placeholder="Identificación o Apellido">
			<button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Consultar</button>
		</form>

		<!-- Button trigger modal -->
		<!-- Formulario de Busqueda -->
		<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-plus"></span> Nuevo Docentes
		</button>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Ingreso De Docentes</h4>
				</div>
				<div class="modal-body">
					<form action="insert-profesor.php" method="post" class="form-inline">
						<fieldset>
							<legend>Datos Basicos del Docente</legend>
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<div class="campo">
										<label for="tipo">Tipo Documento</label>
										<select name="tipo" id="tdoc" class="form-control">
											<option value="">Seleccionar...</option>
											<option value="RC">Registro Civil</option>
											<option value="TI">Tarjeta Identidad</option>
											<option value="CC">Cedula</option>
											<option value="CE">Cedula Extranjeria</option>
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
										<input type="text" class="form-control" id="nombre" name="pnombre" placeholder="Primer Nombres">
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="campo">
										<label for="nombre">Segundo Nombres:</label>
										<input type="text" class="form-control" id="snombre" name="snombre" placeholder=" Segundo Nombres">
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="campo">
										<label for="pape">Primer Apellido:</label>
										<input type="text" class="form-control" id="pape" name="pape" placeholder="Apellidos">
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="campo">
										<label for="sape">Segundo Apellido:</label>
										<input type="text" class="form-control" id="sape" name="sape" placeholder="Apellidos">
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="campo">
										<label for="tel">Teléfono</label>
										<input type="text" class="form-control" id="tel" name="tel" placeholder="777777777">
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="campo">
										<label for="dir">Dirección:</label>
										<input type="text" class="form-control" id="dir" name="dir" placeholder="Direccion">
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="campo">
										<label for="email">Correo Electronico:</label>
										<input type="text" class="form-control" id="email" name="email" placeholder="example@example.com">
									</div>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="campo">
										<label for="asign">Usuario:</label>
										<input type="text" class="form-control" id="user" name="user" placeholder="usuario">
									</div>
								</div>

							</div>
						</fieldset>

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

	$sql = "SELECT * FROM Profesor ORDER BY profesor.`pApellido` ";
	$result = $pdo->prepare($sql);
	$result->execute();
	$filas = $result->fetchAll();
	?>

	<div class="contenido">
		<table class="table table-hover">
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