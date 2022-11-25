<?php
/*5.- Realizar un análisis sobre la aleatoriedad de los distintos métodos que hay en PHP para obtener 
números aleatorios (rand() y mt_rand()). Para realizar el estudio se tirará un dado (6 números) 
un número muy grande de veces (1.000.000). El valor teórico que debería de tener es de n/6; 
siendo n el número de veces que se ha tirado el dado. 

Estimar el error que se ha producido en el conjunto de tiradas, y el error medio cometido por 
cada método.*/

/* RAND */
for($i=0;$i<=1000000;$i++){

    $numeros[] = rand(1,6);


}
$valores = array_count_values($numeros);

ksort($valores);

//print_r($valores);


$html_valores_stat='<table border="1">
                    <thead>
                        <tr>
                    <td>Numeros</td>
                    <td>Formula</td>';
//dentro del foreach hacer las dos operaciones
/*Recorremos los datos con un foreach realizamos las operaciones, realizamos las operaciones 
pertinentes y las pintamos dentro de una tabla */
$sum = 0;
$sum_for = 0;
foreach($valores as $valor){
    $sum+=$valor;
    $html_valores_stat.='<tr>';
    $html_valores_stat.='<td>'.$valor.'</td>';
    $html_valores_stat.='<td>'.($error=((((1000000/6)-$valor)/$valor)*100)).'</td>';
    $html_valores_stat.='</tr>';
    $sum_for+=$error;
    //print_r($valor.'<br>');
}
$html_valores_stat.='<tr>';
$html_valores_stat.='<td>'.($med=($sum/6)).'</td>';
$html_valores_stat.='<td>'.($med_for=($sum_for/6)).'</td>';
$html_valores_stat.='</tr>';
$html_valores_stat.='</table>';


?>
<?php
/* MT_RAND */
for($i=0;$i<=1000000;$i++){

    $numeros_mt[] = mt_rand(1,6);

}
$valores_mt = array_count_values($numeros_mt);

ksort($valores_mt);

//print_r($valores);

$html_valores_stat_mt='<table border="1">
                    <thead>
                        <tr>
                    <td>Numeros</td>
                    <td>Formula</td>';
//dentro del foreach hacer las dos operaciones
$sum_mt = 0;
$sum_for_mt = 0;
foreach($valores_mt as $valor_mt){
    $sum_mt +=$valor_mt;
    $html_valores_stat_mt.='<tr>';
    $html_valores_stat_mt.='<td>'.$valor_mt.'</td>';
    $html_valores_stat_mt.='<td>'.($error_mt=((((1000000/6)-$valor_mt)/$valor_mt)*100)).'</td>';
    $html_valores_stat_mt.='</tr>';
    $sum_for_mt+=$error_mt;
    //print_r($valor.'<br>');
}
$html_valores_stat_mt.='<tr>';
$html_valores_stat_mt.='<td>'.($med_mt=($sum_mt/6)).'</td>';
$html_valores_stat_mt.='<td>'.($med_formt=($sum_for_mt/6)).'</td>';
$html_valores_stat_mt.='</tr>';
$html_valores_stat_mt.='</table>';


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
    <div style="display:flex; flex-wrap:wrap; padding: 10px;">
    <div>
    <h3>Estadisticas con RAND</h3>
<?= $html_valores_stat ?>
</div>
<div style=" margin-left:30px;">
    <h3>Estadisticas con MT_RAND</h3>
<?= $html_valores_stat_mt ?>
</div>
</div>
</body>
</html>
