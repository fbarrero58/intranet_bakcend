<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Alianzas extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Alianza_model');
    }

    /*******************************
        POST
    *******************************/

    public function index_post(){

        $data = $this->post();
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);

        if( $this->form_validation->run('alianzas_post') ){

            $resultado = $this->Alianza_model->insertar($data);

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

    /*******************************
        GET
    *******************************/

    public function index_get( $id=null ){

        if( !isset($id) ){
            $resultado = $this->Alianza_model->todos();
        }else{
            //$resultado = $this->Alianza_model->todos();
        }

        return $this->response($resultado);

    }

    /*******************************
        PUT
    *******************************/

    public function index_put( $id=null ){

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

            if( $this->form_validation->run( 'alianzas_post' ) ){

                $respuesta = $this->Alianza_model->actualizar($id,$data);
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