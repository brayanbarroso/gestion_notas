<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$ced = $_REQUEST['cod'];

$sql = "DELETE FROM Asignatura WHERE Id = ?";
$Consult = $pdo->prepare($sql);
$Consult->execute(array($ced));

header("Location:Asignatura.php");
