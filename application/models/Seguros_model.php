<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 18/01/2021
 * Time: 14:07
 */
class Seguros_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function guardar_cliente_asguro($cliente){
        //fecha
        $fecha = New DateTime();

        $datos = array(
            'cliente_seguro_nombre'=> $cliente['cliente_seguro_nombre'],
            'cliente_seguro_telefono'=> $cliente['cliente_seguro_telefono'],
            'cliente_seguro_telefono2'=> $cliente['cliente_seguro_telefono2'],
            'cliente_seguro_direccion'=> $cliente['cliente_seguro_direccion'],
            'cliente_seguro_dpi'=> $cliente['cliente_seguro_dpi'],
            'cliente_seguro_referido_predio_id'=> $cliente['cliente_seguro_referido_predio_id'],
        );
        $this->db->insert('clientes_seguros', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }


}