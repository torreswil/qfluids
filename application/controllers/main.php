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
		$data['main_content'] = 'qfluid';
		$this->load->view('partials/basic',$data);	
	}

	public function styles(){
		$this->load->view('styles');	
	}
}