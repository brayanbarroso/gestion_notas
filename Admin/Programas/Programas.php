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
    <!-- Formulario Para Agregar Alumnos -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      <span class="glyphicon glyphicon-plus"></span> Agregar Programa
    </button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ingreso De Programas</h4>
          </div>
          <div class="modal-body">
            <form action="insert-programa.php" method="post">
              <fieldset>
                <legend>Programa</legend>
                <div class="campo">
                  <label for="cod">Codigo:</label>
                  <input type="text" class="form-control" id="cod" name="cod">
                </div>
                <div class="campo">
                  <label for="nombre">Nombres:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="campo">
                  <label for="duracion">Duración:</label>
                  <input type="text" class="form-control" id="duracion" name="duracion">
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

  $sql = "SELECT * FROM Curso";
  $result = $pdo->prepare($sql);
  $result->execute();
  $fila = $result->fetchAll();
  ?>
  <div class="contenido">
    <table class="table">
      <thead>
        <tr>
          <th colspan="8">
            <h4>Programas Inscritos</h4>
          </th>
        </tr>
        <tr>
          <th>Codigo</th>
          <th>Nombres</th>
          <th>Semestres</th>
          <th>Matricular</th>
          <th colspan="2">Pensum</th>
          <th>Actualizar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <?php
      foreach ($fila as $row) :
      ?>
        <tbody>
          <tr>
            <td><?php echo $row['Codigo']; ?></td>
            <td><?php echo $row['Curso']; ?></td>
            <td><?php echo $row['Duracion']; ?></td>
            <td>
              <a href="form_alum.php?cod=<?php echo $row['Codigo']; ?>" class="btn btn-success" title="Matricular Alumnos"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
            </td>
            <td>
              <a href="ver_asign.php?cod=<?php echo $row['Codigo']; ?>" class="btn btn-info" title="Ver Asignaturas"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
            </td>
            <td>
              <a href="form_add_asign.php?cod=<?php echo $row['Codigo']; ?>" class="btn btn-success" title="Agregar Asignatura"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></a>
            </td>
            <td>
              <a href="form-update.php?cod=<?php echo $row['Codigo']; ?>" class="btn btn-warning" title="Actualizar Programa"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            </td>
            <td>
              <a href="delete.php?cod=<?php echo $row['Codigo']; ?>" class="btn btn-danger" title="Eliminar Programa"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
  <script type="text/javascript" src="../../estilos/js/dropdown.js"></script>
  <script type="text/javascript" src="../../estilos/js/tab.js"></script>
</body>

</html>