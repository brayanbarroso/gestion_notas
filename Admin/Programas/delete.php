<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$ced = $_REQUEST['cod'];

$sql = "DELETE FROM Curso WHERE Codigo = '$ced'";
$Consult = $pdo->prepare($sql);
$Consult->execute(array($ced));

header("Location:Programas.php");
