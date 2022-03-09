<?php
   include("../../Conexion/Conexion.php");
   include("../../Login/seguridad.php");

   $cod = $_POST['nit'];
   $id = $_POST['alumno'];
   $nota = 0;

  //  var_dump($cod);
  //  var_dump($id);

   if (!empty($id)) {
   	    $sql = "INSERT INTO nota VALUES(?,?,?,?,?,?)";
   		$insert=$pdo->prepare($sql);
       $insert->execute(array($cod,$id,$nota,$nota,$nota,null));

   		header("Location:table_alumno.php?cod=$cod");
   }else{
   	 echo "Por favor verificar los Campos no pueden estar vacios";
   	 echo "<br/>";
   	 echo "<a href='Asignatura.php'>Volver<a/>";
   }
