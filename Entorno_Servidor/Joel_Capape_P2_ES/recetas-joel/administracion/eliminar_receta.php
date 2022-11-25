<div id="wrapper">
        <?php
        session_start();
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
<h1 class="h4 text-gray-900 mb-4">ELIMINAR RECETA</h1>
<div class="col-xl-10 col-lg-12 col-md-9" style="margin-left: 35%;">

        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"  style="width:50%">
                        <thead>
                            <tr>
                            <th scope="col" class="lead" style="text-align: center;">Titulo&nbsp;de&nbsp;la&nbsp;Receta</th>
                            <th scope="col" class="lead" style="text-align: center;">Tipo&nbsp;de&nbsp;Receta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require('controllers-admin/control_eliminar_receta.php');
                                foreach ($result as $usuario){
                            ?>
                            <!--FOR CON LOS DIFERENTES DATOS QUE HAY-->
                                <tr>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['titulo']; ?></td>
                                <td class="lead" style="text-align: center;"><?php echo $usuario['tipo_receta']; ?></td>
                                <td><!--FORMULARIO QUE LE PASAREMOS EL ID DE LA RECETA CON EL INPUT HIDDEN-->
                                <form method="POST" action="controllers-admin/c_eliminar_receta.php">
                                    <input type="hidden" name="idreceta" value="<?php echo $usuario['id']; ?>">
                                    <div>
                                    <button class="btn btn-google btn-user btn-block" name="subir" type="submit">Eliminar&nbsp;Receta</button>
                                </div>
                                </form>
                            </td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                        </tbody>
                        </table>
                        <?php
                        if($_SESSION['totalArticulos']>=1){

                        ?>
        <div class="paginacion" style="margin-left: 6%">
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
                        <?php
                        
                        if(isset($_SESSION['receta_eliminada'])){
                            echo'<script>alert("La receta ha sido eliminada")</script>';
                            unset($_SESSION['receta_eliminada']);
                        }
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