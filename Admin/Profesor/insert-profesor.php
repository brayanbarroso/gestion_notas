<?php
include("../../Conexion/Conexion.php");

$id = $_POST['nid'];
$td = $_POST['tipo'];
$nom = $_POST['pnombre'];
$snom = $_POST['snombre'];
$pape = $_POST['pape'];
$sape = $_POST['sape'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = $id;

if (!empty($id)) {
   $sql = "INSERT INTO Profesor(Id, Tipo, Doc, Nombres, Snom, pApellido, sApellido, Direccion, Telefono, Correo, User_Doc,Contrasena,Fecha_Creacion) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,now())";
   $insert = $pdo->prepare($sql);
   $insert->execute(array(NULL,$td,$id,$nom,$snom,$pape,$sape,$dir,$tel,$email,$user,$password));

   // $insert = "INSERT INTO Clase VALUES('$asign','$id')";
   // mysql_query($insert);

   header("Location:Profesor.php");
} else {
   echo "Por favor verificar los Campos no pueden estar vacios";
   echo "<br/>";
   echo "<a href='Profesor.php'>Volver<a/>";
}
