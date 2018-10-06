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

?>
