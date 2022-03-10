<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/css/estilo.css">
</head>

<body>
	<?php
	include("../Login/seguridad.php");
	?>
	<header class="cabecera">
		<img class="logo" src="../estilos/img/Captura.PNG" alt="Logo Principal" width="100" height="100" />
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
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <strong style="color: #fff"><?php echo $_SESSION['user_nombre']; ?></strong><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li>
							<a href="Administrador/form-update.php?cc=<?php echo $_SESSION['id_user']; ?>">
								<i class="glyphicon glyphicon-refresh"></i> Actualizar Datos
							</a>
						</li>
						<li>
							<a href="Administrador/form-pass.php">
								<i class=" glyphicon glyphicon-cog"></i> Cambiar Contraseña
							</a>
						</li>
						<li class="divider"></li>
						<li><a href="../Login/salir.php"><i class="glyphicon glyphicon-off"></i> Cerrar Sesion</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Sesiones -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<a href="Programas/Programas.php" class="btn btn-primary">
						<img src="../estilos/img/programa.png" class="img-rounded" alt=""  width="40" height="40"> Programas
					</a>
					<a href="Asignaturas/Asignatura.php" class="btn btn-primary">
						<img src="../estilos/img/asignatura.jpg" class="img-rounded" alt=""  width="40" height="40"> Asignaturas
					</a>
					<a href="Matricula/matricula.php" class="btn btn-primary">
						<img src="../estilos/img/notas.jpg" class="img-rounded" alt="" width="40" height="40"> Matricula
					</a>
				</div>
				<div class="col-xs-12 col-md-6">
					<a class="btn btn-primary" href="Profesor/Profesor.php">
						<img src="../estilos/img/profesores.jpg" class="img-rounded" alt="" width="40" height="40"> Docentes
					</a>
					<a class="btn btn-primary" href="Alumno/Alumno.php">
						<img src="../estilos/img/estudiantes.png" class="img-rounded" alt="" width="40" height="40"> Estudiantes
					</a>
				</div>
			</div>
			</div>
	</section>

	<footer>
		<div class="pie">
			<p>Ing Brayan Barroso</p>
			<hr>
			<span class="autor">&copy;Derechos Reservados</span>
			<span class="dir">Barrio Miramar</span>
			<span class="tel">3117330066</span>
		</div>
	</footer>

	<script type="text/javascript" src="../estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="../estilos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../estilos/js/modal.js"></script>
	<script type="text/javascript" src="../estilos/js/alert.js"></script>
</body>

</html>