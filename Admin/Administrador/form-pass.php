<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="../../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../estilos/css/estilo.css">
	<link rel="stylesheet" href="css/css_admin.css"/>
</head>
<body>
    <?php 
       include("../../Login/seguridad.php");
    ?>
    <header class="cabecera">
		<img class="logo" src="../../estilos/img/Captura.PNG" alt="Logo Principal" width="100" height="100"/>
		<hgroup>
			<h1>Sistemas de Gestion de Notas</h1>
		</hgroup>
	</header>
    <!--Menu -->
    <nav class="navbar navbar-inverse" role="navigation">
	    <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		      <span class="sr-only">Desplegar navegación</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="#">Logotipo</a>
	    </div>
	    <div class="collapse navbar-collapse navbar-ex1-collapse">
	        <ul class="nav navbar-nav">
		      <li><a href="../index.php?cc=<?php echo $_SESSION['user']; ?>">Inicio</a></li>
		    </ul>

		    <ul class="nav navbar-nav navbar-right">
	        	<li class="dropdown">
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <strong><?php echo $_SESSION['user_nombre']; ?></strong><span class="caret"></span></a>
		          	<ul class="dropdown-menu">
			            <li><a href="form-update.php?cc=<?php echo $_SESSION['user_id']; ?>"><i class="glyphicon glyphicon-refresh"></i> Actualizar Datos</a></li>
			            <li><a href="form-pass.php"><i class=" glyphicon glyphicon-cog"></i> Cambiar Contraseña</a></li>
			             <li role="separator" class="divider"></li>
			            <li><a href="../../Login/salir.php"><i class="glyphicon glyphicon-off"></i> Cerrar Sesion</a></li>
		          	</ul>
	        	</li>
	      	</ul>
		</div>
	</nav>

	<form action="edit-pass.php" method="post" class="pass">
		<div class="">
			<label for="antigua">Contraseña Antigua:</label>
			<input type="text" name="antigua" id="antigua" placeholder="Digite su Contraseña Antigua">
		</div>
		<div class="">
			<label for="nueva">Contraseña Nueva:</label>
			<input type="text" name="nueva" id="nueva" placeholder="Contraseña Nueva">
		</div>
		<div class="">
			<label for="nueva">Repita Contraseña Nueva:</label>
			<input type="text" name="nueva" id="nueva" placeholder="Repetir Contraseña">
		</div>
		<div class="boton">
			<button class="btn btn-info">Cambiar Contraseña</button>
		</div>
	</form>

	<?php include("../footer.php"); ?>

	<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../estilos/js/modal.js"></script>
</body>
</html>