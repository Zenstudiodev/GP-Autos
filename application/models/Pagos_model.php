<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/05/2018
 * Time: 11:05 PM
 */
class Pagos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function guardar_pago_admin($data){
        //fecha
        $fecha = New DateTime();
        $datos_pago= array(
            'fecha'=>$fecha->format('Y-m-d'),
            'user_predio_id'=>$data['user_predio_id'],
            'carro_id'=>$data['carro_id'],
            'metodo'=>$data['metodo'],
            'monto'=>$data['monto_pago'],
            'banco'=>$data['banco'],
            'boleta'=>$data['boleta'],
        );
        $this->db->insert('pago_anuncio', $datos_pago);
    }
    function guardar_pago_efectivo($data){
        //fecha
        $fecha = New DateTime();
        $datos_pago_efectivo= array(
            'fecha'=>$fecha->format('Y-m-d'),
            'user_id'=>$data['user_id'],
            'carro_id'=>$data['carro_id'],
            'metodo'=>'efectivo',
            'direccion'=>$data['direccion'],
            'telefono'=>$data['telefono'],
            'monto'=>$data['monto'],

        );
        $this->db->insert('pago_anuncio', $datos_pago_efectivo);
    }
    function guardar_pago_deposito($data){
        //fecha
        $fecha = New DateTime();
        $datos_pago_efectivo= array(
            'fecha'=>$fecha->format('Y-m-d'),
            'user_id'=>$data['user_id'],
            'carro_id'=>$data['carro_id'],
            'metodo'=>$data['metodo'],
            'monto'=>$data['monto'],

        );
        $this->db->insert('pago_anuncio', $datos_pago_efectivo);
    }
    function guardar_pago_en_linea($data){
        //fecha
        $fecha = New DateTime();
        $datos_pago_efectivo= array(
            'fecha'=>$fecha->format('Y-m-d'),
            'user_id'=>$data['user_id'],
            'carro_id'=>'0',
            'metodo'=>'en_linea',
            'transaccion'=>$data['transaccion'],
            'monto'=>$data['monto'],
        );
        $this->db->insert('pago_anuncio', $datos_pago_efectivo);
    }
    function get_pagos_carro_admin($id_carro){
        $this->db->where('carro_id', $id_carro);
        $query = $this->db->get('pago_anuncio');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_pagos_carro_public($id_carro){
        $this->db->where('carro_id', $id_carro);
        $this->db->limit(1);
        $query = $this->db->get('pago_anuncio');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_datos_pago_by_id($pago_id){
        $this->db->where('pago_id', $pago_id);
        $query = $this->db->get('pago_anuncio');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function verificar_pago($pago_id){
        $datos = array(
            'estado' => 'verificado'
        );
        $this->db->where('pago_id', $pago_id);
        $query = $this->db->update('pago_anuncio', $datos);
    }


}