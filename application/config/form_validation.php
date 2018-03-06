<?php 
if( ! defined('BASEPATH') ) exit('No direct script access allowed');


$config = array(

	// 'cliente_put' => array(
	// 		array( 'field'=>'correo', 'label'=>'correo electronico','rules'=>'trim|required|valid_email' ),
	// 		array( 'field'=>'nombre', 'label'=>'nombre','rules'=>'trim|required|min_length[2]|max_length[255]' ),
	// 		array( 'field'=>'zip', 'label'=>'zip','rules'=>'trim|required|min_length[2]|max_length[5]' )
	// )

	'usuarios_post' => array(
		array( 'field'=>'nombres', 'label'=>'Nombre','rules'=>'trim|required' ),
		array( 'field'=>'apellidos', 'label'=>'Apellidos','rules'=>'trim|required' ),
		array( 'field'=>'fecha_nacimiento', 'label'=>'Fecha de Nacimiento','rules'=>'trim|required' ),
		array( 'field'=>'id_rol', 'label'=>'Rol','rules'=>'trim|required' ),
		array( 'field'=>'correo', 'label'=>'Correo Empresarial','rules'=>'trim|required|valid_email' ),
		array( 'field'=>'cargo', 'label'=>'Cargo','rules'=>'trim|required' ),
		array( 'field'=>'fecha_vinculacion', 'label'=>'Fecha de Vinculación','rules'=>'trim|required' ),
		array( 'field'=>'correo_personal', 'label'=>'Correo Personal','rules'=>'trim|valid_email' )
	),

	'usuarios_put' => array(
		array( 'field'=>'id_rol', 'label'=>'Rol','rules'=>'trim|required' ),
		array( 'field'=>'cargo', 'label'=>'Cargo','rules'=>'trim|required' ),
		array( 'field'=>'fecha_vinculacion', 'label'=>'Fecha de Vinculación','rules'=>'trim|required' ),
		array( 'field'=>'nombres', 'label'=>'Nombre','rules'=>'trim|required' ),
		array( 'field'=>'apellidos', 'label'=>'Apellidos','rules'=>'trim|required' ),
		array( 'field'=>'fecha_nacimiento', 'label'=>'Fecha de Nacimiento','rules'=>'trim|required' ),
		array( 'field'=>'correo_personal', 'label'=>'Correo Personal','rules'=>'trim|valid_email' )
	),
	
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
	),

	'proyectos_put' => array(
		array( 'field'=>'tipo_servicio', 'label'=>'Tipo de Servicio','rules'=>'trim|required' ),
		array( 'field'=>'nombre', 'label'=>'Nombre del proyecto','rules'=>'trim|required' ),
		array( 'field'=>'inicio', 'label'=>'Fecha de inicio','rules'=>'trim|required' ),
		array( 'field'=>'fin', 'label'=>'Fecha de finalización','rules'=>'trim|required' ),
		array( 'field'=>'habilitado', 'label'=>'Habilitado','rules'=>'trim|required' ),
		array( 'field'=>'ticket', 'label'=>'Habilitar Ticket','rules'=>'trim|required' ),
		array( 'field'=>'facturable', 'label'=>'Facturable','rules'=>'trim|required' ),
	),

	'alianzas_post' => array(
		array( 'field'=>'nombre', 'label'=>'Nombre','rules'=>'trim|required' ),
		array( 'field'=>'condicion_pago', 'label'=>'Condición de pago','rules'=>'trim|required' )
	)


);




?>