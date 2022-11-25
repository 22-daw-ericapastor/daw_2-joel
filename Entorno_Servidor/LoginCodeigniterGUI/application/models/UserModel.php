<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function validate_user($user, $pass) {


        //Mirar configuracion BD en application>config>database.php
        //Se indica la tabla en la que se va a realizar la consulta

        $this->db->select('*');
        $this->db->from('Usuario');
        $this->db->where('Nombre', $user);
        $this->db->where('Contrasena', $pass);
        $resultado = $this->db->get();

        $array = $resultado->result_array();

        if (count($array) == 1) {
            $this->set_session($array[0]);
            return true;
        }

        //Como se obtendrían los datos del usuario

        /*
          $usuario = $array[0];

          echo $usuario['Nombre'];
          echo $usuario['Contrasena'];
         */
    }

    public function set_session($usuario) {


        $this->session->set_userdata(array(
            'id' => 1,
            'usuario' => $usuario['Nombre'],
            'contrasena' => $usuario['Contrasena'],
            'isLoggedIn' => true
                )
        );
    }

    public function update_user($nombre, $pass) {


        $this->db->set('Contrasena', $pass);
        $this->db->where('Nombre', $nombre);

        if ($this->db->update('Usuario'))
            return true;
        else
            return false;
    }

    public function delete_user($nombre) {
        $this->db->where("Nombre", $nombre);
        if ($this->db->delete("Usuario"))
            return true;
        else {
            return false;
        }
    }

    public function add_user($user, $pass) {
        $data = array(
            'Nombre' => $user,
            'Contrasena' => $pass
        );

        if ($this->db->insert('Usuario', $data))
            return true;
        else
            return false;
    }

}
