<%-- 
    Document   : cambiarDatos
    Created on : 19-feb-2022, 12:26:46
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
        <h1>Cambiar Datos del Perfil</h1>
        <div class="form">
            <form action="ModificarDatos" method="POST">
                <div class="item">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <input type="hidden" placeholder="username" name="username" value="<%
                           HttpSession sesion = request.getSession(true);
                           out.print(sesion.getAttribute("usuario"));
                           %>">
                </div>

                <div class="item"> <! - apellido1 ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="text" placeholder="Primer Apellido" name="ape1" value="<%out.print(sesion.getAttribute("apellido1"));%>">
                </div>
                
                <div class="item"> <! - apellido2 ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="text" placeholder="Segundo Apellido" name="ape2" value="<%out.print(sesion.getAttribute("apellido2"));%>">
                </div>
                <button type="submit">Cambiar Datos</button>
            </form>
            </div>
    </body>
</html>
