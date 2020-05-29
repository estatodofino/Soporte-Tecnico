<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Seguridad extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $this->load->model("Usuarios_model");
       //$this->load->model('seguridad_model');
       $this->form_validation->set_message('required', '%s es obligatoria.');
       $this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }

      public function cambiclave()
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('user/seguridad/claves'/*, $data*/);
      $this->load->view('overall/footer2');
   }
   public function Actualizar()
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
       $this->cambiclave();
          }
      }else{
        $this->session->set_flashdata("error","Error! Antigua Contraseña es incorrecta");
       $this->cambiclave();
      }
    }else{
      $this->cambiclave();
    }
   }

   public function contacto()
   {
     $this->load->view('overall/limpieza/header');
     $this->load->view('overall/menuGeneral');
     $this->load->view('overall/contactar');
     $this->load->view('overall/limpieza/footer');
   }
   public function send_mensaje()
 	{
 	$nombres = $this->input->post("nombres");
 	$asunto = $this->input->post("asunto");
 	$correo = $this->input->post("email");
 	$mensaje = $this->input->post("mensaje");
 	$fecha = date("Y-m-d");

 	$this->form_validation->set_rules("nombres","Nombres","required");
 	$this->form_validation->set_rules("asunto","Asunto","required");
 	$this->form_validation->set_rules("email","Email","required");
 	$this->form_validation->set_rules("mensaje","Mensaje","required");

 	if ($this->form_validation->run()) {
 		$data = array(
 			'nombres_mail' => $nombres,
 			'asunto_mail' => $asunto,
 			'correo_mail' => $correo,
 			'fecha_mail' => $fecha,
 			'mensaje_mail' => $mensaje
 		);
 		if ($this->Usuarios_model->send_mensaje($data)) {
 			$this->session->set_flashdata("success","Su correo se envio satisfactoriamente");
 			redirect(base_url()."welcome/");
 		}else {
 			$this->session->set_flashdata("error","Su correo no se pudo enviar!!");
 			redirect(base_url()."user/seguridad/contactar/");
 		}
 	}
 	else{
 		$this->contactar();
 	}
  }
 }
