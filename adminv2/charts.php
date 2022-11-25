<div id="wrapper">
        <?php
        ob_start();
        include('views/header.php');
        include('views/body.php');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                
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
            </div>
        </div>
    </div>

</body>
<?php
ob_end_flush();
?>

</html>