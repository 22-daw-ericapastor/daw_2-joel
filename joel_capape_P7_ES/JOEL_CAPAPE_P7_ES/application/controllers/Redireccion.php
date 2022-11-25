<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redireccion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//para cargar la libreria puedes llamarla con la primera letra en mayuscula o minuscula
		//le da igual
		//para usarla siempre hay que cargar la libreria con el nombre en minuscula
        $this->load->view('inicio');    
		//$this->load->library('Cifrado');

		

	}
    public function login(){
        $this->load->view('login');
    }
	public function registro(){
		$this->load->view('registro');
	}
	public function eliminar(){
		$this->load->view('eliminar_cuenta');
	}
	public function cambiar_contrasena(){
		$this->load->view('cambiar_contrasena');
	}
	public function actualizar_datos(){
		$this->load->view('gestionar_perfil');
	}

}