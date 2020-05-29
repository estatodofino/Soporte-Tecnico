<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
		$this->load->model("Dependencias_model");
	}
	
	public function index(){
		if ($this->session->userdata("rol")==3) {
	  $data  = array(
			'usuarios' => $this->Usuarios_model->getUsuarios()
		);
		$this->load->view("overall/header2");
		$this->load->view("overall/menuAdmin");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("overall/footer2");
	}elseif ($this->session->userdata("rol")==2) {
	  $data  = array(
			'usuarios' => $this->Usuarios_model->getUsuarios()
		);
		$this->load->view("overall/header2");
		$this->load->view("overall/menuTecnico");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("overall/footer2");
	}
		
	}
 public function dependencia()
 {
 	if ($this->session->userdata("rol")==3) {
	 $data  = array(
 		'dependencias' => $this->Dependencias_model->get_all_dependencias()
 	);
 	$this->load->view("overall/header2");
 	$this->load->view("overall/menuAdmin");
 	$this->load->view("admin/usuarios/dependencia",$data);
 	$this->load->view("overall/footer2");
	}elseif ($this->session->userdata("rol")==2) {
	 $data  = array(
 		'dependencias' => $this->Dependencias_model->get_all_dependencias()
 	);
 	$this->load->view("overall/header2");
 	$this->load->view("overall/menuTecnico");
 	$this->load->view("admin/usuarios/dependencia",$data);
 	$this->load->view("overall/footer2");
	}
	 
 }
	public function add(){
		if ($this->session->userdata("rol")==3) {
	  $data  = array(
			'roles' => $this->Usuarios_model->getRoles(),
		);
		$this->load->view("layouts/header2");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add",$data);
		$this->load->view("layouts/footer2");
	}elseif ($this->session->userdata("rol")==2) {
	  $data  = array(
			'roles' => $this->Usuarios_model->getRoles(),
		);
		$this->load->view("layouts/header2");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add",$data);
		$this->load->view("layouts/footer2");
	}
		
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

	public function edit($id){
		if ($this->session->userdata("rol")==3) {
	  $data  = array(
			'roles' => $this->Usuarios_model->getRoles(),
			'usuario' => $this->Usuarios_model->getUsuario($id)
		);
		$this->load->view("layouts/header2");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/edit",$data);
		$this->load->view("layouts/footer2");
	}elseif ($this->session->userdata("rol")==2) {
	  $data  = array(
			'roles' => $this->Usuarios_model->getRoles(),
			'usuario' => $this->Usuarios_model->getUsuario($id)
		);
		$this->load->view("layouts/header2");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/edit",$data);
		$this->load->view("layouts/footer2");
	}
		
	}

	public function update(){
		$idusuario = $this->input->post("idusuario");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$telefono = $this->input->post("telefono");
		$email = $this->input->post("email");
		$username = $this->input->post("username");

		$rol = $this->input->post("rol");

		$data  = array(
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'telefono' => $telefono,
			'email' => $email,
			'username' => $username,

			'rol_id' => $rol,
		);

		if ($this->Usuarios_model->update($idusuario,$data)) {
			redirect(base_url()."administrador/usuarios");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."administrador/usuarios/edit/".$idusuario);
		}
	}
	public function ver_dependencia($id)
	{
		if ($this->session->userdata("rol")==3) {
	  $data = array(
		'usuarios' =>$this->Usuarios_model->get_usuarios_by_dependencia($id),
     'dependencia'=> $this->Dependencias_model->get_dependencia($id)
					);
		 $this->load->view('overall/header2');
		 $this->load->view('overall/menuAdmin');
		 $this->load->view('admin/reportes/user/list_dependencia', $data);
		 $this->load->view('overall/footer2');
	}elseif ($this->session->userdata("rol")==2) {
	  $data = array(
		'usuarios' =>$this->Usuarios_model->get_usuarios_by_dependencia($id),
     'dependencia'=> $this->Dependencias_model->get_dependencia($id)
					);
		 $this->load->view('overall/header2');
		 $this->load->view('overall/menuTecnico');
		 $this->load->view('admin/reportes/user/list_dependencia', $data);
		 $this->load->view('overall/footer2');
	}
		
	}
	public function delete($id){
		$data  = array(
			'estado' => "0",
		);
		$this->Usuarios_model->update($id,$data);
		echo "reportes/usuarios/";
	}
	public function listas()
	{
		if ($this->session->userdata("rol")==3) {
		$data  = array(
       'usuarios' => $this->Usuarios_model->getUsuarios()
     );
		$this->load->view('overall/header2');
		 $this->load->view('overall/menuAdmin');
		 $this->load->view('tecnico/reportes/user/list', $data);
		 $this->load->view('overall/footer2');
		}elseif ($this->session->userdata("rol")==2)
		 {
		$data  = array(
       'usuarios' => $this->Usuarios_model->getUsuarios()
     	);
		$this->load->view('overall/header2');
		 $this->load->view('overall/menuTecnico');
		 $this->load->view('tecnico/reportes/user/list', $data);
		 $this->load->view('overall/footer2');
		}
		
	}
	public function dependencias()
	{
		if ($this->session->userdata("rol")==3) {
			$data = array(
         'dependencias' => $this->Dependencias_model->get_all_dependencias()
          );
		$this->load->view('overall/header2');
		 $this->load->view('overall/menuAdmin');
		 $this->load->view('tecnico/reportes/user/list_dependencia', $data);
		 $this->load->view('overall/footer2');
		}elseif ($this->session->userdata("rol")==2) {
			$data = array(
         'dependencias' => $this->Dependencias_model->get_all_dependencias()
          );
		$this->load->view('overall/header2');
		 $this->load->view('overall/menuTecnico');
		 $this->load->view('tecnico/reportes/user/list_dependencia', $data);
		 $this->load->view('overall/footer2');
		}
		

	}
}
