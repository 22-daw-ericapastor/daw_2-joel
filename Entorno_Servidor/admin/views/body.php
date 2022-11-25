 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">
<?php
if(isset($_SESSION['admin_creado'])){
    echo'<script>alert("Se ha creado el administrador correctamente")</script>';
    unset($_SESSION['admin_creado']);

}
?>
<!-- Main Content -->
<div id="content">
<div id="alerta" style="display: none">
<!--ASI HACER TODOS LOS PANELES DE ADMINISTRACIÓN OCULTANDO DIVS-->

        <div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Registro Administradores</h1>
                        </div>
                        <form class="user" method="POST" action="controllers/crear_admin.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    name="usuario_admin" aria-describedby="emailHelp"
                                    placeholder="Introduce el nombre de Usuario">
                            </div>
                            <div class="form-group">
                                <input type="password" maxlength=8 class="form-control form-control-user"
                                    name="contrasena" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <input type="number" maxlength="9" class="form-control form-control-user"
                                    name="tlf_contacto" placeholder="Introduce el telefono de contacto">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    name="persona" placeholder="Introduce persona de contacto">
                            </div>
                            <div class="form-group">
                                <div>
                                    <button class="btn btn-google btn-user btn-block" type="">Crear Administrador</button>

                                </div>
                            </div>
                        </form>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
    </div>

    

    <div id="listar_eliminar" style="display: none">
        <br></br>
<!--ASI HACER TODOS LOS PANELES DE ADMINISTRACIÓN OCULTANDO DIVS-->
     <!-- Outer Row -->
        <div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">
<h1 class="h4 text-gray-900 mb-4">Listado de Usuarios Registrados</h1>

<?php
include('controllers/listar_usuarios.php');
//print_r($datos_usuarios);
?>

<table class="table table-striped table-bordered table-hover' text-align:center;" style="width:50%">
                        <thead>
                            <tr>
                            <th scope="col" class="lead" style="text-align: center;">Nick</th>
                            <th scope="col" class="lead" style="text-align: center;">Contraseña</th>
                            <th scope="col" class="lead" style="text-align: center;">Nombre</th>
                            <th scope="col" class="lead" style="text-align: center;">Apellido&nbsp;1</th>
                            <th scope="col" class="lead" style="text-align: center;">Apellido 2</th>
                            <th scope="col" class="lead" style="text-align: center;">Correo Electrónico</th>
                            <th scope="col" class="lead" style="text-align: center;">Edad</th>
                            <th scope="col" class="lead" style="text-align: center;">Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($datos_usuarios as $valor){
                                ?>
                                <tr>
                                <td class="lead" style="text-align: center;"><?php echo $valor['nick']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $valor['contrasena']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $valor['nombre']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $valor['apellido1']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $valor['apellido2']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $valor['correo']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $valor['edad']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $valor['telefono']; ?></td>
                                <td>
                                    <form action="controllers/eliminar_usuario.php" method="post">
                                  <input type="hidden" name="nick" value="<?php echo $valor['nick']; ?>">
                                  <input type="hidden" name="contrasena" value="<?php echo $valor['contrasena']; ?>">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Seleccionar">
                                    </form>
                        </td>
                                </tr>

                                <?php

                            }

                            if(isset($_SESSION['eliminado'])){
                                echo'<script>alert("El usuario ha sido eliminado con éxito");
                                </script>';

                                unset($_SESSION['eliminado']);
                            }
                            ?>
                            
                        </tbody>
                        </table>
</div>

</div>
    </div>

    <div id="leer_mensajes" style="display: none">
        <br></br>
<!--ASI HACER TODOS LOS PANELES DE ADMINISTRACIÓN OCULTANDO DIVS-->
     <!-- Outer Row -->
        <div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">
<h1 class="h4 text-gray-900 mb-4">Lista de Mensajes de los Usuarios</h1>
<?php
require('controllers/leer_mensajes.php');
//print_r($datos_comentarios);
?>
<div class="contenedor">
		<h1>Comentarios</h1>
		<section class="articulos">
			<ul>
				<?php foreach ($result as $usuario): 
                    
                    ?>
					<li><?php echo $usuario['id_comentarios'] . '.- ' . $usuario['comentario']; ?></li>
				<?php endforeach; ?>
			</ul>
		</section>

		<div class="paginacion">
			<ul>
				<!-- Establecemos cuando el boton de "Anterior" estara desabilitado -->
				<?php if($pagina == 1): ?>
					<li class="disabled">&laquo;</li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
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
					<li class="disabled">&raquo;</li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
				<?php endif; ?>
					
			</ul>
		</div>
	</div>

</div>

</div>
    </div>
    
</div>
</div>



</body>

</html>