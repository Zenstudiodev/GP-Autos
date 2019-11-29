<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 23/03/2018
 * Time: 2:14 PM
 */
class Cliente extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Carros_model');
        $this->load->model('Admin_model');
        $this->load->model('Banners_model');
        $this->load->model('Cliente_model');
        $this->load->model('Pagos_model');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function registro()
    {
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $data['title'] = $this->lang->line('create_user_heading');


        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() === TRUE) {
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("cliente/login", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            // $this->_render_page('auth/create_user', $this->data);
            echo $this->templates->render('public/registro', $data);
        }


    }

    public function login()
    {
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();

        $data['title'] = $this->lang->line('login_heading');

        // validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() === TRUE) {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool)$this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect(base_url() . 'cliente/perfil', 'refresh');
            } else {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('cliente/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            // the user is not logging in so display the login page
            // set the flash data error message if there is one
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );
            echo $this->templates->render('public/login', $data);
        }


    }

    public function perfil()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url().'cliente/login');
        }
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $this->Cliente_model->get_cliente_data($user_id);
        if ($this->Cliente_model->get_carros_cliente($user_id)) {
            $data['carros'] = $this->Cliente_model->get_carros_cliente($user_id);
        } else {
            $data['carros'] = false;
        }
        //$data['carros']=

        echo $this->templates->render('public/perfil', $data);
    }

    public function seleccion_anuncio()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        $data['parametros'] = $this->Admin_model->get_parametros();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $cupon = $this->session->cupon;
        if($cupon){
            $data['cupon_activo']=$cupon;
            $data['datos_cupon']= $this->Admin_model->get_cupon_by_code($cupon);
        }else{
            $data['cupon_activo']='';
        }
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        echo $this->templates->render('public/seleccion_anuncio', $data);
    }
    public function seleccion_anuncio_dev()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        $data['parametros'] = $this->Admin_model->get_parametros();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $cupon = $this->session->cupon;
        if($cupon){
            $data['cupon_activo']=$cupon;
            $data['datos_cupon']= $this->Admin_model->get_cupon_by_code($cupon);
        }else{
            $data['cupon_activo']='';
        }
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);


        echo $this->templates->render('public/seleccion_anuncio_dev', $data);
    }

    public function forma_pago()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }

        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);

        $datos_usuario = $data['datos_usuario'];
        $datos_usuario = $datos_usuario->row();
        $nombre_usuario = $datos_usuario->first_name . ' ' . $datos_usuario->last_name;
       // print_contenido($datos_usuario);
        //print_contenido($_POST);
        $datos_anuncio = array(
            'ubicacion_anuncio' => $this->input->post('ubicacion_anuncio'),
            'tipo_anuncio' => $this->input->post('tipo_anuncio'),
            'feria' => $this->input->post('feria_check'),
            'facebook' => $this->input->post('facebook_check'),
            'telefono_calcomania' => $this->input->post('calcomania_telefono_input'),
            'direccion_calcomania' => $this->input->post('calcomania_direccion_input'),
            'total_pagar' => $this->input->post('total_pagar'),
        );
        $this->session->set_userdata($datos_anuncio);
        // print_contenido($_POST);
        //print_contenido($_SESSION);
        //exit();
        $data['parametros'] = $this->Admin_model->get_parametros();
        if($this->session->total_pagar <= '0'){


          //  echo '<h1>pagar 0 </h1>';
            //echo 'guardar pago redirect a datos de carro';
            //correo notificacion de pago

            $datos_pago_efectivo = array(
                'user_id' => $user_id,
                'carro_id' => '',
                'transaccion' => 'cupon',
                'monto' => $this->session->total_pagar,
                'nombre_factura' => '',
                'nit' => '',
                'direccion_factura' => '',
                'cupon' =>  $this->session->cupon,
                'direccion_rotulacion' => $this->session->direccion_calcomania,
                'telefono_rotulacion' => $this->session->telefono_calcomania,
            );
            $this->Pagos_model->guardar_pago_en_linea($datos_pago_efectivo);

            //correo notificacion de pago
            $this->notiticacion_pago($user_id, $datos_usuario->email, $nombre_usuario, '0', $datos_anuncio['tipo_anuncio'], 'Pago descuento cupón');

            if ($datos_anuncio['tipo_anuncio'] == 'individual') {
                redirect(base_url() . 'cliente/publicar_carro');
            }
            if ($datos_anuncio['tipo_anuncio'] == 'vip') {
                redirect(base_url() . 'cliente/publicar_carro_vip');
            }
        }else{

        }

        echo $this->templates->render('public/forma_pago', $data);

    }

    public function datos_pago()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        if ($this->session->flashdata('error')) {
            $data['error'] = reasoncode_text($this->session->flashdata('error'));
        } else {
            $datos_anuncio = array(
                'forma_pago' => $this->input->post('forma_pago'),
            );

            $this->session->set_userdata($datos_anuncio);
        }


        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $parametros = $this->Admin_model->get_parametros();


        $parametros = $parametros->result();
        $precio_vip = $parametros[1];
        $precio_individual = $parametros[2];
        $precio_feria = $parametros[3];
        $precio_facebook = $parametros[4];


        //print_contenido($_POST);
        //print_contenido($_SESSION);
        $data['forma_pago'] = $this->session->forma_pago;
        $data['tipo_anuncio'] = $this->session->tipo_anuncio;

        $data['precio_anuncio'] = 0;
        $data['precio_feria'] = false;
        $data['precio_facebook'] = false;
        $total_a_pagar = 0;


        if ($this->session->feria) {
            $data['precio_feria'] = $precio_feria;
            $total_a_pagar = $total_a_pagar + $precio_feria->parametro_valor;
        }
        if ($this->session->facebook) {
            $data['precio_facebook'] = $precio_facebook;
            $total_a_pagar = $total_a_pagar + $precio_facebook->parametro_valor;
        }

        if ($data['tipo_anuncio'] == 'individual') {
            $data['precio_anuncio'] = $precio_individual;
        }
        if ($data['tipo_anuncio'] == 'vip') {
            $data['precio_anuncio'] = $precio_vip;
        }

        $total_a_pagar = $total_a_pagar + $data['precio_anuncio']->parametro_valor;
        $cupon = $this->session->cupon;
        if($cupon){
            $data['cupon_activo']=$cupon;
            $data_cupon= $this->Admin_model->get_cupon_by_code($cupon);
            $data_cupon = $data_cupon->row();

            //print_contenido($data_cupon);

            if ($data_cupon->tipo == 'Porcentage') {
               $descuento_cupon =  $data['precio_anuncio']->parametro_valor * $data_cupon->valor / 100;
            }
            if ($data_cupon->tipo == 'Valor') {
                $descuento_cupon = $data_cupon->valor;
            }
            $data['descuento_cupon'] = $descuento_cupon;
        }else{
            $descuento_cupon = 0;
        }
        $total_a_pagar = $total_a_pagar - $descuento_cupon;

        $data['total_a_pagar'] = $total_a_pagar;

        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);

        echo $this->templates->render('public/datos_pago', $data);
    }

    public function pago_deposito()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        //carro
        $data['carro_id'] = $this->uri->segment(3);
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $data['carro'] = $this->Carros_model->get_datos_carro_cliente($data['carro_id']);
        echo $this->templates->render('public/pago_deposito', $data);
    }

    public function pago_efectivo()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        //carro
        $data['carro_id'] = $this->uri->segment(3);
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $data['carro'] = $this->Carros_model->get_datos_carro_cliente($data['carro_id']);
        echo $this->templates->render('public/pago_efectivo', $data);
    }

    public function guarda_pago_efectivo()
    {
        //comprobacion de sesion y datos de usuario
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();
        $datos_usuario = $this->Cliente_model->get_cliente_data($user_id);
        $datos_usuario = $datos_usuario->row();
        $nombre_usuario = $datos_usuario->first_name . ' ' . $datos_usuario->last_name;

        //parametros de precio
        $parametros = $this->Admin_model->get_parametros();
        $parametros = $parametros->result();
        $precio_vip = $parametros[1];
        $precio_individual = $parametros[2];
        $precio_feria = $parametros[3];
        $precio_facebook = $parametros[4];

        //datos de sesion
        $data['forma_pago'] = $this->session->forma_pago;
        $data['tipo_anuncio'] = $this->session->tipo_anuncio;
        $data['ubicacion_anuncio'] = $this->session->ubicacion_anuncio;
        $data['email'] = $this->session->email;

        //datos de producto
        $data['tipo_anuncio'] = $this->session->tipo_anuncio;

        $data['precio_anuncio'] = 0;
        $data['precio_feria'] = false;
        $data['precio_facebook'] = false;
        $total_a_pagar = 0;

        //datos de facturacion
        $nombre_factura = $this->input->post('nombre_facturacion');
        $direccion_factura = $this->input->post('direccion_facturacion');
        $nit = $this->input->post('nit_facturacion');

        //procesamos precio
        if ($this->session->feria) {
            $data['precio_feria'] = $precio_feria;
            $total_a_pagar = $total_a_pagar + $precio_feria->parametro_valor;
        }
        if ($this->session->facebook) {
            $data['precio_facebook'] = $precio_facebook;
            $total_a_pagar = $total_a_pagar + $precio_facebook->parametro_valor;
        }
        if ($data['tipo_anuncio'] == 'individual') {
            $data['precio_anuncio'] = $precio_individual;
        }
        if ($data['tipo_anuncio'] == 'vip') {
            $data['precio_anuncio'] = $precio_vip;
        }
        $total_a_pagar = $total_a_pagar + $data['precio_anuncio']->parametro_valor;
        $data['total_a_pagar'] = $total_a_pagar;
        $data['cupon_activo']='';
        $cupon = $this->session->cupon;
        if($cupon){
            $data['cupon_activo']=$cupon;
            $data_cupon= $this->Admin_model->get_cupon_by_code($cupon);
            $data_cupon = $data_cupon->row();

            //print_contenido($data_cupon);

            if ($data_cupon->tipo == 'Porcentage') {
                $descuento_cupon =  $data['precio_anuncio']->parametro_valor * $data_cupon->valor / 100;
            }
            if ($data_cupon->tipo == 'Valor') {
                $descuento_cupon = $data_cupon->valor;
            }
            $data['descuento_cupon'] = $descuento_cupon;
        }else{
            $descuento_cupon = 0;
        }
        $total_a_pagar = $total_a_pagar - $descuento_cupon;

        //datos para guardar pago
        $datos_pago_efectivo = array(
            'user_id' => $user_id,
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'monto' => $total_a_pagar,
            'nombre_factura' => $nombre_factura,
            'nit' => $nit,
            'direccion_factura' => $direccion_factura,
            'cupon' => $data['cupon_activo'],
        );
        //guardar pago
        $this->Pagos_model->guardar_pago_efectivo($datos_pago_efectivo);

        //correo notificacion de pago
        $this->notiticacion_pago($user_id, $data['email'], $nombre_usuario, $total_a_pagar, $data['tipo_anuncio'], 'Pago efectivo');

        //redireccion
        if ($data['tipo_anuncio'] == 'individual') {
            redirect(base_url() . 'cliente/publicar_carro');
        }
        if ($data['tipo_anuncio'] == 'vip') {
            redirect(base_url() . 'cliente/publicar_carro_vip');
        }
    }

    public function guarda_pago_deposito()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();
        $datos_usuario = $this->Cliente_model->get_cliente_data($user_id);
        $datos_usuario = $datos_usuario->row();


        $datos_pago_efectivo = array(
            'user_id' => $user_id,
            'banco' => $this->input->post('banco'),
            'metodo' => 'deposito',
            'monto' => 175,
            'carro_id' => $this->input->post('carro_id'),
        );
        $data['banners'] = $this->Pagos_model->guardar_pago_deposito($datos_pago_efectivo);
        //redirigimos a visanet
        redirect(base_url() . 'Cliente/revisar_anuncio/' . $this->input->post('carro_id'));

    }

    public function guardar_pago_en_linea()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();
        $datos_usuario = $this->Cliente_model->get_cliente_data($user_id);
        $datos_usuario = $datos_usuario->row();
        $nombre_usuario = $datos_usuario->first_name . ' ' . $datos_usuario->last_name;

        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $parametros = $this->Admin_model->get_parametros();
        $parametros = $parametros->result();
        $precio_vip = $parametros[1];
        $precio_individual = $parametros[2];
        $precio_feria = $parametros[3];
        $precio_facebook = $parametros[4];
        $data['forma_pago'] = $this->session->forma_pago;
        $data['tipo_anuncio'] = $this->session->tipo_anuncio;
        $data['ubicacion_anuncio'] = $this->session->ubicacion_anuncio;
        $data['email'] = $this->session->email;
        $data['ip_adress'] = $this->input->ip_address();
        //datos de usuario
        //datos de tarjeta
        $numero_tarjeta = $this->input->post('card_number');
        $expirationMonth = $this->input->post('mes_vencimiento_tarjeta');
        $expirationYear = $this->input->post('a_vencimiento_tarjeta');
        if ($expirationYear < 2000) {
            $expirationYear = '20' . $expirationYear;
        }

        //datos de producto
        $data['tipo_anuncio'] = $this->session->tipo_anuncio;

        $data['precio_anuncio'] = 0;
        $data['precio_feria'] = false;
        $data['precio_facebook'] = false;
        $total_a_pagar = 0;

        //datos de facturacion
        $nombre_factura = $this->input->post('nombre_facturacion');
        $direccion_factura = $this->input->post('direccion_facturacion');
        $nit = $this->input->post('nit_facturacion');

        if ($this->session->feria) {
            $data['precio_feria'] = $precio_feria;
            $total_a_pagar = $total_a_pagar + $precio_feria->parametro_valor;
        }
        if ($this->session->facebook) {
            $data['precio_facebook'] = $precio_facebook;
            $total_a_pagar = $total_a_pagar + $precio_facebook->parametro_valor;
        }

        if ($data['tipo_anuncio'] == 'individual') {
            $data['precio_anuncio'] = $precio_individual;
        }
        if ($data['tipo_anuncio'] == 'vip') {
            $data['precio_anuncio'] = $precio_vip;
        }

        $total_a_pagar = $total_a_pagar + $data['precio_anuncio']->parametro_valor;
        $data['cupon_activo']='';
        $cupon = $this->session->cupon;
        if($cupon){
            $data['cupon_activo']=$cupon;
            $data_cupon= $this->Admin_model->get_cupon_by_code($cupon);
            $data_cupon = $data_cupon->row();

           // print_contenido($data_cupon);

            if ($data_cupon->tipo == 'Porcentage') {
                $descuento_cupon =  $data['precio_anuncio']->parametro_valor * $data_cupon->valor / 100;
            }
            if ($data_cupon->tipo == 'Valor') {
                $descuento_cupon = $data_cupon->valor;
            }
            $data['descuento_cupon'] = $descuento_cupon;
        }else{
            $descuento_cupon = 0;
        }
        $total_a_pagar = $total_a_pagar - $descuento_cupon;

        $data['total_a_pagar'] = $total_a_pagar;

        //print_contenido($_POST);
        //exit();
        // Before using this example, you can use your own reference code for the transaction.
        $referenceCode = 'visanetgt_gpautos';

        $client = new CybsSoapClient();
        $request = $client->createRequest($referenceCode);
        // This section contains a sample transaction request for the authorization
        //// service with complete billing, payment card, and purchase (two items) information.

        $ccAuthService = new stdClass();
        $ccAuthService->run = 'true';
        $request->ccAuthService = $ccAuthService;

        $billTo = new stdClass();
        $billTo->firstName = $datos_usuario->first_name;
        $billTo->lastName = $datos_usuario->last_name;
        $billTo->street1 = $direccion_factura;
        $billTo->city = $data['ubicacion_anuncio'];
        $billTo->state = $data['ubicacion_anuncio'];
        $billTo->postalCode = '01010';
        $billTo->country = 'GT';
        $billTo->email = $data['email'];
        $billTo->ipAddress = $data['ip_adress'];
        $request->billTo = $billTo;

        $card = new stdClass();
        $card->accountNumber = $numero_tarjeta;
        $card->expirationMonth = $expirationMonth;
        $card->expirationYear = $expirationYear;
        $request->card = $card;


        $purchaseTotals = new stdClass();
        $purchaseTotals->currency = 'GTQ';
        $request->purchaseTotals = $purchaseTotals;


        $request->deviceFingerprintID = $this->input->post('deviceFingerprintID');
        //echo $this->input->post('deviceFingerprintID');

        /*$item0 = new stdClass();
        $item0->unitPrice = '12.34';
        $item0->quantity = '2';
        $item0->id = '0';*/

        $item1 = new stdClass();
        //prueba
        //$item1->unitPrice = '1';
       $item1->unitPrice = $total_a_pagar;
        $item1->productName = $data['tipo_anuncio'];
        $item1->id = '1';

        //$request->item = array($item0, $item1);
        $request->item = array($item1);

        //print_contenido($request);
        $reply = $client->runTransaction($request);

// This section will show all the reply fields.
        //print("\nAUTH RESPONSE: " . print_contenido($reply, true));

        if ($reply->decision == 'ACCEPT' or $reply->ccAuthReply->reasonCode=='100') {
            $datos_pago_efectivo = array(
                'user_id' => $user_id,
                'carro_id' => $this->input->post('carro_id'),
                'transaccion' => $reply->requestID,
                'monto' => $total_a_pagar,
                'nombre_factura' => $nombre_factura,
                'nit' => $nit,
                'direccion_factura' => $direccion_factura,
                'cupon' => $data['cupon_activo'],
                'direccion_rotulacion' => $this->session->direccion_calcomania,
                'telefono_rotulacion' => $this->session->telefono_calcomania,
            );
            $this->Pagos_model->guardar_pago_en_linea($datos_pago_efectivo);

            //correo notificacion de pago
            $this->notiticacion_pago($user_id, $data['email'], $nombre_usuario, $total_a_pagar, $data['tipo_anuncio'], 'Pago con tarjeta');
            if ($data['tipo_anuncio'] == 'individual') {
                redirect(base_url() . 'cliente/publicar_carro');
            }
            if ($data['tipo_anuncio'] == 'vip') {
                redirect(base_url() . 'cliente/publicar_carro_vip');
            }
            //redirect(base_url() . 'cliente/publicar_carro');
            //echo 'guardar numero de transaccion en base de datos';
            //echo $reply->requestID;
        } else {
            $this->session->set_flashdata('error', $reply->reasonCode);
            $this->notiticacion_error_pago($user_id, $data['email'], $nombre_usuario, $total_a_pagar, $data['tipo_anuncio'], 'Pago con tarjeta',$reply);
            redirect(base_url() . 'cliente/datos_pago');
            //echo 'poner mensaje de error redireccionar';
            //print("\nFailed auth request.\n");
            // This section will show all the reply fields.
            //echo '<pre>';
            //print("\nRESPONSE: " . print_r($reply, true));
            //echo '</pre>';
            return;
        }

// Build a capture using the request ID in the response as the auth request ID
       /* $ccCaptureService = new stdClass();
        $ccCaptureService->run = 'true';
        $ccCaptureService->authRequestID = $reply->requestID;

        $captureRequest = $client->createRequest($referenceCode);
        $captureRequest->ccCaptureService = $ccCaptureService;
        $captureRequest->item = array($item1);
        $captureRequest->purchaseTotals = $purchaseTotals;

        $captureReply = $client->runTransaction($captureRequest);
       */
        // This section will show all the reply fields.
        // print("\nCAPTRUE RESPONSE: " . print_contenido($captureReply, true));
    }
    public function guardar_pago_en_linea_feria()
    {


        $user_id = '0';
        if ($this->ion_auth->logged_in()) {
            // redirect them to the login page
            $user_id = $this->ion_auth->get_user_id();
        }

        $parametros = $this->Admin_model->get_parametros();
        $parametros = $parametros->result();
        $precio_vip = $parametros[1];
        $precio_individual = $parametros[2];
        $precio_feria = $parametros[3];
        $precio_facebook = $parametros[4];
        $data['forma_pago'] = $this->session->forma_pago;
        $data['tipo_anuncio'] = $this->session->tipo_anuncio;
        $data['ubicacion_anuncio'] = $this->session->ubicacion_anuncio;
        $data['email'] = $this->input->post('correo_facturacion');
        $data['ip_adress'] = $this->input->ip_address();
        //datos de usuario
        //datos de tarjeta
        $numero_tarjeta = $this->input->post('card_number');
        $expirationMonth = $this->input->post('mes_vencimiento_tarjeta');
        $expirationYear = $this->input->post('a_vencimiento_tarjeta');
        if ($expirationYear < 2000) {
            $expirationYear = '20' . $expirationYear;
        }

        $data['precio_anuncio'] = 0;
        $data['precio_feria'] = false;
        $data['precio_facebook'] = false;
        $total_a_pagar = 0;

        //datos de facturacion
        $nombre_factura = $this->input->post('nombre_facturacion');
        $direccion_factura = $this->input->post('direccion_facturacion');
        $nit = $this->input->post('nit_facturacion');

        if (true) {
            $data['precio_feria'] = $precio_feria;
            $total_a_pagar = $total_a_pagar + $precio_feria->parametro_valor;
        }


        $data['total_a_pagar'] = $total_a_pagar;
        /*print_contenido($_POST);
        print_contenido($data);*/
        //exit();

        //print_contenido($_POST);
        //exit();
        // Before using this example, you can use your own reference code for the transaction.
        $referenceCode = 'visanetgt_gpautos';

        $client = new CybsSoapClient();
        $request = $client->createRequest($referenceCode);
        // This section contains a sample transaction request for the authorization
        //// service with complete billing, payment card, and purchase (two items) information.

        $ccAuthService = new stdClass();
        $ccAuthService->run = 'true';
        $request->ccAuthService = $ccAuthService;

        $billTo = new stdClass();
        $billTo->firstName = $nombre_factura;
        $billTo->lastName = $nombre_factura;
        $billTo->street1 = $direccion_factura;
        $billTo->city = 'Guatemala';
        $billTo->state = 'Guatemala';
        $billTo->postalCode = '01010';
        $billTo->country = 'GT';
        $billTo->email = $data['email'];
        $billTo->ipAddress = $data['ip_adress'];
        $request->billTo = $billTo;

        $card = new stdClass();
        $card->accountNumber = $numero_tarjeta;
        $card->expirationMonth = $expirationMonth;
        $card->expirationYear = $expirationYear;
        $request->card = $card;


        $purchaseTotals = new stdClass();
        $purchaseTotals->currency = 'GTQ';
        $request->purchaseTotals = $purchaseTotals;


        $request->deviceFingerprintID = $this->input->post('deviceFingerprintID');
        //echo $this->input->post('deviceFingerprintID');

        /*$item0 = new stdClass();
        $item0->unitPrice = '12.34';
        $item0->quantity = '2';
        $item0->id = '0';*/

        $item1 = new stdClass();
        //precio porueba
        //$item1->unitPrice = '1';
        $item1->unitPrice = $total_a_pagar;
        $item1->productName = 'Feria Virtual';
        $item1->id = '1';

        //$request->item = array($item0, $item1);
        $request->item = array($item1);

        //print_contenido($request);
        $reply = $client->runTransaction($request);

// This section will show all the reply fields.
     /* print("\nAUTH RESPONSE: " . print_contenido($reply, true));
      print("\nAUTH RESPONSE: " . print_contenido($reply->ccAuthReply, true));
      echo 'paso el pago '.$reply->ccAuthReply->reasonCode;*/

       // exit();

        if ($reply->decision == 'ACCEPT' or $reply->ccAuthReply->reasonCode=='100') {
            $datos_pago_efectivo = array(
                'user_id' => $user_id,
                'carro_id' => $this->input->post('carro_id'),
                'transaccion' => $reply->requestID,
                'monto' => $total_a_pagar,
                'nombre_factura' => $nombre_factura,
                'nit' => $nit,
                'direccion_factura' => $direccion_factura,
                'cupon' => '0',
                'direccion_rotulacion' => '-',
                'telefono_rotulacion' => '0',
            );
            $this->Pagos_model->guardar_pago_en_linea($datos_pago_efectivo);



            //pasar a feria
            $datos_feria=array(
                'precio_feria'=>$this->input->post('precio_feria_input'),
                'id_carro'=>$this->input->post('carro_id')
            );
            $this->Carros_model->guardar_precio_feria($datos_feria);


            //correo notificacion de pago
            $this->notiticacion_pago_feria($user_id, $data['email'], $nombre_factura, $total_a_pagar, 'feria', 'Pago con tarjeta', $datos_pago_efectivo['carro_id']);

            redirect(base_url() . 'cliente/gracias_pago_feria');
            //echo 'guardar numero de transaccion en base de datos';
            //echo $reply->requestID;
        } else {
            $this->session->set_flashdata('error', $reply->reasonCode);
            redirect(base_url() . 'carro/pagar_feria/'.$this->input->post('carro_id'));
            //echo 'poner mensaje de error redireccionar';
            //print("\nFailed auth request.\n");
            // This section will show all the reply fields.
            //echo '<pre>';
            //print("\nRESPONSE: " . print_r($reply, true));
            //echo '</pre>';
            return;
        }

// Build a capture using the request ID in the response as the auth request ID
        /* $ccCaptureService = new stdClass();
         $ccCaptureService->run = 'true';
         $ccCaptureService->authRequestID = $reply->requestID;

         $captureRequest = $client->createRequest($referenceCode);
         $captureRequest->ccCaptureService = $ccCaptureService;
         $captureRequest->item = array($item1);
         $captureRequest->purchaseTotals = $purchaseTotals;

         $captureReply = $client->runTransaction($captureRequest);
        */
        // This section will show all the reply fields.
        // print("\nCAPTRUE RESPONSE: " . print_contenido($captureReply, true));
    }
    public function gracias_pago_feria(){
        $data = cargar_componentes_buscador();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/public_pago_feria_gracias', $data);
    }


    //notificacion de carro
    public function notiticacion_pago($cliente_id, $correo, $nombre, $monto, $anuncio, $metodo_pago)
    {

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
        $this->email->to($correo);
        // $this->email->cc($correo);
        $this->email->cc('pagos@gpautos.net, anuncios2@gpautos.net');
        $this->email->bcc('csamayoa@zenstudiogt.com');

        $this->email->subject('Se registro un pago');

        //mensaje
        $message = '<html><body>';
        $message .= '<img src="http://gpautos.net/ui/public/images/logoGp.png" alt="GP AUTOS" />';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr><td><strong>Usuario:</strong> </td><td>" . strip_tags($cliente_id) . "</td></tr>";
        $message .= "<tr><td><strong>Nombre de cliente:</strong> </td><td>" . strip_tags($nombre) . "</td></tr>";
        $message .= "<tr><td><strong>Tipo de anuncio:</strong> </td><td>" . strip_tags($anuncio) . "</td></tr>";
        $message .= "<tr><td><strong>Método de pago:</strong> </td><td>" . strip_tags($metodo_pago) . "</td></tr>";
        $message .= "<tr><td><strong>Monto pagado:</strong> </td><td>" . strip_tags($monto) . "</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";

        $this->email->message($message);
        //enviar correo
        $this->email->send();
    }
    public function notiticacion_pago_feria($cliente_id, $correo, $nombre, $monto, $anuncio, $metodo_pago, $carro_id)
    {

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
        $this->email->to($correo);
        // $this->email->cc($correo);
        $this->email->cc('pagos@gpautos.net, anuncios2@gpautos.net');
        $this->email->bcc('csamayoa@zenstudiogt.com, michellepedroza@gpautos.net');

        $this->email->subject('Se registro un pago');

        //mensaje
        $message = '<html><body>';
        $message .= '<img src="http://gpautos.net/ui/public/images/logoGp.png" alt="GP AUTOS" />';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr><td><strong>Usuario:</strong> </td><td>" . strip_tags($cliente_id) . "</td></tr>";
        $message .= "<tr><td><strong>Carro:</strong> </td><td>" . strip_tags($carro_id) . "</td></tr>";
        $message .= "<tr><td><strong>Nombre de cliente:</strong> </td><td>" . strip_tags($nombre) . "</td></tr>";
        $message .= "<tr><td><strong>Tipo de anuncio:</strong> </td><td>" . strip_tags($anuncio) . "</td></tr>";
        $message .= "<tr><td><strong>Método de pago:</strong> </td><td>" . strip_tags($metodo_pago) . "</td></tr>";
        $message .= "<tr><td><strong>Monto pagado:</strong> </td><td>" . strip_tags($monto) . "</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";

        $this->email->message($message);
        //enviar correo
        $this->email->send();
    }
    public function notiticacion_error_pago($cliente_id, $correo, $nombre, $monto, $anuncio, $metodo_pago,$error)
    {

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
        $this->email->to($correo);
        // $this->email->cc($correo);
        $this->email->cc('pagos@gpautos.net, anuncios2@gpautos.net');
        $this->email->bcc('csamayoa@zenstudiogt.com');

        $this->email->subject('Se registro un error en el pago');

        //mensaje
        $message = '<html><body>';
        $message .= '<img src="http://gpautos.net/ui/public/images/logoGp.png" alt="GP AUTOS" />';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr><td><strong>Usuario:</strong> </td><td>" . strip_tags($cliente_id) . "</td></tr>";
        $message .= "<tr><td><strong>Nombre de cliente:</strong> </td><td>" . strip_tags($nombre) . "</td></tr>";
        $message .= "<tr><td><strong>Tipo de anuncio:</strong> </td><td>" . strip_tags($anuncio) . "</td></tr>";
        $message .= "<tr><td><strong>Método de pago:</strong> </td><td>" . strip_tags($metodo_pago) . "</td></tr>";
        $message .= "<tr><td><strong>Monto pagado:</strong> </td><td>" . strip_tags($monto) . "</td></tr>";
        $message .= "<tr><td><strong>Error:</strong> </td><td>" .serialize($error). "</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";

        $this->email->message($message);
        //enviar correo
        $this->email->send();
    }

    public function publicar_carro()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['tipos_cf'] = $this->Carros_model->tipos_vehiculo();
        $data['marca_cf'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();

        echo $this->templates->render('public/publicar_carro', $data);

    }

    public function publicar_carro_vip()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['tipos_cf'] = $this->Carros_model->tipos_vehiculo();
        $data['marca_cf'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();

        echo $this->templates->render('public/publicar_carro_vip', $data);

    }

    public function editar_carro()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        //carro
        $data['carro_id'] = $this->uri->segment(3);
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }

        $data['tipos_cf'] = $this->Carros_model->tipos_vehiculo();
        $data['marca_cf'] = $this->Carros_model->marca_vehiculo();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['tapiceria'] = $this->Carros_model->get_tapicerias();
        $data['transmision'] = $this->Carros_model->get_transmision();
        $data['carro'] = $this->Carros_model->get_datos_carro_cliente($data['carro_id']);
        echo $this->templates->render('public/editar_carro', $data);
    }

    public function guardar_carro()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $usuario = $data['datos_usuario']->row();

        $datos = array(

            'crr_fecha' => $this->input->post('fecha'),
            'crr_placa' => $this->input->post('placa'),
            'id_tipo_carro' => $this->input->post('tipo_carro_uf'),
            'id_marca' => $this->input->post('marca_carro_uf'),
            'id_linea' => $this->input->post('linea_carro_uf'),
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
            'crr_contacto_nombre' => $usuario->first_name,
            'crr_contacto_telefono' => $usuario->phone,
            'crr_contacto_email' => $usuario->email,
            'crr_estatus' => 'Pendiente',
            'id_predio_virtual' => '0',
            //'crr_date'                 => $this->input->post('avaluo_comercial'),
            'crr_premium' => 'no',
            'crr_certiauto' => 'no',
            //'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
            //'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
            'crr_nombre_propietario' => $usuario->first_name,
            'crr_telefono_propietario' => $usuario->phone,
            'crr_vencimiento' => $usuario->email,
            'user_id' => $user_id,
        );
        /* echo '<pre>';
         print_r($datos);
         echo '</pre>';*/
        $carro_id = $this->Carros_model->crear_carro_public($datos);
        redirect('cliente/subir_fotos/' . $carro_id);


    }

    public function guardar_carro_vip()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $usuario = $data['datos_usuario']->row();

        $datos = array(
            'crr_fecha' => $this->input->post('fecha'),
            'crr_placa' => $this->input->post('placa'),
            'id_tipo_carro' => $this->input->post('tipo_carro_uf'),
            'id_marca' => $this->input->post('marca_carro_uf'),
            'id_linea' => $this->input->post('linea_carro_uf'),
            'id_ubicacion' => $this->input->post('ubicacion_carro'),
            'crr_moneda_precio' => $this->input->post('moneda_carro'),
            'crr_precio' => $this->input->post('precio'),
            'crr_img' => $this->input->post('codigo') . '.jpg',
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
            'crr_freno_delantero' => $this->input->post('freno_delantero'),
            'crr_freno_trasero' => $this->input->post('freno_trasero'),
            'crr_blindaje' => $this->input->post('blindaje'),
            'crr_otros' => $this->input->post('otros'),
            'crr_estado' => 'Usado',
            'crr_contacto_nombre' => 'PROPIETARIO',
            'crr_contacto_telefono' => '',
            'crr_contacto_email' => $usuario->email,
            'crr_estatus' => 'Pendiente',
            'id_predio_virtual' => '9',
            'crr_premium' => 'no',
            'crr_certiauto' => 'no',
            'crr_nombre_propietario' => $usuario->first_name,
            'crr_telefono_propietario' => $usuario->phone,
            'crr_vencimiento' => '',
            'user_id' => $user_id,
        );

        $carro_id = $this->Carros_model->crear_carro_public($datos);
        redirect('cliente/subir_fotos/' . $carro_id);
    }

    public function guardar_editar_carro()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $usuario = $data['datos_usuario']->row();

        $datos = array(
            'id_carro' => $this->input->post('id_carro'),
            //'crr_fecha' => $this->input->post('fecha'),
            //'crr_placa' => $this->input->post('placa'),
            //'id_tipo_carro' => $this->input->post('tipo_carro_uf'),
            //'id_marca' => $this->input->post('marca_carro_uf'),
            //'id_linea' => $this->input->post('linea_carro_uf'),
            //'id_ubicacion' => $this->input->post('ubicacion_carro'),
            //'crr_moneda_precio' => $this->input->post('moneda_carro'),
            'crr_precio' => $this->input->post('precio'),
            //'crr_descripcion'          => $this->input->post('avaluo_comercial'),
            //'crr_img' => $this->input->post('codigo') . '.jpg',
            //'crr_img_ext'              => $this->input->post('avaluo_comercial'),
            //'crr_img_path'             => $this->input->post('avaluo_comercial'),
            //'crr_modelo' => $this->input->post('modelo'),
            //'crr_origen' => $this->input->post('origen_carro'),
            //'crr_ac' => $this->input->post('ac'),
            //'crr_alarma' => $this->input->post('alarma'),
            //'crr_aros_magnecio' => $this->input->post('aros_m'),
            //'crr_bolsas_aire' => $this->input->post('bolsa_aire'),
            //'crr_cerradura_central' => $this->input->post('cerradura_c'),
            //'crr_cilindros' => $this->input->post('cilindros'),
            //'crr_color' => $this->input->post('color'),
            //'crr_combustible' => $this->input->post('combustible_carro'),
            //'crr_espejos' => $this->input->post('espejos_e'),
            //'crr_kilometraje' => $this->input->post('kilometraje'),
            //'crr_motor' => $this->input->post('motor'),
            //'crr_platos' => $this->input->post('platos'),
            //'crr_polarizado' => $this->input->post('polarizado'),
            //'crr_puertas' => $this->input->post('puertas_carro'),
            //'crr_radio' => $this->input->post('radio'),
            //'crr_sunroof' => $this->input->post('sun_roof'),
            //'crr_tapiceria' => $this->input->post('tapiceria_carro'),
            //'crr_timon_hidraulico' => $this->input->post('timon_h'),
            //'crr_transmision' => $this->input->post('transmision_carro'),
            //'crr_4x4' => $this->input->post('t4x4'),
            //'crr_vidrios_electricos' => $this->input->post('vidrios_e'),
            //'crr_suspension_delantera' => $this->input->post('avaluo_comercial'),
            //'crr_suspension_trasera'   => $this->input->post('avaluo_comercial'),
            //'crr_freno_delantero' => $this->input->post('freno_delantero'),
            //'crr_freno_trasero' => $this->input->post('freno_trasero'),
            //'crr_blindaje' => $this->input->post('blindaje'),
            //'crr_caja'                 => $this->input->post('avaluo_comercial'),
            //'crr_freno'                => $this->input->post('avaluo_comercial'),
            //'crr_suspension'           => $this->input->post('avaluo_comercial'),
            //'crr_ejes'                 => $this->input->post('avaluo_comercial'),
            //'crr_otros' => $this->input->post('otros'),
            //'crr_estado' => 'Usado',
            //'crr_contacto'             => $this->input->post('avaluo_comercial'),
            //'crr_contacto_nombre' => $usuario->first_name,
            //'crr_contacto_telefono' => $usuario->phone,
            //'crr_contacto_email' => $usuario->email,
            'crr_estatus' => $this->input->post('estado'),
            //'id_predio_virtual' => '0',
            //'crr_date'                 => $this->input->post('avaluo_comercial'),
            //'crr_premium' => 'no',
            //'crr_certiauto' => 'no',
            //'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
            //'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
            //'crr_nombre_propietario' => $usuario->first_name,
            //'crr_telefono_propietario' => $usuario->phone,
            //'crr_vencimiento' => $usuario->email,
            //'user_id' => $user_id,
        );
        /* echo '<pre>';
         print_r($datos);
         echo '</pre>';*/
        $carro_id = $this->Carros_model->actualizar_carro_public($datos);
        redirect('cliente/perfil/');


    }

    public function dar_de_baja()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        //carro
        $data['carro_id'] = $this->uri->segment(3);
        $this->Carros_model->public_dar_de_baja($data['carro_id']);
        redirect('cliente/perfil/');
    }

    public function subir_fotos()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }

        $data = cargar_componentes_buscador();
        //carro
        $data['carro_id'] = $this->uri->segment(3);
        $data['cambio_foto'] = $this->uri->segment(4);
        if ($data['cambio_foto'] == '1') {
            $this->Carros_model->public_pasar_a_revision_fotos($data['carro_id']);
        }
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $data['carro'] = $this->Carros_model->get_datos_carro_cliente($data['carro_id']);
        echo $this->templates->render('public/subir_fotos', $data);
    }

    public function procesar_foto()
    {
        /* echo '<pre>';
         print_r($_FILES);
         echo '</pre>';
         echo '<pre>';
         print_r($_POST);
         echo '</pre>';*/
        $image = file_get_contents($_FILES['imagen']['tmp_name']);
        $id_carro = $_POST['id_carro'];
        $numero_foto = $_POST['img_number'];

        file_put_contents('/home2/gpautos/public_html/web/images_cont/' . $id_carro . ' (' . $numero_foto . ').jpg', $image);
    }

    public function area_pago()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        $data['parametros'] = $this->Admin_model->get_parametros();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);

        echo $this->templates->render('public/area_pago', $data);
    }

    public function tipo_anuncio()
    {

    }

    public function pago_anuncio()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }

        $data = cargar_componentes_buscador();
        //carro
        $data['carro_id'] = $this->uri->segment(3);
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $data['carro'] = $this->Carros_model->get_datos_carro_cliente($data['carro_id']);

        echo $this->templates->render('public/pago_anuncio', $data);
    }

    public function pago_tarjeta()
    {

    }

    public function pago_en_linea()
    {

    }

    public function revisar_anuncio()
    {

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }

        $data = cargar_componentes_buscador();
        //carro
        $data['carro_id'] = $this->uri->segment(3);
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $data['carro'] = $this->Carros_model->get_datos_carro_cliente($data['carro_id']);
        $data['pagos_carro'] = $this->Pagos_model->get_pagos_carro_public($data['carro_id']);
        echo $this->templates->render('public/revisar_anuncio', $data);
    }

    public function forgot_password()
    {
        // setting validation rules by checking whether identity is username or email
        if ($this->config->item('identity', 'ion_auth') != 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        } else {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }


        if ($this->form_validation->run() === FALSE) {
            $this->data['type'] = $this->config->item('identity', 'ion_auth');
            // setup the input
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
            );

            if ($this->config->item('identity', 'ion_auth') != 'email') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            echo $this->templates->render('auth/forgot_password', $this->data);
            //$this->_render_page('auth/forgot_password', $this->data);
        } else {
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

            if (empty($identity)) {

                if ($this->config->item('identity', 'ion_auth') != 'email') {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                } else {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("cliente/forgot_password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                // if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("cliente/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("cliente/forgot_password", 'refresh');
            }
        }
    }

    function correo_publicacion()
    {

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
        //$this->email->to('gppredio@gpautos.net');
        //$this->email->bcc('csamayoa@zenstudiogt.com');
        $this->email->to('csamayoa@zenstudiogt.com');

        $this->email->subject('Vehiculo publicado:');

        //mensaje
        $message = '<html><body>';
        $message .= '<table style="border: #e79637 1px solid;padding: 20px;width: 600px; font-family:  Helvetica, Arial, sans-serif;">';
        $message .= ' <tr><td>&nbsp;</td></tr>';
        $message .= '<tr><td colspan="3"><h1 style="text-align: center">FELICITACIONES</h1></td></tr>';
        $message .= '<tr><td></td>';
        $message .= '<td><img src="http://gpautos.net/ui/public/images/bienvenida_logo.JPG" style="width: 400px;display: block;margin: 0 auto;"></td>';
        $message .= '<td></td></tr>';
        $message .= '<tr><td></td>';
        $message .= '<td><p style="color: #fff; background: #e79637; padding: 20px;">EN BREVE TU ANUNCIO ESTARA ACTIVO</p></td>';
        $message .= '<td><p>Recuerda que si deseas modificar tu anuncio lo puedes hacer desde tu perfil en <a href="http://gpautos.net">gpautos.net.</a></p></td>';
        $message .= '<td><p>La duración de tu anuncio es de 30 dias</p></td>';
        $message .= '<td><p>Al finalizar el timpo podras renovar tu anuncio con un solo click</p></td>';
        $message .= '<td></td></tr>';
        $message .= '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $message .= '<tr><td colspan="3">Atentamente.</td></tr>';
        $message .= '<tr><td colspan="3"><p>';
        $message .= 'Equipo de GPAUTOS.NET<br>';
        $message .= '<a href="mailto:info@gpautos.net">info@gpautos.net</a><br>';
        $message .= '<a href="http://gpautos.net" style="color: #e79637; font-weight: bold">www.gpautos.net</a>';
        $message .= '</p></td></tr>';
        $message .= "</body></html>";

        $this->email->message($message);
        //enviar correo
        $this->email->send();


        echo 'send';

    }

    public function facturar()
    {

        //--------------------------------------- DETALLE DEL PRIMER PRODUCTO -----------------------------------
        $detalle[0]["cantidad"] = 2;
        $detalle[0]["unidadMedida"] = "UND";
        $detalle[0]["codigoProducto"] = "001-2011";
        $detalle[0]["descripcionProducto"] = "Prontuario Tributario";
        $detalle[0]["precioUnitario"] = "150";
        $detalle[0]["montoBruto"] = "300";
        $detalle[0]["montoDescuento"] = "0";
        $detalle[0]["importeNetoGravado"] = "336";
        $detalle[0]["detalleImpuestosIva"] = "36";
        $detalle[0]["importeExento"] = "0";
        $detalle[0]["otrosImpuestos"] = "0";
        $detalle[0]["importeOtrosImpuestos"] = "0";
        $detalle[0]["importeTotalOperacion"] = "336";
        $detalle[0]["tipoProducto"] = "S";// B= BIEN, S= SERVICIO
        //-------------------------------------------------------------------------------------------------------
        $detalle[0]["personalizado_01"] = "N/A";
        $detalle[0]["personalizado_02"] = "N/A";
        $detalle[0]["personalizado_03"] = "N/A";
        $detalle[0]["personalizado_04"] = "N/A";
        $detalle[0]["personalizado_05"] = "N/A";
        $detalle[0]["personalizado_06"] = "N/A";
        //--------------------------------------- DETALLE DEL SEGUNDO PRODUCTO ----------------------------------
        $detalle[1]["cantidad"] = 1;
        $detalle[1]["unidadMedida"] = "UND";
        $detalle[1]["codigoProducto"] = "002-2011";
        $detalle[1]["descripcionProducto"] = "Membresia 6 Meses ";
        $detalle[1]["precioUnitario"] = "1750";
        $detalle[1]["montoBruto"] = "1750";
        $detalle[1]["montoDescuento"] = "0";
        $detalle[1]["importeNetoGravado"] = "1960";
        $detalle[1]["detalleImpuestosIva"] = "210";
        $detalle[1]["importeExento"] = "0";
        $detalle[1]["otrosImpuestos"] = "0";
        $detalle[1]["importeOtrosImpuestos"] = "0";
        $detalle[1]["importeTotalOperacion"] = "1960";
        $detalle[1]["tipoProducto"] = "B";// B= BIEN, S= SERVICIO
        //-------------------------------------------------------------------------------------------------------
        $detalle[1]["personalizado_01"] = "N/A";
        $detalle[1]["personalizado_02"] = "N/A";
        $detalle[1]["personalizado_03"] = "N/A";
        $detalle[1]["personalizado_04"] = "N/A";
        $detalle[1]["personalizado_05"] = "N/A";
        $detalle[1]["personalizado_06"] = "N/A";

        try {

            $client = new SoapClient("https://www.ingface.net/listener/ingface?wsdl", array("exceptions" => 1));
            $resultado = $client->registrarDte(array("dte" => array("usuario" => "GPAUTOS",
                    "clave" => "A3C73DA00A0C49722CACA5AD7B80C6CDD41D8CD98F00B204E9800998ECF8427E",
                    "validador" => false,
                    "dte" => array
                    (
                        "codigoEstablecimiento" => "2",
                        "idDispositivo" => "001",
                        "serieAutorizada" => "GP01",
                        "numeroResolucion" => "2019568702922229",
                        "fechaResolucion" => "2019-02-10",
                        "tipoDocumento" => "FACE-63",
                        "serieDocumento" => "GP01",

                        "estadoDocumento" => "ACTIVO",
                        "numeroDocumento" => "1",
                        "fechaDocumento" => "2019-10-10",
                        "codigoMoneda" => "GTQ",
                        "tipoCambio" => "1",
                        "nitComprador" => str_replace("-", "", "5503407-1"),
                        "nombreComercialComprador" => "CONSUMIDOR FELIZ",
                        "direccionComercialComprador" => "CIUDAD",
                        "telefonoComprador" => "22082208",
                        "correoComprador" => "correo@infile.com.gt",
                        "regimen2989" => false,
                        "departamentoComprador" => "N/A",
                        "municipioComprador" => "N/A",

                        "importeBruto" => 200,
                        "importeDescuento" => 0,
                        "importeTotalExento" => 0,
                        "importeOtrosImpuestos" => 0,
                        "importeNetoGravado" => 224,
                        "detalleImpuestosIva" => 24,
                        "montoTotalOperacion" => 224,
                        "descripcionOtroImpuesto" => "N/A",

                        "observaciones" => "N/A",
                        "nitVendedor" => str_replace("-", "", "136771-4"),
                        "departamentoVendedor" => "GUATEMALA",
                        "municipioVendedor" => "GUATEMALA",
                        "direccionComercialVendedor" => "CIUDAD REFORMA",
                        "NombreComercialRazonSocialVendedor" => "NOMBRE DELA EMPRESA, S.A",
                        "nombreCompletoVendedor" => "NOMBRE DELA EMPRESA, S.A",
                        "regimenISR" => "1",

                        "personalizado_01" => "N/A",
                        "personalizado_02" => "N/A",
                        "personalizado_03" => "N/A",
                        "personalizado_04" => "N/A",
                        "personalizado_05" => "N/A",
                        "personalizado_06" => "N/A",
                        "personalizado_07" => "N/A",
                        "personalizado_08" => "N/A",
                        "personalizado_09" => "N/A",
                        "personalizado_10" => "N/A",
                        "personalizado_11" => "N/A",
                        "personalizado_12" => "N/A",
                        "personalizado_13" => "N/A",
                        "personalizado_14" => "N/A",
                        "personalizado_15" => "N/A",
                        "personalizado_16" => "N/A",
                        "personalizado_17" => "N/A",
                        "personalizado_18" => "N/A",
                        "personalizado_19" => "N/A",
                        "personalizado_20" => "N/A",

                        "detalleDte" => $detalle
                    )
                )
                )
            );

            if ($resultado->return->valido) {
                echo "DTE: " . $resultado->return->numeroDte . "</br>";
                echo "CAE: " . $resultado->return->cae . "</br>";
            } else {
                echo "ERROR: " . $resultado->return->descripcion;
            }
        } catch (SoapFault $E) {
            $objResponse->addAlert($E->faultstring);
        }
    }

}