<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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

	$consult = "SELECT * FROM Asignatura WHERE Codigo = '$cod'";
	$sql1 = $pdo->prepare($consult);
	$sql1->execute(array($cod));
	$fila = $sql1->fetch();

	$pdo = null;
	?>

	<form action="edit-asignatura.php?cod=<?php echo $fila['Id']; ?>" method="post" class="form-data">
		<fieldset>
			<legend>Modificar Asignatura</legend>
			<div class="campo">
				<label for="nit">Codigo:</label>
				<input type="text" class="form-control" id="nit" name="nit" value="<?php echo $fila['Codigo']; ?>">
			</div>
			<div class="campo">
				<label for="nombre">Nombres:</label>
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['Asignatura']; ?>">
			</div>
			<div class="campo">
				<label for="nombre">Creditos:</label>
				<input type="text" class="form-control" id="ct" name="credito" value="<?php echo $fila['Credito']; ?>">
			</div>

			<div class="boton">
				<button class="btn btn-success">Guardar</button>
			</div>
		</fieldset>
	</form>
	<?php include("../footer.php"); ?>
</body>

</html>