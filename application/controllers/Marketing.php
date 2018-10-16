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
        $rol = $data['rol'];
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
            $data['carros_usuario_predio'] = $this->Predio_model->get_carros_predio_usuario($data['user_id']);
            if ($data['carros_usuario_predio']) {
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
    //captura de numero
    public function capturar_numeros()
    {
        $data = compobarSesion();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['parametro_numeros'] = $this->Admin_model->get_telefonos_bolsa();
        echo $data['user_id'];
        $data['numeros_ingresados_user'] = $this->Marketing_model->get_numeros_ingresados_dia_user($data['user_id']);
        echo $this->templates->render('admin/admin_capturar_numero', $data);
    }
    public function guardar_numero()
    {
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

    //bajar numero
    public function bajar_numero()
    {
        $data = compobarSesion();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['parametro_numeros'] = $this->Admin_model->get_telefonos_bolsa();
        // echo $data['user_id'];
        //$data['numeros_ingresados_user'] = $this->Marketing_model->get_numeros_ingresados_dia_user($data['user_id']);
        $data['numero_a_atendar'] = $this->Marketing_model->bajar_numero_bosla($data['user_id']);
        if ($data['numero_a_atendar']){
            $numero = $data['numero_a_atendar']->row();
            $asignar_registro = array(
                'bt_user_id_atendiendo' => $data['user_id'],
                'bt_id' => $numero->bt_id,
            );
            $this->Marketing_model->asignar_numero_bajado($asignar_registro);

            $data['otros_registros'] = $this->Marketing_model->registros_en_bolsa_by_telefono($numero->bt_telefono);
        }
        echo $this->templates->render('admin/admin_bajar_numero', $data);
    }
    public function guardar_seguimiento()
    {
        print_contenido($_POST);

        //exit();
        //guardamos hora y fecha, tipo y comentario de seguimiento.
        //guardamos los datos del seguiimiento
        $datos_seguimiento = array(
            'bts_user_id' => $this->input->post('bts_user_id'),
            'bts_fecha_seguimiento' => $this->input->post('bts_fecha_seguimiento'),
            'bts_bt_id' => $this->input->post('bts_bt_id'),
            'bts_comentario' => $this->input->post('bts_comentario'),
            'bts_estado' => 'pendiente',
            'bts_tipo' => $this->input->post('bts_tipo')
        );
        $this->Marketing_model->guardar_seguimiento($datos_seguimiento);
        echo 'agendado';
    }
    //Seguimientos
    public function seguimientos()
    {
        $data = compobarSesion();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['parametro_numeros'] = $this->Admin_model->get_telefonos_bolsa();
        // echo $data['user_id'];
        //$data['numeros_ingresados_user'] = $this->Marketing_model->get_numeros_ingresados_dia_user($data['user_id']);
        $data['numero_a_atendar'] = $this->Marketing_model->bajar_numero_bosla($data['user_id']);
        $data['seguimientos'] = $this->Marketing_model->get_seguimientos_by_user_id($data['user_id']);
        $data['carros_individuales_publicados']= $this->Marketing_model->get_carros_individuales_publicados_en_el_mes();
        $data['carros_pv9_publicados']= $this->Marketing_model->get_carros_pv9_publicados_en_el_mes();
        echo $this->templates->render('admin/admin_seguimiento_numeros', $data);
    }
    public function actualizar_estado_seguimiento(){
        print_contenido($_POST);

        $datos_seguimiento = array(
            'bts_id' => $this->input->post('bts_id'),
        );
        $this->Marketing_model->actualizar_estado_seguimiento($datos_seguimiento);

    }
    public function display_seguimiento_info(){
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $id_seguimiento  = $_GET['id_seguimiento'];

        $datos_seguimiento = $this->Marketing_model->get_datos_seguimiento_by_id($id_seguimiento);
        $data['datos_seguimiento'] = $datos_seguimiento;
        //imprimimos en formato json el resultado
        if($datos_seguimiento) {
            $seguimiento = $datos_seguimiento->row();

            $datos_registro =$this->Marketing_model->registros_en_bolsa_by_id($seguimiento->bts_bt_id);
            $data['datos_registro'] = $datos_registro;
            //echo json_encode($datos_registro->result());
           // echo json_encode($datos_seguimiento->result());
        }

        echo $this->templates->render('admin/admin_seguimiento_registro', $data);

    }
    public function guardar_resultado_seguimiento()
    {
        //print_contenido($_POST);

        //guardamos los datos del seguiimiento
        $datos_seguimiento = array(
            'bts_user_id' => $this->input->post('bts_user_id'),
            'bts_bt_id' => $this->input->post('bts_bt_id'),
            'bts_comentario' => $this->input->post('bts_comentario'),

        );
        $this->Marketing_model->guardar_resultado_seguimiento($datos_seguimiento);

        //actualizamos el esatado del registro
        $actualizar_registro = array(
            'bt_estado' => $this->input->post('resultado_action'),
            'bt_user_id_atendiendo' => $this->input->post('bts_user_id'),
            'bt_id' => $this->input->post('bts_bt_id'),
        );
        $this->Marketing_model->actualizar_registro_bolsa($actualizar_registro);

        echo 'actualizado';
    }

    //buscar registros
    public function registros_en_bolsa_by_id()
    {
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $telefono = $_GET['telefono'];
        //pasamos variablea al modelo
        $datos_carro = $this->Marketing_model->registros_en_bolsa_by_telefono($telefono);
        //imprimimos en formato json el resultado
        if ($datos_carro) {
            echo json_encode($datos_carro->result());
        }
    }
    public function seguimientos_by_registro(){
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $telefono = $_GET['telefono'];
        //pasamos variablea al modelo
        $data['reistros_by_number'] = $this->Marketing_model->registros_en_bolsa_by_telefono($telefono);
        echo $this->templates->render('admin/admin_seguimientos_by_registro', $data);
    }
    public function seguimientos_by_bt_id()
    {
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $bt_id = $_GET['bt_id'];
        //pasamos variablea al modelo
        $datos_registro = $this->Marketing_model->get_seguimientos_by_bolsa_id($bt_id);
        //imprimimos en formato json el resultado
        if ($datos_registro) {
            echo json_encode($datos_registro->result());
        }
    }

}