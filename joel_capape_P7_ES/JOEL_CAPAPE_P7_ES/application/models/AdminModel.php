<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminModel extends CI_Model {

    /*
    
        --LOGIN--
    
    */

    public function validar_admin($user, $pass) {

        //cuando se carga la libreria se puede poner la primera en mayus o minus, para usarla se pone en minus
           $this->load->library('Cifrado');
          $nombre_cifrado = $this->cifrado->cifra($user);

        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('nombre', $nombre_cifrado);
        $resultado = $this->db->get();

        $array = $resultado->result_array();

        if (count($array) == 1) {
            if($this->cifrado->validahash($array[0]['contrasena'],$pass)){
            $this->set_session($array[0]);
            return true;
            }else{
                return false;
            }
        }

    }

    /*
    
    
        --LISTAR USUARIOS
    
    
    */

    public function get_usuarios($table){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from($table);
        $data = $this->db->get();
        return $data->result();
    }

    public function select_usuarios($limit, $start, $table){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($limit, $start);
        $data = $this->db->get();
        return $data->result_array();
    }

    /*
    
    
        --ELIMINAR USUARIOS--
    
    
    
    */
    public function eliminar_usuarios($user){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('nick', $user);
        $resultado = $this->db->get();

        $array = $resultado->result_array();
        if ($array[0]['nick'] === $user) {
                $this->db->where('nick', $user);
                if ($this->db->delete("usuarios")){
                    $this->db->where('nombre_usuario', $user);
                    $this->db->delete('comentarios_recetas');
                    return true;
                }else {
                    return false;
                }
 
            
        }
    }

    /*
    
    
        --REGISTRO ADMIN--
    
    
    */

    public function registro_admin($user_admin,$pass_admin,$telefono,$persona_contacto){
        $this->load->library('Cifrado');
        $admin_cifrado = $this->cifrado->cifra($user_admin);
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('nombre', $admin_cifrado);

        $resultado = $this->db->get();

        $array = $resultado->result_array();



        //si existe el usuario no lo crea
        if(count($array) == 1){
        
            if($array[0]['nombre'] == $admin_cifrado){
                $this->load->view('crear_administrador');
            }
            

        }else{
            $persona_cifrado = $this->cifrado->cifra($persona_contacto);
            $telefono_cifrado = $this->cifrado->cifra($telefono);
            $pass_hash = $this->cifrado->hasea($pass_admin);
            $data = array(
                'nombre' => $admin_cifrado,
                'contrasena' => $pass_hash,
                'telefono' => $telefono_cifrado,
                'persona_de_contacto' => $persona_cifrado
            );
            if($this->db->insert('admin', $data)){
                return true;
            }else{
                return false;
            }
        }


        
    }

    /*
    
        --SESSION ADMIN--
    
    */
    public function set_session($admin) {


        $this->session->set_userdata(array(
            'id' => $admin['id_admin'],
            'nombre_admin' => $admin['nombre'],
            'contrasena_admin' => $admin['contrasena'],
            'isLoggedIn' => true
                )
        );
    }


}