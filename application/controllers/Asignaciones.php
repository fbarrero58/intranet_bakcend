<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Asignaciones extends REST_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model('Asignaciones_model');
		$this->load->helper('utilidades');
	}

}
