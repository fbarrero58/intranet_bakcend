<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_model extends CI_Model {

    public function __construct(){
        $this->load->database();
	}

	public function insertar_solicitud($data){
		$data_insertar = array(
            'id_usuario_solicitante' => $data['id_usuario_solicitante'],
            'id_usuario_aprobador' => $data['id_usuario_aprobador'],
            'tipo_solicitud' => $data['tipo_solicitud'],
            'estado' => $data['estado'],
           'fecha_solicitud' => date('Y-m-d')
		);
		
		$this->db->insert('solicitudes', $data_insertar);
		$id_solicitud= $this->db->insert_id(); 
		$this->db->reset_query();  
		
		//permisos
		$data_insertar = array(
            'id_solicitud' => $id_solicitud,
            'fecha' => $data['fecha'],
            'horas' => $data['horas'],
            'descripcion' => $data['descripcion'],
			'remunerado' => $data['remunerado']
		);

		 $this->db->insert('permisos', $data_insertar);
		
        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Permiso creado exitosamente'
		);

		return $respuesta;
		
	}
		
}
