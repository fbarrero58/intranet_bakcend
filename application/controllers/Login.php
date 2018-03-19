<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Login extends REST_Controller {

    public function __construct(){
		parent::__construct();
		
		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		header("Access-Control-Allow-Origin: *");
		
        $this->load->model('Login_model');
        $this->load->helper('utilidades');
    }

    /*******************************
        POST - Iniciar Sesión
    *******************************/

    public function index_post(){
		$respuesta = array(
            'OK' => TRUE,
            'mensaje' => $this->post()
        );
		return $this->response($respuesta);
		
		$data = $this->post();

        $respuesta = $this->Login_model->ingresar($data);

        if($respuesta['err']){
            return $this->response($respuesta, 400);
        }else{
            return $this->response($respuesta);
        }

    }

    /*******************************
        PUT - Actualizar contraseña
    *******************************/

    public function index_put(){

        $data = $this->put();
        $respuesta = $this->Login_model->nueva_pass($data);
        $this->response($respuesta);

    }

    /*******************************
        Desencriptar token - Prueba
    *******************************/

    public function validar_get( ){
        $valor = $_GET['token'];

        $resultado = validar_token($valor);

        return $this->response($resultado);
    }

}
