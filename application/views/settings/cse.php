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