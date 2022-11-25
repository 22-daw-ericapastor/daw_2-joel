<?php
session_start();
?>
<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
				<div class="blog-search-form" style="margin-left: 5%; position: absolute; margin-top: 2%;">
							<form method="POST" action="controllers/control-buscador-de-recetas.php" style="margin-top: 5%;">
							<input name="buscador" placeholder="Buscar Receta" type="text">
							<button class="search-btn">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</form>
						</div>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Recetas</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="recetas-tradicionales.php">Recetas Tradicionales</a>
								<a class="dropdown-item" href="recetas-slow.php">Recetas Slow-Cook</a>
								<a class="dropdown-item" href="recetas-freidora.php">Recetas Freidora de Aire</a>
							</div>
						</li>
						<?php
						if(isset($_SESSION['nick'])){
						?>
						<li class="nav-item"><a class="nav-link" href="crear_mensaje.php">Crear Mensaje</a></li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Bienviendo, <?php echo $_SESSION['nick']; ?></a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="gestionar_perfil.php">Gestionar Perfil</a>
								<a class="dropdown-item" href="cambiar_contrasena.php">Cambiar Contraseña</a>
								<a class="dropdown-item" href="eliminar_cuenta.php">Eliminar Cuenta</a>
								<a class="dropdown-item" href="controllers/cerrar_sesion.php">Cerrar Sesion</a>
							</div>
						</li>
						<?php
						 }else{
						?>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Perfil</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="login.php">Iniciar Sesion</a>
								<a class="dropdown-item" href="registro.php">Registrarse</a>
							</div>
						</li>
						<?php
						 }
						 ?>
					</ul>
					<?php
					
						//PASAR LA INACTIVIDAD A TODAS LOS DEMAS ARCHIVOS O HACER DIVISION
						if(isset($_SESSION['nombre'])){
							if(!isset($_SESSION['tiempo'])){
								$_SESSION['tiempo'] = time();
							}
							if(time() - $_SESSION['tiempo'] >10000){
								header('Location: controllers/cerrar_sesion.php');
							}
							$_SESSION['tiempo'] = time();
							 }
						?>
				</div>
			</div>
		</nav>
	</header>