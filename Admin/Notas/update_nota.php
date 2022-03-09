<?php
include("../../Conexion/Conexion.php");

$cod = $_REQUEST['cod'];
$id = $_REQUEST['id'];

$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];
$notafinal =  round(($nota1 + $nota2 + $nota3) / 3, 1);
// var_dump($notafinal);
// var_dump($nota1);
// var_dump($nota2);
// var_dump($nota3);
// var_dump($cod);
// var_dump($id);


$consult = "SELECT * FROM Asignatura WHERE Codigo = ?";
$result = $pdo->prepare($consult);
$result->execute(array($cod));
$row = $result->fetch();

$asig = $row['Id'];



if (!empty($id)) {
  $sql = "UPDATE Nota SET  Nota_1 = ?,
                           Nota_2 = ?,
                           Nota_3 = ?,
                           Definitiva = ?
          WHERE   Asignatura_Id = ? AND Alumno_Id = ?";
  $update = $pdo->prepare($sql);
  $update->execute(array($nota1, $nota2, $nota3, $notafinal, $asig, $id));

  header("Location:../Asignaturas/table_alumno.php?cod=$asig");
} else {
  echo "Por favor verificar los Campos no pueden estar vacios";
  echo "<br/>";
  echo "<a href='Notas.php'>Volver<a/>";
}
