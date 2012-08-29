<div class="qfluids_wrapper">
	<div class="sidebar">
		<?php $this->load->view('partials/sidebar'); ?>
	</div>
	
	<div class="panels">
		<div class="project_info_wrapper">
			<div id="project_info">
				<table style="float:left;">
					<tr>
						<td>
							<strong>SPUD DAY:</strong> 
						</td>
						<td><input type="text" style="width:100px;margin-left:5px;" id="spud_data" value="<?= $project['spud_date'] ?>"></td>
						<td width="25"></td>
						<td>
							<strong style="float:left;">CURRENT DATE:</strong>
						</td>
						<td><span style="margin-left:5px; text-transform:uppercase;color:#fff;float:left;width:90px;" id="current_date"></span></td>
						<td width="25"></td>
						<td><strong>Report#:</strong></td>
						<td><span style="margin-left:5px;text-transform:uppercase;color:#fff;">0001</span></td> 
						<td width="25"></td>
						<td>
							<strong>Operadora:</strong>
						</td>
						<td><span style="margin-left:5px;text-transform:uppercase;color:#fff;"><?= $project['operator'] ?></span></td>
						<td width="25"></td>
						<td>
							<strong>Well:</strong>
						</td>
						<td><span style="margin-left:5px;text-transform:uppercase;color:#fff;"><?= $project['well_name'] ?></span></td>
						<td width="25"></td>
						<td>
							<strong>Rig:</strong> 
						</td>
						<td><span style="margin-left:5px;text-transform:uppercase;color:#fff;"><?= $project['rig'] ?></span></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="this_panel" id="welcome_panel" style="display:block;">
			<p id="start_message">
				<?php if($project['spud_date'] == ''){
					echo 'Pick a spud date to start.';
				}else{
					echo 'Select a data input form from the sidebar to start.';
				} ?>
				
			</p>
		</div>
		<form id="qfluids_form">
			<!-- PANELES DE DATOS DE ENTRADA-->
			<?php $this->load->view('geometria_pozo'); ?>
			<?php $this->load->view('informacion_operacional'); ?>
			<?php $this->load->view('datos_generales'); ?>
			<?php $this->load->view('propiedades_fluido'); ?>
			<?php $this->load->view('equipos_solidos'); ?>
			<?php $this->load->view('inventario'); ?>
			<?php $this->load->view('volumenes'); ?>

			<!-- PANELES OCULTOS -->
			<div class="hidden_tabs">
				<?php $this->load->view('as_math'); ?>
				<?php $this->load->view('ds_math'); ?>
			</div>
		</form>
	</div>
</div>

<div id="hidden_sections">
	<?php $this->load->view('select_bit_overlay'); ?>
	<?php $this->load->view('select_casing_overlay'); ?>
	<?php $this->load->view('select_pump_overlay'); ?>
	<?php $this->load->view('select_mud_overlay'); ?>
	<?php $this->load->view('menu_overlay'); ?>
	<?php $this->load->view('project_settings'); ?>
	<?php $this->load->view('personal_registration_tool'); ?>
</div>