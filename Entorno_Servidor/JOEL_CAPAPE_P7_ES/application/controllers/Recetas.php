<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recetas extends CI_Controller {

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
	 
	 		--VISUALIZAR RECETAS TRADICIONALES--
	 
	 
	 */

    public function recetas_tradicionales(){
        
		$this->load->model('RecetasModel');
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url('Recetas/'.$this->uri->segment(2));
		$config['total_rows'] = count($this->RecetasModel->get_data('recetas'));
		$config['per_page'] = 3;
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
		$data['LISTDATA'] = $this->RecetasModel->selectdatainlimit($config['per_page'],$this->uri->segment(3),'recetas');
		$this->load->view('recetas-tradicionales', $data);



        
            

     
    }

	/*
	 
	 		--VISUALIZAR RECETAS SLOW COOK--
	 
	 
	 */
	public function recetas_slow(){
        
		$this->load->model('RecetasModel');
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url('Recetas/'.$this->uri->segment(2));
		$config['total_rows'] = count($this->RecetasModel->get_data2('recetas'));
		$config['per_page'] = 3;
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
		$data['LISTDATA'] = $this->RecetasModel->selectdatainlimit2($config['per_page'],$this->uri->segment(3),'recetas');
		$this->load->view('recetas-slow', $data);



        
            

     
    }

	/*
	 
	 		--VISUALIZAR RECETAS FREIDORA DE AIRE--
	 
	 
	 */
	public function recetas_freidora(){
        
		$this->load->model('RecetasModel');
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url('Recetas/'.$this->uri->segment(2));
		$config['total_rows'] = count($this->RecetasModel->get_data3('recetas'));
		$config['per_page'] = 3;
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
		$data['LISTDATA'] = $this->RecetasModel->selectdatainlimit3($config['per_page'],$this->uri->segment(3),'recetas');
		$this->load->view('recetas-freidora', $data);



        
            

     
    }
	

	/*
	

		--MOSTRAR RECETA--
	
	
	*/
	
	public function mostrar_receta(){
			$id_receta = $this->input->post('idreceta');
			$this->load->model('RecetasModel');
		
		if($this->RecetasModel->mostrar_receta($id_receta)){

			$ingredientes = $this->RecetasModel->mostrar_ingredientes();

			$this->session->set_userdata('ingredientes', $ingredientes);
			
			$comentarios = $this->RecetasModel->todos_comentarios($id_receta);

			$this->session->set_userdata('comentario',$comentarios);
			
			$this->load->view('recetas-info');

		}else{
			return false;
		}
	}

	/*
	
		--CREAR COMENTARIO--
	
	
	*/
	public function crear_comentario(){
		if(!empty($this->session->userdata('nick'))){

			if(!empty($this->input->post('puntuacion')) && !empty($this->input->post('mensaje_com'))){
				$id_usuario = $this->session->userdata('id');
				$usuario=$this->session->userdata('nick');
				$puntuacion=$this->input->post('puntuacion');
				$comentario=$this->input->post('mensaje_com');
				$id_receta = $this->session->userdata('id_receta');
				$this->load->model('RecetasModel');
				if($this->RecetasModel->crear_comentario($id_usuario,$usuario,$puntuacion,$comentario,$id_receta)){
					$comentarios = $this->RecetasModel->todos_comentarios($id_receta);
					$this->session->set_userdata('comentario',$comentarios);
					$this->load->view('recetas-info');
				}
				
			}else{
				$this->load->view('inicio');
			}

		}else{
			$this->load->view('inicio');
		}
	}

}