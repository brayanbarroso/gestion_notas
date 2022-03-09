<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="../../estilos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../estilos/css/estilo.css">
</head>

<body>
    <!-- Tabla de Datos-->
    <?php
    include("../../Login/seguridad.php");
    include("../header.php");
    include("../../Conexion/Conexion.php");

    $cod = $_REQUEST['cod'];

    // var_dump($cod);

    $sql = "SELECT Asignatura.`Codigo`,Asignatura.`Asignatura`, nota.`Alumno_Id`, alumno.`Nombres`, CONCAT(alumno.`pApellido`,' ',alumno.`sApellido`) AS Apellidos,
            nota.`Asignatura_Id`,nota.`Nota_1`,nota.`Nota_2`,nota.`Nota_3`,nota.`Definitiva`
            FROM alumno,asignatura,nota
            WHERE asignatura.`Id`= nota.`Asignatura_Id` AND alumno.`Id`= nota.`Alumno_Id` AND asignatura.`Id` = ?";

    $result = $pdo->prepare($sql);
    $result->execute(array($cod));
    $rows = $result->fetchAll();

    $result = $pdo->prepare($sql);
    $result->execute(array($cod));
    $fila = $result->fetch();


    ?>
    <div class="contenido">
        <span class="asig"><?php echo $fila['Codigo']; ?> <?php echo $fila['Asignatura']; ?></span>
    </div>

    <div class="contenido">
        <table class="table">
            <thead>
                <tr>
                    <th>Identificacion</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Definitiva</th>
                    <th>Calificar</th>
                </tr>
            </thead>
            <?php
            foreach ($rows as $row) :
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['Alumno_Id']; ?></td>
                        <td><?php echo $row['Nombres']; ?></td>
                        <td><?php echo $row['Apellidos']; ?></td>
                        <td><?php echo $row['Nota_1']; ?></td>
                        <td><?php echo $row['Nota_2']; ?></td>
                        <td><?php echo $row['Nota_3']; ?></td>
                        <td><?php echo $row['Definitiva']; ?></td>
                        <td>
                            <a href="mostrar_notas.php?Id=<?php echo $row['Alumno_Id']; ?>&cod=<?php echo $fila['Asignatura_Id']; ?>" class="btn btn-success" title="Calificar"><span class="glyphicon glyphicon-saved"></span></a>
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