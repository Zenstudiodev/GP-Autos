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
                redirect(base_url().'cliente/perfil', 'refresh');
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
            redirect('cliente/login');
        }
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $this->Cliente_model->get_cliente_data($user_id);
        if($this->Cliente_model->get_carros_cliente($user_id)){
            $data['carros']=$this->Cliente_model->get_carros_cliente($user_id);
        }else{
            $data['carros']=false;
        }
        //$data['carros']=

        echo $this->templates->render('public/perfil', $data);
    }

    public function seleccion_anuncio(){
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

        echo $this->templates->render('public/seleccion_anuncio', $data);
    }
    public function forma_pago(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }

        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);


        $datos_anuncio = array(
            'ubicacion_carro'  => $this->input->post('ubicacion_carro'),
            'tipo_anuncio'     => $this->input->post('tipo_anuncio'),
        );

        $this->session->set_userdata($datos_anuncio);

        print_contenido($_POST);
        print_contenido($_SESSION);
        $data['parametros'] = $this->Admin_model->get_parametros();

        echo $this->templates->render('public/forma_pago', $data);

    }
    public function datos_pago(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }

        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $datos_anuncio = array(
            'forma_pago'  => $this->input->post('forma_pago'),
        );
        $this->session->set_userdata($datos_anuncio);
        echo $this->session->forma_pago;

        print_contenido($_POST);
        print_contenido($_SESSION);
        $data['forma_pago'] = $this->session->forma_pago;

        echo $this->templates->render('public/datos_pago', $data);
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
    public function editar_carro(){
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
    public function dar_de_baja(){
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
        if($data['cambio_foto'] == '1'){
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
        $numero_foto =$_POST['img_number'];

        file_put_contents('/home2/gpautos/public_html/web/images_cont/'.$id_carro.' ('.$numero_foto.').jpg', $image);
    }
    public function area_pago(){
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
    public function tipo_anuncio(){

    }
    public function pago_anuncio(){
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
    public function pago_tarjeta(){

    }
    public function pago_en_linea(){

    }
    public function pago_deposito(){
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
    public function pago_efectivo(){
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
    public function guarda_pago_efectivo(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();

        $datos_pago_efectivo = array(
            'user_id'    => $user_id,
            'direccion'    => $this->input->post('direccion'),
            'telefono'    => $this->input->post('telefono'),
            'monto'    => 175,
            'carro_id'    => $this->input->post('carro_id'),
        );
        $data['banners'] = $this->Pagos_model->guardar_pago_efectivo($datos_pago_efectivo);
        //redirigimos a visanet
        redirect(base_url() . 'Cliente/revisar_anuncio/'.$this->input->post('carro_id'));

    }
    public function guarda_pago_deposito(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();

        $datos_pago_efectivo = array(
            'user_id'    => $user_id,
            'banco'    => $this->input->post('banco'),
            'metodo'    => 'deposito',
            'monto'    => 125,
            'carro_id'    => $this->input->post('carro_id'),
        );
        $data['banners'] = $this->Pagos_model->guardar_pago_deposito($datos_pago_efectivo);
        //redirigimos a visanet
        redirect(base_url() . 'Cliente/revisar_anuncio/'.$this->input->post('carro_id'));

    }
    public function revisar_anuncio(){

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
        if ($this->config->item('identity', 'ion_auth') != 'email')
        {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        }
        else
        {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }


        if ($this->form_validation->run() === FALSE)
        {
            $this->data['type'] = $this->config->item('identity', 'ion_auth');
            // setup the input
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
            );

            if ($this->config->item('identity', 'ion_auth') != 'email')
            {
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            }
            else
            {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            echo $this->templates->render('auth/forgot_password', $this->   data);
            //$this->_render_page('auth/forgot_password', $this->data);
        }
        else
        {
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

            if (empty($identity))
            {

                if ($this->config->item('identity', 'ion_auth') != 'email')
                {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                }
                else
                {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten)
            {
                // if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }
        }
    }

    function correo_publicacion(){

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


        echo'send';

    }

}