<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admininistración Recetas</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestión Admininistración
            </div>
            <script>
                //metodo para mostrar los diferentes divs
                 function mostrar() {
                    var div6 = document.getElementById('leer_mensajes');
                    var div1 = document.getElementById('alerta');
                    var div2 = document.getElementById('listar_eliminar');
                    if (window.getComputedStyle(div1).display=== 'none') {
                        div1.style.display = 'block';
                        div2.style.display='none';
                        div6.style.display='none';
                    } else {
                        div1.style.display = 'none';
                    }
                }
                 function mostrar_listar() {
                    var div6 = document.getElementById('leer_mensajes');
                    var div2 = document.getElementById('listar_eliminar');
                    var div1 = document.getElementById('alerta'); 
                    if (window.getComputedStyle(div2).display=== 'none') {
                        div2.style.display = 'block';
                        div1.style.display ='none';
                        div6.style.display='none';
                    } else {
                        div2.style.display = 'none';
                    }
                }
                function leer_mensaje() {
                    var div6 = document.getElementById('leer_mensajes');
                    var div2 = document.getElementById('listar_eliminar');
                    var div1 = document.getElementById('alerta'); 
                    if (window.getComputedStyle(div6).display=== 'none') {
                        div6.style.display = 'block';
                        div1.style.display ='none';
                        div2.style.display ='none';
                    } else {
                        div6.style.display = 'none';
                    }
                }
                



            </script>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" onclick="mostrar()" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Crear Administrador</span>
                </a>
                <a class="nav-link collapsed" onclick="mostrar_listar()" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Listar Usuarios</span>
                </a>
            </li>
           
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestión de Recetas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Crear Receta</span>
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Modificar Receta</span>
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Eliminar Receta</span>
                </a>
            </li>

           <!-- Divider -->
           <hr class="sidebar-divider d-none d-md-block">


            <!-- Heading -->
            <div class="sidebar-heading">
                Gestión de Mensajes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" onclick="leer_mensaje()" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Leer Mensaje</span>
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Eliminar Mensaje</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
               <form method="POST" action="controllers/cerrar_sesion.php">
                   <input type="submit" value="Cerrar Sesion">
               </form> 
            </div>

        </ul>
        <!-- End of Sidebar -->