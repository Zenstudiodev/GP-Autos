<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 3/11/2018
 * Time: 1:00 PM
 */
class Carrito extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
        $this->load->helper('carros');
        $this->load->model('Banners_model');
    }

}