<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 22/12/2017
 * Time: 11:49 AM
 */

class Banners extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Carros_model');
		$this->load->model('Banners_model');
	}

	function guardar_click(){
		$banner_id = $this->input->post('banner_id');
		$this->Banners_model->guardar_click_banner_header($banner_id);
	}
	function guardar_visualizacion(){
		$banner_id = $this->input->post('banner_id_v');
		$this->Banners_model->guardar_vista_banner_header($banner_id);
	}

}