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
        $this->load->model('Carros_model');
        $this->load->model('Banners_model');
        $this->load->model('Cliente_model');
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
            redirect("auth", 'refresh');
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
                redirect('cliente/perfil', 'refresh');
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
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);

        echo $this->templates->render('public/perfil', $data);
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
            'id_carro' => '1000001',
            'crr_codigo' => '1000001',
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
        );
        /* echo '<pre>';
         print_r($datos);
         echo '</pre>';*/
        $carro_id = $this->Carros_model->crear_carro($datos);
        redirect('cliente/subir_fotos/' . $carro_id);


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
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $data['carro'] = $this->Carros_model->get_datos_carro_cliente($data['carro_id']);

        echo $this->templates->render('public/subir_fotos', $data);
    }

    public function procesar_foto()
    {
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $image = file_get_contents($_FILES['imagen']['tmp_name']);
        $id_carro = $_POST['id_carro'];
        $numero_foto =$_POST['img_number'];

        file_put_contents('/home2/gpautos/public_html/upload/'.$id_carro.' ('.$numero_foto.').jpg', $image);
    }

}