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
	}

	public function index()
	{
		$data           = compobarSesion();
		echo $data['rol'];



		$data['carros'] = $this->Carros_model->ListarCarros_admin();
		if ($this->session->flashdata('mensaje'))
		{
			$data['mensaje'] = $this->session->flashdata('mensaje');
		}



		echo $this->templates->render('admin/admin_home', $data);
	}
	public function carros_de_baja(){
		$data           = compobarSesion();
		$data['carros'] = $this->Carros_model->ListarCarros_baja_admin();
		if ($this->session->flashdata('mensaje'))
		{
			$data['mensaje'] = $this->session->flashdata('mensaje');
		}
		echo $this->templates->render('admin/carro_baja', $data);
	}

	public function editarCarro()
	{
		$data           = compobarSesion();
		$data['titulo'] = 'editar carro';
		//id carro
		$data['id_carro'] = $this->uri->segment(3);

		if ($this->session->flashdata('mensaje'))
		{
			$data['mensaje'] = $this->session->flashdata('mensaje');
		}

		$data['tipos']        = $this->Carros_model->tipos_vehiculo();
		$data['marca']        = $this->Carros_model->marca_vehiculo();
		$data['combustibles'] = $this->Carros_model->combustible_vehiculo();
		$data['tapiceria']    = $this->Carros_model->get_tapicerias();
		$data['transmision']  = $this->Carros_model->get_transmision();
		$data['carro']        = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

		$carro_r = $data['carro']->row();

		$data['linea'] = $this->Carros_model->lineas_vehiculo($carro_r->id_tipo_carro, $carro_r->id_marca);

		echo $this->templates->render('admin/admin_editarCarro', $data);

	}

	public function actualizar_carro()
	{
		/*echo '<pre>';
		print_r($_POST);
		echo '</pre>';*/
		$datos = array(
			'id_carro'                 => $this->input->post('carro_id'),
			'crr_codigo'               => $this->input->post('codigo'),
			'crr_fecha'                => $this->input->post('fecha'),
			'crr_placa'                => $this->input->post('placa'),
			'id_tipo_carro'            => $this->input->post('tipo_carro'),
			'id_marca'                 => $this->input->post('marca_carro'),
			'id_linea'                 => $this->input->post('linea_carro'),
			'id_ubicacion'             => $this->input->post('ubicacion_carro'),
			'crr_moneda_precio'        => $this->input->post('moneda_carro'),
			'crr_precio'               => $this->input->post('precio'),
			//'crr_descripcion'          => $this->input->post('avaluo_comercial'),
			//'crr_img'                  => $this->input->post('avaluo_comercial'),
			//'crr_img_ext'              => $this->input->post('avaluo_comercial'),
			//'crr_img_path'             => $this->input->post('avaluo_comercial'),
			'crr_modelo'               => $this->input->post('modelo'),
			'crr_origen'               => $this->input->post('origen_carro'),
			'crr_ac'                   => $this->input->post('ac'),
			'crr_alarma'               => $this->input->post('alarma'),
			'crr_aros_magnecio'        => $this->input->post('aros_m'),
			'crr_bolsas_aire'          => $this->input->post('bolsa_aire'),
			'crr_cerradura_central'    => $this->input->post('cerradura_c'),
			'crr_cilindros'            => $this->input->post('cilindros'),
			'crr_color'                => $this->input->post('color'),
			'crr_combustible'          => $this->input->post('combustible_carro'),
			'crr_espejos'              => $this->input->post('espejos_e'),
			'crr_kilometraje'          => $this->input->post('kilometraje'),
			'crr_motor'                => $this->input->post('motor'),
			'crr_platos'               => $this->input->post('platos'),
			'crr_polarizado'           => $this->input->post('polarizado'),
			'crr_puertas'              => $this->input->post('puertas_carro'),
			'crr_radio'                => $this->input->post('radio'),
			'crr_sunroof'              => $this->input->post('sun_roof'),
			'crr_tapiceria'            => $this->input->post('tapiceria_carro'),
			'crr_timon_hidraulico'     => $this->input->post('timon_h'),
			'crr_transmision'          => $this->input->post('transmision_carro'),
			'crr_4x4'                  => $this->input->post('t4x4'),
			'crr_vidrios_electricos'   => $this->input->post('vidrios_e'),
			//'crr_suspension_delantera' => $this->input->post('avaluo_comercial'),
			//'crr_suspension_trasera'   => $this->input->post('avaluo_comercial'),
			'crr_freno_delantero'      => $this->input->post('freno_delantero'),
			'crr_freno_trasero'        => $this->input->post('freno_trasero'),
			'crr_blindaje'             => $this->input->post('blindaje'),
			//'crr_caja'                 => $this->input->post('avaluo_comercial'),
			//'crr_freno'                => $this->input->post('avaluo_comercial'),
			//'crr_suspension'           => $this->input->post('avaluo_comercial'),
			//'crr_ejes'                 => $this->input->post('avaluo_comercial'),
			'crr_otros'                => $this->input->post('otros'),
			'crr_estado'               => 'Usado',
			//'crr_contacto'             => $this->input->post('avaluo_comercial'),
			'crr_contacto_nombre'      => $this->input->post('nombre_contacto'),
			'crr_contacto_telefono'    => $this->input->post('telefono_contacto'),
			'crr_contacto_email'       => $this->input->post('email'),
			'crr_estatus'              => $this->input->post('estado_carro'),
			'id_predio_virtual'        => $this->input->post('predio_id'),
			//'crr_date'                 => $this->input->post('avaluo_comercial'),
			'crr_premium'              => $this->input->post('premium'),
			'crr_certiauto'            => $this->input->post('certiauto'),
			//'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
			//'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
			'crr_nombre_propietario'   => $this->input->post('nombre_cliente'),
			'crr_telefono_propietario' => $this->input->post('telefono_cliente'),
			'crr_vencimiento'          => $this->input->post('vencimiento'),
		);

		$this->Carros_model->actualizar_carro($datos);

		$this->session->set_flashdata('mensaje', 'Carro actualizado correctamente');
		// user hasen't submitted anything yet!
		redirect(base_url() . 'index.php/admin/editarCarro/' . $datos['id_carro'], 'refresh');


	}

	public function crearCarro()
	{
		$data           = compobarSesion();
		$data['titulo'] = 'Crear carro';
		//id carro
		//$data['id_carro'] = $this->uri->segment(3);

		if ($this->session->flashdata('mensaje'))
		{
			$data['mensaje'] = $this->session->flashdata('mensaje');
		}

		$data['tipos']        = $this->Carros_model->tipos_vehiculo();
		$data['marca']        = $this->Carros_model->marca_vehiculo();
		$data['combustibles'] = $this->Carros_model->combustible_vehiculo();
		$data['tapiceria']    = $this->Carros_model->get_tapicerias();
		$data['transmision']  = $this->Carros_model->get_transmision();
		//$data['carro']        = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

		//$carro_r = $data['carro']->row();

		//$data['linea'] = $this->Carros_model->lineas_vehiculo($carro_r->id_tipo_carro, $carro_r->id_marca);

		echo $this->templates->render('admin/admin_crearCarro', $data);

	}

	public function guardar_carro()
	{
		$data = compobarSesion();

		$datos = array(
			'id_carro'                 => $this->input->post('codigo'),
			'crr_codigo'               => $this->input->post('codigo'),
			'crr_fecha'                => $this->input->post('fecha'),
			'crr_placa'                => $this->input->post('placa'),
			'id_tipo_carro'            => $this->input->post('tipo_carro'),
			'id_marca'                 => $this->input->post('marca_carro'),
			'id_linea'                 => $this->input->post('linea_carro'),
			'id_ubicacion'             => $this->input->post('ubicacion_carro'),
			'crr_moneda_precio'        => $this->input->post('moneda_carro'),
			'crr_precio'               => $this->input->post('precio'),
			//'crr_descripcion'          => $this->input->post('avaluo_comercial'),
			'crr_img'                  => $this->input->post('codigo') . '.jpg',
			//'crr_img_ext'              => $this->input->post('avaluo_comercial'),
			//'crr_img_path'             => $this->input->post('avaluo_comercial'),
			'crr_modelo'               => $this->input->post('modelo'),
			'crr_origen'               => $this->input->post('origen_carro'),
			'crr_ac'                   => $this->input->post('ac'),
			'crr_alarma'               => $this->input->post('alarma'),
			'crr_aros_magnecio'        => $this->input->post('aros_m'),
			'crr_bolsas_aire'          => $this->input->post('bolsa_aire'),
			'crr_cerradura_central'    => $this->input->post('cerradura_c'),
			'crr_cilindros'            => $this->input->post('cilindros'),
			'crr_color'                => $this->input->post('color'),
			'crr_combustible'          => $this->input->post('combustible_carro'),
			'crr_espejos'              => $this->input->post('espejos_e'),
			'crr_kilometraje'          => $this->input->post('kilometraje'),
			'crr_motor'                => $this->input->post('motor'),
			'crr_platos'               => $this->input->post('platos'),
			'crr_polarizado'           => $this->input->post('polarizado'),
			'crr_puertas'              => $this->input->post('puertas_carro'),
			'crr_radio'                => $this->input->post('radio'),
			'crr_sunroof'              => $this->input->post('sun_roof'),
			'crr_tapiceria'            => $this->input->post('tapiceria_carro'),
			'crr_timon_hidraulico'     => $this->input->post('timon_h'),
			'crr_transmision'          => $this->input->post('transmision_carro'),
			'crr_4x4'                  => $this->input->post('t4x4'),
			'crr_vidrios_electricos'   => $this->input->post('vidrios_e'),
			//'crr_suspension_delantera' => $this->input->post('avaluo_comercial'),
			//'crr_suspension_trasera'   => $this->input->post('avaluo_comercial'),
			'crr_freno_delantero'      => $this->input->post('freno_delantero'),
			'crr_freno_trasero'        => $this->input->post('freno_trasero'),
			'crr_blindaje'             => $this->input->post('blindaje'),
			//'crr_caja'                 => $this->input->post('avaluo_comercial'),
			//'crr_freno'                => $this->input->post('avaluo_comercial'),
			//'crr_suspension'           => $this->input->post('avaluo_comercial'),
			//'crr_ejes'                 => $this->input->post('avaluo_comercial'),
			'crr_otros'                => $this->input->post('otros'),
			'crr_estado'               => 'Usado',
			//'crr_contacto'             => $this->input->post('avaluo_comercial'),
			'crr_contacto_nombre'      => $this->input->post('nombre_contacto'),
			'crr_contacto_telefono'    => $this->input->post('telefono_contacto'),
			'crr_contacto_email'       => $this->input->post('email'),
			'crr_estatus'              => $this->input->post('estado_carro'),
			'id_predio_virtual'        => $this->input->post('predio_id'),
			//'crr_date'                 => $this->input->post('avaluo_comercial'),
			'crr_premium'              => $this->input->post('premium'),
			'crr_certiauto'            => $this->input->post('certiauto'),
			//'crr_cuotaseguro'          => $this->input->post('avaluo_comercial'),
			//'crr_cuotafinanciamiento'  => $this->input->post('avaluo_comercial'),
			'crr_nombre_propietario'   => $this->input->post('nombre_cliente'),
			'crr_telefono_propietario' => $this->input->post('telefono_cliente'),
			'crr_vencimiento'          => $this->input->post('vencimiento'),
		);

		$datos_transaccion = array(
			'fecha'      => $this->input->post('fecha'),
			'id_carro'   => $this->input->post('codigo'),
			'boleta'     => $this->input->post('boleta'),
			'banco'      => $this->input->post('banco'),
			'tipo'       => $this->input->post('tipo'),
			'id_usuario' => $data['user_id'],

		);

		/*echo '<pre>';
		print_r($data);
		echo '</pre>';
		echo '<pre>';
		print_r($datos_transaccion);
		echo '</pre>';*/


		$this->Carros_model->crear_carro($datos);
		$this->Carros_model->guardar_transaccion($datos_transaccion);

		$this->session->set_flashdata('mensaje', 'Carro creado correctamente');
		redirect(base_url() . 'index.php/admin/editarCarro/' . $datos['id_carro'], 'refresh');
	}

	public function renovar_carro(){
		$data           = compobarSesion();
		$data['titulo'] = 'Renovar carro';
		//id carro
		$data['id_carro'] = $this->uri->segment(3);

		if ($this->session->flashdata('mensaje'))
		{
			$data['mensaje'] = $this->session->flashdata('mensaje');
		}

		$data['carro']        = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

		echo $this->templates->render('admin/admin_renovarCarro', $data);
	}
	public function renovar_carro_p(){
		$data   = compobarSesion();

		$datos_carro =array(
			'id_carro'=> $this->input->post('carro_id'),
			'fecha_vencimiento'=>$this->input->post('vencimiento'),
		);


		$datos_transaccion = array(
			'fecha'      => $this->input->post('fecha'),
			'id_carro'   => $this->input->post('carro_id'),
			'boleta'     => $this->input->post('boleta'),
			'banco'      => $this->input->post('banco'),
			'tipo'       => $this->input->post('tipo'),
			'id_usuario' => $data['user_id'],

		);
		$this->Carros_model->renovar_carro($datos_carro);
		$this->Carros_model->guardar_transaccion($datos_transaccion);

		$this->session->set_flashdata('mensaje', 'Carro COD:'.$datos_carro['id_carro'].' renovado correctamente correctamente');
		redirect(base_url() . 'index.php/admin/' , 'refresh');
	}

	public function  reactivar_carro(){
		$data           = compobarSesion();
		$data['titulo'] = 'Renovar carro';
		//id carro
		$data['id_carro'] = $this->uri->segment(3);

		if ($this->session->flashdata('mensaje'))
		{
			$data['mensaje'] = $this->session->flashdata('mensaje');
		}

		$data['carro']        = $this->Carros_model->get_datos_carro_admin($data['id_carro']);

		echo $this->templates->render('admin/reactivar_carro', $data);
	}
	public function  reactivar_carro_p(){
		$data   = compobarSesion();

		$datos_carro =array(
			'id_carro'=> $this->input->post('carro_id'),
			'fecha_vencimiento'=>$this->input->post('vencimiento'),
		);


		$datos_transaccion = array(
			'fecha'      => $this->input->post('fecha'),
			'id_carro'   => $this->input->post('carro_id'),
			'boleta'     => $this->input->post('boleta'),
			'banco'      => $this->input->post('banco'),
			'tipo'       => $this->input->post('tipo'),
			'id_usuario' => $data['user_id'],

		);
		$this->Carros_model->reactivar_carro($datos_carro);
		$this->Carros_model->guardar_transaccion($datos_transaccion);

		$this->session->set_flashdata('mensaje', 'Carro COD:'.$datos_carro['id_carro'].' Reactivado correctamente correctamente');
		redirect(base_url() . 'index.php/admin/' , 'refresh');
	}

	public function banners()
	{
		$data            = compobarSesion();
		$data['banners'] = $this->Banners_model->banners();
		echo $this->templates->render('admin/admin_banners', $data);
	}

	public function editar_banner()
	{
		//id banner
		$data['id_banner']   = $this->uri->segment(3);
		$data['banner_data'] = $this->Banners_model->banner_data($data['id_banner']);
		echo $this->templates->render('admin/admin_editar_banner', $data);
	}

	public function editar_banner_header()
	{
		//id banner
		$data['id_banner']   = $this->uri->segment(3);
		$data['banner_data'] = $this->Banners_model->banner_header_data($data['id_banner']);
		echo $this->templates->render('admin/admin_editar_banner_header', $data);
	}

	public function banners_header()
	{
		$data            = compobarSesion();
		$data['banners'] = $this->Banners_model->banners_header();
		echo $this->templates->render('admin/admin_banners_header', $data);
	}


	public function actualizar_banner()
	{
		//print_r($_POST);

		$data = array(
			'nombre'           => $this->input->post('nombre'),
			'dpi'              => $this->input->post('dpi'),
			'nit'              => $this->input->post('nit'),
			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
			'celular'          => $this->input->post('celular'),
			'telefono'         => $this->input->post('telefono'),
			'email'            => $this->input->post('email'),
			'direccion'        => $this->input->post('direccion'),
			'publicidad'       => $this->input->post('publicidad')
		);

		$post_data = array(
			'id'          => $this->input->post('id'),
			'titulo'      => $this->input->post('titulo'),
			'link'        => $this->input->post('link'),
			'imagen'      => $this->input->post('imagen'),
			'area'        => $this->input->post('area'),
			'vencimiento' => $this->input->post('vencimiento'),
			'estado'      => $this->input->post('estado'),
		);
		//print_r($post_data);

		$this->Banners_model->actualizar_banners($post_data);
		redirect(base_url() . 'index.php/admin/banners/');

	}

	public function dar_de_baja_btn(){
		//id carro
		$data['id_carro'] = $this->uri->segment(3);

		$this->Carros_model->dar_baja_carro_id($data['id_carro']);
		redirect(base_url() . 'index.php/admin');

	}

	public function actualizar_estados_carros()
	{
		$carros_con_vencimiento = $this->Carros_model->carros_con_fecha_de_vencimiento();

		$fecha_actual = new DateTime();
		if ($carros_con_vencimiento)
		{
			echo '<table border="1">';
			echo '<th>';
			echo '<td>Id Carro</td>';
			echo '<td>Fecha actual</td>';
			echo '<td>Fecha vencimiento</td>';
			echo '<td>Diferencia en dias</td>';
			echo '</th>';

			foreach ($carros_con_vencimiento->result() as $carro)
			{
				$fecha_vencimiento = new DateTime($carro->crr_vencimiento);
				echo '<tr>';
				echo '<td></td>';
				echo '<td>' . $carro->id_carro . '</td>';
				echo '<td>' . $fecha_actual->format('Y-m-d') . '</td>';
				echo '<td>' . $fecha_vencimiento->format('Y-m-d') . '</td>';

				if ($fecha_actual < $fecha_vencimiento)
				{
					echo '<td>Aun no se ha pasado la fecha de vencimiento</td>';
				}
				else
				{
					$interval        = $fecha_vencimiento->diff($fecha_actual);
					$diferencia_dias = intval($interval->format('%R%a'));

					/**
					 * dispay para exportar
					 */
					//echo '<td>' . $diferencia_dias . '</td>';

					//log para acciones

					if ($diferencia_dias < 3)
					{

						echo '<td>poner advertencia</td>';

					}
					else
					{
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

	public function trasancciones()
	{
		$data           = compobarSesion();
		$data['transacciones'] = $this->Carros_model->get_transacciones();
		echo $this->templates->render('admin/transacciones', $data);

	}
	public function carro_imagen(){
		$data           = compobarSesion();
		$data['carros'] = $this->Carros_model->ListarCarros_admin();
		if ($this->session->flashdata('mensaje'))
		{
			$data['mensaje'] = $this->session->flashdata('mensaje');
		}
		echo $this->templates->render('admin/carro_imagen', $data);
	}
}