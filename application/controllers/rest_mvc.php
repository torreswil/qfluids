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
		$this->tanks 			= $this->Api->get_where('vista_tanks',array('project'=>$this->project_id));
	}

	public function index(){
		redirect('/main/login');
	}

	public function load_current_concentrations(){
		
		$materials 		= $this->Api->get_where('vista_inventario',array('project'=>$this->project_id,'used_in_project'=>1),array('commercial_name','asc'));
		$trip_tanks 	= $this->Api->get_where('vista_tanks',array('project'=>$this->project_id,'tank_category'=>'trip','active'=>1),array('order','asc'));
		$pill_tanks 	= $this->Api->get_where('vista_tanks',array('project'=>$this->project_id,'tank_category'=>'pill','active'=>1),array('order','asc'));
		$reserve_tanks 	= $this->Api->get_where('vista_tanks',array('project'=>$this->project_id,'tank_category'=>'reserve','active'=>1),array('order','asc'));

		foreach ($materials as $material){ ?>
			<tr>
				<td><input style="width:200px;max-width:357px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
				<td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
				<td>

					<?php 
						//obtener el estado actual del tanque
						$id_estado_actual = $this->Api->get_where('tank_status_time',array('activo'=>1,'tank'=>0));
						if(count($id_estado_actual) > 0){
							$id_estado_actual = $id_estado_actual[0];
							$id_estado_actual = $id_estado_actual['id'];

							//obtener la concentracion para este producto
							$concentracion = $this->Api->get_where('concentrations',array('tank_status_time' => $id_estado_actual, 'material'=>$material['product_id']));
							$concentracion = $concentracion[0]['concentracion'];	
						}else{
							$concentracion = 0;
						}
						
					?>
					<input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_0" disabled value="<?= number_format($concentracion,2,'.','') ?>" />
				</td>
				<?php foreach($trip_tanks as $tank){ ?>
					<?php 
						
						//obtener el estado actual del tanque
						$id_estado_actual = $this->Api->get_where('tank_status_time',array('activo'=>1,'tank'=>$tank['id']));
						$id_estado_actual = $id_estado_actual[0];
						$id_estado_actual = $id_estado_actual['id'];

						//obtener la concentracion para este producto
						$concentracion = $this->Api->get_where('concentrations',array('tank_status_time' => $id_estado_actual, 'material'=>$material['product_id']));
						if(count($concentracion) > 0){
							$concentracion = $concentracion[0]['concentracion'];	
						}else{
							$concentracion = 0;	
						}
					?>
                  	<td><input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_<?= $tank['id'] ?>" disabled value="<?= number_format($concentracion,2,'.','') ?>" /></td>
                <?php }?>

				<td>

					<?php 
						//obtener el estado actual del tanque
						$id_estado_actual = $this->Api->get_where('tank_status_time',array('activo'=>1,'tank'=>99));
						if(count($id_estado_actual) > 0){
							$id_estado_actual = $id_estado_actual[0];
							$id_estado_actual = $id_estado_actual['id'];

							//obtener la concentracion para este producto
							$concentracion = $this->Api->get_where('concentrations',array('tank_status_time' => $id_estado_actual, 'material'=>$material['product_id']));
							$concentracion = $concentracion[0]['concentracion'];	
						}else{
							$concentracion = 0;
						}
						
					?>
					<input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_99" disabled value="<?= number_format($concentracion,2,'.','') ?>" />
				</td>
				
				<?php foreach($pill_tanks as $tank){ ?>
					<?php 
						
						//obtener el estado actual del tanque
						$id_estado_actual = $this->Api->get_where('tank_status_time',array('activo'=>1,'tank'=>$tank['id']));
						$id_estado_actual = $id_estado_actual[0];
						$id_estado_actual = $id_estado_actual['id'];

						//obtener la concentracion para este producto
						$concentracion = $this->Api->get_where('concentrations',array('tank_status_time' => $id_estado_actual, 'material'=>$material['product_id']));
						if(count($concentracion) > 0){
							$concentracion = $concentracion[0]['concentracion'];	
						}else{
							$concentracion = 0;	
						}
					?>
                  	<td><input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_<?= $tank['id'] ?>" disabled value="<?= number_format($concentracion,2,'.','') ?>" /></td>
                <?php }?>
                <?php foreach($reserve_tanks as $tank){ ?>
                    <?php 
						//obtener el estado actual del tanque
						$id_estado_actual = $this->Api->get_where('tank_status_time',array('activo'=>1,'tank'=>$tank['id']));
						$id_estado_actual = $id_estado_actual[0];
						$id_estado_actual = $id_estado_actual['id'];

						//obtener la concentracion para este producto
						$concentracion = $this->Api->get_where('concentrations',array('tank_status_time' => $id_estado_actual, 'material'=>$material['product_id']));
						if(count($concentracion) > 0){
							$concentracion = $concentracion[0]['concentracion'];	
						}else{
							$concentracion = 0;	
						}
					?>	
                    <td><input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_<?= $tank['id'] ?>" disabled value="<?= number_format($concentracion,2,'.','') ?>" /></td>
                <?php }?>
			</tr>
		<?php }
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


			
			if($tank == 0){
				$tank_name = 'Active'; 
			}else{
				$tank_detail = $this->Api->get_where('vista_tanks',array('id'=>$tank));
				$tank_name 	 = $tank_name[0]['tank_name'];
			}
			//guardar la adicion de quimica en el tronco
			$trunk_data = array(
				'description' 	=> $water.' bbl of water and '.$chemical.' bbl of chemicals added to '.$tank_name,
				'tree' 			=> 'chemical_adition',
				'subtree' 		=> $ca_id
			);
			$this->create_trunk_node($trunk_data);
			
			
			foreach ($used_chemicals as $this_chemical) {
				$material 	= $this_chemical->id;
				$used 		= $this_chemical->used;
				$volume 	= $this_chemical->volume;

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




		//ESTADO DEL TANQUE
		//inicializar el tanque en la tabla de estados si el tanque no ha sido iniciado antes.
		if(count($this->Api->get_where('tank_status_time',array('tank'=>$tank))) == 0){
			
			$nuevo_tanque = array(
				'project' 						=> $this->project_id,
				'report'	 					=> $this->report_id,
				'tank' 							=> $tank,
				'producto_de' 					=> 'inicio',
				'activo'						=> 1,
				'volumen_inicial'				=> 0,
				'volumen_recibido' 				=> 0,
				'volumen_adicion_quimica'		=> 0,
				'volumen_adicion_agua' 			=> 0,
				'volumen_construido' 			=> 0,
				'volumen_transferido_reservas' 	=> 0,
				'volumen_transferido_activo' 	=> 0,
				'volumen_perdido' 			 	=> 0,
				'volumen_final' 			 	=> 0
			);

			$id_nuevo_estado_tanque = $this->Api->create('tank_status_time',$nuevo_tanque);			
		}

		//crear un nuevo estado de tanque (una adicion de quimica es igual a una transferencia de volumen)
		//consultar el estado inmediatamente anterior
		$condicion_estado_tanque = array(
			'tank' 		=> $tank,
			'report'	=> $this->report_id,
			'project' 	=> $this->project_id,
			'activo' 	=> 1
		);
		$estado_actual_tanque = $this->Api->get_where('tank_status_time',$condicion_estado_tanque);
		$estado_actual_tanque = $estado_actual_tanque[0];


		//si el tanque destino es el sistema activo
		$nuevo_estado_tanque = array(
			'project' 						=> $this->project_id,
			'report'	 					=> $this->report_id,
			'tank' 							=> $tank,
			'producto_de' 					=> 'adicion_quimica',
			'activo'						=> 1,
			'volumen_inicial'				=> $estado_actual_tanque['volumen_inicial'],
			'volumen_recibido' 				=> $estado_actual_tanque['volumen_recibido'],
			'volumen_adicion_quimica'		=> $estado_actual_tanque['volumen_adicion_quimica'] + $chemical,
			'volumen_adicion_agua' 			=> $estado_actual_tanque['volumen_adicion_agua'] + $water,
			'volumen_construido' 			=> ($estado_actual_tanque['volumen_adicion_quimica'] + $chemical) + ($estado_actual_tanque['volumen_adicion_agua'] + $water),
			'volumen_transferido_reservas' 	=> $estado_actual_tanque['volumen_transferido_reservas'],
			'volumen_transferido_activo' 	=> $estado_actual_tanque['volumen_transferido_activo'],
			'volumen_perdido' 			 	=> $estado_actual_tanque['volumen_perdido'],
			'volumen_final' 			 	=> $estado_actual_tanque['volumen_final'] + $water + $chemical
		);

		//desactivar el estado actual del tanque
		$this->Api->update('tank_status_time',array('activo'=>0),$estado_actual_tanque['id']);

		//incrustar el nuevo estado del tanque
		$id_nuevo_estado_tanque = $this->Api->create('tank_status_time',$nuevo_estado_tanque);

		//asociar el nuevo estado del tanque con la adicion de quimica recien ejecutada
		$this->Api->update('chemical_aditions',array('status_producido' =>$id_nuevo_estado_tanque),$ca_id);

		//inicializar los espacios para actualizar la concentracion en la tabla de concentraciones
		$productos = $this->Api->get_where('vista_inventario',array('project'=>$this->project_id,'used_in_project'=>1),array('commercial_name','asc'));
		foreach ($productos as $producto) {
			$concentracion_en_blanco = array(
				'tank_status_time'  => $id_nuevo_estado_tanque,
				'material' 			=> $producto['product_id'],
				'concentracion'  	=> 0
			);

			$this->Api->create('concentrations',$concentracion_en_blanco);

			//por cada material, clonar la concentracion inmediatamente anterior
			$estado_actual_material = $this->Api->get_where('concentrations',array('material'=>$producto['product_id'],'tank_status_time'=>$estado_actual_tanque['id']));
			if(count($estado_actual_material) > 0){
				$estado_actual_material = $estado_actual_material[0];
				$vieja_concentracion = array(
					'concentracion' 	=> $estado_actual_material['concentracion']
				);
				$this->Api->update_where('concentrations',$vieja_concentracion,array('tank_status_time'=>$id_nuevo_estado_tanque,'material'=>$producto['product_id']));	
			}
		}

		//listar todos los materiales que vienen en la peticion
		foreach ($used_chemicals as $este_material) {
			$estado_actual_material = $this->Api->get_where('concentrations',array('material'=>$este_material->id,'tank_status_time'=>$estado_actual_tanque['id']));
			if(count($estado_actual_material) > 0){
				$estado_actual_material = $estado_actual_material[0];	
			}else{
				$estado_actual_material = array('concentracion'=>0);	
			}
			
			
			//por cada material, actualizar el record con la nueva concentracion del tanque y asociarlo con el estado recientemente creado
			$concentracion = array(
				'concentracion'  	=> ($estado_actual_material['concentracion'] * $estado_actual_tanque['volumen_final'] + $este_material->add_quimica) / (($water + $chemical) + $estado_actual_tanque['volumen_final'])
			);

			$this->Api->update_where('concentrations',$concentracion,array('tank_status_time'=>$id_nuevo_estado_tanque,'material'=>$este_material->id));
		}
		
		echo json_encode(true);
	}


	public function transferencia_volumen(){
		if(isset($this->data_input)){
			$data 		= json_decode($this->data_input);
			$origen 	= $data->origin;
			$destino 	= $data->destiny;
			$volumen 	= $data->volume;

			//obtener el estado original del origen y el estado original del destino
			$estado_origen = $this->Api->get_where('tank_status_time',array('project'=>$this->project_id,'tank'=>$origen,'activo'=>1));
			if(count($estado_origen) == 0){
				$estado_origen = array(
					'id'							=> 0,
					'project'						=> $this->project_id,
					'report'						=> $this->report_id,
					'tank'							=> $origen,
					'producto_de' 					=> 'transferencia_volumen',
					'activo'						=> 1,
					'volumen_inicial'				=> 0,
					'volumen_recibido'				=> 0,
					'volumen_adicion_quimica'		=> 0,
					'volumen_adicion_agua' 			=> 0,
					'volumen_construido'			=> 0,
					'volumen_transferido_reservas' 	=> 0,
					'volumen_transferido_activo' 	=> 0,
					'volumen_perdido' 				=> 0,
					'volumen_final'					=> 0
				);
			}else{
				$estado_origen = $estado_origen[0];
				$this->Api->update('tank_status_time',array('activo'=>0),$estado_origen['id']);
			}

			$estado_destino = $this->Api->get_where('tank_status_time',array('project'=>$this->project_id,'tank'=>$destino,'activo'=>1));

			if(count($estado_destino) == 0){
				$estado_destino = array(
					'id'							=> 0,
					'project'						=> $this->project_id,
					'report'						=> $this->report_id,
					'tank'							=> $origen,
					'producto_de' 					=> 'transferencia_volumen',
					'activo'						=> 1,
					'volumen_inicial'				=> 0,
					'volumen_recibido'				=> 0,
					'volumen_adicion_quimica'		=> 0,
					'volumen_adicion_agua' 			=> 0,
					'volumen_construido'			=> 0,
					'volumen_transferido_reservas' 	=> 0,
					'volumen_transferido_activo' 	=> 0,
					'volumen_perdido' 				=> 0,
					'volumen_final'					=> 0
				);	
			}else{
				$estado_destino = $estado_destino[0];
				$this->Api->update('tank_status_time',array('activo'=>0),$estado_destino['id']);
			}


			//crear una nueva transferencia en la base de datos y documentar
			//el estado original del origen y el estado original del destino

			$vt_data = array(
				'project'				=> $this->project_id,
				'report' 				=> $this->report_id,
				'destiny'				=> $destino,
				'origin' 				=> $origen,
				'from_origin_status' 	=> $estado_origen['id'],
				'from_destiny_status' 	=> $estado_destino['id'],
				'to_origin_status' 	  	=> 0,
				'to_destiny_status'		=> 0,
				'volume' 				=> $volumen
			);			
			$id_transferencia = $this->Api->create('volume_transfers',$vt_data);

			

			//guardar la transferencia de volumen en el tronco
			if($origen == 0){
				$nombre_origen = 'Active';
			}else if($origen == 99){
				$nombre_origen = 'Out of Short Circuit';
			}else{
				$nombre_origen = $this->Api->get_where('vista_tanks',array('id'=>$origen));
				$nombre_origen = $nombre_origen[0]['tank_name'];
			}

			if($destino == 0){
				$nombre_destino = 'Active';
			}else if($destino == 99){
				$nombre_destino = 'Out of Short Circuit';
			}else{
				$nombre_destino = $this->Api->get_where('vista_tanks',array('id'=>$destino));
				$nombre_destino = $nombre_destino[0]['tank_name'];
			}

			$trunk_data = array(
				'description' 	=> $volumen.' bbl of mud moved from '.$nombre_origen.' to '.$nombre_destino,
				'tree' 			=> 'volume_transfer',
				'subtree' 		=> $id_transferencia
			);
			$this->create_trunk_node($trunk_data);




			//calcular el nuevo estado del origen si el origen es el activo
			if($origen == 0){
				$nuevo_estado_origen = array(
					'project'						=> $this->project_id,
					'report'						=> $this->report_id,
					'tank'							=> $origen,
					'producto_de' 					=> 'transferencia_volumen',
					'activo'						=> 1,
					'volumen_inicial'				=> $estado_origen['volumen_inicial'],
					'volumen_recibido'				=> $estado_origen['volumen_recibido'],
					'volumen_adicion_quimica'		=> $estado_origen['volumen_adicion_quimica'],
					'volumen_adicion_agua' 			=> $estado_origen['volumen_adicion_agua'],
					'volumen_construido'			=> $estado_origen['volumen_construido'],
					'volumen_transferido_reservas' 	=> $estado_origen['volumen_transferido_reservas'] + $volumen,
					'volumen_transferido_activo' 	=> '',
					'volumen_perdido' 				=> $estado_origen['volumen_perdido'],
					'volumen_final'					=> $estado_origen['volumen_final'] - $volumen
				);

				if($destino == 99){
					$nuevo_estado_origen['volumen_transferido_reservas'] 	= $estado_origen['volumen_transferido_reservas'];
					$nuevo_estado_origen['volumen_transferido_osc'] 		= $estado_origen['volumen_transferido_osc'] + $volumen; 
				}

			//calcular el nuevo estado del origen si el origen es una reserva	
			}else{
				$nuevo_estado_origen = array(
					'project'						=> $this->project_id,
					'report'						=> $this->report_id,
					'tank'							=> $origen,
					'producto_de' 					=> 'transferencia_volumen',
					'activo'						=> 1,
					'volumen_inicial'				=> $estado_origen['volumen_inicial'],
					'volumen_recibido'				=> $estado_origen['volumen_recibido'],
					'volumen_adicion_quimica'		=> $estado_origen['volumen_adicion_quimica'],
					'volumen_adicion_agua' 			=> $estado_origen['volumen_adicion_agua'],
					'volumen_construido'			=> $estado_origen['volumen_construido'],
					'volumen_transferido_reservas' 	=> '',
					'volumen_transferido_activo' 	=> $estado_origen['volumen_transferido_activo'] + $volumen,
					'volumen_perdido' 				=> $estado_origen['volumen_perdido'],
					'volumen_final'					=> $estado_origen['volumen_final'] - $volumen
				);
			}
			
			$id_nuevo_estado_origen = $this->Api->create('tank_status_time',$nuevo_estado_origen);

			//calcular el nuevo estado del destino
			$nuevo_estado_destino = array(
				'project'						=> $this->project_id,
				'report'						=> $this->report_id,
				'tank'							=> $destino,
				'producto_de' 					=> 'transferencia_volumen',
				'activo'						=> 1,
				'volumen_inicial'				=> $estado_destino['volumen_inicial'],
				'volumen_recibido'				=> $estado_destino['volumen_recibido'] + $volumen,
				'volumen_adicion_quimica'		=> $estado_destino['volumen_adicion_quimica'],
				'volumen_adicion_agua' 			=> $estado_destino['volumen_adicion_agua'],
				'volumen_construido'			=> $estado_destino['volumen_construido'],
				'volumen_transferido_reservas' 	=> $estado_destino['volumen_transferido_reservas'],
				'volumen_transferido_activo' 	=> $estado_destino['volumen_transferido_activo'],
				'volumen_perdido' 				=> $estado_destino['volumen_perdido'],
				'volumen_final'					=> $estado_destino['volumen_final'] + $volumen
			);

			if($origen == 99){
				$nuevo_estado_destino['volumen_recibido'] 		= $estado_destino['volumen_recibido'];
				$nuevo_estado_destino['volumen_recibido_osc'] 	= $estado_destino['volumen_recibido_osc'] + $volumen; 
			}


			$id_nuevo_estado_destino = $this->Api->create('tank_status_time',$nuevo_estado_destino);

			//actualizar la tabla de transferencias de volumen
			$this->Api->update('volume_transfers',array('to_origin_status'=>$id_nuevo_estado_origen,'to_destiny_status'=>$id_nuevo_estado_destino),$id_transferencia);

			//obtener la lista de los productos
			$productos = $this->Api->get_where('vista_inventario',array('project'=>$this->project_id,'used_in_project'=>1),array('commercial_name','asc'));

			
			foreach ($productos as $producto) {
				//ORIGEN
				//inicializar los espacios para actualizar la concentracion en la tabla de concentraciones para el origen (las concentraciones no cambian)
				$concentracion_en_blanco = array(
					'tank_status_time'  => $id_nuevo_estado_origen,
					'material' 			=> $producto['product_id'],
					'concentracion'  	=> 0
				);

				$this->Api->create('concentrations',$concentracion_en_blanco);

				//por cada material, clonar la concentracion inmediatamente anterior
				$estado_actual_material = $this->Api->get_where('concentrations',array('material'=>$producto['product_id'],'tank_status_time'=>$estado_origen['id']));
				
				if(count($estado_actual_material) > 0){
					$estado_actual_material = $estado_actual_material[0];
					
					$vieja_concentracion_origen = array(
						'concentracion' 	=> $estado_actual_material['concentracion']
					);
					
					$this->Api->update_where('concentrations',$vieja_concentracion_origen,array('tank_status_time'=>$id_nuevo_estado_origen,'material'=>$producto['product_id']));
				}


				//DESTINO
				//inicializar los espacios para actualizar la concentracion en la tabla de concentraciones para el destino (las concentraciones del destino varian)
				$concentracion_en_blanco = array(
					'tank_status_time'  => $id_nuevo_estado_destino,
					'material' 			=> $producto['product_id'],
					'concentracion'  	=> 0
				);

				$this->Api->create('concentrations',$concentracion_en_blanco);

				//por cada material, clonar la concentracion inmediatamente anterior
				$estado_actual_material_d = $this->Api->get_where('concentrations',array('material'=>$producto['product_id'],'tank_status_time'=>$estado_destino['id']));
				
				if(count($estado_actual_material_d) > 0){
					$estado_actual_material_d = $estado_actual_material_d[0];
					$vieja_concentracion_destino = array(
						'concentracion' 	=> $estado_actual_material_d['concentracion']
					);
					$this->Api->update_where('concentrations',$vieja_concentracion_destino,array('tank_status_time'=>$id_nuevo_estado_destino,'material'=>$producto['product_id']));
				}else{
					if($destino != 99){
						$vieja_concentracion_destino = array(
							'concentracion' 	=> 0
						);	
					}else{
						$vieja_concentracion_destino = array(
							'concentracion' 	=> $estado_actual_material['concentracion']
						);
					}
				}

				//por cada material, recalcular la concentracion
				$nueva_concentracion = array(
					'concentracion' 	=> ($volumen * $vieja_concentracion_origen['concentracion'] + $estado_destino['volumen_final'] * $vieja_concentracion_destino['concentracion']) / ($volumen + $estado_destino['volumen_final'])
				);
				$this->Api->update_where('concentrations',$nueva_concentracion,array('tank_status_time'=>$id_nuevo_estado_destino,'material'=>$producto['product_id']));	
				

				//OTRA VEZ ORIGEN
				if($nuevo_estado_origen['volumen_final'] < 1){
					$vieja_concentracion_origen = array(
						'concentracion' 	=> 0
					);
					$this->Api->update_where('concentrations',$vieja_concentracion_origen,array('tank_status_time'=>$id_nuevo_estado_origen,'material'=>$producto['product_id']));
				}	
			}

			echo json_encode(true);
		}
	}

	//metodo para entregarle al cliente la información mas reciente conocida de un tanque
	public function load_tank_status(){
		$tanques = array();
		
		//obtener la informacion del sistema activo
		$active_tank_status = $this->Api->get_where('tank_status_time',array('tank'=>0,'project'=>$this->project_id,'report'=>$this->report_id,'activo'=>1),array('id','desc'));
		
		if(count($active_tank_status) > 0){
			$active_tank_status = $active_tank_status[0];
			$tanques['active'] = array(
				'id'							=> 0,
				'name'							=> 'active',
				'volumen_inicial'				=> $active_tank_status['volumen_inicial'],				
				'volumen_recibido'				=> $active_tank_status['volumen_recibido'],
				'volumen_adicion_quimica'		=> $active_tank_status['volumen_adicion_quimica'],
				'volumen_adicion_agua'			=> $active_tank_status['volumen_adicion_agua'],
				'volumen_construido' 			=> $active_tank_status['volumen_construido'],
				'volumen_transferido_reservas' 	=> $active_tank_status['volumen_transferido_reservas'],
				'volumen_transferido_activo'	=> $active_tank_status['volumen_transferido_activo'],
				'volumen_perdido'				=> $active_tank_status['volumen_perdido'],
				'volumen_final'					=> $active_tank_status['volumen_final'],
				'volumen_transferido_osc' 		=> $active_tank_status['volumen_transferido_osc'],
				'volumen_recibido_osc' 			=> $active_tank_status['volumen_recibido_osc']
			);			
		}else{
			$tanques['active'] = array(
				'id'							=> 0,
				'name'							=> 'active',
				'volumen_inicial'				=> 0,				
				'volumen_recibido'				=> 0,
				'volumen_adicion_quimica'		=> 0,
				'volumen_adicion_agua'			=> 0,
				'volumen_construido' 			=> 0,
				'volumen_transferido_reservas' 	=> 0,
				'volumen_transferido_activo'	=> 0,
				'volumen_perdido'				=> 0,
				'volumen_final'					=> 0,
				'volumen_transferido_osc' 		=> 0,
				'volumen_recibido_osc' 			=> 0
			);	
		}



		$tanques['all_tanks'] = array();


		//listar e informar sobre todos los demas tanques. 
		//Si no hay información disponible, ponerlos en cero.
		$project_tanks 	= $this->Api->get_where('vista_tanks',array('project'=>$this->project_id,'active'=>1),array('order','asc'));
		foreach ($project_tanks as $tank) {
			//obtener el id del tanque
			$tank_id 		= $tank['id'];
			$tank_status 	= $this->Api->get_where('tank_status_time',array('tank'=>$tank_id,'project'=>$this->project_id,'report'=>$this->report_id,'activo'=>1),array('id','desc'));
			if(count($tank_status) > 0){
				$tank_status = $tank_status[0]; 	
				$este_tanque = array(
					'id'							=> $tank_id,
					'name'							=> $tank['tank_name'],
					'volumen_inicial'				=> $tank_status['volumen_inicial'],				
					'volumen_recibido'				=> $tank_status['volumen_recibido'],
					'volumen_adicion_quimica'		=> $tank_status['volumen_adicion_quimica'],
					'volumen_adicion_agua'			=> $tank_status['volumen_adicion_agua'],
					'volumen_construido' 			=> $tank_status['volumen_construido'],
					'volumen_transferido_reservas' 	=> $tank_status['volumen_transferido_reservas'],
					'volumen_transferido_activo'	=> $tank_status['volumen_transferido_activo'],
					'volumen_perdido'				=> $tank_status['volumen_perdido'],
					'volumen_final'					=> $tank_status['volumen_final'],
					'volumen_transferido_osc' 		=> $tank_status['volumen_transferido_osc'],
					'volumen_recibido_osc' 			=> $tank_status['volumen_recibido_osc']
				);	
			}else{
				$este_tanque = array(
					'id'							=> $tank_id,
					'name'							=> $tank['tank_name'],
					'volumen_inicial'				=> 0,				
					'volumen_recibido'				=> 0,
					'volumen_adicion_quimica'		=> 0,
					'volumen_adicion_agua'			=> 0,
					'volumen_construido' 			=> 0,
					'volumen_transferido_reservas' 	=> 0,
					'volumen_transferido_activo'	=> 0,
					'volumen_perdido'				=> 0,
					'volumen_final'					=> 0,
					'volumen_transferido_osc' 		=> 0,
					'volumen_recibido_osc' 			=> 0
				);
			}

			array_push($tanques['all_tanks'], $este_tanque);
			
		}

		$tank_id 		= 99;
		$tank_status 	= $this->Api->get_where('tank_status_time',array('tank'=>$tank_id,'project'=>$this->project_id,'report'=>$this->report_id,'activo'=>1),array('id','desc'));
		if(count($tank_status) > 0){
			$tank_status = $tank_status[0]; 	
			$este_tanque = array(
				'id'							=> $tank_id,
				'name'							=> 'Out of Active',
				'volumen_inicial'				=> $tank_status['volumen_inicial'],				
				'volumen_recibido'				=> $tank_status['volumen_recibido'],
				'volumen_adicion_quimica'		=> $tank_status['volumen_adicion_quimica'],
				'volumen_adicion_agua'			=> $tank_status['volumen_adicion_agua'],
				'volumen_construido' 			=> $tank_status['volumen_construido'],
				'volumen_transferido_reservas' 	=> $tank_status['volumen_transferido_reservas'],
				'volumen_transferido_activo'	=> $tank_status['volumen_transferido_activo'],
				'volumen_perdido'				=> $tank_status['volumen_perdido'],
				'volumen_final'					=> $tank_status['volumen_final'],
				'volumen_transferido_osc' 		=> $tank_status['volumen_transferido_osc'],
				'volumen_recibido_osc' 			=> $tank_status['volumen_recibido_osc']
			);	
		}else{
			$este_tanque = array(
				'id'							=> $tank_id,
				'name'							=> 'Out of Active',
				'volumen_inicial'				=> 0,				
				'volumen_recibido'				=> 0,
				'volumen_adicion_quimica'		=> 0,
				'volumen_adicion_agua'			=> 0,
				'volumen_construido' 			=> 0,
				'volumen_transferido_reservas' 	=> 0,
				'volumen_transferido_activo'	=> 0,
				'volumen_perdido'				=> 0,
				'volumen_final'					=> 0,
				'volumen_transferido_osc' 		=> 0,
				'volumen_recibido_osc' 			=> 0
			);
		}

		array_push($tanques['all_tanks'], $este_tanque);

		//print_r($tanques);
		echo json_encode($tanques);
	}

	public function load_single_tank(){
		if(count($_POST) > 0){
			$materials = $this->Api->get_where('vista_materiales',array('project'=>$this->project_id,'used_in_project'=>1),array('commercial_name','asc'));
			$tank_status = $this->Api->get_where('tank_status_time',array('project'=>$this->project_id,'activo'=>1,'tank'=>$_POST['tank']));	
			$output = array();
			if(count($tank_status) > 0){
				$tank_status = $tank_status[0];
				//estado del tanque
				$output['status'] = $tank_status;
				$output['concentrations'] = array();

				foreach ($materials as $material) {
					$esta_concentracion = array();
					//obtener la concentracion
					$concentracion = $this->Api->get_where('concentrations',array('tank_status_time' => $tank_status['id'],'material'=>$material['id']));
					if(count($concentracion) > 0){
						$esta_concentracion['material'] 		= $concentracion[0]['material'];
						$esta_concentracion['concentration'] 	= $concentracion[0]['concentracion']; 
					}else{
						$esta_concentracion['material'] 		= $material['id'];
						$esta_concentracion['concentration'] 	= 0; 	
					}

					array_push($output['concentrations'], $esta_concentracion);
				}
			}else{
				$output['status'] 			= array(
					'id'							=> $_POST['tank'],
					'volumen_inicial'				=> 0,				
					'volumen_recibido'				=> 0,
					'volumen_adicion_quimica'		=> 0,
					'volumen_adicion_agua'			=> 0,
					'volumen_construido' 			=> 0,
					'volumen_transferido_reservas' 	=> 0,
					'volumen_transferido_activo'	=> 0,
					'volumen_perdido'				=> 0,
					'volumen_final'					=> 0,
					'volumen_transferido_osc' 		=> 0,
					'volumen_recibido_osc' 			=> 0	
				);
				$output['concentrations'] 	= array();
				foreach ($materials as $material) {
					$esta_concentracion 					= array();
					$esta_concentracion['material'] 		= $material['id'];
					$esta_concentracion['concentration'] 	= 0;
					array_push($output['concentrations'], $esta_concentracion); 	
				}	
			}

			echo json_encode($output);
		}	
	}

	public function load_materials_status(){
		$materials = $this->Api->get_where('vista_reporte_estado_material',array('project'=>$this->project_id,'report'=>$this->report_id),array('commercial_name','asc'));
		foreach ($materials as $material) { ?>
			<tr class="this_material_<?= $material['material']?> ">
	            <td><input style="width:300px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
	            <td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
	            <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['egravity'] ?>" /></td>
	            <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="$<?= $material['price'] ?>" /></td>
	            <td><input style="width:55px;margin-right:0;" type="text" id="minitial_<?= $material['material']?>" value="<?= $material['initial'] ?>" disabled  /></td>
	            <td><input style="width:55px;margin-right:0;" type="text" id="mreceived_<?= $material['material']?>" value="<?= $material['received'] ?>" disabled /></td>
	            <td><input style="width:55px;margin-right:0;" type="text" id="mtransf_<?= $material['material']?>" value="<?= $material['transfered'] ?>" disabled /></td>
	            <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['used'] ?>" id="stotal_consumption_today_<?= $material['material']?>" /></td>
	            <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['stock'] ?>" id="mstock_<?= $material['material']?>" class="mstock" /></td>
	            <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="$<?= $material['used'] * $material['price'] ?>" /></td>
	          </tr>  <?php
		}
	}

	public function load_today_consumptions(){
			$materials = $this->Api->get_where('vista_materiales',array('project'=>$this->project_id,'used_in_project'=>1),array('commercial_name','asc'));
			$pill_tanks 	= $this->Api->get_where('vista_tanks',array('project'=>$this->project_id,'tank_category'=>'pill','active'=>1),array('order','asc'));
			$reserve_tanks 	= $this->Api->get_where('vista_tanks',array('project'=>$this->project_id,'tank_category'=>'reserve','active'=>1),array('order','asc'));
		?>
			 <?php foreach ($materials as $material) { 
			 	$used_acum = 0;
			 ?>
                <tr class="this_material_<?= $material['id']?> ">
                    <td><input style="width:200px;max-width:357px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
                    <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
                    <?php 
                    	$chemical_aditions = $this->Api->get_where('vista_detalle_adicion_quimica',array('tank'=>0,'report'=>$this->report_id,'material'=>$material['id']));
                    	$used = 0;
                    	foreach ($chemical_aditions as $adition) {
                			$used = $used + $adition['used'];
                		}

                		$used_acum = $used_acum + $used;
                    ?>
                    <td><input value="<?= $used; ?>" type="text" style="width:55px;margin-right:0;" id="iused_<?= $material['id'] ?>_0" class="used_<?= $material['id'] ?>" disabled /></td>
                    <?php foreach($pill_tanks as $tank){ ?>
                    	<?php 
                    		$chemical_aditions = $this->Api->get_where('vista_detalle_adicion_quimica',array('tank'=>$tank['id'],'report'=>$this->report_id,'material'=>$material['id']));
                    		$used = 0;
                    		foreach ($chemical_aditions as $adition) {
                    			$used = $used + $adition['used'];
                    		}
                    		$used_acum = $used_acum + $used;
                    	?>
                      	<td><input value="<?= $used; ?>" type="text" style="width:55px;margin-right:0;" id="iused_<?= $material['id'] ?>_<?= $tank['id'] ?>" class="used_<?= $material['id'] ?>" disabled /></td>
                    <?php }?>
                    <?php foreach($reserve_tanks as $tank){ ?>
                      <?php if($tank['name'] < 32){ ?>
                      	<?php 
                    		$chemical_aditions = $this->Api->get_where('vista_detalle_adicion_quimica',array('tank'=>$tank['id'],'report'=>$this->report_id,'material'=>$material['id']));
                    		$used = 0;
                    		foreach ($chemical_aditions as $adition) {
                    			$used = $used + $adition['used'];
                    		}
                    		$used_acum = $used_acum + $used;
                    	?>
                        <td><input  value="<?= $used; ?>" type="text" style="width:55px;margin-right:0;" id="iused_<?= $material['id'] ?>_<?= $tank['id'] ?>" class="used_<?= $material['id'] ?>" disabled /></td>
                      <?php } ?>
                    <?php }?>
                    <td><input type="text" value="<?= $used_acum; ?>" style="width:55px;margin-right:0;" disabled id="total_consumption_today_<?= $material['id'] ?>" class="total_consumption_today" disabled /></td>
                </tr>
            <?php } ?>
		<?php
	}

	public function create_tank_status(){
		if(isset($_POST)){
			$data = json_decode($this->data_input);

			$status = array(
				'project'  		=> $this->project_id,
				'report' 		=> $this->report_id,
				'tank' 			=> $data->tank,
				'producto_de' 	=> 'user_entry',
				'activo' 		=> 1,
				'volumen_final' => $data->volume
			);

			//desactivar el estado anterior del tanque
			$nuevo_estado_tanque = array('activo'=>0);
			$this->Api->update_where('tank_status_time',$nuevo_estado_tanque,array('tank'=>$data->tank));
			
			//insertar el nuevo estado
			$id_estado = $this->Api->create('tank_status_time',$status);

			//crear el paquete de concentraciones en cero
			//obtener la lista de los productos
			$productos = $this->Api->get_where('vista_inventario',array('project'=>$this->project_id,'used_in_project'=>1),array('commercial_name','asc'));
			
			//inicializar la concentracion en blanco
			foreach ($productos as $producto) {
				$concentracion_en_blanco = array(
					'tank_status_time'  => $id_estado,
					'material' 			=> $producto['product_id'],
					'concentracion'  	=> 0
				);

				$this->Api->create('concentrations',$concentracion_en_blanco);
			}

			//actualizar las concentraciones
			foreach ($data->concentrations as $concentration) {
				$nueva_concentracion = array(
					'tank_status_time'  => $id_estado,
					'material' 			=> $concentration->material,
					'concentracion'  	=> $concentration->concentracion
				);

				$this->Api->update_where('concentrations',$nueva_concentracion,array('tank_status_time'=>$id_estado,'material' => $concentration->material));
			}

			echo json_encode(true);
		}
	}

	public function get_tank_info(){
		if(count($_POST) > 0){
			$tank_info = $this->Api->get_where('vista_tanks',array('id'=>$_POST['tank']));
			echo json_encode($tank_info[0]);
		}
	}


	//METODO PARA CREAR UN NUEVO PASO EN LA HISTORIA DE VOLUMENES Y CONCENTRACIONES
	public function create_trunk_node($data){
		/*
			SE CREA UN NUEVO PASO EN LA HISTORIA DE VOLUMENES Y CONCENTRACIONES
			CUANDO OCURRE UNO DE LOS SIGUIENTES EVENTOS:

			- UNA ADICION DE QUIMICA
			- UNA TRANSFERENCIA DE VOLUMEN

		*/


		$data['timestamp'] 	= date('Y-m-d H:i:s');
		$data['report'] 	= $this->report_id;

		/* los otros componentes del arreglo son:
		$data['description'];
		$data['tree'];
		$data['subtree'];
		*/
		//RETORNAR EL ID DEL PASO
		return $this->Api->create('mvc_trunk',$data);
	} 


	public function step_by_step_mvc(){
		$steps = $this->Api->get_where('mvc_trunk',array('report'=>$this->report_id,'active'=>1),array('id','desc'));
		$count = 0;
		foreach ($steps as $step) { $count++; ?>
			<tr>
				<td class="label_m" style="padding-right:10px;">
					<?php if($count == 1){ ?>
						<a href="deletestep_<?= $step['id'] ?>"><img src="/img/brick_delete.png" /></a>
					<?php }?>
				</td>
				<td class="label_m">
					<input type="text" value="<?= $step['timestamp'] ?>" disabled style="width:200px;margin-right:0;"/>
				</td>
				<td class="label_m">
					<input type="text" value="<?= $step['description'] ?>" disabled style="width:400px;max-width:500px;" />
				</td>
			</tr>
		<?php }
	}

}