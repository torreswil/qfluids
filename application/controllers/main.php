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
			$_POST['last_modified'] 		= date('Y-m-d H:i:s');
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
				$current_report 					= $this->Api->get_where('reports',array('project'=>$project_id),array('id','desc'));
				$current_report 					= $current_report[0]['id'];
				$current_report_data				= $this->Api->get_where('reports',array('id'=>$current_report));
				$current_report_data 				= $current_report_data[0];
				$this->session->set_userdata(array('project' => $project_data,'report'=>$current_report_data));

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
				$data['mudcleaner']				= $this->Api->get_where('project_mudcleaner',array('active'=>1,'project'=>$project_data['id']));
				if(count($data['mudcleaner']) > 0){$data['mudcleaner'] = $data['mudcleaner'][0];}
				$data['centrifugues'] 			= $this->Api->get_where('project_centrifugues',array('active'=>1,'project'=>$project_data['id']));
				
				//PERSONAL
				$data['enginers']				= $this->Api->get_where('vista_personal',array('project'=>$project_data['id'],'active'=>1,'type'=>'enginer'),array('id','asc'));
				$data['operators']				= $this->Api->get_where('vista_personal',array('project'=>$project_data['id'],'active'=>1,'type'=>'operator'),array('id','desc'));
				$data['yardworkers']			= $this->Api->get_where('vista_personal',array('project'=>$project_data['id'],'active'=>1,'type'=>'yard_worker'),array('id','desc'));
				$data['engineering_categories'] = $this->Api->get_where('personal_categories',array('type'=>'enginer'));
				$data['operator_categories'] 	= $this->Api->get_where('personal_categories',array('type'=>'operator')); 
				$data['yardworker_categories'] 	= $this->Api->get_where('personal_categories',array('type'=>'yard_worker')); 

				//TANQUES
				$data['tank_names_active']		= $this->Api->get_where('tank_names',array('type'=>'active'));
				$data['tank_names_reserve']		= $this->Api->get_where('tank_names',array('type'=>'reserve'));
				$data['tank_types']				= $this->Api->get('tanks_types');
				$data['active_tanks'] 			= $this->Api->get_where('vista_tanks',array('project'=>$project_data['id'],'tank_category'=>'active','active'=>1),array('order','asc'));
				$data['reserve_tanks'] 			= $this->Api->get_where('vista_tanks',array('project'=>$project_data['id'],'tank_category'=>'reserve','active'=>1),array('order','asc'));
				$data['pill_tanks'] 			= $this->Api->get_where('vista_tanks',array('project'=>$project_data['id'],'tank_category'=>'pill','active'=>1),array('order','asc'));
				$data['trip_tanks'] 			= $this->Api->get_where('vista_tanks',array('project'=>$project_data['id'],'tank_category'=>'trip','active'=>1),array('order','asc'));
				
				//INVENTARIO Y MATERIALES
				$data['all_materials']			= $this->Api->get_where('vista_materiales',array('project'=>$project_data['id']),array('commercial_name','asc'));
				$data['all_equipement'] 		= $this->Api->get_where('vista_equipos',array('project'=>$project_data['id']),array('product_name','asc'));
				$data['materials']				= $this->Api->get_where('vista_inventario',array('project'=>$project_data['id'],'used_in_project'=>1),array('commercial_name','asc'));

				//DATOS BASE
				$data['main_content'] 			= 'qfluids';
				$data['project']				= $project_data;
                                
                //RIG
                $rig                                    = $this->Api->get_where('rig', array('project_id'=>$project_data['id']));
                $data['rig']                            = (!empty($rig[0]['id'])) ? $rig[0] : null;
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
                        $data                   = array();
			$data['enginer']        = $this->Api->get_where('personal',array('id'=>$id));
			$data['enginer']        = $data['enginer'][0];
			$data['periods']        = $this->Api->get_where('vista_reporte_personal',array('id'=>$id));
			$data['main_content']   = 'enginer_report';
			$this->load->view('partials/basic',$data);                        
                        
		}
	}

	public function styles(){
		$this->load->view('styles');	
	}
        
        
        /**
        * Método para generar el reporte - IvanMel
        * @param in $project_id
        */
        
        public function report($project_id='', $report_id='', $format='html') {            
                if($project_id == '' || !is_numeric($project_id)){
                        redirect('/');
                } else{
                        if(count($this->Api->get_where('projects',array('id'=>$project_id))) == 1) {
                                
				//INICIALIZACION DE LA SESION
				$project_data 					= $this->Api->get_where('projects',array('id'=>$project_id));
				$project_data					= $project_data[0];
                                
                                //Si muestra el reporte y no todos los del projecto
                                if(is_numeric($report_id) && $format=='html') {
                                        //Verifico si el reporte se ve por el id del reporte o no 
                                        $conditions = array();
                                        $conditions['project'] = $project_id;
                                        if($report_id) {
                                                $conditions['id'] = $report_id;
                                        }
                                        $current_report 				= $this->Api->get_where('reports', $conditions, array('id','desc'));
                                        if(!$report_id) {
                                                $current_report                                 = $current_report[0]['id'];
                                                $current_report                                 = $this->Api->get_where('reports',array('id'=>$current_report));
                                        }
                                        $current_report_data                            = $current_report[0];												

                                        $this->session->set_userdata(array('project' => $project_data,'report'=>$current_report_data));

                                        //DATOS BASE
                                        $data['main_content']                           = 'qfluids';
                                        $data['project']				= $project_data;                                                                
                                        //DRILL STRING
                                        $data['drill_string'] = $this->Api->get_where('project_report_drill_string', array('report_id'=>$current_report_data['id'])); 
                                        //CASING
                                        $data['casing'] = $this->Api->sql("SELECT * FROM project_report_casing INNER JOIN casing ON casing.id = project_report_casing.casing_id WHERE project_report_casing.report_id = {$current_report_data['id']}");
                                        //MUD PUMPS
                                        $data['mud_pumps'] = $this->Api->sql("SELECT * FROM project_report_pump INNER JOIN bombas ON bombas.id = project_report_pump.bombas_id WHERE project_report_pump.report_id = {$current_report_data['id']}"); 
                                        //DRILLING PARAMETERS
                                        $data['drilling_parameters'] = $this->Api->get_where('project_report_drilling_parameters', array('report_id'=>$current_report_data['id']));                                 
                                        //HYDRAULIC
                                        $data['velocity'] = $this->Api->get_where('project_report_velocity', array('report_id'=>$current_report_data['id']));                                
                                        //BIT DATA
                                        $data['bit'] = $this->Api->sql("SELECT * FROM project_report_bit INNER JOIN brocas_modelos ON brocas_modelos.id = project_report_bit.brocas_modelos_id INNER JOIN brocas ON brocas.id = brocas_modelos.id_broca WHERE project_report_bit.report_id = {$current_report_data['id']}");
                                        //VOLUMENES LOSSES
                                        $losses = $this->Api->get_where('project_report_losses', array('report_id'=>$current_report_data['id']));
                                        $data['losses'] = isset($losses[0]) ? $losses[0] : null;
                                        //VOLUMENES RESUMEN
                                        $resumen = $this->Api->get_where('project_report_volumen', array('report_id'=>$current_report_data['id']));
                                        $data['resumen'] = isset($resumen[0]) ? $resumen[0] : null;
                                        
                                        
                                        //MUD PROPERITES
                                        $data['mud_properties'] = $this->Api->get_where('project_report_test', array('report_id'=>$current_report_data['id']));
                                        $data['mud_properties_hour'] = $this->Api->get_where('project_report_test', array('report_id'=>$current_report_data['id'], 'test_id'=>1));  
                                        $data['pacp'] = $this->Api->sql("SELECT test.* FROM test INNER JOIN project_report_test ON test.id = project_report_test.test_id WHERE test.type_test = 1 AND project_report_test.report_id = {$current_report_data['id']} GROUP BY test.id");
                                        //$data['pacp'] = $this->Api->get_where('test', array('active'=>1, 'type_test'=>1)); 
                                        $data['solids'] = $this->Api->get_where('test', array('active'=>1, 'type_test'=>3)); 
                                        $data['solids'] = $this->Api->get_where('test', array('active'=>1, 'type_test'=>3)); 
                                        $data['tests'] = $this->Api->get_where('test', array('active'=>1)); 

                                        //SHAKERS
                                        $data['shakers'] = $this->Api->sql("SELECT * FROM project_report_shakers INNER JOIN project_shakers ON project_shakers.id = project_report_shakers.project_shakers_id WHERE project_report_shakers.report_id = {$current_report_data['id']}");
                                        //MUD CLEANER
                                        $data['mudcleaner'] = $this->Api->sql("SELECT * FROM project_report_mudcleaner INNER JOIN project_mudcleaner ON project_mudcleaner.id = project_report_mudcleaner.project_mudcleaner_id WHERE project_report_mudcleaner.report_id = {$current_report_data['id']}");
                                        //CENTRIFUGUES
                                        $data['centrifugues'] = $this->Api->sql("SELECT * FROM project_report_centrifugues INNER JOIN project_centrifugues ON project_centrifugues.id = project_report_centrifugues.project_centrifugues_id WHERE project_report_centrifugues.report_id = {$current_report_data['id']}");
                                        //DRILLING TIME
                                        $data['drilling_time'] = $this->Api->get_where('project_report_drilling_time', array('report_id'=>$current_report_data['id']));
                                        //SURVEY
                                        $data['survey'] = $this->Api->get_where('project_report_survey', array('report_id'=>$current_report_data['id']));
                                        
                                        //COMMENTS
                                        $comments = $this->Api->get_where('project_report_comments', array('report_id'=>$current_report_data['id'])); 
                                        $data['comments'] = isset($comments[0]) ? $comments[0] : null;
                                        
                                        $data['main_content'] = 'report_html';                                    
                                        $this->load->view('partials/printer',$data);                                                                        
                                        
                                } else {
                                        redirect('/');                                                                    
                                }                                                                                             
                                
                                
			} else{
				redirect('/');
			}
		}                                    
        }
}
