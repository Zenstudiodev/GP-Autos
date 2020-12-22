<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 22/12/2020
 * Time: 11:50
 */

function usuarios_de_predio($id_predio){
    $ci =& get_instance();
    $usuarios_predio='';
    $usuarios_predio = $ci->Predio_model->get_users_predio($id_predio);

    return($usuarios_predio);
}
