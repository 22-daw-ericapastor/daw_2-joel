<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function login() {

        //Se obtienen los parametros introducidos por POST
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $this->load->model('UserModel');
        //Se comprueba si los datos de login son correctos
        if ($user && $pass && $this->UserModel->validate_user($user, $pass)) {
            $data['texto'] = "esto es un mensaje";
            $this->load->view('index', $data);

            //$this->load->view('index',$info_candidato);
        }
        //$this->load->view('login');
    }

    public function registro() {
        $this->load->view('registro');
    }

    
    
    
    public function registrar() {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        
        $this->load->model('UserModel');
        if ($this->UserModel->add_user($user, $pass)){
            $data['texto'] = "EXITO";
            $this->load->view('login', $data);
        }
    }

    
    
    public function modificar() {
        if ($this->input->post('update')) {
            $user = $this->input->post('nombre');
            $pass = $this->input->post('contrasena');
            $this->update($user, $pass);
        }

        if ($this->input->post('delete')) {
            $user = $this->input->post('nombre');
            $this->delete($user);
        }

        if ($this->input->post('cerrar')) {
            $this->logout();
        }
    }

    
    
    public function logout() {
        $this->session->sess_destroy();
        $this->load->view('login');
    }

    
    
    public function update($nombre, $pass) {
        $this->load->model('UserModel');
        if ($this->UserModel->update_user($nombre, $pass)) {
            $this->UserModel->validate_user($nombre, $pass);
            $this->load->view('index');
        }
    }

    
    
    public function delete($nombre) {
        $this->load->model('UserModel');
        if ($this->UserModel->delete_user($nombre))
            $this->load->view('login');
    }

}
