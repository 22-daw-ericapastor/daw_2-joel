<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UsuarioModel extends CI_Model {

    /*
    
        --LOGIN--
    
    */

    public function validate_user($user, $pass) {

        //cuando se carga la libreria se puede poner la primera en mayus o minus, para usarla se pone en minus
           $this->load->library('Cifrado');
           $nombre_cifrado = $this->cifrado->cifra($user);

        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('nick', $nombre_cifrado);
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
    
        --REGISTRO--
    
    
    */

    public function registro($user, $pass, $nombre, $apellido1, $apellido2, $correo, $edad, $telefono){
        $this->load->library('Cifrado');
        $nick_cif = $this->cifrado->cifra($user);
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('nick', $nick_cif);

        $resultado = $this->db->get();

        $array = $resultado->result_array();



        //si existe el usuario no lo crea
        if(count($array) == 1){
        
            if($array[0]['nick'] == $nick_cif){
                $this->session->set_userdata('nick_repetido', 1);
                $this->load->view('registro');
            }
            

        }else{
            
            $usuario_cifrado = $this->cifrado->cifra($user);
            $nombre_cifrado = $this->cifrado->cifra($nombre);
            $apellido1_cifrado = $this->cifrado->cifra($apellido1);
            $apellido2_cifrado = $this->cifrado->cifra($apellido2);
            $correo_cifrado = $this->cifrado->cifra($correo);
            $edad_cifrado = $this->cifrado->cifra($edad);
            $telefono_cifrado = $this->cifrado->cifra($telefono);
            $pass_hash = $this->cifrado->hasea($pass);
            $data = array(
                'nick' => $usuario_cifrado,
                'contrasena' => $pass_hash,
                'nombre' => $nombre_cifrado,
                'apellido1' => $apellido1_cifrado,
                'apellido2' => $apellido2_cifrado,
                'correo' => $correo_cifrado,
                'edad' => $edad_cifrado,
                'telefono' => $telefono_cifrado
            );
            if($this->db->insert('usuarios', $data)){
                return true;
            }else{
                return false;
            }
        }


        
    }

    /*
    
    
        --ELIMINAR CUENTA--
    
    */

    public function eliminar($user, $pass){
        $this->load->database('pdo');
        $this->load->library('Cifrado');
        $nombre_cifrado = $this->cifrado->cifra($user);
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('nick', $nombre_cifrado);
        $resultado = $this->db->get();

        $array = $resultado->result_array();
        print_r($array);
        if ($array[0]['nick'] === $nombre_cifrado) {
            if($this->cifrado->validahash($array[0]['contrasena'],$pass)){
                $this->db->where('nick', $nombre_cifrado);
                if ($this->db->delete("usuarios")){ 
                    return true;
                }else {
                    return false;
                }
 
            }
        }
    }

    /*
    
        --CAMBIAR CONTRASENA--


    */ 

    public function cambiar($user, $pass_A, $pass_N, $pass_R){

        $this->load->database('pdo');
        $this->load->library('Cifrado');
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('nick', $user);
        $resultado = $this->db->get();
        $contrasena_nueva = $this->cifrado->hasea($pass_N);

        $array = $resultado->result_array();

        
        if($array[0]['nick'] == $user && $this->cifrado->validahash($array[0]['contrasena'],$pass_A)){

            if($this->cifrado->validahash($contrasena_nueva,$pass_R)){
                //despues de validad el hash de la contraseña nueva con la contraseña repetida hacemos el update
                //haseamos la contrasena pass_R
                $contrasena_nuevaH = $this->cifrado->hasea($pass_R);
                $this->db->set('contrasena', $contrasena_nuevaH);
                $this->db->where('nick', $user);
                if($this->db->update('usuarios')){
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }
            
        }else{
            return false;
        }

    }

    /*
    
    
        --ACTUALIZAR DATOS--
    
    
    */

    public function actualizaDatos($user,$nombre_nuevo,$apellido1_nuevo,$apellido2_nuevo,$correo_nuevo,$edad_nuevo,$telefono_nuevo){
       $this->load->database('pdo');
       $this->load->library('Cifrado');
       $nombre = $this->cifrado->cifra($nombre_nuevo);
       $apellido1 = $this->cifrado->cifra($apellido1_nuevo);
       $apellido2 = $this->cifrado->cifra($apellido2_nuevo);
       $correo = $this->cifrado->cifra($correo_nuevo);
       $edad = $this->cifrado->cifra($edad_nuevo);
       $telefono = $this->cifrado->cifra($telefono_nuevo);

       $this->db->set('nombre', $nombre);
       $this->db->set('apellido1', $apellido1);
       $this->db->set('apellido2', $apellido2);
       $this->db->set('correo', $correo);
       $this->db->set('edad', $edad);
       $this->db->set('telefono', $telefono);
       $this->db->where('nick' , $user);

       if($this->db->update('usuarios')){
           $this ->session->set_userdata(array(
               'nombre' => $nombre,
               'apellido1' => $apellido1,
               'apellido2' => $apellido2,
               'correo' => $correo,
               'edad' => $edad,
               'telefono' => $telefono
           )
           );
           return true;
       }else{
           return false;
       }


    }

    

    /*
    
        --SESSION
    
    */
    public function set_session($usuario) {


        $this->session->set_userdata(array(
            'id' => $usuario['id'],
            'nick' => $usuario['nick'],
            'nombre' => $usuario['nombre'],
            'apellido1' => $usuario['nombre'],
            'apellido2' => $usuario['nombre'],
            'correo' => $usuario['correo'],
            'edad' => $usuario['edad'],
            'telefono' => $usuario['telefono'],
            'isLoggedIn' => true
                )
        );
    }




}
