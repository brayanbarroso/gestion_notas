<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../estilos/css/estilo.css" />
	<link rel="stylesheet" href="css/css_admin.css" />
</head>

<body>
	<?php
	include("../../Login/seguridad.php");

	?>
	<header class="cabecera">
		<img class="logo" src="../../estilos/img/Captura.PNG" alt="Logo Principal" width="100" height="100" />
		<hgroup>
			<h1>Sistemas de Gestion de Notas</h1>
		</hgroup>
	</header>
	<!--Menu -->
	<nav class="navbar navbar-inverse" role="navigation"></nav>
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Desplegar navegación</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Logotipo</a>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li><a href="../index.php?cc=<?php echo $_SESSION['user']; ?>">Inicio</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <strong><?php echo $_SESSION['user_nombre']; ?></strong><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="form-update.php?cc=<?php echo $_SESSION['user_id']; ?>">
							<i class="glyphicon glyphicon-refresh"></i> Actualizar Datos
						</a>
					</li>
					<li>
						<a href="form-pass.php">
							<i class=" glyphicon glyphicon-cog"></i> Cambiar Contraseña
						</a>
					</li>
					<li role="separator" class="divider"></li>
					<li>
						<a href="../../Login/salir.php">
							<i class="glyphicon glyphicon-off"></i> Cerrar Sesion
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	</nav>
	<?php
	include("../../Conexion/Conexion.php");

	$cc = $_REQUEST['cc'];

	$consult = "SELECT * FROM administrador WHERE Id = '$cc'";
	$sql1 = $pdo->prepare($consult);
	$sql1->execute(array($cc));
	$fila = $sql1->fetch();


	?>

	<form action="edit-admin.php?cc=<?php echo $fila['Id']; ?>" method="post" class="editar_admin">
		<fieldset>
			<legend>Actualizar Datos Basicos del Administrador</legend>
			<div class="campo">
				<label for="nid">Numero de Identificación:</label>
				<input type="text" id="nid" name="nid" value="<?php echo $fila['Id']; ?>" disabled>
			</div>
			<div class="campo">
				<label for="nombre">Nombres:</label>
				<input type="text" id="nombre" name="nombre" value="<?php echo $fila['Nombres']; ?>">
			</div>
			<div class="campo">
				<label for="pape">Primer Apellido:</label>
				<input type="text" id="pape" name="pape" value="<?php echo $fila['pApellido']; ?>">
			</div>
			<div class="campo">
				<label for="sape">Segundo Apellido:</label>
				<input type="text" id="sape" name="sape" value="<?php echo $fila['sApellido']; ?>">
			</div>
			<div class="campo">
				<label for="dir">Dirección:</label>
				<input type="text" id="dir" name="dir" value="<?php echo $fila['Direccion']; ?>">
			</div>
			<div class="campo">
				<label for="tel">Teléfono</label>
				<input type="text" id="tel" name="tel" value="<?php echo $fila['Telefono']; ?>">
			</div>
			<div class="campo">
				<label for="email">Correo Electronico:</label>
				<input type="text" id="email" name="email" value="<?php echo $fila['Correo']; ?>">
			</div>
			<div class="boton">
				<button class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span> Actualizar</button>
			</div>
		</fieldset>
	</form>

	<?php include("../footer.php"); ?>

	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/modal.js"></script>
</body>

</html>