<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="Login/css/csslogin.css"/>
</head>
<body>
    <div class="wrapper">
    	<form action="Login/proceso.php" method="post" class="login" enctype="multipart/form-data">
    	    <h2>Iniciar Sesion</h2>
		    <div class="login-container">
		        <label for="rol">Rol:</label>
		    	<select name="rol" id="rol">
		    		<option value="">Selecionar...</option>
		    		<option value="Administrador">Administrador</option>
		    		<option value="Docente">Docente</option>
		    		<option value="Alumno">Alumno</option>
		    	</select>
		   
				<label for="user">Usuario:</label>
				<input type="text" name="user" id="user" required placeholder="Ingresar Usuario" />
			
				<label for="pass">Contraseña:</label>
				<input type="password" name="pass" id="pass" required placeholder="Ingresar Contraseña" />
			
				<button class="primary_action">Ingresar</button>
			</div>
		</form>
    </div>
	
</body>
</html>