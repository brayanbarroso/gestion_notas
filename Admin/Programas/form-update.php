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

	$cod = $_REQUEST['cod'];

	$consult = "SELECT * FROM Curso WHERE Codigo = '$cod'";
	$sql1 = $pdo->prepare($consult);
	$sql1->execute(array($cod));
	$fila = $sql1->fetch();
	?>

	<form action="edit-programa.php?cod=<?php echo $fila['Codigo']; ?>" method="post" class="form-incr">
		<fieldset>
			<legend>Datos Basicos del Docente</legend>
			<div class="campo">
				<label for="nit">Codigo:</label>
				<input type="text" id="nit" name="nit" value="<?php echo $fila['Codigo']; ?>">
			</div>
			<div class="campo">
				<label for="nombre">Nombres:</label>
				<input type="text" id="nombre" name="nombre" value="<?php echo $fila['Nombre']; ?>">
			</div>

			<div class="boton">
				<button class="btn btn-warning"><i class="glyphicon glyphicon-refresh"></i> Actualizar</button>
			</div>
		</fieldset>
	</form>

	<?php include("../footer.php"); ?>

	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/modal.js"></script>
	<script type="text/javascript" src="../../estilos/js/dropdown.js"></script>
	<script type="text/javascript" src="../../estilos/js/tab.js"></script>
</body>

</html>