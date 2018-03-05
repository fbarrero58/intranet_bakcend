<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Usuarios extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    /******************************
        Insertar Usuario
    ******************************/

    public function index_post(){ 
        $data = $this->post();

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
/*
    public function index_put(){
        $data = $this->put();

        $this->load->library('form_validation');
        $this->form_validation->actualizar($data);

        //echo $this->form_validation->run(); 
       
    }*/
    
}