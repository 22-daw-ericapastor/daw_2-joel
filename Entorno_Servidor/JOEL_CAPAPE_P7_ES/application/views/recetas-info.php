<?php
       $this->load->view('header');
	   $this->load->view('body');
        ?>
	<!-- Start blog details -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-12">
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="side-blog-img">
								<!--<img class="img-fluid" src="images/inner-blog-img.jpg" alt="">-->
								<?php
								echo '<img class="img-fluid" src="data:image/jpeg;base64,' . base64_encode( $this->session->userdata('imagen')) . '"  height=900 weigth=500  />'
								?>							
								<div class="date-blog-up">
									
								</div>
							</div>
							<div class="inner-blog-detail details-page">
								<h3><?php echo $this->session->userdata('titulo');?></h3>
								<ul>
									<li><i class="zmdi zmdi-account"></i>Tipo Receta : <span><?php echo $this->session->userdata('tipo_receta');?></span></li>
									<li>|</li>
								</ul>
								<?php
								for($i=0;$i<count($this->session->userdata('ingredientes'));$i++){

								?>
								<ul>
									<li><i class="zmdi zmdi-account"></i>Ingrediente : <span><?php echo($_SESSION['ingredientes'][$i]['nombre_ingrediente']);?></span></li>
									<li><i class="zmdi zmdi-account"></i>Cantidad : <span><?php echo($_SESSION['ingredientes'][$i]['cantidad']);?></span></li>
								</ul>
								<?php
								}
								?>
								<p><?php echo $this->session->userdata('elaboracion');?></p>
							</div>
						</div>
						<?php
						if(isset($_SESSION['nick'])){ 
						?>
						<style>
						.este {
							height: 350px;
							line-height: 1em;
							overflow-x: hidden;
							overflow-y: scroll;
							width: 100%;
							}
						</style>
						<div class="blog-comment-box">
							<h3>Comentarios</h3>
							<div class="este">
						<?php
						$comentarios = $this->session->userdata('comentario');
						foreach ($comentarios as $comentarios) {
						?>
								<div class="comment-item">
								<div class="comment-item-left">
									<img src="<?php echo base_url()."assets/"?>assets/images/avt-img.jpg" alt="">
								</div>
								<div class="comment-item-right">
									<div class="pull-left">
										<p><?php
										$this->load->library('Cifrado');
										$nombre_descifrado = $this->cifrado->descrifra($comentarios['nombre_usuario']);
										echo $nombre_descifrado; ?></p>
									</div>
									<div class="des-l">
										<p><?php echo $comentarios['comentario_rec']; ?></p>
										<p>Puntuacion de la Receta: <?php echo $comentarios['puntuacion']; ?></p>
									</div>
								</div>
						</div>
							
						<?php
						
						}
						?>
						</div>
						</div>
						
						<div>
							
						</div>
						<div class="comment-respond-box">
							<h3>Deja tu comentario </h3>
							<div class="comment-respond-form">
								<form class="comment-form-respond row" method="post" action="<?php echo base_url()."index.php/Recetas/crear_comentario"; ?>">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input class="form-control" name="puntuacion" placeholder="Introduce una puntuacion del 1 al 5" type="number"  min="1" max="5" required>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<textarea class="form-control" name="mensaje_com" placeholder="Introduce tu mensaje" rows="2"></textarea>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<button class="btn btn-submit">Publicar Comentario</button>
									</div>
								</form>
							</div>
						</div>
						<?php
					
						//PASAR LA INACTIVIDAD A TODAS LOS DEMAS ARCHIVOS O HACER DIVISION
						if(isset($_SESSION['nombre'])){
							if(!isset($_SESSION['tiempo'])){
								$_SESSION['tiempo'] = time();
							}
							if(time() - $_SESSION['tiempo'] >100000){
								header('Location: controllers/cerrar_sesion.php');
							}
							$_SESSION['tiempo'] = time();
							 }
						?>
						<?php
						}
						?>
						  <?php
  if(isset($_SESSION['mensaje_creado'])){
    echo'<script>alert("Se ha creado el mensaje correctamente")</script>';
    unset($_SESSION['mensaje_creado']);

  }
  if(isset($_SESSION['error_mensaje'])){
    echo'<script>alert("No se ha podido registrar el mensaje correctamente")</script>';
    unset($_SESSION['error_mensaje']);

  }
  ?>
					</div>
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