<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Empresas extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Empresa_model');
        $this->load->helper('utilidades');
    }

    /*******************************
        POST
    *******************************/

    public function index_post(){

        $data = $this->post();
        $token = $_GET['token'];
        $resultadoToken = validar_token($token);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken);
        }

        $this->load->library('form_validation');
        $this->form_validation->set_data($data);

        if( $this->form_validation->run( 'empresas_post' ) ){ 
            
            $data = $this->Empresa_model->insertar($data);

            if($data['error']){
                return $this->response($data,400);
            }

            return $this->response($data, 201);

        }else{

            $respuesta = array(
                'err' => TRUE,
                'mensaje' => $this->form_validation->get_errores_arreglo()
            );
            return $this->response( $respuesta, 400 );

        }

    }

    /*******************************
        GET
    *******************************/

    public function index_get( $id=null ){

        $token = $_GET['token'];
        $resultadoToken = validar_token($token);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken);
        }

        if( !isset($id) ){
            $respuesta = $this->Empresa_model->todos();
        }else{
            $respuesta = $this->Empresa_model->por_id($id);
        }
        return $this->response($respuesta);

    }

    /*******************************
        PUT
    *******************************/

    public function index_put( $id=null ){

        $token = $_GET['token'];
        $resultadoToken = validar_token($token);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken);
        }

        $data = $this->put();
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);

        if( !isset($id) ){

            $respuesta = array(
                'err' => TRUE,
                'mensaje' => 'Se debe especificar un ID'
            );
            return $this->response($respuesta,404);

        }else{

            if( $this->form_validation->run( 'empresas_put' ) ){

                $respuesta = $this->Empresa_model->actualizar($id,$data);
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