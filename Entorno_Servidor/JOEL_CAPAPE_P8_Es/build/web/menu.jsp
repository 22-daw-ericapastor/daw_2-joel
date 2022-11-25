<%-- 
    Document   : prueba
    Created on : 14-feb-2022, 16:38:47
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
        <h1>Perfil Hostal Tía Pepa de <% 
            HttpSession sesion = request.getSession(true);
            
            out.print(sesion.getAttribute("usuario"));
            %></h1>
        <br>
        <a href="modificar.jsp">Cambiar Contraseña</a>
        <a href="cambiarDatos.jsp">Modificar Datos</a>
        <form method="POST" action="Listar">
            <input type="submit" value="Listar Clientes" />
        </form>
        <a href="eliminar.jsp">Eliminar Cuenta</a>
        <form method="POST" action="Cerrar">
            <input type="submit" value="Cerrar Sesion" />
        </form>
    </body>
</html>
