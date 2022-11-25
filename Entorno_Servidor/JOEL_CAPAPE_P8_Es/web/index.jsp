<%-- 
    Document   : index
    Created on : 11-feb-2022, 16:57:20
    Author     : user
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!doctype html>
<html>

<head>
    <meta chatset="UTF-8">
    <style>
       @import 'css/estilos.css';
    </style>
</head>

<body>
    <div>
        <h1>Hostal Tía Pepa</h1>
    </div>
    
    <form action="ComprobarLogin" method="POST">
        <div id="login-box">
        
            <h1>Login</h1>

            <div class="form">
                <div class="item">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <input type="text" placeholder="username" name="username">
                </div>

                <div class="item"> <! - parte de la contraseña ->
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <input type="password" placeholder="password" name="password">
                </div>

            </div>
            
            <button type="submit">Login</button>
            <a href="registro.jsp">Registrarse</a>
        </div>
    </form>
</body>

</html>
