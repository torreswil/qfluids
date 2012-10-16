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
				'volumen_recibido_reservas' 	=> 0,
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
			'volumen_recibido_reservas' 	=> $estado_actual_tanque['volumen_recibido_reservas'],
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
			$estado_actual_material = $estado_actual_material[0];
			$vieja_concentracion = array(
				'concentracion' 	=> $estado_actual_material['concentracion']
			);
			$this->Api->update_where('concentrations',$vieja_concentracion,array('tank_status_time'=>$id_nuevo_estado_tanque,'material'=>$producto['product_id']));
		}

		//listar todos los materiales que vienen en la peticion
		foreach ($used_chemicals as $este_material) {
			$estado_actual_material = $this->Api->get_where('concentrations',array('material'=>$este_material->id,'tank_status_time'=>$estado_actual_tanque['id']));
			$estado_actual_material = $estado_actual_material[0];
			

			//por cada material, actualizar el record con la nueva concentracion del tanque y asociarlo con el estado recientemente creado
			$concentracion = array(
				'concentracion'  	=> ($estado_actual_material['concentracion'] * $estado_actual_tanque['volumen_final'] + $este_material->add_quimica) / (($water + $chemical) + $estado_actual_tanque['volumen_final'])
			);

			$this->Api->update_where('concentrations',$concentracion,array('tank_status_time'=>$id_nuevo_estado_tanque,'material'=>$este_material->id));
		}
		
		echo json_encode(true);
	}

	public function load_current_concentrations(){
		echo '<table>';
		$materials 		= $this->Api->get_where('vista_inventario',array('project'=>$this->project_id,'used_in_project'=>1),array('commercial_name','asc'));
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
						$id_estado_actual = $id_estado_actual[0];
						$id_estado_actual = $id_estado_actual['id'];

						//obtener la concentracion para este producto
						$concentracion = $this->Api->get_where('concentrations',array('tank_status_time' => $id_estado_actual, 'material'=>$material['product_id']));
						$concentracion = $concentracion[0]['concentracion'];
					?>
					<input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_0" disabled value="<?= number_format($concentracion,2,'.','') ?>" />
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
                  <?php if($tank['name'] < 32){ ?>
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
                  <?php } ?>
                <?php }?>
			</tr>
		<?php }
		echo '</table>';
	}

}