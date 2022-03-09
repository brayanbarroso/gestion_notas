<?php session_start(); ?>

<!-- Cabecera -->
<header class="cabecera">
	<img class="logo" src="../estilos/img/Captura.PNG" alt="Logo Principal" width="100" height="100"/>
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
	       <li><a href="index.php?cod=<?php echo $_SESSION['user']; ?>">Inicio</a></li>
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
            
        	<li class="dropdown">
	          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong style="color: #fff"><?php echo $_SESSION['user_nombre']; ?></strong><span class="caret"></span></a>
	          	<ul class="dropdown-menu">
		            <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Actualizar Datos</a></li>
		            <li><a href="#"><i class=" glyphicon glyphicon-cog"></i> Cambiar Contraseña</a></li>
		            <li><a href="../Login/salir.php"><i class="glyphicon glyphicon-off"></i> Cerrar Sesion</a></li>
	          	</ul>
        	</li>
      	</ul>
	</div>
</nav>