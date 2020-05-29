<?php
class Informes_model extends CI_Model {
   public function __construct(){
      parent::__construct();
      /*$this->load->database();*/
    }
   public function informes_add($data)
   {
     return $this->db->insert("informe_tecnico",$data);
   }
   public function eliminar($id){
      $this->db->where('id', $id);
      $this->db->delete('informes');
   }
   public function obtener_por_id($id){
      $this->db->select('id, titulo, descripcion, prioridad');
      $this->db->from('informes');
      $this->db->where('id', $id);
      $this->db->where('estado', '1');
      $consulta = $this->db->get();
      $resultado = $consulta->row();
      return $resultado;
   }
   public function get_all_informes(){
      $this->db->select('i.*,o.*,to.tipo_orden as solicitud');
      $this->db->from('informe_tecnico i');
      $this->db->join('orden o','i.num_orden = o.num_orden');
      $this->db->join('tipo_orden to','o.cod_tipo_solicitud = to.cod_tipo_orden');
      $this->db->where('i.estado', '1');
      $consulta = $this->db->get();
      $resultado = $consulta->result();
      return $resultado;
   }
   public function years(){
      $this->db->select("YEAR(fecha_solicitud) as year");
      $this->db->from("orden");
      $this->db->group_by("year");
      $this->db->order_by("year","desc");
      $resultados = $this->db->get();
      return $resultados->result();
   }
   public function getInformesbyDate($year)
   {
     $this->db->select("i.cod_IT,i.num_orden,i.descrip_IT,i.fecha_IT,o.*,te.tipo_orden as solicitud");
      $this->db->from("informe_tecnico");
      $this->db->join("orden o","i.num_orden = o.num_orden");
  		$this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
      //$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
      $this->db->where("i.fecha_IT >=",$year."-01-01");
      $this->db->where("i.fecha_IT <=",$year."-12-31");
      $this->db->where('i.estado', '1');
      $resultados = $this->db->get();
      if ($resultados->num_rows() > 0) {
         return $resultados->result();
      }else
      {
         return false;
      }
   }
   public function getInformesbyMonth($year,$mes)
   {
      $this->db->select("i.cod_IT,i.num_orden,i.descrip_IT,i.fecha_IT,o.*,te.tipo_orden as solicitud");
      $this->db->from("informe_tecnico i");
      $this->db->join("orden o","i.num_orden = o.num_orden");
  		$this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
      $this->db->like("i.fecha_IT",$year."-".$mes);
      $this->db->where('i.estado', '1');
      $resultados = $this->db->get();
      if ($resultados->num_rows() > 0) {
         return $resultados->result();
      }else
      {
         return false;
      }
   }
     public function get_informe($id)
   {
      $this->db->select("i.*,o.*,u.*,d.nom_dependencia as dependencia,te.tipo_orden as solicitud");
      $this->db->from("informe_tecnico i");
      $this->db->join("orden o","i.num_orden = o.num_orden");
      $this->db->join("usuario u","o.ci_solicitante = u.ci_usuario");
      $this->db->join("dependencia d","u.cod_dependencia = d.cod_dependencia");
  		$this->db->join("tipo_orden te","o.cod_tipo_solicitud = te.cod_tipo_orden");
      $this->db->where("i.cod_IT",$id);
      $this->db->where('i.estado', '1');
      $resultado = $this->db->get();
      return $resultado->row();
   }
   public function get_informes_by($id)
 {
    $this->db->select("*");
    $this->db->from("informe_tecnico ");
    $this->db->where("num_orden",$id);
    $this->db->where('estado', '1');
    $resultados = $this->db->get();
    if ($resultados->num_rows() > 0) {
       return $resultados->result();
    }else
    {
       return false;
    }
 }
 public function rowCount($cod,$year){
     $this->db->where("cod_tipo_solicitud",$cod);
     $this->db->where("estado","1");
     $this->db->where("fecha_solicitud >=",$year."-01-01");
 		$this->db->where("fecha_solicitud <=",$year."-12-31");
   $resultados = $this->db->get("orden");
   return $resultados->num_rows();
 }
 public function rowCountmes($cod,$year,$mes){
     $this->db->where("cod_tipo_solicitud",$cod);
     $this->db->where("estado","1");
     $this->db->where("fecha_solicitud >=",$year."-".$mes."-01");
     $this->db->where("fecha_solicitud <=",$year."-".$mes."-31");
   $resultados = $this->db->get("orden");
   return $resultados->num_rows();
 }
 public function cantidad($year){
   $this->db->select("MONTH(fecha_solicitud) as mes, SUM(estado) as monto");
   $this->db->from("orden");
   $this->db->where("fecha_solicitud >=",$year."-01-01");
   $this->db->where("fecha_solicitud <=",$year."-12-31");
   $this->db->group_by("mes");
   $this->db->order_by("mes");
   $resultados = $this->db->get();
   return $resultados->result();
 }
}
