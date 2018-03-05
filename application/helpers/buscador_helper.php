<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 5/03/2018
 * Time: 3:29 PM
 */

function cargar_componentes_buscador()
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
   // $CI->load->model('my_model');

    // Call a function of the model
    $data['predios'] = $CI->Carros_model->predios();
    $data['tipos'] = $CI->Carros_model->tipos_vehiculo();
    $data['ubicaciones'] = $CI->Carros_model->ubicaciones_vehiculo();
    $data['marca'] = $CI->Carros_model->marcas_vehiculo('automovil');
    $data['linea'] = $CI->Carros_model->lineas_vehiculo('', '');
    $data['combustibles'] = $CI->Carros_model->combustible_vehiculo();
    $data['transmisiones'] = $CI->Carros_model->get_transmision();
    $data['carros'] = $CI->Carros_model->get_carros_frontPage();
    return $data;
}