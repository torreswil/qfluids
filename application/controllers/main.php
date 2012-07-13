<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		redirect('/main/login');
	}

	public function login(){
		$data['main_content'] = 'login';
		$this->load->view('partials/basic',$data);
	}

	public function qfluids(){
		$this->load->model('Api');
		$data['lista_brocas'] 			= $this->Api->get('brocas');
		$data['lista_bombas'] 			= $this->Api->get_distinct_where('bombas','maker');
		$data['main_content'] 			= 'qfluids';
		$this->load->view('partials/basic',$data);	
	}

	public function styles(){
		$this->load->view('styles');	
	}
}