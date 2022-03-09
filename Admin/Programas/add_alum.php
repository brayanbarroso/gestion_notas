<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$curso = $_POST['codigo'];
$alumno = $_POST['alumno'];
$fecha = $_POST['fecha'];

// var_dump($curso);
// var_dump($alumno);
// var_dump($fecha);


if (!empty($curso) && !empty($alumno)) {
  $sql = "INSERT INTO Matricula VALUES(?,?,?)";
  $insert = $pdo->prepare($sql);
  $insert->execute(array($alumno, $curso, $fecha));
  $pdo = null;
  header("Location:../Matricula/matricula.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Programas.php'>Volver<a/>";
}
