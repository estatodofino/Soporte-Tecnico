<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
		redirect(base_url());
		}
		$this->load->model("Usuarios_model");
		$this->load->model("Dependencias_model");
		$this->form_validation->set_message('required', '%s es obligatorio.');
		$this->form_validation->set_message('numeric', '%s debe ser numérico.');
	}

	public function index(){
		$data  = array(
			'usuarios' => $this->Usuarios_model->getUsuarios()
		);
		$this->load->view("overall/header2");
		$this->load->view("overall/menuAdmin");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("overall/footer2");
	}
 public function dependencia()
 {
	 $data  = array(
 		'dependencias' => $this->Dependencias_model->get_all_dependencias()
 	);
 	$this->load->view("overall/header2");
 	$this->load->view("overall/menuAdmin");
 	$this->load->view("admin/usuarios/dependencia",$data);
 	$this->load->view("overall/footer2");
 }
	public function add(){
		$data  = array(
			'roles' => $this->Usuarios_model->getRoles(),
		);
		$this->load->view("layouts/header2");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add",$data);
		$this->load->view("layouts/footer2");
	}

	public function store(){

		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$telefono = $this->input->post("telefono");
		$email = $this->input->post("email");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$rol = $this->input->post("rol");

		$data  = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'email' => $email,
			'username' => $username,
			'password' => sha1($password),
			'rol_id' => $rol,
			'estado' => "1"
		);

		if ($this->Usuarios_model->save($data)) {
			redirect(base_url()."administrador/usuarios");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."administrador/usuarios/add");
		}


	}

	public function view(){
		$idusuario = $this->input->post("idusuario");
		$data = array(
			"usuario" => $this->Usuarios_model->getUsuario($idusuario)
		);
		$this->load->view("admin/usuarios/view",$data);
	}

	public function actualizar()
	{
		$id = $this->session->userdata("id");
		$data  = array(
			'usuario' => $this->Usuarios_model->getUsuario($id)
		);
		 $this->load->view('overall/header2');
		 $this->load->view('overall/menuAdmin');
		 $this->load->view('admin/seguridad/actualizar',$data);
		 $this->load->view('overall/footer2');
	}

	public function update(){
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
        redirect(base_url()."admin/usuarios/actualizar/".$idusuario);
      }
    }else {
      $this->actualizar();
    }

	}

	public function delete($id){
	$data  = array(
		'estado' => "0",
	);
	$this->Usuarios_model->update($id,$data);
	$this->session->set_flashdata("success","Se elimino satisfactoriamente");
	echo "admin/Seguridad/Usuarios/";
}

	public function ver_dependencias($id)
	{
		 $data = array(
				'usuarios' =>$this->Usuarios_model->get_usuarios_by_dependencia($id)
					);
		 $this->load->view('overall/header2');
		 $this->load->view('overall/menuAdmin');
		 $this->load->view('admin/reportes/user/list_dependencia', $data);
		 $this->load->view('overall/footer2');
	}
	public function getAjaxUser()
	{
		$s = $this->input->get("dependencia");
		$resultado = $this->Usuarios_model->get_usuarios_by_dependencia($s);

		echo json_encode($resultado);
	}

}
