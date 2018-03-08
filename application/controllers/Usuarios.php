<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Usuarios extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->helper('utilidades');
    }

    /******************************
        Insertar Usuario
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

        if( $this->form_validation->run( 'usuarios_post' ) ){
            
            $resultado = $this->Usuario_model->insertar($data);

            if ($resultado['err']){
                return $this->response($resultado, 404);
            }else{
                $respuesta = array(
                    'err' => False,
                    'mensaje' => 'Usuario creado exitosamente'
                );
                //ENVIAR CORREO ELECTRONICO
                return $this->response( $respuesta, 201);
            }  
        }else{
            $respuesta = array(
                'err' => TRUE,
                'mensaje' => $this->form_validation->get_errores_arreglo()
            );
            return $this->response( $respuesta, 400);
        }
    }

    /******************************
        Obtener usuarios
    ******************************/

    public function index_get($id=null){

        $token = $_GET['token'];
        $resultadoToken = validar_token($token);

        if( $resultadoToken['err'] ){
            return $this->response($resultadoToken, 403);
        }

        $usuario = $this->Usuario_model->obtener($id);

        if(!isset($usuario)){
            $respuesta = array(
                'err' => TRUE,
                'mensaje' => 'No existe una factura con el ID '. $id
            );
            return $this->response($respuesta, 404);
        }else{
            $respuesta = array(
                'err' => FALSE,
                'mensaje' => 'Registro cargado correctamente',
                'Usuarios' => $usuario
            );
            return $this->response($respuesta); //retorna a json 
        }
    }

    /******************************
        Actualizar usuarios
    ******************************/

    public function index_put( $id=null){

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

            if( $this->form_validation->run( 'usuarios_put' ) ){

                $respuesta = $this->Usuario_model->actualizar($id,$data);
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