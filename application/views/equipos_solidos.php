<?php $reporte = $this->session->userdata('report'); ?>

<div class="this_panel" id="equipos_solidos">
	<h2>Control Solids Equipment</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
	      <li><a href="#">Shakers</a></li>
	      <li><a href="#">Mud Cleaner</a></li>
	      <li><a href="#">Centrifugues</a></li>
	    </ul>
        <div class="simpleTabsContent">
        	<!-- SHAKERS -->
            <?php 
                $shakers_count = 0;                  
                foreach ($shakers as $shaker){ 
                    $shakers_count++;
                    $rs = $this->Api->get_where('project_report_shakers', array('report_id'=>$reporte['id'], 'project_shakers_id'=>$shaker['id']));
                    $rs = (count($rs) > 0) ? $rs[0] : null;
            ?>
            	<fieldset>
            		<legend>Shaker <?= $shakers_count ?></legend>
    	        	<table class="input_data_shakers"  data-sharker="<?= $shaker['id']; ?>">
    		        		<tr>
    		        			<td class="label_m"><label>Maker:</label></td>
    		        			<td class="label_m"><label>Model:</label></td>
    		        			<td class="label_m"><label>Nominal Flow</label></td>
    		        			<td class="label_m"><label>Movement:</label></td>
    		        			<td class="label_m" style="text-align:center;"><label>Screens:</label></td>
    		        			<td class="label_m"><label>Operational<br />Hours:</label></td>
    		        		</tr>
    		        		<tr>
    		        			<td class="label_m"></td>
    		        			<td class="label_m"></td>
    		        			<td class="label_m">gpm</td>
    		        			<td class="label_m"></td>
    		        			<td class="label_m"></td>
    		        		</tr>
    		        		<tr>
    		        			<td><input type="text" style="width:150px;" disabled="disabled" value="<?= $shaker['maker'] ?>"></td>
    		        			<td><input type="text" style="width:150px;" disabled="disabled" value="<?= $shaker['model'] ?>"></td>
    		        			<td><input type="text" style="width:75px;" disabled="disabled" value="<?= $shaker['nominal_flow'] ?>" /></td>
    		        			<td>
    		        				<input type="text" style="width:75px;" disabled="disabled" value="<?= strtoupper($shaker['movement']) ?>" />
    		        			</td>
    		        			<td style="padding-bottom:20px;">
    		        				<table>
                                        <?php $screens_acum = 0 ?>
                                        <?php while($screens_acum < $shaker['screens']){ ?>
                                            <?php $screens_acum++; ?>
        		        					<tr><td class="label_m"><label><?= $screens_acum ?>:</label><input type="text" style="width:75px;" class="screen_<?= $screens_acum; ?> validate_input data-reset" value="<?= (empty($rs["screens{$screens_acum}"]) ? '' : $rs["screens{$screens_acum}"]); ?>" /></td></tr>
    		        				    <?php } ?>
                                    </table>
    		        			</td>
    		        			<td><input type="text" style="width:75px;" class="data_hour validate_input data-reset" value="<?= (empty($rs["operational_hours"]) ? '' : $rs["operational_hours"]); ?>"/></td>
    		        		</tr>
    		        </table>
    	    	</fieldset>
            <?php } ?>
            <?php if($shakers_count == 0){ ?>
                <p>The shakers settings are not defined. To configure the shakers, go to Menu, Project Settings, and open the 'Control Solids Equipement' tab.</p>
            <?php } ?>
        </div>


        <div class="simpleTabsContent">
        	<!-- MUD CLEANER -->
            <?php if(count($mudcleaner) > 0){ ?>
                <?php $rs = $this->Api->get_where('project_report_mudcleaner', array('report_id'=>$reporte['id'], 'project_mudcleaner_id'=>$mudcleaner['id'])); ?>
                <?php $rs = (count($rs) > 0) ? $rs[0] : null; ?>
            <fieldset>
        		<legend>Mud Cleaner</legend>
        		<table class="input_data_mud_cleaner">
        			<tr>
        				<td class="label_m" style="width:100px;"><label></label></td>
        				<td class="label_m"><label>Maker:</label></td>
        				<td class="label_m"><label>Model:</label></td>
        				<td class="label_m"><label></label></td>
        			</tr>
        			<tr>
        				<td class="label_m"><label></label></td>
        				<td class="label_m"><input type="text" style="width:150px;" value="<?= $mudcleaner['maker'] ?>" disabled="" /></td>
        				<td class="label_m"><input type="text" style="width:150px;" value="<?= $mudcleaner['model'] ?>" disabled="" /></td>
        				<td class="label_m"><input type="hidden" value="<?= $mudcleaner['id']; ?>" id="data_mudcleaner"></td>
        			</tr>
        		</table>
        		<table style="margin-top:20px;" class="input_data_mud_cleaner">
        			<tr>
        				<td class="label_m" style="width:100px;"><label></label></td>
        				<td class="label_m"><label>Cones diameter:</label></td>
        				<td class="label_m"><label>Pump Type:</label></td>
        				<td class="label_m"><label>Flow:</label></td>
        				<td class="label_m"><label>Presure:</label></td>
        				<td class="label_m"><label>Operational<br />Hours:</label></td>
        			</tr>
        			<tr>
        				<td class="label_m" style="width:100px;"><label></label></td>
        				<td class="label_m"></td>
        				<td class="label_m"></td>
        				<td class="label_m">gpm</td>
        				<td class="label_m">psi</td>
        				<td class="label_m"></td>
        			</tr>
        			<tr>
        				<td class="label_m"><label>Desander:</label></td>
        				<td class="label_m">
                            <?php $desander_cd = $mudcleaner['desander_cones'].' * '.$mudcleaner['desander_conediameter']; ?>
        					<input type="text" style="width:100px;" disabled="disabled" value="<?php echo $desander_cd.' in'; ?>">
        				</td>
        				<td class="label_m">
                            <?php $mudcleaner['desander_pumptype'] = 'Centrifuge '.str_replace('_','x',$mudcleaner['desander_pumptype']); ?>
        					<input type="text" style="width:120px;" disabled="disabled" value="<?= $mudcleaner['desander_pumptype']; ?>" />
        				</td>
        				<td class="label_m">
        					<input type="text" style="width:75px;"  id="desander_flow" class="validate_input data-reset" value="<?= (empty($rs["desander_flow"]) ? '' : $rs["desander_flow"]); ?>">
        				</td>
        				<td class="label_m">
        					<input type="text" style="width:75px;"  id="desander_presure" class="validate_input data-reset" value="<?= (empty($rs["desander_presure"]) ? '' : $rs["desander_presure"]); ?>">
        				</td>
        				<td class="label_m">
        					<input type="text" style="width:75px;"  id="desander_hours" class="validate_input data-reset" value="<?= (empty($rs["desander_hours"]) ? '' : $rs["desander_hours"]); ?>">
        				</td>
        			</tr>
        			<tr>
        				<td class="label_m"><label>Desilter:</label></td>
        				<td class="label_m">
                            <?php $desilter_cd = $mudcleaner['desilter_cones'].' * '.$mudcleaner['desilter_conediameter']; ?>
        					<input type="text" style="width:100px;" disabled="disabled" value="<?php echo $desilter_cd.' in'; ?>" >
        				</td>
        				<td class="label_m">
                            <?php $mudcleaner['desilter_pumptype'] = 'Centrifuge '.str_replace('_','x',$mudcleaner['desilter_pumptype']); ?>
        					<input type="text" style="width:120px;" disabled="disabled" value="<?= $mudcleaner['desilter_pumptype']; ?>" />
        				</td>
        				<td class="label_m">
        					<input type="text" style="width:75px;" id="destiler_flow" class="validate_input data-reset" value="<?= (empty($rs["destiler_flow"]) ? '' : $rs["destiler_flow"]); ?>">
        				</td>
        				<td class="label_m">
        					<input type="text" style="width:75px;"  id="destiler_presure" class="validate_input data-reset" value="<?= (empty($rs["destiler_presure"]) ? '' : $rs["destiler_presure"]); ?>">
        				</td>
        				<td class="label_m">
        					<input type="text" style="width:75px;"  id="destiler_hours" class="validate_input data-reset" value="<?= (empty($rs["destiler_hours"]) ? '' : $rs["destiler_hours"]); ?>">
        				</td>
        			</tr>
        		</table>
        		<table style="margin-top:20px;" class="input_data_mud_cleaner">
	        		<tr>
	        			<td style="width:100px;"></td>
	        			<td class="label_m"><label>Maker:</label></td>
	        			<td class="label_m"><label>Model:</label></td>
	        			<td class="label_m"><label>Movement:</label></td>
	        			<td class="label_m"><label>Screens:</label></td>
	        			<td class="label_m"><label>Operational<br />Hours:</label></td>
	        		</tr>	
	        		<tr>
	        			<td><label>Shaker</label></td>
	        			<td><input type="text" style="width:100px;" disabled="disabled" value="<?= $mudcleaner['shaker_maker']; ?>"></td>
	        			<td><input type="text" style="width:120px;" disabled="disabled" value="<?= $mudcleaner['shaker_model']; ?>"></td>
	        			<td>
	        				<input type="text" style="width:75px;" disabled="disabled" value="<?= ucfirst($mudcleaner['shaker_movement']); ?>" />
	        			</td>
	        			<td style="padding-bottom:20px;">
	        				<table>
                                <?php for($i = $mudcleaner['shaker_screens']; $i > 0; $i--){ ?>
                                    <tr><td class="label_m"><label><?= $i; ?>:</label><input type="text" style="width:55px;" class="screen_<?= $i; ?> validate_input data-reset"  value="<?= (empty($rs["screens{$i}"]) ? '' : $rs["screens{$i}"]); ?>" /></td></tr>
                                <?php } ?>
                            </table>
	        			</td>
	        			<td><input type="text" style="width:75px;" class="data_hour validate_input data-reset"  value="<?= (empty($rs["operational_hours"]) ? '' : $rs["operational_hours"]); ?>"/></td>
	        		</tr>
        		</table>
        	</fieldset>
            <?php }else{ ?>
                 <p>The mud cleaner settings are not defined. To configure the mud cleaner, go to Menu, Project Settings, and open the 'Control Solids Equipement' tab.</p>          
            <?php } ?>
        </div>
        <div class="simpleTabsContent">
        	<?php 
                $count = 0;                
                foreach ($centrifugues as $centrifugue) {
                    $count++;
                    $rs = $this->Api->get_where('project_report_centrifugues', array('report_id'=>$reporte['id'], 'project_centrifugues_id'=>$centrifugue['id']));
                    $rs = (count($rs) > 0) ? $rs[0] : null;
            ?>
                <fieldset>
            		<legend>Centrifuge <?= $count; ?></legend>
            		<table class="input_data_centrifugues" data-centrifugues="<?= $centrifugue['id']; ?>">
            			<tr>
            				<td class="label_m"><label>Name:</label></td>
            				<td class="label_m"><label>Type:</label></td>
            				<td class="label_m"><label>Max RPM:</label></td>
            				<td class="label_m"><label>Speed:</label></td>
            				<td class="label_m"><label>Overflow:</label></td>
            				<td class="label_m"><label>Underflow:</label></td>
            				<td class="label_m"><label>Feet rate:</label></td>
            				<td class="label_m"><label>Operational<br />Hours:</label></td>
            			</tr>
            			<tr>
            				<td class="label_m"></td>
            				<td class="label_m"></td>
            				<td class="label_m"></td>
            				<td class="label_m"></td>
            				<td class="label_m">ppg</td>
            				<td class="label_m">ppg</td>
            				<td class="label_m">gpm</td>
            				<td class="label_m"></td>
            			</tr>
            			<tr>
            				<td class="label_m"><input type="text" style="width:150px;" disabled="disabled" value="<?= $centrifugue['maker']; ?>" /></td>
            				<td class="label_m"><input type="text" style="width:75px;"  disabled="disabled" value="<?= $centrifugue['type']; ?>" /></td>
            				<td class="label_m"><input type="text" style="width:60px;"  disabled="disabled" value="<?= $centrifugue['maxrpm']; ?>" /></td>
            				<td class="label_m"><input type="text" style="width:60px;"  class="validate_input centrifugue_speed data-reset" value="<?= (empty($rs["speed"]) ? '' : $rs["speed"]); ?>"/></td>
            				<td class="label_m"><input type="text" style="width:60px;"  class="validate_input centrifugue_overflow data-reset" value="<?= (empty($rs["overflow"]) ? '' : $rs["overflow"]); ?>"/></td>
            				<td class="label_m"><input type="text" style="width:60px;"  class="validate_input centrifugue_underflow data-reset" value="<?= (empty($rs["underflow"]) ? '' : $rs["underflow"]); ?>"/></td>
            				<td class="label_m"><input type="text" style="width:60px;"  class="validate_input centrifugue_feet_rate data-reset" value="<?= (empty($rs["feet_rate"]) ? '' : $rs["feet_rate"]); ?>"/></td>
            				<td class="label_m"><input type="text" style="width:60px;"  class="validate_input operational_hours data-reset" value="<?= (empty($rs["operational_hours"]) ? '' : $rs["operational_hours"]); ?>"/></td>
            			</tr>
                                <tr>
                                        <td colspan="8">
                                                <p><a href="" id="show_cp_<?= $count; ?>">Show Centrifuge Properties</a></p>
                                                <table id="centrifuge_<?= $count; ?>_properties" style="display:none;">
                                                        <tr>
                                                                <td class="label_m"><label>Bowl Diam.:</label></td>
                                                                <td class="label_m"><label>Bowl Pulley.<br />Diam.:</label></td>
                                                                <td class="label_m"><label>Motor Pulley.<br />Diam.:</label></td>
                                                                <?php if($centrifugue['variator'] !== 1){?><td class="label_m"><label>Motor RPM:</label></td><?php } ?>
                                                                <td class="label_m"><label>Speed RPM:</label></td>
                                                                <td class="label_m"><label>G force:</label></td>
                                                                <td class="label_m"><label>Type:</label></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="label_m">in.</td>
                                                                <td class="label_m">in.</td>
                                                                <td class="label_m">in.</td>
                                                                <?php if($centrifugue['variator'] !== 1){?><td class="label_m"></td><?php } ?>
                                                                <td class="label_m"></td>
                                                                <td class="label_m"></td>
                                                                <td class="label_m"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="label_m"><input type="text" style="width:85px;" class="validate_input bowl_diam data-reset" value="<?= (empty($rs["bowl_diam"]) ? '' : $rs["bowl_diam"]); ?>"/></td>
                                                                <td class="label_m"><input type="text" style="width:85px;" class="validate_input bowl_pulley data-reset" value="<?= (empty($rs["bowl_pulley"]) ? '' : $rs["bowl_pulley"]); ?>" /></td>
                                                                <td class="label_m"><input type="text" style="width:85px;" class="validate_input motor_pulley data-reset"value="<?= (empty($rs["motor_pulley"]) ? '' : $rs["motor_pulley"]); ?>" /></td>
                                                                <?php if($centrifugue['variator'] !== 1){?>
                                                                <td class="label_m"><input type="text" style="width:85px;"  class="validate_input motor data-reset" value="<?= (empty($rs["motor"]) ? '' : $rs["motor"]); ?>" /></td></td><?php } ?>
                                                                <?php if($centrifugue['variator'] !== 0){ $disabled = 'disabled="disabled"'; }else{ $disabled = ' class="validate_input" '; } ?>
                                                                <td class="label_m"><input type="text" style="width:85px;" <?= $disabled ?>  class="speed_rmp" value="<?= (empty($rs["speed_rmp"]) ? '' : $rs["speed_rpm"]); ?>"/></td>
                                                                <td class="label_m"><input type="text" style="width:85px;" disabled="disabled" class="g_force" value="<?= (empty($rs["g_force"]) ? '' : $rs["g_force"]); ?>"/></td> 
                                                                <td class="label_m"><input type="text" style="width:85px;" disabled="disabled" class="type" value="<?= (empty($rs["type"]) ? '' : $rs["type"]); ?>"/></td>
                                                        </tr>
                                                </table>
                                        </td>
                                </tr>
            		</table>            		
            	</fieldset>
        	<?php } ?>
            <?php if($count == 0){ ?>
                 <p>The centrifugues settings are not defined. To configure the centrifugues, go to Menu, Project Settings, and open the 'Control Solids Equipement' tab.</p>          
            <?php } ?>
        </div>
    </div>
</div>