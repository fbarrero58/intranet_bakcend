<?php

    function verificar_duplicidad($tabla, $campo, $valor){

        $CI =& get_instance();
        $CI->load->database();

        $query = $CI->db->get_where($tabla, array($campo => $valor));

        if($query->num_rows() > 0){
            $respuesta = array(
                'err' => TRUE,
                'mensaje' => 'Este código ya esta asignado'
            );  
        }else{
            $respuesta = array(
                'err' => FALSE
            );
        }

        return $respuesta;
    }

?>