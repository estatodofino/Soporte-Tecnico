<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {


	public function getUsuarios()
	{
		$this->db->select("u.*,d.nom_dependencia as dependencia,tu.tipo_usuario as tipo");
		$this->db->from("usuario u");
		$this->db->join("dependencia d","d.cod_dependencia = u.cod_dependencia");
		$this->db->join("tipo_usuario tu","u.cod_tipo_usuario = tu.cod_tipo_u");
    $this->db->where("u.estado",1);
		$resultados = $this->db->get();
		return $resultados->result();
	}
		public function getTecnicos()
	{
		$this->db->select("*");
		$this->db->from("usuario");
		$this->db->where("cod_tipo_usuario",2);
    $this->db->where("estado",1);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function login($cedula, $password){
		$this->db->where("ci_usuario", $cedula);
		$this->db->where("password", $password);

		$resultados = $this->db->get("usuario");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	} 
	public function get_user_by_id($ci)
	{
		$this->db->select("CONCAT(nom_usuario,ape_usuario) as tecnico");
		$this->db->from("usuario");
		$this->db->where('ci_usuario',$ci);
		$query = $this->db->get();

		return $query->row();
	}
	public function getUsuario($id){
		$this->db->select("u.*,u.password as clave,tu.tipo_usuario as tipo,d.nom_dependencia as dependencia");
		$this->db->from("usuario u");
		$this->db->join("tipo_usuario tu","u.cod_tipo_usuario = tu.cod_tipo_u");
		$this->db->join("dependencia d","d.cod_dependencia = u.cod_dependencia");
		$this->db->where("u.ci_usuario",$id);
		$this->db->where("u.estado","1");
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function get_usuarios_by_dependencia($id){
		$this->db->select("u.*,CONCAT(u.nom_usuario,u.ape_usuario) as usuario,tu.tipo_usuario as tipo,d.nom_dependencia");
		$this->db->from("usuario u");
		$this->db->join("tipo_usuario tu","u.cod_tipo_usuario = tu.cod_tipo_u");
		$this->db->join("dependencia d","d.cod_dependencia = u.cod_dependencia");
		$this->db->where("u.cod_dependencia",$id);
		$this->db->where("u.estado","1");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function send_mensaje($data)
	{
	return $this->db->insert("mensajes",$data);
	}

	public function eliminar($id){
	 $this->db->where('ci_usuario', $id);
	 $this->db->delete('usuario');
	}

	public function save($data)
	{
	return $this->db->insert("usuario",$data);
	}
	public function update($id,$data){
	$this->db->where("ci_usuario",$id);
	return $this->db->update("usuario",$data);
	}

	public function actualizacion($idusuario,$data){
	$this->db->where("ci_usuario",$idusuario);
	return $this->db->update("usuario",$data);
	}

	public function getRoles(){
	$resultados = $this->db->get("tipo_usuario");
	return $resultados->result();
	}
}
