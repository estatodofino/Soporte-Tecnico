<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Mensajes extends CI_Controller {
   public function __construct() {
      parent::__construct();
       $this->load->model('Backend_model');
       //$this->form_validation->set_message('required', '%s es obligatorio.');
       //$this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function index()
   {
     $data = array(
       'mensajes' =>$this->Backend_model->get_mensajes(),
       'contactos' =>$this->Backend_model->get_correos()
      );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('overall/mensajes', $data);
      $this->load->view('overall/footer2');
   }
   public function view_mail()
   {
     $id = $this->input->post("id");
     $data = array(
       'correo' => $this->Backend_model->correGet($id)
     );
     $this->load->view("ordenes/correo",$data);
   }
 }
