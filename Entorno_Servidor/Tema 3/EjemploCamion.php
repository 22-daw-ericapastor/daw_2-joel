<?php

class vehiculo {
	// Propiedades.
	public $velocidad, $color, $gama;
	// Constructor: asignación de velocidad inicial,
	// color y gama.
	function __construct(){
		$this->velocidad = 0;
		$this->color = "blanco";
		$this->gama = "alta";
	}
	// Método acelerar. El vehículo va más rápido.
	function acelerar($velo){
		$this->velocidad=$velo;
	}
	// Método frenar. El vehículo va más lento
	// hasta frenar.
	function frenar($velo){
		if ($this->velocidad > 0){
			$this->velocidad=$velo;
		}
	}
}

class camion extends vehiculo {
	// Propiedades: añadimos una nueva propiedad.
	public $peso_max;
	function __construct() {
		// Es necesario invocar el constructor de la clase padre ya
		// que PHP no lo hace automáticamente
		parent::__construct()
		$this->peso_max=1000;
	}
	function ver_datos(){
		echo "Los datos del camión son: <BR>"."velocidad: <b>". $this->velocidad . "</b><BR>"
		"color: <b>". $this->color . "</b><BR>" "gama: <b>". $this->gama . "</b><BR>" 
		"peso máx: <b>". $this->peso_max . "</b><BR>";
	}
}


$el_camion = new camion();
$el_camion->ver_datos();
?>