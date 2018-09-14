<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 10/09/2018
 * Time: 4:25 PM
 */
class Marketing_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function guardar_numero($data)
    {
        $fecha = New DateTime();
        $datos = array(

            'bt_fecha_ingreso' => $fecha->format('Y-m-d'),
            'bt_telefono' => $data['telefono'],
            'bt_ubicacion' => $data['ubicacion_carro'],
            'bt_tipo' => $data['tipo_carro'],
            'bt_marca' => $data['marca'],
            'bt_linea' => $data['linea'],
            'bt_modelo' => $data['tipo_carro'],
            'bt_user_id' => $data['user_id'],
        );
        $this->db->insert('bolsa_telefonos', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function get_numeros_ingresados_dia_user($user_id){
        $fecha = New DateTime();
        $this->db->where('bt_fecha_ingreso',$fecha->format('Y-m-d'));
        $this->db->where('bt_user_id',$user_id);
        $query = $this->db->get('bolsa_telefonos');
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }

}