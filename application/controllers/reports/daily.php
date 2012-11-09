<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daily extends CI_Controller {
        
        public function __construct(){
                parent::__construct();
                $this->load->model('Api');    
        }                
        
        public function view($project='', $report='') {
                if( ($project == '' || !is_numeric($project)) || ($report=='' || !is_numeric($report))){
                        redirect('/');
                } else{                                 
                        $data = array();                                
                        //Selecciono los elementos del stock transfers
                        $data['project'] = $project;
                        $data['report'] = $report;
                        $this->load->view('reports/daily_pdf', $data);
                }
        }
}
