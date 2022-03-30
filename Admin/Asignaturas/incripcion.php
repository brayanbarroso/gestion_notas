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

	$consult = "SELECT * FROM Asignatura WHERE Codigo = ?";
	$sql1 = $pdo->prepare($consult);
	$sql1->execute(array($cod));
	$fila = $sql1->fetch();

	$alumno = "SELECT * FROM Alumno";
	$sql = $pdo->prepare($alumno);
	$sql->execute();
	$rows = $sql->fetchAll();
	?>

	<form action="insert-inscripcion.php" method="post" enctype="multi" class="form-data">
		<fieldset>
			<legend>Matricular Alumno - Asignatura</legend>
			<div class="campo">
				<label for="nit">Codigo:</label>
				<input type="text" class="form-control" id="nit" name="nit" value="<?php echo $fila['Id']; ?>">
			</div>
			<div class="campo">
				<label for="nombre">Nombres:</label>
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['Asignatura']; ?>">
			</div>
			<div class="form-group">
				<div class="campo">
			<label for="id">Alumno:</label>
			<select name="alumno" class="form-control" id="">
				<option value="">Selecionar Alumno</option>
				<?php
				foreach ($rows as $row) :
				?>
					<option value="<?php echo $row['Id']; ?>">
						<?php echo $row['Nombres'];
						echo " ";
						echo $row['Snom'];
						echo " ";
						echo $row['pApellido'];
						echo " ";
						echo $row['sApellido'];   ?>
					</option>
				<?php
				endforeach
				?>
			</select>

		</div>
			</div>

			<div class="boton">
				<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Matricular</button>
			</div>
		</fieldset>
	</form>
	<?php include("../footer.php"); ?>

	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/modal.js"></script>
	<script type="text/javascript" src="../../estilos/js/alert.js"></script>
</body>

</html>