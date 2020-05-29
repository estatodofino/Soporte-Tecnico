<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencias_model extends CI_Model {

	var $table = 'dependencia';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_dependencias()
	{
	$this->db->select('cod_dependencia as codigo, nom_dependencia as nombre, responsable_dep as responsable');
	$this->db->from('dependencia');
	$this->db->where("estado",1);
    $resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}

	public function get_all_dependencias(){
	$this->db->select('cod_dependencia as codigo, nom_dependencia as nombre, responsable_dep as responsable');
	$this->db->from('dependencia');
	$this->db->where("estado",1);
    $query=$this->db->get();
    return $query->result();
	}
	public function save($data)
	{
		return $this->db->insert("dependencia",$data);
	}
	public function get_dependencia($id)
	{
	$this->db->select("cod_dependencia as codigo, nom_dependencia as nombre, responsable_dep as responsable");
	$this->db->from('dependencia');
	$this->db->where('cod_dependencia',$id);
    $resultado = $this->db->get();
		return $resultado->row();
	}
	public function update($id,$data){
		$this->db->where("cod_dependencia",$id);
		return $this->db->update("dependencia",$data);
	}
	public function eliminar($id){
		 $this->db->where('cod_dependencia', $id);
		 $this->db->delete('dependencia');
	}
}
