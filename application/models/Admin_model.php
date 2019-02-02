<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 14/09/2018
 * Time: 11:12 AM
 */
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_telefonos_bolsa(){
        $this->db->where('parametro_nombre','telefonos_diarios_bolsa');
        $query = $this->db->get('parametros');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_parametros(){
        $query = $this->db->get('parametros');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function actualizar_parametros($parametros){
        //Actualizar carros para la bolsa
        $datos = array(
            'parametro_valor'          => $parametros['carros_bolsa'],
        );
        $this->db->where('parametro_id', '1');
        $query = $this->db->update('parametros', $datos);

        //Actualizar precio de anuncio vip
        $datos = array(
            'parametro_valor'          => $parametros['precio_vip'],
        );
        $this->db->where('parametro_id', '2');
        $query = $this->db->update('parametros', $datos);

        //Actualizar precio de anucios individuales
        $datos = array(
            'parametro_valor'          => $parametros['precio_individual'],
        );
        $this->db->where('parametro_id', '3');
        $query = $this->db->update('parametros', $datos);

        //Actualizar precio de feria
        $datos = array(
            'parametro_valor'          => $parametros['precio_feria'],
        );
        $this->db->where('parametro_id', '4');
        $query = $this->db->update('parametros', $datos);

        //Actualizar precio de anucios en facebook
        $datos = array(
            'parametro_valor'          => $parametros['precio_facebook'],
        );
        $this->db->where('parametro_id', '5');
        $query = $this->db->update('parametros', $datos);

    }


    //codigos de descuento

    public function guardar_codigo_descuento($datos_cupon){
        $datos = array(
            'nombre'   => $datos_cupon['nombre'],
            'tipo'   => $datos_cupon['tipo'],
            'valor'   => $datos_cupon['valor'],
            'codigo'   => $datos_cupon['codigo'],
        );
        $this->db->insert('cupones', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function get_cupones(){
        $query = $this->db->get('cupones');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    public function dar_de_baja_cupon($cupon_id){
        //Actualizar carros para la bolsa
        $datos = array(
            'estado'=> 'Inactivo',
        );
        $this->db->where('id', $cupon_id);
        $query = $this->db->update('cupones', $datos);
    }
    public function get_cupon_by_code($cupon_id){
        $this->db->where('codigo',$cupon_id);
        $query = $this->db->get('cupones');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
}