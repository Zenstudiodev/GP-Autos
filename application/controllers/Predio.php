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
		$this->load->model('Carros_model');
		$this->load->model('Banners_model');
		$this->load->model('Predio_model');
		$this->load->helper('carros');
		$this->load->library("pagination");
	}

	function index()
	{

		$data['carros']       = $this->Carros_model->get_carros_frontPage();
		$data['tipos']        = $this->Carros_model->tipos_vehiculo();
		$data['marca']        = $this->Carros_model->marca_vehiculo();
		$data['combustibles'] = $this->Carros_model->combustible_vehiculo();
		$data['ubicaciones']  = $this->Carros_model->ubicaciones_vehiculo();
		echo $this->templates->render('public/public_home', $data);

	}

	function ver()
	{
        $data = cargar_componentes_buscador();
		//obtenemos el id del carro desde el segmento de url
		$data['segmento'] = $this->uri->segment(3);
		if (!$data['segmento'])
		{
			//TODO  redirigir a vista de listao de carros
			//redirect('prospectos/prospectosList', 'refresh');
		}


		//numero de resultados
		$data['numero_resultados'] = $this->Carros_model->get_predio_number_result($data['segmento']);


		//pagination
		$config = array();
		$config["base_url"] = base_url() . "index.php/predio/ver/".$data['segmento'];
		$config["total_rows"] = $data['numero_resultados'];
		$config["per_page"] = 20;
		$config["uri_segment"] =4;
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



		$data['carros']       = $this->Carros_model->get_carros_for_predio($data['segmento'],$config["per_page"], $page);
		$data['predio']       = $this->Predio_model->get_predio_data($data['segmento']);
		$data['header_banners'] = $this->Banners_model->header_banners_activos();
		echo $this->templates->render('public/public_predio', $data);
	}

	function predios_amin(){

    }

}