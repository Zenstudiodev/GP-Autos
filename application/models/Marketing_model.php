<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 10/09/2018
 * Time: 4:25 PM
 */
class Marketing_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function guardar_numero($data)
    {
        $fecha = New DateTime();
        $datos = array(

            'bt_fecha_ingreso' => $fecha->format('Y-m-d'),
            'bt_telefono' => $data['telefono'],
            'bt_ubicacion' => $data['ubicacion_carro'],
            'bt_tipo' => $data['tipo_carro'],
            'bt_marca' => $data['marca'],
            'bt_linea' => $data['linea'],
            'bt_modelo' => $data['modelo'],
            'bt_user_id' => $data['user_id'],
        );
        $this->db->insert('bolsa_telefonos', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_numeros_ingresados_dia_user($user_id)
    {
        $fecha = New DateTime();
        $this->db->where('bt_fecha_ingreso', $fecha->format('Y-m-d'));
        $this->db->where('bt_user_id', $user_id);
        $query = $this->db->get('bolsa_telefonos');
        if ($query->num_rows() > 0) return $query->num_rows();
        else return 0;
    }

    function registros_en_bolsa_by_telefono($telefono)
    {
        $this->db->where('bt_telefono', $telefono);
        $query = $this->db->get('bolsa_telefonos');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function registros_en_bolsa_by_id($bt_id)
    {
        $this->db->where('bt_id', $bt_id);
        $query = $this->db->get('bolsa_telefonos');
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
        $this->db->or_where_in('bt_user_id_atendiendo', $user_atendiendo);
        $this->db->where('bt_estado', 'pendiente');
        $this->db->order_by('bt_fecha_ingreso', 'ASC');
        $query = $this->db->get('bolsa_telefonos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function asignar_numero_bajado($registro)
    {
        $datos = array(
            'bt_user_id_atendiendo' => $registro['bt_user_id_atendiendo'],
        );
        $this->db->where('bt_id', $registro['bt_id']);
        $query = $this->db->update('bolsa_telefonos', $datos);
    }

    function guardar_resultado_seguimiento($resultado)
    {
        $fecha = New DateTime();
        $datos = array(

            'bts_user_id' => $resultado['bts_user_id'],
            'bts_fecha_resultado' => $fecha->format('Y-m-d H:i:s'),
            'bts_bt_id' => $resultado['bts_bt_id'],
            'bts_comentario' => $resultado['bts_comentario'],

        );
        $this->db->insert('bolsa_telefonos_seguimientos', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function actualizar_registro_bolsa($registro)
    {
        $fecha = New DateTime();
        $datos = array(
            'bt_estado' => $registro['bt_estado'],
            'bt_user_id_atendiendo' => $registro['bt_user_id_atendiendo'],
            'bt_fecha_atendido' => $fecha->format('Y-m-d'),
        );
        $this->db->where('bt_id', $registro['bt_id']);
        $query = $this->db->update('bolsa_telefonos', $datos);
    }

    function guardar_seguimiento($seguimiento)
    {
        $fecha = New DateTime($seguimiento['bts_fecha_seguimiento']);
        $datos = array(

            'bts_user_id' => $seguimiento['bts_user_id'],
            'bts_fecha_seguimiento' => $fecha->format('Y-m-d H:i:s'),
            'bts_bt_id' => $seguimiento['bts_bt_id'],
            'bts_comentario' => $seguimiento['bts_comentario'],
            'bts_estado' => $seguimiento['bts_estado'],
            'bts_tipo' => $seguimiento['bts_tipo'],

        );
        $this->db->insert('bolsa_telefonos_seguimientos', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    //agenda de seguimientos
    function get_seguimientos_by_user_id($user_id)
    {
        $this->db->where('bts_user_id', $user_id);
        $this->db->where('bts_fecha_seguimiento !=', '0000-00-00 00:00:00');
        $query = $this->db->get('bolsa_telefonos_seguimientos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function get_datos_seguimiento_by_id($seguimiento_id)
    {
        $this->db->where('bts_id', $seguimiento_id);
        $query = $this->db->get('bolsa_telefonos_seguimientos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_seguimientos_by_bolsa_id($bts_bt_id){
        $this->db->where('bts_bt_id', $bts_bt_id);
        $query = $this->db->get('bolsa_telefonos_seguimientos');
        //$this->db->limit(1);
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function actualizar_estado_seguimiento($seguimiento)
    {
        $fecha = New DateTime();
        $datos = array(
            'bts_estado' => 'completado',
            'bts_fecha_resultado' => $fecha->format('Y-m-d H:i:s'),
        );
        $this->db->where('bts_id', $seguimiento['bts_id']);
        $query = $this->db->update('bolsa_telefonos_seguimientos', $datos);
    }

}