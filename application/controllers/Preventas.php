<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Preventas extends REST_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('Preventa_model');
		$this->load->helper('utilidades');
	}

	/******************************
        Insertar Preventa
	******************************/

	public function index_post(){
        $data = $this->post();
        $token = $_GET['token'];
        $resultadoToken = validar_token($token);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken, 403);
        }

        $this->load->library('form_validation');
        $this->form_validation->set_data($data);

        if( $this->form_validation->run('preventa_post') ){

            $resultado = $this->Preventa_model->insertar_preventa($data);

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

	/******************************
        Actualizar Preventa
	******************************/

	public function index_put($id=null){
		$data = $this->put();
        $token = $_GET['token'];
        $resultadoToken = validar_token($token);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken, 403);
        }

        $this->load->library('form_validation');
        $this->form_validation->set_data($data);

        if( !isset($id) ){

            $respuesta = array(
                'err' => TRUE,
                'mensaje' => 'Se debe especificar un ID'
            );
            return $this->response($respuesta,404);

        }else{

            if( $this->form_validation->run( 'preventa_put' ) ){

                $respuesta = $this->Preventa_model->actualizar_preventa($id,$data);
                return $this->response($respuesta);

            }else{

                $respuesta = array(
                    'err' => TRUE,
                    'mensaje' => $this->form_validation->get_errores_arreglo()
                );
                return $this->response($respuesta, 400);
            }
        }
	}

	

}
