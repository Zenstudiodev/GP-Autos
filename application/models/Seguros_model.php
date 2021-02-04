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
    function get_cliente_seguro($cliente_id){
        $this->db->where('cliente_seguro_id', $cliente_id);
        $query = $this->db->get('clientes_seguros');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_poliza_asguro($cliente){
        //fecha
        $fecha = New DateTime();
        $datos = array(
            'seguro_tipo'=> $cliente['seguro_tipo'],
            'seguro_cliente_id'=> $cliente['seguro_cliente_id'],
            'seguro_pagos'=> $cliente['seguro_pagos'],
            'seguro_monto_poliza'=> $cliente['seguro_monto_poliza'],
            'seguro_no_poliza'=> $cliente['seguro_no_poliza'],
            'seguro_aseguradora'=> $cliente['seguro_aseguradora'],
            'seguro_asesor_id'=> $cliente['seguro_asesor_id'],
            'seguro_carro_marca'=> $cliente['seguro_carro_marca'],
            'seguro_carro_linea'=> $cliente['seguro_carro_linea'],
            'seguro_carro_color'=> $cliente['seguro_carro_color'],
            'seguro_carro_placa'=> $cliente['seguro_carro_placa'],
            'seguro_carro_chasis'=> $cliente['seguro_carro_chasis'],
            'seguro_carro_motor'=> $cliente['seguro_carro_motor'],
        );
        $this->db->insert('seguros_carros', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function get_polizas_by_cliente($cliente_id){
        $this->db->where('seguro_cliente_id', $cliente_id);
        $query = $this->db->get('seguros_carros');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function listar_clientes_json(){
        $query = $this->db->get('clientes_seguros');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    public function listar_polizas_json(){
                /*$this->db->select('producto.producto_id, producto.contrato_id, producto.bodega, producto.fecha_avaluo, producto.categoria, producto.nombre_producto, producto.avaluo_ce, producto.avaluo_comercial, producto.precio_venta, producto.precio_descuento, producto.mutuo, producto.tipo, producto.tienda_id, producto.tienda_actual, contrato.estado');*/
        $this->db->from('seguros_carros');
        $this->db->join('clientes_seguros', 'seguros_carros.seguro_cliente_id = clientes_seguros.cliente_seguro_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;



        $query = $this->db->get('seguros_carros');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    public function guardar_seguimiento_seguro($seguimiento){
        //fecha
        $fecha = New DateTime();
        $datos = array(
            'seguimiento_sc_cliente_id'=> $seguimiento['seguimiento_sc_cliente_id'],
            'seguimiento_sc_user_id'=> $seguimiento['seguimiento_sc_user_id'],
            'seguimiento_sc_tipo_seguimiento'=> $seguimiento['seguimiento_sc_tipo_seguimiento'],
            'seguimiento_sc_fecha_seguimiento'=> $seguimiento['seguimiento_sc_fecha_seguimiento'],
            'seguimiento_sc_hora_seguimiento'=> $seguimiento['seguimiento_sc_hora_seguimiento'],
            'seguimiento_sc_comentario'=> $seguimiento['seguimiento_sc_comentario'],
            'seguimiento_sc_accion'=> $seguimiento['seguimiento_sc_accion'],
        );
        $this->db->insert('seguimiento_seguros_creditos', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function get_seguimientos_by_cliente_id($cliente_id){
        $this->db->where('seguimiento_sc_cliente_id', $cliente_id);
        $this->db->where('seguimiento_sc_tipo_seguimiento', 'seguro');
        $query = $this->db->get('seguimiento_seguros_creditos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

}