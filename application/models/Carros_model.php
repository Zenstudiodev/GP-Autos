<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:22 PM
 */
class Carros_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * ADMIN
	 */
	function actualizar_carro($data)
	{
		$datos = array(
			//'id_carro'                 => $data['id_carro'],
			'crr_codigo'               => $data['id_carro'],
			'crr_fecha'                => $data['crr_fecha'],
			'crr_placa'                => $data['crr_placa'],
			'id_tipo_carro'            => $data['id_tipo_carro'],
			'id_marca'                 => $data['id_marca'],
			'id_linea'                 => $data['id_linea'],
			'id_ubicacion'             => $data['id_ubicacion'],
			'crr_moneda_precio'        => $data['crr_moneda_precio'],
			'crr_precio'               => $data['crr_precio'],
			//'crr_descripcion'          => $data['crr_descripcion'],
			//'crr_img'                  => $data['crr_img'],
			//'crr_img_ext'              => $data['crr_img_ext'],
			//'crr_img_path'             => $data['crr_img_path'],
			'crr_modelo'               => $data['crr_modelo'],
			'crr_origen'               => $data['crr_origen'],
			'crr_ac'                   => $data['crr_ac'],
			'crr_alarma'               => $data['crr_alarma'],
			'crr_aros_magnecio'        => $data['crr_aros_magnecio'],
			'crr_bolsas_aire'          => $data['crr_bolsas_aire'],
			'crr_cerradura_central'    => $data['crr_cerradura_central'],
			'crr_cilindros'            => $data['crr_cilindros'],
			'crr_color'                => $data['crr_color'],
			'crr_combustible'          => $data['crr_combustible'],
			'crr_espejos'              => $data['crr_espejos'],
			'crr_kilometraje'          => $data['crr_kilometraje'],
			'crr_motor'                => $data['crr_motor'],
			'crr_platos'               => $data['crr_platos'],
			'crr_polarizado'           => $data['crr_polarizado'],
			'crr_puertas'              => $data['crr_puertas'],
			'crr_radio'                => $data['crr_radio'],
			'crr_sunroof'              => $data['crr_sunroof'],
			'crr_tapiceria'            => $data['crr_tapiceria'],
			'crr_timon_hidraulico'     => $data['crr_timon_hidraulico'],
			'crr_transmision'          => $data['crr_transmision'],
			'crr_4x4'                  => $data['crr_4x4'],
			'crr_vidrios_electricos'   => $data['crr_vidrios_electricos'],
			//'crr_suspension_delantera' => $data['crr_suspension_delantera'],
			//'crr_suspension_trasera'   => $data['crr_suspension_trasera'],
			'crr_freno_delantero'      => $data['crr_freno_delantero'],
			'crr_freno_trasero'        => $data['crr_freno_trasero'],
			'crr_blindaje'             => $data['crr_blindaje'],
			//'crr_caja'                 => $data['crr_caja'],
			//'crr_freno'                => $data['crr_freno'],
			//'crr_suspension'           => $data['crr_suspension'],
			//'crr_ejes'                 => $data['crr_ejes'],
			'crr_otros'                => $data['crr_otros'],
			'crr_estado'               => $data['crr_estado'],
			//'crr_contacto'             => $data['crr_contacto'],
			'crr_contacto_nombre'      => $data['crr_contacto_nombre'],
			'crr_contacto_telefono'    => $data['crr_contacto_telefono'],
			'crr_contacto_email'       => $data['crr_contacto_email'],
			'crr_estatus'              => $data['crr_estatus'],
			'id_predio_virtual'        => $data['id_predio_virtual'],
            'sello_garantia_gp'          => $data['garantia_gp'],
			//'crr_date'                 => $data['crr_date'],
			'crr_premium'              => $data['crr_premium'],
			'crr_certiauto'            => $data['crr_certiauto'],
			//'crr_cuotaseguro'          => $data['crr_cuotaseguro'],
			//'crr_cuotafinanciamiento'  => $data['crr_cuotafinanciamiento'],
			'crr_nombre_propietario'   => $data['crr_nombre_propietario'],
			'crr_telefono_propietario' => $data['crr_telefono_propietario'],
		);
		$this->db->where('id_carro', $data['id_carro']);
		$query = $this->db->update('carro', $datos);
	}
	function crear_carro($data)
	{
		$datos = array(
			//'id_carro'                 => $data['id_carro'],
			//'crr_codigo'               => $data['crr_codigo'],
			'crr_fecha'                => $data['crr_fecha'],
			'crr_placa'                => $data['crr_placa'],
			'id_tipo_carro'            => $data['id_tipo_carro'],
			'id_marca'                 => $data['id_marca'],
			'id_linea'                 => $data['id_linea'],
			'id_ubicacion'             => $data['id_ubicacion'],
			'crr_moneda_precio'        => $data['crr_moneda_precio'],
			'crr_precio'               => $data['crr_precio'],
			//'crr_descripcion'          => $data['crr_descripcion'],
			'crr_img'                  => $data['crr_img'],
			//'crr_img_ext'              => $data['crr_img_ext'],
			//'crr_img_path'             => $data['crr_img_path'],
			'crr_modelo'               => $data['crr_modelo'],
			'crr_origen'               => $data['crr_origen'],
			'crr_ac'                   => $data['crr_ac'],
			'crr_alarma'               => $data['crr_alarma'],
			'crr_aros_magnecio'        => $data['crr_aros_magnecio'],
			'crr_bolsas_aire'          => $data['crr_bolsas_aire'],
			'crr_cerradura_central'    => $data['crr_cerradura_central'],
			'crr_cilindros'            => $data['crr_cilindros'],
			'crr_color'                => $data['crr_color'],
			'crr_combustible'          => $data['crr_combustible'],
			'crr_espejos'              => $data['crr_espejos'],
			'crr_kilometraje'          => $data['crr_kilometraje'],
			'crr_motor'                => $data['crr_motor'],
			'crr_platos'               => $data['crr_platos'],
			'crr_polarizado'           => $data['crr_polarizado'],
			'crr_puertas'              => $data['crr_puertas'],
			'crr_radio'                => $data['crr_radio'],
			'crr_sunroof'              => $data['crr_sunroof'],
			'crr_tapiceria'            => $data['crr_tapiceria'],
			'crr_timon_hidraulico'     => $data['crr_timon_hidraulico'],
			'crr_transmision'          => $data['crr_transmision'],
			'crr_4x4'                  => $data['crr_4x4'],
			'crr_vidrios_electricos'   => $data['crr_vidrios_electricos'],
			//'crr_suspension_delantera' => $data['crr_suspension_delantera'],
			//'crr_suspension_trasera'   => $data['crr_suspension_trasera'],
			'crr_freno_delantero'      => $data['crr_freno_delantero'],
			'crr_freno_trasero'        => $data['crr_freno_trasero'],
			'crr_blindaje'             => $data['crr_blindaje'],
			//'crr_caja'                 => $data['crr_caja'],
			//'crr_freno'                => $data['crr_freno'],
			//'crr_suspension'           => $data['crr_suspension'],
			//'crr_ejes'                 => $data['crr_ejes'],
			'crr_otros'                => $data['crr_otros'],
			'crr_estado'               => $data['crr_estado'],
			//'crr_contacto'             => $data['crr_contacto'],
			'crr_contacto_nombre'      => $data['crr_contacto_nombre'],
			'crr_contacto_telefono'    => $data['crr_contacto_telefono'],
			'crr_contacto_email'       => $data['crr_contacto_email'],
			'crr_estatus'              => $data['crr_estatus'],
			'id_predio_virtual'        => $data['id_predio_virtual'],
			//'crr_date'                 => $data['crr_date'],
			'crr_premium'              => $data['crr_premium'],
			'crr_certiauto'            => $data['crr_certiauto'],
			//'crr_cuotaseguro'          => $data['crr_cuotaseguro'],
			//'crr_cuotafinanciamiento'  => $data['crr_cuotafinanciamiento'],
			'crr_nombre_propietario'   => $data['crr_nombre_propietario'],
			'crr_telefono_propietario' => $data['crr_telefono_propietario'],
			'crr_vencimiento'          => $data['crr_vencimiento'],
			'user_id'          => '0',
			'predio_user_id'          => $data['user_predio'],
			'sello_garantia_gp'          => $data['garantia_gp'],
		);
		$this->db->insert('carro', $datos);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
    function crear_carro_public($data)
    {
        $datos = array(
            'crr_fecha'                => $data['crr_fecha'],
            'crr_placa'                => $data['crr_placa'],
            'id_tipo_carro'            => $data['id_tipo_carro'],
            'id_marca'                 => $data['id_marca'],
            'id_linea'                 => $data['id_linea'],
            'id_ubicacion'             => $data['id_ubicacion'],
            'crr_moneda_precio'        => $data['crr_moneda_precio'],
            'crr_precio'               => $data['crr_precio'],
            //'crr_descripcion'          => $data['crr_descripcion'],
            'crr_img'                  => $data['crr_img'],
            //'crr_img_ext'              => $data['crr_img_ext'],
            //'crr_img_path'             => $data['crr_img_path'],
            'crr_modelo'               => $data['crr_modelo'],
            'crr_origen'               => $data['crr_origen'],
            'crr_ac'                   => $data['crr_ac'],
            'crr_alarma'               => $data['crr_alarma'],
            'crr_aros_magnecio'        => $data['crr_aros_magnecio'],
            'crr_bolsas_aire'          => $data['crr_bolsas_aire'],
            'crr_cerradura_central'    => $data['crr_cerradura_central'],
            'crr_cilindros'            => $data['crr_cilindros'],
            'crr_color'                => $data['crr_color'],
            'crr_combustible'          => $data['crr_combustible'],
            'crr_espejos'              => $data['crr_espejos'],
            'crr_kilometraje'          => $data['crr_kilometraje'],
            'crr_motor'                => $data['crr_motor'],
            'crr_platos'               => $data['crr_platos'],
            'crr_polarizado'           => $data['crr_polarizado'],
            'crr_puertas'              => $data['crr_puertas'],
            'crr_radio'                => $data['crr_radio'],
            'crr_sunroof'              => $data['crr_sunroof'],
            'crr_tapiceria'            => $data['crr_tapiceria'],
            'crr_timon_hidraulico'     => $data['crr_timon_hidraulico'],
            'crr_transmision'          => $data['crr_transmision'],
            'crr_4x4'                  => $data['crr_4x4'],
            'crr_vidrios_electricos'   => $data['crr_vidrios_electricos'],
            //'crr_suspension_delantera' => $data['crr_suspension_delantera'],
            //'crr_suspension_trasera'   => $data['crr_suspension_trasera'],
            'crr_freno_delantero'      => $data['crr_freno_delantero'],
            'crr_freno_trasero'        => $data['crr_freno_trasero'],
            'crr_blindaje'             => $data['crr_blindaje'],
            //'crr_caja'                 => $data['crr_caja'],
            //'crr_freno'                => $data['crr_freno'],
            //'crr_suspension'           => $data['crr_suspension'],
            //'crr_ejes'                 => $data['crr_ejes'],
            'crr_otros'                => $data['crr_otros'],
            'crr_estado'               => $data['crr_estado'],
            //'crr_contacto'             => $data['crr_contacto'],
            'crr_contacto_nombre'      => $data['crr_contacto_nombre'],
            'crr_contacto_telefono'    => $data['crr_contacto_telefono'],
            'crr_contacto_email'       => $data['crr_contacto_email'],
            'crr_estatus'              => $data['crr_estatus'],
            'id_predio_virtual'        => $data['id_predio_virtual'],
            //'crr_date'                 => $data['crr_date'],
            'crr_premium'              => $data['crr_premium'],
            'crr_certiauto'            => $data['crr_certiauto'],
            //'crr_cuotaseguro'          => $data['crr_cuotaseguro'],
            //'crr_cuotafinanciamiento'  => $data['crr_cuotafinanciamiento'],
            'crr_nombre_propietario'   => $data['crr_nombre_propietario'],
            'crr_telefono_propietario' => $data['crr_telefono_propietario'],
            'crr_vencimiento'          => $data['crr_vencimiento'],
            'user_id'          => $data['user_id'],
        );
        $this->db->insert('carro', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function actualizar_carro_public($data)
    {
        $datos = array(
            //'crr_fecha'                => $data['crr_fecha'],
            //'crr_placa'                => $data['crr_placa'],
            //'id_tipo_carro'            => $data['id_tipo_carro'],
            //'id_marca'                 => $data['id_marca'],
            //'id_linea'                 => $data['id_linea'],
            //'id_ubicacion'             => $data['id_ubicacion'],
            //'crr_moneda_precio'        => $data['crr_moneda_precio'],
            'crr_precio'               => $data['crr_precio'],
            //'crr_descripcion'          => $data['crr_descripcion'],
            //'crr_img'                  => $data['crr_img'],
            //'crr_img_ext'              => $data['crr_img_ext'],
            //'crr_img_path'             => $data['crr_img_path'],
            //'crr_modelo'               => $data['crr_modelo'],
            //'crr_origen'               => $data['crr_origen'],
            //'crr_ac'                   => $data['crr_ac'],
            //'crr_alarma'               => $data['crr_alarma'],
            //'crr_aros_magnecio'        => $data['crr_aros_magnecio'],
            //'crr_bolsas_aire'          => $data['crr_bolsas_aire'],
            //'crr_cerradura_central'    => $data['crr_cerradura_central'],
            //'crr_cilindros'            => $data['crr_cilindros'],
            //'crr_color'                => $data['crr_color'],
            //'crr_combustible'          => $data['crr_combustible'],
            //'crr_espejos'              => $data['crr_espejos'],
            //'crr_kilometraje'          => $data['crr_kilometraje'],
            //'crr_motor'                => $data['crr_motor'],
            //'crr_platos'               => $data['crr_platos'],
            //'crr_polarizado'           => $data['crr_polarizado'],
            //'crr_puertas'              => $data['crr_puertas'],
            //'crr_radio'                => $data['crr_radio'],
            //'crr_sunroof'              => $data['crr_sunroof'],
            //'crr_tapiceria'            => $data['crr_tapiceria'],
            //'crr_timon_hidraulico'     => $data['crr_timon_hidraulico'],
            //'crr_transmision'          => $data['crr_transmision'],
            //'crr_4x4'                  => $data['crr_4x4'],
            //'crr_vidrios_electricos'   => $data['crr_vidrios_electricos'],
            //'crr_suspension_delantera' => $data['crr_suspension_delantera'],
            //'crr_suspension_trasera'   => $data['crr_suspension_trasera'],
            //'crr_freno_delantero'      => $data['crr_freno_delantero'],
            //'crr_freno_trasero'        => $data['crr_freno_trasero'],
            //'crr_blindaje'             => $data['crr_blindaje'],
            //'crr_caja'                 => $data['crr_caja'],
            //'crr_freno'                => $data['crr_freno'],
            //'crr_suspension'           => $data['crr_suspension'],
            //'crr_ejes'                 => $data['crr_ejes'],
            //'crr_otros'                => $data['crr_otros'],
            //'crr_estado'               => $data['crr_estado'],
            //'crr_contacto'             => $data['crr_contacto'],
            //'crr_contacto_nombre'      => $data['crr_contacto_nombre'],
            //'crr_contacto_telefono'    => $data['crr_contacto_telefono'],
            //'crr_contacto_email'       => $data['crr_contacto_email'],
            'crr_estatus'              => $data['crr_estatus'],
            //'id_predio_virtual'        => $data['id_predio_virtual'],
            //'crr_date'                 => $data['crr_date'],
            //'crr_premium'              => $data['crr_premium'],
            //'crr_certiauto'            => $data['crr_certiauto'],
            //'crr_cuotaseguro'          => $data['crr_cuotaseguro'],
            //'crr_cuotafinanciamiento'  => $data['crr_cuotafinanciamiento'],
            //'crr_nombre_propietario'   => $data['crr_nombre_propietario'],
            //'crr_telefono_propietario' => $data['crr_telefono_propietario'],
            //'crr_vencimiento'          => $data['crr_vencimiento'],
            //'user_id'          => $data['user_id'],
        );
        $this->db->where('id_carro', $data['id_carro']);
        $query = $this->db->update('carro', $datos);
    }
    function public_pasar_a_revision_fotos($id_carro)
    {
        $datos = array(
            'crr_estatus'              => 'Fotos',
        );
        $this->db->where('id_carro', $id_carro);
        $query = $this->db->update('carro', $datos);
    }
    function public_dar_de_baja($id_carro)
    {
        $datos = array(
            'crr_estatus'              => 'Baja',
        );
        $this->db->where('id_carro', $id_carro);
        $query = $this->db->update('carro', $datos);
    }
	function ListarCarros()
	{
		$where = "crr_estatus='Alta'";
		$this->db->where($where);
		$query = $this->db->get('carro');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function ListarCarros_admin()
	{
		$this->db->where('crr_estatus', 'Alta');
		$query = $this->db->get('carro');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
    function ListarCarros_admin_baja()
    {
        $this->db->where('crr_estatus', 'Baja');
        $this->db->order_by('id_carro', 'DESC');
        $this->db->limit(10000);
        $query = $this->db->get('carro');

        if ($query->num_rows() > 0) return $query;
        else return false;
    }
	function ListarCarros_pendientes()
	{
		$this->db->where('user_id !=', '0');
		$this->db->where('crr_estatus', 'Pendiente');
		$query = $this->db->get('carro');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function ListarCarros_pendientes_predio()
	{
		$this->db->where('crr_estatus', 'Pendiente');
		$this->db->where('predio_user_id !=', '0');
		$query = $this->db->get('carro');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function ListarCarros_pendientes_pv9()
	{
		$this->db->where('crr_estatus', 'Pendiente');
		$this->db->where('id_predio_virtual', '9');
		$query = $this->db->get('carro');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
    function ListarCarros_pendientes_fotos()
    {
        $this->db->where('crr_estatus', 'Fotos');
        $query = $this->db->get('carro');

        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function numeroCarros_pendientes(){
        $this->db->where('user_id !=', '0');
        $this->db->where('crr_estatus', 'Pendiente');
        $query = $this->db->get('carro');

        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
    function numeroCarros_pendientes_predio()
    {
        $this->db->where('crr_estatus', 'Pendiente');
        $this->db->where('predio_user_id !=', '0');
        $this->db->where('id_predio_virtual !=', '9');
        $query = $this->db->get('carro');

        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
    function numeroCarros_pendientes_pv9()
    {
        $this->db->where('crr_estatus', 'Pendiente');
        $this->db->where('id_predio_virtual', '9');
        $query = $this->db->get('carro');

        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
    function numeroCarros_pendientes_fotos()
    {
        $this->db->where('crr_estatus', 'Fotos');
        $query = $this->db->get('carro');

        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
	function listarCarro_individuales_admin(){
        $this->db->where('crr_estatus', 'Alta');
        $this->db->where('id_predio_virtual', '0');
        $query = $this->db->get('carro');

        if ($query->num_rows() > 0) return $query;
        else return false;
    }
	function ListarCarros_baja_admin()
	{
		$this->db->where('crr_estatus', 'Baja');
		$this->db->order_by('crr_vencimiento', 'DESC');
		$this->db->limit(10);
		$query = $this->db->get('carro');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
    function get_tapicerias()
    {
        $this->db->distinct('crr_tapiceria');
        $this->db->select('crr_tapiceria');
        $this->db->from('carro');
        $this->db->order_by('crr_tapiceria', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_transmision()
    {
        $this->db->distinct('crr_transmision');
        $this->db->select('crr_transmision');
        $this->db->from('carro');
        $this->db->where('crr_transmision !=' , ' ');
        $this->db->where('crr_estatus', 'Alta');
        $this->db->order_by('crr_transmision', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
	function get_datos_carro_admin($codigo_carro)
	{
		$this->db->where('id_carro', $codigo_carro);
		$query = $this->db->get('carro');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function dar_baja_carro_id($carro_id)
	{
		$datos = array(
			'crr_estatus' => 'Baja'
		);
		$this->db->where('id_carro', $carro_id);
		$query = $this->db->update('carro', $datos);
	}
	function dar_alta_carro_id($carro_id)
	{
	    $hoy = New DateTime();

		$datos = array(
			'fecha_aprobacion' => $hoy->format('Y-m-d'),
			'crr_estatus' => 'Alta'
		);
		$this->db->where('id_carro', $carro_id);
		$query = $this->db->update('carro', $datos);
	}
	function renovar_carro($data){

		$datos = array(
			'crr_vencimiento'          => $data['fecha_vencimiento'],
		);
		$this->db->where('id_carro', $data['id_carro']);
		$query = $this->db->update('carro', $datos);

	}
	function reactivar_carro($data){
		$datos = array(
			'crr_vencimiento'          => $data['fecha_vencimiento'],
			'crr_estatus'          => 'Alta'
		);
		$this->db->where('id_carro', $data['id_carro']);
		$query = $this->db->update('carro', $datos);
	}
	function reactivar_carro_predio($carro_id){
	    $fecha = New DateTime();
	    $fecha->modify('+ 30 days');
		$datos = array(
			'crr_vencimiento'          => $fecha->format('Y-m-d'),
			'crr_estatus'          => 'Alta'
		);
		$this->db->where('id_carro', $carro_id);
		$query = $this->db->update('carro', $datos);
	}
	function carros_con_fecha_de_vencimiento()
	{

		$this->db->where('crr_estatus', 'Alta');
		$this->db->where('crr_vencimiento !=', '0000-00-00');
		$this->db->from('carro');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function guardar_transaccion($data)
	{
		$datos = array(
			'fecha'      => $data['fecha'],
			'id_carro'   => $data['id_carro'],
			'boleta'     => $data['boleta'],
			'banco'      => $data['banco'],
			'tipo'       => $data['tipo'],
			'id_usuario' => $data['id_usuario'],
		);
		$this->db->insert('transacciones', $datos);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}
	function get_transacciones()
	{
		$query = $this->db->get('transacciones');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
    function guardar_registro_disponibilidad($data)
    {
        $fecha = new DateTime();

        $datos = array(
            'carro_id'          => $data['id_carro'],
            'fecha'          => $fecha->format('Y-m-d'),
            'asesor_id'          => $data['asesor_id'],
            'respuesta'          => $data['respuesta'],
        );
        $this->db->insert('registro_disponibilidades', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function get_datos_registro_disponibilidad($codigo_carro)
    {
        $this->db->where('carro_id', $codigo_carro);
        $query = $this->db->get('registro_disponibilidades');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }


    /**
     * carros public
     */
	function get_carros_frontPage()
	{

		$this->db->where('crr_estatus', 'Alta');
		$this->db->where('crr_estado', 'Usado');
		$this->db->where('id_predio_virtual', 9);
		$this->db->order_by('', 'RANDOM');
		$this->db->limit(8);
		$query = $this->db->get('carro');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function get_datos_carro($codigo_carro)
	{
		$this->db->where('id_carro', $codigo_carro);
		$this->db->where('crr_estatus', 'Alta');
		$query = $this->db->get('carro');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
    function get_datos_carro_cliente($codigo_carro)
    {
        $this->db->where('id_carro', $codigo_carro);
        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function aprobar_carro(){
        $datos = array(
            'estado' => 'verificado'
        );
        $this->db->where('pago_id', '');
        $query = $this->db->update('pago_anuncio', $datos);
    }
    function registrar_visita($carro_id){
        $this->db->where('id_carro', $carro_id);
        $this->db->set('vistas', 'vistas+1', FALSE);
        $this->db->update('carro');
    }
    function registrar_whatsapp($carro_id){
        $this->db->where('id_carro', $carro_id);
        $this->db->set('whatsapp', 'whatsapp+1', FALSE);
        $this->db->update('carro');
    }

	//Feria
    function get_carros_frontPage_feria()
    {

        $this->db->where('crr_estatus', 'Alta');
        $this->db->where('crr_estado', 'Usado');
        $this->db->where('feria', '1');
        $this->db->order_by('', 'RANDOM');
        $this->db->limit(32);
        $query = $this->db->get('carro');

        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_precio_feria($carro){
        $datos = array(
            'crr_precio_descuento'=> $carro['precio_feria'],
            'feria'=> 1,
        );
        $this->db->where('id_carro', $carro['id_carro']);
        $query = $this->db->update('carro',$datos);
    }
    function numero_registros_busqueda_paginacion_feria($predio,$ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $moneda, $p_min, $p_max, $a_min, $a_max)
    {
        //$this->db->from('carro');
        $this->db->where('crr_estatus', 'Alta');
        $this->db->where('crr_estado', 'Usado');
        $this->db->where('feria', '1');

        $ubicacion     = urldecode($ubicacion);
        $tipo_vehiculo = urldecode($tipo_vehiculo);
        $marca         = urldecode($marca);
        $linea         = urldecode($linea);

        if ($predio != 'TODOS')
        {
            $this->db->where('id_predio_virtual', $predio);
        }
        if ($ubicacion != 'TODOS')
        {
            $this->db->where('id_ubicacion', $ubicacion);
        }
        $this->db->where('id_tipo_carro', $tipo_vehiculo);

        if ($marca != 'TODOS')
        {
            $this->db->where('id_marca', $marca);
        }
        if ($linea != 'TODOS')
        {
            $this->db->where('id_linea', $linea);
        }
        if ($transmision != 'TODOS')
        {
            $this->db->where('crr_transmision', $transmision);
        }
        if ($combustible != 'TODOS')
        {
            $this->db->where('crr_combustible', $combustible);
        }
        if ($origen != 'TODOS')
        {
            $this->db->where('crr_origen', $origen);
        }
        if ($moneda != 'TODOS')
        {
            if($moneda == 'D'){
                $moneda = '$';
            }
            $this->db->where('crr_moneda_precio', $moneda);
        }

        if ($p_min != null)
        {
            $this->db->where('crr_precio >', $p_min);
        }
        if ($p_max != null)
        {
            $this->db->where('crr_precio <', $p_max);
        }
        $this->db->order_by('crr_modelo', 'DESC');

        if ($a_min != null)
        {
            $this->db->where('crr_modelo  >=', $a_min);
        }
        if ($a_max != null)
        {
            $this->db->where('crr_modelo  <=', $a_max);
        }

        return $this->db->count_all_results('carro');
        /*$query = $this->db->get('carro');
        return $query->num_rows();*/
    }
    function resultado_busqueda_paginacion_feria($predio,$ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $moneda, $p_min, $p_max, $a_min, $a_max, $limit, $start)
    {
        $this->db->where('crr_estatus', 'Alta');
        $this->db->where('crr_estado', 'Usado');
        $this->db->where('feria', '1');
        $ubicacion     = urldecode($ubicacion);
        $tipo_vehiculo = urldecode($tipo_vehiculo);
        $marca         = urldecode($marca);
        $linea         = urldecode($linea);

        if ($predio != 'TODOS')
        {
            $this->db->where('id_predio_virtual', $predio);
        }
        if ($ubicacion != 'TODOS')
        {
            $this->db->where('id_ubicacion', $ubicacion);
        }
        $this->db->where('id_tipo_carro', $tipo_vehiculo);

        if ($marca != 'TODOS')
        {
            $this->db->where('id_marca', $marca);
        }
        if ($linea != 'TODOS')
        {
            $this->db->where('id_linea', $linea);
        }
        if ($transmision != 'TODOS')
        {
            $this->db->where('crr_transmision', $transmision);
        }
        if ($combustible != 'TODOS')
        {
            $this->db->where('crr_combustible', $combustible);
        }
        if ($origen != 'TODOS')
        {
            $this->db->where('crr_origen', $origen);
        }
        if ($moneda != 'TODOS')
        {
            if($moneda == 'D'){
                $moneda = '$';
            }
            $this->db->where('crr_moneda_precio', $moneda);
        }

        if ($p_min != null)
        {
            $this->db->where('crr_precio >', $p_min);
        }
        if ($p_max != null)
        {
            $this->db->where('crr_precio <', $p_max);
        }
        $this->db->order_by('crr_modelo', 'DESC');
        $this->db->order_by('crr_precio', 'ASC');

        if ($a_min != null)
        {
            $this->db->where('crr_modelo  >=', $a_min);
        }
        if ($a_max != null)
        {
            $this->db->where('crr_modelo  <=', $a_max);
        }/**/
        $this->db->limit($limit, $start);

        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //para el buscador
	function predios()
	{
		$this->db->where('prv_estatus', 'Alta');
		$query = $this->db->get('predio_virtual');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function tipos_vehiculo()
	{
		$query = $this->db->get('tipo_carro');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function marca_vehiculo()
	{
		$query = $this->db->get('marca');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function lineas_vehiculo($tipo, $marca)
	{
		$this->db->distinct('id_linea');
		$this->db->select('id_linea');
		$this->db->from('carro');
		$this->db->where('id_marca', $marca);
		$this->db->where('id_tipo_carro', $tipo);
		$this->db->where('crr_estatus', 'Alta');
		$this->db->order_by('id_linea', 'ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function marcas_vehiculo($tipo)
	{
		$this->db->distinct('id_marca');
		$this->db->select('id_marca');
		$this->db->from('carro');
		$this->db->where('id_tipo_carro', $tipo);
		$this->db->where('crr_estatus', 'Alta');
		$this->db->order_by('id_marca', 'ASC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function ubicaciones_vehiculo()
	{
		$this->db->distinct('id_ubicacion');
		$this->db->select('id_ubicacion');
		$this->db->where('crr_estatus', 'Alta');
		$this->db->from('carro');
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function combustible_vehiculo()
	{
		$query = $this->db->get('combustible');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function resultado_busqueda($tipo_vehiculo, $marca, $linea, $combustible, $origen, $p_min, $p_max, $a_min, $a_max)
	{
		$this->db->from('carro');
		$this->db->where('crr_estatus', 'Alta');
		$this->db->where('crr_estado', 'Usado');
		$this->db->where('id_tipo_carro', $tipo_vehiculo);

		if ($marca != 'todos')
		{
			$this->db->where('id_marca', $marca);
		}
		if ($linea != 'todos')
		{
			$this->db->where('id_linea', $linea);
		}
		if ($combustible != 'todos')
		{
			$this->db->where('crr_combustible', $combustible);
		}
		if ($origen != 'TODOS')
		{
			$this->db->where('crr_origen', $origen);
		}


		if ($p_min != null)
		{
			$this->db->where('crr_precio >', $p_min);
		}
		if ($p_max != null)
		{
			$this->db->where('crr_precio <', $p_max);
		}
		$this->db->order_by('crr_modelo', 'DESC');
		if ($a_min != null)
		{
			$this->db->where('crr_modelo  >=', $a_min);
		}
		if ($a_max != null)
		{
			$this->db->where('crr_modelo  <=', $a_max);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	//Main buscador
	function numero_registros_busqueda_paginacion($ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $p_min, $p_max, $a_min, $a_max)
	{
		//$this->db->from('carro');
		$this->db->where('crr_estatus', 'Alta');
		$this->db->where('crr_estado', 'Usado');

		$ubicacion     = urldecode($ubicacion);
		$tipo_vehiculo = urldecode($tipo_vehiculo);
		$marca         = urldecode($marca);
		$linea         = urldecode($linea);

		if ($ubicacion != 'TODOS')
		{
			$this->db->where('id_ubicacion', $ubicacion);
		}
		$this->db->where('id_tipo_carro', $tipo_vehiculo);

		if ($marca != 'TODOS')
		{
			$this->db->where('id_marca', $marca);
		}
		if ($linea != 'TODOS')
		{
			$this->db->where('id_linea', $linea);
		}
		if ($transmision != 'TODOS')
		{
			$this->db->where('crr_transmision', $transmision);
		}
		if ($combustible != 'TODOS')
		{
			$this->db->where('crr_combustible', $combustible);
		}
		if ($origen != 'TODOS')
		{
			$this->db->where('crr_origen', $origen);
		}

		if ($p_min != null)
		{
			$this->db->where('crr_precio >', $p_min);
		}
		if ($p_max != null)
		{
			$this->db->where('crr_precio <', $p_max);
		}
		$this->db->order_by('crr_modelo', 'DESC');

		if ($a_min != null)
		{
			$this->db->where('crr_modelo  >=', $a_min);
		}
		if ($a_max != null)
		{
			$this->db->where('crr_modelo  <=', $a_max);
		}

		return $this->db->count_all_results('carro');
		/*$query = $this->db->get('carro');
		return $query->num_rows();*/
	}
	function resultado_busqueda_paginacion($ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $p_min, $p_max, $a_min, $a_max, $limit, $start)
	{
		$this->db->where('crr_estatus', 'Alta');
		$this->db->where('crr_estado', 'Usado');
		$ubicacion     = urldecode($ubicacion);
		$tipo_vehiculo = urldecode($tipo_vehiculo);
		$marca         = urldecode($marca);
		$linea         = urldecode($linea);
		if ($ubicacion != 'TODOS')
		{
			$this->db->where('id_ubicacion', $ubicacion);
		}
		$this->db->where('id_tipo_carro', $tipo_vehiculo);

		if ($marca != 'TODOS')
		{
			$this->db->where('id_marca', $marca);
		}
		if ($linea != 'TODOS')
		{
			$this->db->where('id_linea', $linea);
		}
		if ($transmision != 'TODOS')
		{
			$this->db->where('crr_transmision', $transmision);
		}
		if ($combustible != 'TODOS')
		{
			$this->db->where('crr_combustible', $combustible);
		}
		if ($origen != 'TODOS')
		{
			$this->db->where('crr_origen', $origen);
		}

		if ($p_min != null)
		{
			$this->db->where('crr_precio >', $p_min);
		}
		if ($p_max != null)
		{
			$this->db->where('crr_precio <', $p_max);
		}
		$this->db->order_by('crr_modelo', 'DESC');
		$this->db->order_by('crr_precio', 'ASC');

		if ($a_min != null)
		{
			$this->db->where('crr_modelo  >=', $a_min);
		}
		if ($a_max != null)
		{
			$this->db->where('crr_modelo  <=', $a_max);
		}/**/
		$this->db->limit($limit, $start);

		$query = $this->db->get('carro');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
    //Main buscador test
    function numero_registros_busqueda_paginacion_test($predio,$ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $moneda, $p_min, $p_max, $a_min, $a_max)
    {
        //$this->db->from('carro');
        $this->db->where('crr_estatus', 'Alta');
        $this->db->where('crr_estado', 'Usado');

        $ubicacion     = urldecode($ubicacion);
        $tipo_vehiculo = urldecode($tipo_vehiculo);
        $marca         = urldecode($marca);
        $linea         = urldecode($linea);

        if ($predio != 'TODOS')
        {
            $this->db->where('id_predio_virtual', $predio);
        }
        if ($ubicacion != 'TODOS')
        {
            $this->db->where('id_ubicacion', $ubicacion);
        }
        $this->db->where('id_tipo_carro', $tipo_vehiculo);

        if ($marca != 'TODOS')
        {
            $this->db->where('id_marca', $marca);
        }
        if ($linea != 'TODOS')
        {
            $this->db->where('id_linea', $linea);
        }
        if ($transmision != 'TODOS')
        {
            $this->db->where('crr_transmision', $transmision);
        }
        if ($combustible != 'TODOS')
        {
            $this->db->where('crr_combustible', $combustible);
        }
        if ($origen != 'TODOS')
        {
            $this->db->where('crr_origen', $origen);
        }
        if ($moneda != 'TODOS')
        {
            if($moneda == 'D'){
                $moneda = '$';
            }
            $this->db->where('crr_moneda_precio', $moneda);
        }

        if ($p_min != null)
        {
            $this->db->where('crr_precio >', $p_min);
        }
        if ($p_max != null)
        {
            $this->db->where('crr_precio <', $p_max);
        }
        $this->db->order_by('crr_modelo', 'DESC');

        if ($a_min != null)
        {
            $this->db->where('crr_modelo  >=', $a_min);
        }
        if ($a_max != null)
        {
            $this->db->where('crr_modelo  <=', $a_max);
        }

        return $this->db->count_all_results('carro');
        /*$query = $this->db->get('carro');
        return $query->num_rows();*/
    }
    function resultado_busqueda_paginacion_test($predio,$ubicacion, $tipo_vehiculo, $marca, $linea, $transmision, $combustible, $origen, $moneda, $p_min, $p_max, $a_min, $a_max, $limit, $start)
    {
        $this->db->where('crr_estatus', 'Alta');
        $this->db->where('crr_estado', 'Usado');
        $ubicacion     = urldecode($ubicacion);
        $tipo_vehiculo = urldecode($tipo_vehiculo);
        $marca         = urldecode($marca);
        $linea         = urldecode($linea);

        if ($predio != 'TODOS')
        {
            $this->db->where('id_predio_virtual', $predio);
        }
        if ($ubicacion != 'TODOS')
        {
            $this->db->where('id_ubicacion', $ubicacion);
        }
        $this->db->where('id_tipo_carro', $tipo_vehiculo);

        if ($marca != 'TODOS')
        {
            $this->db->where('id_marca', $marca);
        }
        if ($linea != 'TODOS')
        {
            $this->db->where('id_linea', $linea);
        }
        if ($transmision != 'TODOS')
        {
            $this->db->where('crr_transmision', $transmision);
        }
        if ($combustible != 'TODOS')
        {
            $this->db->where('crr_combustible', $combustible);
        }
        if ($origen != 'TODOS')
        {
            $this->db->where('crr_origen', $origen);
        }
        if ($moneda != 'TODOS')
        {
            if($moneda == 'D'){
                $moneda = '$';
            }
            $this->db->where('crr_moneda_precio', $moneda);
        }

        if ($p_min != null)
        {
            $this->db->where('crr_precio >', $p_min);
        }
        if ($p_max != null)
        {
            $this->db->where('crr_precio <', $p_max);
        }
        $this->db->order_by('crr_modelo', 'DESC');
        $this->db->order_by('crr_precio', 'ASC');

        if ($a_min != null)
        {
            $this->db->where('crr_modelo  >=', $a_min);
        }
        if ($a_max != null)
        {
            $this->db->where('crr_modelo  <=', $a_max);
        }/**/
        $this->db->limit($limit, $start);

        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    //Predio virtual
	function get_predio_number_result($predio_id)
	{
		$this->db->where('id_predio_virtual', $predio_id);
		$this->db->where('crr_estatus', 'Alta');

		//$query = $this->db->get('carro');
		return $this->db->count_all_results('carro');
	}
	function get_carros_for_predio($predio_id, $limit, $start)
	{
		$this->db->where('id_predio_virtual', $predio_id);
		$this->db->where('crr_estatus', 'Alta');
		$this->db->order_by('crr_modelo', 'DESC');
		$this->db->order_by('crr_precio', 'ASC');

		$this->db->limit($limit, $start);
		$query = $this->db->get('carro');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function get_carros_activos_by_user_id($user_id){

        $this->db->where('predio_user_id', $user_id);
        $this->db->where('crr_estatus', 'Alta');

        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
    //predio virtual admin
    function get_carros_del_predio($predio_id){
        $this->db->where('id_predio_virtual', $predio_id);
       // $this->db->where('crr_estatus', 'Alta');
        //$query = $this->db->get('carro');
        return $this->db->count_all_results('carro');
    }
    function get_carros_activos_del_predio($predio_id){
        $this->db->where('id_predio_virtual', $predio_id);
        $this->db->where('crr_estatus', 'Alta');
        //$query = $this->db->get('carro');
        return $this->db->count_all_results('carro');
    }
    function get_carros_inactivos_del_predio($predio_id){
        $this->db->where('id_predio_virtual', $predio_id);
        $this->db->where('crr_estatus', 'Baja');
        //$query = $this->db->get('carro');
        return $this->db->count_all_results('carro');
    }

}