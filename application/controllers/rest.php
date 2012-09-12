<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Api');
	    
	    //store raw input data in a object property
	    if(isset($_POST)){$this->data_input = file_get_contents("php://input");}

	    //store the project id to all methods
    	$project_id = $this->session->userdata('project');
		$this->project_id = $project_id['id'];
	}

	public function index(){
		redirect('/main/login');
	}


	/*==========================================================================================================*/
	// PROJECT METHODS
	/*==========================================================================================================*/

	public function upload_activation_file(){
		$config 					= array();
		$config['upload_path']      = './project_keys/imported';
		$config['allowed_types']    = 'qfl';
  		$this->load->library('upload', $config);

  		
		if($this->upload->do_upload()){                      
            $filedata 			= $this->upload->data();
            $data 				= json_decode(read_file($filedata['full_path']));
            $transactional_id 	= $data->transactional_id;

            $response 			= array();
            if(count($this->Api->get_where('projects',array('transactional_id'=>$transactional_id))) > 0){
            	$response['message']			= 'already_used';
            }else{
            	$response['message']			= 'sucess';
            	$response['transactional_id'] 	= $transactional_id;
            }

            echo json_encode($response);
        }else{
        	print_r($this->upload->data());
            echo $this->upload->display_errors();
        }
        
	}

	public function first_report(){
		$this->Api->update_where('projects',array('spud_date'=>$_POST['spud_date']),array('transactional_id' =>$_POST['transactional_id']));
		$project = $this->Api->get_where('projects',array('transactional_id'=>$_POST['transactional_id']));
		$project = $project[0];

		$report = array();
		$report['transactional_id'] 		= $_POST['transactional_id'].'_qflrpt_'.'1';
		$report['project_transactional_id'] = $_POST['transactional_id'];
		$report['date'] 					= $_POST['spud_date'];
		$report['number'] 					= 1;

		$this->Api->create('reports',$report);

		$report['message'] 					= 'sucess';
		$report['number'] 					= '0001';
		echo json_encode($report);
	}

	public function new_report(){
		$number 							= $_POST['number'] + 1;
		$date 								= date_create($_POST['date']);
		$date 								= date_add($date,date_interval_create_from_date_string('1 day'));
		$date 								= date_format($date,'Y-m-d');
		
		$report 							= array();
		$report['transactional_id'] 		= $_POST['project_transactional_id'].'_qflrpt_'.$number;
		$report['project_transactional_id'] = $_POST['project_transactional_id'];
		$report['date'] 					= $date;
		$report['number'] 					= $number;

		$this->Api->create('reports',$report);

		$report['message'] 					= 'sucess';
		$report['number'] 					= str_pad($number, 4, "0", STR_PAD_LEFT);
		echo json_encode($report);
	}	

	public function save_project_settings(){
		if(count($_POST) > 0){
			$this->Api->update('projects',$_POST,$this->project_id);
			echo json_encode(array('message'=>'project_updated'));
		}	
	}


	/*==========================================================================================================*/
	// TOOL CATALOGS METHODS
	/*==========================================================================================================*/

	//BIT FUNCTIONS
	public function listar_brocas(){
		echo json_encode($this->Api->get('brocas'));
	}
	public function listar_diametros_broca(){
		echo json_encode($this->Api->get_distinct_where('brocas_modelos','odddeci, odfracc, unit_oddfracc',$_POST));
	}
	public function listar_modelos_broca(){
		echo json_encode($this->Api->get_where('brocas_modelos',$_POST));
	}
	public function listar_detalle_brocas(){
		echo json_encode($this->Api->get_where('vista_brocas',$_POST));
	}
	public function insertar_broca(){
		echo json_encode($this->Api->create('brocas_modelos',$_POST));
	}

	//DRILL STRING FUNCTIONS
	public function new_drill_string_row(){
		$index = $_POST['drillstring_qty'] + 1;
		?>
			<tr id="row_select_drill_string_<?=$index;?>" class="row_select_drill_string">
				<td>
					<select  class="select_drill_string  drillstring_tool_<?=$index; ?>" id="select_drill_string_<?=$index; ?>">
						<option value="">Select...</option>
						<option value="bit_sub">Bit + Sub</option>
						<option value="bit">Bit</option>
						<option value="hw">HW</option>
						<option value="dc">DC</option>
						<option value="motor">Motor</option>
						<option value="stb">STB</option>
						<option value="xo">XO</option>
						<option value="hwdp">HWDP</option>
						<option value="mwd">MWD</option>
						<option value="dp">DP</option>
						<option value="xodp">XODP</option>
						<option value="jar">Jar</option>
						<option value="power_drive">Power Drive</option>
						<option value="vortex">Vortex</option>
						<option value="lwd">LWD</option>
					</select>
				</td>
				<td><input type="text" type="text" name="odbha_<?=$index;?>" id="odbha_<?=$index;?>" class="odbha_<?=$index;?> odbha" /></td>
				<td><input type="text" type="text" name="idbha_<?=$index;?>" id="idbha_<?=$index;?>" class="idbha_<?=$index;?> idbha" /></td>
				<td><input type="text" type="text" name="longbha_<?=$index;?>" id="longbha_<?=$index;?>" class="longbha_<?=$index;?> longbha" value="0" style="width:40px;" /></td>
				<td><input type="text" type="text" name="capvbha_<?=$index;?>" id="capvbha_<?=$index;?>" disabled="disabled" class="capvbha_<?=$index;?> capvbha" /></td>
				<td><input type="text" type="text" name="dispvbha_<?=$index;?>" id="dispvbha_<?=$index;?>" class="dispvbha_<?=$index;?> dispvbha" disabled="disabled"/></td>
				<td><input type="text" type="text" name="capbha_<?=$index;?>" id="capbha_<?=$index;?>" class="capbha_<?=$index;?> capbha" disabled="disabled" style="width:40px;" /></td>
				<td><input type="text" type="text" name="dispbha_<?=$index;?>" id="dispbha_<?=$index;?>" class="dispbha_<?=$index;?> dispbha" disabled="disabled" style="width:40px;" /></td>
				<td><input type="text" type="text" name="powerlossbha_<?=$index;?>" id="powerlossbha_<?=$index;?>" disabled="disabled" class="powerlossbha" /></td>
				<td><input type="text" type="text" name="zbinglossbha_<?=$index;?>" id="zbinglossbha_<?=$index;?>" disabled="disabled" class="zbinglossbha" /></td>
				<td class="label_m"><a href="#removeds_<?=$index;?>" class="remove_ds">Remove</a></td>
			</tr>
		<?php
	}

	//PUMP FUNCTIONS
	public function get_pump_types(){
		echo json_encode($this->Api->get_distinct_where('bombas','type',$_POST));
	}

	public function get_pump_strokelength(){
		echo json_encode($this->Api->get_distinct_where('bombas','strokelength, strokefrac',$_POST));
	}

	public function get_pump_linerdiameter(){
		echo json_encode($this->Api->get_distinct_where('bombas','linerdiameter, linerdiameter_frac',$_POST));
	}

	public function get_pump_rod(){
		echo json_encode($this->Api->get_distinct_where('bombas','rod, rodfrac',$_POST));	
	}

	public function get_pump_model(){
		echo json_encode($this->Api->get_distinct_where('bombas','modelo',$_POST));	
	}

	public function get_pump_pression(){
		echo json_encode($this->Api->get_distinct_where('bombas','presion',$_POST));	
	}

	public function insert_pump(){
		echo json_encode($this->Api->create('bombas',$_POST));
	}


	//MUD FUNCTIONS
	public function insert_mud(){
		echo json_encode($this->Api->create('lodos',$_POST));
	}

	//CASING FUNCTIONS
	public function listar_id_casing(){
		echo json_encode($this->Api->get_where('casing',array('oddeci'=>$_POST['oddeci'])));
	}

	public function insert_casing(){
		echo json_encode($this->Api->create('casing',$_POST));
	}

	/*==========================================================================================================*/
	// PERSONAL METHODS
	/*==========================================================================================================*/

	public function register_enginer(){
		//1. verify the enginer exists and get its ID
		$enginer = $this->Api->get_where('vista_personal',array('identification'=>$_POST['identification'],'project'=>$_POST['project'],'active'=>1,'type'=>'enginer'));
		if(count($enginer) == 1){
			$data = array(
				'enginer' 	=> $enginer[0]['id'],
				'project' 	=> $_POST['project'],
				'cover'		=> $_POST['cover'],
				'date'		=> $_POST['date']
			);

			//2. verify the enginer is not registered yet
			$match = $this->Api->get_where('personal_report_enginers',array('enginer'=>$data['enginer'],'project'=>$_POST['project'],'date' => $_POST['date']));
			if(count($match) > 0 ){
				$response = array(
					'enginer'	=> $enginer[0]['name'].' '.$enginer[0]['lastname'],
					'message'	=> 'already_registered',
					'timestamp' => ''
				);
			}else{

				//3. register the enginer if not registered yet
				$this->Api->create('personal_report_enginers',$data);
				$response = array(
					'enginer'			=> $enginer[0]['name'].' '.$enginer[0]['lastname'],
					'message'			=> 'success',
					'timestamp' 		=> $_POST['date'],
					'enginers_today' 	=> count($this->Api->get_distinct_where('personal_report_enginers','enginer',array('project'=>$_POST['project'])))
				);	
			}

			//4. print the response back
			echo json_encode($response);
		}else{
			echo json_encode(array('message'=>'no_enginer'));
		}
	}

	public function new_enginer(){
		if(count($_POST) > 0){
			//1. verify the enginer does not exists
			$match = $this->Api->get_where('vista_personal',array('identification' => $_POST['identification'], 'project' => $_POST['project'], 'active' => 1));
			if(count($match) > 0){
				$response = array('message'=>'already_created');
			}else{
				$this->Api->create('personal',$_POST);
				$enginers = $this->Api->get_where('vista_personal',array('project' => $_POST['project'], 'active' => 1,'type'=>'enginer'));
				$response = array('message'=>'success','enginers'=>$enginers);
			}

			echo json_encode($response);
		}
	}

	public function remove_enginer(){
		if(count($_POST) > 0){
			$this->Api->delete('personal',$_POST['id']);
			echo json_encode(array('message'=>'deactivated'));
		}
	}

	/*==========================================================================================================*/
	// CONFIG PANEL METHODS
	/*==========================================================================================================*/

	public function config_shakers(){
		$shakers = json_decode($this->data_input);

		//1. UPDATE THE SHAKERS QTY IN THE PROJECTS TABLE
		$this->Api->update('projects',array('shaker_qty'=>$shakers->shaker_qty),$this->project_id);
		
		//2. REMOVE ALL PREVIOUS SHAKER INFORMATION IN THE PROJECT_SHAKERS TABLE
		$this->Api->delete_where('project_shakers',array('project'=>$this->project_id));
		
		//3. INSERT NEW SHAKER INFORMATION
		foreach ($shakers->shakers as &$shaker) {
			$shaker->project = $this->project_id;
			$this->Api->create('project_shakers',$shaker);
		}

		echo json_encode(true);
	}

	public function config_mudcleaner(){
		$mud_cleaner = json_decode($this->data_input);

		//1. REMOVE ALL THE PREVIOUS MUD CLEANER INFORMATION FOR THIS PROJECT
		$this->Api->delete_where('project_mudcleaner',array('project'=>$this->project_id));


		//2. INSERT NEW MUD CLEANER INFORMATION
		$mud_cleaner->project = $this->project_id;
		$this->Api->create('project_mudcleaner',$mud_cleaner);

		echo json_encode(true);
	}

	public function config_centrifugues(){
		$centrifugues = json_decode($this->data_input);
		$this->Api->delete_where('project_centrifugues',array('project'=>$this->project_id));
		foreach ($centrifugues->centrifuges as &$centrifugue) {
			$centrifugue->project = $this->project_id;
			$this->Api->create('project_centrifugues',$centrifugue);
		}
		echo json_encode(true);
	}

}
/****** THE END ******/