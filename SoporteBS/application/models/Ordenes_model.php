<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function update($id,$data){
		$this->db->where("cod_dependencia",$id);
		return $this->db->update("dependencia",$data);
	}

	public function getSec()
	{
	$this->db->select("secuencia");
    $query=$this->db->get("ordenes");
    return $query->row();
	}

	public function get_orden()
	{
	$this->db->select('*');
	$this->db->from('tipo_orden');
    $query=$this->db->get();
    return $query->result();
	}
	public function add($data)
	{
		return $this->db->insert("orden",$data);
	}
	public function getComprobante($idSolicitud){
		$this->db->where("cod_tipo_orden",$idSolicitud);
		$resultado = $this->db->get("tipo_orden");
		return $resultado->row();
	}
	public function updateComprobante($idSolicitud,$data){
		$this->db->where("cod_tipo_orden",$idSolicitud);
		$this->db->update("tipo_orden",$data);
	}
	public function updateControl($data){
		$this->db->update("ordenes",$data);
	}
	public function getOrdenes()
	{
		$this->db->select("o.num_orden as orden,o.fecha_solicitud as fechas,o.estatus_orden as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.tipo_orden as solicitud");
		$this->db->from("orden o");
		$this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
		$this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
		$this->db->where("o.estado",1);
		$this->db->order_by('o.num_orden','asc');
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
		public function get_orden_by_id($id){
		$this->db->select("o.*,ts.tipo_orden as tipoOrden,CONCAT(u.nom_usuario,u.ape_usuario) as solicitante,d.nom_dependencia as dependencia,b.*,ma.marca,CONCAT(te.nom_usuario,te.ape_usuario) as tecnico");
		$this->db->from("orden o");
		$this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
		$this->db->join("usuario te","o.ci_tecnico = te.ci_usuario");
		$this->db->join("tipo_orden ts","o.cod_tipo_solicitud = ts.cod_tipo_orden");
		$this->db->join("dependencia d","u.cod_dependencia = d.cod_dependencia");
		$this->db->join("bienes b","b.num_bien = o.num_equipo");
		$this->db->join("marca ma","b.cod_marca = ma.cod_marca");
		$this->db->where("o.num_orden",$id);
		$this->db->where("o.estado",1);
		$resultado = $this->db->get();
		return $resultado->row();
	}
    public function get_orden_by_ci($ci){
        $this->db->select("o.num_orden as orden,o.fecha_solicitud as fechas,o.fecha_asignacion_t as fecha_asignacion,o.*,o.estatus_orden as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.tipo_orden as solicitud");
		$this->db->from("orden o");
		$this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
		$this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
    $this->db->where("o.ci_solicitante",$ci);
		$this->db->where("o.estado",1);
    $consulta = $this->db->get();
    $resultado = $consulta->result();
    return $resultado;
	}
    public function update_orden($id,$data){
        $this->db->where("num_orden",$id);
		return $this->db->update("orden",$data);
    }
    public function getOrdenes_t($ci){
        $this->db->select("o.num_orden as orden,o.fecha_solicitud as fechas,o.fecha_asignacion_t as fecha_asignacion,o.estatus_orden as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.tipo_orden as solicitud");
    $this->db->from("orden o");
    $this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
    $this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
        $this->db->where("o.ci_tecnico",$ci);
    $this->db->where("o.estado",1);
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
      return $resultados->result();
    }else
    {
      return false;
    }
  }
	public function change_estado($id,$data){
	$this->db->where("num_orden",$id);
	return $this->db->update("orden",$data);
}
public function get_orden_by_estado($estado)
{
  $this->db->select("o.num_orden as orden,o.fecha_solicitud as fechas,o.feccha_cierre as feccha_cierre,o.fecha_asignacion_t as fecha_asignacion,o.estatus_orden as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.tipo_orden as solicitud");
  $this->db->from("orden o");
  $this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
  $this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
  $this->db->like("o.estatus_orden",$estado);
  $this->db->where("o.estado",1);
  $consulta = $this->db->get();
  $resultado = $consulta->result();
  return $resultado;
}
public function get_orden_by_tipo($ci){
    $this->db->select("o.num_orden as orden,o.fecha_solicitud as fechas,o.fecha_asignacion_t as fecha_asignacion,o.*,o.estatus_orden as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.tipo_orden as solicitud");
$this->db->from("orden o");
$this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
$this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
$this->db->where("o.cod_tipo_solicitud",$ci);
$this->db->where("o.estado",1);
$consulta = $this->db->get();
$resultado = $consulta->result();
return $resultado;
}
public function getOrdenesbyDate($fechainicio,$fechafin){
	$this->db->select("o.num_orden as orden,o.fecha_solicitud as fechas,o.fecha_asignacion_t as fecha_asignacion,o.*,o.estatus_orden as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.tipo_orden as solicitud");
	$this->db->from("orden o");
	$this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
	$this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
	$this->db->where("o.fecha_solicitud >=",$fechainicio);
	$this->db->where("o.fecha_solicitud <=",$fechafin);
	$resultados = $this->db->get();
	if ($resultados->num_rows() > 0) {
		return $resultados->result();
	}else
	{
		return false;
	}
}

 public function getOrdenesbyDateTec($fecha,$tecnico)
 {
	 $this->db->select("o.num_orden as orden,o.fecha_solicitud as fechas,o.fecha_asignacion_t as fecha_asignacion,o.*,o.estatus_orden as estado,u.nom_usuario as nombre, u.ape_usuario as apellido,te.tipo_orden as solicitud");
  	$this->db->from("orden o");
  	$this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
  	$this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
  	$this->db->where("o.fecha_solicitud",$fecha);
  	$this->db->where("o.ci_tecnico",$tecnico);
  	$resultados = $this->db->get();
  	if ($resultados->num_rows() > 0) {
  		return $resultados->result();
  	}else
  	{
  		return false;
  	}
 }
 public function get_orden_by_dependencia($dep)
 {
 $this->db->select("u.*,o.num_orden as orden,o.fecha_solicitud as fechas,o.fecha_asignacion_t as fecha_asignacion,o.*,o.estatus_orden as estado,u.nom_usuario as nombre, u.ape_usuario as apellido");
 $this->db->from("usuario u");
 	$this->db->from("orden o","o.ci_solicitante = u.ci_usuario");
 $this->db->where("u.estado",1);
 $this->db->where("u.cod_dependencia",$dep);
 $this->db->group_by("u.ci_usuario");
 $resultados = $this->db->get();
 if ($resultados->num_rows() > 0) {
	 return $resultados->result();
 }else
 {
	 return false;
 }
}
public function cantidad($year){
	$this->db->select("MONTH(fecha_solicitud) as mes");
	$this->db->from("orden");
	$this->db->where("fecha_solicitud >=",$year."-01-01");
	$this->db->where("fecha_solicitud <=",$year."-12-31");
	$this->db->group_by("mes");
	$this->db->order_by("mes");
	$resultados = $this->db->get();
	return $resultados->result();
}
public function rowCount($tabla,$year){
		$this->db->where("estado","1");
		$this->db->where("fecha_solicitud >=",$year."-01-01");
		$this->db->where("fecha_solicitud <=",$year."-12-31");
	$resultados = $this->db->get($tabla);
	return $resultados->num_rows();
}
public function rowCountmes($tabla,$year,$mes){
		$this->db->where("estado","1");
		$this->db->where("fecha_solicitud >=",$year."-".$mes."-01");
		$this->db->where("fecha_solicitud <=",$year."-".$mes."-31");
	$resultados = $this->db->get($tabla);
	return $resultados->num_rows();
}
}
