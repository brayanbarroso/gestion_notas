<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Document</title>
</head>
<body>
   <?php 
      include("../../Conexion/Conexion.php");

      $cc = $_REQUEST['cc'];

     
      $nom = $_POST['nombre'];
      $pape = $_POST['pape'];
      $sape = $_POST['sape'];
      $dir = $_POST['dir'];
      $tel = $_POST['tel'];
      $email = $_POST['email'];

      if (!empty($nom)) {
             $sql = "UPDATE Administrador SET 
                                       Nombres = '$nom',
                                       pApellido = '$pape',
                                       sApellido = '$sape',
                                       Direccion = '$dir',
                                       Telefono = '$tel',
                                       Correo = '$email'
                     WHERE Id = '$cc'";
            mysql_query($sql);

            header("Location:../");
      }else{
          echo "Por favor verificar los Campos no pueden estar vacios";
          echo "<br/>";
          echo "<a href='Profesor.php'>Volver<a/>";
      }

     
   ?>
</body>
</html>
