<html><head>
        <meta charset="UTF-8">
        <title>Hostal de la tía Pepa</title>
    </head>
    <body>
        
        <h1> Hostal de la tía Pepa</h1>
        
        <?php
        
        
        session_start();
        
        
        




        $result = $_SESSION['lista'];
        


        
        $lista = $_SESSION['lista'];

foreach($lista as $p):	
    echo "Nombre => ";        
    echo $p['Nombre'];
    echo "      Contraseña => ";
    echo $p['Contrasena'];
    echo "<br>";
            
endforeach;
        
        
        



        



        
        
        
        
        ?>
        
            
        
            
            

</body></html>
