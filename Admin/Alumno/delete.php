<?php
include("../../Conexion/Conexion.php");
include("../../Login/seguridad.php");

$ced = $_REQUEST['ced'];

$sql = "DELETE FROM Alumno WHERE Id = '$ced'";
$delete = $pdo->prepare($sql);
$delete->execute(array($ced));

header("Location:Alumno.php");
