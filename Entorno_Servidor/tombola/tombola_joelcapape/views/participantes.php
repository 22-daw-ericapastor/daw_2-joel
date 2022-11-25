<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Joel Capape Hernandez</title>
        <style type="text/css"><?php include('../css/styles.css');?></style>
    </head>
    <body id="page-top">
    <script type="text/javascript">
    
    function agregarFila(){
  document.getElementById("tablaprueba").insertRow(-1).innerHTML ='<td><input type="text" name="nombre[]" class="form-control" autocomplete="off" width="38%" required></td>'+
  '<td><input type="text" name="apellido1[]" class="form-control quantity" autocomplete="off" required></td>'+'<td><input type="text" name="apellido2[]" class="form-control quantity" autocomplete="off" required></td>';
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
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img class="masthead-avatar mb-1" src="../assets/img/bingo.png" width="90" heidth="99" alt="..." /></a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../index.php">Inicio</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
            <form method="POST" action="../controllers/participantes.php">
    <div>
    <h1>Introducir Participantes</h1>
    <table class="table" id="tablaprueba">   
        <tr>
        <th>Nombre</th>
        <th>Apellido1</th>
        <th>Apellido2</th>
        </tr>                           
        <tr>
        <td><input type="text" name="nombre[]" class="form-control" autocomplete="off" required></td>            
        <td><input type="text" name="apellido1[]" class="form-control quantity" autocomplete="off" required></td>
        <td><input type="text" name="apellido2[]" class="form-control quantity" autocomplete="off" required></td>
        </tr>                       
        </table>
        <div>
        <button type="button" class="btn btn-info mr-2" onclick="agregarFila()">Agregar Fila</button>
        <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Fila</button>
        </div>
         </div>
        </div>
        <div>
        <br>
        <button class="btn btn-info mr-2" name="subir" type="submit">Enviar Participantes</button>
        </div>
        </form>
            </div>
        </header>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
