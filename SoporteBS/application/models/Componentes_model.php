<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Componentes_model extends CI_Model {

	var $table = 'componentes'; 
 
 
	public function __construct()
	{ 
		parent::__construct();
		$this->load->database();
	}
	public function updateCompo($id,$data){
		$this->db->where("serial_compo",$id);
		return $this->db->update("partes_componentes",$data);
	}
	public function get_all_componentes()
	{
		$this->db->select("*");
		$this->db->from("componentes");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function get_componente($id)
	{
$this->db->select("c.*,pc.*,m.*,cm.*");
$this->db->from("componentes-equipo c");
$this->db->join("partes_componentes pc","pc.serial_compo = c.serial_componente");
$this->db->join("componentes cm","cm.cod_componente = pc.cod_componente");
$this->db->join("marca m","pc.cod_marca = m.cod_marca");
$this->db->where("c.num_bien",$id); 
	$resultados = $this->db->get();
	if ($resultados->num_rows() > 0) {
		return $resultados->result();
	}else
	{
		return false;
	}		
	}

	public function get_partes($id)
	{
	$this->db->select("*");
	$this->db->from("partes_componentes");
	$this->db->where("cod_componente",$id);
	$resultados = $this->db->get();
	if ($resultados->num_rows() > 0) {
		return $resultados->result();
	}else
	{
		return false;
	}	
	}
	public function save_componentes($data)
	{
		return $this->db->insert("componentes",$data);
	}
	public function save_partes($data)
	{
		return $this->db->insert("partes_componentes",$data);
	}
	public function save_compo_equipos($data)
	{
		return $this->db->insert("componentes-equipo",$data);
	}
	public function save_tipos($data)
	{
		return $this->db->insert("tipo_componente",$data);
	}

	public function save_tipo_compos($data)
	{
		return $this->db->insert("tipo_equipo-componente",$data);
	}

	public function editar_componente()
	{
		# code...
	}
	public function get_tipo_componente()
	{
	$this->db->select("*");
	$this->db->from("tipo_componente");
	$resultados = $this->db->get();
	if ($resultados->num_rows() > 0) {
		return $resultados->result();
	}else
	{
		return false;
	}
	}
	public function get_componente_by_tipo($id)
	{
	$this->db->select("*");
	$this->db->from("componentes");
	$this->db->where("tipo_componente",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function get_componente_by_serial($id)
	{
$this->db->select("pc.*,m.*,cm.*");
//$this->db->from("componentes-equipo c");
$this->db->from("partes_componentes pc","pc.serial_compo = c.serial_componente");
$this->db->join("componentes cm","cm.cod_componente = pc.cod_componente");
$this->db->join("marca m","pc.cod_marca = m.cod_marca");
$this->db->where("pc.serial_compo",$id); 
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function getSec()
	{
	$this->db->select("componente");
    $query=$this->db->get("ordenes");
    return $query->row();
	}
	public function getMarc()
	{
	$this->db->select("marca");
    $query=$this->db->get("ordenes");
    return $query->row();
	}
}