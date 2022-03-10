<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../estilos/css/bootstrap.css">
	<link rel="stylesheet" href="../../estilos/css/estilo.css">
</head>

<body>
	<?php
	include("../../Login/seguridad.php");
	include("../header.php");
	include("../../Conexion/Conexion.php");


	$cc = $_REQUEST['cc'];

	$consult = "SELECT * FROM Alumno WHERE Id = '$cc'";
	$sql1 = $pdo->prepare($consult);
	$sql1->execute(array($cc));

	$fila = $sql1->fetch();
	?>

	<form action="edit-alumno.php?cc=<?php echo $fila['Id']; ?>" method="post" class="form-update">
		<fieldset>
			<legend>Actualizar Datos Basicos del Alumno</legend>
		</fieldset>
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
					<input type="text" class="form-control" id="nid" name="nid" value="<?php echo $fila['Doc']; ?>" readonly />
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="campo">
					<label for="nombre">Primer Nombres:</label>
					<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['Nombres']; ?>">
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="campo">
					<label for="nombre">Segundo Nombres:</label>
					<input type="text" class="form-control" id="nombre" name="snombre" value="<?php echo $fila['Snom']; ?>">
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="campo">
					<label for="pape">Primer Apellido:</label>
					<input type="text" class="form-control" id="pape" name="pape" value="<?php echo $fila['pApellido']; ?>">
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="campo">
					<label for="sape">Segundo Apellido:</label>
					<input type="text" class="form-control" id="sape" name="sape" value="<?php echo $fila['sApellido']; ?>">
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="campo">
					<label for="tel">Teléfono</label>
					<input type="text" class="form-control" id="tel" name="tel" value="<?php echo $fila['Telefono']; ?>">
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="campo">
					<label for="dir">Dirección:</label>
					<input type="text" class="form-control" id="dir" name="dir" value="<?php echo $fila['Direccion']; ?>">
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="campo">
					<label for="email">Correo Electronico:</label>
					<input type="text" class="form-control" id="email" name="email" value="<?php echo $fila['Correo']; ?>">
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="campo">
					<label for="asign">Usuario:</label>
					<input type="text" class="form-control" id="user" name="user" value="<?php echo $fila['Usuario']; ?>">
				</div>
			</div>

		</div>

		<div class="btn-update">
			<button class="btn btn-warning btn-lg btn-block mb-2 mt-2"><span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
		</div>

	</form>
	<?php include("../footer.php"); ?>

	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/modal.js"></script>
</body>

</html>