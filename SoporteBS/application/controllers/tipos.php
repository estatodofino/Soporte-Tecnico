<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Tipos extends CI_Controller {
 
	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('equipos_model');

	 	}
 	/*public function tipos_add()
		{
			$data = array(
				//'id'(como esta en la db) => $this->input->post('id')(como se pasa por el form)
					'id' => $this->input->post('id'),
					'nombre' => $this->input->post('nombre')
				);
			$insert = $this->tipos_model->tipos_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id)
		{
			$data = $this->tipos_model->get_by_id($id);
 
  
 
			echo json_encode($data);
		}
 
		public function tipos_update()
	{
		$data = array(
				'id' => $this->input->post('id'),
				'nombre' => $this->input->post('nombre')
			);
		$this->tipos_model->tipos_update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
 
	
	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->tipos_model->update($id,$data);
		/*echo "vehiculo/";*/
	}*/
 	
 
 	public function get_all_tipos(){
		$resultado = $this->equipos_model->get_tipo_equip();

		echo json_encode($resultado);
	}
 
 
}