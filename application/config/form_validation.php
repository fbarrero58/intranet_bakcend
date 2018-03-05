<?php 
if( ! defined('BASEPATH') ) exit('No direct script access allowed');


$config = array(

	// 'cliente_put' => array(
	// 		array( 'field'=>'correo', 'label'=>'correo electronico','rules'=>'trim|required|valid_email' ),
	// 		array( 'field'=>'nombre', 'label'=>'nombre','rules'=>'trim|required|min_length[2]|max_length[255]' ),
	// 		array( 'field'=>'zip', 'label'=>'zip','rules'=>'trim|required|min_length[2]|max_length[5]' )
	// )

	'empresas_post' => array(
			array( 'field'=>'tipo_empresa', 'label'=>'Tipo de Empresa','rules'=>'trim|required' ),
			array( 'field'=>'codigo', 'label'=>'Código','rules'=>'trim|required' ),
			array( 'field'=>'nombre', 'label'=>'Nombre del proyecto','rules'=>'trim|required' ),
			array( 'field'=>'alias', 'label'=>'Alias del proyecto','rules'=>'trim|required' ),
			array( 'field'=>'condicion_pago', 'label'=>'Condición de pago','rules'=>'trim|required' ),
	),

	'empresas_put' => array(
		array( 'field'=>'tipo_empresa', 'label'=>'Tipo de Empresa','rules'=>'trim|required' ),
		array( 'field'=>'nombre', 'label'=>'Nombre del proyecto','rules'=>'trim|required' ),
		array( 'field'=>'condicion_pago', 'label'=>'Condición de pago','rules'=>'trim|required' ),
	),

	'proyectos_post' => array(
		array( 'field'=>'empresa', 'label'=>'Empresa','rules'=>'trim|required' ),
		array( 'field'=>'tipo_servicio', 'label'=>'Tipo de Servicio','rules'=>'trim|required' ),
		array( 'field'=>'linea_servicio', 'label'=>'Linea de Servicio','rules'=>'trim|required' ),
		array( 'field'=>'codigo', 'label'=>'Código','rules'=>'trim|required' ),
		array( 'field'=>'nombre', 'label'=>'Nombre del proyecto','rules'=>'trim|required' ),
		array( 'field'=>'inicio', 'label'=>'Fecha de inicio','rules'=>'trim|required' ),
		array( 'field'=>'fin', 'label'=>'Fecha de finalización','rules'=>'trim|required' ),
		array( 'field'=>'habilitado', 'label'=>'Habilitado','rules'=>'trim|required' ),
		array( 'field'=>'ticket', 'label'=>'Habilitar Ticket','rules'=>'trim|required' ),
		array( 'field'=>'facturable', 'label'=>'Facturable','rules'=>'trim|required' ),
	)


);




?>