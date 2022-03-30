<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Programas</title>
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

    $sql = "SELECT Asignatura.`Codigo`, Asignatura.`Asignatura`, pensum.`Semestre`
            FROM Asignatura, pensum, curso
            WHERE Asignatura.`Id`= pensum.`Asignatura_Id` AND Curso.`id` = pensum.`Curso_id` AND Curso.`Codigo` = ?";
    $result = $pdo->prepare($sql);
    $result->execute(array($cod));
    $rows = $result->fetchAll();

    $consult = "SELECT * FROM Curso WHERE Codigo = ?";
    $sql1 = $pdo->prepare($consult);
    $sql1->execute(array($cod));
    $fila = $sql1->fetch();
    ?>

    <div class="contenido">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3">
                        <h2><?php echo $fila['Curso']; ?></h2>
                    </th>
                </tr>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Semestre</th>
                </tr>
            </thead>
            <?php foreach ($rows as $row) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['Codigo']; ?></td>
                        <td><?php echo $row['Asignatura']; ?></td>
                        <td><?php echo $row['Semestre']; ?></td>
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