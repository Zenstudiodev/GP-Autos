<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 22/12/2020
 * Time: 11:50
 */

function usuarios_de_predio($id_predio)
{
    $ci =& get_instance();
    $usuarios_predio = '';
    $usuarios_predio = $ci->Predio_model->get_users_predio($id_predio);

    return ($usuarios_predio);
}

function dia_a_ruta($dia)
{

    $dia = $dia->format('l');
    $ruta = 1;
    //echo $dia;

    switch ($dia) {
        case 'Monday':
            $ruta = 1;
            break;
        case 'Tuesday':
            $ruta = 2;
            break;
        case 'Wednesday':
            $ruta = 3;
            break;
        case 'Thursday':
            $ruta = 4;
            break;
        case 'Friday':
            $ruta = 5;
            break;
        case 'Saturday':
            $ruta = 6;
            break;
        case 'Sunday':
            $ruta = 7;
            break;
        default:
            echo "i no es igual a 0, 1 ni 2";
    }
    return $ruta;
}

function id_departamento_a_nombre($id){
    $ci =& get_instance();
    $ci->load->model('Admin_model');
    $departamento = $ci->Admin_model->get_departamento_by_id($id);
    if($departamento){
        $departamento = $departamento->row();
        $nombre_departamento = $departamento->nombre_departamento;
    }else{
        $nombre_departamento ='';
    }
    return $nombre_departamento;
}
function id_municipio_a_nombre($id){
    $ci =& get_instance();
    $ci->load->model('Admin_model');
    $municipio = $ci->Admin_model->get_municipios_by_id($id);
    if($municipio){
        $municipio = $municipio->row();
        $nombre_municipio = $municipio->nombre_municipio;
    }else{
        $nombre_municipio ='';
    }
    return $nombre_municipio;
}
