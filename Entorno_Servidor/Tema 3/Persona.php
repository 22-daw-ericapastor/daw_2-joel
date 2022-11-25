<?php


class Persona{
	public $nombre;
	public $apellido1;
	public $apellido2;
	public $edad;
	public $nacionalidad;
	
	
	function __construct($nombre, $apellido1, $apellido2, $edad){
		$this->nombre = $nombre;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->edad = $edad;
	}
	
	
	
	public function setNacionalidad($nacion){
		$this->nacionalidad = $nacion;
	}
	
	public function getNacionalidad(){
		return $this->nacionalidad;
	}
	
	public function getPersona(){
		return $this->nombre." ".$this->apellido1." ".$this->apellido2." de ".$this->edad." años de edad y nacionalidad ".$this->nacionalidad;
	}
}


$eustaquio = new Persona("Eustaquio","Porfirio","Illaestondo",79);
echo $eustaquio->getPersona();
echo "<br>";
$eustaquio->setNacionalidad("Española");
echo $eustaquio->getNacionalidad();


?>