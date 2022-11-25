
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
<?php
if(isset($_SESSION['admin_creado'])){
    echo'<script>alert("Admin creado correctamente")</script>';
    unset($_SESSION['admin_creado']);
}

//para destruir las sesiones si se va hacia atras con las flechas
if(!isset($_SESSION['nombre'])){
    header('Location: views/login.php');
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