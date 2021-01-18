<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 18/01/2021
 * Time: 12:34
 */

class Seguros extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Carros_model');
        $this->load->model('Seguros_model');
        $this->load->model('Banners_model');
        $this->load->model('Predio_model');
        $this->load->helper('carros');
        $this->load->library("pagination");
    }

    function index()
    {


    }
    public function crear_cliente(){
        $data = compobarSesion();
        $data['predios'] = $this->Predio_model->predios_admin();
        echo $this->templates->render('admin/admin_crear_cliente_seguro', $data);
    }
    public function guardar_cliente_seguro(){
        print_contenido($_POST);

        $post_data = array(
            'cliente_seguro_nombre' => $this->input->post('cliente_seguro_nombre'),
            'cliente_seguro_telefono' => $this->input->post('cliente_seguro_telefono'),
            'cliente_seguro_telefono2' => $this->input->post('cliente_seguro_telefono2'),
            'cliente_seguro_direccion' => $this->input->post('cliente_seguro_direccion'),
            'cliente_seguro_dpi' => $this->input->post('cliente_seguro_dpi'),
            'cliente_seguro_referido_predio_id' => $this->input->post('predio'),
        );

        //print_r($post_data);
        $predio_id = $this->Seguros_model->guardar_cliente_asguro($post_data);


    }
    public function crear_poliza(){
        $data = compobarSesion();
        $data['predios'] = $this->Predio_model->predios_admin();
        echo $this->templates->render('admin/admin_crear_poliza_seguro', $data);
    }
    public function buscar(){
        $data = compobarSesion();
        $data['title'] = 'Buscar';
        echo $this->templates->render('admin/buscar_poliza_seguro', $data);
    }

}