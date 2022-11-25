<html><head>
        <meta charset="UTF-8">
        <title>Hostal de la tía Pepa</title>
    </head>
    <body>
        
        <h1> Hostal de la tía Pepa</h1>
        
        <?php
        
        
        session_start();
        
        
        
        
//        $res = $_SESSION['lista'];
//        
//        
//        
//        $myStart=0;
//        for($i=$myStart;$i<$myStart+15;$i++)
//        {
//            echo $row['index_you_want']."<br>";
//        }



        $result = $_SESSION['lista'];
        
//         while ($registro = mysql_fetch_array($result)){ 
//             echo $registro[0];
//             echo $registro['Nombre'];
//             echo $registro['Contrasena'];
//         }

        
        $lista = $_SESSION['lista'];
        //print_r($lista);
foreach($lista as $p):	
    echo "Nombre => ";        
    echo $p['nombre'];
    echo "      Contraseña => ";
    echo $p['contrasena'];
    echo "<br>";
            
endforeach;
        
        
        



        


//        $result = $_SESSION['lista'];
//        
//        
//        for ($i = 0; $i < count($result); $i++){
//            echo $result[i]->Nombre;
//            echo $result[i]->Contrasena;
//            //echo $result[Nombre];
//            //echo $result[Contrasena];
//        }



        
        
        
        
        ?>
        
            
        
            
            

</body></html>
