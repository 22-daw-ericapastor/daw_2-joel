<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
	 
	 		--COMPROBACION DEL LOGIN--
	 
	 
	 */
	public function checklogin(){



        if(!empty($this->input->post('nick')) && !empty($this->input->post('contrasena'))){
            $user = $this->input->post('nick');
            $pass = $this->input->post('contrasena');

            $this->load->model('UsuarioModel');
            //Se comprueba si los datos de login son correctos
            if ($user && $pass && $this->UsuarioModel->validate_user($user, $pass)) {

                $this->load->view('inicio');
    
            }else{
				echo"<script>alert('Error contraseña o usuario')</script>";
                $this->load->view('login');
            }

        }else{
			$this->load->view('inicio');
		}




        
    }

	/*
	
		--REGISTRO--
	
	
	*/

	public function registro(){

		if(!empty($this->input->post('nick')) && !empty($this->input->post('contrasena'))){
            $user = $this->input->post('nick');
            $pass = $this->input->post('contrasena');
			$nombre = $this->input->post('nombre');
			$apellido1 = $this->input->post('apellido1');
			$apellido2 = $this->input->post('apellido2');
			$correo = $this->input->post('correo');
			$edad = $this->input->post('edad');
			$telefono = $this->input->post('telefono');

			$this->load->model('UsuarioModel');
			if($this->UsuarioModel->registro($user,$pass,$nombre,$apellido1,$apellido2,$correo,$edad,$telefono)){
				$this->load->view('login');
				
			}else{
				echo"<script>alert('El nick ya existe')</script>";
				$this->load->view('registro');
			}

        }else{
			$this->load->view('inicio');
		}

	}

	/*
	
		--ELIMINAR CUENTA--
	
	
	*/
	public function eliminar_cuenta(){
		if(!empty($this->input->post('nick')) && !empty($this->input->post('contrasena'))){

			$user = $this->input->post('nick');
            $pass = $this->input->post('contrasena');

			$this->load->model('UsuarioModel');

			if($this->UsuarioModel->eliminar($user, $pass)){

				$this->cerrar();
			}else{
				$this->load->view('eliminar_cuenta');
			}

		}else{
			$this->load->view('inicio');
		}
			
	}
	/*
	
	
		--CAMBIAR CONTRASEÑA--
	
	
	*/

	public function cambiar_contrasena(){

		if(!empty($this->session->userdata('nick')) && !empty($this->input->post('contrasena_A')) && !empty($this->input->post('contrasena_N')) && !empty($this->input->post('contrasena_R'))){

			$user = $this->session->userdata('nick');
            $pass_A = $this->input->post('contrasena_A');
			$pass_N = $this->input->post('contrasena_N');
			$pass_R = $this->input->post('contrasena_R');

			$this->load->model('UsuarioModel');
			
			if($this->UsuarioModel->cambiar($user, $pass_A, $pass_N, $pass_R)){
				echo"<script>alert('Contraseña cambiada')</script>";
				$this->load->view('inicio');
			}else{
				$this->load->view('cambiar_contrasena');
			}


			

		}else{
			$this->load->view('inicio');
		}


	}

	/*
	
	
		--GESTIONAR PERFIL
	
	
	*/

	public function cambiar_datos(){
		if(!empty($this->input->post('nombre')) && !empty($this->input->post('apellido1')) && !empty($this->input->post('apellido2')) && !empty($this->input->post('correo')) && !empty($this->input->post('edad')) && !empty($this->input->post('telefono'))){

			$user = $this->session->userdata('nick');
			$nombre_nuevo = $this->input->post('nombre');
			$apellido1_nuevo = $this->input->post('apellido1');
			$apellido2_nuevo = $this->input->post('apellido2');
			$correo_nuevo = $this->input->post('correo');
			$edad_nuevo = $this->input->post('edad');
			$telefono_nuevo = $this->input->post('telefono');

			$this->load->model('UsuarioModel');

			if($this->UsuarioModel->actualizaDatos($user,$nombre_nuevo,$apellido1_nuevo,$apellido2_nuevo,$correo_nuevo,$edad_nuevo,$telefono_nuevo)){
				$this->load->view('gestionar_perfil');
			}else{
				$this->load->view('inicio');
			}

		}else{
			$this->load->view('inicio');
		}
	}


	/*
	
		--CERRAR SESION--
	
	*/

	public function cerrar() {
        $this->session->sess_destroy();
        header('Location:'.base_url());
    }
}