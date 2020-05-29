<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Ordenes extends CI_Controller {
   public function __construct() {
      parent::__construct();
       $this->load->model('Dependencias_model');
       $this->load->model('Ordenes_model');
        $this->load->model('Equipos_model');
         $this->load->model('Usuarios_model');
       //$this->form_validation->set_message('required', '%s es obligatorio.');
       //$this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   
   public function tipo()
   {
    if ($this->session->userdata("rol")==3) {
     $data = array(
       'tipos' =>$this->Ordenes_model->get_orden()
     );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
    $this->load->view('admin/reportes/ordenes/tipo', $data);
      $this->load->view('overall/footer2');
     
    }elseif ($this->session->userdata("rol")==2) {
     $data = array(
       'tipos' =>$this->Ordenes_model->get_orden()
     );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
    $this->load->view('admin/reportes/ordenes/tipo', $data);
      $this->load->view('overall/footer2');
     
    }
   }
        public function estatus()
   {
    if ($this->session->userdata("rol")==3) {
     
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/ordenes/estatus'/*, $data*/);
      $this->load->view('overall/footer2');
    }elseif ($this->session->userdata("rol")==2) {
     
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/reportes/ordenes/estatus'/*, $data*/);
      $this->load->view('overall/footer2');
    }
   }
      public function usuarios()
   {
    if ($this->session->userdata("rol")==3) {
      $data = array(
         'dependencias' => $this->Dependencias_model->get_dependencias()
          );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/ordenes/usuarios', $data);
      $this->load->view('overall/footer2');
     
    }elseif ($this->session->userdata("rol")==2) {
      $data = array(
         'dependencias' => $this->Dependencias_model->get_dependencias()
          );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/reportes/ordenes/usuarios', $data);
      $this->load->view('overall/footer2');
     
    }
   }
   public function usuario_depen($id)
   {
    if ($this->session->userdata("rol")==3) {
     $data = array(
     'usuarios' => $this->Usuarios_model->get_usuarios_by_dependencia($id),
     'dependencia'=> $this->Dependencias_model->get_dependencia($id)
      );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/user/list_dependencia', $data);
      $this->load->view('overall/footer2'); 
    }elseif ($this->session->userdata("rol")==2) {
     $data = array(
     'usuarios' => $this->Usuarios_model->get_usuarios_by_dependencia($id),
     'dependencia'=> $this->Dependencias_model->get_dependencia($id)
      );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/reportes/user/list_dependencia', $data);
      $this->load->view('overall/footer2'); 
    }
    
   }

   public function ver_by_users($id)
   {
    if ($this->session->userdata("rol")==3) {
      $data = array(
         'ordenes' =>$this->Ordenes_model->get_orden_by_ci($id)
           );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/ordenes/list_usuario', $data);
      $this->load->view('overall/footer2');
     
    }elseif ($this->session->userdata("rol")==2) {
      $data = array(
         'ordenes' =>$this->Ordenes_model->get_orden_by_ci($id)
           );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/reportes/ordenes/list_usuario', $data);
      $this->load->view('overall/footer2');
     
    }
   }
   public function ver_tipo($id)
{
  if ($this->session->userdata("rol")==3) {
   $data = array(
     'ordenes' =>$this->Ordenes_model->get_orden_by_tipo($id)
       );
   $this->load->view('overall/header2');
   $this->load->view('overall/menuAdmin');
   $this->load->view('admin/reportes/ordenes/list_tipo', $data);
   $this->load->view('overall/footer2');
     
    }elseif ($this->session->userdata("rol")==2) {
   $data = array(
     'ordenes' =>$this->Ordenes_model->get_orden_by_tipo($id)
       );
   $this->load->view('overall/header2');
   $this->load->view('overall/menuTecnico');
   $this->load->view('admin/reportes/ordenes/list_tipo', $data);
   $this->load->view('overall/footer2');
     
    }
}
      public function ver_estatus($id)
   {
    if ($this->session->userdata("rol")==3) {
      $data = array(
         'ordenes' =>$this->Ordenes_model->get_orden_by_estado($id)
           );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/ordenes/list_estado', $data);
      $this->load->view('overall/footer2');
     
    }elseif ($this->session->userdata("rol")==2) {
      $data = array(
         'ordenes' =>$this->Ordenes_model->get_orden_by_estado($id)
           );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/reportes/ordenes/list_estado', $data);
      $this->load->view('overall/footer2');
     
    }
   }

   public function fecha(){
   $fechainicio = $this->input->post("fechainicio");
   $fechafin = $this->input->post("fechafin");
   if ($this->input->post("buscar")) {
     $orden = $this->Ordenes_model->getOrdenesbyDate($fechainicio,$fechafin);
   }
   else{
     $orden = $this->Ordenes_model->getOrdenes();
   }
   $data = array(
     "ordenes" => $orden,
     "fechainicio" => $fechainicio,
     "fechafin" => $fechafin
   );
   if ($this->session->userdata("rol")==3) {
   $this->load->view("overall/header2");
   $this->load->view("overall/menuAdmin");
   $this->load->view("admin/reportes/ordenes/list",$data);//misma vista donde se busca la info
   $this->load->view("overall/footer2");
     
    }elseif ($this->session->userdata("rol")==2) {
   $this->load->view("overall/header2");
   $this->load->view("overall/menuTecnico");
   $this->load->view("admin/reportes/ordenes/list",$data);//misma vista donde se busca la info
   $this->load->view("overall/footer2");
     
    }
 }

  public function tecnico()
  {
    $fecha = $this->input->post("fecha");
    $tecnico = $this->input->post("tecnico");
    if ($this->input->post("buscar")) {
      $orden = $this->Ordenes_model->getOrdenesbyDateTec($fecha,$tecnico);
    }
    else{
      $orden = $this->Ordenes_model->getOrdenes();
    }
    $data = array(
      "ordenes" => $orden,
      "fecha" => $fecha,
      "tecnicos" =>$this->Usuarios_model->getTecnicos()
    );
    if ($this->session->userdata("rol")==3) {
    $this->load->view("overall/header2");
    $this->load->view("overall/menuAdmin");
    $this->load->view("admin/reportes/ordenes/tecnico",$data);//misma vista donde se busca la info
    $this->load->view("overall/footer2");
     
    }elseif ($this->session->userdata("rol")==2) {
    $this->load->view("overall/header2");
    $this->load->view("overall/menuTecnico");
    $this->load->view("admin/reportes/ordenes/tecnico",$data);//misma vista donde se busca la info
    $this->load->view("overall/footer2");
     
    }
  }
 }
