<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 4/10/2017
 * Time: 10:05 AM
 */

class Banners_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function header_banners_activos()
	{
		$where = "estado_bh='activo'";

		$this->db->where($where);
		$this->db->order_by('id_bh', 'RANDOM');
		$query = $this->db->get('banners_header');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function banneers_activos()
	{
		$where = "estado='activo'";
		$this->db->where($where);
		$query = $this->db->get('banners');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function banners(){
		$query = $this->db->get('banners');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function banners_header(){
		$query = $this->db->get('banners_header');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function banner_data($id_banner){
		$this->db->where('id_banner', $id_banner);
		$query = $this->db->get('banners');
		if ($query->num_rows() > 0) return $query;
		else return false;

	}
	function banner_header_data($id_banner){
		$this->db->where('id_bh', $id_banner);
		$query = $this->db->get('banners_header');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function actualizar_banners($post_data){
		$datos = array(
			'titulo'=> $post_data['titulo'],
			'link'=> $post_data['link'],
			'imagen'=> $post_data['imagen'],
			'area'=> $post_data['area'],
			'vencimiento'=> $post_data['vencimiento'],
			'estado'=> $post_data['estado']
		);
		$this->db->where('id_banner', $post_data['id']);
		$query = $this->db->update('banners',$datos);
	}
	function guardar_click_banner_header($banner_id){
		$this->db->where('id_bh', $banner_id);
		$this->db->set('clicks_bh', 'clicks_bh+1', FALSE);
		$this->db->update('banners_header');
	}
	function guardar_vista_banner_header($banner_id){
		$this->db->where('id_bh', $banner_id);
		$this->db->set('visualizaciones_bh', 'visualizaciones_bh+1', FALSE);
		$this->db->update('banners_header');

	}
}