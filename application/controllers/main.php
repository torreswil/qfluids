<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
    	parent::__construct();
        $this->load->model('Api');    
    }

	public function index(){
		redirect('/main/login');
	}

	public function login(){
		$data['main_content'] = 'login';
		$this->load->view('partials/basic',$data);
	}

	public function projects(){
		if(isset($_POST['method']) && $_POST['method'] == 'new_project'){
			unset($_POST['method']);
			$_POST['creation_timestamp'] 	= date('Y-m-d H:i:s');
			$_POST['last_modified'] 		= date('Y-m-d H:i:s');;
			$id 							= $this->Api->create('projects',$_POST);
			echo json_encode($id);
		}else{
			$data['main_content'] 	= 'projects';
			$data['projects']		= $this->Api->get('projects',array('last_modified','desc'));
			$this->load->view('partials/basic',$data);
		}
	}

	public function qfluids($project_id = ''){
		if($project_id == '' || !is_numeric($project_id)){
			redirect('/');
		}else{
			if(count($this->Api->get_where('projects',array('id'=>$project_id))) == 1){
				//INICIALIZACION DE LA SESION
				$project_data 						= $this->Api->get_where('projects',array('id'=>$project_id));
				$project_data						= $project_data[0];
				
				$this->session->set_userdata(array('project' => $project_data));

				$project_data['last_report'] 		= count($this->Api->get_where('reports',array('project_transactional_id'=>$project_data['transactional_id'])));
				
				if($project_data['last_report'] > 0){
					$project_data['last_report_meta'] 	= $this->Api->get_where('reports',array('project_transactional_id'=>$project_data['transactional_id']));
					$project_data['last_report_meta'] 	= $project_data['last_report_meta'][$project_data['last_report'] - 1];	
				}
				

				//CATALOGOS DE HERRAMIENTAS
				$data['lista_casing']			= $this->Api->get_distinct_where('casing','oddeci,odfrac');
				$data['lista_lodos']			= $this->Api->get('lodos');
				$data['lista_brocas'] 			= $this->Api->get('brocas');
				$data['lista_bombas'] 			= $this->Api->get_distinct_where('bombas','maker');
				
				//CONFIGURACION DEL PROYECTO
				$data['shakers']				= $this->Api->get_where('project_shakers',array('active'=>1,'project'=>$project_data['id']));
				$data['enginers']				= $this->Api->get_where('enginers',array('project'=>$project_data['id'],'active'=>1));

				//PERSONAL
				$data['costoing_acumulado']		= 0;
				$turnos_facturables				= $this->Api->get_where('reports_enginers',array('project'=>$project_data['id'],'cover'=>1));
				foreach ($turnos_facturables as $turno) {
					$ingeniero 					= $this->Api->get_where('enginers',array('id'=>$turno['enginer']));
					$data['costoing_acumulado'] = $data['costoing_acumulado'] + $ingeniero[0]['rate'];
				}

				//DATOS BASE
				$data['main_content'] 			= 'qfluids';
				$data['project']				= $project_data;

				$this->load->view('partials/basic',$data);
			}else{
				redirect('/');
			}
		}	
	}

	public function enginer($id){
		if($id == '' || !is_numeric($id)){
			redirect('/');
		}else{
			$data 								= array();
			$data['enginer'] 					= $this->Api->get_where('enginers',array('id'=>$id));
			$data['enginer']					= $data['enginer'][0];
			$data['periods']					= $this->Api->get_where('reports_enginers',array('enginer'=>$id));
			$data['main_content'] 				= 'enginer_report';
			$this->load->view('partials/basic',$data);
		}
	}

	public function styles(){
		$this->load->view('styles');	
	}
}