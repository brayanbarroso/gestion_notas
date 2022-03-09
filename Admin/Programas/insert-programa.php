<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$id = $_POST['cod'];
$nom = $_POST['nombre'];
$dur = $_POST['duracion'];

// var_dump($id);
// var_dump($nom);
// var_dump($dur);

if (!empty($id)) {
  $sql = "INSERT INTO Curso VALUES(?,?,?,?,now())";
  $insert = $pdo->prepare($sql);
  $insert->execute(array(null,$id,$nom,$dur));
  $pdo = null;
  header("Location:Programas.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Programas.php'>Volver<a/>";
}
