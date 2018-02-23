<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 3:55 PM
 */
class Home extends Base_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
	    $this->load->model('Banners_model');
        $this->load->helper('text');
        $this->load->library("pagination");
    }
    public function index(){
        header("Cache-Control: no-cache, must-revalidate");
        $data['carros'] = $this->Carros_model->get_carros_frontPage();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
	    $data['transmisiones']  = $this->Carros_model->get_transmision();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['ubicaciones'] = $this->Carros_model->ubicaciones_vehiculo();
	    $data['header_banners'] = $this->Banners_model->header_banners_activos();


        echo $this->templates->render('public/public_home',$data);

    }
	public function test(){
		header("Cache-Control: no-cache, must-revalidate");
        //Ubicacion

        //linea
        $data['s_ubicacion'] = $this->uri->segment(3);
        if($data['s_ubicacion'] == 'null'){
            $data['s_ubicacion']= 'TODOS';
        }

        //tipo
        $data['s_tipo'] = $this->uri->segment(4);
        if($data['s_tipo'] == 'null'){
            $data['s_tipo']= 'TODOS';
        }
        //marca
        $data['s_marca'] = $this->uri->segment(5);
        if($data['s_marca'] == 'null'){
            $data['s_marca']= 'TODOS';
        }

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
        if($data['s_origen'] == 'null'){
            $data['s_origen']= 'TODOS';
        }
        $data['s_origen'] =strtoupper($data['s_origen']);
        //precio
        $data['s_precio'] = $this->uri->segment(10);
        if($data['s_precio'] == 'null'){
            $data['s_precio']= '0-300000';
        }
        //modelo
        $data['s_modelo'] = $this->uri->segment(11);
        if($data['s_modelo'] == 'null'){
            $data['s_modelo']= '1952-2018';
        }




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


        //$data['carros'] = $this->Carros_model->resultado_busqueda_paginacion($ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $p_min, $p_max, $a_min, $a_max, '20', '1');
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();

		echo $this->templates->render('public/test',$data);

	}

}