<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/css/estilo.css">
</head>
<body>
	<?php
    include("../../Login/seguridad.php");
    include("../../Conexion/Conexion.php");

    $passold = $_POST['antigua'];
	$passnew = $_POST['nueva'];

    if (!empty($passold)) {
        $sql = "UPDATE Administrador SET Contrasena = ? WHERE Contrasena = ?";
        $result = $pdo->prepare($sql);
        $result->execute(array($passnew,$passold));
    ?>
    <div class='alert alert-success alert-dismissible' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <h4>Su contraseña ha sido Actualizada con Exito</h4>
    </div>

    <?php
        session_start();
        unset ($SESSION['user']);
        session_destroy();
    ?>

    <meta http-equiv="refresh" content="5;url=../../">

    <?php
    }else{
          echo "Por favor verificar los Campos no pueden estar vacios";
          echo "<br/>";
          echo "<a href='../'>Volver<a/>";
    }
	?>
</body>
</html>