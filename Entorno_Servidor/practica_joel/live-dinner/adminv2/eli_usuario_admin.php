
<div id="wrapper">
        <?php
        ob_start();
        include('views-admin/header-admin.php');
        include('views-admin/body-admin.php');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <br></br>
       <div class="row justify-content-center">
<h1 class="h4 text-gray-900 mb-4">Listado de Usuarios Registrados</h1>
<div class="col-xl-10 col-lg-12 col-md-9" style="margin-left: 35%;">


<?php
session_start();
//print_r($datos_usuarios);
?>

        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"  style="width:50%">
                        <thead>
                            <tr>
                            <th scope="col" class="lead" style="text-align: center;">Nick</th>
                            <th scope="col" class="lead" style="text-align: center;">Nombre</th>
                            <th scope="col" class="lead" style="text-align: center;">Apellido&nbsp;1</th>
                            <th scope="col" class="lead" style="text-align: center;">Apellido&nbsp;2</th>
                            <th scope="col" class="lead" style="text-align: center;">Correo&nbsp;Electrónico</th>
                            <th scope="col" class="lead" style="text-align: center;">Edad</th>
                            <th scope="col" class="lead" style="text-align: center;">Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require('controllers-admin/listar_usuarios.php');
                                foreach ($result as $usuario){

                                ?>
                                <tr>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['nick']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['nombre']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['apellido1']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['apellido2']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['correo']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['edad']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['telefono']; ?></td>
                                <td>
                                    <form action="controllers-admin/eliminar_usuario.php" method="post">
                                  <input type="hidden" name="nick" value="<?php echo $usuario['nick']; ?>">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Eliminar">
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
                        <br></br>
                        <?php
                        if($_SESSION['totalArticulos']>=1){

                        ?>
        <div class="paginacion" style="margin-left: 20%">
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
                         //para destruir las sesiones si se va hacia atras con las flechas
                        if(!isset($_SESSION['nombre'])){
                            header('Location: views-admin/login-admin.php');
                        }
                        ?>
</div>

</div>
            </div>
        </div>
    </div>

</body>
<?php
ob_end_flush();
?>

</html>