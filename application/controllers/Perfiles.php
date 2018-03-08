<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Perfiles extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Perfiles_modulo_model');
        $this->load->helper('utilidades');
    }

    /*******************************
        POST
    *******************************/

    public function index_post(){

        $data = $this->post();
        $token = $_GET['token'];
        $resultadoToken = validar_token($token, 403);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken);
        }

        $resultado = $this->Perfiles_modulo_model->crear($data);

        if($resultado['err']){
            return $this->response($resultado, 400);
        }

        return $this->response($resultado, 201);

    }

    /*******************************
        GET
    *******************************/

    public function index_get( $id=null ){

        $token = $_GET['token'];
        $resultadoToken = validar_token($token);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken, 403);
        }

        $resultado = $this->Perfiles_modulo_model->traer($id);

        if($resultado['err']){
            return $this->response($resultado, 400);
        }

        return $this->response($resultado);

    }

    /*******************************
        PUT
    *******************************/

    public function index_put($id){

        $token = $_GET['token'];
        $resultadoToken = validar_token($token);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken, 403);
        }

        $data = $this->put();

        $resultado = $this->Perfiles_modulo_model->actualizar($id,$data);

        return $this->response($resultado);

    }

}