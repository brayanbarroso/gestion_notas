<header class="cabecera">
	<img class="logo" src="../../estilos/img/Captura.PNG" alt="Logo Principal" width="100" height="100" />
	<hgroup>
		<h1>Sistemas de Gestion de Notas</h1>
	</hgroup>
</header>
<!-- Menu -->
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
			<li><a href="../index.php">Inicio</a></li>
			<li><a href="../Profesor/Profesor.php">Docentes</a></li>
			<li><a href="../Alumno/Alumno.php">Alumno</a></li>
			<li><a href="../Programas/Programas.php">Programa</a></li>
			<li><a href="../Asignaturas/Asignatura.php">Asignatura</a></li>
			<li><a href="../Matricula/matricula.php">Matricula</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Administrador</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong style="color: #fff"><?php echo $_SESSION['user_nombre']; ?></strong> <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="../Administrador/form-update.php?cc=<?php echo $_SESSION['user_id']; ?>"><i class="glyphicon glyphicon-refresh"></i> Actualizar Datos</a></li>
					<li><a href="../Administrador/form-pass.php"><i class=" glyphicon glyphicon-cog"></i> Cambiar Contraseña</a></li>
					<li><a href="../../Login/salir.php"><i class="glyphicon glyphicon-off"></i> Cerrar Sesion</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>