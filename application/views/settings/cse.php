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
    						<option value="0" <?php count($shakers) == 0? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >0</option>
    						<option value="1" <?php count($shakers) == 1? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >1</option>
    						<option value="2" <?php count($shakers) == 2? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >2</option>
    						<option value="3" <?php count($shakers) == 3? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >3</option>
    						<option value="4" <?php count($shakers) == 4? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>  >4</option>
    					</select>
    				</td>
    			</tr>
    		</table>
    		<?php if(count($shakers) == 0){$display_st = 'style="display:none;"';}else{$display_st = '';} ?>
    		<table id="shakers_table" <?= $display_st; ?> >
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
		<?php
			if(count($mudcleaner) == 0){
				$mudcleaner['maker'] 					= '';
				$mudcleaner['model'] 					= '';
				$mudcleaner['desander_cones'] 			= '';
				$mudcleaner['desander_conediameter'] 	= '';
				$mudcleaner['desander_pumptype'] 		= '';
				$mudcleaner['desilter_cones'] 			= '';
				$mudcleaner['desilter_conediameter'] 	= '';
				$mudcleaner['desilter_pumptype'] 		= '';
                                $mudcleaner['shaker_maker'] 			= '';
				$mudcleaner['shaker_model'] 			= '';
				$mudcleaner['shaker_screens'] 			= '';
				$mudcleaner['shaker_movement'] 			= '';
			}
		?>
		<table id="mudcleaner_table">
			<tr>
				<td class="label_m"><label></label></td>
				<td class="label_m"><label>Maker:</label></td>
				<td class="label_m"><label>Model:</label></td>
				<td class="label_m"><label></label></td>
                                <td>&nbsp;</td>
			</tr>
			<tr>
				<td class="label_m"><label></label></td>
				<td class="label_m"><input name="maker" type="text" style="width:150px;" value="<?= $mudcleaner['maker'] ?>" /></td>
				<td class="label_m"><input name="model" type="text" style="width:150px;" value="<?= $mudcleaner['model'] ?>" /></td>
				<td class="label_m"></td>
                                <td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="5">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td class="label_m"><label></label></td>
				<td class="label_m"><label>Cones:</label></td>
				<td class="label_m"><label>Cone Diameter:</label></td>
				<td class="label_m"><label>Pump Type:</label></td>
                                <td>&nbsp;</td>
			</tr>
			<tr>
				<td class="label_m"><label>Desander:</label></td>
				<td class="label_m">
					<select name="desander_cones" style="width:164px;" class="required">
						<?php 
							$limit = 26;
							$count = 0;

							while ($count < $limit) {
								$count++;
								if($count == $mudcleaner['desander_cones']){
									$selected = 'selected="selected"';
								}else{
									$selected = '';
								}
								?><option <?= $selected ?> value="<?= $count; ?>"><?= $count; ?></option><?php
							}
						?>
					</select>
				</td>
				<td class="label_m">
					<input value="<?= $mudcleaner['desander_conediameter'] ?>" name="desander_conediameter" type="text" style="width:150px;" class="required">
				</td>
				<td class="label_m">
					<select name="desander_pumptype" style="width:164px;" class="required">
						<option value="6_5" <?php $mudcleaner['desander_pumptype'] == '6_5' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 6x5</option>
						<option value="5_4" <?php $mudcleaner['desander_pumptype'] == '5_4' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 5x4</option>
						<option value="4_3" <?php $mudcleaner['desander_pumptype'] == '4_3' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 4x3</option>
						<option value="4_6" <?php $mudcleaner['desander_pumptype'] == '4_6' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 4x6</option>
						<option value="5_5" <?php $mudcleaner['desander_pumptype'] == '5_5' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 5x5</option>
						<option value="4_4" <?php $mudcleaner['desander_pumptype'] == '4_4' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 4x4</option>
					</select>
				</td>
                                <td>&nbsp;</td>
			</tr>
			<tr>
				<td class="label_m"><label>Desilter:</label></td>
				<td class="label_m">
					<select name="desilter_cones" style="width:164px;" class="required">
						<?php 
							$limit = 26;
							$count = 0;

							while ($count < $limit) {
								$count++;
								if($count == $mudcleaner['desilter_cones']){
									$selected = 'selected="selected"';
								}else{
									$selected = '';
								}
								?><option value="<?= $count; ?>" <?= $selected; ?> ><?= $count; ?></option><?php
							}
						?>
					</select>
				</td>
				<td class="label_m">
					<input value="<?= $mudcleaner['desilter_conediameter'] ?>" name="desilter_conediameter" type="text" style="width:150px;" class="required">
				</td>
				<td class="label_m">
					<select name="desilter_pumptype" style="width:164px;" class="required">
						<option value="6_5" <?php $mudcleaner['desilter_pumptype'] == '6_5' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 6x5</option>
						<option value="5_4" <?php $mudcleaner['desilter_pumptype'] == '5_4' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 5x4</option>
						<option value="4_3" <?php $mudcleaner['desilter_pumptype'] == '4_3' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 4x3</option>
						<option value="4_6" <?php $mudcleaner['desilter_pumptype'] == '4_6' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 4x6</option>
						<option value="5_5" <?php $mudcleaner['desilter_pumptype'] == '5_5' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 5x5</option>
						<option value="4_4" <?php $mudcleaner['desilter_pumptype'] == '4_4' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Centrifugue 4x4</option>
					</select>
				</td>
                                <td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="5">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td class="label_m"><label></label></td>
				<td class="label_m"><label>Maker:</label></td>
                                <td class="label_m"><label>Model:</label></td>
				<td class="label_m"><label>Screens:</label></td>
				<td class="label_m"><label>Movement:</label></td>
			</tr> 
			<tr>
				<td class="label_m"><label>Shaker:</label></td>
                                <td class="label_m"><input name="shaker_maker" value="<?= empty($mudcleaner['shaker_maker']) ? '' : $mudcleaner['shaker_maker'] ?>" type="text" style="width:150px;"></td>
				<td class="label_m"><input name="shaker_model" value="<?= $mudcleaner['shaker_model'] ?>" type="text" style="width:150px;"></td>
				<td class="label_m">
					<select name="shaker_screens" style="width:164px;" class="required">
						<option value="1" <?= $mudcleaner['shaker_screens'] == 1 ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >1</option>
						<option value="2" <?= $mudcleaner['shaker_screens'] == 2 ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >2</option>
						<option value="3" <?= $mudcleaner['shaker_screens'] == 3 ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >3</option>
						<option value="4" <?= $mudcleaner['shaker_screens'] == 4 ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >4</option>
						<option value="5" <?= $mudcleaner['shaker_screens'] == 5 ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >5</option>
					</select>
				</td>
				<td class="label_m">
					<select name="shaker_movement" style="width:164px;" class="required">
						<option <?= $mudcleaner['shaker_movement'] == 'lineal' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> value="lineal">Lineal</option>
						<option <?= $mudcleaner['shaker_movement'] == 'circular' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> value="circular">Circular</option>
						<option <?= $mudcleaner['shaker_movement'] == 'eliptico' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> value="eliptico">Elíptico</option>
					</select>
				</td>
			</tr>        			
		</table>
	</fieldset>
	<fieldset>
		<legend>Centrifugues</legend>
		<table id="centrifugues_table">
			<thead>
				<tr>
					<td class="label_m"><label>Maker:</label></td>
					<td class="label_m"><label>Type:</label></td>
					<td class="label_m"><label>Variator</label></td>
					<td class="label_m"><label>Max RPM:</label></td>
				</tr>
			</thead>
			<tbody>
				
				<?php if(count($centrifugues) == 0){?>
					<tr>
						<td class="label_m"><input name="maker" type="text" style="width:150px;" /></td>
						<td class="label_m">
							<select name="type" style="width:70px;" class="required">
								<option value="lgs">LGS</option>
								<option value="hgs">HGS</option>
							</select>
						</td>
						<td class="label_m">
							<select name="variator" style="width:70px;" class="required">
								<option value="1">Yes</option>
								<option value="0" selected="selected">No</option>
							</select>
						</td>
						<td class="label_m"><input name="maxrpm" type="text" style="width:60px;" /></td>
					</tr>
					<tr>
						<td class="label_m"><input name="maker" type="text" style="width:150px;" /></td>
						<td class="label_m">
							<select name="type" style="width:70px;" class="required">
								<option value="lgs">LGS</option>
								<option value="hgs">HGS</option>
							</select>
						</td>
						<td class="label_m">
							<select name="variator" style="width:70px;" class="required">
								<option value="1">Yes</option>
								<option value="0" selected="selected">No</option>
							</select>
						</td>
						<td class="label_m"><input name="maxrpm" type="text" style="width:60px;" /></td>
					</tr>
				<?php	}else{ ?>
					<?php foreach($centrifugues as $centrifugue){ ?>
						<tr>
							<td class="label_m"><input name="maker" type="text" style="width:150px;" value="<?= $centrifugue['maker'] ?>" /></td>
							<td class="label_m">
								<select name="type" style="width:70px;" class="required">
									<option value="lgs" <?php $centrifugue['type'] == 'lgs' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >LGS</option>
									<option value="hgs" <?php $centrifugue['type'] == 'hgs' ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >HGS</option>
								</select>
							</td>
							<td class="label_m">
								<select name="variator" style="width:70px;" class="required">
									<option value="1" <?php $centrifugue['variator'] == 1 ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >Yes</option>
									<option value="0" <?php $centrifugue['variator'] == 0 ? $selected = 'selected="selected"' : $selected = ''; echo $selected; ?> >No</option>
								</select>
							</td>
							<td class="label_m"><input name="maxrpm" type="text" style="width:60px;" value="<?= $centrifugue['maxrpm'] ?>" /></td>
						</tr>
					<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</fieldset>

	<input type="button" value="Update Equipment" id="btn_save_cse" style="margin-top:20px;">
</div>