<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$cod = $_REQUEST['cod'];

$id = $_POST['nit'];
$Asignatura = $_POST['nombre'];
$creditos = $_POST['credito'];

var_dump($cod);
var_dump($id);
var_dump($Asignatura);
var_dump($creditos);


if (!empty($id)) {
  $sql = "UPDATE Asignatura SET Codigo = ?,
                                Asignatura = ?,
                                Credito = ?
                            WHERE Id = ?";
  $update = $pdo->prepare($sql);
  $update->execute(array($id, $Asignatura, $creditos,$cod));

  header("Location:Asignatura.php");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Asignatura.php'>Volver<a/>";
}
