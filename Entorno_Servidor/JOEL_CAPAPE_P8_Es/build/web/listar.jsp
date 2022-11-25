<%-- 
    Document   : listar
    Created on : 09-abr-2019, 16:45:05
    Author     : user
--%>

<%@page import="Clases.Usuario"%>
<%@page import="java.util.Iterator"%>
<%@page import="java.util.ArrayList"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Lista de Clientes</h1>
        
        
        <%
         HttpSession sesion = request.getSession(true);
        
        //Se obtiene la lista de usuarios de los datos de la sesion
        ArrayList listaUsuarios = (ArrayList) sesion.getAttribute("lista");
        
        //Se recorre la lista para mostrarla
        
        for( int i = 0 ; i < listaUsuarios.size() ; i++ ){
            
            Usuario u =  (Usuario) listaUsuarios.get( i );
            out.println(u.getNombre()+" => "+u.getApellido1()+" => "+u.getApellido2()+" => "+u.getContrasena());
            out.println("<br><br>");
        }
        
       
        
        %>
    </body>
</html>
