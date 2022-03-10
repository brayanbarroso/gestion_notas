<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../estilos/css/estilo.css">
	<link rel="stylesheet" href="../Administrador/css/css_admin.css">
</head>

<body>
	<?php
	include("../../Login/seguridad.php");
	include("../header.php");
	include("../../Conexion/Conexion.php");


	$id = $_REQUEST['Id'];
	$cod = $_REQUEST['cod'];

	$sql1 = "SELECT Asignatura.`Id` ,Asignatura.`Codigo`, Asignatura.`Asignatura`, alumno.`Doc`, CONCAT(alumno.`Nombres`,' ',alumno.`pApellido`)AS Nombre,
           nota.`Asignatura_Id`,nota.`Alumno_Id`,nota.`Nota_1`,nota.`Nota_2`,nota.`Nota_3`
          FROM Asignatura, alumno, nota
          WHERE Asignatura.`Id` = nota.`Asignatura_Id` AND alumno.`Id` = nota.`Alumno_Id` AND asignatura.`Id` = ? AND alumno.`Id` = ?";

	$result1 = $pdo->prepare($sql1);
	 $result1->execute(array($cod, $id));
	$fila = $result1->fetch();
	?>

	<form action="../Notas/update_nota.php?cod=<?php echo $fila['Asignatura_Id']; ?>&id=<?php echo $fila['Alumno_Id']; ?>" method="post" class="form-update">

		<div class="row">
			
			<fieldset>
					<legend>Formulario de Calificaciones</legend>
					<div class="col-xs-12 col-md-6">
						<div class="campo">
							<label for="cod">Codigo:</label>
							<input type="text" class="form-control" name="cod" value="<?php echo $fila['Codigo']; ?>">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="campo">
							<label for="asignatura">Asignatura:</label>
							<input type="text" class="form-control" id="asignatura" name="asignatura" value="<?php echo $fila['Asignatura']; ?>">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						
						<div class="campo">
							<label for="cc">Identificación:</label>
							<input type="text" class="form-control" id="cc" name="cc" value="<?php echo $fila['Doc']; ?>">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						
						<div class="campo">
							<label for="alumno">Alumno:</label>
							<input type="text" class="form-control" id="alumno" name="alumno" value="<?php echo $fila['Nombre']; ?>">
						</div>
					</div>
					<div class="col-xs-12 col-md-12">
						
						<div class="campo">
							<label for="nota1">Nota 1:</label>
							<input type="text" class="form-control" id="nota1" name="nota1" placeholder="Example: 4.5" value="<?php echo $fila['Nota_1']; ?>">
						</div>
					</div>
					<div class="col-xs-12 col-md-12">
<div class="campo">
						<label for="nota2">Nota 2:</label>
						<input type="text" class="form-control" id="nota2" name="nota2" placeholder="Example: 4.5" value="<?php echo $fila['Nota_2']; ?>">
					</div>
					</div>
					<div class="col-xs-12 col-md-12">

						<div class="campo">
							<label for="nota3">Nota 3:</label>
							<input type="text" class="form-control" id="nota3" name="nota3" placeholder="Example: 4.5" value="<?php echo $fila['Nota_3']; ?>">
						</div>
					</div>
				</fieldset>
		</div>
		
		<div class="boton">
			<button class="btn btn-success mt-2 mb-2"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar</button>
		</div>
	</form>

	<footer>
		<div class="pie">
			<p>Ing Brayan Barroso</p>
			<hr>
			<span class="autor">&copy;Derechos Reservados</span>
			<span class="dir">Barrio Miramar</span>
			<span class="tel">3117330066</span>
		</div>
	</footer>



	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../estilos/js/modal.js"></script>
</body>

</html>