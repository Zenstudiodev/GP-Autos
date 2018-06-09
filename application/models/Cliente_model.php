<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 26/03/2018
 * Time: 5:56 PM
 */
class Cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_cliente_data($cliente_id){
        $this->db->where('id', $cliente_id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_carros_cliente($cliente_id){
        $this->db->where('user_id', $cliente_id);
        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }


}