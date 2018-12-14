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

}