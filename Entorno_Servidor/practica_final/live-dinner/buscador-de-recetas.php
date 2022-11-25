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
					<h1>Buscador de Recetas</h1>
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
						<p>Resultados de la Busqueda</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!--METER ESTO EN UN BUCLE-->
				<?php
				
				//include('controllers/control-buscador-de-recetas.php');
				if(isset($_SESSION['recetas'])){
				for($i=0;$i<count($_SESSION['recetas']);$i++) {

					  //echo '<img src="data:image/jpeg;base64,' . base64_encode( $receta['imagen'] ) . '" />';

			
				
                            ?>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							
							<img class="img-fluid" src="images/blog-img-01.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4><?php echo $_SESSION['recetas'][$i]['titulo']; ?></h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span><?php echo $_SESSION['recetas'][$i]['tipo_receta']; ?></span></li>
							</ul>
							<p>Si quieres saber más sobre esta receta:</p>
							<form method="POST" action="controllers/control-mostrar-receta.php">
								<input type="hidden" name="idreceta" value="<?php echo $_SESSION['recetas'][$i]['id']; ?>">
								<button class="btn btn-lg btn-circle btn-outline-new-white">Leer Más</button>
							</form>
						</div>
					</div>
				</div>
				<?php
			}
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
                <?php if($_SESSION['pagina'] == 1): ?>
                    <li class="disabled">Anterior</li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina - 1 ?>">Anterior</a></li>
                <?php endif; ?>

                <!-- Ejecutamos un ciclo para mostrar las paginas -->
                <?php 
                    for($i = 1; $i <= $_SESSION['numeroPaginas']; $i++){
                        if ($_SESSION['pagina'] === $i) {
                            echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                        } else {
                            echo "<li><a href='?pagina=$i'>$i</a></li>";
                        }
                    }
                 ?>

                <!-- Establecemos cuando el boton de "Siguiente" estara desabilitado -->
                <?php if($_SESSION['pagina'] == $_SESSION['numeroPaginas']): ?>
                    <li class="disabled">Siguiente</li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina + 1 ?>">Siguiente</a></li>
                <?php endif; ?>
                    
            </ul>
        </div>
                <?php

 }
 //unset($_SESSION['totalArticulos']);

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