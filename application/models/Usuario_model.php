<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    /******************************
        Insertar Usuario
    ******************************/
    
    public function insertar($data){
        $arreglo_general = array();  

        $query = $this->db->get_where('login', array('correo' => $data['correo']));
        if($query->num_rows() > 0){
            $respuesta = array(
                'err' => TRUE,
                'mensaje' => 'Este correo ya esta asignado a otro Ususario'
            );
            return $respuesta;
        }
        $this->db->reset_query();  

        $query = $this->db->get_where('usuarios_info_personal', array('correo_personal' => $data['correo_personal']));
        if($query->num_rows() > 0){
            $respuesta = array(
                'err' => TRUE,
                'mensaje' => 'Este correo ya esta asignado a otro Ususario'
            );
            return $respuesta;
        }
        $this->db->reset_query();  

        //ingresar registro a tabla usuario
        $data_insert = array(
            'id_rol' => $data['id_rol'],
            'cargo' => $data['cargo'],
            'fecha_vinculacion' => $data['fecha_vinculacion'],
            'foto' => $data['foto'],
            'perfil_profesional' => $data['perfil_profesional']
        );         
        $this->db->insert('usuario', $data_insert);    
        $id_usuario= $this->db->insert_id();  
        $this->db->reset_query();       

        //insertar registro a tabla login
        //ENCRIPTAR CONTRASEÑA
        $data['password'] = hash('ripemd160',$data['password']);

        $data_insert = array(
            'id_usuario' => $id_usuario,
            'correo' => $data['correo'],
            'password' => $data['password']
        ); 
        $this->db->insert('login', $data_insert);  
        $this->db->reset_query();

        //insertar registro en tabla usuario_info_personal
        $data_insert = array(
            'id_usuario' => $id_usuario,
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'rut' => $data['rut'],
            'correo_personal' => $data['correo_personal'],
            'celular' => $data['celular'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'direccion' => $data['direccion'],
            'pais_origen' => $data['pais_origen'],
            'pais_residencia' => $data['pais_residencia'],
            'pais_residencia' => $data['pais_residencia']
        ); 
        //$this->db->insert('usuarios_info_personal', $data_insert);  

        return $this->db->insert('usuarios_info_personal', $data_insert);         
    }

    /******************************
        Obtener Usuarios
    ******************************/

    public function obtener($id){
        if ($id == null){
            $this->db->select('u.id, u.foto, i.nombres');
            $this->db->from('usuario as u' );
            $this->db->join('usuarios_info_personal as i', 'u.id = i.id_usuario',"left");
        }else{           
            $this->db->select('i.*,l.correo ,u.*');
            $this->db->from('usuario as u' );
            $this->db->join('login as l', 'u.id=l.id_usuario',"left");
            $this->db->join('usuarios_info_personal as i', 'l.id_usuario = i.id_usuario ');
            $this->db->where( array( 'u.id' => $id) );
        }        
        $query = $this->db->get();
        return $query->result();        
    }

     /******************************
        Actualizar usuarios
     ******************************/
/*
    public function actualizar($id){
        //actualizar registro a tabla usuario
        $data_update = array(
            'id_rol' => $data['id_rol'],
            'cargo' => $data['cargo'],
            'fecha_vinculacion' => $data['fecha_vinculacion'],
            'foto' => $data['foto'],
            'perfil_profesional' => $data['perfil_profesional']
        );    
        $this->db->where('id', $id);
        $this->db->update('mytable', $data_update);     
         
        
    }*/


}