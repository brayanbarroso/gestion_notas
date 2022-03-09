<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Docente</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/css/estilo.css">

</head>
<body>
	 <!-- Tabla de Datos-->
	<?php 
        include("menu.php");
        include("../Conexion/Conexion.php");

        $curso = base64_decode($_REQUEST['curso']);
        $cod = base64_decode($_REQUEST['cod']);

        $sql = "SELECT alumno.`Id`,alumno.`Nombres`,CONCAT(alumno.`pApellido`,' ',alumno.`sApellido`)AS Apellidos,nota.`Nota_1`,nota.`Nota_2`,nota.`Nota_3`,nota.`Definitiva`,asignatura.`Nombre_Asig`
                FROM alumno,curso,asignatura,matricula,pensum,nota

                WHERE alumno.`Id` = nota.`Alumno_Id` AND alumno.`Id` = matricula.`Alumno_Id` AND asignatura.`Codigo` = nota.`Asignatura_Codigo` AND asignatura.`Codigo` = pensum.`Asignatura_Codigo` AND curso.`Codigo` = pensum.`Curso_Codigo` AND curso.`Codigo` = matricula.`Curso_Codigo` AND curso.`Codigo` = '$curso' AND asignatura.`Codigo` = '$cod'";
        $result = mysql_query($sql) or die(mysql_error());
        $result1 = mysql_query($sql) or die(mysql_error());
        $fila = mysql_fetch_array($result1);
        
	?>
    <div class="botonera">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
           <span class="glyphicon glyphicon-plus"></span> Nuevo Docentes
        </button>
        <a href="reporte.php?cod=<?php echo $row1['Id']; ?>" class="btn btn-primary">Reporte</a>    
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ingreso De Docentes</h4>
                </div>
                <div class="modal-body">
                    <form action="insert-profesor.php" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="campo">
                                        <label for="nid">Identificación:</label>
                                        <input type="text" id="nid" name="nid">
                                    </div>
                                    <div class="campo">
                                        <label for="nombre">Nombres:</label>
                                        <input type="text" id="nombre" name="nombre">
                                    </div>
                                    <div class="campo">
                                        <label for="pape">Primer Apellido:</label>
                                        <input type="text" id="pape" name="pape">
                                    </div>
                                    <div class="campo">
                                        <label for="sape">Segundo Apellido:</label>
                                        <input type="text" id="sape" name="sape">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="campo">
                                        <label for="dir">Dirección:</label>
                                        <input type="text" id="dir" name="dir">
                                    </div>
                                    <div class="campo">
                                        <label for="tel">Teléfono</label>
                                        <input type="text" id="tel" name="tel">
                                    </div>
                                    <div class="campo">
                                        <label for="email">Correo Electronico:</label>
                                        <input type="text" id="email" name="email">
                                    </div>
                                    <div class="campo">
                                        <label for="asign">Asignatura:</label>
                                        <input type="text" id="asign" name="asign" placeholder="Codigo">
                                    </div>
                                </div>
                            </div>          
          
                        <div class="modal-footer">
                            <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="contenido">
        <h2>Asignatura: <strong><?php echo $fila['Nombre_Asig']; ?></strong></h2>
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
               while ($row = mysql_fetch_array($result)) {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Nombres']; ?></td>
                    <td><?php echo $row['Apellidos']; ?></td>
                    <td><?php echo $row['Nota_1']; ?></td>
                    <td><?php echo $row['Nota_2']; ?></td>
                    <td><?php echo $row['Nota_3']; ?></td>
                    <td><strong><?php echo $row['Definitiva']; ?></strong></td>
                    <td>
                        <a href="mostrar_notas.php?cod=<?php echo base64_encode($cod);?>&id=<?php echo base64_encode($row['Id']); ?>&curso=<?php echo base64_encode($curso);?>" class="btn btn-success" title="Calificar"><span class="glyphicon glyphicon-saved"></span></a>
                    </td>
                </tr>
            </tbody>
            <?php
                }
            ?>
        </table>
    </div>

    <?php include("../Admin/footer.php"); ?>

    <script type="text/javascript" src="../estilos/js/jquery.min.js"></script>
    <script type="text/javascript" src="../estilos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../estilos/js/modal.js"></script>
</body>
</html>