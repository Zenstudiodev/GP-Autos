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

	function predios_admin(){
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
            'prv_nombre'=> $predio['nombre'],
            'prv_direccion'=> $predio['diercción'],
            'prv_telefono'=> $predio['telefono'],
            'prv_descripcion'=> $predio['descripcion'],
            'prv_img'=> $predio['imagen'],
            'prv_estatus'=> $predio['estado'],
            'prv_fecha'=> $fecha->format('Y-m-d'),
            'carros_activos'=> $predio['carros_activos'],
            'carros_permitidos'=> $predio['carros_permitidos']
        );
        $this->db->insert('predio_virtual', $datos);
    }
    function actualizar_predio($predio){
        $datos = array(
            'prv_nombre'=> $predio['nombre'],
            'prv_direccion'=> $predio['diercción'],
            'prv_telefono'=> $predio['telefono'],
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


}