<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Equipos extends CI_Controller {
   public function __construct() {
      parent::__construct();
       $this->load->model('Usuarios_model');
       $this->load->model('Equipos_model');
       $this->load->model('Componentes_model');
       $this->form_validation->set_message('required', '%s es obligatorio.');
       $this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function index()
   {
     $my = $this->session->userdata("id");
     $data  = array(
       'equipos' => $this->Equipos_model->my_equip($my)
     );
     if ($this->session->userdata("rol")==3) {
       $this->load->view('overall/header2');
       $this->load->view('overall/menuAdmin');
       $this->load->view('user/Equipos/list', $data);
       $this->load->view('overall/footer2');
     }elseif ($this->session->userdata("rol")==1) {
       $this->load->view('overall/header2');
       $this->load->view('overall/menuGeneral');
       $this->load->view('user/Equipos/list', $data);
       $this->load->view('overall/footer2');
     }
   }
   public function add()
   {
    $data  = array(
      'marcas' => $this->Equipos_model->get_marca(),
      'equipos'=>$this->Equipos_model->get_tipo_equip(),
      'controlMar' => $this->Componentes_model->getMarc()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('user/Equipos/add', $data);
      $this->load->view('overall/footer2');
   }
   public function editar($id)
   {
    $data  = array(
      'bienes' => $this->Equipos_model->getEquipo($id),
      'marcas' => $this->Equipos_model->get_marca(),
      'equipos'=>$this->Equipos_model->get_tipo_equip(),
      'controlMar' => $this->Componentes_model->getMarc()
    );
     if ($this->session->userdata("rol")==3) {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('user/Equipos/edit', $data);
      $this->load->view('overall/footer2');

     }elseif ($this->session->userdata("rol")==1) {
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('user/Equipos/edit', $data);
      $this->load->view('overall/footer2');

     }
   }
   public function store(){
    $codigo = $this->input->post("numero");
    $marca = $this->input->post("marca");
    $descripcion = $this->input->post("descripcion");
    $color = $this->input->post("color");
    $material = $this->input->post("material");
    $modelo = $this->input->post("modelo");
    $condicion = $this->input->post("condicion");
    $tipo = $this->input->post("tipox");
    $usuario = $this->session->userdata("id");

    $this->form_validation->set_rules("numero","Numero","required|is_unique[bienes.num_bien]");
    $this->form_validation->set_rules("marca","Marca","required");
    $this->form_validation->set_rules("modelo","Modelo","required");
    $this->form_validation->set_rules("descripcion","Descripcion","required");
    $this->form_validation->set_rules("material","Material","required");
    $this->form_validation->set_rules("condicion","Condicion","required");
    $this->form_validation->set_rules("tipox","Tipos","required");
    $this->form_validation->set_rules("color","Color","required");

    if ($this->form_validation->run()) {
      $data  = array(
        'num_bien' => $codigo,
        'cod_marca' => $marca,
        'modelo_bien' => $modelo,
        'descrip_bien' => $descripcion,
        'tipo_material_bien' => $material,
        'color_bien' => $color,
        'condicion_bien' => $condicion,
        'cod_tipo_equipo' => $tipo,
        'ci_usuario' => $usuario
      );

      if ($this->Equipos_model->save($data)) {
        $this->session->set_flashdata("success","Se guardo satisfactoriamente");
        redirect(base_url()."user/equipos/");
      }
      else{
        $this->session->set_flashdata("error","No se ha guardado la informacion");
        redirect(base_url()."user/equipos/add");
      }
    }
    else{
      $this->add();
    }
  }
  public function update()
  {
    $idequipo = $this->input->post("idbien");
    $marca = $this->input->post("marca");
    $modelo = $this->input->post("modelo");
    $descripcion = $this->input->post("descripcion");
    $color = $this->input->post("color");
    $material = $this->input->post("material");
    $condicion = $this->input->post("condicion");
    $tipo = $this->input->post("tipox");

    $equipoActual = $this->Equipos_model->getEquipo($idequipo);

    if ($idequipo == $equipoActual->num_bien) {
      $is_unique = '';
    }
    else{
      $is_unique = '|is_unique[bienes.num_bien]';
    }

    $this->form_validation->set_rules("marca","Marca","required");
    $this->form_validation->set_rules("modelo","Modelo","required");
    $this->form_validation->set_rules("descripcion","Descripcion","required");
    $this->form_validation->set_rules("color","Color","required");
    $this->form_validation->set_rules("material","Material","required");
    $this->form_validation->set_rules("condicion","Condicion","required");
    $this->form_validation->set_rules("tipox","Tipos","required");


    if ($this->form_validation->run()) {
      $data  = array(
        'cod_marca' => $marca,
        'modelo_bien' => $modelo,
        'descrip_bien' => $descripcion,
        'color_bien' => $color,
        'tipo_material_bien' => $material,
        'condicion_bien' => $condicion,
        'cod_tipo_equipo' => $tipo,
      );
      if ($this->Equipos_model->update($idequipo,$data)) {
         $this->session->set_flashdata("success"," Se actualizo satisfactoriamente");
        redirect(base_url()."user/equipos/");
      }
      else{
        $this->session->set_flashdata("error"," No se pudo guardar la informacion");
        redirect(base_url()."user/equipos/editar/".$idequipo);
      }
    }else{
      $this->editar($idequipo);
    }
  }
  public function ver($id)
  {
      $data  = array(
      'componentes' => $this->Componentes_model->get_Componente($id),
      'equipo' => $this->Equipos_model->getEquipo($id),
      'marcas' => $this->Equipos_model->get_marca()
      );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuGeneral');
      $this->load->view('admin/Equipos/ver', $data);
      $this->load->view('overall/footer2');
    }

}
