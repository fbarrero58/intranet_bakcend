<?php

    function verificar_duplicidad($tabla, $condiciones){

        $CI =& get_instance();
        $CI->load->database();

        $query = $CI->db->get_where($tabla, $condiciones);

        if($query->num_rows() > 0){

            $mensajes_error=array();

            foreach( $condiciones as $nombre_campo => $valor_campo ){
                array_push($mensajes_error,"El $nombre_campo ya esta asignado");
            }

            $respuesta = array(
                'err' => TRUE,
                'mensaje' => $mensajes_error
            );  

        }else{
            $respuesta = array(
                'err' => FALSE
            );
        }

        return $respuesta;
    }

?>