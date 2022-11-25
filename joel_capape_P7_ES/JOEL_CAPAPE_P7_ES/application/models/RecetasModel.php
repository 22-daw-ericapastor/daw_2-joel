<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RecetasModel extends CI_Model {

    /*
    
        --RECETAS TRADICIONALES--
    
    */

    public function get_data($table){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tipo_receta','Receta Tradicional');
        $data = $this->db->get();
        return $data->result();
    }

    public function selectdatainlimit($limit, $start, $table){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tipo_receta','Receta Tradicional');
        $this->db->limit($limit, $start);
        $data = $this->db->get();
        return $data->result();
    }

    /*
    
        --RECETAS SLOW COOK--
    
    */
    public function get_data2($table){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tipo_receta','Receta Slow Cook');
        $data = $this->db->get();
        return $data->result();
    }

    public function selectdatainlimit2($limit, $start, $table){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tipo_receta','Receta Slow Cook');
        $this->db->limit($limit, $start);
        $data = $this->db->get();
        return $data->result();
    }

    /*
    
        --RECETAS FREIDORA DE AIRE--
    
    */
    public function get_data3($table){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tipo_receta','Receta Freidora de Aire');
        $data = $this->db->get();
        return $data->result();
    }

    public function selectdatainlimit3($limit, $start, $table){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('tipo_receta','Receta Freidora de Aire');
        $this->db->limit($limit, $start);
        $data = $this->db->get();
        return $data->result();
    }

    /*
    
        --MOSTRAR RECETA--

    
    */

    public function mostrar_receta($id_receta){
        $this->load->database('pdo');
        $this->db->select('id, imagen, titulo, elaboracion, tipo_receta');
        $this->db->from('recetas');
        $this->db->where('id', $id_receta);
        $recetas = $this->db->get();
        $datos_recetas = $recetas->result_array();

        if(count($datos_recetas) >=1){
            $this->session->set_userdata('id_receta', $datos_recetas[0]['id']);
            $this->session->set_userdata('imagen', $datos_recetas[0]['imagen']);
            $this->session->set_userdata('titulo', $datos_recetas[0]['titulo']);
            $this->session->set_userdata('elaboracion', $datos_recetas[0]['elaboracion']);
            $this->session->set_userdata('tipo_receta', $datos_recetas[0]['tipo_receta']);
            return true;
        }else{
            return false;
        }

        


    }
    public function mostrar_ingredientes(){
        $id_receta = $this->session->userdata('id_receta');
        $this->db->select('ingredientes.id_ingrediente, ingredientes.nombre_ingrediente, ingredientes.cantidad');
        $this->db->from('recetas');
        $this->db->join('ingredientes','ingredientes.id_receta=recetas.id');
        $this->db->where('recetas.id', $id_receta);
        $datos_ingredientes = $this->db->get();
        $datos = $datos_ingredientes->result_array();
        return $datos;

    }
    /*
    
    
        --MOSTRAR COMENTARIO--

    
    */
    public function todos_comentarios($id_receta){
        $this->load->database('pdo');
        $this->db->select('*');
        $this->db->from('comentarios_recetas');
        $this->db->where('id_receta',$id_receta);
        $data = $this->db->get();
        return $data->result_array();

    }

    /*
    
    
        --CREAR COMENTARIO--
    
    
    */

    public function crear_comentario($id_usuario,$usuario,$puntuacion,$comentario,$id_receta){
        $this->load->database('pdo');
        $data = array(
            'nombre_usuario' => $usuario,
            'comentario_rec' => $comentario,
            'puntuacion' => $puntuacion,
            'id_usuario' => $id_usuario,
            'id_receta' => $id_receta

        );
        if($this->db->insert('comentarios_recetas', $data)){
            return true;
        }else{
            return false;
        }

    }
    


}
