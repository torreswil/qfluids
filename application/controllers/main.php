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
		$system_config = $this->Api->get('config');
		foreach ($system_config as $config) {
			if($config['key'] == 'global_id'){
				$global_id = $config['value'];
			}
		}
		$this->session->set_userdata('global_id', $global_id);
	}

	public function projects(){
		if(isset($_POST['method']) && $_POST['method'] == 'new_project'){
			unset($_POST['method']);
			$_POST['creation_timestamp'] 	= date('Y-m-d H:i:s');
			$_POST['last_modified'] 		= date('Y-m-d H:i:s');;
			$id = $this->Api->create('projects',$_POST);
			echo json_encode($id);
		}else{
			$data['main_content'] 	= 'projects';
			$data['global_id']		= $this->session->userdata('global_id');
			$data['projects']		= $this->Api->get('projects',array('last_modified','desc'));
			$this->load->view('partials/basic',$data);
		}
	}

	public function qfluids(){
		$this->load->model('Api');
		$data['lista_casing']			= $this->Api->get_distinct_where('casing','oddeci,odfrac');
		$data['lista_lodos']			= $this->Api->get('lodos');
		$data['lista_brocas'] 			= $this->Api->get('brocas');
		$data['lista_bombas'] 			= $this->Api->get_distinct_where('bombas','maker');
		$data['main_content'] 			= 'qfluids';
		$this->load->view('partials/basic',$data);	
	}

	public function styles(){
		$this->load->view('styles');	
	}
}