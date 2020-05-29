<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Informes extends CI_Controller {
   public function __construct() {
      parent::__construct();
       $this->load->model('Dependencias_model');
       $this->load->model('Equipos_model');
       $this->load->model('Informes_model');
       $this->load->model('Ordenes_model');
       //$this->form_validation->set_message('required', '%s es obligatorio.');
       //$this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
      public function index()
   {
    $years = $this->input->post("year");
    $mes= $this->input->post("mes");

    if ($this->input->post("buscar")) {
      $informes = $this->Informes_model->getInformesbyMonth($years,$mes);
    }
    else{
      $informes = $this->Informes_model->get_all_informes();
    }
    $data = array(
      "informes" => $informes,
      'years' => $this->Informes_model->years()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/informes/list', $data);
      $this->load->view('overall/footer2');
   }
    public function ver($id)
    {
      $data = array(
        'informe' => $this->Informes_model->get_informe($id)
      );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/informes/ver', $data);
      $this->load->view('overall/footer2');
    }
    public function gestion_mensual()
    {
      $mes= $this->input->post("mes");
      $years = $this->input->post("year");
      if ($this->input->post("buscar")) {
        $data = array(
          'cantReparacion' => $this->Informes_model->rowCountmes("112",$years,$mes),
          'cantMantenimiento' => $this->Informes_model->rowCountmes("113",$years,$mes),
          'cantActualizacion' => $this->Informes_model->rowCountmes("111",$years,$mes),
          'cantInstalacion' => $this->Informes_model->rowCountmes("110",$years,$mes),
          'cantRedes' => $this->Informes_model->rowCountmes("115",$years,$mes),
          'cantAsistencia' => $this->Informes_model->rowCountmes("114",$years,$mes),
          'cantOrdenes' => $this->Ordenes_model->rowCountmes("Orden",$years,$mes),
          'years'=>$this->Informes_model->years()
        );
      }
      else{
        $mes= "01";
        $years="2018";
        $data = array(
          'cantReparacion' => $this->Informes_model->rowCountmes("112",$years,$mes),
          'cantMantenimiento' => $this->Informes_model->rowCountmes("113",$years,$mes),
          'cantActualizacion' => $this->Informes_model->rowCountmes("111",$years,$mes),
          'cantInstalacion' => $this->Informes_model->rowCountmes("110",$years,$mes),
          'cantRedes' => $this->Informes_model->rowCountmes("115",$years,$mes),
          'cantAsistencia' => $this->Informes_model->rowCountmes("114",$years,$mes),
          'cantOrdenes' => $this->Ordenes_model->rowCountmes("Orden",$years,$mes),
          'years'=>$this->Informes_model->years()
        );
      }
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/informes/gestiones_mes', $data);
      $this->load->view('overall/footer2');
    }
    public function gestion_years()
    {
      $years = $this->input->post("year");
      if ($this->input->post("buscar")) {
        $data = array(
          'cantReparacion' => $this->Informes_model->rowCount("112",$years),
          'cantMantenimiento' => $this->Informes_model->rowCount("113",$years),
          'cantActualizacion' => $this->Informes_model->rowCount("111",$years),
          'cantInstalacion' => $this->Informes_model->rowCount("110",$years),
          'cantRedes' => $this->Informes_model->rowCount("115",$years),
          'cantAsistencia' => $this->Informes_model->rowCount("114",$years),
          'cantOrdenes' => $this->Ordenes_model->rowCount("Orden",$years),
          'years'=>$this->Informes_model->years()
        );
      }
      else{
        $years="2018";
        $data = array(
          'cantReparacion' => $this->Informes_model->rowCount("112",$years),
          'cantMantenimiento' => $this->Informes_model->rowCount("113",$years),
          'cantActualizacion' => $this->Informes_model->rowCount("111",$years),
          'cantInstalacion' => $this->Informes_model->rowCount("110",$years),
          'cantRedes' => $this->Informes_model->rowCount("115",$years),
          'cantAsistencia' => $this->Informes_model->rowCount("114",$years),
          'cantOrdenes' => $this->Ordenes_model->rowCount("Orden",$years),
          'years'=>$this->Informes_model->years()
        );
      }
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/informes/gestiones_year', $data);
      $this->load->view('overall/footer2');
    }
    public function getData(){
  $year = $this->input->post("year");
  $resultados = $this->Informes_model->cantidad($year);
  echo json_encode($resultados);
}
 }
