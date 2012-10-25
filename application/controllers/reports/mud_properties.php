<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mud_properties extends CI_Controller {
        
	public function __construct(){
                parent::__construct();
                $this->load->model('Api');    
        }
        
        public function project($project_id='', $format='xls') {
                if($project_id == '' || !is_numeric($project_id)){
                        redirect('/');
                } else{                        
                        if(count($this->Api->get_where('projects',array('id'=>$project_id))) == 1) {                                
                                //INICIALIZACION DE LA SESION
				$project_data 					= $this->Api->get_where('projects',array('id'=>$project_id));
				$project_data					= $project_data[0];
                                //Verifico que pruebas va a imprimir
                                $options = $this->input->get('items', true);
                                if(!empty($options)) {
                                        $options = explode(',', $options);
                                }                                
                                //Selecciono los reportes que tiene el proyecto
                                $data['reports'] = $this->Api->get_where('reports', array("project"=>$project_id, "phase >"=>0));                                        
                                $data['options'] = $options;
                                $data['main_content'] = 'report_'.$format;                                    
                                $this->load->view('reports/mud_properties_'.$format, $data);
                        } else{
				redirect('/');
                        }                         
                }
        }	                      
}
