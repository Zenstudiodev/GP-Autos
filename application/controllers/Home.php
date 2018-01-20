<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 3:55 PM
 */
class Home extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
	    $this->load->model('Banners_model');
        $this->load->helper('text');
    }
    public function index(){
        header("Cache-Control: no-cache, must-revalidate");
        $data['carros'] = $this->Carros_model->get_carros_frontPage();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['ubicaciones'] = $this->Carros_model->ubicaciones_vehiculo();
	    $data['header_banners'] = $this->Banners_model->header_banners_activos();


        echo $this->templates->render('public/public_home',$data);

    }
	public function test(){
		header("Cache-Control: no-cache, must-revalidate");
		$data['carros'] = $this->Carros_model->get_carros_frontPage();
		$data['tipos'] = $this->Carros_model->tipos_vehiculo();
		$data['marca'] = $this->Carros_model->marca_vehiculo();
		$data['combustibles'] = $this->Carros_model->combustible_vehiculo();
		$data['ubicaciones'] = $this->Carros_model->ubicaciones_vehiculo();
		$data['header_banners'] = $this->Banners_model->header_banners_activos();
		$data['predios'] = $this->Carros_model->predios();

		echo $this->templates->render('public/test',$data);

	}

}