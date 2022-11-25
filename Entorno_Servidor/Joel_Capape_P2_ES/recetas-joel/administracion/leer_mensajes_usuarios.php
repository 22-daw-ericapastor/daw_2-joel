<!-- Page Wrapper -->
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
                <div class="contenedor">
        <h1>Atender&nbsp;Mensajes&nbsp;de&nbsp;los&nbsp;Usuarios</h1>
        <br></br>
        <div>
            <h3>Mensajes Sin Atender</h3>
        <table class="table" >

            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tipo</td>
                    <td>Mensaje</td>
                    <td>Usuario</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                require('controllers-admin/mensajes_sin_atender.php');
                foreach ($result as $usuario){
                    if($usuario['atendida'] == 0){
                ?>
                <tr>
                    <td><?php echo $usuario['id_comentarios']; ?></td>
		    <td><?php echo $usuario['tipo']; ?></td>
                    <td><?php echo $usuario['comentario']; ?></td>
                    <td><?php echo $usuario['nick']; ?></td>
                    <td>
                        <form method="POST" action="controllers-admin/mensajes_atendidos.php">
                            <input type="hidden" name="id_comentario" value="<?php echo $usuario['id_comentarios']; ?>">
                             <button class="btn btn-google btn-user btn-block" type="submit">Mensaje&nbsp;Atendido</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            }
                ?>
            </tbody>
        </table>
         <br></br>
         <?php

if($_SESSION['totalArticulos']>=1){

?>
<div class="paginacion">
<ul>
<!-- Establecemos cuando el boton de "Anterior" estara desabilitado -->
<?php if($pagina_sin == 1): ?>
<li class="disabled">Anterior</li>
<?php else: ?>
<li><a href="?pagina=<?php echo $pagina_sin - 1 ?>">Anterior</a></li>
<?php endif; ?>

<!-- Ejecutamos un ciclo para mostrar las paginas -->
<?php 
for($i = 1; $i <= $numeroPaginas; $i++){
if ($pagina_sin === $i) {
    echo "<li class='active'><a href='?pagina_sin=$i'>$i</a></li>";
} else {
    echo "<li><a href='?pagina_sin=$i'>$i</a></li>";
}
}
?>

<!-- Establecemos cuando el boton de "Siguiente" estara desabilitado -->
<?php if($pagina_sin == $numeroPaginas): ?>
<li class="disabled">Siguiente</li>
<?php else: ?>
<li><a href="?pagina=<?php echo $pagina_sin + 1 ?>">Siguiente</a></li>
<?php endif; ?>

</ul>
</div>
<?php

 }
 unset($_SESSION['totalArticulos']);

?>
<br></br>
    </div>
        <div>
            <h3>Mensajes Atendidos</h3>
            <table class="table" >
            
            <thead>
                <tr>
                    <td>ID</td>
		            <td>Tipo</td>
                    <td>Mensaje</td>
                    <td>Usuario</td>
               
                </tr>
            </thead>
            <tbody>
                <?php
                require('controllers-admin/mensajes_prueba.php');
                foreach ($result as $usuario){

                ?>
                <tr>
                    <td><?php echo $usuario['id_comentarios']; ?></td>
		            <td><?php echo $usuario['tipo']; ?></td>
                    <td><?php echo $usuario['comentario']; ?></td>
                    <td><?php echo $usuario['nick']; ?></td>


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
<div class="paginacion">
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

