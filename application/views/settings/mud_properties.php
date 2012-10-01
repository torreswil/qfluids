<div class="config_panel" id="mudproperties">
	<h2>Mud Properties</h2>
	<div class="simpleTabs">
        <ul class="simpleTabsNavigation">
			<li><a href="#">Phases</a></li>
			<li><a href="#">Physical and Chemical Properties</a></li>
			<li><a href="#">Rheology</a></li>
			<li><a href="#">Solids math</a></li>
			<li><a href="#">Adicional Tests</a></li>
    	</ul>
        
		<div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
			<fieldset>
				<legend>Phases Number</legend>
				<table>
					<tr>
						<td>How many phases this project will have?</td>
						<td>
							<select name="phase_number">
								<option value="1" selected="selected">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						</td>
					</tr>
                                        <tr>
	        				<td></td>	
	        				<td><input type="button" value="Save phases number" id="save_phases_number" style="margin-top:10px;" /></td>
	        			</tr>
				</table>
			</fieldset>
		</div>
        <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<table>
                                
                                <tr>
                                        <td></td>
                                        <td class="unit_field"></td>
                                        <?php $counter_phase = 1; ?>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td class="label_m"><label>Program <?= $counter_phase; ?></label></td>
                                        <?php $counter_phase++; ?>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>depth</label></td>
                                        <td class="unit_field">ft</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>pit/flow line</label></td>
                                        <td class="unit_field"></td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>flowline temp</label></td>
                                        <td class="unit_field">ºF</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>mud weight</label></td>
                                        <td class="unit_field">ppg</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>Funnel viscosity</label></td>
                                        <td class="unit_field">sec/qt</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>API fl/cake</label></td>
                                        <td class="unit_field">c.c./30min</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>Sand</label></td>
                                        <td class="unit_field">% vol</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>Lubricant</label></td>
                                        <td class="unit_field">% vol</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>Inhibitor</label></td>
                                        <td class="unit_field">gpb</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>

                                <tr>
                                        <td class="label_m"><label>pH METER</label></td>
                                        <td class="unit_field"></td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>PM</label></td>
                                        <td class="unit_field">ml <span style="text-transform:uppercase">H<sub>2</sub>SO<sub>4</sub></span></td>                                        
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>PF/MF</label></td>
                                        <td class="unit_field">ml <span style="text-transform:uppercase">H<sub>2</sub>SO<sub>4</sub></span></td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>MBT</label></td>
                                        <td class="unit_field">lb/bbl eq</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>CHLORIDES</label></td>
                                        <td class="unit_field">mg/l</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                                <tr>
                                        <td class="label_m"><label>Ca++</label></td>
                                        <td class="unit_field">mg/l</td>
                                        <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                        <td><input type="text" style="width:60px;"></td>
                                        <?php } ?>
                                </tr>
                        </table>	
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<table>
					<tr>
						<td></td>
						<td class="unit_field"></td>						
                                                <?php $counter_phase = 1; ?>
                                                <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                                <td class="label_m"><label>Program <?= $counter_phase; ?></label></td>
                                                <?php $counter_phase++; ?>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>&theta;600</label></td>
						<td class="unit_field"></td>
                                                <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>&theta;300</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>&theta;200</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>&theta;100</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>&theta;6</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>&theta;3</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>GEL:</label></td>
						<td class="unit_field"></td>
						<td></td>
					</tr>
					<tr>
						<td class="label_m"><label>10"</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>10'</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>30'</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>pv</label></td>
						<td class="unit_field">lbf/100 ft<sup>2</sup></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>yp</label></td>
						<td class="unit_field">lbf/100 ft<sup>2</sup></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>YS</label></td>
						<td class="unit_field">lbf/100 ft<sup>2</sup></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label style="text-transform:lowercase;">n</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label style="text-transform:lowercase;">k</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>c.c.i.</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
				</table>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
	        	<table>
					<tr>
						<td></td>
						<td></td>
						<?php $counter_phase = 1; ?>
                                                <?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
                                                <td class="label_m"><label>Program <?= $counter_phase; ?></label></td>
                                                <?php $counter_phase++; ?>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>Water</label></td>
						<td class="unit_field">% Vol</td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>Oil</label></td>
						<td class="unit_field">% Vol</td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>	
					<tr>
						<td class="label_m"><label>Solids</label></td>
						<td class="unit_field">% Vol</td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>ASG Solids</label></td>
						<td class="unit_field"></td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>LGS</label></td>
						<td class="unit_field">ppb</td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>HGS</label></td>
						<td class="unit_field">ppb</td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>LGS</label></td>
						<td class="unit_field">% Vol.</td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>
					<tr>
						<td class="label_m"><label>HGS</label></td>
						<td class="unit_field">% Vol.</td>
						<?php for($i=0 ; $i<$project['max_phase'] ; $i++) { ?>
						<td><input type="text" style="width:60px;" ></td>
                                                <?php } ?>
					</tr>							
				</table>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<legend>Create a new test</legend>
        		<table>
        			<tr>
        				<td class="label_m"><label>Test name:</label></td>
        				<td class="label_m"><label>Report Unit:</label></td>
        				<td class="label_m"><label>Program:</label></td>
        			</tr>
                                <?php for($i=1 ; $i<=$project['max_phase'] ; $i++) { ?>
                                <tr>
        				<td class="label_m"><input type="text" /></td>
        				<td class="label_m"><input type="text" /></td>
        				<td class="label_m"><input type="text" value="<?= $i; ?>" /></td>                                        
        			</tr>                                
                                <?php } ?>        			
        		</table>
        	</fieldset>
        </div>
    </div>
</div>