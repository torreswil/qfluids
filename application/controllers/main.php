<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		$this->load->view('qmax_index');
	}

	public function styles(){
		$this->load->view('styles');	
	}

}