<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$curso = $_POST['codigo'];
$asign = $_POST['asign'];
$semestre = $_POST['semestre'];

var_dump($curso);
var_dump($asign);
var_dump($semestre);

if (!empty($curso)) {
  $sql = "INSERT INTO Pensum VALUES(?,?,?)";
  $insert = $pdo->prepare($sql);
  $insert->execute(array($asign, $curso, $semestre));
  $pdo = null;

  header("Location:Programas.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Programas.php'>Volver<a/>";
}
