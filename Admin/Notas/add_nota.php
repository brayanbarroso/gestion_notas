<?php
include("../../Conexion/Conexion.php");

$cod = $_POST['cod'];
$alum = $_POST['cc'];
$des = $_POST['descri'];
$nota = $_POST['nota'];
$fecha = $_POST['fecha'];

if (!empty($des) and !empty($nota)) {
  $sql = "INSERT INTO Nota VALUES('$cod','$alum',NULL,'$des','$nota','$fecha')";
  $insert = $pdo->prepare($sql);
  $insert->execute(array($cod, $alum, NULL, $des, $nota, $fecha));

  header("Location:../Asignaturas/mostrar_notas.php?Id=$alum");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='../Asignaturas/Asignatura.php'>Volver<a/>";
}
