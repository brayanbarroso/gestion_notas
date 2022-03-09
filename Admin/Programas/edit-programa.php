<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$cod = $_REQUEST['cod'];

$id = $_POST['nit'];
$nom = $_POST['nombre'];

if (!empty($id)) {
  $sql = "UPDATE Curso SET Codigo = '$id', Nombre = '$nom' WHERE Codigo = '$cod'";
  $update = $pdo->prepare($sql);
  $update->execute(array($id, $nom, $cod));
  $pdo = null;

  header("Location:Programas.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Programas.php'>Volver<a/>";
}
