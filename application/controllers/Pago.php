<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 15/05/2018
 * Time: 2:47 PM
 */
class Pago extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
        $this->load->model('Banners_model');
        $this->load->model('Predio_model');
        $this->load->model('Pagos_model');
    }

    function verificar_pago(){
        $data = compobarSesion();

        $data['pago_id'] = $this->uri->segment(3);
        $pago =  $this->Pagos_model->get_datos_pago_by_id($data['pago_id']);
        $pago_data = $pago->row();

        $this->Pagos_model->verificar_pago($pago_data->pago_id);
        redirect(base_url() . 'admin/revisar_carro/'.$pago_data->carro_id, 'refresh');
    }



}