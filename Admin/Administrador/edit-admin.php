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
                                       Nombres = ?,
                                       pApellido = ?,
                                       sApellido = ?,
                                       Direccion = ?,
                                       Telefono = ?,
                                       Correo = ?
                     WHERE Id = ?";
            $update = $pdo->prepare($sql);
            $update->execute(array($nom,$pape,$sape,$dir,$tel,$email,$cc));

            header("Location:../");
      }else{
          echo "Por favor verificar los Campos no pueden estar vacios";
          echo "<br/>";
          echo "<a href='Profesor.php'>Volver<a/>";
      }

     
   ?>
</body>
</html>
