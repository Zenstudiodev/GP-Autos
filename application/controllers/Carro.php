<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:23 PM
 */
class Carro extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Cliente_model');
		$this->load->model('Carros_model');
		$this->load->model('Banners_model');
		$this->load->model('Predio_model');
		$this->load->helper('carros');
		$this->load->library("pagination");
	}
	public function index()
	{

		$data['carros'] = $this->Carros_model->get_carros_frontPage();
		echo $this->templates->render('public/public_home', $data);
	}
	public function ver()
	{
        $data = cargar_componentes_buscador();
		//obtenemos el id del carro desde el segmento de url
		$data['segmento'] = $this->uri->segment(3);
		if (!$data['segmento'])
		{
			//TODO  redirigir a vista de listao de carros
			//redirect('prospectos/prospectosList', 'refresh');
		}
		else
		{

			$data['carro'] = $this->Carros_model->get_datos_carro($data['segmento']);
			if($data['carro']){
			    $data_carro = $data['carro']->row();
                $predio=$this->Predio_model->get_predio_data($data_carro->id_predio_virtual);
                if($predio) {
                    $predio = $predio->row();
                    if ($predio->prv_estatus == 'Baja') {
                        $data['carro'] = false;
                    }
                }

            }

		}
		$data['header_banners'] = $this->Banners_model->header_banners_activos();
		$this->Carros_model->registrar_visita($data['segmento']);
		echo $this->templates->render('public/public_carro', $data);

	}
	public function registrar_whatsapp(){
        $id_carro = $this->input->post('id_carro');
        $this->Carros_model->registrar_whatsapp($id_carro);
    }
	public function ver_feria()
	{
        $data = cargar_componentes_buscador();
		//obtenemos el id del carro desde el segmento de url
		$data['segmento'] = $this->uri->segment(3);
		if (!$data['segmento'])
		{
			//TODO  redirigir a vista de listao de carros
			//redirect('prospectos/prospectosList', 'refresh');
		}
		else
		{

			$data['carro'] = $this->Carros_model->get_datos_carro($data['segmento']);
		}
        //$data['header_banners'] = $this->Banners_model->header_banners_activos();
		$data['header_banners'] = $this->Banners_model->header_banners_feria_activos();
		echo $this->templates->render('public/public_carro_feria', $data);

	}
	public function por_codigo()
	{

		if ($this->input->post('input_codigo'))
		{
			$codigo_carro = $this->input->post('input_codigo');
			redirect(base_url() . 'Carro/ver/'.$codigo_carro);

		}
		else
		{
			redirect(base_url());
		}


	}
	public function por_codigo_feria()
	{

		if ($this->input->post('input_codigo'))
		{
			$codigo_carro = $this->input->post('input_codigo');
			redirect(base_url() . 'Carro/ver_feria/'.$codigo_carro);

		}
		else
		{
			redirect(base_url());
		}


	}
	public function buscar()
	{
		$data['tipos']        = $this->Carros_model->tipos_vehiculo();
		$data['marca']        = $this->Carros_model->marca_vehiculo();
		$data['combustibles'] = $this->Carros_model->combustible_vehiculo();
		$data['ubicaciones']  = $this->Carros_model->ubicaciones_vehiculo();
		$tipo_vehiculo        = $this->input->get('tipo_carro');
		$marca                = $this->input->get('marca_carro');
		$linea                = $this->input->get('linea_carro');
		$combustible          = $this->input->get('combustible_carro');
		$origen               = $this->input->get('origen_carro');
		$p_min                = $this->input->get('p_carro_min');
		$p_max                = $this->input->get('p_carro_max');
		$a_min                = $this->input->get('a_carro_min');
		$a_max                = $this->input->get('a_carro_max');

		$data['carros'] = $this->Carros_model->resultado_busqueda($tipo_vehiculo, $marca, $linea, $combustible, $origen, $p_min, $p_max, $a_min, $a_max);


		echo $this->templates->render('public/buscar_carro', $data);


	}
	public function filtro(){

        //Predio
        $data['s_predio'] = $this->uri->segment(3);
        if ($data['s_predio'] == null) {
            //   echo 'no hay ubicacion';
            $data['s_predio'] = 'TODOS';
            $sesion_predio = 'TODOS';
        } else {
            $sesion_predio = $this->uri->segment(3);
        }

        //Ubicacion
        $data['s_ubicacion'] = $this->uri->segment(4);
        if ($data['s_ubicacion'] == null) {
            //   echo 'no hay ubicacion';
            $data['s_ubicacion'] = 'TODOS';
            $sesion_ubicacion = 'TODOS';
        } else {
            $sesion_ubicacion = $this->uri->segment(4);
        }

        $data['s_ubicacion'] = strtoupper($data['s_ubicacion']);
        //tipo
        $data['s_tipo'] = $this->uri->segment(5);
        if ($data['s_tipo'] == null) {
            // echo 'no hay tipo';
            $data['s_tipo'] = 'TODOS';
            $sesion_tipo = 'TODOS';
        } else {
            $sesion_tipo = $this->uri->segment(5);
        }
        $data['s_tipo'] = strtoupper($data['s_tipo']);
        //marca
        $data['s_marca'] = $this->uri->segment(6);
        if ($data['s_marca'] == null) {
            //echo 'no hay marca';
            $data['s_marca'] = 'TODOS';
            $sesion_marca = 'TODOS';
        } else {
            $sesion_marca = $this->uri->segment(6);
        }
        $data['s_marca'] = strtoupper($data['s_marca']);
        //linea
        $data['s_linea'] = $this->uri->segment(7);
        if ($data['s_linea'] == null) {
            //  echo 'no hay linea';
            $data['s_linea'] = 'TODOS';
            $sesion_linea = 'TODOS';
        } else {
            $sesion_linea = $this->uri->segment(7);
        }
        $data['s_linea'] = strtoupper($data['s_linea']);
        //transmision
        $data['s_transmision'] = $this->uri->segment(8);
        if ($data['s_transmision'] == null) {
            //   echo 'no hay transmision';
            $data['s_transmision'] = 'TODOS';
            $sesion_transmision = 'TODOS';
        } else {
            $sesion_transmision = $this->uri->segment(8);
        }
        $data['s_transmision'] = strtoupper($data['s_transmision']);
        //combustible
        $data['s_combustible'] = $this->uri->segment(9);
        if ($data['s_combustible'] == null) {
            //echo 'no hay combustible';
            $data['s_combustible'] = 'TODOS';
            $sesion_combustible = 'TODOS';
        } else {
            $sesion_combustible = $this->uri->segment(9);
        }
        $data['s_combustible'] = strtoupper($data['s_combustible']);
        //origen
        $data['s_origen'] = $this->uri->segment(10);
        if ($data['s_origen'] == null) {
            //  echo 'no hau origen';
            $data['s_origen'] = 'TODOS';
            $sesion_origen = 'TODOS';
        } else {
            $sesion_origen = $this->uri->segment(10);
        }
        $data['s_origen'] = strtoupper($data['s_origen']);
        //Moneda
        $data['s_moneda'] = $this->uri->segment(11);
        if ($data['s_moneda'] == null) {
            //  echo 'no hay precio';
            $data['s_moneda'] = '0-300000';
            $sesion_moneda = '0-300000';
        } else {
            $sesion_moneda = $this->uri->segment(11);
        }
        //precio
        $data['s_precio'] = $this->uri->segment(12);
        if ($data['s_precio'] == null) {
            //  echo 'no hay precio';
            $data['s_precio'] = '0-300000';
            $sesion_precio = '0-300000';
        } else {
            $sesion_precio = $this->uri->segment(12);
        }
        //modelo
        $data['s_modelo'] = $this->uri->segment(13);
        if ($data['s_modelo'] == null) {
            //    echo 'no hay modelo';
            $data['s_modelo'] = '1952-2018';
            $sesion_modelo = '1952-2018';
        } else {
            $sesion_modelo = $this->uri->segment(13);
        }
        $precio = explode("-", $data['s_precio']);
        $modelo = explode("-", $data['s_modelo']);

        //Precio minimo
        $data['precio_min'] = $precio[0];
        //precio maximo
        $data['precio_max'] = $precio[1];
        //año minimo
        $data['a_min'] = $modelo[0];
        //año maximo
        $data['a_max'] = $modelo[1];

        $session_data = array(
            'predio' => $sesion_predio,
            'ubicacion' => $sesion_ubicacion,
            'tipo' => $sesion_tipo,
            'marca' => $sesion_marca,
            'linea' => $sesion_linea,
            'transmision' => $sesion_transmision,
            'combustible' => $sesion_combustible,
            'origen' => $sesion_origen,
            'moneda' => $sesion_moneda,
            'precio' => $sesion_precio,
            'modelo' => $sesion_modelo,
        );

        // Add user data in session
        $this->session->set_userdata('filtros_buscador', $session_data);

        $seccion_vehiculo = true;
        $seccion_caracteristicas = false;
        $seccion_precio = false;
        $seccion_modelo = false;
        $secciones_buscador = array(
            'vehiculo' => $seccion_vehiculo,
            'caracteristicas' => $seccion_caracteristicas,
            'precio' => $seccion_precio,
            'modelo' => $seccion_modelo,
        );

        // Add user data in session
        $this->session->set_userdata('secciones_buscador', $secciones_buscador);


        $data['predios'] = $this->Carros_model->predios();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marcas_vehiculo($data['s_tipo']);
        $data['linea'] = $this->Carros_model->lineas_vehiculo($data['s_tipo'], $data['s_marca']);

        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['ubicaciones'] = $this->Carros_model->ubicaciones_vehiculo();
        $data['transmisiones'] = $this->Carros_model->get_transmision();


        $predio = $data['s_predio'];
        $ubicacion = $data['s_ubicacion'];
        $tipo_vehiculo = $data['s_tipo'];
        $marca = $data['s_marca'];
        $linea = $data['s_linea'];
        $transmision = $data['s_transmision'];
        $combustible = $data['s_combustible'];
        $origen = $data['s_origen'];
        $moneda = $data['s_moneda'];
        $p_min = $precio[0];
        $p_max = $precio[1];
        $a_min = $modelo[0];
        $a_max = $modelo[1];

        //echo $ubicacion;

        //
        $data['numero_resultados'] = $this->Carros_model->numero_registros_busqueda_paginacion_test($predio, $ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $moneda, $p_min, $p_max, $a_min, $a_max);
        // echo '<hr>';
        //echo $data['numero_resultados'];

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "Carro/filtro/" . $data['s_predio'] . '/' . $data['s_ubicacion'] . '/' . $data['s_tipo'] . '/' . $data['s_marca'] . '/' . $data['s_linea'] . '/' . $data['s_transmision'] . '/' . $data['s_combustible'] . '/' . $data['s_origen'] . '/' . $data['s_moneda'] . '/' . $data['s_precio'] . '/' . $data['s_modelo'];
        $config["total_rows"] = $data['numero_resultados'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 14;
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
        $page = ($this->uri->segment(11)) ? $this->uri->segment(14) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['carros'] = $this->Carros_model->resultado_busqueda_paginacion_test($predio, $ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $moneda, $p_min, $p_max, $a_min, $a_max, $config["per_page"], $page);
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        echo $this->templates->render('public/filtro_carro', $data);
	}
	public function filtro_feria(){

        //Predio
        $data['s_predio'] = $this->uri->segment(3);
        if ($data['s_predio'] == null) {
            //   echo 'no hay ubicacion';
            $data['s_predio'] = 'TODOS';
            $sesion_predio = 'TODOS';
        } else {
            $sesion_predio = $this->uri->segment(3);
        }

        //Ubicacion
        $data['s_ubicacion'] = $this->uri->segment(4);
        if ($data['s_ubicacion'] == null) {
            //   echo 'no hay ubicacion';
            $data['s_ubicacion'] = 'TODOS';
            $sesion_ubicacion = 'TODOS';
        } else {
            $sesion_ubicacion = $this->uri->segment(4);
        }

        $data['s_ubicacion'] = strtoupper($data['s_ubicacion']);
        //tipo
        $data['s_tipo'] = $this->uri->segment(5);
        if ($data['s_tipo'] == null) {
            // echo 'no hay tipo';
            $data['s_tipo'] = 'TODOS';
            $sesion_tipo = 'TODOS';
        } else {
            $sesion_tipo = $this->uri->segment(5);
        }
        $data['s_tipo'] = strtoupper($data['s_tipo']);
        //marca
        $data['s_marca'] = $this->uri->segment(6);
        if ($data['s_marca'] == null) {
            //echo 'no hay marca';
            $data['s_marca'] = 'TODOS';
            $sesion_marca = 'TODOS';
        } else {
            $sesion_marca = $this->uri->segment(6);
        }
        $data['s_marca'] = strtoupper($data['s_marca']);
        //linea
        $data['s_linea'] = $this->uri->segment(7);
        if ($data['s_linea'] == null) {
            //  echo 'no hay linea';
            $data['s_linea'] = 'TODOS';
            $sesion_linea = 'TODOS';
        } else {
            $sesion_linea = $this->uri->segment(7);
        }
        $data['s_linea'] = strtoupper($data['s_linea']);
        //transmision
        $data['s_transmision'] = $this->uri->segment(8);
        if ($data['s_transmision'] == null) {
            //   echo 'no hay transmision';
            $data['s_transmision'] = 'TODOS';
            $sesion_transmision = 'TODOS';
        } else {
            $sesion_transmision = $this->uri->segment(8);
        }
        $data['s_transmision'] = strtoupper($data['s_transmision']);
        //combustible
        $data['s_combustible'] = $this->uri->segment(9);
        if ($data['s_combustible'] == null) {
            //echo 'no hay combustible';
            $data['s_combustible'] = 'TODOS';
            $sesion_combustible = 'TODOS';
        } else {
            $sesion_combustible = $this->uri->segment(9);
        }
        $data['s_combustible'] = strtoupper($data['s_combustible']);
        //origen
        $data['s_origen'] = $this->uri->segment(10);
        if ($data['s_origen'] == null) {
            //  echo 'no hau origen';
            $data['s_origen'] = 'TODOS';
            $sesion_origen = 'TODOS';
        } else {
            $sesion_origen = $this->uri->segment(10);
        }
        $data['s_origen'] = strtoupper($data['s_origen']);
        //Moneda
        $data['s_moneda'] = $this->uri->segment(11);
        if ($data['s_moneda'] == null) {
            //  echo 'no hay precio';
            $data['s_moneda'] = '0-300000';
            $sesion_moneda = '0-300000';
        } else {
            $sesion_moneda = $this->uri->segment(11);
        }
        //precio
        $data['s_precio'] = $this->uri->segment(12);
        if ($data['s_precio'] == null) {
            //  echo 'no hay precio';
            $data['s_precio'] = '0-300000';
            $sesion_precio = '0-300000';
        } else {
            $sesion_precio = $this->uri->segment(12);
        }
        //modelo
        $data['s_modelo'] = $this->uri->segment(13);
        if ($data['s_modelo'] == null) {
            //    echo 'no hay modelo';
            $data['s_modelo'] = '1952-2018';
            $sesion_modelo = '1952-2018';
        } else {
            $sesion_modelo = $this->uri->segment(13);
        }
        $precio = explode("-", $data['s_precio']);
        $modelo = explode("-", $data['s_modelo']);

        //Precio minimo
        $data['precio_min'] = $precio[0];
        //precio maximo
        $data['precio_max'] = $precio[1];
        //año minimo
        $data['a_min'] = $modelo[0];
        //año maximo
        $data['a_max'] = $modelo[1];

        $session_data = array(
            'predio' => $sesion_predio,
            'ubicacion' => $sesion_ubicacion,
            'tipo' => $sesion_tipo,
            'marca' => $sesion_marca,
            'linea' => $sesion_linea,
            'transmision' => $sesion_transmision,
            'combustible' => $sesion_combustible,
            'origen' => $sesion_origen,
            'moneda' => $sesion_moneda,
            'precio' => $sesion_precio,
            'modelo' => $sesion_modelo,
        );

        // Add user data in session
        $this->session->set_userdata('filtros_buscador', $session_data);

        $seccion_vehiculo = true;
        $seccion_caracteristicas = false;
        $seccion_precio = false;
        $seccion_modelo = false;
        $secciones_buscador = array(
            'vehiculo' => $seccion_vehiculo,
            'caracteristicas' => $seccion_caracteristicas,
            'precio' => $seccion_precio,
            'modelo' => $seccion_modelo,
        );

        // Add user data in session
        $this->session->set_userdata('secciones_buscador', $secciones_buscador);


        $data['predios'] = $this->Carros_model->predios();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marcas_vehiculo($data['s_tipo']);
        $data['linea'] = $this->Carros_model->lineas_vehiculo($data['s_tipo'], $data['s_marca']);

        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['ubicaciones'] = $this->Carros_model->ubicaciones_vehiculo();
        $data['transmisiones'] = $this->Carros_model->get_transmision();


        $predio = $data['s_predio'];
        $ubicacion = $data['s_ubicacion'];
        $tipo_vehiculo = $data['s_tipo'];
        $marca = $data['s_marca'];
        $linea = $data['s_linea'];
        $transmision = $data['s_transmision'];
        $combustible = $data['s_combustible'];
        $origen = $data['s_origen'];
        $moneda = $data['s_moneda'];
        $p_min = $precio[0];
        $p_max = $precio[1];
        $a_min = $modelo[0];
        $a_max = $modelo[1];

        //echo $ubicacion;

        //
        $data['numero_resultados'] = $this->Carros_model->numero_registros_busqueda_paginacion_feria($predio, $ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $moneda, $p_min, $p_max, $a_min, $a_max);
        // echo '<hr>';
        //echo $data['numero_resultados'];

        //pagination
        $config = array();
        $config["base_url"] = base_url() . "carro/filtro_feria/" . $data['s_predio'] . '/' . $data['s_ubicacion'] . '/' . $data['s_tipo'] . '/' . $data['s_marca'] . '/' . $data['s_linea'] . '/' . $data['s_transmision'] . '/' . $data['s_combustible'] . '/' . $data['s_origen'] . '/' . $data['s_moneda'] . '/' . $data['s_precio'] . '/' . $data['s_modelo'];
        $config["total_rows"] = $data['numero_resultados'];
        $config["per_page"] = 20;
        $config["uri_segment"] = 14;
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
        $page = ($this->uri->segment(11)) ? $this->uri->segment(14) : 0;
        $data["links"] = $this->pagination->create_links();

        $data['carros'] = $this->Carros_model->resultado_busqueda_paginacion_feria($predio, $ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $moneda, $p_min, $p_max, $a_min, $a_max, $config["per_page"], $page);
        $data['banners'] = $this->Banners_model->banneers_activos();
        //$data['header_banners'] = $this->Banners_model->header_banners_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_feria_activos();
        echo $this->templates->render('public/filtro_carro_feria', $data);
	}
	public function lineas()
	{
        header("Access-Control-Allow-Origin: *");
		//OBTENEMOS VARIABLES DE LA URL
		$tipo  = $_GET['tipo'];
		$marca = $_GET['marca'];
		//pasamos variablea al modelo
		$lineas = $this->Carros_model->lineas_vehiculo($tipo, $marca);
		//imprimimos en formato json el resultado
        if($lineas) {
            echo json_encode($lineas->result_array());
        }
	}
	public function marcas(){
        header("Access-Control-Allow-Origin: *");
		//OBTENEMOS VARIABLES DE LA URL
		$tipo  = $_GET['tipo'];
		//pasamos variablea al modelo
		$marcas = $this->Carros_model->marcas_vehiculo($tipo);
		//imprimimos en formato json el resultado
        if($marcas) {
		echo json_encode($marcas->result_array());
        }
	}
    public function data_carro_json()
    {
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $codigo  = $_GET['codigo'];
        //pasamos variablea al modelo
        $datos_carro = $this->Carros_model->get_datos_carro($codigo);
        //imprimimos en formato json el resultado
        if($datos_carro) {
            echo json_encode($datos_carro->row());
        }
    }
    public function respuestas_carro_json()
    {
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $codigo  = $_GET['codigo'];
        //pasamos variablea al modelo
        $datos_carro = $this->Carros_model->get_datos_registro_disponibilidad($codigo);
        //imprimimos en formato json el resultado
        if($datos_carro) {
            echo json_encode($datos_carro->result());
        }
    }
	public function solicitar_informacion()
	{

	}
	public function guardar_disponibilidad(){
        header("Access-Control-Allow-Origin: *");


        $post_data = array(
            'id_carro' => $this->input->post('id_carro'),
            'asesor_id' => $this->input->post('asesor_id'),
            'respuesta' => $this->input->post('respuesta'),
        );
        //pasamos post al modelo
        $datos_carro = $this->Carros_model->guardar_registro_disponibilidad($post_data);
        echo $datos_carro;
    }
    public function pagar_feria(){

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
        $data['carro_id'] = $this->uri->segment(3);

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



            $data['precio_feria'] = $precio_feria;
            $total_a_pagar = $total_a_pagar + $precio_feria->parametro_valor;


        //$total_a_pagar = $total_a_pagar + $data['precio_anuncio']->parametro_valor;
        $data['total_a_pagar'] = $total_a_pagar;

        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);

        echo $this->templates->render('public/pago_feria', $data);

    }
    public function pagar_feria_activos(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'cliente/login');
        }
        $data = cargar_componentes_buscador();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $user_id = $this->ion_auth->get_user_id();
        $data['datos_usuario'] = $this->Cliente_model->get_cliente_data($user_id);
        $this->Cliente_model->get_cliente_data($user_id);
        $data['carros_pendientes'] = $this->Cliente_model->get_carros_asignados_cliente($user_id);
        if ($this->Cliente_model->get_carros_cliente($user_id)) {

            $data['carros'] = $this->Cliente_model->get_carros_cliente_activos($user_id);
        } else {
            $data['carros'] = false;
        }
        //$data['carros']=

        echo $this->templates->render('public/pagar_activos_feria', $data);
    }
    function procesar_pago_feria_activos(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect(base_url() . 'cliente/login');
        }
        $user_id = $this->ion_auth->get_user_id();
        $carros = $this->Cliente_model->get_carros_cliente_activos($user_id);
	    //print_contenido($_POST);
	    //print_contenido($carros);
        $carro_pagar_feria = array();

        print_contenido($this->session->userdata());
        print_contenido($_SESSION);

        foreach ($carros->result() as $carro) {
           // print_contenido($carro);
            $radio = $this->input->post('r_'.$carro->id_carro);
            $id_carro = $carro->id_carro;

            if($id_carro == $radio){

                $datos_carro = array(
                    $id_carro,
                    $this->input->post('precio_feria_'.$carro->id_carro)
                );
                $_SESSION['carro_'.$id_carro] = $datos_carro;
                print_contenido($datos_carro);
                $this->session->set_userdata($datos_carro);
                echo 'si se selecciono';

                echo $id_carro;
                echo 'precio de carro '. $this->input->post('precio_feria_'.$carro->id_carro);
            }


        }
        //$this->session->set_userdata($carro_pagar_feria);

    }
    public function verificar_codigo_carro(){
        header("Access-Control-Allow-Origin: *");
        //OBTENEMOS VARIABLES DE LA URL
        $carro_id  = $_GET['carro_id'];
        //pasamos variablea al modelo
        $carro = $this->Carros_model->get_datos_carro($carro_id);
        //imprimimos en formato json el resultado
        if($carro) {
            echo 'true';
        }else{
            echo 'false';
        }
    }



}