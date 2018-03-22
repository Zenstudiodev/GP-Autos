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
		$this->load->model('Carros_model');
		$this->load->model('Banners_model');
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
		}
		$data['header_banners'] = $this->Banners_model->header_banners_activos();
		echo $this->templates->render('public/public_carro', $data);

	}
	public function por_codigo()
	{

		if ($this->input->post('input_codigo'))
		{
			$codigo_carro = $this->input->post('input_codigo');
			redirect(base_url() . 'index.php/Carro/ver/'.$codigo_carro);

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

		//Ubicacion
		$data['s_ubicacion'] = $this->uri->segment(3);
		$data['s_ubicacion'] =strtoupper($data['s_ubicacion']);
		//tipo
		$data['s_tipo'] = $this->uri->segment(4);
		$data['s_tipo'] =strtoupper($data['s_tipo']);
		//marca
		$data['s_marca'] = $this->uri->segment(5);
		$data['s_marca'] =strtoupper($data['s_marca']);
		//linea
		$data['s_linea'] = $this->uri->segment(6);
		if($data['s_linea'] == 'null'){
			$data['s_linea']= 'TODOS';
		}
		$data['s_linea'] =strtoupper($data['s_linea']);
		//transmision
		$data['s_transmision'] = $this->uri->segment(7);
		if($data['s_transmision'] == 'null'){
			$data['s_transmision']= 'TODOS';
		}
		$data['s_transmision'] =strtoupper($data['s_transmision']);
		//combustible
		$data['s_combustible'] = $this->uri->segment(8);
		if($data['s_combustible'] == 'null'){
			$data['s_combustible']= 'TODOS';
		}
		$data['s_combustible'] =strtoupper($data['s_combustible']);
		//origen
		$data['s_origen'] = $this->uri->segment(9);
		$data['s_origen'] =strtoupper($data['s_origen']);
		//precio
		$data['s_precio'] = $this->uri->segment(10);
		//modelo
		$data['s_modelo'] = $this->uri->segment(11);


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


		$data['tipos']        = $this->Carros_model->tipos_vehiculo();
		$data['marca']        = $this->Carros_model->marcas_vehiculo($data['s_tipo']);
		$data['linea'] =  $this->Carros_model->lineas_vehiculo($data['s_tipo'], $data['s_marca']);

		$data['combustibles'] = $this->Carros_model->combustible_vehiculo();
		$data['ubicaciones']  = $this->Carros_model->ubicaciones_vehiculo();
		$data['transmisiones']  = $this->Carros_model->get_transmision();


		$ubicacion = $data['s_ubicacion'];
		$tipo_vehiculo        = $data['s_tipo'];
		$marca                = $data['s_marca'];
		$linea                = $data['s_linea'];
		$transmision          = $data['s_transmision'];
		$combustible          = $data['s_combustible'];
		$origen               = $data['s_origen'];
		$p_min                = $precio[0];
		$p_max                = $precio[1];
		$a_min                = $modelo[0];
		$a_max                = $modelo[1];

		//
		$data['numero_resultados'] = $this->Carros_model->numero_registros_busqueda_paginacion($ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $p_min, $p_max, $a_min, $a_max);


		//pagination
		$config = array();
		$config["base_url"] = base_url() . "index.php/carro/filtro/".$data['s_ubicacion'].'/'.$data['s_tipo'].'/'.$data['s_marca'].'/'.$data['s_linea'].'/'.$data['s_transmision'].'/'.$data['s_combustible'].'/'.$data['s_origen'].'/'.$data['s_precio'].'/'.$data['s_modelo'];
		$config["total_rows"] = $data['numero_resultados'];
		$config["per_page"] = 20;
		$config["uri_segment"] =12;
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
		$page = ($this->uri->segment(11)) ? $this->uri->segment(12) : 0;
		$data["links"] = $this->pagination->create_links();

		$data['carros'] = $this->Carros_model->resultado_busqueda_paginacion($ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $p_min, $p_max, $a_min, $a_max, $config["per_page"], $page);
		$data['banners'] = $this->Banners_model->banneers_activos();
		$data['header_banners'] = $this->Banners_model->header_banners_activos();


		echo $this->templates->render('public/filtro_carro', $data);
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
		echo json_encode($lineas->result_array());
	}
	public function marcas(){
        header("Access-Control-Allow-Origin: *");
		//OBTENEMOS VARIABLES DE LA URL
		$tipo  = $_GET['tipo'];
		//pasamos variablea al modelo
		$marcas = $this->Carros_model->marcas_vehiculo($tipo);
		//imprimimos en formato json el resultado
		echo json_encode($marcas->result_array());
	}
	public function solicitar_informacion()
	{

	}



}