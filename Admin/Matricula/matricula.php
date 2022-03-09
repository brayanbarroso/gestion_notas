<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Matricula</title>
    <link rel="stylesheet" href="../../estilos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../estilos/css/estilo.css">
</head>

<body>
    <!-- Tabla de Datos-->
    <?php
    include("../../Login/seguridad.php");
    include("../header.php");
    include("../../Conexion/Conexion.php");

    $sql = "SELECT alumno.`Doc`, CONCAT(alumno.`Nombres`, ' ', alumno.`sApellido`)AS Nombre, curso.`Codigo`, curso.`Curso`, curso.`Duracion`
            ,matricula.`Alumno_Id`, matricula.`Curso_id`
            FROM matricula, alumno, curso
            WHERE alumno.`Id` = matricula.`Alumno_Id` AND Curso.`id` = matricula.`Curso_id`";

    $result = $pdo->prepare($sql);
    $result->execute();
    $filas = $result->fetchAll();
    // $result1 = mysql_query($sql) or die(mysql_error());
    ?>

    <div class="contenido">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="6">Alumnos Matriculados</th>
                </tr>
                <tr>
                    <th>Identificacion</th>
                    <th>Nombres Apellidos</th>
                    <th>Codigo</th>
                    <th>Programa</th>
                    <th>Duracion</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php
            foreach ($filas as $row) :
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['Doc']; ?></td>
                        <td><?php echo $row['Nombre']; ?></td>
                        <td><?php echo $row['Codigo']; ?></td>
                        <td><?php echo $row['Curso']; ?></td>
                        <td><?php echo $row['Duracion']; ?></td>                        
                        <td>
                            <a href="delete.php?cod=<?php echo $row['Curso_id']; ?>&id=<?php echo $row['Alumno_Id']; ?>" class="btn btn-danger" title="Eliminar matricula"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                </tbody>
            <?php
            endforeach;
            ?>
        </table>
    </div>

    <?php include("../footer.php"); ?>

    <script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../estilos/js/modal.js"></script>

</body>

</html>