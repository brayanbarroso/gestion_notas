<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Alumno</title>
	<link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/css/estilo.css">
</head>
<body>
	<?php 
	    include('menu.php');

	    include('../Conexion/Conexion.php');

	    $cod = $_REQUEST['cod'];

        $sql = "SELECT asignatura.`Codigo`,asignatura.`Nombre_Asig`,nota.`Nota_1`,nota.`Nota_2`,nota.`Nota_3`,nota.`Definitiva`
                FROM alumno,asignatura,nota
                WHERE alumno.`Id` = nota.`Alumno_Id` AND asignatura.`Codigo` = nota.`Asignatura_Codigo` AND alumno.`Id` = '$cod'";

        $query = mysql_query($sql) or die(mysql_error());
        
        $sql1 = "SELECT curso.`Codigo`,curso.`Nombre` FROM matricula,curso,alumno 
                WHERE alumno.`Id` = matricula.`Alumno_Id` AND curso.`Codigo` = matricula.`Curso_Codigo` AND alumno.`Id` = '$cod'";

        $query1 = mysql_query($sql1);
        $fila = mysql_fetch_array($query1);

        $sql2 = "SELECT * FROM Alumno WHERE alumno.`Id` = '$cod'";
        $query2 = mysql_query($sql2);
        $row1 = mysql_fetch_array($query2);
	?>

    <div class="botonera">
        <a href="pensum.php?cod=<?php echo ($fila['Codigo']); ?>" class="btn btn-primary" disabled="true">Matricular</a>
        <a href="pensum.php?cod=<?php echo ($fila['Codigo']); ?>" class="btn btn-primary">Pensum</a>
        <a href="" class="btn btn-primary">Historial</a>
        <a href="reporte.php?cod=<?php echo $row1['Id']; ?>" class="btn btn-primary">Reporte</a>	
    </div>

    <div class="contenido">
        <h2>Programa: <strong><?php echo $fila['Nombre']; ?></strong></h2>
     	<table>
		 	<thead>
		 		<tr>
		 			<th colspan="2">ASIGNATURA</th>
		 			<th>Nota 1</th>
		 			<th>Nota 2</th>
		 			<th>Nota 3</th>
		 			<th>Definitiva</th>
		 		</tr>
		 	</thead>

		 	<?php while ( $row = (mysql_fetch_array($query))) { ?>

		 	<tbody>
		 		<tr>
		 			<td><?php echo $row['Codigo']; ?></td>
		 			<td><?php echo $row['Nombre_Asig']; ?></td>
		 			<td><?php echo $row['Nota_1']; ?></td>
		 			<td><?php echo $row['Nota_2']; ?></td>
		 			<td><?php echo $row['Nota_3']; ?></td>
		 			<td><?php echo $row['Definitiva']; ?></td>
		 		</tr>
		 	</tbody>

	        <?php } ?>
		</table>
    </div>
     
	<?php include("../Admin/footer.php"); ?>

	<script type="text/javascript" src="../estilos/js/jquery.min.js"></script>
    <script type="text/javascript" src="../estilos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../estilos/js/modal.js"></script>
</body>
</html>