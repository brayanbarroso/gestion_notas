<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$id = $_POST['cod'];
$nom = $_POST['nombre'];
$credito = $_POST['credito'];


if (!empty($id)) {
  $sql = "INSERT INTO Asignatura(Id, Codigo, Asignatura, Credito, Fecha_Creacion) VALUES(?,?,?,?,now())";
  $insert = $pdo->prepare($sql);
  $insert->execute(array(NULL, $id, $nom, $credito));
  $pdo = null;

  header("Location:Asignatura.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Asignatura.php'>Volver<a/>";
}
