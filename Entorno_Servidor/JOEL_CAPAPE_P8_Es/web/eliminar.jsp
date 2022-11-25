<%-- 
    Document   : eliminar
    Created on : 14-feb-2022, 19:43:12
    Author     : user
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Eliminar Cuenta</h1>
        <div class="form">
            <form action="eliminarUsuario" method="POST">
                <div class="item">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <input type="hidden" placeholder="Introduce la contraseña" name="username" value="<%
                           HttpSession sesion = request.getSession(true);
                           out.print(sesion.getAttribute("usuario"));
                           %>">
                </div>

                <div class="item"> <! - apellido1 ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" placeholder="Introduce la Contraseña" name="contra1">
                </div>
                
                <div class="item"> <! - apellido2 ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" placeholder="Repite la contraseña" name="contra2">
                </div>
                <button type="submit">Eliminar Cuenta</button>
            </form>
            </div>
    </body>
</html>
