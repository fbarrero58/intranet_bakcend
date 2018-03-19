<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asignacion_model extends CI_Model {
    public function __construct(){
        $this->load->database();
	}

	/******************************
        Insertar Asignación
	******************************/

	public function insertar($data){

        $data_insertar = array(
            'id_proyecto' => $data['id_proyecto'],
            'id_usuario' => $data['id_usuario'],
            'id_modulos_usuario' => $data['id_modulos_usuario'],
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_fin' => $data['fecha_fin'],
            'horas' => $data['horas'],
            'tarifa_horas' => $data['tarifa_horas']
        );

        $this->db->insert('asignaciones', $data_insertar);

        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Asignación creada exitosamente'
        );

        return $respuesta;
	}

	/******************************
        Actualizar Asignación
	******************************/

	public function actualizar($id, $data){	
		$data_update = array(
            'id_proyecto' => $data['id_proyecto'],
            'id_usuario' => $data['id_usuario'],
            'id_modulos_usuario' => $data['id_modulos_usuario'],
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_fin' => $data['fecha_fin'],
            'horas' => $data['horas'],
            'tarifa_horas' => $data['tarifa_horas']
        );

		$this->db->set($data_update);
        $this->db->where('id', $id);
		$this->db->update('asignaciones');
		
        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Asignación modificada exitosamente'
		);
		
		return $respuesta;
	}


	 /*******************************
        Traer todas las asignaciones
    *******************************/

    public function todos(){
        $this->db->select("a.id, a.id_proyecto, p.codigo as codigo_proyecto, p.nombre as nombre_proyecto, a.id_usuario,CONCAT(ip.nombres,' ',ip.apellidos)  as nombre_usuario, a.id_modulos_usuario, a.fecha_inicio, a.fecha_fin");
        $this->db->from('asignaciones a');
        $this->db->join('proyectos p', 'a.id_proyecto = p.id');
        $this->db->join('usuario u', 'a.id_usuario = u.id');
        $this->db->join('usuarios_info_personal ip', 'u.id = ip.id_usuario');
        $query = $this->db->get();

        if( $query->num_rows() > 0 ){
            $respuesta = array(
				'err' => FALSE,
				'mensaje' => 'Asignación cargado exitosamente',
                'modulos' => $query->result()
            );
        }else{
            $respuesta = array(
                'err' => FALSE,
                'mensaje' => 'No existen asignaciones'
            );
        }

        return $respuesta;

    }

    /*******************************
        Traer asignación por ID
    *******************************/

    public function por_id($id){
		$this->db->where('a.id_usuario',$id);
        $this->db->select("a.id, a.id_proyecto, p.codigo as codigo_proyecto, p.nombre as nombre_proyecto, a.id_usuario,CONCAT(ip.nombres,' ',ip.apellidos)  as nombre_usuario, a.id_modulos_usuario, a.fecha_inicio, a.fecha_fin, a.horas, a.tarifa_horas");
        $this->db->from('asignaciones a');
        $this->db->join('proyectos p', 'a.id_proyecto = p.id');
        $this->db->join('usuario u', 'a.id_usuario = u.id');
        $this->db->join('usuarios_info_personal ip', 'u.id = ip.id_usuario');
        $query = $this->db->get();

        if( $query->num_rows() > 0 ){
            $respuesta = array(
				'err' => FALSE,
				'mensaje' => 'Asignación cargado exitosamente',
                'modulos' => $query->result()
            );
        }else{
            $respuesta = array(
                'err' => FALSE,
                'mensaje' => 'Este usuario no tiene asignaciones'
            );
        }

        return $respuesta;
	}

	/******************************
       Eliminar Asignación
	******************************/

	public function eliminar($id){
		$this->db->where('id', $id);
		$this->db->delete('asignaciones');
		
        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Asignacion eliminada exitosamente'
		);

		return $respuesta;
	}

	

}
