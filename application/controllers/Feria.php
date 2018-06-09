<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 30/05/2018
 * Time: 5:25 PM
 */
class Feria extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
        $this->load->model('Banners_model');
        $this->load->helper('carros');
        $this->load->library("pagination");
    }
    public function index()
    {
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/feria', $data);
    }

}