<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("link",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("menu_id",$menu);
		$this->db->where("rol_id",$rol);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	public function rowCount($tabla){ 
			$this->db->where("estado","1");
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}
	public function get_correos()
	{
		$this->db->select("*");
		$this->db->from("mensajes");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function get_mensajes()
	{
		$this->db->select("num_orden,respuesta_solic,fecha_resp,comentario_final");
		$this->db->from("orden");
		$this->db->where("fecha_resp !=","0000-00-00");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function correGet($id)
	{
		$this->db->select("*");
		$this->db->from("mensajes");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
}
