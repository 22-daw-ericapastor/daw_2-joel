<?php
       $this->load->view('header');
	   $this->load->view('body');
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
				foreach ($LISTDATA as $data) {

					//print_r($receta['tipo_receta']);
			
				
                            ?>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="<?php echo base_url()."assets/"?>assets/images/blog-img-01.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4><?php echo $data->titulo; ?></h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span><?php echo $data->tipo_receta; ?></span></li>
							</ul>
							<p>Si quieres saber más sobre esta receta: </p>
							<form method="POST" action="<?php echo base_url()."index.php/Recetas/mostrar_receta"; ?>">
								<input type="hidden" name="idreceta" value="<?php echo $data->id; ?>">
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
			<style>
				ul.pagination {
				display: inline-block;
				padding: 0;
				margin: 0;
			}

			ul.pagination li {display: inline;}

			ul.pagination li a {
				color: black;
				float: left;
				padding: 8px 16px;
				text-decoration: none;
			}
			ul.pagination li a:hover{
				background-color:#ffb552;
			}
			</style>
			<div style="margin-left:35%;">
			<ul class="pagination">
			<?php echo $links; ?>
			</ul>
			</div>
		</div>
	</div>
<!-- ALL JS FILES -->
<script src="<?php echo base_url()."assets/"?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url()."assets/"?>js/popper.min.js"></script>
<script src="<?php echo base_url()."assets/"?>js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
<script src="<?php echo base_url()."assets/"?>js/jquery.superslides.min.js"></script>
<script src="<?php echo base_url()."assets/"?>js/images-loded.min.js"></script>
<script src="<?php echo base_url()."assets/"?>js/isotope.min.js"></script>
<script src="<?php echo base_url()."assets/"?>js/baguetteBox.min.js"></script>
<script src="<?php echo base_url()."assets/"?>js/form-validator.min.js"></script>
<script src="<?php echo base_url()."assets/"?>js/contact-form-script.js"></script>
<script src="<?php echo base_url()."assets/"?>js/custom.js"></script>