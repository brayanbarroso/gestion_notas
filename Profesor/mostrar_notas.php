<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/css/estilo.css">
</head>
<body> 
	<?php 
	    include('menu.php');
        include("../Conexion/Conexion.php");

        $id = base64_decode($_REQUEST['id']);
        $cod = base64_decode($_REQUEST['cod']);
        $curso = base64_decode($_REQUEST['curso']);

        $sql1 = "SELECT asignatura.`Codigo`,asignatura.`Nombre_Asig`,alumno.`Id`,CONCAT(alumno.`Nombres`,' ',alumno.`pApellido`)AS Nom_Ape, nota.`Nota_1`,nota.`Nota_2`,nota.`Nota_3`
                FROM asignatura,nota,alumno
                WHERE asignatura.`Codigo` = nota.`Asignatura_Codigo` AND alumno.`Id` = nota.`Alumno_Id` AND alumno.`Id` = '$id' AND asignatura.`Codigo` = '$cod'";
                
        $result1 = mysql_query($sql1) or die(mysql_error());
        $fila = mysql_fetch_array($result1);
    ?>
    <div class="contenido">
    	<a href=""><i class="glyphicon glyphicon-arrow-left"></i> Volver</a>
    </div>
	<form action="update_nota.php?cod=<?php echo $fila['Codigo']; ?>&id=<?php echo $fila['Id']; ?>&&curso=<?php echo $curso;?>" method="post" class="form-incr">
	    <fieldset>
	        <legend>Datos Basicos del Alumno</legend>
		    <div class="campo">
		       
		        <input type="hidden" id="cod" name="cod" value="<?php echo $fila['Codigo']; ?>" readonly/>
		    </div>
		    <div class="campo">
		        <label for="asignatura">Asignatura:</label>
		        <input type="text" id="asignatura" name="asignatura" value="<?php echo $fila['Nombre_Asig']; ?>" readonly/>
		    </div>
		    <div class="campo">
		        <input type="hidden" id="cc" name="cc" value="<?php echo $fila['Id']; ?>" readonly/>
		    </div>
		    <div class="campo">
		        <label for="alumno">Alumno:</label>
		        <input type="text" id="alumno" name="alumno" value="<?php echo $fila['Nom_Ape']; ?>" readonly/>
		    </div>
		    <div class="campo">
		        <label for="nota1">Nota 1:</label>
		        <input type="text" id="nota1" name="nota1" placeholder="Example: 4.5" value="<?php echo $fila['Nota_1']; ?>"/>
		    </div>
		    <div class="campo">
		        <label for="nota2">Nota 2:</label>
		        <input type="text" id="nota2" name="nota2" placeholder="Example: 4.5" value="<?php echo $fila['Nota_2']; ?>"/>
		    </div>
		    <div class="campo">
		        <label for="nota3">Nota 3:</label>
		        <input type="text" id="nota3" name="nota3" placeholder="Example: 4.5" value="<?php echo $fila['Nota_3']; ?>"/>
		    </div>
		    <div class="boton">
				<button class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar</button>
			</div 
		</fieldset>
		</fieldset>
	</form>
	</form>
	  

    <?php include("../Admin/footer.php"); ?>

    <script type="text/javascript" src="../estilos/js/jquery.min.js"></script>
    <script type="text/javascript" src="../estilos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../estilos/js/modal.js"></script>
</body>
</html>