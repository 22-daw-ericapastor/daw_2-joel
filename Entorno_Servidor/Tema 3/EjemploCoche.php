<?php
class vehiculo {
		
	// Propiedades.
	public $velocidad, $color, $gama;

	// Constructor: asignación de velocidad inicial, color y gama.
	function __construct() {
		$this->velocidad = 0;
		$this->color = "blanco";
		$this->gama = "alta";
	}
	// Método acelerar. El coche va más rápido.
	function acelerar($velo) {
		$this->velocidad=$velo;
	}
	// Método frenar. El coche va más lento
	// hasta frenar.
	function frenar($velo) {
		if ($this->velocidad > 0) {
			$this->velocidad=$velo;
		}
	}
}

$mi_coche = new vehiculo;
echo "Mi coche es de color ".$mi_coche->color."<br><br>";
echo "Su gama es ".$mi_coche->gama.".<br><br>";
echo "Ahora está parado: ".$mi_coche->velocidad."kilómetros.<br><br>";
$mi_coche->acelerar(100);
echo "Mi choche ha acelerado. Ahora avanza a ".$mi_coche->velocidad ." kilómetros por hora.<br><br>";
$mi_coche->frenar(10);
echo "Mi choche ha frenado. Ahora avanza a ".$mi_coche->velocidad ." kilómetros por hora.<br><br>";
?>

