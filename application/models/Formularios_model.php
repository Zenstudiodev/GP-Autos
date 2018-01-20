<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 5/09/2017
 * Time: 10:20 AM
 */

class Formularios_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function guardar_formulario_carro($data)
	{
		$this->db->insert('formulario_carro', array(
			'nombre' => $data['nombre'],
			'apellido' => $data['apellido'],
			'email' => $data['email'],
			'telefono' => $data['telefono'],
			'comentario' => $data['comentario'],
			'codigo_carro' => $data['codigo_carro'],
			'fecha' => $data['fecha']
		));
	}
	public function guardar_formulario_credito($data)
	{
		$this->db->insert('formulario_credito', array(
			'nombre' => $data['nombre'],
			'apellido' => $data['apellido'],
			'email' => $data['email'],
			'telefono' => $data['telefono'],
			'valor_vehiculo' => $data['precio_carro'],
			'enganche' => $data['enganche'],
			'plazo' => $data['plazo'],
			'cuota' => $data['cuota'],
			'codigo_carro' => $data['codigo_carro'],
			'fecha' => $data['fecha']
		));
	}
	public function guardar_formulario_seguro($data)
	{
		$this->db->insert('formulario_seguro', array(
			'nombre' => $data['nombre'],
			'email' => $data['email'],
			'fecha_nacimiento' => $data['fecha_nacimiento'],
			'telefono' => $data['telefono'],
			'genero' => $data['genero'],
			'tipo_vehiculo' => $data['tipo_vehiculo'],
			'marca' => $data['marca'],
			'linea' => $data['linea'],
			'modelo' => $data['modelo'],
			'valor' => $data['valor'],
			'covertura_menores' => $data['covertura_menores'],
			'aseguradora' => $data['aseguradora'],
			'fecha' => $data['fecha']
		));
	}
}