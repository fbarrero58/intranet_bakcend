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
	)


);




?>