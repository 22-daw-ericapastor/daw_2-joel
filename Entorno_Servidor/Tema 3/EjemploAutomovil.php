<?php
// Definimos la clase automovil
class automovil {
	public $variable_publica = 'Pública';
	protected $variable_protegida = 'Protegida';
	private $variable_privada = 'Privada';

	function imprimir_variables(){
		echo $this->variable_publica;
		echo $this->variable_protegida;
		echo $this->variable_privada;
	}
}

$objeto = new automovil();
// Se muestra la variable pública
echo $objeto->variable_publica;
// PHP muestra un error porque no se puede mostrar una variable protegida
echo $objeto->variable_protegida;
// PHP muestra un error porque no se puede mostrar una variable privada
echo $objeto->variable_privada;
// PHP muestra las 3 variables
$objeto->imprimir_variables();