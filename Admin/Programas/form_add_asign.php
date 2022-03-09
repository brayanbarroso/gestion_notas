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

	$consult = "SELECT * FROM Curso WHERE Codigo = ?";
	$sql1 = $pdo->prepare($consult);
	$sql1->execute(array($cod));
	$fila = $sql1->fetch();

	$select = "SELECT * FROM Asignatura";
	$sql = $pdo->prepare($select);
	$sql->execute();
	$rows = $sql->fetchAll();
	?>

	<form action="add_asign.php" method="post" class="form-incr" enctype="multipart/form-data">
		<fieldset>
			<legend>Agregar Asignatura al Pensum</legend>
			<div class="campo">
				<input type="hidden" id="codigo" name="codigo" value="<?php echo $fila['id']; ?>" readonly />
			</div>
			<div class="campo">
				<label for="pnombre">Programa:</label>
				<input type="text" id="pnombre" name="pnombre" value="<?php echo $fila['Curso']; ?>" readonly />
			</div>
			<div class="campo">
				<label for="asign">Asignatura:</label>
				<select name="asign" id="">
					<option value="">Selecionar</option>
					<?php
					foreach ($rows as $row) :
					?>
						<option value="<?php echo $row['Id']; ?>"><?php echo $row['Asignatura']; ?></option>
					<?php
					endforeach;
					?>
				</select>
				<!-- <input type="text" id="asign" name="asign" placeholder="Codigo"> -->
			</div>
			<div class="campo">
				<label for="semestre">Semestre:</label>
				<select name="semestre" id="semestre">
					<option value="">Selecionar...</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>

			<div class="boton">
				<button class="btn btn-info"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar</button>
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