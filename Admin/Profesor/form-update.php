<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../estilos/css/estilo.css">
</head>

<body>
	<?php
	include("../../Login/seguridad.php");
	include("../header.php");
	include("../../Conexion/Conexion.php");

	$cc = $_REQUEST['cc'];

	$consult = "SELECT * FROM Profesor WHERE Id = ?";
	$result = $pdo->prepare($consult);
	$result->execute(array($cc));
	$fila = $result->fetch();
	?>

	<form action="edit-profesor.php?cc=<?php echo $fila['Id']; ?>" method="post" class="form-update">
		<fieldset>
			<legend>Actualizar Datos Basicos del Docente</legend>

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
						<input type="text" class="form-control" id="nid" name="nid" value="<?php echo $fila['Doc']; ?>" disabled>
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="campo">
						<label for="nombre">Nombres:</label>
						<input type="text" class="form-control" id="nombre" name="pnombre" placeholder="Nombres" value="<?php echo $fila['Nombres']; ?>">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="campo">
						<label for="Snombre">Segundo Nombres:</label>
						<input type="text" class="form-control" id="Snombre" name="Snombre" placeholder="Segundo Nombres" value="<?php echo $fila['Snom']; ?>">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="campo">
						<label for="pape">Primer Apellido:</label>
						<input type="text" class="form-control" id="pape" name="pape" placeholder="Apellidos" value="<?php echo $fila['pApellido']; ?>">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="campo">
						<label for="sape">Segundo Apellido:</label>
						<input type="text" class="form-control" id="sape" name="sape" placeholder="Apellidos" value="<?php echo $fila['sApellido']; ?>">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="campo">
						<label for="tel">Teléfono</label>
						<input type="text" class="form-control" id="tel" name="tel" placeholder="777777777" value="<?php echo $fila['Telefono']; ?>">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="campo">
						<label for="dir">Dirección:</label>
						<input type="text" class="form-control" id="dir" name="dir" placeholder="Direccion" value="<?php echo $fila['Direccion']; ?>">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="campo">
						<label for="email">Correo Electronico:</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="<?php echo $fila['Correo']; ?>">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="campo">
						<label for="asign">Usuario:</label>
						<input type="text" class="form-control" id="user" name="user" placeholder="usuario" value="<?php echo $fila['Usuario']; ?>">
					</div>
				</div>
			</div>

			<button class="btn btn-warning mb-2 mt-2">
				<span class="glyphicon glyphicon-refresh"></span> Actualizar
			</button>
			</div>
		</fieldset>
	</form>

	<?php include("../footer.php"); ?>

	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/modal.js"></script>
</body>

</html>