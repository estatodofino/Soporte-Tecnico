<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Soporte extends CI_Controller {
   public function __construct() {
      parent::__construct();
       $this->form_validation->set_message('required', '%s es obligatorio.');
       $this->form_validation->set_message('numeric', '%s debe ser numérico.');
       $this->load->model('Soporte_model');
       $this->load->model('Usuarios_model');
       $this->load->model('Equipos_model');
       $this->load->model('Informes_model');
   }
   public function index()
   {
       $ci= $this->session->userdata("id");
      $data  = array(
      'ordenes' => $this->Soporte_model->get_orden_by_ci($ci)
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('user/soporte/list',$data);
      $this->load->view('overall/footer2');
   }
   public function nueva()
   {
     $my = $this->session->userdata("id");
     $data  = array(
      'equipos' => $this->Equipos_model->my_equip($my),
      'control' => $this->Soporte_model->getSec(),
      'ordenes' => $this->Soporte_model->get_orden(),
      'marcas' => $this->Equipos_model->get_marca()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('user/soporte/add',$data);
      $this->load->view('overall/footer2');
   }

   public function new_orden()
   {
   $this->form_validation->set_rules("equipoNum","Numero del equipo","required");
   $this->form_validation->set_rules("idmarca","Marca del equipo","required");
    $this->form_validation->set_rules("descripcion","Descripcion","required");
    $tecnico = 2222222;
    $numOrden = $this->input->post("numero");
    $numEquipo = $this->input->post("equipoNum");
    $descripcion = $this->input->post("descripcion");
    $fechaSolicitud = date("Y-m-d");
    $tipoSolicitud = $this->input->post("tipo");
    $solicitante = $this->session->userdata("id");
    $estatus="En espera";
    if ($this->form_validation->run() == TRUE){
      $data = array(
        'num_orden' =>$numOrden,
        'num_equipo' =>$numEquipo ,
        'descrip_orden' =>$descripcion ,
        'fecha_solicitud' =>$fechaSolicitud ,
        'cod_tipo_solicitud' =>$tipoSolicitud ,
        'ci_solicitante' =>$solicitante,
        'ci_tecnico' =>$tecnico,
        'estatus_orden' =>$estatus
      );
      if ($this->Soporte_model->add($data)) {
       $this->updateComprobante($tipoSolicitud);
       $this->updateControl();
       $this->session->set_flashdata("success","Se guardo Satisfactoriamente");
        redirect(base_url()."user/Soporte/");
      }
      else{
      $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."user/Soporte/nueva");
      }
    }else{
      $this->nueva();
    }
   }
     protected function updateComprobante($tipoSolicitud){
    $comprobanteActual = $this->Soporte_model->getComprobante($tipoSolicitud);
    $data  = array(
      'cantidad' => $comprobanteActual->cantidad + 1,
    );
    $this->Soporte_model->updateComprobante($tipoSolicitud,$data);
  }
       protected function updateControl(){
    $controlActual = $this->Soporte_model->getSec();
    $data  = array(
      'secuencia' => $controlActual->secuencia + 1,
    );
    $this->Soporte_model->updateControl($data);
  }
  public function atencion()
  {
      $data = array('ordenes' =>$this->Soporte_model->getOrdenes());
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('user/soporte/list', $data);
      $this->load->view('overall/footer2');

  }
  public function get_orden_id()
  {
    $numero= $this->input->post('valorOrden');
    $resultado = $this->Soporte_model->get_orden_by_id($numero);

    echo json_encode($resultado);
  }
  public function get_user_ci($numero)
    {
    $resultado = $this->Usuarios_model->get_user_by_id($numero);

    echo json_encode($resultado);
  }
  public function ver($id)
  {
    $data  = array(
    'ordenes' => $this->Soporte_model->get_orden_by_id($id),
    'tecnicos' =>$this->Usuarios_model->getTecnicos(),
    'informes'=>$this->Informes_model->get_informes_by($id)
  );
    $this->load->view('overall/header2');
    $this->load->view('overall/menuGeneral');
    $this->load->view('user/soporte/ver', $data);
    $this->load->view('overall/footer2');
  }
  public function mensaje()
  {
    $orden = $this->input->post("orden_num");
    $mensaje = $this->input->post("mensaje");
    $fecha= date("Y-m-d");

    $this->form_validation->set_rules("orden_num","required");
    $this->form_validation->set_rules("mensaje","required");

    $data = array(
          'respuesta_solic' => $mensaje,
          'fecha_resp' =>$fecha
        );
    if ($this->Soporte_model->update_orden($orden,$data)) {
      $this->session->set_flashdata("success","El mensaje se ha enviado");
         redirect(base_url()."user/soporte/ver/".$orden);
    }else{
     $this->session->set_flashdata("error","No se ha enviado el mensaje");
         redirect(base_url()."user/soporte/ver/".$orden);
    }
  }
 }
