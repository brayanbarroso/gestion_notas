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

	<form action="edit-programa.php?cod=<?php echo $fila['id']; ?>" method="post" class="form-data">
		<fieldset>
			<legend>Editar Curso</legend>
			<div class="campo">
				<label for="nit">Codigo:</label>
				<input type="text" class="form-control" id="nit" name="nit" value="<?php echo $fila['Codigo']; ?>">
			</div>
			<div class="campo">
				<label for="nombre">Nombres:</label>
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['Curso']; ?>">
			</div>
			<div class="campo">
				<label for="nombre">Duracion:</label>
				<input type="text" class="form-control" id="n" name="duracion" value="<?php echo $fila['Duracion']; ?>">
			</div>

			<div class="boton">
				<button class="btn btn-warning mt-2 mb-2"><i class="glyphicon glyphicon-refresh"></i> Actualizar</button>
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