<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Docente</title>
	<link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/css/estilo.css">
    <link rel="stylesheet" href="css/profesor.css">
</head>
<body>
	<?php 
	    include('menu.php');
	    include('../Conexion/Conexion.php');

	    $cod = base64_decode($_REQUEST['cod']);

        $sql = "SELECT asignatura.`Codigo`,asignatura.`Nombre_Asig`,alumno.`Id`,alumno.`Nombres`,CONCAT(alumno.`pApellido`,' ',alumno.`sApellido`)AS Apellidos,nota.`Nota_1`,nota.`Nota_2`,nota.`Nota_3`,nota.`Definitiva`
                FROM asignatura,alumno,nota,clase,profesor
                WHERE asignatura.`Codigo` = nota.`Asignatura_Codigo` AND asignatura.`Codigo` = clase.`Asignatura_Codigo` AND alumno.`Id` = nota.`Alumno_Id` AND profesor.`Id` = clase.`Profesor_Id` AND profesor.`Id` = '$cod'";

        $query = mysql_query($sql) or die(mysql_error());

        $result1 = mysql_query($sql) or die(mysql_error());
        $fila = mysql_fetch_array($result1);
        
	?>
    <div class="contenido">
        <h2>Asignatura: <strong><?php echo $fila['Nombre_Asig']; ?></strong><strong style="display: none"><?php echo $fila['Codigo']; ?></strong></h2>

        <h2 id="titulo">Cursos Asociados</h2>

        <?php 
            $cod = $fila['Codigo'];

            $consult="SELECT curso.`Codigo`,curso.`Nombre` FROM curso,pensum,asignatura
            WHERE curso.`Codigo` = pensum.`Curso_Codigo` AND asignatura.`Codigo` = pensum.`Asignatura_Codigo` AND asignatura.`Codigo` = '$cod'";

            $msql = mysql_query($consult) or die(mysql_error());

            while ($colum = mysql_fetch_array($msql)){
        ?>

        <ol id="lista2">
            <li><a href="table_alumno.php?curso=<?php echo base64_encode($colum['Codigo']); ?>&cod=<?php echo base64_encode($fila['Codigo']); ?>"><?php echo $colum['Nombre']; ?></a></li>
        </ol>
            
        <?php 
            }
         ?>
    </div>

    <?php include("../Admin/footer.php"); ?>
	
	<script type="text/javascript" src="../estilos/js/jquery.min.js"></script>
    <script type="text/javascript" src="../estilos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../estilos/js/modal.js"></script>
</body>
</html>