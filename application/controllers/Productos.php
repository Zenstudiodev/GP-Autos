<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 12/07/2017
 * Time: 12:33 PM
 */
class Productos extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
        $this->load->helper('carros');
	    $this->load->model('Banners_model');
    }
    public function index(){
        echo $this->templates->render('public/public_seguros');
    }
    public function anunciate(){
	    $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/public_anunciate', $data);
    }
    public function seguros(){
	    $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/public_seguros', $data);
    }
	public function  financiamiento(){
		$data['header_banners'] = $this->Banners_model->header_banners_activos();
		echo $this->templates->render('public/public_financiamiento', $data);
	}

}