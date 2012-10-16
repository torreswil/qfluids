<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* API DE MATERIALES, VOLUMENES Y CONCENTRACIONES */
class Rest_mvc extends CI_Controller {
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


	//registrar un stock transfer
	public function register_stock_transfer(){
		$data = json_decode($this->data_input);
		
		//save the stock transfer
		$stock_transfer = array(
			'code'			=> $data->code,
			'date'			=> date('Y-m-d'),
			'origin'		=> $data->origin,
			'destiny'		=> $this->project_wellname.' ('.$this->project_operator.')',
			'project_id'	=> $this->project_id,
			'type'			=> $data->type
		);
		$id_st = $this->Api->create('stock_transfers',$stock_transfer);

		
		//por cada material afectado en el stock transfer...
		$materials = $data->materials;
		foreach ($materials as $material) {

			//verificar la cantidad que hay en stock, y sumar o restar segun sea el caso
			$this_material = $this->Api->get_where('inventory',array('product'=>$material->id,'project_id'=>$this->project_id));
			$this_material = $this_material[0];


			//actualizar la tabla del inventario
			if($data->type == 'incoming'){
				$this_material['avaliable'] = 	$this_material['avaliable'] + $material->quantity;
				$this_material['received']  =  	$this_material['received'] + $material->quantity;
			}else if($data->type == 'outgoing'){
				$this_material['avaliable'] = 	$this_material['avaliable'] - $material->quantity;
			}
			$this->Api->update_where('inventory',array('avaliable'=>$this_material['avaliable'],'received'=>$this_material['received']),array('product'=>$material->id,'project_id'=>$this->project_id));

			

			//actualizar la tabla del estado del inventario por dia
			$this_material_status = $this->Api->get_where('vista_reporte_estado_material',array('report'=>$this->report_id,'material'=>$material->id));
			$this_material_status = $this_material_status[0];
			$new_status = array(
				'received'  =>  $this_material_status['received'] 	+ $material->quantity,
				'stock' 	=>  $this_material_status['stock'] 	+ $material->quantity
			);
			$this->Api->update_where('report_materialstatus',$new_status,array('report'=>$this->report_id,'material'=>$material->id));

			

			//actualizar la tabla de movimientos del inventario
			$movimiento = array(
				'project_id' 	 => $this->project_id,
				'report'		 => $this->report_id,
				'timestamp' 	 => date('Y-m-d H:i:s'),
				'type' 			 => $data->type,
				'quantity'		 => $material->quantity,
				'product'		 => $material->id,
				'stock_transfer' => $id_st
			);
			$this->Api->create('inventory_movements',$movimiento);
			
		}

		echo json_encode(true);
	}


	//metodo para adicionar quimica y agua a un tanque
	public function chemical_adition(){
		if(isset($this->data_input)){
			
			$pill = json_decode($this->data_input);

			$tank 			= $pill->tank;
			$water 			= $pill->water_volume;
			$chemical 		= $pill->chemical_volume;
			$used_chemicals = $pill->chemicals;

			
			//registrar la adicion de quimica
			$chemical_adition = array(
				'project' 					=> $this->project_id,
				'report' 					=> $this->report_id,
				'tank' 						=> $tank,
				'total_volume_increment' 	=> $water + $chemical,
				'increment_by_chemical' 	=> $chemical,
				'increment_by_water' 		=> $water
			);

			$ca_id = $this->Api->create('chemical_aditions',$chemical_adition);
			
			
			foreach ($used_chemicals as $chemical) {
				$material 	= $chemical->id;
				$used 		= $chemical->used;
				$volume 	= $chemical->volume;

				//registrar el detalle de la adicion de quimica
				$chemical_adition_detail = array(
					'chemical_adition' 	=> $ca_id,
					'material' 			=> $material,
					'used' 				=> $used,
					'volume_increment' 	=> $volume
				);
				$this->Api->create('chemical_aditions_detail',$chemical_adition_detail);

				//registrar el movimiento del inventario
				$inventory_movement = array(
					'project_id' 		=> $this->project_id,
					'report' 			=> $this->report_id,
					'timestamp' 	 	=> date('Y-m-d H:i:s'),
					'type' 				=> 2,
					'quantity' 			=> $used,
					'product' 			=> $material,
					'chemical_adition' 	=> $ca_id
				);
				$this->Api->create('inventory_movements',$inventory_movement);

				//hacer el descargo del inventario
				$estado_actual = $this->Api->get_where('inventory',array('product'=>$material,'project_id'=>$this->project_id));
				$estado_actual = $estado_actual[0];
				$inventory_update = array(
					'used' 		=> $estado_actual['used'] + $used,
					'avaliable' => $estado_actual['avaliable'] - $used
				);
				$this->Api->update_where('inventory',$inventory_update,array('product'=>$material,'project_id'=>$this->project_id));

				
				//actualizar la tabla de estado del inventario para el dia
				$this_material_status = $this->Api->get_where('vista_reporte_estado_material',array('report'=>$this->report_id,'material'=>$material));
				$this_material_status = $this_material_status[0];
				$report_inventory_update = array(
					'used' 	=> $this_material_status['used'] 	+ $used,
					'stock' => $this_material_status['stock'] 	- $used
				);
				$this->Api->update_where('report_materialstatus',$report_inventory_update,array('report'=>$this->report_id,'material'=>$material));
			}
		}

		echo json_encode(true);
	}

}