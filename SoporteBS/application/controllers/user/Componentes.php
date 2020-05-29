<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class Componentes extends CI_Controller {
   public function __construct() {
      parent::__construct();
       $this->load->model('Componentes_model');
       $this->load->model('Equipos_model');
       $this->load->model('Soporte_model');
       $this->form_validation->set_message('required', '%s es obligatorio.');
       $this->form_validation->set_message('numeric', '%s debe ser numérico.');
   }
   public function index()
   {
    if ($this->session->userdata("rol")==3)
    {
      $data  = array(
      'componentes' => $this->Componentes_model->get_all_componentes()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/componentes/list', $data);
      $this->load->view('overall/footer2');
    }elseif ($this->session->userdata("rol")==2)
    {
      $data  = array(
      'componentes' => $this->Componentes_model->get_all_componentes()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/componentes/list', $data);
      $this->load->view('overall/footer2');
    }

   }
      public function add($id)
   {
     if ($this->session->userdata("rol")==3)
     {
      $data  = array(
      'tipcom'=> $this->Componentes_model->get_tipo_componente(),
      'equipo' => $this->Equipos_model->getEquipo($id),
      'marcas' => $this->Equipos_model->get_marca(),
      'control' => $this->Componentes_model->getSec(),
      'controlMar' => $this->Componentes_model->getMarc()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/componentes/add', $data);
      $this->load->view('overall/footer2');
    }
    elseif ($this->session->userdata("rol")==2)
     {
      $data  = array(
      'tipcom'=> $this->Componentes_model->get_tipo_componente(),
      'equipo' => $this->Equipos_model->getEquipo($id),
      'marcas' => $this->Equipos_model->get_marca(),
      'control' => $this->Componentes_model->getSec(),
      'controlMar' => $this->Componentes_model->getMarc()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/componentes/add', $data);
      $this->load->view('overall/footer2');
    }

   }
         public function editar($id)
   {
     if ($this->session->userdata("rol")==3)
     {
      $data  = array(
      'componente'=> $this->Componentes_model->get_componente_by_serial($id),
      'tipcom'=> $this->Componentes_model->get_tipo_componente(),
      'marcas' => $this->Equipos_model->get_marca(),
      'control' => $this->Componentes_model->getSec(),
      'controlMar' => $this->Componentes_model->getMarc()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/componentes/editar', $data);
      $this->load->view('overall/footer2');
    }
    elseif ($this->session->userdata("rol")==2)
     {
      $data  = array(
      'componente'=> $this->Componentes_model->get_componente_by_serial($id),
      'tipcom'=> $this->Componentes_model->get_tipo_componente(),
      'marcas' => $this->Equipos_model->get_marca(),
      'control' => $this->Componentes_model->getSec(),
      'controlMar' => $this->Componentes_model->getMarc()
    );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/componentes/editar', $data);
      $this->load->view('overall/footer2');
    }

   }
   public function store()
   {
    $codigo_equipo = $this->input->post("numero");//numero del bien
    $tipo = $this->input->post("tipoe"); //codigo tipo de equipo
    $codigo = $this->input->post("nombreCompo");//nombre del componente

    $serial = $this->input->post("sereal");//serial del componente
    $capacidad = $this->input->post("capacidad");
    $descripcion = $this->input->post("descripcion");
    $condicion = $this->input->post("estatus");
    $observacion = $this->input->post("observacion");
    $marca = $this->input->post("marca");
    $modelo = $this->input->post("modelo");
    $cod_componente = $this->input->post("tipoco");//tipo de componente




    $this->form_validation->set_rules("sereal","Serial","required|is_unique[partes_componentes.serial_compo]");
    $this->form_validation->set_rules("marca","Marca","required");
    $this->form_validation->set_rules("modelo","Modelo","required");
    $this->form_validation->set_rules("descripcion","Descripcion","required");
    $this->form_validation->set_rules("estatus","Condicion","required");
    $this->form_validation->set_rules("capacidad","Capacidad","required");
    $this->form_validation->set_rules("observacion","Observacion","required");

    if ($this->form_validation->run()) {
      $data  = array(
        'cod_componente' => $codigo,
        'serial_compo' => $serial,
        'capacidad' => $capacidad,
        'descrip_compo' => $descripcion,
        'estatus_compo' => $condicion,
        'obser_compo' => $observacion,
        'cod_marca' => $marca,
        'modelo' => $modelo

      );

      if ($this->Componentes_model->save_partes($data)) {
          $this->save_compo_equipo($codigo_equipo,$serial,$tipo);
          $this->save_tipo_compo($codigo,$tipo);
          $this->session->set_flashdata("success","Se ha guardado la informacion");
        redirect(base_url()."admin/Equipos/ver/".$codigo_equipo);
      }
      else{
        $this->session->set_flashdata("error","No se ha guardado la informacion");
        redirect(base_url()."admin/Componente/add".$codigo_equipo);
      }
    }
    else{
      $this->add($codigo_equipo);
    }


   }
 public function update()
 {
    $codigo = $this->input->post("nombreCompo");//nombre del componente
    $serial = $this->input->post("serialise");//serial del componente
    $capacidad = $this->input->post("capacidad");
    $descripcion = $this->input->post("descripcion");
    $condicion = $this->input->post("estatus");
    $observacion = $this->input->post("observacion");
    $marca = $this->input->post("marca");
    $modelo = $this->input->post("modelo");
    $cod_componente = $this->input->post("tipoco");//tipo de componente
    $this->form_validation->set_rules("serialise","required");
    $this->form_validation->set_rules("marca","Marca","required");
    $this->form_validation->set_rules("modelo","Modelo","required");
    $this->form_validation->set_rules("descripcion","Descripcion","required");
    $this->form_validation->set_rules("estatus","Condicion","required");
    $this->form_validation->set_rules("capacidad","Capacidad","required");
    $this->form_validation->set_rules("observacion","Observacion","required");

    if ($this->form_validation->run()) {
     $data  = array(
        'cod_componente' => $codigo,
        'capacidad' => $capacidad,
        'descrip_compo' => $descripcion,
        'estatus_compo' => $condicion,
        'obser_compo' => $observacion,
        'cod_marca' => $marca,
        'modelo' => $modelo
      );
     if ($this->Componentes_model->updateCompo($serial,$data)) {
      $this->session->set_flashdata("success","Se ha guardado la informacion");
        redirect(base_url()."admin/componentes/ver/".$serial);
      }
      else{
       $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."admin/Componentes/editar".$serial);
      }
    }else{
      $this->editar($serial);
    }

 }
    public function ver($id)
   {
    if ($this->session->userdata("rol")==3)
     {
        $data = array(
      'componente' =>$this->Componentes_model->get_componente_by_serial($id)
       );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuAdmin');
      $this->load->view('admin/componentes/ver',$data);
      $this->load->view('overall/footer2');
      }
      elseif ($this->session->userdata("rol")==2)
       {
        $data = array(
      'componente' =>$this->Componentes_model->get_componente_by_serial($id)
       );
      $this->load->view('overall/header2');
      $this->load->view('overall/menuTecnico');
      $this->load->view('admin/componentes/ver',$data);
      $this->load->view('overall/footer2');
    }

   }
   public function get_all_componentes()
   {
     $resultado = $this->Componentes_model->get_all_componentes();
    echo json_encode($resultado);
   }
   public function add_tipo()
  {
    $data = array(
          'cod_tipo' => $this->input->post('tipico'),
          'nom_tipo' => $this->input->post('tipico')
        );

    $resultado = $this->Componentes_model->save_tipos($data);

    echo json_encode($resultado);
  }
  public function getAjaxComponentes()
  {
    $s = $this->input->get("tipo");
    $resultado = $this->Componentes_model->get_componente_by_tipo($s);

    echo json_encode($resultado);
  }
  public function add_componente()
  {
    $data = array(
          'cod_componente' => $this->input->post('codigo'),
          'nom_componente' => $this->input->post('nombre'),
          'tipo_componente'=> $this->input->post('tipo')
        );

    $resultado = $this->Componentes_model->save_componentes($data);
    $this->updateControl();
    echo json_encode($resultado);
  }
  protected function updateControl(){
    $controlActual = $this->Componentes_model->getSec();
    $data  = array(
      'componente' => $controlActual->componente + 1
    );
    $this->Soporte_model->updateControl($data);
  }
  protected function save_compo_equipo($codigo_equipo,$serial,$tipo)
   {
    $data = array(
      'num_bien' =>$codigo_equipo ,
      'serial_componente' =>$serial,
      'tipo_equipo'=>$tipo );
    $this->Componentes_model->save_compo_equipos($data);
   }

   protected function save_tipo_compo($codigo,$tipo)
   {
    $data = array(
      'cod_componente' =>$codigo,
      'cod_tipo_equipo'=>$tipo );
    $this->Componentes_model->save_tipo_compos($data);
   }
 }
