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
	public function listar_detalle_brocas(){
		echo json_encode($this->Api->get_where('vista_brocas',$_POST));
	}
	public function insertar_broca(){
		echo json_encode($this->Api->create('brocas_modelos',$_POST));
	}

	public function new_drill_string_row(){
		$index = $_POST['drillstring_qty'] + 1;
		?>
			<tr id="row_select_drill_string_<?=$index;?>" class="row_select_drill_string">
				<td>
					<select  class="select_drill_string" id="select_drill_string_<?=$index; ?>">
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
				<td><input type="text" /></td>
				<td><input type="text" /></td>
				<td><input type="text" disabled="disabled"/></td>
				<td><input type="text" disabled="disabled"/></td>
				<td><input type="text" disabled="disabled"/></td>
				<td><input type="text" disabled="disabled"/></td>
				<td><input type="text" disabled="disabled"/></td>
				<td><input type="text" disabled="disabled"/></td>
				<td><input type="text" disabled="disabled"/></td>
				<td><input type="text" disabled="disabled"/></td>
				<td class="label_m"><a href="#removeds_<?=$index;?>" class="remove_ds">Remove</a></td>
			</tr>
		<?php
	}
}