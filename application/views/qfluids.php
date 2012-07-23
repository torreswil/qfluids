<div class="top_tools">
	<div class="app_name">
		<h1>Qmax Colombia LTDA:</h1> qFluids V.2012.06.19
	</div>
	<div class="user_tools">
		<span class="user_completename">Juan Pérez</span> - <a href="#">Logout</a>
	</div>
</div>

<div class="qfluids_wrapper">
	<div class="sidebar">
		<?php $this->load->view('partials/sidebar'); ?>
	</div>
	
	<div class="panels">
		<div class="project_info_wrapper">
			<div id="project_info">
				<table>
					<tr>
						<td><strong>SPUD DAY:</strong><br /><span style="text-transform:uppercase;color:#259271;font-weight:bold;">2012-06-19</span></td>
						<td width="25"></td>
						<td><strong>DATE:</strong><br /><span style="text-transform:uppercase;color:#259271;font-weight:bold;">2012-06-20</span></td>
						<td width="25"></td>
						<td><strong>Report#:</strong><br /><span style="text-transform:uppercase;color:#259271;font-weight:bold;">0001</span></td>
						<td width="25"></td>
						<td><strong>Operadora:</strong><br /><input type="text" value="ECOPETROL" /></span></td>
						<td width="25"></td>
						<td><strong>Well:</strong><br /><input type="text" placeholder="Nombre del Pozo" /></td>
						<td width="25"></td>
						<td><strong>Rig:</strong><br /><input type="text" placeholder="Nombre del Taladro" /></td>
					</tr>
				</table>	
			</div>
		</div>
		
		<div class="this_panel" id="welcome_panel" style="display:none;">
			<p>Seleccione un formulario de datos de entrada para comenzar.</p>
		</div>
		<form id="qfluids_form">
			<!-- PANELES DE DATOS DE ENTRADA-->
			<?php $this->load->view('geometria_pozo'); ?>
			<?php $this->load->view('informacion_operacional'); ?>
			<?php $this->load->view('datos_generales'); ?>
			<?php $this->load->view('propiedades_fluido'); ?>
			<?php $this->load->view('inventario'); ?>
			<?php $this->load->view('volumenes'); ?>
		</form>
	</div>
</div>

<div id="hidden_sections">
	<?php $this->load->view('select_bit_overlay'); ?>
	<?php $this->load->view('select_casing_overlay'); ?>
	<?php $this->load->view('select_pump_overlay'); ?>
	<?php $this->load->view('select_mud_overlay'); ?>
</div>