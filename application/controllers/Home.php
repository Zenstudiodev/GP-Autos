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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Carros_model');
        $this->load->model('Banners_model');
        $this->load->helper('text');
        $this->load->library("pagination");
    }

    public function index()
    {
        header("Cache-Control: no-cache, must-revalidate");
        $data['carros'] = $this->Carros_model->get_carros_frontPage();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['marca'] = $this->Carros_model->marca_vehiculo();
        $data['transmisiones'] = $this->Carros_model->get_transmision();
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['ubicaciones'] = $this->Carros_model->ubicaciones_vehiculo();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();


        echo $this->templates->render('public/public_home', $data);

    }

    public function test()
    {
        header("Cache-Control: no-cache, must-revalidate");

        ////////

        $data['s_ubicacion'] = '';
        $data['s_tipo'] = '';
        $data['s_marca'] = '';
        $data['s_linea'] = '';
        $data['s_transmision'] = '';
        $data['s_combustible'] = '';
        $data['s_origen'] = '';
        $data['s_precio'] = '';
        $data['s_modelo'] = '';

        /*$data['datos_buscador'] = array(
            $data['predios'] => $this->Carros_model->predios(),
            $data['tipos'] => $this->Carros_model->tipos_vehiculo(),
            $data['marca'] => $this->Carros_model->tipos_vehiculo(),
            $data['linea'] => $this->Carros_model->lineas_vehiculo($data['s_tipo'], $data['s_marca']),
            $data['combustibles'] => $this->Carros_model->combustible_vehiculo(),
            $data['ubicaciones'] => $this->Carros_model->ubicaciones_vehiculo(),
            $data['transmisiones'] => $this->Carros_model->get_transmision(),
        );*/

        $data['predios'] = $this->Carros_model->predios();
        $data['tipos'] = $this->Carros_model->tipos_vehiculo();
        $data['ubicaciones'] = $this->Carros_model->ubicaciones_vehiculo();
        $data['marca'] = $this->Carros_model->marcas_vehiculo($data['s_tipo']);
        $data['linea'] = $this->Carros_model->lineas_vehiculo($data['s_tipo'], $data['s_marca']);
        $data['combustibles'] = $this->Carros_model->combustible_vehiculo();
        $data['transmisiones'] = $this->Carros_model->get_transmision();


        $ubicacion = $data['s_ubicacion'];
        $tipo_vehiculo = $data['s_tipo'];
        $marca = $data['s_marca'];
        $linea = $data['s_linea'];
        $transmision = $data['s_transmision'];
        $combustible = $data['s_combustible'];


        $data['carros'] = $this->Carros_model->get_carros_frontPage();
        $data['banners'] = $this->Banners_model->banneers_activos();
        $data['header_banners'] = $this->Banners_model->header_banners_activos();

        echo $this->templates->render('public/test', $data);

    }

    public function test_filtro()
    {

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
        $config["base_url"] = base_url() . "index.php/home/test_filtro/" . $data['s_predio'] . '/' . $data['s_ubicacion'] . '/' . $data['s_tipo'] . '/' . $data['s_marca'] . '/' . $data['s_linea'] . '/' . $data['s_transmision'] . '/' . $data['s_combustible'] . '/' . $data['s_origen'] . '/' . $data['s_moneda'] . '/' . $data['s_precio'] . '/' . $data['s_modelo'];
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
        echo $this->templates->render('public/public_test_filtro', $data);
    }


}