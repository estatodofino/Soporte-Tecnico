<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Equipo extends CI_Controller {
   public function __construct() {
      parent::__construct();
       $this->load->model('Dependencias_model');
       $this->load->model('Equipos_model');
       //$this->form_validation->set_message('required', '%s es obligatorio.');
       //$this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function tipo()
   {
    if ($this->session->userdata("rol")==3) {
      $data = array(
       'tipos' =>$this->Equipos_model->get_tipo_equip()
     );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/tipos', $data);
      $this->load->view('overall/footer2'); 
    }elseif ($this->session->userdata("rol")==2) {
      $data = array(
       'tipos' =>$this->Equipos_model->get_tipo_equip()
     );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/tipos', $data);
      $this->load->view('overall/footer2'); 
    }
        
   }
        public function estatus()
   {
    if ($this->session->userdata("rol")==3) {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/estatus'/*, $data*/);
      $this->load->view('overall/footer2');
    }elseif ($this->session->userdata("rol")==2) {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/estatus'/*, $data*/);
      $this->load->view('overall/footer2');
    }
      
   }
      public function Dependencia()
   {
    if ($this->session->userdata("rol")==3) {
      $data = array(
         'dependencias' => $this->Dependencias_model->get_all_dependencias()
          );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/dependencia', $data);
      $this->load->view('overall/footer2');
    }elseif ($this->session->userdata("rol")==2) {
      $data = array(
         'dependencias' => $this->Dependencias_model->get_all_dependencias()
          );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/dependencia', $data);
      $this->load->view('overall/footer2');
    }
      
   }
      public function componentes()
   {
    if ($this->session->userdata("rol")==3) {
     
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/componentes'/*, $data*/);
      $this->load->view('overall/footer2');
    }elseif ($this->session->userdata("rol")==2) {
     
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/componentes'/*, $data*/);
      $this->load->view('overall/footer2');
    }
   }


   public function ver_dependencias($id)
   {
    if ($this->session->userdata("rol")==3) {
      $data = array(
         'equipos' =>$this->Equipos_model->get_equipo_by_dependencia($id)
           );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('tecnico/reportes/equipos/list_dependencia', $data);
      $this->load->view('overall/footer2');
    }elseif ($this->session->userdata("rol")==2) {
      $data = array(
         'equipos' =>$this->Equipos_model->get_equipo_by_dependencia($id)
           );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/reportes/equipos/list_dependencia', $data);
      $this->load->view('overall/footer2');
    }
      
   }
 public function ver_por_tipo($id)
    {
      if ($this->session->userdata("rol")==3) {
          
       $data = array(
          'equipos' =>$this->Equipos_model->get_equipo_by_tipo($id)
            );
       $this->load->view('overall/header2');
       $this->load->view('overall/menuAdmin');
       $this->load->view('tecnico/reportes/equipos/list_tipo', $data);
       $this->load->view('overall/footer2');
        }elseif ($this->session->userdata("rol")==2) {
          
       $data = array(
          'equipos' =>$this->Equipos_model->get_equipo_by_tipo($id)
            );
       $this->load->view('overall/header2');
       $this->load->view('overall/menuTecnico');
       $this->load->view('tecnico/reportes/equipos/list_tipo', $data);
       $this->load->view('overall/footer2');
        }
}
   public function ver_estatus($id)
       {
        if ($this->session->userdata("rol")==3) 
        {
          $data = array(
             'equipos' =>$this->Equipos_model->get_equipo_by_estado($id)
               );
          $this->load->view('overall/header2');
          $this->load->view('overall/menuAdmin');
          $this->load->view('tecnico/reportes/equipos/list_estado', $data);
          $this->load->view('overall/footer2');
        }elseif ($this->session->userdata("rol")==2) {
          # code...
          $data = array(
             'equipos' =>$this->Equipos_model->get_equipo_by_estado($id)
               );
          $this->load->view('overall/header2');
          $this->load->view('overall/menuTecnico');
          $this->load->view('tecnico/reportes/equipos/list_estado', $data);
          $this->load->view('overall/footer2');
       }
 }
      

 }
