<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Backend_model");
		$this->load->model("Informes_model");
		$this->load->model("Usuarios_model");
		$this->load->model("Dependencias_model");
		$this->load->model("Ordenes_model");
		$this->load->model("Soporte_model");
	  $this->form_validation->set_message('required', '%s es obligatorio.');
	  $this->form_validation->set_message('numeric', '%s debe ser numérico.');
	}

	    /**
    * @desc - genera un token para cada usuario registrado
    * @return token
    */
    private function token()
    {
        return sha1(uniqid(rand(),true));
    }

	public function index()
	{
		$data = array(
			"cantOrdenes" => $this->Backend_model->rowCount("orden"),
			"cantUsuarios" => $this->Backend_model->rowCount("usuario"),
			"cantBienes" => $this->Backend_model->rowCount("bienes"),
			"cantInformes" => $this->Backend_model->rowCount("informe_tecnico"),
			"mensajes" => $this->Backend_model->get_mensajes(),
			'ordenes' =>$this->Soporte_model->getOrdenes(),
			'years' => $this->Informes_model->years()
		);
		if ($this->session->userdata("login"))
		{
				if ($this->session->userdata("rol")==3) {
						$this->load->view('overall/header2');
            $this->load->view('overall/menuAdmin',$data);
            $this->load->view('overall/panel');
						$this->load->view('overall/footer2');
					}
			 	elseif ($this->session->userdata("rol")==2) {
						$this->load->view('overall/header2');
            $this->load->view('overall/menuTecnico');
            $this->load->view('welcome_message');
						$this->load->view('overall/footer2');
					}
				elseif ($this->session->userdata("rol")==1) {
						$this->load->view('overall/header2');
            $this->load->view('overall/menuGeneral');
            $this->load->view('welcome_message');
						$this->load->view('overall/footer2');
				}
		} 
		else{
			$this->load->view('overall/header2');
            $this->load->view('overall/aside');
            $this->load->view('welcome_message');
			$this->load->view('overall/footer2');
		}
	}

	public function clavecambi()
	{
			$this->load->view('overall/header2');
            $this->load->view('welcome_message');
			$this->load->view('overall/footer2');
	}

	public function login()
	{
			if(!empty($_POST['cedula']) and !empty($_POST['password'])) {
		 	$cedula = $this->input->post("cedula");
			$password = $this->input->post("password");
			$res = $this->Usuarios_model->login($cedula, $password);

			if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url());
			}
			else{//apertura else
				$data  = array(
					'id' => $res->ci_usuario,
					'nombre' => $res->nom_usuario,
					'apellido' => $res->ape_usuario,
					'rol' => $res->cod_tipo_usuario,
					'login' => TRUE
				);
				$this->session->set_userdata($data);
				if ($this->session->userdata("rol")==3) {
				redirect(base_url()."welcome/");
			} elseif ($this->session->userdata("rol")==2) {
				redirect(base_url()."welcome/");
			} elseif ($this->session->userdata("rol")==1) {
				redirect(base_url()."welcome/");
			}

			}//cierre del else

		 }
		 else{
		 	$this->session->set_flashdata("error","Todos los campos deben estar llenos");
			redirect(base_url());
		 }
	}

	public function registrate(){
		$data = array('dependencias' =>$this->Dependencias_model->get_all_dependencias() );
		$this->load->view('overall/header2');
		$this->load->view('overall/registrate',$data);
		$this->load->view('welcome_message');
		$this->load->view('overall/footer2');
	}

	public function registrar(){
	$nombres = $this->input->post("nombres");
	$apellidos = $this->input->post("apellidos");
	$cedula = $this->input->post("cedula");
	$dependencia = $this->input->post("dependencia");
	$correo = $this->input->post("correo");
	$cargo = $this->input->post("cargo");
	$password = $this->input->post("password");
	$password2 = $this->input->post("password2");
	$tipo = 1;


	$this->form_validation->set_rules("nombres","Nombres","required");
	$this->form_validation->set_rules("apellidos","Apellidos","required");
	$this->form_validation->set_rules("cedula","Cedula","required|is_unique[usuario.ci_usuario]");
	$this->form_validation->set_rules("dependencia","Dependencia","required");
	$this->form_validation->set_rules("correo","Correo","required");
	$this->form_validation->set_rules("cargo","Cargo","required");
	$this->form_validation->set_rules("password","Contraseña","required");
	$this->form_validation->set_rules("password2","Confirmacion","required");

	if ($this->form_validation->run()) {
		 if ($password==$password2) {
			 $data  = array(
				 'ci_usuario' => $cedula,
				 'nom_usuario' => $nombres,
				 'ape_usuario' => $apellidos,
				 'cargo' => $cargo,
				 'correo_usuario' => $correo,
				 'cod_dependencia' => $dependencia,
				 'cod_tipo_usuario' => $tipo,
				 'password' => $password,
				 'token'=>$this->token()
			 );

	 if ($this->Usuarios_model->save($data)) {
		 $this->session->set_flashdata("success","Se ha guardado la informacion ahora ya puedes ingresar");
		 redirect(base_url()."Welcome/");
	 	}
		 else{
			 $this->session->set_flashdata("error","No se ha guardado la informacion");
			 redirect(base_url()."Welcome/registrate");
		 }
		}else {
			$this->session->set_flashdata("error","Las conttraseñas deben coincidir");
			redirect(base_url()."Welcome/registrate");
		}
	}
	else{
		$this->registrate();
	}
 }
 	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function contactar()
	{
		$this->load->view('overall/limpieza/header');
    $this->load->view('overall/aside');
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
			redirect(base_url()."welcome/contactar/");
		}
	}
	else{
		$this->contactar();
	}
 }
 public function getData(){
	 $year = $this->input->post("year");
	 $resultados = $this->Ordenes_model->cantidad($year);
	 echo json_encode($resultados);
 }
}
