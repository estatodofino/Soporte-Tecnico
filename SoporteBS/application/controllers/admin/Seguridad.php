<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Seguridad extends CI_Controller {
   public function __construct() {
      parent::__construct();
      if (!$this->session->userdata("login")) {
			redirect(base_url());
		  }
      $this->load->model("Usuarios_model");
       //$this->load->model('seguridad_model');
    $this->form_validation->set_message('required', '%s es obligatorio.');
    $this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function permisos()
   {
    $data  = array(
       'usuarios' => $this->Usuarios_model->getUsuarios()
     );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/seguridad/privilegios', $data);
      $this->load->view('overall/footer2');
   }
   public function usuarios()
   {

     $data  = array(
       'usuarios' => $this->Usuarios_model->getUsuarios()
     );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/seguridad/users', $data);
      $this->load->view('overall/footer2');
   }

      public function Keys()
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/seguridad/claves'/*, $data*/);
      $this->load->view('overall/footer2');
   }

   public function actualizar()
   {
    $id_usuario = $this->session->userdata("id");
     $antigua = $this->input->post("antigua");
     $nueva = $this->input->post("nueva");
     $confirmar = $this->input->post("confirmar");

    $this->form_validation->set_rules("antigua","Su Antigua clave","required");
    $this->form_validation->set_rules("nueva","Nueva clave","required");
    $this->form_validation->set_rules("confirmar","Confirmacion de clave","required");

    $usuarioActual = $this->Usuarios_model->getUsuario($id_usuario);

    if ($this->form_validation->run()) {
      if($antigua == $usuarioActual->clave)
      {
       if($nueva == $confirmar)
          {
            $data = array('password' =>$confirmar);
            if ($this->Usuarios_model->update($id_usuario,$data)) {
              $this->session->set_flashdata("success","Excelente! su clave de Ingreso fue actualizada");
               redirect(base_url()."welcome/");

             }else{
              $this->session->set_flashdata("error","Error! No se pudo actualizar su Contraseña");
             }
          }else{
            $this->session->set_flashdata("error","Error! las Contraseñas no coinciden");
       $this->keys();
          }
      }else{
        $this->session->set_flashdata("error","Error! Antigua Contraseña es incorrecta");
       $this->keys();
      }
    }else{
      $this->keys();
    }
   }

   public function edit($id){
    $data  = array(
      'roles' => $this->Usuarios_model->getRoles(),
      'usuario' => $this->Usuarios_model->getUsuario($id)
    );
    $this->load->view("overall/header2");
    $this->load->view("overall/menuAdmin");
    $this->load->view("admin/usuarios/edit",$data);
    $this->load->view("overall/footer2");
  }

   public function update(){
    $idusuario = $this->input->post("idusuario");
    $rol = $this->input->post("rol");
    $this->form_validation->set_rules("rol","Rol","required");
    if ($this->form_validation->run()) {
      $data  = array(
        'cod_tipo_usuario' => $rol,
      );

      if ($this->Usuarios_model->update($idusuario,$data)) {
        $this->session->set_flashdata("success","se ha modificado satisfactoriamente");
        redirect(base_url()."welcome/");

      }
      else{
        $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."admin/seguridad/edit/".$idusuario);
      }
    }else {
      $this->edit($idusuario);
    }
  }
 }
