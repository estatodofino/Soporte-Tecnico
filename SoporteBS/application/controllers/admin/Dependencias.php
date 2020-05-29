<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Dependencias extends CI_Controller {
   public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model("Dependencias_model");
      $this->form_validation->set_message('required', 'El campo %s no puede ir vacío!');
      $this->form_validation->set_message('min_length', 'El campo %s debe tener al menos %s carácteres');
    }

   public function index()
   {
      $data = array(
        'dependencias' =>$this->Dependencias_model->get_all_dependencias()
       );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/dependencias/list', $data);
      $this->load->view('overall/footer2');
   }
   public function  add()
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/dependencias/add'/*, $data*/);
      $this->load->view('overall/footer2');
   }
   public function store()
   {
    $codigo = $this->input->post('codigo');
    $nombre = $this->input->post('nombre');
    $responsable = $this->input->post('responsable');

      $this->form_validation->set_rules('codigo', 'Codigo', 'required');
      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('responsable', 'Responsable', 'required');

      if ($this->form_validation->run()) {
        $data = array(
              'cod_dependencia' =>$codigo ,
              'nom_dependencia' =>$nombre ,
              'responsable_dep' =>$responsable
               );
            if ($this->Dependencias_model->save($data)) {
              $this->session->set_flashdata("success","Se agrego una nueva dependencia");
              redirect(base_url()."admin/Dependencias");
              }
              else{
                $this->session->set_flashdata("error","No se pudo guardar la informacion");
                redirect(base_url()."admin/Dependencias/add");
              }
      }else{ 
        $this->add();
      }

    }
      public function  edit($id)
   {
    $data = array(
        'dependencia' =>$this->Dependencias_model->get_dependencia($id)
       );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/dependencias/edit', $data);
      $this->load->view('overall/footer2');
   }
   public function update()
   {
    $codigo = $this->input->post('codigo');
    $nombre = $this->input->post('nombre');
    $responsable = $this->input->post('responsable');

      $this->form_validation->set_rules('codigo', 'Codigo', 'required');
      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('responsable', 'Responsable', 'required');

      if ($this->form_validation->run()) {
        $data = array(
              'cod_dependencia' =>$codigo,
              'nom_dependencia' =>$nombre ,
              'responsable_dep' =>$responsable
               );
          if ($this->Dependencias_model->update($codigo,$data)) {
             $this->session->set_flashdata("success","Se actualizo satisfactoriamente");
              redirect(base_url()."admin/Dependencias");
              }
              else{
                $this->session->set_flashdata("error","No se pudo guardar la informacion");
                redirect(base_url()."admin/Dependencias/edit".$codigo);
              }
          }else{
            $this->edit($codigo);
      }
   }

     public function delete($id){
     $data  = array(
       'estado' => "0",
     );
     $this->Dependencias_model->update($id,$data);
     $this->session->set_flashdata("success","Se elimino satisfactoriamente");
     echo "admin/Dependencias/";
   }

 }
