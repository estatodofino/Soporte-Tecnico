<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Tecnicos extends CI_Controller {
   public function __construct() {
      parent::__construct();
       //$this->load->model('Tecnicos_model');
       //$this->form_validation->set_message('required', '%s es obligatorio.');
       //$this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function index() 
   {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('welcome_message'/*, $data*/);
      $this->load->view('overall/footer2');
   }
 }