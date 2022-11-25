<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

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



	 /*
	 
	 		--VISTA LOGIN--
	 
	 
	 */

    public function login(){
        $this->load->view('login-admin');
    }

    /*
    
        --BODY ADMIN
    
    
    */

    public function inicio_admin(){
        $this->load->view('body-admin');
    }

    /*
    
    
        -- VISTA ELIMINAR USUARIO--
    
    
    */

    public function eliminarUsuario(){
        $this->load->view('eli_usuario_admin');
    }

	/*
	
	
		-- VISTA CREAR ADMIN--
	
	
	*/
	public function crearAdmin(){
		$this->load->view('crear_administrador');
	}

	/*
	
		--COMPROBAR LOGIN--
	
	*/

    public function checkloginadmin(){
        if(!empty($this->input->post('nombre')) && !empty($this->input->post('contrasena'))){
            $user = $this->input->post('nombre');
            $pass = $this->input->post('contrasena');

            $this->load->model('AdminModel');
            //Se comprueba si los datos de login son correctos
            if ($user && $pass && $this->AdminModel->validar_admin($user, $pass)) {

                $this->load->view('body-admin');
    
            }else{
				
				echo"<script>alert('Error contraseña o usuario')</script>";
                $this->load->view('login-admin');
            }

        }else{
			//poner algo personalizado si alquien quiere acceder directamente al controlador
			$this->load->view('login-admin');
		}
    }

    /*
    
    
    -- LISTAR USUARIOS--
    
    
    */

    public function listar_usuarios(){
        
		$this->load->model('AdminModel');
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url('Administrador/'.$this->uri->segment(2));
		$config['total_rows'] = count($this->AdminModel->get_usuarios('usuarios'));
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_link'] = FALSE;
		$config['first_link'] = FALSE;
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);

		$data['links'] = $this->pagination->create_links();
		$data['LISTDATA'] = $this->AdminModel->select_usuarios($config['per_page'],$this->uri->segment(3),'usuarios');
		$this->load->view('eli_usuario_admin', $data);

     
    }

	/*
	
	
	
		--ELIMINAR USUARIOS--
	
	
	
	*/

	public function eliminar_usuarioAdmin(){
		if(!empty($this->input->post('nick'))){

			$user = $this->input->post('nick');
			$this->load->model('AdminModel');

			if($this->AdminModel->eliminar_usuarios($user)){
				$this->load->model('AdminModel');
				$this->load->library('pagination');
				$config = array();
				$config['base_url'] = site_url('Administrador/'.$this->uri->segment(2));
				$config['total_rows'] = count($this->AdminModel->get_usuarios('usuarios'));
				$config['per_page'] = 5;
				$config['uri_segment'] = 3;
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['last_link'] = FALSE;
				$config['first_link'] = FALSE;
				$config['next_link'] = '>';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '<';
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				$this->pagination->initialize($config);

				$data['links'] = $this->pagination->create_links();
				$data['LISTDATA'] = $this->AdminModel->select_usuarios($config['per_page'],$this->uri->segment(3),'usuarios');
				$this->load->view('eli_usuario_admin', $data);
			}else{
				$this->load->view('body-admin');
			}

		}else{
			//poner algo personalizado si alquien quiere acceder directamente al controlador
			$this->load->view('login-admin');
		}
			
	}
	/*
	
	
	
		--CREAR ADMIN--
	
	
	
	*/

	public function registroAdmin(){
		if(!empty($this->input->post('usuario_admin')) && !empty($this->input->post('contrasena'))){
            $user_admin = $this->input->post('usuario_admin');
            $pass_admin = $this->input->post('contrasena');
			$telefono = $this->input->post('telefono');
			$persona_contacto = $this->input->post('persona');
			$this->load->model('AdminModel');
			if($this->AdminModel->registro_admin($user_admin,$pass_admin,$telefono,$persona_contacto)){
				$this->load->view('login-admin');
				
			}else{
				echo"<script>alert('El admin ya existe')</script>";
				$this->load->view('crear_administrador');
			}

        }else{
			$this->load->view('login-admin');
		}
	}

    /*
    
    
        --CERRAR SESION--
    
    
    */

	public function cerrar() {
        $this->session->sess_destroy();
        header('Location:'.base_url().'index.php/Administrador/login');
    }
}