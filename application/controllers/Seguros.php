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

    public function crear_cliente()
    {
        $data = compobarSesion();
        $data['predios'] = $this->Predio_model->predios_admin();
        echo $this->templates->render('admin/admin_crear_cliente_seguro', $data);
    }

    public function guardar_cliente_seguro()
    {
        //print_contenido($_POST);

        $post_data = array(
            'cliente_seguro_nombre' => $this->input->post('cliente_seguro_nombre'),
            'cliente_seguro_telefono' => $this->input->post('cliente_seguro_telefono'),
            'cliente_seguro_telefono2' => $this->input->post('cliente_seguro_telefono2'),
            'cliente_seguro_direccion' => $this->input->post('cliente_seguro_direccion'),
            'cliente_seguro_dpi' => $this->input->post('cliente_seguro_dpi'),
            'cliente_seguro_referido_predio_id' => $this->input->post('cliente_seguro_referido_predio_id'),
        );

        //print_r($post_data);
        $cliente_id = $this->Seguros_model->guardar_cliente_asguro($post_data);
        redirect(base_url() . 'Seguros/perfil_cliente_seguro/' . $cliente_id);


    }

    public function perfil_cliente_seguro()
    {
        $data = compobarSesion();
        $cliente_id = $this->uri->segment(3);
        $data['cliente_id'] = $cliente_id;
        $data['datos_cliente'] = $this->Seguros_model->get_cliente_seguro($cliente_id);
        $data['polizas_cliente'] = $this->Seguros_model->get_polizas_by_cliente($cliente_id);
        $data['seguimientos_cliente'] = $this->Seguros_model->get_seguimientos_by_cliente_id($cliente_id);



        echo $this->templates->render('admin/admin_perfil_cliente_seguro', $data);
    }

    public function crear_seguimiento_cliente_seguro()
    {
        $data = compobarSesion();
        $cliente_id = $this->uri->segment(3);
        $data['cliente_id'] = $cliente_id;
        $data['datos_cliente'] = $this->Seguros_model->get_cliente_seguro($cliente_id);
        $data['polizas_cliente'] = $this->Seguros_model->get_polizas_by_cliente($cliente_id);
        echo $this->templates->render('admin/admin_crear_seguimiento_seguro', $data);
    }

    public function guardar_seguimiento_cliente_seguro()
    {
        $data = compobarSesion();
        $cliente_id = $this->input->post('cliente_id');
        $post_data = array(
            'seguimiento_sc_cliente_id' => $this->input->post('cliente_id'),
            'seguimiento_sc_user_id' => $data['user_id'],
            'seguimiento_sc_tipo_seguimiento' => 'seguro',
            'seguimiento_sc_fecha_seguimiento' => $this->input->post('fecha_seguimiento'),
            'seguimiento_sc_hora_seguimiento' => $this->input->post('hora_seguimiento'),
            'seguimiento_sc_comentario' => $this->input->post('comentario_seguimiento'),
            'seguimiento_sc_accion' => $this->input->post('accion_seguimiento'),
        );
        $this->Seguros_model->guardar_seguimiento_seguro($post_data);
        redirect(base_url() . 'Seguros/perfil_cliente_seguro/' . $cliente_id);
    }

    public function crear_poliza()
    {
        $data = compobarSesion();
        $cliente_id = $this->uri->segment(3);
        $data['cliente_id'] = $cliente_id;
        $data['predios'] = $this->Predio_model->predios_admin();
        echo $this->templates->render('admin/admin_crear_poliza_seguro', $data);
    }

    public function guardar_poliza_seguro()
    {
        // print_contenido($_POST);
        $post_data = array(
            'seguro_tipo' => $this->input->post('seguro_tipo'),
            'seguro_cliente_id' => $this->input->post('seguro_cliente_id'),
            'seguro_pagos' => $this->input->post('seguro_pagos'),
            'seguro_monto_poliza' => $this->input->post('seguro_monto_poliza'),
            'seguro_no_poliza' => $this->input->post('seguro_no_poliza'),
            'seguro_aseguradora' => $this->input->post('seguro_aseguradora'),
            'seguro_asesor_id' => $this->input->post('seguro_asesor_id'),
            'seguro_carro_marca' => $this->input->post('seguro_carro_marca'),
            'seguro_carro_linea' => $this->input->post('seguro_carro_linea'),
            'seguro_carro_color' => $this->input->post('seguro_carro_color'),
            'seguro_carro_placa' => $this->input->post('seguro_carro_placa'),
            'seguro_carro_chasis' => $this->input->post('seguro_carro_chasis'),
            'seguro_carro_motor' => $this->input->post('seguro_carro_motor'),
        );
        //print_r($post_data);
        $poliza_id = $this->Seguros_model->guardar_poliza_asguro($post_data);
        redirect(base_url() . 'Seguros/perfil_cliente_seguro/' . $post_data['seguro_cliente_id']);
    }

    public function seguimientos_seguro_by_cliente_json(){
        $cliente_id = $this->uri->segment(3);
        $registro_seguimientos = $this->Seguros_model->get_seguimientos_by_cliente_id($cliente_id);

        $registros_json = array();
        if($registro_seguimientos){
            foreach ($registro_seguimientos->result() as $registro) {
                //print_contenido($registro);

                $registros = array(
                    "title" => "Accion ".$registro->seguimiento_sc_accion,
                    "description" => "$registro->seguimiento_sc_comentario",
                    "start" => $registro->seguimiento_sc_fecha_seguimiento."T".$registro->seguimiento_sc_hora_seguimiento,
                    "end" =>  $registro->seguimiento_sc_fecha_seguimiento."T".$registro->seguimiento_sc_hora_seguimiento,
                );

                array_push($registros_json, $registros);

            }
        }

        $registros_json = json_encode($registros_json);
        echo $registros_json;
    }
    public function seguimientos_seguro_by_user_id_json(){
        $data = compobarSesion();
        $user_id = $data['user_id'];
        //echo $user_id;
        $registro_seguimientos = $this->Seguros_model->get_seguimientos_by_user_id($user_id);

        $registros_json = array();
        if($registro_seguimientos){
            foreach ($registro_seguimientos->result() as $registro) {
                //print_contenido($registro);

                $registros = array(
                    "title" => "Accion ".$registro->seguimiento_sc_accion,
                    "description" => "$registro->seguimiento_sc_comentario",
                    "url" => base_url()."Seguros/perfil_cliente_seguro/".$registro->seguimiento_sc_cliente_id,
                    "start" => $registro->seguimiento_sc_fecha_seguimiento."T".$registro->seguimiento_sc_hora_seguimiento,
                    "end" =>  $registro->seguimiento_sc_fecha_seguimiento."T".$registro->seguimiento_sc_hora_seguimiento,
                );

                array_push($registros_json, $registros);

            }
        }

        $registros_json = json_encode($registros_json);
        echo $registros_json;
    }

    public function buscar()
    {
        $data = compobarSesion();
        $data['title'] = 'Buscar';
        echo $this->templates->render('admin/buscar_poliza_seguro', $data);
    }

    function clientes_json()
    {
        $data['clientes'] = $this->Seguros_model->listar_clientes_json();
        $clientes = $data['clientes']->result();
        echo json_encode($clientes);
    }

    function polizas_json()
    {
        $data['polizas'] = $this->Seguros_model->listar_polizas_json();
        $polizas = $data['polizas']->result();
        echo json_encode($polizas);
    }

}