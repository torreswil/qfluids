<?php 
	if($project['configured'] == 0){
		$settings_style	='display:block;';
	}else{
		$settings_style	='display:none;';
	}
?>
<div class="options_panel" id="project_settings" style="<?= $settings_style ?>">
	<div class="op_content">
		<h2>Project Settings</h2>
		<div class="simpleTabs">
			<ul class="simpleTabsNavigation">
		      <li><a href="#">General</a></li>
		      <li><a href="#">Rig</a></li>
		      <li><a href="#">Control Solids Eq.</a></li>
		      <li><a href="#">Tanks</a></li>
		      <li><a href="#">Mud Properties</a></li>
		      <li><a href="#">Enginers</a></li>
		    </ul>
	        <div class="simpleTabsContent">
	        	<fieldset>
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
					</table>
				</fieldset>
	        </div>
	        <div class="simpleTabsContent">
	        	<fieldset>
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
	        	</fieldset>
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
	        	</fieldset>
	        </div>
	        <div class="simpleTabsContent">
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
	        </div> 
	        <div class="simpleTabsContent">
	        	Tanks		
	        </div> 
	        <div class="simpleTabsContent">
	        	mud properties	
	        </div> 
	        <div class="simpleTabsContent">
	        	<!-- ENGINERS -->
	        	<fieldset>
	        		<legend>Report</legend>
	        		<table>
	        			<tr>
	        				<td class="label_m" style="width:354px;">
	        					<label>Maximun number of enginers to charge:</label>
	        				</td>
	        				<td>
	        					<select style="width:163px;">
	        						<option value="1">1</option>
	        						<option value="2">2</option>
	        						<option value="3">3</option>
	        						<option value="4">4</option>
	        					</select>
	        				</td>
	        				<td class="label_m"><a href="">Save</a></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Daily rate:</label></td>
	        				<td><input type="text" /></td>
	        			</tr>
	        		</table>
	        	</fieldset>
	        	<fieldset>
	        		<legend>New Enginer</legend>
	        		<table>
	        			<thead>
	        				<tr>
		        				<td class="label_m"><label>First:</label></td>
		        				<td class="label_m"><label>Last:</label></td>
		        				<td class="label_m"><label>Identification:</label></td>
		        				<td></td>
		        			</tr>
	        			</thead>
	        			<tbody>
	        				<form id="form_new_enginer">
		        				<tr>
				        			<td><input type="text" name="name" /></td>
				        			<td><input type="text" name="lastname" /></td>
				        			<td><input type="text" name="identification" /></td>
				        			<td class="label_m">
				        				<a href="#create_enginer">Create</a>
				        				<input type="hidden" name="project" value="<?= $project['id'] ?>" />
				        			</td>
				        		</tr>
			        		</form>
	        			</tbody>
	        		</table>
	        	</fieldset>

	        	<fieldset>
	        		<legend>Current Enginers</legend>
		        	<table>
		        		<thead>
		        			<tr>
		        				<td class="label_m"><label>First:</label></td>
		        				<td class="label_m"><label>Last:</label></td>
		        				<td class="label_m"><label>Identification:</label></td>
		        				<td></td>
		        			</tr>
		        		</thead>
			        	<tbody>
				        	<?php foreach ($enginers as $enginer) {
				        		?>
					        		<tr>
					        			<td><input type="text" value="<?= $enginer['name'] ?>" /></td>
					        			<td><input type="text" value="<?= $enginer['lastname'] ?>" /></td>
					        			<td><input type="text" value="<?= $enginer['identification'] ?>" disabled="disabled" /></td>
					        			<td class="label_m"><a href="#remove">Update</a></td>
					        		</tr>
				        		<?php
				        	}
				        	?>
			        	</tbody>
		        	</table>
	        	</fieldset>	
	        </div>   
		</div>
		<input type="button" value="Save Settings" style="margin-top:20px;margin-left:815px;" id="btn_save_settings">
		<a href="#" id="link_temporal_ocultar_config">ocultar [eliminar a futuro, solo para debug]</a>
	</div>
</div>
<?php // <div id="name_list"></div> ?>