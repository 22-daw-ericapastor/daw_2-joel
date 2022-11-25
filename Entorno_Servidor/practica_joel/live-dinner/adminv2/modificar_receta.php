<div id="wrapper">
        <?php
        ob_start();
        session_start();
        include('views-admin/header-admin.php');
        include('views-admin/body-admin.php');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                
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
                            <h1 class="h4 text-gray-900 mb-4">Modificar Receta</h1>
                        </div>
                        <?php 
                        if(isset($_SESSION['modificar'])){
                        ?>
                        <form class="user" method="POST" action="controllers-admin/control_modificar_receta.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    name="titulo" aria-describedby="emailHelp"
                                    value="<?php echo $_SESSION['titulo']; ?>" required>
                            </div>
                            <div class="form-group">
                                <select name="opciones" class="form-control" required style="border-radius: 25px;">
                                    <option selected><?php echo $_SESSION['tipo']; ?></option>
                                    <option>Receta Tradicional</option>
                                    <option>Receta Slow Cook</option>
                                    <option>Receta Freidora de Aire</option>
                                </select>
                            </div>
                            <div class="form-group">

                                    <div class="row">
                                    <table class="table table-bordered table-hover" id="tablaprueba">   
                                        <tr>
                                            <th>Nombre del Ingrediente</th>
                                            <th>Cantidad</th>

                                        </tr>
                                                       
                                        
                                            <?php
                                                    for ($i=0; $i < count($_SESSION['nombre_ingredientes']) ; $i++) { 
                                            ?>
                                            <!-- HACER UN FOREACH DE LOS INGREDIENTES PARA QUE MUESTRE LAS FILAS DE ESA RECETA GUARDANDO LOS DATOS EN VARIABLES DE SESION
                                                PRIMERO HACER LA COMPROBACIÓN DE SI EXISTE EL ARRAY -->
                                            <tr>
                                            <td><input type="text" name="ingredientes[]" class="form-control" value="<?php echo $_SESSION['nombre_ingredientes'][$i]['nombre_ingrediente']; ?>" required></td>            
                                            <td><input type="text" name="cantidad[]" class="form-control quantity" value="<?php echo $_SESSION['nombre_ingredientes'][$i]['cantidad']; ?>" required></td>
                                            <input type="hidden" name="id_ingrediente[]" class="form-control quantity" value="<?php echo $_SESSION['nombre_ingredientes'][$i]['id_ingrediente']; ?>" required>
                                            </tr> 
                                            <?php
                                        }
                                        ?>
                                                          
                                    </table>

                                  </div>

                            </div>
                            <textarea name="elaboracion" style="width: 100%;"><?php echo $_SESSION['elaboracion']; ?></textarea>
                            <br></br>
                            <div class="form-group">
                                <input name="archivo" class="form-control" id="archivo" type="file"/>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button class="btn btn-google btn-user btn-block" name="subir" type="submit">Modificar Receta</button>

                                </div>
                            </div>
                        </form>
                        <?php
                        unset($_SESSION['modificar']);
                    }else{
                    ?>
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th scope="col" class="lead" style="text-align: center;">Titulo&nbsp;de&nbsp;la&nbsp;Receta</th>
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
                                <td><!--FORMULARIO QUE LE PASAREMOS EL ID DE LA RECETA CON EL INPUT HIDDEN-->
                                <form method="POST" action="controllers-admin/control_buscar_receta_modificar.php">
                                    <input type="hidden" name="idreceta" value="<?php echo $usuario['id']; ?>">
                                    <div>
                                    <button class="btn btn-google btn-user btn-block" type="submit">Modificar&nbsp;Receta</button>
                                </div>
                                </form>
                            </td>
                                </tr>
                                <?php
                            }
                            ?>
                             <?php
                                        if(isset($_SESSION['receta_modificada'])){
                                            echo'<script>alert("La receta se ha modificado con éxito")</script>';
                                            unset($_SESSION['receta_modificada']);
                                        }
                                        ?>
                            
                        </tbody>
                        </table>
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

                        ?>
                        
                    <?php
                }
                ?>
                        <hr>
                        <?php
                        if(isset($_SESSION['modificado_receta'])){
                            echo'<script>alert("Se ha guardado la receta correctamente")</script>';
                            unset($_SESSION['modificado_receta']);
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