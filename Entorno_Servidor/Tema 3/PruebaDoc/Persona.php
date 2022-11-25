<?php

/**
* Clase Persona, que define a una persona en la aplicacion
*
* En la aplicación una persona constará de un nombre, una edad y un sexo.

* @author El mejor profesor del mundo, Vicente Torres
* @copyright La clase Persona está patentada y no puede ser utilizada por nadie del mundo mundial. Pida los derechos para poder utilizar esta clase.
* @param string $nombre Representará el nombre de una persona en la aplicacion
* @param string $edad Representará la edad de una persona en la aplicacion
* @param string $sexo Representará el sexo de una persona en la aplicacion
*
*/
class Persona {
	
	
   public $nombre;
   
   public $edad;

   public $sexo;

   
   
	/**
	* Constructor de la clase Persona. Construye un objeto de la clase Persona.
	*  
	* @param string $nombre nombre de la persona
	* @param string $edad edad de la persona
	*
	*/
   public function __construct($nombre, $edad) {
      $this -> nombre = $nombre;
      $this -> edad = $edad;
   }

   
   
   /**
	* Destructor de la clase Persona. Destruye un objeto de la clase Persona.
	*/
   public function __destruct() {
      echo "Objeto destruido";
   }



   /**
	* Funcion que asigna una edad a un usuario.
	*  
	* @param string $sex sexo de la persona
	*
	*/
   public function setSexo($sex) {
      $this ->sexo = $sex;
   }

	/**
	* Función que retorna el sexo de una persona.
	*  
	* @return string que representa el sexo de una persona
	*
	*/
   public function getSexo() {
      return $this ->sexo;
   }
   
   

   /**
	* Función que muestra un saludo.
	* 
	*/
   public function saludar(){  
      echo "Hola, mundo! soy ".$this -> nombre;
   }
   
}

?>