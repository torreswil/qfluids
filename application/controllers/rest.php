<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Api');
	}

	public function index(){
		redirect('/main/login');
	}

	public function listar_brocas(){
		echo json_encode($this->Api->get('brocas'));
	}
	public function listar_diametros_broca(){
		echo json_encode($this->Api->get_distinct_where('brocas_modelos','odddeci, odfracc, unit_oddfracc',$_POST));
	}
	public function listar_modelos_broca(){
		echo json_encode($this->Api->get_where('brocas_modelos',$_POST));
	}
	public function insertar_broca(){
		echo json_encode($this->Api->create('brocas_modelos',$_POST));
	}
}