<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Solicitudes extends REST_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Solicitud_model');
	}
	
	/******************************
        Insertar Permiso
	******************************/

	public function permiso_post(){ 		
		$data = $this->post();
		$this->load->library('form_validation');
		$this->form_validation->set_data($data);

		if( $this->form_validation->run('permisos_post') ){

			$resultado = $this->Solicitud_model->insertar_solicitud($data);
				    
			if($resultado['err']){
			    return $this->response($resultado, 400);
			}	    
			return $this->response($resultado, 201);
	    
		    }else{	    
			$respuesta = array(
			    'err' => TRUE,
			    'mensaje' => $this->form_validation->get_errores_arreglo()
			);
			return $this->response( $respuesta, 400 );	    
		}
	}
}
