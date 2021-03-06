<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 3:57 PM
 */
class Admin extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
        $this->load->model('Banners_model');
        $this->load->model('Predio_model');
        $this->load->model('Pagos_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Cliente_model');
        $this->load->model('Admin_model');
        $this->load->model('Marketing_model');
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
        $data['carros_usuario_predio_pendientes'] = false;

        if ($data['rol'] == 'predio') {
            $user = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
            $user = $user->row();
            //echo $predio;
            $data['carros_predio'] = $this->Predio_model->get_carros_predios($user->predio_id);
            //carros del predio asignados al usuario
            $data['carros_usuario_predio'] = $this->Predio_model->get_carros_predio_usuario($data['user_id']);
            $data['carros_usuario_predio_pendientes'] = $this->Predio_model->get_carros_usuario_predio_pendientes($data['user_id']);

            if ($data['carros_usuario_predio']) {
                $data['numero_de_carros'] = $data['carros_usuario_predio']->num_rows();
            }

        }
        if ($rol == 'gerente' || $rol == 'developer' || $rol == 'editor') {
            $data['carros'] = $this->Carros_model->ListarCarros_admin();
            $data['numero_de_carros'] = $data['carros']->num_rows();
        }
        $data['carros_individuales_publicados'] = $this->Marketing_model->get_carros_individuales_publicados_en_el_mes();
        $data['carros_pv9_publicados'] = $this->Marketing_model->get_carros_pv9_publicados_en_el_mes();
        echo $this->templates->render('admin/admin_home', $data);
    }

    //admin
    public function parametros()
    {
        $data = compobarSesion();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['parametros'] = $this->Admin_model->get_parametros();

        echo $this->templates->render('admin/admin_parametros', $data);
    }

    public function codigos_descuento()
    {
        $data = compobarSesion();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['cupones'] = $this->Admin_model->get_cupones();
        echo $this->templates->render('admin/admin_codigos_descuento', $data);
    }

    public function crear_cupon()
    {

        $data = compobarSesion();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['cupones'] = $this->Admin_model->get_cupones();
        echo $this->templates->render('admin/admin_crear_codigos_descuento', $data);
    }

    public function guardar_codigo_descuento()
    {
        $data = compobarSesion();
        //datos del cupon a array
        $datos_cupon = array(
            'nombre' => $this->input->post('nombre_input'),
            'tipo' => $this->input->post('tipo_input'),
            'valor' => $this->input->post('valor_cupon'),
            'ubicacion' => $this->input->post('ubicacion_input'),
            'codigo' => $this->input->post('codigo_input'),
        );
        //guardamos los datos del cupon
        $this->Admin_model->guardar_codigo_descuento($datos_cupon);
        redirect(base_url() . 'admin/codigos_descuento');
    }

    public function dar_de_baja_cupon()
    {
        $data = compobarSesion();
        $cupon_id = $this->uri->segment(3);
        //echo'dar de baja cupon '.$cupon_id;
        //dar de baja el cupon
        $this->Admin_model->dar_de_baja_cupon($cupon_id);
        redirect(base_url() . 'admin/crear_cupon');


    }

    public function validar_cupon()
    {
        //print_contenido($_POST);
        $codigo_cupon = $_POST['cupon_code'];
        $ubicacion_anuncio = $_POST['ubicacion_anuncio'];
        $datos_cupon = $this->Admin_model->get_cupon_by_code($codigo_cupon);
        //comrpobamos que se selecciono el anuncio
        if ($this->session->tipo_anuncio) {
            //comprobamos que el cupon exista
            if ($datos_cupon) {
                //datos del cupon
                $cupon = $datos_cupon->row();
                //comprobamos que el cupon se pueda usar en esa ubicacion y en ese tipo de anuncio
                //echo $ubicacion_anuncio.'<br>';
                //echo $cupon->cupon_ubicacion.'<br>';

                //echo $this->session->tipo_anuncio.'<br>';
                //echo $cupon->tipo_auncio.'<br>';
                if ($ubicacion_anuncio == $cupon->cupon_ubicacion or $cupon->cupon_ubicacion == 'TODOS') {
                    //echo $this->session->tipo_anuncio;
                    //echo $cupon->tipo_auncio;
                    if (strtoupper($this->session->tipo_anuncio) == strtoupper($cupon->tipo_auncio)) {
                        $datos_anuncio = array(
                            'cupon' => $cupon->codigo,
                        );
                        $this->session->set_userdata($datos_anuncio);
                        $json_cupon = json_encode($cupon);
                        $this->session->set_flashdata('mensaje', 'el cupon es valido');
                        echo $json_cupon;
                    } else {
                        $this->session->set_flashdata('error', 'el cupon no se puede usar en ese tipo de anuncio');
                        echo 'no anuncio';
                    }
                } else {
                    $this->session->set_flashdata('error', 'el cupon no es valido en ese departamento');
                    echo 'no ubicacion';
                }

            } else {
                echo 'no';
                $this->session->set_flashdata('mensaje', 'el cupon no es valido');
            }
        } else {
            echo 'no anuncio';
            $this->session->set_flashdata('error', 'Seleccione el tipo de anuncio que desea');
        }


    }

    public function sleccion_anuncio_session()
    {
        $codigo_cupon = $_POST['tipo_anuncio'];
        $datos_anuncio = array(
            'tipo_anuncio' => $codigo_cupon,
        );
        $this->session->set_userdata($datos_anuncio);
        //
        //
        //print_contenido($_SESSION);
    }

    public function actualizar_parametros()
    {
        //print_contenido($_POST);
        $post_data = array(
            'carros_bolsa' => $this->input->post('carros_bolsa'),
            'precio_vip' => $this->input->post('precio_vip'),
            'precio_individual' => $this->input->post('precio_individual'),
            'precio_feria' => $this->input->post('precio_feria'),
            'precio_facebook' => $this->input->post('precio_facebook'),
        );

        $this->Admin_model->actualizar_parametros($post_data);
        $this->session->set_flashdata('mensaje', 'Parametros actualizados');
        redirect(base_url() . 'index.php/admin/parametros/');

    }

    public function pendientes()
    {
        $data = compobarSesion();
        $rol = $data['rol'];
        $data['carros_pendientes'] = $this->Carros_model->numeroCarros_pendientes();
        $data['carros_pendientes_predio'] = $this->Carros_model->numeroCarros_pendientes_predio();
        $data['carros_pendientes_predio_9'] = $this->Carros_model->numeroCarros_pendientes_pv9();
        $data['carros_pendientes_fotos'] = $this->Carros_model->numeroCarros_pendientes_fotos();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['carros'] = $this->Carros_model->ListarCarros_pendientes();
        echo $this->templates->render('admin/admin_pendientes', $data);
    }

    public function pendientes_predio()
    {
        $data = compobarSesion();
        $rol = $data['rol'];
        $data['carros_pendientes'] = $this->Carros_model->numeroCarros_pendientes();
        $data['carros_pendientes_predio'] = $this->Carros_model->numeroCarros_pendientes_predio();
        $data['carros_pendientes_predio_9'] = $this->Carros_model->numeroCarros_pendientes_pv9();
        $data['carros_pendientes_fotos'] = $this->Carros_model->numeroCarros_pendientes_fotos();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['carros'] = $this->Carros_model->ListarCarros_pendientes_predio();
        echo $this->templates->render('admin/admin_pendientes', $data);
    }

    public function pendientes_pv9()
    {
        $data = compobarSesion();
        $rol = $data['rol'];
        $data['carros_pendientes'] = $this->Carros_model->numeroCarros_pendientes();
        $data['carros_pendientes_predio'] = $this->Carros_model->numeroCarros_pendientes_predio();
        $data['carros_pendientes_predio_9'] = $this->Carros_model->numeroCarros_pendientes_pv9();
        $data['carros_pendientes_fotos'] = $this->Carros_model->numeroCarros_pendientes_fotos();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['carros'] = $this->Carros_model->ListarCarros_pendientes_pv9();
        echo $this->templates->render('admin/admin_pendientes', $data);
    }

    public function pendientes_fotos()
    {
        $data = compobarSesion();
        $rol = $data['rol'];
        $data['carros_pendientes'] = $this->Carros_model->numeroCarros_pendientes();
        $data['carros_pendientes_predio'] = $this->Carros_model->numeroCarros_pendientes_predio();
        $data['carros_pendientes_predio_9'] = $this->Carros_model->numeroCarros_pendientes_pv9();
        $data['carros_pendientes_fotos'] = $this->Carros_model->numeroCarros_pendientes_fotos();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['carros'] = $this->Carros_model->ListarCarros_pendientes_fotos();
        echo $this->templates->render('admin/admin_pendientes', $data);
    }

    public function vehiculos()
    {
        $data = compobarSesion();
        $rol = $data['rol'];
        $data['numero_de_carros'] = 0;
        $data['carros'] = false;


        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        if ($data['rol'] == 'predio') {

            $user = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
            $user = $user->row();
            //echo $predio;
            $data['carros_predio'] = $this->Predio_model->get_carros_predios($user->predio_id);
            $data['carros_usuario_predio'] = $this->Predio_model->get_carros_predio_usuario($data['user_id']);

            //$data['carros'] =$data['carros_predio'];
            $data['carros'] = $data['carros_usuario_predio'];
        }
        if ($data['rol'] == 'externo') {

            $user = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
            $user = $user->row();
            //echo $predio;
            $data['carros_predio'] = $this->Predio_model->get_carros_predios($user->predio_id);
            $data['carros_usuario_predio'] = $this->Predio_model->get_carros_predio_usuario($data['user_id']);

            //$data['carros'] =$data['carros_predio'];
            $data['carros'] = $data['carros_usuario_predio'];
        }
        if ($rol == 'gerente' || $rol == 'developer' || $rol == 'editor' || $rol == 'marketing' || $rol == 'supervisor') {
            $data['carros'] = $this->Carros_model->ListarCarros_admin();
        }

        echo $this->templates->render('admin/admin_carros', $data);
    }

    public function vehiculos_test()
    {
        $data = compobarSesion();

        $rol = $data['rol'];
        $data['numero_de_carros'] = 0;
        $data['carros'] = false;


        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        if ($data['rol'] == 'predio') {
            $predios = $this->Predio_model->get_predios_for_user($data['user_id']);
            $predios_array = array();
            foreach ($predios->result() as $predio) {
                $predios_array[] = $predio->predio_id;
            }
            $predio = implode(", ", $predios_array);
            //echo $predio;
            $data['carros_predio'] = $this->Predio_model->get_carros_predios($predio);
            $data['carros'] = $data['carros_predio'];
        }
        if ($rol == 'gerente' || $rol == 'developer' || $rol == 'editor') {
            $data['carros'] = $this->Carros_model->ListarCarros_admin();
        }

        echo $this->templates->render('admin/admin_carros', $data);
    }

    public function carros_de_baja()
    {
        $data = compobarSesion();

        $rol = $data['rol'];
        $data['numero_de_carros'] = 0;
        $data['carros'] = false;


        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        if ($data['rol'] == 'predio') {
            $user = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
            $user = $user->row();
            //echo $predio;
            $data['carros_predio'] = $this->Predio_model->get_carros_predios_baja($user->predio_id);
            $data['carros'] = $data['carros_predio'];
        }
        if ($data['rol'] == 'externo') {
            //carros de baja de usuario externo
            $data['carros'] = $this->Carros_model->get_carros_baja_externos_by_user_id($data['user_id']);
        }
        if ($rol == 'gerente' || $rol == 'developer' || $rol == 'editor') {
            $data['carros'] = $this->Carros_model->ListarCarros_admin_baja();
        }

        echo $this->templates->render('admin/carro_baja', $data);
    }

    public function renovaciones_carros()
    {
        $data = compobarSesion();
        $rol = $data['rol'];
        if ($rol == 'developer' || $rol == 'gerente' || $rol == 'editor' || $rol == 'marketing') {
            //si tiene permisos no hacer nada sino
        } else {
            //redirigir a vehiculos
            redirect(base_url() . 'admin/vehiculos');
        }

        $data['carros'] = $this->Carros_model->listarCarro_individuales_admin();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/carro_renovacion', $data);
    }

    public function editarCarro()
    {
        $data = compobarSesion();
        $data['titulo'] = 'editar carro';
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

        $carro_r = $data['carro']->row();

        $data['linea'] = $this->Carros_model->lineas_vehiculo($carro_r->id_tipo_carro, $carro_r->id_marca);

        echo $this->templates->render('admin/admin_editarCarro', $data);

    }

    public function editarCarroPredio()
    {
        $data = compobarSesion();
        $data['titulo'] = 'editar carro';
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

        $carro_r = $data['carro']->row();

        $data['linea'] = $this->Carros_model->lineas_vehiculo($carro_r->id_tipo_carro, $carro_r->id_marca);

        echo $this->templates->render('admin/admin_editarCarroPredio', $data);

    }

    public function revisar_carro()
    {
        $data = compobarSesion();
        $data['titulo'] = 'editar carro';
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);
        $carro = $data['carro']->row();
        $cliente_id = $carro->user_id;

        $data['usuario'] = $this->Cliente_model->get_cliente_data($cliente_id);
        $data['pagos_carro'] = $this->Pagos_model->get_pagos_user_admin($cliente_id, $carro->id_carro);
        if ($cliente_id == '0') {
            $data['pagos_carro'] = false;
        }
        //$data['pagos_carro'] = $this->Pagos_model->get_pagos_carro_admin($data['id_carro']);

        $carro_r = $data['carro']->row();
        $data['linea'] = $this->Carros_model->lineas_vehiculo($carro_r->id_tipo_carro, $carro_r->id_marca);

        echo $this->templates->render('admin/admin_revisar_Carro', $data);
    }

    public function aprovar_carro()
    {
        $data = compobarSesion();
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);
        $carro_r = $data['carro']->row();

        $data['linea'] = $this->Carros_model->lineas_vehiculo($carro_r->id_tipo_carro, $carro_r->id_marca);

        echo $this->templates->render('admin/admin_revisar_Carro', $data);
    }

    public function actualizar_carro()
    {
        /*echo '<pre>';
        print_r($_POST);
        echo '</pre>';*/
        $datos = array(
            'id_carro' => $this->input->post('carro_id'),
            'crr_codigo' => $this->input->post('codigo'),
            'crr_fecha' => $this->input->post('fecha'),
            'crr_placa' => $this->input->post('placa'),
            'id_tipo_carro' => $this->input->post('tipo_carro'),
            'id_marca' => $this->input->post('marca_carro'),
            'id_linea' => $this->input->post('linea_carro'),
            'id_ubicacion' => $this->input->post('ubicacion_carro'),
            'crr_moneda_precio' => $this->input->post('moneda_carro'),
            'crr_precio' => $this->input->post('precio'),
            //'crr_descripcion'          => $this->input->post('avaluo_comercial'),
            //'crr_img'                  => $this->input->post('avaluo_comercial'),
            //'crr_img_ext'              => $this->input->post('avaluo_comercial'),
            //'crr_img_path'             => $this->input->post('avaluo_comercial'),
            'crr_modelo' => $this->input->post('modelo'),
            'crr_origen' => $this->input->post('origen_carro'),
            'crr_ac' => $this->input->post('ac'),
            'crr_alarma' => $this->input->post('alarma'),
            'crr_aros_magnecio' => $this->input->post('aros_m'),
            'crr_bolsas_aire' => $this->input->post('bolsa_aire'),
            'crr_cerradura_central' => $this->input->post('cerradura_c'),
            'crr_cilindros' => $this->input->post('cilindros'),
            'crr_color' => $this->input->post('color'),
            'crr_combustible' => $this->input->post('combustible_carro'),
            'crr_espejos' => $this->input->post('espejos_e'),
            'crr_kilometraje' => $this->input->post('kilometraje'),
            'crr_motor' => $this->input->post('motor'),
            'crr_platos' => $this->input->post('platos'),
            'crr_polarizado' => $this->input->post('polarizado'),
            'crr_puertas' => $this->input->post('puertas_carro'),
            'crr_radio' => $this->input->post('radio'),
            'crr_sunroof' => $this->input->post('sun_roof'),
            'crr_tapiceria' => $this->input->post('tapiceria_carro'),
            'crr_timon_hidraulico' => $this->input->post('timon_h'),
            'crr_transmision' => $this->input->post('transmision_carro'),
            'crr_4x4' => $this->input->post('t4x4'),
            'crr_vidrios_electricos' => $this->input->post('vidrios_e'),
            //'crr_suspension_delantera' => $this->input->post('avaluo_comercial'),
            //'crr_suspension_trasera'   => $this->input->post('avaluo_comercial'),
            'crr_freno_delantero' => $this->input->post('freno_delantero'),
            'crr_freno_trasero' => $this->input->post('freno_trasero'),
            'crr_blindaje' => $this->input->post('blindaje'),
            //'crr_caja'                 => $this->input->post('avaluo_comercial'),
            //'crr_freno'                => $this->input->post('avaluo_comercial'),
            //'crr_suspension'           => $this->input->post('avaluo_comercial'),
            //'crr_ejes'                 => $this->input->post('avaluo_comercial'),
            'crr_otros' => $this->input->post('otros'),
            'crr_estado' => 'Usado',
            //'crr_contacto'             => $this->input->post('avaluo_comercial'),
            'crr_contacto_nombre' => $this->input->post('nombre_contacto'),
            'crr_contacto_telefono' => $this->input->post('telefono_contacto'),
            'crr_contacto_email' => $this->input->post('email'),
            'crr_estatus' => $this->input->post('estado_carro'),
            'id_predio_virtual' => $this->input->post('predio_id'),
            //'crr_date'                 => $this->input->post('avaluo_comercial'),
            'crr_premium' => $this->input->post('premium'),
            'crr_certiauto' => $this->input->post('certiauto'),
            //'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
            //'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
            'crr_nombre_propietario' => $this->input->post('nombre_cliente'),
            'crr_telefono_propietario' => $this->input->post('telefono_cliente'),
            'crr_vencimiento' => $this->input->post('vencimiento'),
            'garantia_gp' => $this->input->post('garantia_gp'),
        );
        $this->Carros_model->actualizar_carro($datos);

        $this->session->set_flashdata('mensaje', 'Carro actualizado correctamente');
        // user hasen't submitted anything yet!
        redirect(base_url() . 'index.php/admin/editarCarro/' . $datos['id_carro'], 'refresh');


    }

    //crear carro gerente developer editor
    public function crearCarro()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Crear carro';

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        echo $this->templates->render('admin/admin_crearCarro', $data);

    }

    public function guardar_carro()
    {
        $data = compobarSesion();

        $datos_carro = array(
            //'id_carro' => $this->input->post('codigo'),
            //'crr_codigo' => $this->input->post('codigo'),
            'crr_fecha' => $this->input->post('fecha'),
            'crr_placa' => $this->input->post('placa'),
            'id_tipo_carro' => $this->input->post('tipo_carro'),
            'id_marca' => $this->input->post('marca_carro'),
            'id_linea' => $this->input->post('linea_carro'),
            'id_ubicacion' => $this->input->post('ubicacion_carro'),
            'crr_moneda_precio' => $this->input->post('moneda_carro'),
            'crr_precio' => $this->input->post('precio'),
            //'crr_descripcion'          => $this->input->post('avaluo_comercial'),
            'crr_img' => $this->input->post('codigo') . '.jpg',
            //'crr_img_ext'              => $this->input->post('avaluo_comercial'),
            //'crr_img_path'             => $this->input->post('avaluo_comercial'),
            'crr_modelo' => $this->input->post('modelo'),
            'crr_origen' => $this->input->post('origen_carro'),
            'crr_ac' => $this->input->post('ac'),
            'crr_alarma' => $this->input->post('alarma'),
            'crr_aros_magnecio' => $this->input->post('aros_m'),
            'crr_bolsas_aire' => $this->input->post('bolsa_aire'),
            'crr_cerradura_central' => $this->input->post('cerradura_c'),
            'crr_cilindros' => $this->input->post('cilindros'),
            'crr_color' => $this->input->post('color'),
            'crr_combustible' => $this->input->post('combustible_carro'),
            'crr_espejos' => $this->input->post('espejos_e'),
            'crr_kilometraje' => $this->input->post('kilometraje'),
            'crr_motor' => $this->input->post('motor'),
            'crr_platos' => $this->input->post('platos'),
            'crr_polarizado' => $this->input->post('polarizado'),
            'crr_puertas' => $this->input->post('puertas_carro'),
            'crr_radio' => $this->input->post('radio'),
            'crr_sunroof' => $this->input->post('sun_roof'),
            'crr_tapiceria' => $this->input->post('tapiceria_carro'),
            'crr_timon_hidraulico' => $this->input->post('timon_h'),
            'crr_transmision' => $this->input->post('transmision_carro'),
            'crr_4x4' => $this->input->post('t4x4'),
            'crr_vidrios_electricos' => $this->input->post('vidrios_e'),
            //'crr_suspension_delantera' => $this->input->post('avaluo_comercial'),
            //'crr_suspension_trasera'   => $this->input->post('avaluo_comercial'),
            'crr_freno_delantero' => $this->input->post('freno_delantero'),
            'crr_freno_trasero' => $this->input->post('freno_trasero'),
            'crr_blindaje' => $this->input->post('blindaje'),
            //'crr_caja'                 => $this->input->post('avaluo_comercial'),
            //'crr_freno'                => $this->input->post('avaluo_comercial'),
            //'crr_suspension'           => $this->input->post('avaluo_comercial'),
            //'crr_ejes'                 => $this->input->post('avaluo_comercial'),
            'crr_otros' => $this->input->post('otros'),
            'crr_estado' => 'Usado',
            //'crr_contacto'             => $this->input->post('avaluo_comercial'),
            'crr_contacto_nombre' => $this->input->post('nombre_contacto'),
            'crr_contacto_telefono' => $this->input->post('telefono_contacto'),
            'crr_contacto_email' => $this->input->post('email'),
            'crr_estatus' => $this->input->post('estado_carro'),
            'id_predio_virtual' => $this->input->post('predio_id'),
            //'crr_date'                 => $this->input->post('avaluo_comercial'),
            'crr_premium' => $this->input->post('premium'),
            'crr_certiauto' => $this->input->post('certiauto'),
            //'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
            //'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
            'crr_nombre_propietario' => $this->input->post('nombre_cliente'),
            'crr_telefono_propietario' => $this->input->post('telefono_cliente'),
            'crr_vencimiento' => $this->input->post('vencimiento'),
            'user_predio' => $this->input->post('user_predio'),
            'garantia_gp' => $this->input->post('garantia_gp'),
        );
        $id_carro = $this->Carros_model->crear_carro($datos_carro);
        $datos_transaccion = array(
            'fecha' => $this->input->post('fecha'),
            'id_carro' => $id_carro,
            'boleta' => $this->input->post('boleta'),
            'banco' => $this->input->post('banco'),
            'tipo' => $this->input->post('tipo'),
            'id_usuario' => $data['user_id'],
        );

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        echo '<pre>';
        print_r($datos_transaccion);
        echo '</pre>';*/

        $this->Carros_model->guardar_transaccion($datos_transaccion);

        $datos_pago = array(
            'user_predio_id' => $data['user_id'],
            'carro_id' => $id_carro,
            'metodo' => $this->input->post('metodo_pago'),
            'monto_pago' => $this->input->post('monto_pago'),
            'banco' => $this->input->post('banco'),
            'boleta' => $this->input->post('boleta'),
        );
        //$this->Pagos_model->guardar_pago_admin($datos_pago);
        $this->session->set_flashdata('mensaje', 'Carro creado correctamente');
        redirect(base_url() . 'admin/subir_fotos/' . $id_carro, 'refresh');
    }

    //crear carro asesor
    public function crear_carro_asesor()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Crear carro';

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        echo $this->templates->render('admin/admin_crearCarro_asesor', $data);
    }

    public function guardar_carro_asesor()
    {
        $data = compobarSesion();

        $datos_carro = array(
            //'id_carro' => $this->input->post('codigo'),
            //'crr_codigo' => $this->input->post('codigo'),
            'crr_fecha' => $this->input->post('fecha'),
            'crr_placa' => $this->input->post('placa'),
            'id_tipo_carro' => $this->input->post('tipo_carro'),
            'id_marca' => $this->input->post('marca_carro'),
            'id_linea' => $this->input->post('linea_carro'),
            'id_ubicacion' => $this->input->post('ubicacion_carro'),
            'crr_moneda_precio' => $this->input->post('moneda_carro'),
            'crr_precio' => $this->input->post('precio'),
            //'crr_descripcion'          => $this->input->post('avaluo_comercial'),
            'crr_img' => $this->input->post('codigo') . '.jpg',
            //'crr_img_ext'              => $this->input->post('avaluo_comercial'),
            //'crr_img_path'             => $this->input->post('avaluo_comercial'),
            'crr_modelo' => $this->input->post('modelo'),
            'crr_origen' => $this->input->post('origen_carro'),
            'crr_ac' => $this->input->post('ac'),
            'crr_alarma' => $this->input->post('alarma'),
            'crr_aros_magnecio' => $this->input->post('aros_m'),
            'crr_bolsas_aire' => $this->input->post('bolsa_aire'),
            'crr_cerradura_central' => $this->input->post('cerradura_c'),
            'crr_cilindros' => $this->input->post('cilindros'),
            'crr_color' => $this->input->post('color'),
            'crr_combustible' => $this->input->post('combustible_carro'),
            'crr_espejos' => $this->input->post('espejos_e'),
            'crr_kilometraje' => $this->input->post('kilometraje'),
            'crr_motor' => $this->input->post('motor'),
            'crr_platos' => $this->input->post('platos'),
            'crr_polarizado' => $this->input->post('polarizado'),
            'crr_puertas' => $this->input->post('puertas_carro'),
            'crr_radio' => $this->input->post('radio'),
            'crr_sunroof' => $this->input->post('sun_roof'),
            'crr_tapiceria' => $this->input->post('tapiceria_carro'),
            'crr_timon_hidraulico' => $this->input->post('timon_h'),
            'crr_transmision' => $this->input->post('transmision_carro'),
            'crr_4x4' => $this->input->post('t4x4'),
            'crr_vidrios_electricos' => $this->input->post('vidrios_e'),
            //'crr_suspension_delantera' => $this->input->post('avaluo_comercial'),
            //'crr_suspension_trasera'   => $this->input->post('avaluo_comercial'),
            'crr_freno_delantero' => $this->input->post('freno_delantero'),
            'crr_freno_trasero' => $this->input->post('freno_trasero'),
            'crr_blindaje' => $this->input->post('blindaje'),
            //'crr_caja'                 => $this->input->post('avaluo_comercial'),
            //'crr_freno'                => $this->input->post('avaluo_comercial'),
            //'crr_suspension'           => $this->input->post('avaluo_comercial'),
            //'crr_ejes'                 => $this->input->post('avaluo_comercial'),
            'crr_otros' => $this->input->post('otros'),
            'crr_estado' => 'Usado',
            //'crr_contacto'             => $this->input->post('avaluo_comercial'),
            'crr_contacto_nombre' => $this->input->post('nombre_contacto'),
            'crr_contacto_telefono' => $this->input->post('telefono_contacto'),
            'crr_contacto_email' => 'info@gpautos.net',
            'crr_estatus' => 'Pendiente',
            'id_predio_virtual' => '9',
            //'crr_date'                 => $this->input->post('avaluo_comercial'),
            'crr_premium' => 'si',
            'crr_certiauto' => 'si',
            //'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
            //'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
            'crr_nombre_propietario' => $this->input->post('nombre_cliente'),
            'crr_telefono_propietario' => $this->input->post('telefono_cliente'),
            'crr_vencimiento' => $this->input->post('vencimiento'),
            'user_predio' => $this->input->post('user_predio'),
            'garantia_gp' => $this->input->post('garantia_gp'),
        );
        $id_carro = $this->Carros_model->crear_carro($datos_carro);
        $datos_transaccion = array(
            'fecha' => $this->input->post('fecha'),
            'id_carro' => $id_carro,
            'boleta' => $this->input->post('boleta'),
            'banco' => $this->input->post('banco'),
            'tipo' => $this->input->post('tipo'),
            'id_usuario' => $data['user_id'],
        );

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        echo '<pre>';
        print_r($datos_transaccion);
        echo '</pre>';*/

        $this->Carros_model->guardar_transaccion($datos_transaccion);

        $datos_pago = array(
            'user_predio_id' => $data['user_id'],
            'carro_id' => $id_carro,
            'metodo' => $this->input->post('metodo_pago'),
            'monto_pago' => $this->input->post('monto_pago'),
            'banco' => $this->input->post('banco'),
            'boleta' => $this->input->post('boleta'),

        );
        $this->Pagos_model->guardar_pago_admin($datos_pago);
        $this->session->set_flashdata('mensaje', 'Carro creado correctamente');
        redirect(base_url() . 'admin/subir_fotos/' . $id_carro, 'refresh');

    }

    //crear carro predio
    public function crearCarro_predio()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Crear carro';

        if ($data['rol'] == 'predio') {

            $user = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
            $user = $user->row();
            $carros_permitidos = $user->carros_permitidos;
            $carros_activos = $this->Carros_model->get_carros_activos_by_user_id($user->id);

            if ($carros_activos < $carros_permitidos) {
            } else {

                $this->session->set_flashdata('mensaje', 'Ha llegado a su limite de carros permitidos');
                redirect(base_url() . 'admin/vehiculos');
            }
            //echo $predio;
            $data['carros_predio'] = $this->Predio_model->get_carros_predios($user->predio_id);

            $data['carros'] = $data['carros_predio'];
            $data['predio_id'] = $user->predio_id;
        }

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }


        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        //$data['carro']        = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

        //$carro_r = $data['carro']->row();

        //$data['linea'] = $this->Carros_model->lineas_vehiculo($carro_r->id_tipo_carro, $carro_r->id_marca);

        echo $this->templates->render('admin/admin_crearCarro_predio', $data);

    }

    public function guardar_carro_predio()
    {
        $data = compobarSesion();

        $datos = array(
            // 'id_carro' => $this->input->post('codigo'),
            // 'crr_codigo' => $this->input->post('codigo'),
            'crr_fecha' => $this->input->post('fecha'),
            'crr_placa' => $this->input->post('placa'),
            'id_tipo_carro' => $this->input->post('tipo_carro'),
            'id_marca' => $this->input->post('marca_carro'),
            'id_linea' => $this->input->post('linea_carro'),
            'id_ubicacion' => $this->input->post('ubicacion_carro'),
            'crr_moneda_precio' => $this->input->post('moneda_carro'),
            'crr_precio' => $this->input->post('precio'),
            //'crr_descripcion'          => $this->input->post('avaluo_comercial'),
            'crr_img' => $this->input->post('codigo') . '.jpg',
            //'crr_img_ext'              => $this->input->post('avaluo_comercial'),
            //'crr_img_path'             => $this->input->post('avaluo_comercial'),
            'crr_modelo' => $this->input->post('modelo'),
            'crr_origen' => $this->input->post('origen_carro'),
            'crr_ac' => $this->input->post('ac'),
            'crr_alarma' => $this->input->post('alarma'),
            'crr_aros_magnecio' => $this->input->post('aros_m'),
            'crr_bolsas_aire' => $this->input->post('bolsa_aire'),
            'crr_cerradura_central' => $this->input->post('cerradura_c'),
            'crr_cilindros' => $this->input->post('cilindros'),
            'crr_color' => $this->input->post('color'),
            'crr_combustible' => $this->input->post('combustible_carro'),
            'crr_espejos' => $this->input->post('espejos_e'),
            'crr_kilometraje' => $this->input->post('kilometraje'),
            'crr_motor' => $this->input->post('motor'),
            'crr_platos' => $this->input->post('platos'),
            'crr_polarizado' => $this->input->post('polarizado'),
            'crr_puertas' => $this->input->post('puertas_carro'),
            'crr_radio' => $this->input->post('radio'),
            'crr_sunroof' => $this->input->post('sun_roof'),
            'crr_tapiceria' => $this->input->post('tapiceria_carro'),
            'crr_timon_hidraulico' => $this->input->post('timon_h'),
            'crr_transmision' => $this->input->post('transmision_carro'),
            'crr_4x4' => $this->input->post('t4x4'),
            'crr_vidrios_electricos' => $this->input->post('vidrios_e'),
            //'crr_suspension_delantera' => $this->input->post('avaluo_comercial'),
            //'crr_suspension_trasera'   => $this->input->post('avaluo_comercial'),
            'crr_freno_delantero' => $this->input->post('freno_delantero'),
            'crr_freno_trasero' => $this->input->post('freno_trasero'),
            'crr_blindaje' => $this->input->post('blindaje'),
            //'crr_caja'                 => $this->input->post('avaluo_comercial'),
            //'crr_freno'                => $this->input->post('avaluo_comercial'),
            //'crr_suspension'           => $this->input->post('avaluo_comercial'),
            //'crr_ejes'                 => $this->input->post('avaluo_comercial'),
            'crr_otros' => $this->input->post('otros'),
            'crr_estado' => 'Usado',
            //'crr_contacto'             => $this->input->post('avaluo_comercial'),
            'crr_contacto_nombre' => $this->input->post('nombre_contacto'),
            'crr_contacto_telefono' => $this->input->post('telefono_contacto'),
            'crr_contacto_email' => $this->input->post('email'),
            'crr_estatus' => 'Pendiente',
            'id_predio_virtual' => $this->input->post('predio_id'),
            //'crr_date'                 => $this->input->post('avaluo_comercial'),
            'crr_premium' => 'no',
            'crr_certiauto' => 'no',
            //'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
            //'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
            'crr_nombre_propietario' => $this->input->post('nombre_cliente'),
            'crr_telefono_propietario' => $this->input->post('telefono_cliente'),
            'crr_vencimiento' => $this->input->post('vencimiento'),
            'user_predio' => $this->input->post('user_predio'),
            'garantia_gp' => '1',
        );

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        echo '<pre>';
        print_r($datos_transaccion);
        echo '</pre>';*/

        $id_carro = $this->Carros_model->crear_carro($datos);

        $this->session->set_flashdata('mensaje', 'Carro creado correctamente');
        redirect(base_url() . 'admin/subir_fotos/' . $id_carro, 'refresh');
    }

    //crear carro externo
    public function crearCarro_externos()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Crear carro';

        if ($data['rol'] == 'externo') {

            $user = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
            $user = $user->row();
            $carros_permitidos = $user->carros_permitidos;
            $carros_activos = $this->Carros_model->get_carros_activos_by_user_id($user->id);

            if ($carros_activos < $carros_permitidos) {
            } else {

                $this->session->set_flashdata('mensaje', 'Ha llegado a su limite de carros permitidos');
                redirect(base_url() . 'admin/vehiculos');
            }
            //echo $predio;
            $data['carros_predio'] = $this->Predio_model->get_carros_predios($user->predio_id);

            $data['carros'] = $data['carros_predio'];
            $data['predio_id'] = $user->predio_id;
        }

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }


        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        echo $this->templates->render('admin/admin_crearCarro_externo', $data);

    }

    public function guardar_carro_externo()
    {
        $data = compobarSesion();

        $datos = array(
            // 'id_carro' => $this->input->post('codigo'),
            // 'crr_codigo' => $this->input->post('codigo'),
            'crr_fecha' => $this->input->post('fecha'),
            'crr_placa' => $this->input->post('placa'),
            'id_tipo_carro' => $this->input->post('tipo_carro'),
            'id_marca' => $this->input->post('marca_carro'),
            'id_linea' => $this->input->post('linea_carro'),
            'id_ubicacion' => $this->input->post('ubicacion_carro'),
            'crr_moneda_precio' => $this->input->post('moneda_carro'),
            'crr_precio' => $this->input->post('precio'),
            //'crr_descripcion'          => $this->input->post('avaluo_comercial'),
            'crr_img' => $this->input->post('codigo') . '.jpg',
            //'crr_img_ext'              => $this->input->post('avaluo_comercial'),
            //'crr_img_path'             => $this->input->post('avaluo_comercial'),
            'crr_modelo' => $this->input->post('modelo'),
            'crr_origen' => $this->input->post('origen_carro'),
            'crr_ac' => $this->input->post('ac'),
            'crr_alarma' => $this->input->post('alarma'),
            'crr_aros_magnecio' => $this->input->post('aros_m'),
            'crr_bolsas_aire' => $this->input->post('bolsa_aire'),
            'crr_cerradura_central' => $this->input->post('cerradura_c'),
            'crr_cilindros' => $this->input->post('cilindros'),
            'crr_color' => $this->input->post('color'),
            'crr_combustible' => $this->input->post('combustible_carro'),
            'crr_espejos' => $this->input->post('espejos_e'),
            'crr_kilometraje' => $this->input->post('kilometraje'),
            'crr_motor' => $this->input->post('motor'),
            'crr_platos' => $this->input->post('platos'),
            'crr_polarizado' => $this->input->post('polarizado'),
            'crr_puertas' => $this->input->post('puertas_carro'),
            'crr_radio' => $this->input->post('radio'),
            'crr_sunroof' => $this->input->post('sun_roof'),
            'crr_tapiceria' => $this->input->post('tapiceria_carro'),
            'crr_timon_hidraulico' => $this->input->post('timon_h'),
            'crr_transmision' => $this->input->post('transmision_carro'),
            'crr_4x4' => $this->input->post('t4x4'),
            'crr_vidrios_electricos' => $this->input->post('vidrios_e'),
            //'crr_suspension_delantera' => $this->input->post('avaluo_comercial'),
            //'crr_suspension_trasera'   => $this->input->post('avaluo_comercial'),
            'crr_freno_delantero' => $this->input->post('freno_delantero'),
            'crr_freno_trasero' => $this->input->post('freno_trasero'),
            'crr_blindaje' => $this->input->post('blindaje'),
            //'crr_caja'                 => $this->input->post('avaluo_comercial'),
            //'crr_freno'                => $this->input->post('avaluo_comercial'),
            //'crr_suspension'           => $this->input->post('avaluo_comercial'),
            //'crr_ejes'                 => $this->input->post('avaluo_comercial'),
            'crr_otros' => $this->input->post('otros'),
            'crr_estado' => 'Usado',
            //'crr_contacto'             => $this->input->post('avaluo_comercial'),
            'crr_contacto_nombre' => 'PROPIETARIO',
            'crr_contacto_telefono' => 'x',
            'crr_contacto_email' => 'x',
            'crr_estatus' => 'Pendiente',
            'id_predio_virtual' => '9',
            //'crr_date'                 => $this->input->post('avaluo_comercial'),
            'crr_premium' => 'no',
            'crr_certiauto' => 'no',
            //'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
            //'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
            'crr_nombre_propietario' => $this->input->post('nombre_cliente'),
            'crr_telefono_propietario' => $this->input->post('telefono_cliente'),
            'crr_vencimiento' => $this->input->post('vencimiento'),
            'user_predio' => $this->input->post('user_predio'),
            'garantia_gp' => '1',
        );

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';
        echo '<pre>';
        print_r($datos);
        echo '</pre>';*/


        $id_carro = $this->Carros_model->crear_carro($datos);

        $this->session->set_flashdata('mensaje', 'Carro creado correctamente');
        redirect(base_url() . 'admin/subir_fotos/' . $id_carro, 'refresh');
    }

    //Renovar carro
    public function renovar_carro()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Renovar carro';
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

        echo $this->templates->render('admin/admin_renovarCarro', $data);
    }

    public function subir_fotos()
    {
        $data = compobarSesion();
        $data['titulo'] = 'editar carro';
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

        $carro_r = $data['carro']->row();

        $data['linea'] = $this->Carros_model->lineas_vehiculo($carro_r->id_tipo_carro, $carro_r->id_marca);

        echo $this->templates->render('admin/admin_subir_fotos', $data);
    }

    public function borrar_imagen()
    {

        //Id de imagen desde segmento URL
        $carro_id = $data['imagen_id'] = $this->uri->segment(3);
        //Id de producto desde segmento URL
        $imagen_numero = $data['prducto_id'] = $this->uri->segment(4);
        //borrado de imagen

        if (file_exists('/home2/gpautos/public_html/web/images_cont/' . $carro_id . ' (' . $imagen_numero . ').jpg')) {
            //echo 'imagen existe';
            if (unlink('/home2/gpautos/public_html/web/images_cont/' . $carro_id . ' (' . $imagen_numero . ').jpg')) {
                $this->session->set_flashdata('mensaje', 'se borro la imagen');
                redirect(base_url() . '/admin/revisar_carro/' . $carro_id);
            } else {
                echo 'no se borro';
            }
        } else {

            //echo 'la imagen no existe';
        }

    }

    //FERIA
    public function agregar_a_feria()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Feria';
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

        echo $this->templates->render('admin/admin_agregar_a_feria', $data);
    }

    public function guardar_precio_feria()
    {
        $post_data = array(
            'id_carro' => $this->input->post('codigo'),
            'precio_feria' => $this->input->post('precio_feria'),
        );
        //print_r($post_data);
        $this->Carros_model->guardar_precio_feria($post_data);
        redirect(base_url() . 'admin/');
    }

    //CARROS
    public function disponibilidad()
    {
        $data = compobarSesion();
        echo $this->templates->render('admin/admin_disponibilidad', $data);
    }

    public function renovar_carro_p()
    {
        $data = compobarSesion();

        $datos_carro = array(
            'id_carro' => $this->input->post('carro_id'),
            'fecha_vencimiento' => $this->input->post('vencimiento'),
        );


        $datos_transaccion = array(
            'fecha' => $this->input->post('fecha'),
            'id_carro' => $this->input->post('carro_id'),
            'boleta' => $this->input->post('boleta'),
            'banco' => $this->input->post('banco'),
            'tipo' => $this->input->post('tipo'),
            'id_usuario' => $data['user_id'],

        );
        $this->Carros_model->renovar_carro($datos_carro);
        $this->Carros_model->guardar_transaccion($datos_transaccion);

        $this->session->set_flashdata('mensaje', 'Carro COD:' . $datos_carro['id_carro'] . ' renovado correctamente correctamente');
        redirect(base_url() . 'admin/', 'refresh');
    }

    public function reactivar_carro()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Renovar carro';
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

        echo $this->templates->render('admin/reactivar_carro', $data);
    }

    public function reactivar_carro_predio()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Renovar carro';
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['carro'] = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

        echo $this->templates->render('admin/reactivar_carro', $data);
    }

    public function reactivar_carro_p()
    {
        $data = compobarSesion();

        $datos_carro = array(
            'id_carro' => $this->input->post('carro_id'),
            'fecha_vencimiento' => $this->input->post('vencimiento'),
        );


        $datos_transaccion = array(
            'fecha' => $this->input->post('fecha'),
            'id_carro' => $this->input->post('carro_id'),
            'boleta' => $this->input->post('boleta'),
            'banco' => $this->input->post('banco'),
            'tipo' => $this->input->post('tipo'),
            'id_usuario' => $data['user_id'],

        );
        $this->Carros_model->reactivar_carro($datos_carro);
        $this->Carros_model->guardar_transaccion($datos_transaccion);

        $this->session->set_flashdata('mensaje', 'Carro COD:' . $datos_carro['id_carro'] . ' Reactivado correctamente correctamente');
        redirect(base_url() . 'admin/', 'refresh');
    }

    public function reactivar_carro_predio_p()
    {
        $data = compobarSesion();

        //id carro
        $data['id_carro'] = $this->uri->segment(3);
        $this->Carros_model->reactivar_carro_predio($data['id_carro']);
        redirect(base_url() . 'admin/vehiculos', 'refresh');
    }

    public function banners()
    {
        $data = compobarSesion();
        $data['banners'] = $this->Banners_model->banners();
        echo $this->templates->render('admin/admin_banners', $data);
    }

    public function editar_banner()
    {
        //id banner
        $data['id_banner'] = $this->uri->segment(3);
        $data['banner_data'] = $this->Banners_model->banner_data($data['id_banner']);
        echo $this->templates->render('admin/admin_editar_banner', $data);
    }

    public function crear_banner_header()
    {
        $data = compobarSesion();
        $data['titulo'] = 'Crear Banner Header';

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        echo $this->templates->render('admin/admin_crear_banner_header', $data);
    }

    public function guardar_banner_header()
    {
        $post_data = array(
            'titulo' => $this->input->post('titulo'),
            'link' => $this->input->post('link'),
            'imagen' => $this->input->post('imagen'),
            'area' => $this->input->post('area'),
            'vencimiento' => $this->input->post('vencimiento'),
            'estado' => $this->input->post('estado'),
        );
        //print_r($post_data);

        $this->Banners_model->crear_banners_header($post_data);
        redirect(base_url() . 'admin/banners_header/');
    }

    public function banners_header()
    {
        $data = compobarSesion();
        $data['banners'] = $this->Banners_model->banners_header();
        echo $this->templates->render('admin/admin_banners_header', $data);
    }

    public function editar_banner_header()
    {
        //id banner
        $data['id_banner'] = $this->uri->segment(3);
        $data['banner_data'] = $this->Banners_model->banner_header_data($data['id_banner']);
        echo $this->templates->render('admin/admin_editar_banner_header', $data);
    }

    public function actualizar_banner_header()
    {
        /* echo '<pre>';
         print_r($_POST);
         echo '</pre>';
         exit();*/
        $post_data = array(
            'id' => $this->input->post('id'),
            'titulo' => $this->input->post('titulo'),
            'link' => $this->input->post('link'),
            'imagen' => $this->input->post('imagen'),
            'area' => $this->input->post('area'),
            'vencimiento' => $this->input->post('vencimiento'),
            'estado' => $this->input->post('estado'),
        );
        //print_r($post_data);

        $this->Banners_model->actualizar_banners_header($post_data);
        redirect(base_url() . 'admin/banners_header/');
    }

    public function actualizar_banner()
    {
        $post_data = array(
            'id' => $this->input->post('id'),
            'titulo' => $this->input->post('titulo'),
            'link' => $this->input->post('link'),
            'imagen' => $this->input->post('imagen'),
            'area' => $this->input->post('area'),
            'vencimiento' => $this->input->post('vencimiento'),
            'estado' => $this->input->post('estado'),
        );
        //print_r($post_data);

        $this->Banners_model->actualizar_banners($post_data);
        redirect(base_url() . 'admin/banners/');
    }

    public function dar_de_baja_btn()
    {
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        $this->Carros_model->dar_baja_carro_id($data['id_carro']);
        echo "<script type='text/javascript'>";
        echo "window.close();";
        echo "</script>";
        //redirect(base_url() . 'admin');

    }

    public function activar_carro_btn()
    {
        //id carro
        $data['id_carro'] = $this->uri->segment(3);

        $this->Carros_model->dar_alta_carro_id($data['id_carro']);
        redirect(base_url() . 'admin/pendientes');

    }

    public function actualizar_estados_carros()
    {
        $carros_con_vencimiento = $this->Carros_model->carros_con_fecha_de_vencimiento();

        $fecha_actual = new DateTime();
        if ($carros_con_vencimiento) {
            echo '<table border="1">';
            echo '<th>';
            echo '<td>Id Carro</td>';
            echo '<td>Fecha actual</td>';
            echo '<td>Fecha vencimiento</td>';
            echo '<td>Diferencia en dias</td>';
            echo '</th>';

            foreach ($carros_con_vencimiento->result() as $carro) {
                $fecha_vencimiento = new DateTime($carro->crr_vencimiento);
                echo '<tr>';
                echo '<td></td>';
                echo '<td>' . $carro->id_carro . '</td>';
                echo '<td>' . $fecha_actual->format('Y-m-d') . '</td>';
                echo '<td>' . $fecha_vencimiento->format('Y-m-d') . '</td>';

                if ($fecha_actual < $fecha_vencimiento) {
                    echo '<td>Aun no se ha pasado la fecha de vencimiento</td>';
                } else {
                    $interval = $fecha_vencimiento->diff($fecha_actual);
                    $diferencia_dias = intval($interval->format('%R%a'));

                    /**
                     * dispay para exportar
                     */
                    //echo '<td>' . $diferencia_dias . '</td>';

                    //log para acciones

                    if ($diferencia_dias < 3) {

                        echo '<td>poner advertencia</td>';

                    } else {
                        echo '<td>mas de 3 dias dar de baja</td>';
                        //$this->Carros_model->dar_baja_carro_id($carro->id_carro);
                    }


                }
                echo '</tr>';
            }
            echo '</table>';
        }

        echo '<pre>';
        //print_r($carros_con_vencimiento->result());
        echo '</pre>';
    }

    public function carro_imagen()
    {
        $data = compobarSesion();
        $data['carros'] = $this->Carros_model->ListarCarros_admin();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/carro_imagen', $data);
    }

    //reportes
    public function trasancciones()
    {
        $data = compobarSesion();
        $data['transacciones'] = $this->Carros_model->get_transacciones();
        echo $this->templates->render('admin/transacciones', $data);

    }

    public function reporte_marketing()
    {
        $data = compobarSesion();
        //fechas de reporte
        if ($this->uri->segment(3)) {
            $data['de'] = $this->uri->segment(3);
        } else {
            $ayer = New DateTime();
            $ayer = $ayer->modify('-1 days');
            $data['de'] = $ayer->format('Y-m-d');
        }
        if ($this->uri->segment(4)) {
            $data['a'] = $this->uri->segment(4);
        } else {
            $hoy = New DateTime();
            $data['a'] = $hoy->format('Y-m-d');
        }


        //usuarios de marketing
        $usuarios_marketing = array('10', '78');
        $data['usuarios_marketing'] = $this->Marketing_model->usuarios_marketing($usuarios_marketing);


        echo $this->templates->render('admin/reporte_marketing', $data);
    }

    public function reporte_marketing_desglose_dia()
    {
        $data = compobarSesion();

        //fecha
        $fecha = $this->uri->segment(3);
        //subidas_ dia
        $data['numeros_agregados_flor'] = $this->Marketing_model->numeros_agregados_dia('78', $fecha);
        //bajadas dia
        $data['numeros_bajados_flor'] = $this->Marketing_model->numeros_bajados_dia('78', $fecha);
        //seguimientos dia
        $data['seguimientos_flor'] = $this->Marketing_model->numeros_seguimientos_dia('78', $fecha);
        //seguimientos dia

        echo $this->templates->render('admin/reporte_marketing_dia', $data);
    }

    //predios
    public function predios()
    {
        $data = compobarSesion();
        $rol = $data['rol'];
        $data['predios'] = $this->Predio_model->predios_activos();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        if ($rol != 'supervisor_predio') {
        echo $this->templates->render('admin/admin_predios', $data);
        }else{
            echo $this->templates->render('admin/admin_buscar_predio', $data);
        }
    }
    public function predios_baja()
    {
        $data = compobarSesion();
        $data['predios'] = $this->Predio_model->predios_baja();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/admin_predios', $data);
    }

    public function nuevo_predio()
    {
        $data = compobarSesion();
        $data['departamentos'] = $this->Admin_model->get_departamentos();
        echo $this->templates->render('admin/nuevo_predio', $data);
    }

    public function editrar_predio()
    {
        $data = compobarSesion();
        $data['id_predio'] = $this->uri->segment(3);
        $data['predio'] = $this->Predio_model->get_predio_data_admin($data['id_predio']);

        $data['departamentos'] = $this->Admin_model->get_departamentos();
        echo $this->templates->render('admin/admin_editar_predio', $data);
    }


    public function guardar_predio()
    {
        $post_data = array(
            'tipo_predio' => $this->input->post('tipo_predio'),
            'nombre' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'id_departamento' => $this->input->post('id_departamento'),
            'id_municipio' => $this->input->post('id_municipio'),
            'zona' => $this->input->post('zona'),
            'nombre_encargado' => $this->input->post('nombre_encargado'),
            'telefono_encargado' => $this->input->post('telefono_encargado'),
            'email_encargado' => $this->input->post('email_encargado'),
            'manta' => $this->input->post('manta'),
            'material_pop' => $this->input->post('material_pop'),
            'ruta' => $this->input->post('ruta'),
            'descripcion' => $this->input->post('descripcion'),
            'imagen' => $this->input->post('imagen'),
            'estado' => $this->input->post('estado'),
            'carros_activos' => $this->input->post('carros_activos'),
            'carros_permitidos' => $this->input->post('carros_permitidos'),
        );

        //print_r($post_data);
        $predio_id = $this->Predio_model->guardar_predio($post_data);

        //notificacion de predio nuevo
        //configuracion de correo
        $config['mailtype'] = 'html';

        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@gpautos.net',
            'smtp_pass' => 'JdGg2005gp',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        $this->email->initialize($configGmail);


        $this->email->from('info@gpautos.net', 'GP AUTOS');
        $this->email->to('gerencia@gpautos.net');
        $this->email->bcc('csamayoa@zenstudiogt.com');

        $this->email->subject('Se guardo un nuevo predio');

        //mensaje
        $message = '<html><body>';
        $message .= '<img src="'.base_url().'/ui/public/images/logoGp.png" alt="GP AUTOS" />';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr style='background: #eee;'><td><strong>Id predio:</strong> </td><td>" . strip_tags($predio_id) ."</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";

        $this->email->message($message);

        //enviar correo
        $this->email->send();

        redirect(base_url() . 'admin/predios/');
    }

    public function actualizar_predio()
    {
        /*print_contenido($_POST);
        exit();*/

        $post_data = array(
            'id' => $this->input->post('id'),
            'tipo_predio' => $this->input->post('tipo_predio'),
            'nombre' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'id_departamento' => $this->input->post('id_departamento'),
            'id_municipio' => $this->input->post('id_municipio'),
            'zona' => $this->input->post('zona'),
            'nombre_encargado' => $this->input->post('nombre_encargado'),
            'telefono_encargado' => $this->input->post('telefono_encargado'),
            'email_encargado' => $this->input->post('email_encargado'),
            'manta' => $this->input->post('manta'),
            'material_pop' => $this->input->post('material_pop'),
            'ruta' => $this->input->post('ruta'),
            'descripcion' => $this->input->post('descripcion'),
            'imagen' => $this->input->post('imagen'),
            'estado' => $this->input->post('estado'),
            'carros_activos' => $this->input->post('carros_activos'),
            'carros_permitidos' => $this->input->post('carros_permitidos'),
        );
        /*
    [id] => 9
    [tipo_predio] => pv9
    [nombre] => GP AUTOS
    [direccion] => 2da Avenida 20-29 Zona 10
    [telefono] => 2376-0404
    [id_departamento] => 7
    [id_municipio] => 85
    [municipio] => 10
    [manta] => no
    [material_pop] => pop
    [descripcion] => descir
    [imagen] => gp.jpg
    [estado] => Alta
    [carros_activos] => 0
    [carros_permitidos] => 0

        */

        //print_r($post_data);
        $this->Predio_model->actualizar_predio($post_data);
        redirect(base_url() . 'admin/predios/');
    }

    public function predio_pendientes()
    {
        $data = compobarSesion();
        $rol = $data['rol'];
        $data['carros_pendientes'] = $this->Carros_model->numeroCarros_pendientes();
        $data['carros_pendientes_predio'] = $this->Carros_model->numeroCarros_pendientes_predio();
        $data['carros_pendientes_predio_9'] = $this->Carros_model->numeroCarros_pendientes_pv9();
        $data['carros_pendientes_fotos'] = $this->Carros_model->numeroCarros_pendientes_fotos();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $data['carros'] = $this->Carros_model->ListarCarros_pendientes();
        echo $this->templates->render('admin/admin_pendientes', $data);
    }

    function subir_foto_predio()
    {
    }

    function get_municipio_departamento()
    {
        header("Access-Control-Allow-Origin: *");

        $departamento = $this->uri->segment(3);
        //pasamos variablea al modelo
        $departamentos = $this->Admin_model->get_municipios_departamento($departamento);
        //imprimimos en formato json el resultado
        if ($departamentos) {
            echo json_encode($departamentos->result_array());
        }

    }

    //usuarios de predios
    public function usuarios()
    {
        $data = compobarSesion();
        $data['usuarios'] = $this->Usuarios_model->get_usuarios();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/admin_users', $data);
    }

    public function editar_usuario()
    {
        $data = compobarSesion();
        $data['titulo'] = 'editar usuario';
        $data['user_id'] = $this->uri->segment(3);
        $data['usuario'] = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
        $data['predios'] = $this->Predio_model->predios_admin();
        $data['predios_asignados'] = $this->Predio_model->predios_asignados($data['user_id']);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/admin_editar_usuario', $data);
    }

    public function crear_usuario()
    {
        $data = compobarSesion();
        $data['user_id'] = $this->uri->segment(3);
        $data['usuario'] = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
        $data['predios'] = $this->Predio_model->predios_admin();
        $data['predios_asignados'] = $this->Predio_model->predios_asignados($data['user_id']);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/admin_crear_usuario', $data);
    }

    public function guardar_usuario()
    {
        $post_data = array(
            'username' => $this->input->post('username'),
            'correo' => $this->input->post('correo'),
            'clave' => $this->input->post('clave'),
            'nombre' => $this->input->post('nombre'),
            'rol' => $this->input->post('rol'),
            'carro_activos' => $this->input->post('carro_activos'),
            'carro_premitidos' => $this->input->post('carro_permitidos'),
            'predio' => $this->input->post('predio'),
        );
        //print_r($post_data);

        $this->Usuarios_model->guardar_usuarios($post_data);
        redirect(base_url() . 'admin/usuarios/');
    }

    public function actualizar_usuarios()
    {
        $post_data = array(
            'user_id' => $this->input->post('user_id'),
            'username' => $this->input->post('username'),
            'correo' => $this->input->post('correo'),
            'telefono' => $this->input->post('telefono'),
            'clave' => $this->input->post('clave'),
            'nombre' => $this->input->post('nombre'),
            'rol' => $this->input->post('rol'),
            'carro_activos' => $this->input->post('carro_activos'),
            'carro_premitidos' => $this->input->post('carro_permitidos'),
            'predio' => $this->input->post('predio'),
        );
        //print_r($post_data);

        $this->Usuarios_model->actualizar_usuarios($post_data);
        redirect(base_url() . 'admin/usuarios/');
    }

    //factutar

    public function facturar()
    {
        $data = compobarSesion();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/admin_facturar', $data);
    }

    public function guardar_factura()
    {
        $this->Cliente->test_metodo();
    }


    //Force soso
    public function forcesos_crear_usuario()
    {
        $data = compobarSesion();
        $data['user_id'] = $this->uri->segment(3);
        $data['usuario'] = $this->Usuarios_model->get_usuario_by_id($data['user_id']);
        $data['predios'] = $this->Predio_model->predios_admin();
        $data['predios_asignados'] = $this->Predio_model->predios_asignados($data['user_id']);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/forcesos_crear_usuario', $data);
    }

    public function procesar_forceos()
    {

        //print_contenido($_POST);

        $curl = curl_init();


        $datos_usuario = array(
            'client_id' => $this->input->post('client_id'),
            'client_id_type' => $this->input->post('client_id_type'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'tel_mobile1' => $this->input->post('tel_mobile1'),
            'contract' => $this->input->post('contract'),
            'contract_start' => $this->input->post('contract_start'),
            'contract_end' => $this->input->post('contract_end'),
            'sname' => $this->input->post('sname'),
            'gender' => $this->input->post('gender'),
            'birthdate' => $this->input->post('birthdate'),
            'tel_res' => $this->input->post('tel_res'),
            'tel_office' => $this->input->post('tel_office'),
            'tel_mobil2' => $this->input->post('tel_mobile2'));


        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://webapi.forcesos.com/api/clients",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $datos_usuario,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4YmRiNmZkNTE1YWVkZmNhYWIwYWIyMWI5YWRkMWZkN2QwNzI5ODAwYjFkZTk4NzhhODE3ODc3OThhZTEwNzRkNTQ1ZjczZDBkOWUxYTY2In0.eyJhdWQiOiI0IiwianRpIjoiNzhiZGI2ZmQ1MTVhZWRmY2FhYjBhYjIxYjlhZGQxZmQ3ZDA3Mjk4MDBiMWRlOTg3OGE4MTc4Nzc5OGFlMTA3NGQ1NDVmNzNkMGQ5ZTFhNjYiLCJpYXQiOjE1OTk1MDM2MjAsIm5iZiI6MTU5OTUwMzYyMCwiZXhwIjoxNjMxMDM5NjIwLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.mih4nYAX9cxVo2az-az5JR9Jh890KKmic6W5yP052mZYqubtV9DDbP1bPc2k85gh-5GiLvrb_FEyBS7Zz7nBV6HJtYH_4LgKhfjQMcfbsWYBg-GuH0bFOxu9YxBvk8er4CNx6uE328AelBHmRGpLum5FHdpp6TyEAk5sZQaHv04lHcLDGXrYfmdZ0yeL93H3v7rcAI4G7htiBlBhkLt6IXlDRrBNyOSxLtsI3xpNFEXhGfnF9YqQmO6Au4bo6Tm9GmR8QbZu8rdTCXGCNgZdbRbdiZHIgiGKH39Sdf6hDVdmONHydimyaCZQpGCxmkGkYRFVK3k4p3JiNYZIUYZR1o54ZCEp_xmN9NAEDjFbOu-LnZKGjrGutLTJAPsfRzSpMCOMOrKvz4YvF79tGTlTIo0of1pDEqWm9UdPz_Gg-8T9BQUICDpbrGDPb12JeJ2mFTp9nwRb9Z8L20ypSso0wz-OD2ccfK9HN4v1sndc6iDSbaz43NCPvCwajXLqLQubuAVU1p61CnYGX2YSuRW590D5Zm5YkKv6v3G0ce4aPYarrjlRHXA2kmEWDP8Q8SNeu7HXHznQoADmFmVoXlWaxcIxl1nlRZPC50zS7ff5BRQj_eJ-LgJQKb-YsJrf4_dc7ZvZmXYA8aosVl6bRezpoQRUS-gFxYzAOQVfJElTimY"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        //echo isType($response);


    }

    public function ver_clientes_forceos()
    {
        $data = compobarSesion();

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('admin/forcesos_ver_usuarios', $data);

    }

    public function detalle_cliente_forcesos()
    {
        $data = compobarSesion();
        $data['client_id'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://webapi.forcesos.com/api/clients/" . $data['client_id'] . "/clientid",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4YmRiNmZkNTE1YWVkZmNhYWIwYWIyMWI5YWRkMWZkN2QwNzI5ODAwYjFkZTk4NzhhODE3ODc3OThhZTEwNzRkNTQ1ZjczZDBkOWUxYTY2In0.eyJhdWQiOiI0IiwianRpIjoiNzhiZGI2ZmQ1MTVhZWRmY2FhYjBhYjIxYjlhZGQxZmQ3ZDA3Mjk4MDBiMWRlOTg3OGE4MTc4Nzc5OGFlMTA3NGQ1NDVmNzNkMGQ5ZTFhNjYiLCJpYXQiOjE1OTk1MDM2MjAsIm5iZiI6MTU5OTUwMzYyMCwiZXhwIjoxNjMxMDM5NjIwLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.mih4nYAX9cxVo2az-az5JR9Jh890KKmic6W5yP052mZYqubtV9DDbP1bPc2k85gh-5GiLvrb_FEyBS7Zz7nBV6HJtYH_4LgKhfjQMcfbsWYBg-GuH0bFOxu9YxBvk8er4CNx6uE328AelBHmRGpLum5FHdpp6TyEAk5sZQaHv04lHcLDGXrYfmdZ0yeL93H3v7rcAI4G7htiBlBhkLt6IXlDRrBNyOSxLtsI3xpNFEXhGfnF9YqQmO6Au4bo6Tm9GmR8QbZu8rdTCXGCNgZdbRbdiZHIgiGKH39Sdf6hDVdmONHydimyaCZQpGCxmkGkYRFVK3k4p3JiNYZIUYZR1o54ZCEp_xmN9NAEDjFbOu-LnZKGjrGutLTJAPsfRzSpMCOMOrKvz4YvF79tGTlTIo0of1pDEqWm9UdPz_Gg-8T9BQUICDpbrGDPb12JeJ2mFTp9nwRb9Z8L20ypSso0wz-OD2ccfK9HN4v1sndc6iDSbaz43NCPvCwajXLqLQubuAVU1p61CnYGX2YSuRW590D5Zm5YkKv6v3G0ce4aPYarrjlRHXA2kmEWDP8Q8SNeu7HXHznQoADmFmVoXlWaxcIxl1nlRZPC50zS7ff5BRQj_eJ-LgJQKb-YsJrf4_dc7ZvZmXYA8aosVl6bRezpoQRUS-gFxYzAOQVfJElTimY"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $response = json_decode($response, true);


        $data['datos_cliente'] = (object)$response['data'];
        $data['contratos'] = (object)$response['data']['contracts'];

        echo $this->templates->render('admin/detalle_cliente_forcesos', $data);
    }

    public function actualizar_contrato()
    {
        $data = compobarSesion();
        $data['contrato_id'] = $this->uri->segment(3);

        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://webapi.forcesos.com/api/clients/" . $data['contrato_id'] . "/contract",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4YmRiNmZkNTE1YWVkZmNhYWIwYWIyMWI5YWRkMWZkN2QwNzI5ODAwYjFkZTk4NzhhODE3ODc3OThhZTEwNzRkNTQ1ZjczZDBkOWUxYTY2In0.eyJhdWQiOiI0IiwianRpIjoiNzhiZGI2ZmQ1MTVhZWRmY2FhYjBhYjIxYjlhZGQxZmQ3ZDA3Mjk4MDBiMWRlOTg3OGE4MTc4Nzc5OGFlMTA3NGQ1NDVmNzNkMGQ5ZTFhNjYiLCJpYXQiOjE1OTk1MDM2MjAsIm5iZiI6MTU5OTUwMzYyMCwiZXhwIjoxNjMxMDM5NjIwLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.mih4nYAX9cxVo2az-az5JR9Jh890KKmic6W5yP052mZYqubtV9DDbP1bPc2k85gh-5GiLvrb_FEyBS7Zz7nBV6HJtYH_4LgKhfjQMcfbsWYBg-GuH0bFOxu9YxBvk8er4CNx6uE328AelBHmRGpLum5FHdpp6TyEAk5sZQaHv04lHcLDGXrYfmdZ0yeL93H3v7rcAI4G7htiBlBhkLt6IXlDRrBNyOSxLtsI3xpNFEXhGfnF9YqQmO6Au4bo6Tm9GmR8QbZu8rdTCXGCNgZdbRbdiZHIgiGKH39Sdf6hDVdmONHydimyaCZQpGCxmkGkYRFVK3k4p3JiNYZIUYZR1o54ZCEp_xmN9NAEDjFbOu-LnZKGjrGutLTJAPsfRzSpMCOMOrKvz4YvF79tGTlTIo0of1pDEqWm9UdPz_Gg-8T9BQUICDpbrGDPb12JeJ2mFTp9nwRb9Z8L20ypSso0wz-OD2ccfK9HN4v1sndc6iDSbaz43NCPvCwajXLqLQubuAVU1p61CnYGX2YSuRW590D5Zm5YkKv6v3G0ce4aPYarrjlRHXA2kmEWDP8Q8SNeu7HXHznQoADmFmVoXlWaxcIxl1nlRZPC50zS7ff5BRQj_eJ-LgJQKb-YsJrf4_dc7ZvZmXYA8aosVl6bRezpoQRUS-gFxYzAOQVfJElTimY"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $response = json_decode($response, true);
        $datos_de_contrato = '';


        $data['datos_cliente'] = (object)$response['data'];
        $contratos = (object)$response['data']['contracts'];
        foreach ($contratos as $contrato) {
            $contrato = (object)$contrato;

            //echo $contrato->contract;
            if ($data['contrato_id'] == $contrato->contract) {
                $datos_de_contrato = $contrato;
            } else {
                //  echo'no asignar';
            }
        }
        $data['datos_de_contrato'] = $datos_de_contrato;


        echo $this->templates->render('admin/actualizar_contrato_forcesos', $data);
    }

    public function procesar_actualizar_forceos()
    {
        $curl = curl_init();

        $datos_contrato = array(

            'contract' => $this->input->post('contract'),
            'contract_start' => $this->input->post('contract_start'),
            'contract_end' => $this->input->post('contract_end'),
            'status' => $this->input->post('contract_status'),
            '_method' => 'put',
        );


        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://webapi.forcesos.com/api/clients/" . $datos_contrato['contract'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $datos_contrato,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4YmRiNmZkNTE1YWVkZmNhYWIwYWIyMWI5YWRkMWZkN2QwNzI5ODAwYjFkZTk4NzhhODE3ODc3OThhZTEwNzRkNTQ1ZjczZDBkOWUxYTY2In0.eyJhdWQiOiI0IiwianRpIjoiNzhiZGI2ZmQ1MTVhZWRmY2FhYjBhYjIxYjlhZGQxZmQ3ZDA3Mjk4MDBiMWRlOTg3OGE4MTc4Nzc5OGFlMTA3NGQ1NDVmNzNkMGQ5ZTFhNjYiLCJpYXQiOjE1OTk1MDM2MjAsIm5iZiI6MTU5OTUwMzYyMCwiZXhwIjoxNjMxMDM5NjIwLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.mih4nYAX9cxVo2az-az5JR9Jh890KKmic6W5yP052mZYqubtV9DDbP1bPc2k85gh-5GiLvrb_FEyBS7Zz7nBV6HJtYH_4LgKhfjQMcfbsWYBg-GuH0bFOxu9YxBvk8er4CNx6uE328AelBHmRGpLum5FHdpp6TyEAk5sZQaHv04lHcLDGXrYfmdZ0yeL93H3v7rcAI4G7htiBlBhkLt6IXlDRrBNyOSxLtsI3xpNFEXhGfnF9YqQmO6Au4bo6Tm9GmR8QbZu8rdTCXGCNgZdbRbdiZHIgiGKH39Sdf6hDVdmONHydimyaCZQpGCxmkGkYRFVK3k4p3JiNYZIUYZR1o54ZCEp_xmN9NAEDjFbOu-LnZKGjrGutLTJAPsfRzSpMCOMOrKvz4YvF79tGTlTIo0of1pDEqWm9UdPz_Gg-8T9BQUICDpbrGDPb12JeJ2mFTp9nwRb9Z8L20ypSso0wz-OD2ccfK9HN4v1sndc6iDSbaz43NCPvCwajXLqLQubuAVU1p61CnYGX2YSuRW590D5Zm5YkKv6v3G0ce4aPYarrjlRHXA2kmEWDP8Q8SNeu7HXHznQoADmFmVoXlWaxcIxl1nlRZPC50zS7ff5BRQj_eJ-LgJQKb-YsJrf4_dc7ZvZmXYA8aosVl6bRezpoQRUS-gFxYzAOQVfJElTimY"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function get_contratos_forceos()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://webapi.forcesos.com/api/clients",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4YmRiNmZkNTE1YWVkZmNhYWIwYWIyMWI5YWRkMWZkN2QwNzI5ODAwYjFkZTk4NzhhODE3ODc3OThhZTEwNzRkNTQ1ZjczZDBkOWUxYTY2In0.eyJhdWQiOiI0IiwianRpIjoiNzhiZGI2ZmQ1MTVhZWRmY2FhYjBhYjIxYjlhZGQxZmQ3ZDA3Mjk4MDBiMWRlOTg3OGE4MTc4Nzc5OGFlMTA3NGQ1NDVmNzNkMGQ5ZTFhNjYiLCJpYXQiOjE1OTk1MDM2MjAsIm5iZiI6MTU5OTUwMzYyMCwiZXhwIjoxNjMxMDM5NjIwLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.mih4nYAX9cxVo2az-az5JR9Jh890KKmic6W5yP052mZYqubtV9DDbP1bPc2k85gh-5GiLvrb_FEyBS7Zz7nBV6HJtYH_4LgKhfjQMcfbsWYBg-GuH0bFOxu9YxBvk8er4CNx6uE328AelBHmRGpLum5FHdpp6TyEAk5sZQaHv04lHcLDGXrYfmdZ0yeL93H3v7rcAI4G7htiBlBhkLt6IXlDRrBNyOSxLtsI3xpNFEXhGfnF9YqQmO6Au4bo6Tm9GmR8QbZu8rdTCXGCNgZdbRbdiZHIgiGKH39Sdf6hDVdmONHydimyaCZQpGCxmkGkYRFVK3k4p3JiNYZIUYZR1o54ZCEp_xmN9NAEDjFbOu-LnZKGjrGutLTJAPsfRzSpMCOMOrKvz4YvF79tGTlTIo0of1pDEqWm9UdPz_Gg-8T9BQUICDpbrGDPb12JeJ2mFTp9nwRb9Z8L20ypSso0wz-OD2ccfK9HN4v1sndc6iDSbaz43NCPvCwajXLqLQubuAVU1p61CnYGX2YSuRW590D5Zm5YkKv6v3G0ce4aPYarrjlRHXA2kmEWDP8Q8SNeu7HXHznQoADmFmVoXlWaxcIxl1nlRZPC50zS7ff5BRQj_eJ-LgJQKb-YsJrf4_dc7ZvZmXYA8aosVl6bRezpoQRUS-gFxYzAOQVfJElTimY"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //$response = json_encode($response, true);
        echo($response);
        //$response = json_decode($response, true);
        //$contratos = $response['data'];
        //print_contenido(gettype($response));
        //print_contenido($response['data']);
        //print_contenido(gettype($contratos));

        //$contratos = (object) $response;

        /*foreach($contratos as  $contrato) {
            print_r($contrato);
            //echo'dep';
        }*/
    }

    public function dar_baja_contrato_forcesos()
    {

        $curl = curl_init();
        $contract = $this->input->post('contract');


        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://webapi.forcesos.com/api/clients/" . $contract,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4YmRiNmZkNTE1YWVkZmNhYWIwYWIyMWI5YWRkMWZkN2QwNzI5ODAwYjFkZTk4NzhhODE3ODc3OThhZTEwNzRkNTQ1ZjczZDBkOWUxYTY2In0.eyJhdWQiOiI0IiwianRpIjoiNzhiZGI2ZmQ1MTVhZWRmY2FhYjBhYjIxYjlhZGQxZmQ3ZDA3Mjk4MDBiMWRlOTg3OGE4MTc4Nzc5OGFlMTA3NGQ1NDVmNzNkMGQ5ZTFhNjYiLCJpYXQiOjE1OTk1MDM2MjAsIm5iZiI6MTU5OTUwMzYyMCwiZXhwIjoxNjMxMDM5NjIwLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.mih4nYAX9cxVo2az-az5JR9Jh890KKmic6W5yP052mZYqubtV9DDbP1bPc2k85gh-5GiLvrb_FEyBS7Zz7nBV6HJtYH_4LgKhfjQMcfbsWYBg-GuH0bFOxu9YxBvk8er4CNx6uE328AelBHmRGpLum5FHdpp6TyEAk5sZQaHv04lHcLDGXrYfmdZ0yeL93H3v7rcAI4G7htiBlBhkLt6IXlDRrBNyOSxLtsI3xpNFEXhGfnF9YqQmO6Au4bo6Tm9GmR8QbZu8rdTCXGCNgZdbRbdiZHIgiGKH39Sdf6hDVdmONHydimyaCZQpGCxmkGkYRFVK3k4p3JiNYZIUYZR1o54ZCEp_xmN9NAEDjFbOu-LnZKGjrGutLTJAPsfRzSpMCOMOrKvz4YvF79tGTlTIo0of1pDEqWm9UdPz_Gg-8T9BQUICDpbrGDPb12JeJ2mFTp9nwRb9Z8L20ypSso0wz-OD2ccfK9HN4v1sndc6iDSbaz43NCPvCwajXLqLQubuAVU1p61CnYGX2YSuRW590D5Zm5YkKv6v3G0ce4aPYarrjlRHXA2kmEWDP8Q8SNeu7HXHznQoADmFmVoXlWaxcIxl1nlRZPC50zS7ff5BRQj_eJ-LgJQKb-YsJrf4_dc7ZvZmXYA8aosVl6bRezpoQRUS-gFxYzAOQVfJElTimY"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}