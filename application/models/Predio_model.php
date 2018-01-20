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


}