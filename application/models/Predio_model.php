<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 7/10/2017
 * Time: 1:18 PM
 */

class Predio_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function get_predio_data($id_predio){
		$this->db->where('id_predio_virtual', $id_predio);
		$this->db->where('prv_estatus', 'Alta');
		$query = $this->db->get('predio_virtual');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
    function get_predio_data_admin($id_predio){
        $this->db->where('id_predio_virtual', $id_predio);
        $query = $this->db->get('predio_virtual');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

	function predios_admin(){
        $query = $this->db->get('predio_virtual');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_predios_for_user($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('predio_user');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_carros_predios($predios){
        $this->db->where_in('id_predio_virtual', $predios);
        $this->db->where('crr_estatus', 'Alta');
        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_carros_predios_baja($predios){
        $this->db->where_in('id_predio_virtual', $predios);
        $this->db->where('crr_estatus', 'Baja');
        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
}