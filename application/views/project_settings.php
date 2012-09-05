<?php 
	if($project['last_report'] == 0){
		$settings_style	='display:block;';
	}else{
		$settings_style	='display:none;';
	}
?>
<div class="options_panel" id="project_settings" style="<?= $settings_style ?>">
	<div class="op_content">
		<div class="options_sidebar">
			<h1>Qmud Plan</h1>
			<ul>
				<li><a href="#general">General</a></li>
				<li><a href="#rig">Rig</a></li>
				<li><a href="#cse">Control Solids Eq.</a></li>
				<li><a href="#tanks">Tanks</a></li>
				<li><a href="#mudproperties">Mud properties</a></li>
				<li><a href="#enginers">Personal</a></li>
			</ul>
			<p>No olvidar: este boton debe ser siempre cancelar a menos que se haga un cambio en la configuración (se convierte en reload project).</p>
			<input type="button" value="Reload Project & Close">
			<a href="#cancel" id="link_cancel_settings" style="display:block;float:left;width:100%;margin-top:15px;">Cancel</a>
		</div>
		<div class="content">
			<div class="config_panel" id="general" style="display:block;">
	        	<h2>General Settings</h2>
	        	<table>
					<tr>
						<td class="label_m" style="width:175px;"><label>Well Name*:</label></td>
						<td><input type="text" style="width:150px;" value="<?= $project['well_name'] ?>" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Operator*:</label></td>
						<td><input type="text" style="width:150px;" value="<?= $project['operator'] ?>" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>RIG*:</label></td>
						<td><input type="text" style="width:150px;" value="<?= $project['rig'] ?>" class="rigname_source" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Location*:</label></td>
						<td><input type="text" style="width:150px;" value="<?= $project['geozone'] ?>" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Contract Number:</label></td>
						<td><input type="text" style="width:150px;" value="<?= $project['contract_number'] ?>" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Field:</label></td>
						<td><input type="text" style="width:150px;" value="<?= $project['field'] ?>" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Operator Logo*:</label></td>
						<td><input type="text" style="width:150px;" placeholder="Click to select..." /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="button" value="Update Settings" style="margin-top:20px;"></td>
					</tr>	
				</table>
				
			</div>
			<div class="config_panel" id="rig">
				<h2>Rig Settings</h2>
				<table>
					<tr>
						<td class="label_m"><label>Rig Name:</label></td>
						<td><input type="text" style="width:150px;" disabled="disabled" value="<?= $project['rig'] ?>" class="rigname" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Rig Capacity:</label></td>
						<td><input type="text" style="width:150px;" />hp</td>
					</tr>
					<tr>
						<td class="label_m"><label>Stand Lenght:</label></td>
						<td>
							<select style="width:164px;">
								<option value="">Select...</option>
								<option value="single">Single</option>
								<option value="double">Double</option>
								<option value="triple">Triple</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Power Unit:</label></td>
						<td>
							<select style="width:164px;">
								<option value="">Select...</option>
								<option value="kelly">Kelly</option>
								<option value="top_drive">Top Drive</option>
								<option value="power_swivel">Power Swivel</option>
							</select>
						</td>
					</tr>
				</table>
				<fieldset>
	        		<legend>System BOPs</legend>
	        		<fieldset style="float:left; width:410px;">
		        		<legend>Anular</legend>
		        		<table>
		        			<tr>
		        				<td class="label_m"><label>Model:</label></td>
		        				<td><input type="text" style="width:150px;" /></td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><label>Nominal Cap.:</label></td>
		        				<td><input type="text" style="width:150px;" />Psi.</td>
		        			</tr>
		        		</table>
	        		</fieldset>
	        		<fieldset style="float:right; width:410px;">
		        		<legend>Rams</legend>
		        		<table>
		        			<tr>
		        				<td class="label_m"><input type="checkbox" class="cb_piperam" /></td>
		        				<td class="label_m"><label>Pipe ram</label></td>
		        				<td></td>
		        			</tr>
		        			<tr class="pipe_ram" style="display:none;">
		        				<td class="label_m"></td>
		        				<td class="label_m"><label>Model:</label></td>
		        				<td><input type="text" style="width:150px;" /></td>
		        			</tr>
		        			<tr class="pipe_ram" style="display:none;">
		        				<td></td>
		        				<td class="label_m"><label>Nominal Cap.:</label></td>
		        				<td><input type="text" style="width:150px;" />Psi.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><input type="checkbox" class="cb_blindram" /></td>
		        				<td class="label_m"><label>Blind ram</label></td>
		        				<td></td>
		        			</tr>
		        			<tr class="blindram" style="display:none;">
		        				<td class="label_m"></td>
		        				<td class="label_m"><label>Model:</label></td>
		        				<td><input type="text" style="width:150px;" /></td>
		        			</tr>
		        			<tr class="blindram" style="display:none;">
		        				<td></td>
		        				<td class="label_m"><label>Nominal Cap.:</label></td>
		        				<td><input type="text" style="width:150px;" />Psi.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><input type="checkbox" class="cb_shearram" /></td>
		        				<td class="label_m"><label>Shear ram</label></td>
		        				<td></td>
		        			</tr>
		        			<tr class="shearram" style="display:none;">
		        				<td class="label_m"></td>
		        				<td class="label_m"><label>Model:</label></td>
		        				<td><input type="text" style="width:150px;" /></td>
		        			</tr>
		        			<tr class="shearram" style="display:none;">
		        				<td></td>
		        				<td class="label_m"><label>Nominal Cap.:</label></td>
		        				<td><input type="text" style="width:150px;" />Psi.</td>
		        			</tr>
		        		</table>
		        	</fieldset>
		        	<input type="button" value="Update Rig Settings">
			</div>
			<div class="config_panel" id="cse">
				<h2>Control Solids Equipment Settings</h2>
	        	<fieldset>
	        		<legend>Shakers</legend>
	        		
		        		<table style="margin-bottom:10px;">
		        			<tr>
		        				<td class="label_m" style="width:175px;">
		        					<label>Shakers to use:</label>
		        				</td>
		        				<td>
		        					<select style="width:50px;" class="shaker_touse">
		        						<option value="1" <?php count($shakers) == 1? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >1</option>
		        						<option value="2" <?php count($shakers) == 2? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >2</option>
		        						<option value="3" <?php count($shakers) == 3? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >3</option>
		        						<option value="4" <?php count($shakers) == 4? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >4</option>
		        						<option value="5" <?php count($shakers) == 5? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >5</option>
		        					</select>
		        				</td>
		        			</tr>
		        		</table>
		        		<table id="shakers_table">
			        		<thead>
				        		<tr>
				        			<td class="label_m"><label>Maker:</label></td>
				        			<td class="label_m"><label>Model:</label></td>
				        			<td class="label_m"><label>Nominal Flow</label></td>
				        			<td class="label_m"><label>Screens:</label></td>
				        			<td class="label_m"><label>Movement:</label></td>
				        		</tr>
				        		<tr>
				        			<td class="label_m"></td>
				        			<td class="label_m"></td>
				        			<td class="label_m">gpm</td>
				        			<td class="label_m"></td>
				        			<td class="label_m"></td>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php 
				        			$shakers_qty = count($shakers);
				        			$empty_shakers_cfg_rows = 5 - $shakers_qty;

				        			foreach ($shakers  as $shaker) {
					        	?>
						        		<tr>
						        			<td><input type="text" style="width:150px;" class="maker" value="<?= $shaker['maker'] ?>"></td>
						        			<td><input type="text" style="width:150px;" class="model" value="<?= $shaker['model'] ?>"></td>
						        			<td><input type="text" style="width:75px;" class="nominal_flow" value="<?= $shaker['nominal_flow'] ?>"></td>
						        			<td>
						        				<select style="width:75px;" class="screens" class="screens">
						        					<?php for($i = 1; $i <= 5; $i++){ 
						        						if($i == $shaker['screens']){
						        							$selected = 'selected="selected"';
						        						}else{
						        							$selected = '';
						        						}
						        					?>
							        					<option value="<?= $i ?>" <?= $selected ?> ><?= $i ?></option>
						        					<?php } ?>
						        				</select>
						        			</td>
						        			<td>
						        				<select style="width:75px" class="movement">
						        					<option value="lineal" 		<?php $shaker['movement'] == 'lineal'	? $selected = 'selected="selected"' : $selected = '';  ?> <?= $selected ?> >Lineal</option>
						        					<option value="circular" 	<?php $shaker['movement'] == 'circular'	? $selected = 'selected="selected"' : $selected = '';  ?> <?= $selected ?> >Circular</option>
						        					<option value="eliptico" 	<?php $shaker['movement'] == 'eliptico'	? $selected = 'selected="selected"' : $selected = '';  ?> <?= $selected ?> >Eliptico</option>
						        				</select>
						        			</td>
						        		</tr>
					        	<?php
				        			}
				        		?>

				        		<?php for($i = 1; $i <= $empty_shakers_cfg_rows; $i++){ ?> 
									<tr class="disabled">
					        			<td><input type="text" style="width:150px;" class="maker"></td>
					        			<td><input type="text" style="width:150px;" class="model"></td>
					        			<td><input type="text" style="width:75px;" class="nominal_flow"></td>
					        			<td>
					        				<select style="width:75px;" class="screens" class="screens">
					        					<option value="1">1</option>
					        					<option value="2">2</option>
					        					<option value="3">3</option>
					        					<option value="4">4</option>
					        					<option value="5">5</option>
					        				</select>
					        			</td>
					        			<td>
					        				<select style="width:75px" class="movement">
					        					<option value="lineal">Lineal</option>
					        					<option value="circular">Circular</option>
					        					<option value="eliptico">Eliptico</option>
					        				</select>
					        			</td>
					        		</tr>
				        		<?php }?>
			        		</tbody>
		        		</table>
		        	
	        	</fieldset>	
	        	<fieldset>
	        		<legend>Mud Cleaner</legend>
	        		<table>
	        			<tr>
	        				<td class="label_m"><label></label></td>
	        				<td class="label_m"><label>Maker:</label></td>
	        				<td class="label_m"><label>Model:</label></td>
	        				<td class="label_m"><label></label></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label></label></td>
	        				<td class="label_m"><input type="text" style="width:150px;" /></td>
	        				<td class="label_m"><input type="text" style="width:150px;" /></td>
	        				<td class="label_m"></td>
	        			</tr>
	        			<tr>
	        				<td colspan="4">
	        					&nbsp;
	        				</td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label></label></td>
	        				<td class="label_m"><label>Cones:</label></td>
	        				<td class="label_m"><label>Cone Diameter:</label></td>
	        				<td class="label_m"><label>Pump Type:</label></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Desander:</label></td>
	        				<td class="label_m">
	        					<select style="width:164px;">
	        						<?php 
	        							$limit = 26;
	        							$count = 0;

	        							while ($count < $limit) {
	        								$count++;
	        								?><option value="<?= $count; ?>"><?= $count; ?></option><?php
	        							}
	        						?>
	        					</select>
	        				</td>
	        				<td class="label_m">
	        					<input type="text" style="width:150px;">
	        				</td>
	        				<td class="label_m">
	        					<select style="width:164px;">
	        						<option value="6_5">Centrifugue 6x5</option>
	        						<option value="5_4">Centrifugue 5x4</option>
	        						<option value="4_3">Centrifugue 4x3</option>
	        						<option value="4_6">Centrifugue 4x6</option>
	        						<option value="5_5">Centrifugue 5x5</option>
	        						<option value="4_4">Centrifugue 4x4</option>
	        					</select>
	        				</td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Desilter:</label></td>
	        				<td class="label_m">
	        					<select style="width:164px;">
	        						<?php 
	        							$limit = 26;
	        							$count = 0;

	        							while ($count < $limit) {
	        								$count++;
	        								?><option value="<?= $count; ?>"><?= $count; ?></option><?php
	        							}
	        						?>
	        					</select>
	        				</td>
	        				<td class="label_m">
	        					<input type="text" style="width:150px;">
	        				</td>
	        				<td class="label_m">
	        					<select style="width:164px;">
	        						<option value="6_5">Centrifugue 6x5</option>
	        						<option value="5_4">Centrifugue 5x4</option>
	        						<option value="4_3">Centrifugue 4x3</option>
	        						<option value="4_6">Centrifugue 4x6</option>
	        						<option value="5_5">Centrifugue 5x5</option>
	        						<option value="4_4">Centrifugue 4x4</option>
	        					</select>
	        				</td>
	        			</tr>
	        			<tr>
	        				<td colspan="4">
	        					&nbsp;
	        				</td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label></label></td>
	        				<td class="label_m"><label>Model:</label></td>
	        				<td class="label_m"><label>Screens:</label></td>
	        				<td class="label_m"><label>Movement:</label></td>
	        			</tr> 
	        			<tr>
	        				<td class="label_m"><label>Shaker:</label></td>
	        				<td class="label_m"><input type="text" style="width:150px;"></td>
	        				<td class="label_m">
	        					<select style="width:164px;">
	        						<option value="1">1</option>
	        						<option value="2">2</option>
	        						<option value="3">3</option>
	        						<option value="4">4</option>
	        						<option value="5">5</option>
	        					</select>
	        				</td>
	        				<td class="label_m">
	        					<select style="width:164px;">
	        						<option value="lineal">Lineal</option>
	        						<option value="circular">Circular</option>
	        						<option value="eliptico">Elíptico</option>
	        					</select>
	        				</td>
	        			</tr>        			
	        		</table>
	        	</fieldset>
	        	<fieldset>
	        		<legend>Centrifugues</legend>
	        		<table>
	        			<tr>
	        				<td class="label_m"><label>Maker:</label></td>
	        				<td class="label_m"><label>Type:</label></td>
	        				<td class="label_m"><label>Max RPM:</label></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><input type="text" style="width:150px;" /></td>
	        				<td class="label_m">
	        					<select style="width:70px;">
	        						<option value="lgs">LGS</option>
	        						<option value="hgs">HGS</option>
	        					</select>
	        				</td>
	        				<td class="label_m"><input type="text" style="width:60px;" /></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><input type="text" style="width:150px;" /></td>
	        				<td class="label_m">
	        					<select style="width:70px;">
	        						<option value="lgs">LGS</option>
	        						<option value="hgs">HGS</option>
	        					</select>
	        				</td>
	        				<td class="label_m"><input type="text" style="width:60px;" /></td>
	        			</tr>
	        		</table>
	        	</fieldset>

	        	<input type="button" value="Update Equipment" id="btn_save_settings">
			</div>
			<div class="config_panel" id="tanks">
				<h2>Tanks</h2>
			</div>
			<div class="config_panel" id="mudproperties">
				<h2>Mud Properties</h2>
			</div>
			<div class="config_panel" id="enginers">
				<h2>Personal Settings</h2>
	        	<fieldset>
	        		<legend>Report</legend>
	        		<form id="enginer_configuration">
		        		<table>
		        			<tr>
		        				<td class="label_m" style="width:354px;">
		        					<label>Maximun number of enginers to charge:</label>
		        				</td>
		        				<td>
		        					<select style="width:157px;" name="maximun_enginers" id="maximun_enginers">
		        						<option value="1" <?php $project['maximun_enginers'] == '1'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>1</option>
		        						<option value="2" <?php $project['maximun_enginers'] == '2'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>2</option>
		        						<option value="3" <?php $project['maximun_enginers'] == '3'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>3</option>
		        						<option value="4" <?php $project['maximun_enginers'] == '4'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>4</option>
		        					</select>
		        				</td>
		        			</tr>
		        		</table>
	        		</form>
	        		
	        	</fieldset>
	        	<fieldset>
	        		<legend>New Enginer</legend>
	        		<form id="form_new_enginer">
		        		<table>
		        			<thead>
		        				<tr>
			        				<td class="label_m"><label>First:</label></td>
			        				<td class="label_m"><label>Last:</label></td>
			        				<td class="label_m"><label>Identification:</label></td>
			        				<td class="label_m"><label>Daily Rate:</label></td>
			        				<td></td>
			        			</tr>
		        			</thead>
		        			<tbody>
		        				<tr>
				        			<td><input type="text" name="name" /></td>
				        			<td><input type="text" name="lastname" /></td>
				        			<td><input type="text" name="identification" /></td>
				        			<td><input type="text" name="rate" /></td>
				        			<td class="label_m">
				        				<a href="#create_enginer">Create</a>
				        				<input type="hidden" name="project" value="<?= $project['id'] ?>" />
				        			</td>
				        		</tr>
		        			</tbody>
		        		</table>
	        		</form>
	        	</fieldset>

	        	<fieldset>
	        		<legend>Current Enginers</legend>
		        	<table>
		        		<thead>
		        			<tr>
		        				<td class="label_m"><label>First:</label></td>
		        				<td class="label_m"><label>Last:</label></td>
		        				<td class="label_m"><label>Identification:</label></td>
		        				<td class="label_m"><label>Daily Rate:</label></td>
		        			</tr>
		        		</thead>
			        	<tbody id="tbody_enginer_list">
				        	<?php foreach ($enginers as $enginer) {
				        		?>
					        		<tr id="this_enginer_<?= $enginer['id'] ?>">
					        			<td><input name="name" type="text" value="<?= $enginer['name'] ?>" disabled="disabled" /></td>
					        			<td><input name="lastname" type="text" value="<?= $enginer['lastname'] ?>" disabled="disabled" /></td>
					        			<td><input name="identification" type="text" value="<?= $enginer['identification'] ?>" disabled="disabled" /></td>
					        			<td><input name="rate" type="text" value="<?= $enginer['rate'] ?>" disabled="disabled" /></td>
					        			<td><a href="#delete_enginer" id="delete_enginer_<?= $enginer['id'] ?>" class="remove_enginer">Remove</a></td>
					        		</tr>
				        		<?php
				        	}
				        	?>
			        	</tbody>
		        	</table>
	        	</fieldset>	
	        	<input type="button" value="Update Settings" style="margin-top:20px;" id="save_enginer_settings" />
			</div>
		</div>
	</div>
</div>