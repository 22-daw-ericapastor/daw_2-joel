<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>MVC</title>
</head>
<body>
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
<h1>Introducir Participantes</h1>
<form method="POST" action="../controllers/participantes.php">
<div>
    <table id="tablaprueba">   
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
        <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">Agregar Fila</button>
        <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Fila</button>
        </div>
         </div>
        </div>
        <div>
        <button class="btn btn-google btn-user btn-block" name="subir" type="submit">Enviar Participantes</button>
        </div>
    </form>
</body>
</html>