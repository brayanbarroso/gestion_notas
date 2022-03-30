<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$tipo = $_POST['tipo'];
$id = $_POST['nid'];
$nom = $_POST['nombre'];
$snom = $_POST['snombre'];
$pape = $_POST['pape'];
$sape = $_POST['sape'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = $id;

if (!empty($id)) {
  $sql = "INSERT INTO Alumno(Id, Tipo, Doc, Nombres, Snom, pApellido, sApellido, Direccion, Telefono, Correo,User_Alum, Contrasena, Fecha_Creacion) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,now())";
  $insert = $pdo->prepare($sql);
  $insert->execute(array(NULL,$tipo,$id,$nom,$snom,$pape,$sape,$dir,$tel,$email,$user,$password));
// var_dump($insert);
  header("Location:Alumno.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Alumno.php'>Volver<a/>";
}
