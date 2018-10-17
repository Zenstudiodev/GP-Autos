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
}