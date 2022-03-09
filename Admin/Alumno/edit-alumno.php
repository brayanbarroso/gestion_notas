<?php
include("../../Conexion/Conexion.php");

$cc = $_REQUEST['cc'];

$id = $_POST['nid'];
$nom = $_POST['nombre'];
$snom = $_POST['snombre'];
$pape = $_POST['pape'];
$sape = $_POST['sape'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$user = $_POST['user'];

if (!empty($id)) {
  $sql = "UPDATE Alumno SET Nombres = ?,
                            Snom = ?,
                            pApellido = ?,
                            sApellido = ?,
                            Direccion = ?,
                            Telefono = ?,
                            Correo = ?,
                            Usuario = ?
                  WHERE Id = ?";
  $update = $pdo->prepare($sql);
  $update->execute(array($nom, $snom, $pape, $sape, $dir, $tel, $email, $user, $cc));

  header("Location:Alumno.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Alumno.php'>Volver<a/>";
}
