<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Usuarios extends CI_Controller {
   public function __construct() {
      parent::__construct();
       $this->load->model('Usuarios_model');
       $this->form_validation->set_message('required', '%s es obligatorio.');
       $this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function index() 
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('welcome_message'/*, $data*/);
      $this->load->view('overall/footer2');
   }

      public function actualizar()
   {
     $id = $this->session->userdata("id");
     $data  = array(
       'usuario' => $this->Usuarios_model->getUsuario($id)
     );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('user/seguridad/actualizar', $data);
      $this->load->view('overall/footer2');
   }

    public function update()
    {
    $idusuario = $this->input->post("idusuario");
    $nombres = $this->input->post("nombres");
    $apellidos = $this->input->post("apellidos");
    $correo = $this->input->post("email");
    $cargo = $this->input->post("cargo");

    $this->form_validation->set_rules("nombres","Nombres","required");
    $this->form_validation->set_rules("apellidos","Apellidos","required");
    $this->form_validation->set_rules("cargo","Cargo","required");
    $this->form_validation->set_rules("email","Email","required");

    if ($this->form_validation->run()) {
      $data  = array(
        'nom_usuario' => $nombres,
        'ape_usuario' => $apellidos,
        'cargo' => $cargo,
        'correo_usuario' => $correo,
      );

    if ($this->Usuarios_model->actualizacion($idusuario,$data)) {
     $this->session->set_flashdata("success","se ha modificado satisfactoriamente");
        redirect(base_url()."welcome/");
        
      }
      else{
        $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."user/usuarios/actualizar/".$idusuario);
      }
    }else {
      $this->actualizar();
    }
  }
 }