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

        $sql = "SELECT asignatura.`Codigo`,asignatura.`Nombre_Asig`
                FROM asignatura,pensum,curso
                WHERE asignatura.`Codigo` = pensum.`Asignatura_Codigo` AND curso.`Codigo` = pensum.`Curso_Codigo` AND pensum.`Semestre` = 1 AND curso.`Codigo`= '$cod'";
        $query = mysql_query($sql); 

        $sql2 = "SELECT asignatura.`Codigo`,asignatura.`Nombre_Asig`
                FROM asignatura,pensum,curso
                WHERE asignatura.`Codigo` = pensum.`Asignatura_Codigo` AND curso.`Codigo` = pensum.`Curso_Codigo` AND pensum.`Semestre` = 2 AND curso.`Codigo`= '$cod'";
        $query2 = mysql_query($sql2);

        $sql1 = "SELECT * FROM curso WHERE curso.`Codigo`= '$cod'";
        $query1 = mysql_query($sql1);
        $fila = mysql_fetch_array($query1); 
    ?>
	<div class="botonera">
        <a href="" class="btn btn-primary">Matricular</a>
        <a href="pensum.php?cod=<?php echo ($fila['Codigo']); ?>" class="btn btn-primary" class="not-active">Pensum</a>
        <a href="" class="btn btn-primary">Historial</a>
        <a href="" class="btn btn-primary">Reporte</a>	
    </div>

    <div class="contenido">
        <h2>Pensum <strong><?php echo $fila['Nombre']; ?></strong></h2>
        <div class="row">
        	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        	    <h3>Primer Semestre</h3>
        		<table>
		        	<thead>
			    		<tr>
			    			<th>Codigo</th>
			    			<th>Asignatura</th>
			    		</tr>
			    	</thead>
			    	<?php while ( $row = (mysql_fetch_array($query))) { ?>
			    	<tbody>
			    		<tr>
			    			<td><?php echo $row['Codigo']; ?></td>
			    			<td><?php echo $row['Nombre_Asig']; ?></td>
			    		</tr>
			    	</tbody>
			    	<?php } ?>
		        </table>
        	</div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        	    <h3>Segundo Semestre</h3>
        		<table>
		        	<thead>
			    		<tr>
			    			<th>Codigo</th>
			    			<th>Asignatura</th>
			    		</tr>
			    	</thead>
			    	<?php while ( $row2 = (mysql_fetch_array($query2))) { ?>
			    	<tbody>
			    		<tr>
			    			<td><?php echo $row2['Codigo']; ?></td>
			    			<td><?php echo $row2['Nombre_Asig']; ?></td>
			    		</tr>
			    	</tbody>
			    	<?php } ?>
		        </table>
        	</div>
        </div>

        <div class="row">
        	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        	    <h3>Primer Semestre</h3>
        		<table>
		        	<thead>
			    		<tr>
			    			<th>Codigo</th>
			    			<th>Asignatura</th>
			    		</tr>
			    	</thead>
			    	<?php while ( $row = (mysql_fetch_array($query))) { ?>
			    	<tbody>
			    		<tr>
			    			<td><?php echo $row['Codigo']; ?></td>
			    			<td><?php echo $row['Nombre_Asig']; ?></td>
			    		</tr>
			    	</tbody>
			    	<?php } ?>
		        </table>
        	</div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        	    <h3>Segundo Semestre</h3>
        		<table>
		        	<thead>
			    		<tr>
			    			<th>Codigo</th>
			    			<th>Asignatura</th>
			    		</tr>
			    	</thead>
			    	<?php while ( $row2 = (mysql_fetch_array($query2))) { ?>
			    	<tbody>
			    		<tr>
			    			<td><?php echo $row2['Codigo']; ?></td>
			    			<td><?php echo $row2['Nombre_Asig']; ?></td>
			    		</tr>
			    	</tbody>
			    	<?php } ?>
		        </table>
        	</div>
        </div>
    </div>

    <?php include("../Admin/footer.php"); ?>

	<script type="text/javascript" src="../estilos/js/jquery.min.js"></script>
    <script type="text/javascript" src="../estilos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../estilos/js/modal.js"></script>
</body>
</html>