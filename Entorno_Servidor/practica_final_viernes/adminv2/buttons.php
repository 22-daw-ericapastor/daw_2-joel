
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        ob_start();
        session_start();
        include('views/header.php');
        include('views/body.php');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div class="contenedor">
        <h1>Eliminar&nbsp;Mensajes&nbsp;de&nbsp;los&nbsp;Usuarios</h1>
        <!--Introducir aqui un input oculto con la id del mensaje para eliminarlo-->
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Mensaje</td>
                    <td>Usuario</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                require('controllers/paginacion.php');
                foreach ($result as $usuario){

                ?>
                <tr>
                    <td><?php echo $usuario['id_comentarios']; ?></td>
                    <td><?php echo $usuario['comentario']; ?></td>
                    <td><?php echo $usuario['nick']; ?></td>
                    <td>
                        <form method="POST" action="controllers/eliminar_comentario.php">
                            <input type="hidden" name="idcomentario" value="<?php echo $usuario['id_comentarios']; ?>">
                             <button class="btn btn-google btn-user btn-block" type="submit">Eliminar&nbsp;Mensaje</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
                ?>
            </tbody>
        </table>
        <br></br>
        <?php

                        if($_SESSION['totalArticulos']>=1){

                        ?>
        <div class="paginacion" style="margin-left: 30%">
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
    if(isset($_SESSION['comentario_eliminado'])){
        echo'<script>alert("El comentario ha sido eliminado con éxito")</script>';
        unset($_SESSION['comentario_eliminado']);
    }
    //para destruir las sesiones si se va hacia atras con las flechas
    if(!isset($_SESSION['nombre'])){
    header('Location: views/login.php');
    }
    ?>
               
            </div>
        </div>
    </div>

</body>
<?php
ob_end_flush();
?>

</html>

