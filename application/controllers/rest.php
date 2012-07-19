<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    $this->load->model('Api');
	}

	public function index(){
		redirect('/main/login');
	}

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
				<td><input type="text" type="text" name="powerlossbha_<?=$index;?>" id="powerlossbha_<?=$index;?>" disabled="disabled"/></td>
				<td><input type="text" type="text" name="" id="" disabled="disabled"/></td>
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
}