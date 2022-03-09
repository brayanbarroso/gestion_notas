<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Docente</title>
	<link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/css/estilo.css">
</head>
<body>
    <?php 
	    include('menu.php');

	    include('../Conexion/Conexion.php');

	    $cod = $_REQUEST['cod'];

        $sql = "SELECT asignatura.`Codigo`,nota.`Alumno_Id`,alumno.`Nombres`,CONCAT(alumno.`pApellido`,' ',alumno.`sApellido`)AS Apellidos
                FROM nota,alumno,asignatura
                WHERE nota.`Alumno_Id` = alumno.`Id` AND nota.`Asignatura_Codigo` = asignatura.`Codigo` AND asignatura.`Codigo` = '$cod'";

        $query = mysql_query($sql) or die(mysql_error());

	?>

	<table>
	 	<thead>
	 	    <tr>
	 	    	<th colspan="4">Alumnos</th>
	 	    </tr>
	 		<tr>
	 			<th>Identificación</th>
	 			<th>Nombres</th>
	 			<th>Apellidos</th>
	 			<th>Calificar</th>
	 		</tr>
	 	</thead>

	 	<?php while ( $row = (mysql_fetch_array($query))) { ?>

	 	<tbody>
	 		<tr>
	 			<td><?php echo $row['Alumno_Id']; ?></td>
	 			<td><?php echo $row['Nombres']; ?></td>
	 			<td><?php echo $row['Apellidos']; ?></td>
	 			<td>
	 				<a href="mostrar_notas.php?cod=<?php echo $row['Codigo'];?>&id=<?php echo $row['Alumno_Id']; ?>" class="btn btn-success" title="Calificar"><span class="glyphicon glyphicon-saved"></span></a>
	 			</td>
	 		</tr>
	 	</tbody>

        <?php } ?>
	</table>

    <script type="text/javascript" src="../estilos/js/jquery.min.js"></script>
    <script type="text/javascript" src="../estilos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../estilos/js/modal.js"></script>	
</body>
</html>