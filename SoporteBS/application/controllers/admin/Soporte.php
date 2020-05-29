<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Soporte extends CI_Controller {
   public function __construct() {
      parent::__construct();
      if (!$this->session->userdata("login")) {
			redirect(base_url());
		  }
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
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/soporte/atencion',$data);
      $this->load->view('overall/footer2');
   }
   public function nueva()
   {
     $my = $this->session->userdata("id");
     $data  = array(
      'equipos' => $this->Equipos_model->my_equip($my),
      'control' => $this->Soporte_model->getSec(),
      'ordenes' => $this->Soporte_model->get_orden(),
      'marcas' => $this->Equipos_model->get_marca(),
      'tecnicos' =>$this->Usuarios_model->getTecnicos()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/soporte/new',$data);
      $this->load->view('overall/footer2');
   }
   public function asignar($id)
   {
      $data  = array(
      'ordenes' => $this->Soporte_model->get_orden_by_id($id),
      'tecnicos' =>$this->Usuarios_model->getTecnicos(),
      'informes'=>$this->Informes_model->get_informes_by($id)
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/soporte/asignar', $data);
      $this->load->view('overall/footer2');
   }
   public function new_orden()
   {
    $this->form_validation->set_rules("equipoNum","Numero del equipo","required");
    $this->form_validation->set_rules("descripcion","Descripcion","required");
    $this->form_validation->set_rules("tipo","Tipo","required");
    $this->form_validation->set_rules("tecnico","Tecnico","required");
    $this->form_validation->set_rules("estado","Estado","required");

    $numOrden = $this->input->post("numero");
    $numEquipo = $this->input->post("equipoNum");
    $descripcion = $this->input->post("descripcion");
    $fechaSolicitud = date("Y-m-d");
    $fechaAsigTecnico = date("Y-m-d");
    $tipoSolicitud = $this->input->post("tipo");
    $solicitante = $this->session->userdata("id");
    $tecnico = $this->input->post("tecnico");
    $estatus = $this->input->post("estado");

    if ($this->form_validation->run() == TRUE){
      $data = array(
        'num_orden' =>$numOrden ,
        'num_equipo' =>$numEquipo ,
        'descrip_orden' =>$descripcion ,
        'fecha_solicitud' =>$fechaSolicitud ,
        'fecha_asignacion_t' =>$fechaAsigTecnico ,
        'cod_tipo_solicitud' =>$tipoSolicitud ,
        'ci_solicitante' =>$solicitante ,
        'ci_tecnico' =>$tecnico ,
        'estatus_orden' =>$estatus
      );

      if ($this->Soporte_model->add($data))
      {
        $this->updateComprobante($tipoSolicitud);
        $this->updateControl();
        $this->session->set_flashdata("success","Se guardo Satisfactoriamente");
        redirect(base_url()."admin/Soporte/atencion");
      }
      else
      {
      $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."admin/Soporte/");
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
      $data = array(
          'ordenes' =>$this->Soporte_model->getOrdenes()
      );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/soporte/list', $data);
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
  public function update_orden($id)
  {
    $id = $this->input->post("numO");
		$tecnico = $this->input->post("tecnico");
		$fecha_asignacion_t = date("Y-m-d");
		$estado = "Asignada";

		$data  = array(
			'ci_tecnico' => $tecnico,
			'fecha_asignacion_t' => $fecha_asignacion_t,
			'estatus_orden' => $estado
		);

		if ($this->Soporte_model->update_orden($id,$data)) {
            $this->session->set_flashdata("success","se asigno correctamente");
			redirect(base_url()."admin/Soporte/atencion/");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."admin/Soporte/asignar/",$id);
		}
  }
  public function view_orden()
  {
    $orden = $this->input->post("id");
    $data = array(
      "orden" => $this->Soporte_model->get_orden_by_id($orden),
      'informes'=>$this->Informes_model->get_informes_by($orden)
    );
    $this->load->view("ordenes/view",$data);
  }
  public function delete_orden($id){
    $data  = array(
      'estado' => "0",
    );
    $this->Soporte_model->update_orden($id,$data);
    $this->session->set_flashdata("success","Se elimino satisfactoriamente");
    echo "admin/soporte/atencion";
  }

  public function change_orden()
  {
    $idOrden = $this->input->post("id");
    $estado = $this->input->post("estado");
    $fechaCierre = date("Y-m-d");
    $data = array(
      'estatus_orden' =>$estado,
      'feccha_cierre' =>$fechaCierre
     );
    if ($this->Soporte_model->change_estado($idOrden,$data)) {
     $this->session->set_flashdata("success","Se cambio el estado de la orden");
     redirect(base_url()."admin/soporte/asignar/".$id);
    } else{
       $this->session->set_flashdata("error","No se pudo procesar la orden");
       redirect(base_url()."admin/soporte/asignar/".$id);
    }
  }
  public function mensaje_respuesta()
  {
    $orden = $this->input->post("orden_num");
    $mensaje = $this->input->post("mensaje");

    $this->form_validation->set_rules("orden_num","required");
    $this->form_validation->set_rules("mensaje","required");

    $data = array(
          'comentario_final' => $mensaje
        );
    if ($this->Soporte_model->update_orden($orden,$data)) {
      $this->session->set_flashdata("success","El mensaje se ha enviado");
         redirect(base_url()."admin/mensajes");
    }else{
     $this->session->set_flashdata("error","No se ha enviado el mensaje");
         redirect(base_url()."admin/mensajes");
    }
  }
 }
