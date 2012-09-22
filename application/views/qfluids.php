<div class="qfluids_wrapper">
	<div class="sidebar">
		<?php $this->load->view('partials/sidebar'); ?>
	</div>
	<div class="toolbar">
		<ul class="file_menu">
			<li><a href="#save_report" title="Save Data" id="btn_save_report"><img src="/img/icons/icon_checkmark.png" /></a></li>
			
			<?php if($project['last_report'] == 0){
				$option_display = 'style="display:none;"';
			}else{
				$option_display = '';
			} ?>

			<li <?= $option_display; ?> ><a href="#print_and_send" title="Print and Send Report" id="btn_print_report"><img src="/img/icons/icon_paper_plane.png" /></a></li>
			<li <?= $option_display; ?> ><a href="#search_reports" title="Search Report Archive" id="btn_search_report"><img src="/img/icons/icon_magnify_glass.png" /></a></li>
			<li <?= $option_display; ?> ><a href="#new_report" title="New report" id="btn_new_report"><img src="/img/icons/icon_add.png" /></a></li>
		</ul>
		<ul class="settings_menu">
			<li><a href="#menu" title="Menu" id="menu_btn"><img src="/img/icons/icon_list_bullets.png" /></a></li>
		</ul>
	</div>
	<div class="panels">
		<div class="project_info_wrapper">
			<div id="project_info">
				<table style="float:left;">
					<tr>
						<td>
							<strong>SPUD DAY:</strong> 
						</td>
						<td>
							<?php if($project['spud_date'] == ''){
								$sd_disabled = '';
							}else{
								$sd_disabled = 'disabled="disabled"';
							} ?>
							<input type="text" style="width:100px;margin-left:5px;" id="spud_data" value="<?= $project['spud_date'] ?>" class="datepicker" <?= $sd_disabled; ?> />
						</td>
						<td width="25"></td>
						<td>
							<strong style="float:left;">CURRENT DATE:</strong>
						</td>
						<td>
							<span style="margin-left:5px; text-transform:uppercase;float:left;width:90px;" id="current_date">
								<?php if($project['spud_date'] != ''){ echo $project['last_report_meta']['date'];} ?>
							</span>
						</td>
						<td width="25"></td>
						<td><strong>Report#:</strong></td>
						<td>
							
							<!-- VERY IMPORTANT -->
							<input type="hidden" id="transactional_id" value="<?= $project['transactional_id'] ?>" />
							<input type="hidden" id="master_report_count" value="<?= $project['last_report'] ?>" />
							<input type="hidden" id="current_report" value="<?= $project['last_report'] ?>" />
							<input type="hidden" id="project_id" value="<?= $project['id'] ?>" />
							<!-- VERY IMPORTANT -->

							<span id="current_report_str" style="margin-left:5px;text-transform:uppercase;"><?= str_pad($project['last_report'], 4, "0", STR_PAD_LEFT); ?></span>
						</td> 
						<td width="25"></td>
						<td>
							<strong>Operadora:</strong>
						</td>
						<td><span style="margin-left:5px;text-transform:uppercase;"><?= $project['operator'] ?></span></td>
						<td width="25"></td>
						<td>
							<strong>Well:</strong>
						</td>
						<td><span style="margin-left:5px;text-transform:uppercase;"><?= $project['well_name'] ?></span></td>
						<td width="25"></td>
						<td>
							<strong>Rig:</strong> 
						</td>
						<td><span style="margin-left:5px;text-transform:uppercase;"><?= $project['rig'] ?></span></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="this_panel" id="welcome_panel" style="display:block;">
			<p id="start_message">
				<?php if($project['spud_date'] == ''){
					echo 'Pick a spud date to start.<br />Then, save changes to generate the first report.';
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
	<?php $this->load->view('report_history_overlay'); ?>
	<?php $this->load->view('project_settings'); ?>
	<?php $this->load->view('personal_registration_tool'); ?>
        <?php $this->load->view('continue_phase'); ?>
</div>