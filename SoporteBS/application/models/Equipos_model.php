<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos_model extends CI_Model {

	var $tabla = "bienes";

	public function update($id,$data){
		$this->db->where("num_bien",$id);
		return $this->db->update("bienes",$data);
	}

	public function get_tipo_equip()
	{
		$this->db->select("*");
		$this->db->from("tipo_equipo");
		$resultados = $this->db->get();
		return $resultados->result();
	}
		public function get_marca()
	{
		$this->db->select("*");
		$this->db->from("marca");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function save($data){
		return $this->db->insert("bienes",$data);
	}
	public function get_equipos()
	{
		$this->db->select("b.*,u.nom_usuario as nombre, u.ape_usuario as apellido, m.marca,te.tipo_de_equipo as tipos");
		$this->db->from("bienes b");
		$this->db->join("usuario u","b.ci_usuario = u.ci_usuario");
		$this->db->join("marca m","b.cod_marca = m.cod_marca");
		$this->db->join("tipo_equipo te","b.cod_tipo_equipo = te.cod_tipo_equipo");
		$this->db->where("b.estado",1);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function get_equipo_id($id,$ci){
		$this->db->select("b.*,u.nom_usuario as nombres,u.ape_usuario as apellidos,te.tipo_de_equipo as tipos,m.*");
		$this->db->from("bienes b");
		$this->db->join("usuario u","b.ci_usuario = u.ci_usuario");
		$this->db->join("marca m","b.cod_marca = m.cod_marca");
		$this->db->join("tipo_equipo te","b.cod_tipo_equipo = te.cod_tipo_equipo");
		$this->db->where("b.num_bien",$id);
		$this->db->where("b.ci_usuario",$ci);
		$this->db->where("b.estado",1);
		$resultado = $this->db->get();
		return $resultado->row();
	}
		public function get_equipo_by_id($id){
		$this->db->select("b.*,u.nom_usuario as nombres,u.ape_usuario as apellidos,te.tipo_de_equipo as tipos,m.*");
		$this->db->from("bienes b");
		$this->db->join("usuario u","b.ci_usuario = u.ci_usuario");
		$this->db->join("marca m","b.cod_marca = m.cod_marca");
		$this->db->join("tipo_equipo te","b.cod_tipo_equipo = te.cod_tipo_equipo");
		$this->db->where("b.num_bien",$id);
		$this->db->where("b.estado",1);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}

	}
		public function getEquipo($id){
		$this->db->select("b.*,b.cod_marca as marca,u.nom_usuario as nombres,u.ape_usuario as apellidos,te.tipo_de_equipo as tipos,m.*");
			$this->db->from("bienes b");
			$this->db->join("usuario u","b.ci_usuario = u.ci_usuario");
			$this->db->join("marca m","b.cod_marca = m.cod_marca");
			$this->db->join("tipo_equipo te","b.cod_tipo_equipo = te.cod_tipo_equipo");
			$this->db->where("b.num_bien",$id);
			$this->db->where("b.estado",1);
			$resultado = $this->db->get();
		return $resultado->row();
	}


		public function get_equipo_by_dependencia($dep)
		{
	$this->db->select("u.*,CONCAT(u.nom_usuario, u.ape_usuario) as usuario,b.*,m.marca as marca,te.tipo_de_equipo as tipos");
	$this->db->from("usuario u");
	$this->db->join("bienes b","b.ci_usuario = u.ci_usuario");
	$this->db->join("marca m","b.cod_marca = m.cod_marca");
	$this->db->join("tipo_equipo te","b.cod_tipo_equipo = te.cod_tipo_equipo");
	$this->db->where("u.estado",1);
	$this->db->where("u.cod_dependencia",$dep);
	$consulta = $this->db->get();
	$resultado = $consulta->result();
	return $resultado;
	}
public function get_equipo_by_tipo($tipo)
{
	$this->db->select("b.*,m.marca,te.tipo_de_equipo as tipos");
	$this->db->from("bienes b");
	$this->db->join("marca m","b.cod_marca = m.cod_marca");
	$this->db->join("tipo_equipo te","b.cod_tipo_equipo = te.cod_tipo_equipo");
	$this->db->where("b.estado",1);
	$this->db->where("b.cod_tipo_equipo",$tipo);
	$consulta = $this->db->get();
  $resultado = $consulta->result();
  return $resultado;
}
public function get_equipo_by_estado($estado)
{
	$this->db->select("b.*,m.marca,te.tipo_de_equipo as tipos");
	$this->db->from("bienes b");
	$this->db->join("marca m","b.cod_marca = m.cod_marca");
	$this->db->join("tipo_equipo te","b.cod_tipo_equipo = te.cod_tipo_equipo");
	$this->db->where("b.estado",1);
	$this->db->like("b.condicion_bien",$estado);
  $consulta = $this->db->get();
  $resultado = $consulta->result();
  return $resultado;
}
		public function my_equip($my)
		{
			$this->db->select("b.*,u.nom_usuario as nombre, u.ape_usuario as apellido, m.marca,te.tipo_de_equipo as tipos");
			$this->db->from("bienes b");
			$this->db->join("usuario u","b.ci_usuario = u.ci_usuario");
			$this->db->join("marca m","b.cod_marca = m.cod_marca");
			$this->db->join("tipo_equipo te","b.cod_tipo_equipo = te.cod_tipo_equipo");
			$this->db->where("b.ci_usuario",$my);
			$this->db->where("b.estado",1);
			$resultados = $this->db->get();
			if ($resultados->num_rows() > 0) {
				return $resultados->result();
			}else
			{
				return false;
			}
		}

	public function save_marcas($data)
	{
	return $this->db->insert("marca",$data);
	}

		public function get_equipos_compo($id)
	{
		$this->db->select("pc.*,ce.*,b.*,u.*,CONCAT(u.nom_usuario, u.ape_usuario) as usuario,e.*,m.*");
		//$this->db->from("tipo_equipo-componente tc");
		$this->db->from("partes_componentes pc");
		$this->db->join("componentes-equipo ce","pc.serial_compo = ce.serial_componente");
		$this->db->join("bienes b","ce.num_bien = b.num_bien");
		$this->db->join("usuario u","b.ci_usuario = u.ci_usuario");
		$this->db->join("marca m","b.cod_marca = m.cod_marca");
		$this->db->join("tipo_equipo e","b.cod_tipo_equipo = e.cod_tipo_equipo");
		$this->db->where("pc.cod_componente",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return $resultados->result();
		}
	}
}
