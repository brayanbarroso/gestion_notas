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
   session_start();

   include("../Conexion/Conexion.php");

   $rol = $_POST['rol'];
   $user = $_POST['user'];
   $pass = $_POST['pass'];

   if ($rol == 'Administrador') {
      $sql = "SELECT * FROM administrador WHERE administrador.`User_Admin` = '$user' AND administrador.`Contrasena` = '$pass'";
   } elseif ($rol == 'Docente') {
      $sql = "SELECT * FROM Profesor WHERE profesor.`Id` = '$user' AND profesor.`Id` = '$pass'";
   } elseif ($rol == 'Alumno') {
      $sql = "SELECT * FROM Alumno WHERE Alumno.`Id` = '$user' AND Alumno.`Id` = '$pass'";
   } else {
      echo "Debe Seleccionar un Usuario";
   }

   $result = $pdo->prepare($sql);
   $result->execute(array($rol, $user, $pass));
   $rows = $result->fetch();

   $id_user = $rows['Id'];
   $nombre = $rows['Nombres'];
   $Apellido = $rows['pApellido'];
   // var_dump($id_user);
   if (($rows > 0) && ($rol == 'Administrador')) {
      $_SESSION['autenticado'] = true;
      $_SESSION['user_id'] = $id_user;
      $_SESSION['user_nombre'] = $nombre;
      $_SESSION['user_apellido'] = $Apellido;
      $_SESSION['user'] = $user;
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
   ?>
      <div class='alert alert-success alert-dismissible' role='alert'>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <strong><?php echo $_SESSION['user_nombre']; ?> <?php echo $_SESSION['user_apellido']; ?></strong> Bienvenido
      </div>
      <meta http-equiv="refresh" content="2;url=../Admin/">

   <?php
      // header("Location:../Admin/index.php");
   } elseif (($rows > 0) && ($rol == 'Docente')) {
      $_SESSION['autenticado'] = true;
      $_SESSION['user_nombre'] = $nombre;
      $_SESSION['user_apellido'] = $Apellido;
      $_SESSION['user'] = $user;
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
   ?>

      <div class='alert alert-success alert-dismissible' role='alert'>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <strong><?php echo $_SESSION['user_nombre']; ?> <?php echo $_SESSION['user_apellido']; ?></strong> Ha iniciado Sesion Correctamente.
      </div>
      <meta http-equiv="refresh" content="2;url=../Profesor/index.php?cod=<?php echo base64_encode($_SESSION['user']); ?>">

   <?php
   } elseif (($row > 0) && ($rol == 'Alumno')) {
      $_SESSION['autenticado'] = true;
      $_SESSION['user_nombre'] = $nombre;
      $_SESSION['user'] = $user;
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
   ?>
      <div class='alert alert-success alert-dismissible' role='alert'>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <strong><?php echo $_SESSION['user_nombre']; ?></strong> Ha iniciado Sesion Correctamente.
      </div>
      <meta http-equiv="refresh" content="2;url=../Alumno/?cod=<?php echo ($_SESSION['user']); ?>">
   <?php
      //header("Location:../Alumno/?cod=base64_encode($user)");

   } else {
      $error = "Usuario o contraseña Incorrecta";
      header("Location:../");
   }
   ?>
</body>

</html>