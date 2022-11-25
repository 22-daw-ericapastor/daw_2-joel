<?php
        ob_start();
        include('views/header.php');
        include('views/body.php');
        ?>
<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Recetas de Freidora de Aire</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start blog -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<p>En este apartado veremos recetas para realizarlas con Freidora de Aire</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!--METER ESTO EN UN BUCLE-->
				<?php
				include('controllers/control-recetafre.php');
				foreach ($result as $receta) {

					//print_r($receta['tipo_receta']);
			
				
                            ?>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-01.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4><?php echo $receta['titulo']; ?></h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span><?php echo $receta['tipo_receta']; ?></span></li>
							</ul>
							<p>Si quieres saber más sobre esta receta: </p>
							<form method="POST" action="controllers/control-mostrar-receta.php">
								<input type="hidden" name="idreceta" value="<?php echo $receta['id']; ?>">
								<button class="btn btn-lg btn-circle btn-outline-new-white">Leer Más</button>
							</form>
						</div>
					</div>
				</div>
				<?php
			}
			?>
				<!---->
			</div>
							<?php

if($_SESSION['totalArticulos']>=1){

?>
			<div class="paginacion" style="margin-left: 35%">
            <ul>
                <!-- Establecemos cuando el boton de "Anterior" estara desabilitado -->
                <?php if($pagina == 1): ?>
                    <li class="disabled">Anterior</li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina - 1 ?>">Anterior</a></li>
                <?php endif; ?>

                <!-- Ejecutamos un ciclo para mostrar las paginas -->
                <?php 
                    for($i = 1; $i <= $numeroPaginas; $i++){
                        if ($pagina === $i) {
                            echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                        } else {
                            echo "<li><a href='?pagina=$i'>$i</a></li>";
                        }
                    }
                 ?>

                <!-- Establecemos cuando el boton de "Siguiente" estara desabilitado -->
                <?php if($pagina == $numeroPaginas): ?>
                    <li class="disabled">Siguiente</li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina + 1 ?>">Siguiente</a></li>
                <?php endif; ?>
                    
            </ul>
        </div>
                <?php

 }
 unset($_SESSION['totalArticulos']);

?>
		</div>
	</div>
	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
	<!-- End blog -->
	<?php
ob_end_flush();
?>