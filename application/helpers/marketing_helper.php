<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2/10/2018
 * Time: 8:57 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');


function color_seguimiento($estado, $fecha)
{
    $color_evento = 'green';
    $hoy = new DateTime();
    $fecha_evento = new  DateTime($fecha);
    if($estado == 'completado'){

    }else{
        if ($hoy < $fecha_evento) {
            //aun no se paso la fecha
            $color_evento = 'yellow';
        } else {
            //ya se paso la fecha
            $color_evento = 'red';
        }
    }



    return $color_evento;
}
function numeros_agregados_reporte($user, $de, $a){
    $ci =& get_instance();
    $numeros_agregados='';
    $numeros_agregados = $ci->Marketing_model->numeros_agregados($user, $de, $a);
    if ($numeros_agregados){
        $numeros_agregados = $numeros_agregados->num_rows();
    }
    else{
        $numeros_agregados =0;
    }
    return($numeros_agregados);
}
function numeros_bajados_reporte($user, $de, $a){
    $ci =& get_instance();
    $numeros_bajados='';
    $numeros_bajados = $ci->Marketing_model->numeros_bajados($user, $de, $a);
    if ($numeros_bajados){
        $numeros_bajados = $numeros_bajados->num_rows();
    }
    else{
        $numeros_bajados =0;
    }
    return($numeros_bajados);
}
function numeros_seguimientos_reporte($user, $de, $a){
    $ci =& get_instance();
    $numeros_bajados='';
    $numeros_bajados = $ci->Marketing_model->numeros_seguimientos($user, $de, $a);
    if ($numeros_bajados){
        $numeros_bajados = $numeros_bajados->num_rows();
    }
    else{
        $numeros_bajados =0;
    }
    return($numeros_bajados);
}

?>
