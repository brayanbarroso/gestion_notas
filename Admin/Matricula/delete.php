<?php 
    include("../../Conexion/Conexion.php");
    include("../../Login/seguridad.php");

    $cod = $_REQUEST['cod'];
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM matricula WHERE Curso_Codigo = '$cod' AND Alumno_Id = '$id'";
    $query = mysql_query($sql);

    header("Location:matricula.php");
 ?>