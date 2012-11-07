<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Api');
	    
	    //store raw input data in a object property
	    if(isset($_POST)){$this->data_input = file_get_contents("php://input");}

	    //expose the project info to all methods
    	$project 				= $this->session->userdata('project');
    	$report 				= $this->session->userdata('report');
		$this->project_id 		= $project['id'];
		$this->project_wellname = $project['well_name'];
		$this->project_operator = $project['operator'];
		$this->report_id 		= $report['id'];
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
		$report['transactional_id']                                     = $_POST['project_transactional_id'].'_qflrpt_'.$number;
		$report['project_transactional_id']                             = $_POST['project_transactional_id'];
		$report['date']                                                 = $date;
		$report['number']                                               = $number;
                $report['phase']                                                = $_POST['phase'];
                $report['project']                                              = $this->project_id;

		$this->Api->create('reports',$report);
		$this->Api->update_where('projects',array('current_phase'=>$_POST['phase']),array('id'=>$this->project_id));

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
        
        public function load_report() {
                $reportes       = $this->Api->get_where('reports', array('project'=>$this->project_id), array('id','desc'));
                $actual         = $this->session->userdata('report');
                foreach($reportes as $reporte) {
                        if($reporte['number'] < $actual['number']) { ?>                        
                                <tr id="this_report_<?= $reporte['id']; ?>">                                       
                                        <td><input type="text" style="width:120px;" disabled="disabled" value="REPORT <?= $reporte['number']; ?>" /></td>
                                        <td><input type="text" style="width:100px;" disabled="disabled" value="<?= $reporte['date']; ?>" /></td>
                                        <td><input type="text" style="width:100px;" disabled="disabled" value="<?= $reporte['phase']; ?>" /></td>
                                </tr>                                
                        <?php } 
                }
        }
        
        public function save_report_settings() {                
                if(count($_POST) > 0) {
                        $reportes       = $this->Api->get_where('reports', array('project'=>$this->project_id), array('id','desc'));
                        $reporte        = $reportes[0];
                        $this->Api->update_where('reports', $_POST, array('id'=>$reporte['id']) );
                        echo json_encode(array('message'=>'report_updated', 'report'=>$reporte['id']));
                }
        }


    public function popular_maestras(){

    	if(count($this->Api->get_where('project_materials',array('project_id'=>$this->project_id))) == 0){
    		//maestra de materiales
			$materiales = $this->Api->get('maestra_materials');
			foreach ($materiales as &$material) {
				$material['project_id'] 		= $this->project_id;
				$material['commercial_name'] 	= $material['internal_name'];
				$material['used_in_project'] 	= 0;
				unset($material['id']);
				$this->Api->create('project_materials',$material);
			}	
    	}else{
    		echo json_encode('materials_already_populated');
    	}
		

    	if(count($this->Api->get_where('project_equipement',array('project_id'=>$this->project_id))) == 0){
    		//maestra de equipos
			$equipos = $this->Api->get('maestra_equipos');
			foreach ($equipos as &$equipo) {
				$equipo['project_id'] 		= $this->project_id;
				$equipo['used_in_project'] 	= 0;
				$equipo['commercial_name'] 	= $equipo['product_name'];
				unset($equipo['id']);
				$this->Api->create('project_equipement',$equipo); 
			}	
    	}else{
    		echo json_encode('equipement_already_populated');
    	}
			
	}

	/*==========================================================================================================*/
	// TOOL CATALOGS METHODS
	/*==========================================================================================================*/

	//BIT FUNCTIONS        
        public function load_bits(){
                $brocas = $this->Api->get_where('vista_brocas', $_POST);                
                foreach ($brocas as $broca) {
                        echo '<tr id="this_bit_'.$broca['id'].'"><td><input type="text" style="width:110px;" disabled="" value="'.$broca['nombre_broca'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$broca['nombre_modelo'].'" /></td><td><input type="text" style="width:100px;" disabled="" value="'.$broca['odfracc'].' '.$broca['unit_oddfracc'].'" /></td><td><input type="text" style="width:100px;" disabled="" value="'.$broca['odddeci'].' '.$broca['unit_odddeci'].'" /></td><td><input type="text" style="width:80px;" disabled="" value="'.$broca['length'].' '.$broca['unit_length'].'" /></td><td><a href="#remove_bit" class="remove_bit_link" id="rm_bit_'.$broca['id'].'"><img src="/img/delete.png" /></a></td></tr>';
                }
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
	public function listar_detalle_brocas(){
		echo json_encode($this->Api->get_where('vista_brocas',$_POST));
	}
	public function insertar_broca(){
		echo json_encode($this->Api->create('brocas_modelos',$_POST));
	}
        public function remove_bit(){
		if(count($_POST) > 0){
			$this->Api->update('brocas_modelos', array('active'=>0), $_POST['id']);
			echo json_encode(array('message'=>'deactivated'));
		}
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
        
        public function get_pump(){
		echo json_encode($this->Api->get_where('bombas', $_POST));	
	}

	public function insert_pump(){
		echo json_encode($this->Api->create('bombas',$_POST));
	}
        public function load_pumps(){
            $bombas = $this->Api->get_where('bombas', $_POST);                
            foreach ($bombas as $bomba) {
                    echo '<tr id="this_pump_'.$bomba['id'].'"><td><input type="text" style="width:110px;" disabled="" value="'.$bomba['maker'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$bomba['type'].'" /></td><td><input type="text" style="width:80px;" disabled="" value="'.$bomba['modelo'].'" /></td><td><input type="text" style="width:60px;" disabled="" value="'.$bomba['strokelength'].' '.$bomba['strokelength_unit'].'" /></td><td><input type="text" style="width:55px;" disabled="" value="'.$bomba['linerdiameter'].'" /></td><td><input type="text" style="width:55px;" disabled="" value="'.$bomba['rod'].' '.$bomba['rod_unit'].'" /></td><td><input type="text" style="width:55px;" disabled="" value="'.$bomba['presion'].' '.$bomba['presion_unit'].'" /></td><td><input type="text" style="width:55px;" disabled="" value="'.$bomba['max_spm'].'" /></td><td><input type="text" style="width:55px;" disabled="" value="'.$bomba['strokefrac'].' '.$bomba['strokefrac_unit'].'" /></td><td><input type="text" style="width:55px;" disabled="" value="'.$bomba['linerdiameter_frac'].' '.$bomba['linerdiameterfrac_unit'].'" /></td><td><input type="text" style="width:55px;" disabled="" value="'.$bomba['rodfrac'].' '.$bomba['rodfrac_unit'].'" /></td><td><a href="#remove_pump" class="remove_pump_link" id="rm_pump_'.$bomba['id'].'"><img src="/img/delete.png" /></a></td></tr>';                    
            }
	}
        public function remove_pump(){
            if(count($_POST) > 0){
                    $this->Api->update('bombas', array('active'=>0), $_POST['id']);
                    echo json_encode(array('message'=>'deactivated'));
            }
	}
                

	//MUD FUNCTIONS
	public function insert_mud(){
		echo json_encode($this->Api->create('lodos',$_POST));
	}                
        public function load_muds(){
            $lodos = $this->Api->get_where('lodos', $_POST);                
            foreach ($lodos as $lodo) {
                    echo '<tr id="this_mud_'.$lodo['id'].'"><td><input type="text" style="width:110px;" disabled="" value="'.$lodo['nombre'].'" /></td><td><a href="#remove_mud" class="remove_mud_link" id="rm_mud_'.$lodo['id'].'"><img src="/img/delete.png" /></a></td></tr>';
            }
	}
        public function remove_mud(){
		if(count($_POST) > 0){
			$this->Api->update('lodos', array('active'=>0), $_POST['id']);
			echo json_encode(array('message'=>'deactivated'));
		}
	}

	//CASING FUNCTIONS
        public function get_casing(){
		echo json_encode($this->Api->get_where('casing', $_POST));	
	}
        
	public function listar_id_casing(){
		echo json_encode($this->Api->get_where('casing',array('oddeci'=>$_POST['oddeci'])));
	}

	public function insert_casing(){
                if(isset($_POST['createcasing_top'])) {
                        unset($_POST['createcasing_top']);
                }
		echo json_encode($this->Api->create('casing',$_POST));
	}
        public function load_casing(){
            $cubiertas = $this->Api->get_where('casing', $_POST);                
            foreach ($cubiertas as $cubierta) {
                    echo '<tr id="this_casing_'.$cubierta['id'].'"><td><input type="text" style="width:100px;" disabled="" value="'.$cubierta['odfrac'].'" /></td><td><input type="text" style="width:100px;" disabled="" value="'.$cubierta['oddeci'].' '.$cubierta['od_unit'].'" /></td><td><input type="text" style="width:100px;" disabled="" value="'.$cubierta['idfrac'].'" /></td><td><input type="text" style="width:100px;" disabled="" value="'.$cubierta['iddeci'].' '.$cubierta['id_unit'].'" /></td><td><input type="text" style="width:100px;" disabled="" value="'.$cubierta['weight'].' '.$cubierta['w_unit'].'" /></td><td><a href="#remove_casing" class="remove_casing_link" id="rm_casing_'.$cubierta['id'].'"><img src="/img/delete.png" /></a></td></tr>';
            }
	}
        public function remove_casing(){
		if(count($_POST) > 0){
			$this->Api->update('casing', array('active'=>0), $_POST['id']);
			echo json_encode(array('message'=>'deactivated'));
		}
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

	public function new_person(){
		if(count($_POST) > 0){
			//1. verify the enginer does not exists
			$match = $this->Api->get_where('vista_personal',array('identification' => $_POST['identification'], 'project' => $_POST['project'], 'active' => 1));
			if(count($match) > 0){
				$response = array('message'=>'already_created');
			}else{
				$type 		= $_POST['type'];
				unset($_POST['type']);
				$this->Api->create('personal',$_POST);
				$personal 	= $this->Api->get_where('vista_personal',array('project' => $_POST['project'], 'active' => 1,'type'=>$type));
				$response 	= array('message'=>'success','enginers'=>$personal);
			}

			echo json_encode($response);
		}
	}

	public function remove_person(){
		if(count($_POST) > 0){
			$this->Api->delete('personal',$_POST['id']);
			echo json_encode(array('message'=>'deactivated'));
		}
	}

	public function get_category_info(){
		if(count($_POST) > 0){
			$cat_info = $this->Api->get_where('personal_categories',$_POST);
			$cat_info = $cat_info[0];
			echo json_encode($cat_info); 
		}
	}

	public function load_personal(){
		if(count($_POST) > 0){
			
			if($_POST['type'] == 'enginer'){
				$personal = $this->Api->get_where('vista_personal',$_POST);
				foreach ($personal as $persona) {
					echo '<tr id="this_person_'.$persona['id'].'"><td><input type="text" style="width:110px;" disabled="" value="'.$persona['name'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$persona['lastname'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$persona['identification'].'" /></td><td><input type="text" style="width:96px;margin-right:5px;" disabled="" value="'.$persona['category_name'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$persona['rate'].'" name="rate" /></td><td><a href="#remove_person" class="remove_person_link" id="rm_person_'.$persona['id'].'"><img src="/img/delete.png" /></a></td></tr>';
				}
			}else{
				$personal = $this->Api->get_where('vista_personal',$_POST,array('id','desc'));
				foreach ($personal as $persona) {
					echo '<tr id="this_person_'.$persona['id'].'"><td><input type="text" style="width:110px;" disabled="" value="'.$persona['name'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$persona['lastname'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$persona['identification'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$persona['rate'].'" name="rate" /></td><td><a href="#remove_person" class="remove_person_link" id="rm_person_'.$persona['id'].'"><img src="/img/delete.png" /></a></td></tr>';
				}	
			}			
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

	public function load_current_tanks(){
		if(count($_POST) > 0){
			$tanks = $this->Api->get_where('vista_tanks',$_POST,array('order','asc'));
			$tanks_qty = count($tanks);

			foreach ($tanks as $tank){
				$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
				echo '
					<tr class="this_tank">
						<td class="label_m" style="padding-right:3px;"><a href="remove_tank_'.$tank['id'].'" class="remove_tank" title="Delete '.$tank['tank_name'].'"><img src="/img/delete.png" /></a></td>
						<td>
							<select style="width:50px;" id="tank_order_'.$tank['id'].'" class="tank_order">';
								for($i = 1; $i<= $tanks_qty;$i++){
									if($i == $tank['order']){
										$selected = 'selected="selected"';
									}else{
										$selected = '';
									}
									echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
								}
				echo '
							</select>
						</td>
						<td>
							<input type="text" style="width:110px;" disabled="disabled" value="'.$tank['tank_name'].'" />
							<input type="hidden" class="tank_name_id" value="'.$tank['name'].'" />
						</td>
						<td><input type="text" style="width:70px;" disabled="disabled" value="'.$tank['agitators'].'" /></td>
						<td><input type="text" style="width:30px;" disabled="disabled" value="'.$has_jets.'" /></td>
						<td><input type="text" style="width:110px;" disabled="disabled" value="'.$tank['tank_type'].'" /></td>
						<td><input type="text" style="width:110px;" disabled="disabled" value="'.$tank['voltkaforo'].'" /></td>
						<td><input type="text" style="width:110px;" disabled="disabled" value="'.$tank['hlibremax'].'" /></td>
						<td>
							 <a href="show_measures_'.$tank['id'].'" class="show_measures"><img src="/img/page_white_edit.png" /></a>
						</td>	
					</tr>';
			}
		}
	}

	public function create_tank(){
		if(count($_POST) > 0){
			$this->Api->create('project_tanks',$_POST);
			echo json_encode(true);
		}
	}

	public function remove_tank(){
		if(count($_POST) > 0){
			$this->Api->delete('project_tanks',$_POST['id']);
			$condition 				= array();
			$condition['active'] 	= 1;
			$condition['project'] 	= $this->project_id;
			
			
			$tanks = $this->Api->get_where('project_tanks',$condition,array('order','asc'));
			$count = 0;
			
			foreach ($tanks as &$tank) {
				$count++;
				$tank['order'] = $count;
				$this->Api->update_where('project_tanks',$tank,array('id'=>$tank['id']));
			}

			echo json_encode(true);	
		}
	}

	public function update_tank_order(){
		$tanks = json_decode($this->data_input);
		foreach ($tanks as $tank) {
			$this->Api->update_where('project_tanks',array('order'=>$tank->order),array('id'=>$tank->id));
		}
		echo json_encode(true);		
	}


	public function list_tank_names(){
		if(count($_POST) > 0){
			$names = $this->Api->get_where('tank_names',$_POST);
			echo '<option value="">Select...</option>';
			foreach ($names as $name) {
				echo '<option value="'.$name['id'].'">'.$name['name'].'</option>';
			}
		}
	}

	public function get_tank_properties(){
		if(count($_POST) > 0){
			$tank = $this->Api->get_where('vista_tanks',$_POST);
			if(count($tank) > 0){
				$tank = $tank[0];
				echo json_encode($tank);
			}else{
				echo json_encode(false);
			}
		}
	}

	public function update_tank(){
		if(count($_POST) > 0){
			$this->Api->update_where('project_tanks',$_POST,array('id'=>$_POST['id']));
			echo json_encode(true);
		}
	}


	//materials
	public function update_materials(){
		//get all the reports for this project
		$reports = $this->Api->get_where('reports',array('project'=>$this->project_id));

		//deactivate all materials in this project
		$this->Api->update_where('project_materials',array('used_in_project'=>0),array('project_id' => $this->project_id));
		
		//reactivate just the selected materials and create the respective record in the inventary table and material status table
		$materials = json_decode($this->data_input);
		foreach ($materials as $material) {
			//project materials and inventory table
			$this->Api->update('project_materials',$material,$material->id);
			
			if($material->used_in_project == 1){
				$inventory_entries = $this->Api->get_where('inventory',array('product'=>$material->id));
				if(count($inventory_entries) == 0){
					$this->Api->create('inventory',array('product' => $material->id, 'avaliable'=>0, 'used'=>0, 'transfered'=>0,'project_id'=>$this->project_id));
				}

				//report_materialstatus
				foreach ($reports as $report) {
					$material_status = $this->Api->get_where('report_materialstatus',array('report'=>$report['id'],'material'=>$material->id));
					if(count($material_status) == 0){
						$this_material_status = array(
							'report'   		=> $report['id'],
							'material'		=> $material->id,
							'initial'		=> 0,
							'received'		=> 0,
							'transfered'	=> 0,
							'used'			=> 0,
							'stock' 		=> 0
						);

						$this->Api->create('report_materialstatus',$this_material_status);
					}
				}	
			}
		}
		echo json_encode(true);	
	}
        
    public function new_material() {
        if(count($_POST) > 0){
            $data = $_POST;
            $data['project_id'] = $this->project_id;
            $value = $data['value'];

            //PRODUCTOS SOLIDOS
            if($data['unit_value'] == 'lb'){
                if($value <= 2004) { //Sx
                    $unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"SX{$value}"));
                    if(empty($unit[0]['id'])) { //Se crea si no existe
                            $unit = $this->Api->create('conversions_table', array('nombre_unidad'=>"SX{$value}", 'prefijo'=>'SX', 'equivalencia'=>$value, 'unidad_destino'=>$data['unit_value']));
                    }                                
                } else if($value > 2004 && $value < 4010) { //tn1
                    $unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"TN1{$value}"));
                    if(empty($unit[0]['id'])) { //Se crea si no existe
                            $unit = $this->Api->create('conversions_table', array('nombre_unidad'=>"TN1{$value}", 'prefijo'=>'TN1', 'equivalencia'=>$value, 'unidad_destino'=>$data['unit_value']));
                    }                                
                } else if($value >= 4010) {  //tn2
                    $unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"TN2{$value}"));
                    if(empty($unit[0]['id'])) { //Se crea si no existe
                            $unit = $this->Api->create('conversions_table', array('nombre_unidad'=>"TN2{$value}", 'prefijo'=>'TN2', 'equivalencia'=>$value, 'unidad_destino'=>$data['unit_value']));
                    }
                }

            //PRODUCTOS LIQUIDOS    	
            }else if($data['unit_value'] == 'gal'){
            	if($value <= 15) { //CN
                    $unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"CN{$value}"));
                    if(empty($unit[0]['id'])) { //Se crea si no existe
                            $unit = $this->Api->create('conversions_table', array('nombre_unidad'=>"CN{$value}", 'prefijo'=>'CN', 'equivalencia'=>$value, 'unidad_destino'=>$data['unit_value']));
                    }                                
                }else if($value >= 16 && $value <= 259) { //TM
                    $unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"TM{$value}"));
                    if(empty($unit[0]['id'])) { //Se crea si no existe
                            $unit = $this->Api->create('conversions_table', array('nombre_unidad'=>"TM{$value}", 'prefijo'=>'TM', 'equivalencia'=>$value, 'unidad_destino'=>$data['unit_value']));
                    }                                
                }else if($value >= 260) { //IBC
                    $unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"IBC{$value}"));
                    if(empty($unit[0]['id'])) { //Se crea si no existe
                            $unit = $this->Api->create('conversions_table', array('nombre_unidad'=>"IBC{$value}", 'prefijo'=>'IBC', 'equivalencia'=>$value, 'unidad_destino'=>$data['unit_value']));
                    }                                
                }
            }
            

            $data['unit'] = empty($unit[0]['id']) ? $unit : $unit[0]['id'];
            //Elimino el value y el unit_value
            unset($data['value']);
            unset($data['unit_value']);                        
			$this->Api->create('project_materials',$data);
			echo json_encode(true);
		}
    }
        
    public function new_equipment() {
        if(count($_POST) > 0){
            $data = $_POST;
            $data['project_id'] = $this->project_id;
            $value = $data['value'];

            if($data['unit_value'] == 'dias'){

            	if($value == 1){
            		$unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"DIA"));	
            	}else{
            		$unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"{$value}DIAS"));
	                if(empty($unit[0]['id'])) { //Se crea si no existe
	                        $unit = $this->Api->create('conversions_table', array('nombre_unidad'=>"{$value}DIAS", 'prefijo'=>'DIAS', 'equivalencia'=>$value, 'unidad_destino'=>$data['unit_value']));
	                }	
            	}
            	 	
            }else if($data['unit_value'] == 'unidades'){
            	if($value == 1){
            		$unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"UNIDAD"));	
            	}else{
            		$unit = $this->Api->get_where('conversions_table', array('nombre_unidad'=>"{$value}UNIDADES"));
	                if(empty($unit[0]['id'])) { //Se crea si no existe
	                    $unit = $this->Api->create('conversions_table', array('nombre_unidad'=>"{$value}UNIDADES", 'prefijo'=>'UNIDADES', 'equivalencia'=>$value, 'unidad_destino'=>$data['unit_value']));
	                }	
            	}
            }

                                     
            $data['unit'] = empty($unit[0]['id']) ? $unit : $unit[0]['id'];
            //Elimino el value y el unit_value
            unset($data['value']);
            unset($data['unit_value']);                        
			
			$this->Api->create('project_equipement',$data);
			echo json_encode(true);
		}
    }


	public function load_ac_status(){
		$materials = $this->Api->get_where('vista_reporte_estado_material',array('project'=>$this->project_id,'report'=>$this->report_id),array('commercial_name','asc'));	
		foreach ($materials as $material) { ?>
			<tr class="this_material_ac" id="this_material_<?= $material['material']?> ">
				<td><input style="width:230px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
				<td>
					<input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" />
					<input type="hidden" name="size_<?= $material['material']?>" id="size_<?= $material['material']?>" class="size" value="<?= $material['equivalencia'] ?>" />
					<input type="hidden" name="unit_<?= $material['material']?>" id="unit_<?= $material['material']?>" class="unit" value="<?= $material['unidad_destino'] ?>" />
				</td>
				<td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['egravity'] ?>" name="sg_<?= $material['material']?>" id="sg_<?= $material['material']?>" /></td>
				<td>
					<input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['stock'] ?>" id="ac_stock_<?= $material['material']?>" class="ac_stock" />
				</td>
				<td><input style="width:55px;margin-right:0;" type="text" value="" class="used" name="used_<?= $material['material']?>" id="used_<?= $material['material']?>" /></td>
				<td>
					<input style="width:55px;margin-right:0;" type="text" value="0" disabled="disabled" id="volincr_<?= $material['material']?>" name="volincr_<?= $material['material']?>" class="volincr" />
					<input type="hidden" value="" id="concincr_<?= $material['material']?>" name="concincr_<?= $material['material']?>" class="concincr"  />
				</td>
            </tr>  <?php
		}
	}

        
    public function load_stock(){
		$result = $this->Api->get_where('stock_transfers', $_POST);
		foreach ($result as $stock) { ?>
			<tr class="this_incoming_stock_<?= $stock['d']?> ">								
                <td></td>
				<td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $stock['date'] ?>" /></td>
				<td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $stock['code'] ?>" /></td>
				<td><input style="width:150px;margin-right:0;" type="text" disabled="disabled" value="<?= $stock['origin'] ?>" /></td>
				<td><input style="width:150px;margin-right:0;" type="text" disabled="disabled" value="<?= $stock['destiny'] ?>" /></td>
            </tr> <?php
		}
	}

	public function set_personal_settings(){
		if(count($_POST) > 0){
			if($_POST['setting_type'] == 'operators'){
				$data = array('operators'=>$_POST['value']);
			}else if($_POST['setting_type'] == 'yard_workers'){
				$data = array('yard_workers'=>$_POST['value']);
			}
			$this->Api->update_where('projects',$data,array('id'=>$this->project_id));
			echo json_encode(true);
		}
	}
        
        /**
         * MUD PROPERTIES
         */
        public function load_test(){
                $project = $this->Api->get_where('projects', array('id'=>$this->project_id));
                $project = $project[0];
                
		if(count($_POST) > 0){	    
                        
                        $tests = $this->Api->get_where('test', $_POST);
                                                
                        if(isset($_POST['custom'])) {
                                foreach($tests as $test) {
                                        if($test['type_test']==1) {
                                                $type = 'Physical and Chemical properties';
                                        } else if($test['type_test']==2) {
                                                $type = 'Rheology';
                                        } else {
                                                $type = 'Solid math';
                                        }
                                        echo '<tr id="this_test_'.$test['id'].'"><td><input type="text" style="width:110px;" disabled="" value="'.$test['test'].'" /></td><td><input type="text" style="width:110px;" disabled="" value="'.$test['unit_test'].'" /></td><td><a href="#remove_test" class="remove_test_link" id="rm_test_'.$test['id'].'"><img src="/img/delete.png" /></a></td></tr>';
                                }
                        } else {                                
                                $rs = "<tr><td></td><td class=\"unit_field\"></td>";                                
                                for($i=1 ; $i<=$project['max_phase'] ; $i++) {
                                        $rs.= "<td class=\"label_m\"><label>Program $i</label></td>";
                                }                                
                                $rs.='</tr>';                        			
                                foreach($tests as $test) {
                                        $programs = $this->Api->get_where('program', array('project_id'=>$this->project_id, 'test_id'=>$test['id']));                                        
                                        $rs.= "<tr><td class=\"label_m\"><label>{$test['test']}</label></td><td class=\"unit_field\">{$test['unit_test']}</td>";
                                        for($i=1 ; $i<=$project['max_phase'] ; $i++) {                                                
                                                $value  = empty($programs[($i-1)]['value_program']) ? '' : $programs[($i-1)]['value_program'];
                                                $id     = @$programs[($i-1)]['id'];
                                                $rs.= "<td><input type=\"text\" value=\"$value\" data-program-id=\"$id\" class=\"program_value\" style=\"width:60px;\"  data-phase=\"$i\"  data-test=\"{$test['id']}\" data-type=\"{$test['type_test']}\"></td>";
                                        }
                                        $rs.= "</tr>";                                        
                                }                                   
                                echo $rs;
                        }
		}
	}
        
    public function new_test(){
		if(count($_POST) > 0){			
			$match = $this->Api->get_where('test',array('test' => $_POST['test'], 'type_test' => $_POST['type_test'], 'unit_test' => $_POST['unit_test'], 'active' => 1));
			if(count($match) > 0){
				$response = array('message'=>'already_created');
			} else {				
				$this->Api->create('test',$_POST);
				$test           = $this->Api->get_where('test',array('test' => $_POST['test'], 'active' => 1, 'type_test'=>$_POST['type_test']));
				$response 	= array('message'=>'success','test'=>$test);
			}
			echo json_encode($response);
		}
	}
        
        public function remove_test(){
		if(count($_POST) > 0){
			$this->Api->delete('test',$_POST['id']);
			echo json_encode(array('message'=>'deactivated'));
		}
	}
        
        public function save_program(){
		$programs = json_decode($this->data_input);                
		foreach ($programs as $program) {
                        if(empty($program->value_program)) {
                                //$program->value_program = NULL;
                        }
                        if(empty($program->id)) {
                                $this->Api->create('program',array('project_id'=>$this->project_id, 'test_id'=>$program->test_id, 'phase'=>$program->phase, 'value_program'=>$program->value_program));
                        } else {
                                $this->Api->update('program', array('value_program'=>$program->value_program), $program->id);
                        }
		}
		echo json_encode(true);		
	}
        
        /**
         * Rig
         */
        public function save_rig() {                             
            if(count($_POST) > 0){
                    if(!empty($_POST['id'])) {
                            if(empty($_POST['shear_ram'])) {
                                    $_POST['shear_ram'] = 0;
                            }
                            if(empty($_POST['blind_ram'])) {
                                    $_POST['blind_ram'] = 0;
                            }
                            if(empty($_POST['pipe_ram'])) {
                                    $_POST['pipe_ram'] = 0;
                            }                                                        
                            $this->Api->update('rig', $_POST, $_POST['id']);
                    } else {
                            $this->Api->create('rig', $_POST);
                    }                    
            }            
            echo json_encode(true);            
        }
        

        /*==========================================================================================================*/
        // DATA INPUT SAVE
        /*==========================================================================================================*/        
        public function save_hole_geometry($type) {
                $values = json_decode($this->data_input);
                if($type=='casing') {
                        //Elimino los campos enviados con anterioridad para tener los nuevos almacenados
                        $this->Api->total_remove_where('project_report_casing', array('report_id'=>$this->report_id));
                        foreach ($values as $value) {  
                                if(!is_numeric($value->casing_id) ) {
                                        continue;
                                }
                                $this->Api->create('project_report_casing', array('report_id'=>$this->report_id, 'casing_id'=>$value->casing_id, 'type'=>$value->type, 'top'=>$value->top, 'bottom'=>$value->bottom, 'capacity'=>$value->capacity, 'length'=>$value->length));
                        }
                } else if($type=='hole') {                        
                        $this->Api->total_remove_where('project_report_hole', array('report_id'=>$this->report_id));
                        $_POST['report_id'] = $this->report_id;                        
                        $this->Api->create('project_report_hole', $_POST);
                } else if($type=='drill_string') {                        
                        $this->Api->total_remove_where('project_report_drill_string', array('report_id'=>$this->report_id));
                        foreach ($values as $value) {                                  
                                $this->Api->create('project_report_drill_string', array('report_id'=>$this->report_id, 'bha_name'=>$value->bha_name, 'oddeci'=>$value->oddeci, 'iddeci'=>$value->iddeci, 'length'=>$value->length, 'capacity_vol'=>$value->capacity_vol, 'displacement_vol'=>$value->displacement_vol, 'capacity_ft'=>$value->capacity_ft, 'displacement_ft'=>$value->displacement_ft, 'pressure'=>$value->pressure, 'losses'=>$value->losses));
                        }
                } else if($type=='pressure') {
                        $this->Api->total_remove_where('project_report_pressure_loss', array('report_id'=>$this->report_id));
                        foreach ($values as $value) {                                  
                                $this->Api->create('project_report_pressure_loss', array('report_id'=>$this->report_id, 'hydraulic_type'=>$value->hydraulic_type, 'surface'=>$value->surface, 'string'=>$value->string, 'motor'=>$value->motor, 'bit'=>$value->bit, 'annular'=>$value->annular, 'total'=>$value->total));
                        }
                } else if($type=='velocity') {                        
                        $this->Api->total_remove_where('project_report_velocity', array('report_id'=>$this->report_id));
                        $_POST['report_id'] = $this->report_id;
                        $this->Api->create('project_report_velocity', $_POST);
                } else if($type=='annular') {
                        $this->Api->total_remove_where('project_report_annular_section', array('report_id'=>$this->report_id));
                        foreach ($values as $value) {                                  
                                $this->Api->create('project_report_annular_section', array('report_id'=>$this->report_id, 'description'=>$value->description, 'id_hole'=>$value->id_hole, 'od'=>$value->od, 'length'=>$value->length, 'capacity'=>$value->capacity, 'vel_critical'=>$value->vel_critical, 'plp'=>$value->plp, 'plb'=>$value->plb, 'regime'=>$value->regime));
                        }
                }
        }
        
        public function save_operational_info($type) {
                $values = json_decode($this->data_input);
                if($type=='bit') {
                        //Elimino los campos enviados con anterioridad para tener los nuevos almacenados
                        $this->Api->total_remove_where('project_report_bit', array('report_id'=>$this->report_id));                
                        foreach ($values as $value) {  
                                if(empty($values->brocas_modelos_id)) {//Para no generar error cuando no se digita algo
                                        //continue; ¿? Bug?? aún teniendo dato el brocas_modelos_id no seguía
                                }
                                $this->Api->create('project_report_bit', array('bit_number'=>$value->bit_number, 'brocas_modelos_id'=>$value->brocas_modelos_id, 'report_id'=>$this->report_id, 'jets1'=>$value->jets1, 'jets2'=>$value->jets2, 'jets3'=>$value->jets3, 'jets4'=>$value->jets4, 'jets5'=>$value->jets5, 'jets6'=>$value->jets6, 'jets7'=>$value->jets7, 'jets8'=>$value->jets8, 'jets9'=>$value->jets9, 'jets10'=>$value->jets10, 'jets11'=>$value->jets11, 'jets12'=>$value->jets12, 'result_jets'=>$value->result_jets, 'tfa'=>$value->tfa, 'vel_jets'=>$value->vel_jets, 'pd1'=>$value->pd1, 'pd2'=>$value->pd2, 'hhp'=>$value->hhp, 'hsi'=>$value->hsi));
                        }
                } else if($type=='pump') {                        
                        $this->Api->total_remove_where('project_report_pump', array('report_id'=>$this->report_id));                
                        foreach ($values as $value) {                                 
                                $this->Api->create('project_report_pump', array('report_id'=>$this->report_id, 'bombas_id'=>$value->bombas_id, 'efficiency'=>$value->efficiency, 'spm'=>$value->spm, 'gal'=>$value->gal, 'gpm'=>$value->gpm));
                        }
                } else if($type=='drillingtime') {
                        $this->Api->total_remove_where('project_report_drilling_time', array('report_id'=>$this->report_id));                
                        foreach ($values as $value) {                                 
                                $this->Api->create('project_report_drilling_time', array('report_id'=>$this->report_id, 'drilling'=>$value->drilling, 'time'=>$value->time));
                        }
                } else if($type=='drillingparameters') {
                        $this->Api->total_remove_where('project_report_drilling_parameters', array('report_id'=>$this->report_id));                
                        foreach ($values as $value) {                                 
                                $this->Api->create('project_report_drilling_parameters', array('report_id'=>$this->report_id, 'parameter'=>$value->parameter, 'unit'=>$value->unit, 'value'=>$value->value));
                        }
                } else if($type=='survey') {
                        $this->Api->total_remove_where('project_report_survey', array('report_id'=>$this->report_id));                
                        foreach ($values as $value) {                                 
                                $this->Api->create('project_report_survey', array('report_id'=>$this->report_id, 'survey'=>$value->parameter, 'unit'=>$value->unit, 'value'=>$value->value));
                        }
                }
        }

        public function save_mud_properties(){
		$values = json_decode($this->data_input); 
                //Elimino los campos enviados con anterioridad para tener los nuevos almacenados
                $this->Api->total_remove_where('project_report_test', array('report_id'=>$this->report_id));                
		foreach ($values as $value) {                        
                        if(empty($value->program_id)) {
                                $value->program_id= NULL;
                        }
                        $this->Api->create('project_report_test', array('report_id'=>$this->report_id, 'test_id'=>$value->test_id, 'program_id'=>$value->program_id, 'hour'=>$value->hour, 'value'=>$value->value));                        
		}
		echo json_encode(true);		
	}
        
        public function save_solids_control($type) {
                $values = json_decode($this->data_input);                
                if($type=='shakers') {
                        $this->Api->total_remove_where('project_report_shakers', array('report_id'=>$this->report_id));                
                        foreach ($values as $value) {                        
                                $this->Api->create('project_report_shakers', array('project_shakers_id'=>$value->project_sharkers_id, 'report_id'=>$this->report_id, 'operational_hours'=>$value->operational_hour, 'screens1'=>$value->screens1, 'screens2'=>$value->screens2, 'screens3'=>$value->screens3, 'screens4'=>$value->screens4, 'screens5'=>$value->screens5));                        
                        }
                } else if($type=='mudcleaner') {
                        $this->Api->total_remove_where('project_report_mudcleaner', array('report_id'=>$this->report_id));                
                        foreach ($values as $value) { 
                                if(empty($value->project_mudcleaner_id)) { //Por si no hay registros para no generar error en las fk
                                        continue;
                                }
                                $this->Api->create('project_report_mudcleaner', array('project_mudcleaner_id'=>$value->project_mudcleaner_id, 'report_id'=>$this->report_id, 'desander_flow'=>$value->desander_flow, 'desander_presure'=>$value->desander_presure, 'desander_hours'=>$value->desander_hours, 'destiler_flow'=>$value->destiler_flow, 'destiler_presure'=>$value->destiler_presure, 'destiler_hours'=>$value->destiler_hours, 'screens1'=>$value->screens1, 'screens2'=>$value->screens2, 'screens3'=>$value->screens3, 'screens4'=>$value->screens4, 'screens5'=>$value->screens5, 'operational_hours'=>$value->operational_hour));                        
                        }
                } else {
                        $this->Api->total_remove_where('project_report_centrifugues', array('report_id'=>$this->report_id));                
                        foreach ($values as $value) {                        
                                $this->Api->create('project_report_centrifugues', array('project_centrifugues_id'=>$value->project_centrifugues_id, 'report_id'=>$this->report_id, 'speed'=>$value->speed, 'overflow'=>$value->overflow, 'underflow'=>$value->underflow, 'feet_rate'=>$value->feet_rate, 'operational_hours'=>$value->operational_hours, 'bowl_diam'=>$value->bowl_diam, 'bowl_pulley'=>$value->bowl_pulley, 'motor_pulley'=>$value->motor_pulley, 'motor'=>$value->motor, 'speed_rpm'=>$value->speed_rmp, 'g_force'=>$value->g_force, 'type'=>$value->type));                        
                        }
                }
                echo json_encode(true);		
        }
        
        public function save_personal(){
		$values = json_decode($this->data_input); 
                //Elimino los campos enviados con anterioridad para tener los nuevos almacenados
                $this->Api->total_remove_where('project_report_personal', array('report_id'=>$this->report_id));
		foreach ($values as $value) {      
                        if(empty($value->personal_id)) { //Para que no genere error
                                continue;
                        }
                        $personal = $this->Api->get_where('personal', array('id'=>$value->personal_id));
                        $category = $personal[0]['category'];                                                
                        $this->Api->create('project_report_personal', array('report_id'=>$this->report_id, 'personal_id'=>$value->personal_id, 'personal_categories_id'=>$category, 'turn'=>$value->turn, 'cost'=>$value->cost));                        
		}
		echo json_encode(true);		
	}
        
        public function save_volumen($type) {
                $values = json_decode($this->data_input);
                if($type=='resumen') {
                        //Elimino los campos enviados con anterioridad para tener los nuevos almacenados
                        $this->Api->total_remove_where('project_report_volumen', array('report_id'=>$this->report_id));
                        $_POST['report_id'] = $this->report_id;
                        $this->Api->create('project_report_volumen', $_POST);
                } else if($type=='losses') {                        
                        $this->Api->total_remove_where('project_report_losses', array('report_id'=>$this->report_id));
                        $_POST['report_id'] = $this->report_id;                        
                        $this->Api->create('project_report_losses', $_POST);
                }
        }
        
        public function save_comments() {                
                //Elimino los campos enviados con anterioridad para tener los nuevos almacenados
                $this->Api->total_remove_where('project_report_comments', array('report_id'=>$this->report_id));
                $_POST['report_id'] = $this->report_id;
                $_POST['comments'] = nl2br($_POST["comments"]);
                $this->Api->create('project_report_comments', $_POST);                
        }
                
	public function dump_session(){
		print_r($this->session->all_userdata());
	}
}
/****** THE END ******/
