<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 7/10/2017
 * Time: 1:18 PM
 */

class Predio_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function get_predio_data($id_predio){
		$this->db->where('id_predio_virtual', $id_predio);
		//$this->db->where('prv_estatus', 'Alta');
		$query = $this->db->get('predio_virtual');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
    function get_predio_data_admin($id_predio){
        $this->db->where('id_predio_virtual', $id_predio);
        $query = $this->db->get('predio_virtual');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    //predios activos
    function predios_activos(){
        $this->db->where('prv_estatus !=', 'Baja');
        $query = $this->db->get('predio_virtual');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

	function predios_admin(){
        $query = $this->db->get('predio_virtual');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function predios_baja(){
        $this->db->where('prv_estatus', 'baja');
        $query = $this->db->get('predio_virtual');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_predios_for_user($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('predio_user');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_carros_predios($predios){
        $this->db->where_in('id_predio_virtual', $predios);
        $this->db->where('crr_estatus', 'Alta');
        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_carros_predios_baja($predios){
        $this->db->where_in('id_predio_virtual', $predios);
        $this->db->where('crr_estatus', 'Baja');
        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_carros_predio_usuario($user_id){
        $this->db->where_in('predio_user_id', $user_id);
        $this->db->where('crr_estatus', 'Alta');
        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_carros_usuario_predio_pendientes($user_id){
        $this->db->where_in('predio_user_id', $user_id);
        $this->db->where('crr_estatus', 'Pendiente');
        $query = $this->db->get('carro');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_predio($predio){
        //fecha
        $fecha = New DateTime();

        $datos = array(
            'prv_tipo'=> $predio['tipo_predio'],
            'prv_nombre'=> $predio['nombre'],
            'prv_direccion'=> $predio['direccion'],
            'prv_telefono'=> $predio['telefono'],
            'prv_departamento'=> $predio['id_departamento'],
            'prv_municipio'=> $predio['id_municipio'],
            'prv_zona'=> $predio['zona'],
            'prv_manta'=> $predio['manta'],
            'prv_material_pop'=> $predio['material_pop'],
            'prv_ruta'=> $predio['ruta'],
            'prv_descripcion'=> $predio['descripcion'],
            'prv_img'=> $predio['imagen'],
            'prv_estatus'=> $predio['estado'],
            'prv_fecha'=> $fecha->format('Y-m-d'),
            'carros_activos'=> $predio['carros_activos'],
            'carros_permitidos'=> $predio['carros_permitidos']
        );
        $this->db->insert('predio_virtual', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function actualizar_predio($predio){
        $datos = array(
            'prv_tipo'=> $predio['tipo_predio'],
            'prv_nombre'=> $predio['nombre'],
            'prv_direccion'=> $predio['direccion'],
            'prv_telefono'=> $predio['telefono'],
            'prv_departamento'=> $predio['id_departamento'],
            'prv_municipio'=> $predio['id_municipio'],
            'prv_zona'=> $predio['zona'],
            'prv_manta'=> $predio['manta'],
            'prv_material_pop'=> $predio['material_pop'],
            'prv_ruta'=> $predio['ruta'],
            'prv_descripcion'=> $predio['descripcion'],
            'prv_img'=> $predio['imagen'],
            'prv_estatus'=> $predio['estado'],
            'carros_activos'=> $predio['carros_activos'],
            'carros_permitidos'=> $predio['carros_permitidos']
        );


        $this->db->where('id_predio_virtual', $predio['id']);
        $query = $this->db->update('predio_virtual',$datos);

    }
    function predios_asignados($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('predio_user');
        if ($query->num_rows() > 0) return $query;
        else return false;


    }

    function get_users_predio($predio_id){
        $this->db->where('predio_id', $predio_id);
        $query = $this->db->get('users_b');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function guardar_numero($data)
    {
        $fecha = New DateTime();
        $datos = array(

            'bt_fecha_ingreso' => $fecha->format('Y-m-d'),
            'bt_telefono' => $data['telefono'],
            'bt_ubicacion' => $data['ubicacion_carro'],
            'bt_tipo' => $data['tipo_carro'],
            'bt_user_id' => $data['user_id'],
        );
        $this->db->insert('bolsa_predios', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function get_numeros_ingresados_dia_user($user_id)
    {
        $fecha = New DateTime();
        $this->db->where('bp_fecha_ingreso', $fecha->format('Y-m-d'));
        $this->db->where('bp_user_id', $user_id);
        $query = $this->db->get('bolsa_predios');
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }
    function registros_en_bolsa_by_telefono($telefono)
    {
        $this->db->where('bp_telefono', $telefono);
        $query = $this->db->get('bolsa_predios');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function registros_en_bolsa_by_id($bp_id)
    {
        $this->db->where('bp_id', $bp_id);
        $query = $this->db->get('bolsa_predios');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_carros_publicados_en_el_mes()
    {
        $fecha = New DateTime();
        $mes = $fecha->format('m');
        $year = $fecha->format('Y');

        $inicio_mes= $year.'-'.$mes.'-'.'01';
        $fin_mes= $year.'-'.$mes.'-'. days_in_month($mes, $year);

        $predios = array('0', '9');
        $this->db->or_where_in('id_predio_virtual', $predios);
        $this->db->where('fecha_aprobacion >=', $inicio_mes);
        $this->db->where('fecha_aprobacion <=', $fin_mes);
        $this->db->order_by('fecha_aprobacion', 'ASC');
        $query = $this->db->get('carro');
        $this->db->limit(100);
        if ($query->num_rows() > 0) return $query;
        else return false;

    }
    function get_carros_pv9_publicados_en_el_mes()
    {
        $fecha = New DateTime();
        $mes = $fecha->format('m');
        $year = $fecha->format('Y');

        $inicio_mes= $year.'-'.$mes.'-'.'01';
        $fin_mes= $year.'-'.$mes.'-'. days_in_month($mes, $year);

        $predios = array('9');
        $this->db->or_where_in('id_predio_virtual', $predios);
        $this->db->where('fecha_aprobacion >=', $inicio_mes);
        $this->db->where('fecha_aprobacion <=', $fin_mes);
        $this->db->order_by('fecha_aprobacion', 'ASC');
        $query = $this->db->get('carro');
        $this->db->limit(100);
        if ($query->num_rows() > 0) return $query;
        else return false;

    }
    function get_carros_individuales_publicados_en_el_mes()
    {
        $fecha = New DateTime();
        $mes = $fecha->format('m');
        $year = $fecha->format('Y');

        $inicio_mes= $year.'-'.$mes.'-'.'01';
        $fin_mes= $year.'-'.$mes.'-'. days_in_month($mes, $year);

        $predios = array('0');
        $this->db->or_where_in('id_predio_virtual', $predios);
        $this->db->where('fecha_aprobacion >=', $inicio_mes);
        $this->db->where('fecha_aprobacion <=', $fin_mes);
        $this->db->order_by('fecha_aprobacion', 'ASC');
        $query = $this->db->get('carro');
        $this->db->limit(100);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    //bajar numeros
    function bajar_numero_bosla($user_id)
    {
        $user_atendiendo = array('0', $user_id);
        $this->db->or_where_in('bp_user_id_atendiendo', $user_atendiendo);
        $this->db->where('bp_estado', 'pendiente');
        $this->db->order_by('bp_fecha_ingreso', 'ASC');
        $query = $this->db->get('bolsa_predios');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function asignar_numero_bajado($registro)
    {
        $datos = array(
            'bp_user_id_atendiendo' => $registro['bp_user_id_atendiendo'],
        );
        $this->db->where('bp_id', $registro['bp_id']);
        $query = $this->db->update('bolsa_predios', $datos);
    }
    function guardar_resultado_seguimiento($resultado)
    {
        $fecha = New DateTime();
        $datos = array(

            'bps_user_id' => $resultado['bps_user_id'],
            'bps_fecha_resultado' => $fecha->format('Y-m-d H:i:s'),
            'bps_bp_id' => $resultado['bps_bp_id'],
            'bps_comentario' => $resultado['bps_comentario'],

        );
        $this->db->insert('bolsa_predios_seguimientos', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function actualizar_registro_bolsa($registro)
    {
        $fecha = New DateTime();
        $datos = array(
            'bp_estado' => $registro['bp_estado'],
            'bp_user_id_atendiendo' => $registro['bp_user_id_atendiendo'],
            'bp_fecha_atendido' => $fecha->format('Y-m-d'),
        );
        $this->db->where('bp_id', $registro['bp_id']);
        $query = $this->db->update('bolsa_predios', $datos);
    }
    function guardar_seguimiento($seguimiento)
    {
        $fecha = New DateTime($seguimiento['bps_fecha_seguimiento']);
        $datos = array(

            'bps_user_id' => $seguimiento['bps_user_id'],
            'bps_fecha_seguimiento' => $fecha->format('Y-m-d H:i:s'),
            'bps_bp_id' => $seguimiento['bps_bp_id'],
            'bps_comentario' => $seguimiento['bps_comentario'],
            'bps_estado' => $seguimiento['bps_estado'],
            'bps_tipo' => $seguimiento['bps_tipo'],

        );
        $this->db->insert('bolsa_predios_seguimientos', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    //agenda de seguimientos
    function get_seguimientos_by_user_id($user_id)
    {

        $this->db->where('bps_user_id', $user_id);
        $this->db->where('bps_fecha_seguimiento !=', '0000-00-00 00:00:00');
        $query = $this->db->get('bolsa_predios_seguimientos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_datos_seguimiento_by_id($seguimiento_id)
    {
        $this->db->where('bps_id', $seguimiento_id);
        $query = $this->db->get('bolsa_predios_seguimientos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_seguimientos_by_bolsa_id($bps_bp_id){
        $this->db->where('bps_bp_id', $bps_bp_id);
        $query = $this->db->get('bolsa_predios_seguimientos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function actualizar_estado_seguimiento($seguimiento)
    {
        $fecha = New DateTime();
        $datos = array(
            'bps_estado' => 'completado',
            'bps_fecha_resultado' => $fecha->format('Y-m-d H:i:s'),
        );
        $this->db->where('bps_id', $seguimiento['bps_id']);
        $query = $this->db->update('bolsa_predios_seguimientos', $datos);
    }

    //registro de predios
    function usuarios_marketing($usuarios){
        //usuarios de marketing
        $this->db->or_where_in('id', $usuarios);
        $query = $this->db->get('users_b');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function numeros_agregados($user_id, $de, $a){
        $this->db->where('bp_user_id', $user_id);
        $this->db->where('bp_fecha_ingreso  >=', $de);
        $this->db->where('bp_fecha_ingreso  <=', $a);
        $query = $this->db->get('bolsa_predios');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function numeros_agregados_dia($user_id, $fecha){
        $this->db->where('bp_user_id', $user_id);
        $this->db->where('bp_fecha_ingreso', $fecha);
        $query = $this->db->get('bolsa_predios');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function numeros_bajados($user_id, $de, $a){
        $this->db->where('bp_user_id_atendiendo', $user_id);
        $this->db->where('bp_fecha_atendido  >=', $de);
        $this->db->where('bp_fecha_atendido  <=', $a);
        $query = $this->db->get('bolsa_predios');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function numeros_bajados_dia($user_id, $fecha){
        $this->db->where('bp_user_id_atendiendo', $user_id);
        $this->db->where('bp_fecha_atendido', $fecha);
        $query = $this->db->get('bolsa_predios');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function numeros_seguimientos($user_id, $de, $a){
        $this->db->where('bps_user_id', $user_id);
        $this->db->where('bps_fecha_resultado  >=', $de);
        $this->db->where('bps_fecha_resultado  <=', $a);
        $query = $this->db->get('bolsa_predios_seguimientos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function numeros_seguimientos_dia($user_id, $fecha){
        $this->db->where('bps_user_id', $user_id);
        $this->db->where('bps_fecha_resultado', $fecha);
        $query = $this->db->get('bolsa_predios_seguimientos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }


}