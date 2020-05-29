<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Reportes extends CI_Controller {
   public function __construct() {
      parent::__construct();
       //$this->load->model('Reportes_model');
       //$this->form_validation->set_message('required', '%s es obligatorio.');
       //$this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function equipos() 
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/equipos/list'/*, $data*/);
      $this->load->view('overall/footer2');
   }
   public function usuarios()
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/user/list'/*, $data*/);
      $this->load->view('overall/footer2');
   }
   public function ordenes()
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/ordenes/list'/*, $data*/);
      $this->load->view('overall/footer2');
   }
      public function informes()
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/reportes/informes/list'/*, $data*/);
      $this->load->view('overall/footer2');
   }
 }