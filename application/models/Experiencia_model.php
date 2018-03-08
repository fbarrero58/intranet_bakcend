<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Experiencia_model extends CI_Model {
    public function __construct(){
        $this->load->database();
	}

	/******************************
        Insertar empresa
	******************************/

	public function insertar_empresa($data){
		$data_insertar = array(
            'id_usuario' => $data['id_usuario'],
            'nombre' => $data['nombre'],
			'industria' => $data['industria']
		);

		$this->db->insert('empresas_usuario', $data_insertar);

        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Empresa creada exitosamente'
        );
        return $respuesta;     
	}


	/******************************
        Insertar cargo
	******************************/

	public function insertar_cargo($data){
		$data_insertar = array(
            'id_empresa' => $data['id_empresa'],
            'nombre' => $data['nombre'],
			'fecha_inicio' => $data['fecha_inicio'],
			'fecha_fin' => $data['fecha_fin']
		);
		
		$this->db->insert('cargos_empresa', $data_insertar);

        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Cargo creado exitosamente'
        );

        return $respuesta;     
	}

	/******************************
        Insertar responsabilidad
	******************************/

	public function insertar_responsabilidad($data){
		$data_insertar = array(
            'id_cargo' => $data['id_cargo'],
            'descripcion' => $data['descripcion']
		);
		
		$this->db->insert('responsabilidades_cargo', $data_insertar);

        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Responsabilidad creada exitosamente'
        );

        return $respuesta;     
	}

	/******************************
       Actualizar empresa
	******************************/

	public function actualizar_empresa($id, $data){	
		$data_update = array(
            'id_usuario' => $data['id_usuario'],
            'nombre' => $data['nombre'],
            'industria' => $data['industria']
		);

		$this->db->set($data_update);
        $this->db->where('id', $id);
		$this->db->update('empresas_usuario');
		
        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Empresa modificada exitosamente'
		);
		

		return $respuesta;

		$query = $this->db->get_where('id_usuario', array('correo' => $data['correo']));
        if($query->num_rows() > 0){
            $respuesta = array(
                'err' => TRUE,
                'mensaje' => 'Este correo ya esta asignado a otro Usuario'
            );
            return $respuesta;
		}
		

	}

	/******************************
       Actualizar cargo
	******************************/

	public function actualizar_cargo($id, $data){	
		$data_update = array(
            'id_empresa' => $data['id_empresa'],
            'nombre' => $data['nombre'],
			'fecha_inicio' => $data['fecha_inicio'],
			'fecha_fin' => $data['fecha_fin']
		);

		$this->db->set($data_update);
        $this->db->where('id', $id);
		$this->db->update('cargos_empresa');
		
        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Cargo modificado exitosamente'
		);
		
		return $respuesta;

	}

	/******************************
       Actualizar cargo
	******************************/

	public function actualizar_responsabilidad($id, $data){	
		$data_update = array(
            'id_cargo' => $data['id_cargo'],
            'descripcion' => $data['descripcion']
		);

		$this->db->set($data_update);
        $this->db->where('id', $id);
		$this->db->update('responsabilidades_cargo');
		
        $respuesta = array(
            'err' => FALSE,
            'mensaje' => 'Responsabilidad modificada exitosamente'
		);
		
		return $respuesta;

	}

	/******************************
       Traer experiencia
	******************************/

	public function traer_experiencia($id){
		$this->db->select('*');
		$this->db->from('empresas_usuario');
		$this->db->where(array('id_usuario' => $id));
		$query = $this->db->get();

		//if(!empty($query))
		//{
		$arreglo_empresas = array();
		$arreglo_cargos = array();

		foreach($query->result_array() as $row){
			$this->db->reset_query(); 
			$this->db->select('*');
			$this->db->from('cargos_empresa');
			$this->db->where(array('id_empresa' => $row['id']));
			$query = $this->db->get();
			$result = $query->result();

			array_push($arreglo_empresas, $row);

			foreach($query->result_array() as $rowc){
				$this->db->reset_query(); 
				$this->db->select('*');
				$this->db->from('responsabilidades_cargo');
				$this->db->where(array('id_cargo' => $rowc['id']));
				$query = $this->db->get();
				$resultc = $query->result();

				$empresa_temp = array(
					'empresa' => $row,
					'cargos' => $arreglo_empresas,
					'Responsabilidad' => $resultc
				);
				array_push($arreglo_cargos, $empresa_temp);
			}
			//array_push($arreglo_cargos, $result);			
		}
		return $arreglo_cargos;
	}

}

