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
    <?php
    include("../../Login/seguridad.php");
    include("../header.php");
    ?>

    <div class="contenido">
        <!-- Formulario Para Agregar Asignaturas -->
        <!-- Button trigger modal -->
        <button type="button" class="mb-2 btn btn-primary" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-plus"></span> Agregar Asignaturas
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ingreso De Asignaturas</h4>
                    </div>
                    <div class="modal-body">
                        <form action="insert-asignatura.php" method="post">
                            <fieldset>
                                <legend>Registro de Asignaturas</legend>
                                <div class="campo">
                                    <label for="cod">Codigo:</label>
                                    <input type="text" id="cod" name="cod">
                                </div>
                                <div class="campo">
                                    <label for="nombre">Nombres:</label>
                                    <input type="text" id="nombre" name="nombre">
                                </div>
                                <div class="campo">
                                    <label for="credito">Creditos:</label>
                                    <select name="credito" id="">
                                        <option value="">Numero de Creditos</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </fieldset>

                            <div class="modal-footer">
                                <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Datos-->
    <?php
    include("../../Conexion/Conexion.php");

    $sql = "SELECT * FROM asignatura";
    $result = $pdo->prepare($sql);
    $result->execute();
    $rows = $result->fetchAll();
    ?>

    <div class="contenido">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="6">ASIGNATURA REGISTRADAS</th>
                </tr>
                <tr>
                    <th>Codigo</th>
                    <th>Nombres</th>
                    <th colspan="2">Ver Alumnos</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php
            foreach ($rows as $row) :
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['Codigo']; ?></td>
                        <td><?php echo $row['Asignatura']; ?></td>
                        <td>
                            <a href="table_alumno.php?cod=<?php echo $row['Id']; ?>" class="btn btn-info" title="Ver Alumnos"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                        </td>

                        <td>
                            <a href="incripcion.php?cod=<?php echo $row['Codigo']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </td>
                        <td>
                            <a href="form-update.php?cod=<?php echo $row['Codigo']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        </td>
                        <td>
                            <a href="delete.php?cod=<?php echo $row['Id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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