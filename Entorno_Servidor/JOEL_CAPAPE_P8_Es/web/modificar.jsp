<%-- 
    Document   : modificar
    Created on : 14-feb-2022, 19:43:03
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
        <form action="Modificar2" method="POST">
        <div id="login-box">
        
            <h1>Modificar Contraseña</h1>

            <div class="form">
                <div class="item">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <input type="hidden" placeholder="username" name="username" value="<%
                           HttpSession sesion = request.getSession(true);
                           out.print(sesion.getAttribute("usuario"));
                           %>">
                </div>

                <div class="item"> <! - parte de la contraseña ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" placeholder="Contrasena Vieja" name="password">
                </div>
                
                <div class="item"> <! - parte de la contraseña ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" placeholder="Contrasena Nueva" name="contranueva">
                </div>
                
                <div class="item"> <! - parte de la contraseña ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" placeholder="Repite la contrasena" name="contra2">
                </div>

            </div>
            
            <button type="submit">Modificar</button>
        </div>
    </form>
    </body>
</html>
