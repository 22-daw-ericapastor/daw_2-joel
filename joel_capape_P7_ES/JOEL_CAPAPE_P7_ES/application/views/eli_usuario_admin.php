
<div id="wrapper">
        <?php
        $this->load->view('header-admin');
        $this->load->view('body-admin');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <br></br>
       <div class="row justify-content-center">
<h1 class="h4 text-gray-900 mb-4">Listado de Usuarios Registrados</h1>
<div class="col-xl-10 col-lg-12 col-md-9" style="margin-left: 35%;">
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
                                foreach ($LISTDATA as $usuario){

                                ?>
                                <tr>
                                <td class="lead" style="text-align: center;"><?php
                                $this->load->library('Cifrado');
                                $nick_descifrado = $this->cifrado->descrifra($usuario['nick']);
                                echo $nick_descifrado; ?></td>
                                <td class="lead" style="text-align: center;"><?php
                                $nombre_descifrado = $this->cifrado->descrifra($usuario['nombre']);
                                echo $nombre_descifrado; ?></td>
                                <td class="lead" style="text-align: center;"><?php
                                $apellido1_descifrado = $this->cifrado->descrifra($usuario['apellido1']);
                                echo $apellido1_descifrado ; ?></td>
                                <td class="lead" style="text-align: center;"><?php
                                $apellido2_descifrado = $this->cifrado->descrifra($usuario['apellido2']);
                                echo $apellido2_descifrado; ?></td>
                                <td class="lead" style="text-align: center;"><?php
                                $correo_descifrado = $this->cifrado->descrifra($usuario['correo']);
                                echo $correo_descifrado; ?></td>
                                <td class="lead" style="text-align: center;"><?php
                                $edad_descifrado = $this->cifrado->descrifra($usuario['edad']);
                                echo $edad_descifrado; ?></td>
                                <td class="lead" style="text-align: center;"><?php
                                $telefono_descifrado = $this->cifrado->descrifra($usuario['telefono']);
                                echo $telefono_descifrado; ?></td>
                                <td>
                                    <form action="<?php echo base_url()."index.php/Administrador/eliminar_usuarioAdmin"; ?>" method="post">
                                  <input type="hidden" name="nick" value="<?php echo $usuario['nick']; ?>">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Eliminar">
                                    </form>
                        </td>
                                </tr>

                                <?php

                            }
                            ?>
                            
                        </tbody>
                        </table>
                        <br></br>
                        <!--poner la paginacion aqui-->
                        <style>
				ul.pagination {
				display: inline-block;
				padding: 0;
				margin: 0;
			}

			ul.pagination li {display: inline;}

			ul.pagination li a {
				color: black;
				float: left;
				padding: 8px 16px;
				text-decoration: none;
			}
			ul.pagination li a:hover{
				background-color:#ffb552;
			}
			</style>
			<div style="margin-left:35%;">
			<ul class="pagination">
			<?php echo $links; ?>
			</ul>
			</div>
</div>

</div>
            </div>
        </div>
    </div>

</body>
</html>