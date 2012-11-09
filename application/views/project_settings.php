<?php $project['last_report'] == 0 ? $settings_style	='display:block;' : $settings_style	='display:none;'; ?>
<div class="options_panel" id="project_settings" style="<?= $settings_style ?>;">
	<div class="options_header">
		<div class="qmplan_logo">
			<img src="/img/qmud_plan.png">
		</div>
		<div class="section_name">
			General Settings
		</div>
	</div>
	<div class="op_content">
		<div class="options_sidebar">
			<ul>
				<li><a href="#general" class="active">General</a></li>
				<li><a href="#rig">Rig</a></li>
				<li><a href="#cse">Control Solids Eq.</a></li>
				<li><a href="#tanks">Tanks</a></li>
				<li><a href="#mudproperties" id="mud_properties_link">Mud properties</a></li>
				<li><a href="#inventario">Materials & Equipement</a></li>
				<li><a href="#enginers" id="personal_settings_link">Personnel</a></li>
                <li><a href="#tools_and_mud" id="tools_settings_link">Mud and Tools library</a></li>
			</ul>
			<input type="button" value="Save" id="save_settings_btn" style="margin-bottom:20px;" />
			<input type="button" value="Close Settings" id="close_settings_btn" class="just_close" />
		</div>
		<div class="content">
			<?php $this->load->view('settings/general'); ?>
			<?php $this->load->view('settings/rig'); ?>
			<?php $this->load->view('settings/cse'); ?>
			<?php $this->load->view('settings/tanks'); ?>
			<?php $this->load->view('settings/mud_properties'); ?>
			<?php $this->load->view('settings/inventary'); ?>
			<?php $this->load->view('settings/personal'); ?>
            <?php $this->load->view('settings/tools_and_mud'); ?>
		</div>
	</div>
</div>


<!-- NEW TANK DIALOG -->
<div class="overlay_wrapper" id="new_tank_overlay">
	<div class="overlay_dialog_wrapper" style="margin-top:0;">
		<div class="overlay_dialog" style="width:335px;">
			<h5 style="margin-bottom:0;">New Tank:</h5>
			<div class="content">
				<fieldset>
					<legend>General Properties:</legend>
					<table id="tank_general_properties">
						<tr>
							<td class="label_m"><label>System:</label></td>
							<td>
								<select name="system_type" style="width:179px;" class="new_tank_st">
									<option value="active" selected="selected">Active</option>
									<option value="reserve">Reserve</option>
									<option value="pill">Pill</option>
									<option value="trip">Trip tank</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Tank name:</label></td>
							<td>
								<select style="width:179px;" class="name">
									
								</select>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Agitators #:</label></td>
							<td class="label_m">
								<select style="width:179px;" class="agitators">
									<option value="0" selected="selected">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Jets:</label></td>
							<td>
								<select style="width:179px;" class="jets">
									<option value="0" selected="selected">No</option>
									<option value="0">Yes</option>
								</select>		
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Tank type:</label></td>
							<td>
								<select style="width:179px;" id="active_type" class="type">
									<option value="">Select...</option>
									<?php foreach($tank_types as $type){ ?>
										<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label class="tank_volume_label">Vol. Cap. (bbl):</label></td>
							<td><input type="text" value="0" disabled="disabled" style="width:190px;margin-right:5px;" class="voltkaforo" name="voltkaforo" id="voltkaforo" /></td>
						</tr>
						<tr>
							<td class="label_m" style="width:123px;"><label>Max. headroom:</label></td>
							<td><input type="text" value="0" disabled="disabled" style="width:190px;margin-right:5px;" class"hlibremax" name="hlibremax" id="hlibremax" /></td>
						</tr>
					</table>
				</fieldset>

				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_cuadrado">
					<legend>Tank Measures:</legend>
					<!-- cuadrado -->
					<table class="medidas_cuadrado">
						<tr>
							<td class="label_m" style="width:123px;"><label>Length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl1">in.</td>
						</tr>
						<tr>
							<td class="label_m"><label>Width:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa1">in.</td>
						</tr>
						<tr>
							<td class="label_m"><label>Heigth:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh1">in.</td>
						</tr>
					</table>
				</fieldset>

				<!-- semicricular -->
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_semicircular">
					<legend>Rectangular section:</legend>
					<table class="medidas_semicircular">
						<tr>
							<td class="label_m" style="width:123px;"><label>Length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl1">in.</td>
						</tr>
						<tr>	
							<td class="label_m" style=""><label>Width:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa1">in.</td>
						</tr>
						<tr>	
							<td class="label_m" style=""><label>Height:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh1">in.</td>
						</tr>
					</table>
				</fieldset>
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_semicircular">
					<legend>Semicilinder section:</legend>
					<table class="medidas_semicircular">
						<tr>
							<td class="label_m" style="width:123px;"><label>Length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl2">in.</td>
						</tr>
						<tr>	
							<td class="label_m" style="width:123px;"><label>Width:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa2">in.</td>
						</tr>
						<tr>	
							<td class="label_m" style="width:123px;"><label>Height:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh2">in.</td>
						</tr>
					</table>
				</fieldset>

				<!-- tipo trailer -->
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_trailer">
					<legend>Superior Section Measures:</legend>
					<table>
						<tr>
							<td class="label_m" style="width:123px;"><label>length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl1">in.</td>
						</tr>
						<tr>
							<td class="label_m" style=""><label>width:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa1">in.</td>
						</tr>
						<tr>
							<td class="label_m" style=""><label>height:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh1">in.</td>
						</tr>
					</table>
				</fieldset>
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_trailer">
					<legend>Inferior Section Measures:</legend>
					<table>
						<tr>
							<td class="label_m" style="width:123px;"><label>length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl2">in.</td>
						</tr>
						<tr>
							<td class="label_m" style="width:123px;"><label>width.:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa2">in.</td>
						</tr>
						<tr>
							<td class="label_m" style="width:123px;"><label>height:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh2">in.</td>
						</tr>
					</table>
				</fieldset>		

				<!-- cilindro horizontal -->
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_horizontal">
					<legend>Tank Measures:</legend>
					<table>
						<tr>
							<td class="label_m" style="width:123px;"><label>Diameter:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="diametro">in.</td>
						</tr>
						<tr>
							<td class="label_m"><label>Length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl1">in.</td>
						</tr>
					</table>
				</fieldset>
			</div>

			<div class="cancel_link" style="width:152px;">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Continue" id="btn_tank_create" />
			</div>
		</div>
	</div>
</div>












<!-- 	EDIT TANK MEASURES DIALOG -->
<div class="overlay_wrapper" id="edit_tank_overlay">
	<div class="overlay_dialog_wrapper" style="margin-top:0;">
		<div class="overlay_dialog" style="width:335px;">
			<h5 style="margin-bottom:0;">Edit Tank:</h5>
			<div class="content">
				<fieldset>
					<legend>General Properties:</legend>
					<table id="etank_general_properties">
						<tr>
							<td class="label_m"><label>System:</label></td>
							<td>
								<input type="text" class="estype" disabled="disabled" />
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Tank name:</label></td>
							<td>
								<input type="text" class="ename" disabled="disabled" />
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Agitators #:</label></td>
							<td class="label_m">
								<input type="text" class="eagitators" disabled="disabled" />
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Jets:</label></td>
							<td>
								<input type="text" class="ejets" disabled="disabled" />		
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Tank type:</label></td>
							<td>
								<input type="text" class="etanktype" disabled="disabled" />	
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Vol. Cap. (bbl):</label></td>
							<td><input type="text" disabled="disabled" class="evoltkaforo" name="evoltkaforo" id="evoltkaforo" /></td>
						</tr>
						<tr>
							<td class="label_m" style="width:123px;"><label>Max. headroom:</label></td>
							<td><input type="text" disabled="disabled" class="ehlibremax" name="ehlibremax" id="ehlibremax" /></td>
						</tr>
					</table>
				</fieldset>

				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_cuadrado">
					<legend>Tank Measures:</legend>
					<!-- cuadrado -->
					<table class="medidas_cuadrado">
						<tr>
							<td class="label_m" style="width:123px;"><label>Length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl1">in.</td>
						</tr>
						<tr>
							<td class="label_m"><label>Width:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa1">in.</td>
						</tr>
						<tr>
							<td class="label_m"><label>Heigth:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh1">in.</td>
						</tr>
					</table>
				</fieldset>

				<!-- semicricular -->
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_semicircular">
					<legend>Rectangular section:</legend>
					<table class="medidas_semicircular">
						<tr>
							<td class="label_m" style="width:123px;"><label>Length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl1">in.</td>
						</tr>
						<tr>	
							<td class="label_m" style=""><label>Width:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa1">in.</td>
						</tr>
						<tr>	
							<td class="label_m" style=""><label>Height:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh1">in.</td>
						</tr>
					</table>
				</fieldset>
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_semicircular">
					<legend>Semicilinder section:</legend>
					<table class="medidas_semicircular">
						<tr>
							<td class="label_m" style="width:123px;"><label>Length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl2">in.</td>
						</tr>
						<tr>	
							<td class="label_m" style="width:123px;"><label>Width:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa2">in.</td>
						</tr>
						<tr>	
							<td class="label_m" style="width:123px;"><label>Height:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh2">in.</td>
						</tr>
					</table>
				</fieldset>

				<!-- tipo trailer -->
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_trailer">
					<legend>Superior Section Measures:</legend>
					<table>
						<tr>
							<td class="label_m" style="width:123px;"><label>length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl1">in.</td>
						</tr>
						<tr>
							<td class="label_m" style=""><label>width:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa1">in.</td>
						</tr>
						<tr>
							<td class="label_m" style=""><label>height:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh1">in.</td>
						</tr>
					</table>
				</fieldset>
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_trailer">
					<legend>Inferior Section Measures:</legend>
					<table>
						<tr>
							<td class="label_m" style="width:123px;"><label>length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl2">in.</td>
						</tr>
						<tr>
							<td class="label_m" style="width:123px;"><label>width.:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sa2">in.</td>
						</tr>
						<tr>
							<td class="label_m" style="width:123px;"><label>height:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sh2">in.</td>
						</tr>
					</table>
				</fieldset>		

				<!-- cilindro horizontal -->
				<fieldset style="display:none;" class="tank_formula_input fieldset_tank_horizontal">
					<legend>Tank Measures:</legend>
					<table>
						<tr>
							<td class="label_m" style="width:123px;"><label>Diameter:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="diametro">in.</td>
						</tr>
						<tr>
							<td class="label_m"><label>Length:</label></td>
							<td><input type="text" value="0" style="width:50px;margin-right:5px;" class="sl1">in.</td>
						</tr>
					</table>
				</fieldset>
			</div>

			<div class="cancel_link" style="width:152px;">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="hidden" class="id_tank" />
				<input type="hidden" class="type" />
				<input type="button" value="Continue" id="btn_tank_edit" />
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('cm_overlay'); ?>
<?php $this->load->view('ce_overlay'); ?>