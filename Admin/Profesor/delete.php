<?php
include("../../Conexion/Conexion.php");

$ced = $_REQUEST['ced'];

$sql = "DELETE FROM Profesor WHERE Id = '$ced'";
$delete = $pdo->prepare($sql);
$delete->execute(array($ced));

header("Location:Profesor.php");
