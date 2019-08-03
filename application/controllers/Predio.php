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
		$config["base_url"] = base_url() . "predio/ver/".$data['segmento'];
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


        $data['predio']       = $this->Predio_model->get_predio_data($data['segmento']);
        $predio = $data['predio']->row();
        if($predio->prv_estatus == 'Alta'){
            $data['carros']       = $this->Carros_model->get_carros_for_predio($data['segmento'],$config["per_page"], $page);
        }else{
            $data['predio'] = false;
            $data['carros'] = false;
        }



		$data['header_banners'] = $this->Banners_model->header_banners_activos();
		echo $this->templates->render('public/public_predio', $data);
	}

	function predios_amin(){

    }
    function listado_predio(){
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
        $data['predios_activos'] = $this->Predio_model->predios_activos();
        echo $this->templates->render('public/lista_predios', $data);

    }
    function afiliarse(){
        $data = cargar_componentes_buscador();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();
        $data['predios_activos'] = $this->Predio_model->predios_activos();
        if ($this->session->flashdata('mensaje')) {
            $data['mensaje'] = $this->session->flashdata('mensaje');
        }
        echo $this->templates->render('public/registro_predio', $data);
    }
    function guardar_afiliacion(){
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
        if($exsiste){
            //flag
            $this->session->set_flashdata('mensaje', 'ya existe el nombre de usuario');
           redirect(base_url().'predio/afiliarse');
        }else{
            //crear Predio
            $datos_predio = array(
                'nombre'=> $nombre_predio,
                'diercción'=> $direccion_predio,
                'telefono'=> $telefono_predio,
                'descripcion'=> $descripcion_predio,
                'imagen'=> '',
                'estado'=> 'pendiente',
                'carros_activos'=> '0',
                'carros_permitidos'=> $numero_carros_predio
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
    function subir_imagen_predio(){}
    function solicitud_recibida(){}

}