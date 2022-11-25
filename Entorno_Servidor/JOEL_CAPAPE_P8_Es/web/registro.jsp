<%-- 
    Document   : registro
    Created on : 19-feb-2022, 18:52:39
    Author     : joelc
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Registro De la Tia Pepa</h1>
        <div class="form">
            <form action="Registro" method="POST">
                <div class="item">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <input type="text" placeholder="Introduce el nombre" name="username">
                </div>

                <div class="item"> <! - apellido1 ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="text" placeholder="Primer Apellido" name="ape1">
                </div>
                
                <div class="item"> <! - apellido2 ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="text" placeholder="Segundo Apellido" name="ape2">
                </div>
                <div class="item"> <! - apellido2 ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" placeholder="Introduce la Contrasena" name="contrasena">
                </div>
                <button type="submit">Registrar</button>
            </form>
            </div>
    </body>
</html>
