<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Notas</title>
</head>
<body>
	<form action="ver_notas.php" method="post">
		<fieldset>
			<legend></legend>
			<div class="form">
				<label for="">Buscar Por:</label>
				<select name="opcion" id="opcion">
					<option value="">Selecione</option>
					<option value="Alumno">Alumno</option>
					<option value="Asignatura">Asignatura</option>
				</select>
			</div>
			<div class="form">
				<label for=""></label>
				<input type="text" name="ncod" id="ncod">
			</div>
			<div class="boton">
				<button>Verificar</button>
			</div>
		</fieldset>
	</form>
</body>
</html>