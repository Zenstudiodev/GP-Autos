<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 21/05/2018
 * Time: 9:19 AM
 */
class Usuarios_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_usuarios(){
        $query = $this->db->get('users_b');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_usuario_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('users_b');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_usuarios($data){
        //fecha
        $fecha = New DateTime();
        $datos_cliente = array(
            'username'=> $data['username'],
            'email'=> $data['correo'],
            'password'=> $data['clave'],
            'create_time'=> $fecha->format('Y-m-d'),
            'nombre'=> $data['nombre'],
            'rol'=> $data['rol'],
            'carros_activos'=> $data['carro_activos'],
            'carros_permitidos'=> $data['carro_premitidos'],
            'predio_id'=> $data['predio'],
        );

        $this->db->insert('users_b', $datos_cliente);
    }
    function actualizar_usuarios($data){
        $datos_cliente = array(
            'username'=> $data['username'],
            'email'=> $data['correo'],
            'password'=> $data['clave'],
            'nombre'=> $data['nombre'],
            'rol'=> $data['rol'],
            'carros_activos'=> $data['carro_activos'],
            'carros_permitidos'=> $data['carro_premitidos'],
            'predio_id'=> $data['predio'],
        );
        $this->db->where('id', $data['user_id']);
        $query = $this->db->update('users_b', $datos_cliente);

    }
}