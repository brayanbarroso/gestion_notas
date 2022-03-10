<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="../../estilos/css/jquery-ui.css">
	<link rel="stylesheet" href="../../estilos/css/bootstrap.css">
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

	$consult1 = "SELECT * FROM Alumno";
	$sql = $pdo->prepare($consult1);
	$sql->execute();
	$rows = $sql->fetchAll();
	?>

	<form action="add_alum.php" role="form" class="form-data" method="POST">
<legend>Matricular Alumno</legend>
		<div class="campo">
			<input type="hidden" class="form-control" id="codig" name="codigo" value="<?php echo $fila['id']; ?>" readonly />
		</div>
		<div class="form-group">
			<label for="">Programa:</label>
			<input type="text" class="form-control" id="" name="" value="<?php echo $fila['Curso']; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="id">Alumno:</label>
			<select name="alumno" id="" class="form-control">
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
		<div class="form-group">
			<label for="fecha">Fecha Matricula:</label>
			<input type="date" class="form-control" id="nombre" name="fecha" placeholder="aaaa-mm-dd">
		</div>

		<div class="boton">
			<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar</button>
		</div>
	</form>

	<?php include("../footer.php"); ?>

	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/jquery-ui.js"></script>
	<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/modal.js"></script>
	<script type="text/javascript" src="../../estilos/js/alert.js"></script>
	<script type="text/javascript">
		$(function() {
			$("#id").autocomplete({
				source: "autocomplete.php",
				minLength: 2,
				select: function(event, ui) {
					event.preventDefault();
					$('#id').val(ui.item.codigo);
					$('#nombre').val(ui.item.id_producto);


				}
			});
		});
	</script>
</body>

</html>