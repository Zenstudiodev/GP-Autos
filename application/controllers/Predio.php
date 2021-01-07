<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 4/10/2017
 * Time: 11:08 AM
 */

class Predio extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Carros_model');
        $this->load->model('Banners_model');
        $this->load->model('Predio_model');
        $this->load->helper('carros');
        $this->load->library("pagination");
    }

    function index()
    {

        $data['carros'] = $this->Carros_model->get_carros_frontPage();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['ubicaciones'] = $this->Carros_model->ubicaciones_vehiculo();
        echo $this->templates->render('public/public_home', $data);

    }

    function ver()
    {
        $data = cargar_componentes_buscador();
        //obtenemos el id del carro desde el segmento de url
        $data['segmento'] = $this->uri->segment(3);
        if (!$data['segmento']) {
            //TODO  redirigir a vista de listao de carros
            //redirect('prospectos/prospectosList', 'refresh');
        }


        //numero de resultados
        $data['numero_resultados'] = $this->Carros_model->get_predio_number_result($data['segmento']);


        //pagination
        $config = array();
        $config["base_url"] = base_url() . "predio/ver/" . $data['segmento'];
        $config["total_rows"] = $data['numero_resultados'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["num_tag_open"] = '<li class="waves-effect">';
        $config["num_tag_close"] = '</li>';
        $config["cur_tag_open"] = '<li class="active"><a>';
        $config["cur_tag_close"] = '</a></li>';
        $config["first_tag_open"] = '<li class="waves-effect">';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li class="waves-effect">';
        $config["last_tag_close"] = '</li>';
        $config["next_tag_open"] = '<li class="waves-effect">';
        $config["next_tag_close"] = '</li>';
        $config["prev_tag_open"] = '<li class="waves-effect">';
        $config["prev_tag_close"] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['banners'] = $this->Banners_model->banneers_activos();


        $data['predio'] = $this->Predio_model->get_predio_data($data['segmento']);
        $predio = $data['predio']->row();
        if ($predio->prv_estatus == 'Alta') {
            $data['carros'] = $this->Carros_model->get_carros_for_predio($data['segmento'], $config["per_page"], $page);
        } else {
            $data['predio'] = false;
            $data['carros'] = false;
        }


        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/public_predio', $data);
    }

    function predios_amin()
    {

    }

    function listado_predio()
    {
        $data = cargar_componentes_buscador();
        //obtenemos el id del carro desde el segmento de url
        $data['segmento'] = $this->uri->segment(3);
        if (!$data['segmento']) {
            //TODO  redirigir a vista de listao de carros
            //redirect('prospectos/prospectosList', 'refresh');
        } else {

            $data['carro'] = $this->Carros_model->get_datos_carro($data['segmento']);
            if ($data['carro']) {
                $data_carro = $data['carro']->row();
                $predio = $this->Predio_model->get_predio_data($data_carro->id_predio_virtual);
                if ($predio) {
                    $predio = $predio->row();
                    if ($predio->prv_estatus == 'Baja') {
                        $data['carro'] = false;
                    }
                }

            }

        }
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $data['predios_activos'] = $this->Predio_model->predios_activos();
        echo $this->templates->render('public/lista_predios', $data);

    }

    function afiliarse()
    {
        $data = cargar_componentes_buscador();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $data['predios_activos'] = $this->Predio_model->predios_activos();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('public/registro_predio', $data);
    }

    function guardar_afiliacion()
    {
        //print_contenido($_POST);
        //predio
        $nombre_predio = $this->input->post('nombre_predio');
        $direccion_predio = $this->input->post('direccion_predio');
        $telefono_predio = $this->input->post('telefono_predio');
        $descripcion_predio = $this->input->post('descripcion_predio');
        $numero_carros_predio = $this->input->post('numero_carros');
        //usuario
        $user_name = $this->input->post('user_name');
        $nombre_usuario = $this->input->post('nombre_usuario');
        $correo = $this->input->post('correo');
        $password = $this->input->post('password');

        //comprobar si existe usuario
        $exsiste = usuario_predio_existe($user_name);
        if ($exsiste) {
            //flag
            $this->session->set_flashdata('mensaje', 'ya existe el nombre de usuario');
            redirect(base_url() . 'predio/afiliarse');
        } else {
            //crear Predio
            $datos_predio = array(
                'nombre' => $nombre_predio,
                'diercción' => $direccion_predio,
                'telefono' => $telefono_predio,
                'descripcion' => $descripcion_predio,
                'imagen' => '',
                'estado' => 'pendiente',
                'carros_activos' => '0',
                'carros_permitidos' => $numero_carros_predio
            );
            $predio_id = $this->Predio_model->guardar_predio($datos_predio);
            //crar usuario

            $post_data = array(
                'username' => $user_name,
                'correo' => $correo,
                'clave' => $password,
                'nombre' => $nombre_usuario,
                'rol' => 'predio',
                'carro_activos' => '0',
                'carro_premitidos' => $numero_carros_predio,
                'predio' => $predio_id,
            );
            //print_r($post_data);

            $this->Usuarios_model->guardar_usuarios($post_data);
            echo $predio_id;
            echo 'guardado mandar correo';
        }


    }

    function subir_imagen_predio()
    {
    }

    function solicitud_recibida()
    {
    }

    public function capturar_numeros()
    {
        $data = compobarSesion();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['parametro_numeros'] = $this->Admin_model->get_telefonos_bolsa();
        echo $data['user_id'];
        $data['numeros_ingresados_user'] = $this->Predio_model->get_numeros_ingresados_dia_user($data['user_id']);
        echo $this->templates->render('admin/admin_capturar_numero_predio', $data);
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
        $telefono_id = $this->Predio_model->guardar_numero($datos);
        //echo $telefono_id;
        redirect(base_url() . 'marketing/capturar_numeros/');
    }

    public function bajar_numero()
    {
        $data = compobarSesion();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['parametro_numeros'] = $this->Admin_model->get_telefonos_bolsa();
        // echo $data['user_id'];
        //$data['numeros_ingresados_user'] = $this->Predio_model->get_numeros_ingresados_dia_user($data['user_id']);
        $data['numero_a_atendar'] = $this->Predio_model->bajar_numero_bosla($data['user_id']);
        if ($data['numero_a_atendar']) {
            $numero = $data['numero_a_atendar']->row();
            $asignar_registro = array(
                'bt_user_id_atendiendo' => $data['user_id'],
                'bt_id' => $numero->bt_id,
            );
            $this->Predio_model->asignar_numero_bajado($asignar_registro);

            $data['otros_registros'] = $this->Predio_model->registros_en_bolsa_by_telefono($numero->bt_telefono);
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
        $this->Predio_model->guardar_seguimiento($datos_seguimiento);
        echo 'agendado';
    }

    //Seguimientos
    public function seguimientos()
    {
        $data = compobarSesion();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['parametro_numeros'] = $this->Admin_model->get_telefonos_bolsa();
        // echo $data['user_id'];
        //$data['numeros_ingresados_user'] = $this->Predio_model->get_numeros_ingresados_dia_user($data['user_id']);
        $data['numero_a_atendar'] = $this->Predio_model->bajar_numero_bosla($data['user_id']);
        $data['seguimientos'] = $this->Predio_model->get_seguimientos_by_user_id($data['user_id']);
        $data['carros_individuales_publicados'] = $this->Predio_model->get_carros_individuales_publicados_en_el_mes();
        $data['carros_pv9_publicados'] = $this->Predio_model->get_carros_pv9_publicados_en_el_mes();
        echo $this->templates->render('admin/admin_seguimiento_numeros', $data);
    }

    public function actualizar_estado_seguimiento()
    {
        print_contenido($_POST);

        $datos_seguimiento = array(
            'bts_id' => $this->input->post('bts_id'),
        );
        $this->Predio_model->actualizar_estado_seguimiento($datos_seguimiento);

    }

    public function display_seguimiento_info()
    {
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $id_seguimiento = $_GET['id_seguimiento'];

        $datos_seguimiento = $this->Predio_model->get_datos_seguimiento_by_id($id_seguimiento);
        $data['datos_seguimiento'] = $datos_seguimiento;
        //imprimimos en formato json el resultado
        if ($datos_seguimiento) {
            $seguimiento = $datos_seguimiento->row();

            $datos_registro = $this->Predio_model->registros_en_bolsa_by_id($seguimiento->bts_bt_id);
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
        $this->Predio_model->guardar_resultado_seguimiento($datos_seguimiento);

        //actualizamos el esatado del registro
        $actualizar_registro = array(
            'bt_estado' => $this->input->post('resultado_action'),
            'bt_user_id_atendiendo' => $this->input->post('bts_user_id'),
            'bt_id' => $this->input->post('bts_bt_id'),
        );
        $this->Predio_model->actualizar_registro_bolsa($actualizar_registro);

        echo 'actualizado';
    }

    public function visitas()
    {
        $data = compobarSesion();
        $hoy = New DateTime();
        $ruta = dia_a_ruta($hoy);


        $data['ruta'] = $ruta;
        $data['predios_ruta'] = $this->Predio_model->get_predios_ruta($ruta);
        echo $this->templates->render('admin/admin_visitas_predio', $data);
    }

    //buscar registros
    public function registros_en_bolsa_by_id()
    {
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $telefono = $_GET['telefono'];
        //pasamos variablea al modelo
        $datos_carro = $this->Predio_model->registros_en_bolsa_by_telefono($telefono);
        //imprimimos en formato json el resultado
        if ($datos_carro) {
            echo json_encode($datos_carro->result());
        }
    }

    public function seguimientos_by_registro()
    {
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $telefono = $_GET['telefono'];
        //pasamos variablea al modelo
        $data['reistros_by_number'] = $this->Predio_model->registros_en_bolsa_by_telefono($telefono);
        echo $this->templates->render('admin/admin_seguimientos_by_registro', $data);
    }

    public function seguimientos_by_bt_id()
    {
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $bt_id = $_GET['bt_id'];
        //pasamos variablea al modelo
        $datos_registro = $this->Predio_model->get_seguimientos_by_bolsa_id($bt_id);
        //imprimimos en formato json el resultado
        if ($datos_registro) {
            echo json_encode($datos_registro->result());
        }
    }

    public function marcar_ingreso()
    {
        $data = compobarSesion();
        $data['predio_id'] = $this->uri->segment(3);

        echo $this->templates->render('admin/admin_marcar_visita_predio', $data);

    }

    public function guardar_ingreso()
    {

        //print_contenido($_POST);
        $datos = array(
            'user_id' => $this->input->post('user_id'),
            'visita_ubicacion_lat' => $this->input->post('latitud'),
            'visita_ubicacion_log' => $this->input->post('longitud'),
            'visita_predio_id' => $this->input->post('predio_id'),
        );
        // print_contenido($datos);
        $telefono_id = $this->Predio_model->guardar_ingreso_visita($datos);
        //echo $telefono_id;
        redirect(base_url() . 'predio/visitas');
    }

    public function marcar_salida()
    {
        $data = compobarSesion();
        $data['predio_id'] = $this->uri->segment(3);
        $data['title'] = 'marcar salida';

        echo $this->templates->render('admin/admin_marcar_salida_predio', $data);
    }

    public function guardar_salida()
    {
        $datos = array(
            'user_id' => $this->input->post('user_id'),
            'visita_ubicacion_lat' => $this->input->post('latitud'),
            'visita_ubicacion_log' => $this->input->post('longitud'),
            'visita_predio_id' => $this->input->post('predio_id'),
            'resultado_visita' => $this->input->post('resultado_visita'),
        );

        // print_contenido($datos);
        $telefono_id = $this->Predio_model->guardar_salida_visita($datos);
        //echo $telefono_id;
        redirect(base_url() . 'predio/visitas');
    }

    //control de predios
    public function registros_predios()
    {
        $data = compobarSesion();

        echo $this->templates->render('admin/admin_registros_visita_predios', $data);
    }

    public function registros_predios_json()
    {

        $registros_visitas_predio = $this->Predio_model->get_registro_visitas_predio();

        $registros_json = array();
        foreach ($registros_visitas_predio->result() as $registro) {
            //print_contenido($registro);

            if($registro->visita_tipo == 'entrada'){
                $registros = array(
                    "title" => "Ingreso Predio ".$registro->visita_predio_id,
                    "description" => "$registro->visita_resultado",
                    "start" => $registro->visita_fecha."T".$registro->visita_hora,
                    "end" => $registro->visita_fecha."T".$registro->visita_hora,
                );
            }
            if($registro->visita_tipo == 'salida'){
                $registros = array(
                    "title" => "Salida Predio ".$registro->visita_predio_id,
                    "description" => "$registro->visita_resultado",
                    "start" => $registro->visita_fecha."T".$registro->visita_hora,
                    "end" => $registro->visita_fecha."T".$registro->visita_hora,
                );
            }

            array_push($registros_json, $registros);



        }
        $registros_json = json_encode($registros_json);
       echo $registros_json;

/*echo '<hr>';
        echo '[
    {
      "title": "Event 1",
      "start": "2020-12-23T09:00:00",
      "end": "2020-12-23T18:00:00"
    },
    {
      "title": "Event 2",
      "start": "2020-12-24",
      "end": "2020-12-25"
    }
  ]';*/
    }

    public function ver_carros_predio_admin(){
        $data = compobarSesion();
        $predio_id = $this->uri->segment(3);
        $data['predio_id'] = $predio_id;

        $data['carros_predio'] = $this->Predio_model->get_carros_predios($predio_id);
        $data['predios'] = $this->Predio_model->predios_activos();
        $data['asesores'] = $this->Predio_model->get_asesores_by_predio_id($predio_id);
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/carros_predios_visita', $data);
    }
    public function asesores_predio(){
        $data = compobarSesion();
        $predio_id = $this->uri->segment(3);
        $data['predio_id'] = $predio_id;

        $data['asesores'] = $this->Predio_model->get_asesores_by_predio_id($predio_id);
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        echo $this->templates->render('admin/asesores_predio_listado', $data);
    }
    public function crear_asesores_predio(){
        $data = compobarSesion();
        $predio_id = $this->uri->segment(3);

        $data['asesores'] = $this->Predio_model->get_asesores_by_predio_id($predio_id);
        $data['predio_id'] = $predio_id;
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/crear_asesor_predio', $data);
    }
    public function guardar_asesor_predio()
    {
        print_contenido($_POST);

        $datos = array(
            'asesor_nombre' => $this->input->post('nombre_asesor'),
            'asesor_email' => $this->input->post('email_asesor'),
            'asesor_telefono' => $this->input->post('telefono_asesor'),
            'asesor_predio_id' => $this->input->post('predio_id'),
        );
        // print_contenido($datos);
        $telefono_id = $this->Predio_model->guardar_asesor_predio($datos);
        //echo $telefono_id;
        redirect(base_url() . 'predio/asesores_predio/'.$this->input->post('predio_id'));
    }
    public function editar_asesores_predio(){
        $data = compobarSesion();
        $asesor_id = $this->uri->segment(3);

        $data['asesor_id'] = $asesor_id;
        $data['asesor'] = $this->Predio_model->get_asesor_by_id($asesor_id);
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/editar_asesor_predio', $data);
    }
    public function actualizar_asesor_predio()
    {
        $datos = array(
            'id_asesor_predio' => $this->input->post('asesor_id'),
            'asesor_nombre' => $this->input->post('nombre_asesor'),
            'asesor_email' => $this->input->post('email_asesor'),
            'asesor_telefono' => $this->input->post('telefono_asesor'),
            'asesor_predio_id' => $this->input->post('predio_id'),
        );
        // print_contenido($datos);
        $telefono_id = $this->Predio_model->actualizar_asesor_predio($datos);
        //echo $telefono_id;
        redirect(base_url() . 'predio/asesores_predio/'.$this->input->post('predio_id'));
    }
    public function borrar_asesores_predio(){
        $data = compobarSesion();
        $asesor_id = $this->uri->segment(3);
        $this->Predio_model->borrar_asesor_predio($asesor_id);
        $predio_id = $this->uri->segment(4);
        redirect(base_url() . 'predio/asesores_predio/'.$predio_id);

        echo $asesor_id;
    }

}