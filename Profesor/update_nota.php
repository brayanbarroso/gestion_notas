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
      include("../Conexion/Conexion.php");

      $cod = $_REQUEST['cod'];
      $id = $_REQUEST['id'];
      $curso = $_REQUEST['curso'];

      $nota1 = $_POST['nota1'];
      $nota2 = $_POST['nota2'];
      $nota3 = $_POST['nota3'];

      $notafinal = round(($nota1+$nota2+$nota3)/3 ,1);

      if (!empty($id)) {
             $sql = "UPDATE Nota SET   Nota_1 = '$nota1',
                                       Nota_2 = '$nota2',
                                       Nota_3 = '$nota3',
                                       Definitiva = '$notafinal'                                                             

                     WHERE Alumno_Id = '$id' AND Asignatura_Codigo = '$cod'";
            mysql_query($sql);
   ?>
   <div class='alert alert-success alert-dismissible' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong>CALIFICACION AGREGADA CON EXITO</strong>
   </div>
   <div class="imagen">
      <img src="Imagen/Cargar.gif" alt="">
   </div>
   

   <meta http-equiv="refresh" content="10;url=table_alumno.php?cod=<?php echo base64_encode($cod); ?>&curso=<?php echo base64_encode($curso); ?>">

   <?php 

            //header("Location:table_alumno.php?cod=$cod&curso=$curso");
      }else{
          echo "Por favor verificar los Campos no pueden estar vacios";
          echo "<br/>";
          echo "<a href='Notas.php'>Volver<a/>";
      }

     
    ?>
</body>
</html>