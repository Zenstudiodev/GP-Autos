<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 10/09/2018
 * Time: 4:07 PM
 */
class Marketing extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
        $this->load->model('Marketing_model');
        $this->load->model('Predio_model');
        $this->load->model('Pagos_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Cliente_model');
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $data = compobarSesion();
        $rol =  $data['rol'];
        $data['numero_de_carros'] = 0;

        $data['carros'] = $this->Carros_model->ListarCarros_admin();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        if ($data['rol'] == 'predio') {
            $user = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
            $user = $user->row();
            //echo $predio;
            $data['carros_predio'] = $this->Predio_model->get_carros_predios($user->predio_id);
            $data['carros_usuario_predio']= $this->Predio_model->get_carros_predio_usuario($data['user_id']);
            if($data['carros_usuario_predio']){
                $data['numero_de_carros'] = $data['carros_usuario_predio']->num_rows();
            }

        }
        if ($rol == 'gerente' || $rol == 'developer' || $rol == 'editor') {
            $data['carros'] = $this->Carros_model->ListarCarros_admin();
            $data['numero_de_carros'] = $data['carros']->num_rows();
        }
        echo $this->templates->render('admin/admin_home', $data);
    }
    //MARKETING
    public function capturar_numeros(){
        $data = compobarSesion();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['parametro_numeros'] = $this->Admin_model->get_telefonos_bolsa();
        echo $data['user_id'];
        $data['numeros_ingresados_user'] = $this->Marketing_model->get_numeros_ingresados_dia_user($data['user_id']);
        echo $this->templates->render('admin/admin_capturar_numero', $data);
    }
    public function guardar_numero(){
        $data = compobarSesion();

        $datos = array(
            'user_id' => $data['user_id'],
            'telefono' => $this->input->post('telefono'),
            'ubicacion_carro' => $this->input->post('ubicacion_carro'),
            'tipo_carro' => $this->input->post('tipo_carro'),
            'marca' => $this->input->post('marca'),
            'linea' => $this->input->post('linea'),
            'modelo' => $this->input->post('modelo'),

        );
       // print_contenido($datos);
        $telefono_id = $this->Marketing_model->guardar_numero($datos);
        //echo $telefono_id;
       redirect(base_url() . 'marketing/capturar_numeros/');
    }



}