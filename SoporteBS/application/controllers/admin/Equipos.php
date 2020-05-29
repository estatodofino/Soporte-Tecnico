<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Equipos extends CI_Controller {
   public function __construct() {
      parent::__construct();
      if (!$this->session->userdata("login")) {
			redirect(base_url());
		  }
       $this->load->model('Usuarios_model');
       $this->load->model('Dependencias_model');
       $this->load->model('Equipos_model');
       $this->load->model('Componentes_model');
       $this->load->model('Soporte_model');
       $this->form_validation->set_message('required', '%s es obligatorio.');
       $this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function index()
   {
      $data  = array(
      'equipos' => $this->Equipos_model->get_equipos()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/Equipos/list', $data);
      $this->load->view('overall/footer2');
   }
   public function desincorporar()
   {
      $data  = array(
      'equipos' => $this->Equipos_model->get_equipos()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/Equipos/equipos', $data);
      $this->load->view('overall/footer2');
   }
   public function add_equipo()
   {
    if($this->session->userdata("rol")==3)
    {
      $data  = array(
      'marcas' => $this->Equipos_model->get_marca(),
      'usuarios' =>$this->Usuarios_model->getUsuarios(),
      'equipos'=>$this->Equipos_model->get_tipo_equip(),
      'dependencias' =>$this->Dependencias_model->get_dependencias(),
      'controlMar' => $this->Componentes_model->getMarc()

    );
     $this->load->view('overall/header2');
     $this->load->view('overall/menuAdmin');
     $this->load->view('admin/Equipos/add', $data);
     $this->load->view('overall/footer2');
    }
    elseif ($this->session->userdata("rol")==2)
     {
      redirect(base_url()."tech/equipos/add_equipo");
    }
    elseif ($this->session->userdata("rol")==1)
    {
     redirect(base_url()."user/equipos/add");
    }

   }

    public function store()
    {
    $codigo = $this->input->post("numero");
    $marca = $this->input->post("marca");
    $descripcion = $this->input->post("descripcion");
    $color = $this->input->post("color");
    $material = $this->input->post("material");
    $condicion = $this->input->post("condicion");
    $tipo = $this->input->post("tipox");
    $usuario = $this->input->post("usuario");
    $id = $codigo;

    $this->form_validation->set_rules("numero","Numero","required|is_unique[bienes.num_bien]");
    $this->form_validation->set_rules("marca","Marca","required");
    $this->form_validation->set_rules("descripcion","Descripcion","required");
    $this->form_validation->set_rules("material","Material","required");
    $this->form_validation->set_rules("condicion","Condicion","required");
    $this->form_validation->set_rules("tipox","Tipos","required");
    $this->form_validation->set_rules("color","Color","required");
    $this->form_validation->set_rules("usuario","Usuario","required");
    $this->form_validation->set_rules("condicion","Condicion","required");

    if ($this->form_validation->run()) {
      $data  = array(
        'num_bien' => $codigo,
        'cod_marca' => $marca,
        'descrip_bien' => $descripcion,
        'tipo_material_bien' => $material,
        'color_bien' => $color,
        'condicion_bien' => $condicion,
        'cod_tipo_equipo' => $tipo,
        'ci_usuario' => $usuario
      );

      if ($this->Equipos_model->save($data)) {
        $this->session->set_flashdata("success","El equipo se ha guardado satisfactoriamente");
        redirect(base_url()."admin/equipos/ver/".$id);
      }
      else{
        $this->session->set_flashdata("error","No se ha guardado la informacion");
        redirect(base_url()."admin/equipos/add_equipo");
      }
    }
    else{
      $this->add_equipo();
    }


  }
      public function edit_equipo($id)
   {
    if($this->session->userdata("rol")==3)
    {
      $data  = array(
      'dependencias' =>$this->Dependencias_model->get_dependencias(),
      'bienes' => $this->Equipos_model->getEquipo($id),
      'marcas' => $this->Equipos_model->get_marca(),
      'usuarios' =>$this->Usuarios_model->getUsuarios(),
      'equipos'=>$this->Equipos_model->get_tipo_equip(),
      'controlMar' => $this->Componentes_model->getMarc()

    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/Equipos/edit', $data);
      $this->load->view('overall/footer2');
    }
    elseif ($this->session->userdata("rol")==2) {
     $data  = array(
      'dependencias' =>$this->Dependencias_model->get_dependencias(),
      'bienes' => $this->Equipos_model->getEquipo($id),
      'marcas' => $this->Equipos_model->get_marca(),
      'usuarios' =>$this->Usuarios_model->getUsuarios(),
      'equipos'=>$this->Equipos_model->get_tipo_equip(),
      'controlMar' => $this->Componentes_model->getMarc()

    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('tecnico/Equipos/edit', $data);
      $this->load->view('overall/footer2');
   }
   elseif ($this->session->userdata("rol")==1) {
    $data  = array(
     'dependencias' =>$this->Dependencias_model->get_dependencias(),
     'bienes' => $this->Equipos_model->getEquipo($id),
     'marcas' => $this->Equipos_model->get_marca(),
     'usuarios' =>$this->Usuarios_model->getUsuarios(),
     'equipos'=>$this->Equipos_model->get_tipo_equip(),
     'controlMar' => $this->Componentes_model->getMarc()

   );
     $this->load->view('overall/header2');
     $this->load->view('overall/menuGeneral');
     $this->load->view('tecnico/Equipos/edit', $data);
     $this->load->view('overall/footer2');
  }
 }
   public function add_compo($id)
{

   $data  = array(
   'bienes' => $this->Equipos_model->get_equipo_by_id($id),
   'marcas' => $this->Equipos_model->get_marca(),
   'usuarios' =>$this->Usuarios_model->getUsuarios(),
   'equipos'=>$this->Equipos_model->get_tipo_equip()
 );
   $this->load->view('overall/header2');
   $this->load->view('overall/menuAdmin');
   $this->load->view('admin/componentes/add', $data);
   $this->load->view('overall/footer2');
}
public function update()
{
  $idequipo = $this->input->post("idequipo");
  $codigo = $this->input->post("numero");
  $marca = $this->input->post("marcas");
  $modelo = $this->input->post("modelo");
  $descripcion = $this->input->post("descripcion");
  $color = $this->input->post("color");
  $material = $this->input->post("material");
  $condicion = $this->input->post("condicion");
  $tipo = $this->input->post("tipox");

  $equipoActual = $this->Equipos_model->getEquipo($idequipo);

  if ($codigo == $equipoActual->num_bien) {
    $is_unique = '';
  }
  else{
    $is_unique = '|is_unique[bienes.num_bien]';
  }

  $this->form_validation->set_rules("numero","Numero del Bien","required".$is_unique);
  $this->form_validation->set_rules("marcas","Marca","required");
  $this->form_validation->set_rules("modelo","Modelo","required");
  $this->form_validation->set_rules("descripcion","Descripcion","required");
  $this->form_validation->set_rules("color","Color","required");
  $this->form_validation->set_rules("material","Material","required");
  $this->form_validation->set_rules("condicion","Condicion","required");
  $this->form_validation->set_rules("tipox","Tipo","required");


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
      redirect(base_url()."admin/equipos/ver/".$idequipo);
    }
    else{
      $this->session->set_flashdata("error"," No se pudo guardar la informacion");
      redirect(base_url()."admin/equipos/edit_equipo/".$idequipo);
    }
  }else{
    $this->edit_equipo($idequipo);
  }
}
  public function get_equipo_by()
  {
    $numero= $this->input->post('valorBusqueda');
    $ci = $this->session->userdata("id");
    $resultado = $this->Equipos_model->get_equipo_id($numero,$ci);

    echo json_encode($resultado);
  }
    public function get_equipo_id()
  {
    $numero= $this->input->post('valorBusqueda');
    $resultado = $this->Equipos_model->get_equipo_by_id($numero);

    echo json_encode($resultado);
  }
    public function delete($id){
    $data  = array(
      'estado' => "0",
    );
    $this->Equipos_model->update($id,$data);
    $this->session->set_flashdata("success","Se elimino satisfactoriamente");
    echo "admin/Equipos/desincorporar";
  }

  public function ver($id)
  {
    if ($this->session->userdata("rol")==3) {
      $data  = array(
      'componentes' => $this->Componentes_model->get_Componente($id),
      'equipo' => $this->Equipos_model->getEquipo($id),
      'marcas' => $this->Equipos_model->get_marca()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/Equipos/ver', $data);
      $this->load->view('overall/footer2');
    }
    elseif ($this->session->userdata("rol")==2) {
      $data  = array(
      'componentes' => $this->Componentes_model->get_Componente($id),
      'equipo' => $this->Equipos_model->getEquipo($id),
      'marcas' => $this->Equipos_model->get_marca()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/Equipos/ver', $data);
      $this->load->view('overall/footer2');
    }
    elseif ($this->session->userdata("rol")==1) {
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
  public function get_marcas()
  {
   $resultado = $this->Equipos_model->get_marca();
    echo json_encode($resultado);
  }
  public function save_marca()
  {
    $data = array(
        //'id'(como esta en la db) => $this->input->post('id')(como se pasa por el form)
          'cod_marca' => $this->input->post('codigo'),
          'marca' => $this->input->post('marca')
        );

    $resultado = $this->Equipos_model->save_marcas($data);
    $this->updateControl_Marcas();
    echo json_encode($resultado);

  }
  protected function updateControl_Marcas(){
    $controlActual = $this->Componentes_model->getMarc();
    $data  = array(
      'marca' => $controlActual->marca + 1
    );
    $this->Soporte_model->updateControl($data);
  }

 }
