    
        <!-- Tablas de multiplicar-->
        <section class="page-section portfolio" id="tablas">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tablas de Multiplicar</h2>
                <!-- Tabla de multiplicar icono-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                <?php 

                /*Tabla de multiplicar -> tabla creada de manera dinámica. */

                    echo "<table class ='table table-striped table-bordered table-hover' text-align:center;>";
                    echo "<tr>";
                        for ($tabla=1; $tabla<=10  ; $tabla++) { 
                            echo "<td class ='table-primary lead' style='text-align: center;'>Tabla del $tabla </td>";
                        }

                        echo "</tr>";
                        echo "<tr>";

                    for ($i=0; $i <=10 ; $i++) { 
                    for ($j=1; $j <=10 ; $j++) { 
                        echo "<td class='lead' style='text-align: center;'>$j X $i = ".($j *$i);
                        echo "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";

                    ?>
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="medidas">
            <div class="container">
                <!-- Encabezado de la seccion-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Medidas de Longitud</h2>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <br>
                <!-- Contenido-->
                <div class="row">
                <div class="row justify-content-center">

                <table class="table table-striped table-bordered table-hover' text-align:center;" style="width:50%">
                        <thead>
                            <tr>
                            <th scope="col" class="lead" style="text-align: center;">Metros</th>
                            <th scope="col" class="lead" style="text-align: center;">Millas</th>
                            <th scope="col" class="lead" style="text-align: center;">Pies</th>
                            <th scope="col" class="lead" style="text-align: center;">Millas Nauticas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            /*Medidas de longitud -> en una tabla sacar 5 números aleatorios (1,100), que 
                            representarán metros. Convertir a millas, pies, millas náuticas */
                            for($i=0;$i<=4;$i++){

                                $numeros[] = mt_rand(1,100);
                            
                            }
                            $html_cambios='';
                            foreach($numeros as $valor){
                                $html_cambios.='<tr>';
                                $html_cambios.='<td class="lead" style="text-align: center;">'.$valor.'</td>';
                                $html_cambios.='<td class="lead" style="text-align: center;">'.round(($valor/1609), 3) .'</td>';
                                $html_cambios.='<td class="lead" style="text-align: center;">'.round(($valor*3.28084), 3).'</td>';
                                $html_cambios.='<td class="lead" style="text-align: center;">'.round(($valor/1852),3) .'</td>';
                                $html_cambios.='</tr>';
                            }
                            ?>
                            
                            <?= $html_cambios ?>
                        </tbody>
                        </table>
                
                </div>
                </div>
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="factorial">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Numeros Factoriales</h2>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <br>
                <!-- Contenido-->
                <div class="row justify-content-center">
                    
                    <p class='lead' style='margin-left:82%'>
                    <?php
                    /*Factorial -> de manera dinámica, haz el factorial de los números [1, 10]*/
                    $factorial=1;
                    for($i=1;$i<=10;$i++){
                        $factorial=$factorial*$i;
                        echo("El factorial del número ".$i.' = '.$factorial.'<br>');
                    }
                    
                    ?>
                    </p>
                </div>
            </div>
        </section>