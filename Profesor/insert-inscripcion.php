<?php 
   include("../../Conexion/Conexion.php");
   include("../../Login/seguridad.php");

   $cod = $_POST['cod'];
   $id = $_POST['id'];
   
   if (!empty($id)) {
   	    $sql = "INSERT INTO nota VALUES('$id','$cod',NULL,NULL,NULL)";
   		mysql_query($sql);

   		header("Location:table_alumno.php?cod=$cod");
   }else{
   	 echo "Por favor verificar los Campos no pueden estar vacios";
   	 echo "<br/>";
   	 echo "<a href='Asignatura.php'>Volver<a/>";
   }

  
 ?>
