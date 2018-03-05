<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/07/2017
 * Time: 12:22 PM
 */

class Contacto extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
        $this->load->helper('carros');
	    $this->load->model('Banners_model');
    }
    public function index(){
        $data = cargar_componentes_buscador();
	    $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/public_contacto', $data);
    }

}