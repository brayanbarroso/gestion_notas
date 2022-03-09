<?php
include("../../Conexion/Conexion.php");

$cc = $_REQUEST['cc'];

// $id = $_POST['nid'];
$nom = $_POST['pnombre'];
$snom = $_POST['Snombre'];
$pape = $_POST['pape'];
$sape = $_POST['sape'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$user = $_POST['user'];

if (!empty($cc)) {
  $sql = "UPDATE Profesor SET Nombres = '$nom',
                              Snom    = '$snom',
                              pApellido = '$pape',
                              sApellido = '$sape',
                              Direccion = '$dir',
                              Telefono = '$tel',
                              Correo = '$email',
                              Usuario = '$user'
                  WHERE Id = '$cc'";
  $update = $pdo->prepare($sql);
  $update->execute(array($nom, $snom, $pape, $sape, $dir, $tel, $email, $user, $cc));
  header("Location:Profesor.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Profesor.php'>Volver<a/>";
}
