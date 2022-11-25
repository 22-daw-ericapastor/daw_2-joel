
<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="<?php echo base_url()."index.php/Redireccion/index"; ?>">
					<img src="<?php echo base_url()."assets/"?>assets/images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="<?php echo base_url()."index.php/Redireccion/index"; ?>">Home</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Recetas</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Recetas/recetas_tradicionales"; ?>">Recetas Tradicionales</a>
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Recetas/recetas_slow"; ?>">Recetas Slow-Cook</a>
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Recetas/recetas_freidora"; ?>">Recetas Freidora de Aire</a>
							</div>
						</li>
						<?php
						if(isset($_SESSION['nick'])){
						?>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Bienviendo, <?php
							$this->load->library('Cifrado');
							$nombre_descifrado = $this->cifrado->descrifra($_SESSION['nick']);
							echo $nombre_descifrado; ?></a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Redireccion/actualizar_datos"; ?>">Gestionar Perfil</a>
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Redireccion/cambiar_contrasena"; ?>">Cambiar Contraseña</a>
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Redireccion/eliminar"; ?>">Eliminar Cuenta</a>
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Usuario/cerrar"; ?>">Cerrar Sesion</a>
							</div>
						</li>
						<?php
						 }else{
						?>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Perfil</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Redireccion/login"; ?>">Iniciar Sesion</a>
								<a class="dropdown-item" href="<?php echo base_url()."index.php/Redireccion/registro"; ?>">Registrarse</a>
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