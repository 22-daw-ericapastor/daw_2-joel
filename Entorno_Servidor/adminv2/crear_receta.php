
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

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Insertar Nueva Receta</h1>
                        </div>
                        <form class="user" method="POST" action="controllers/control_receta.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    name="titulo" aria-describedby="emailHelp"
                                    placeholder="Introduce el nombre de la receta" required>
                            </div>
                            <div class="form-group">
                                <select name="opciones" class="form-control" required style="border-radius: 25px;">
                                    <option selected>Selecciona una opción</option>
                                    <option>Receta Tradicional</option>
                                    <option>Receta Slow Cook</option>
                                    <option>Receta Freidora de Aire</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <script type="text/javascript">
    
                                        function agregarFila(){
                                      document.getElementById("tablaprueba").insertRow(-1).innerHTML ='<td><input type="text" name="ingredientes[]" class="form-control" autocomplete="off" width="38%" required></td>'+
                                      '<td><input type="number" name="cantidad[]" class="form-control quantity" autocomplete="off" required></td>';
                                    }

                                    function eliminarFila(){
                                      var table = document.getElementById("tablaprueba");
                                      var rowCount = table.rows.length;
                                      //console.log(rowCount);
                                      
                                      if(rowCount <= 1)
                                        alert('No se puede eliminar el encabezado');
                                      else
                                        table.deleteRow(rowCount -1);
                                    }
                                    </script>

                                    <div class="row">
                                    <table class="table table-bordered table-hover" id="tablaprueba">   
                                        <tr>
                                            <th>Nombre del Ingrediente</th>
                                            <th>Cantidad</th>

                                        </tr>                           
                                        <tr>
                                            <td><input type="text" name="ingredientes[]" class="form-control" autocomplete="off" required></td>            
                                            <td><input type="number" name="cantidad[]" class="form-control quantity" autocomplete="off" required></td>
                                        </tr>                       
                                    </table>

                                    <div class="form-group">
                                      <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">Agregar Fila</button>
                                      <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Fila</button>
                                    </div>
                                  </div>
                            </div>
                            
                                <textarea name="elaboracion" placeholder="Introduce la elaboración" style="width: 100%;" required></textarea>
                                    <br></br>
                            <div class="form-group">
                                <input name="archivo" class="form-control" id="archivo" type="file" required style="border-radius: 25px;"/>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button class="btn btn-google btn-user btn-block" name="subir" type="submit">Crear Receta</button>

                                </div>
                            </div>
                        </form>
                        <hr>
                        <?php
                        session_start();
                        if(isset($_SESSION['insertado_receta'])){
                            echo'<script>alert("Se ha guardado la receta correctamente")</script>';
                            unset($_SESSION['insertado_receta']);
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