<div class="this_panel plusribbon" id="propiedades_fluido">
	<h2>Mud Properties</h2>
	<fieldset class="top_ribbon">
		<table>
			<tr>
				<td class="label_m">
					<label class="emphasis">Mud Type:</label>
				</td>
				<td>
					<input type="text" class="medium pick_mud" value="Please select..." />
				</td>
			</tr>
		</table>
	</fieldset>
        <div class="simpleTabs">
                <ul class="simpleTabsNavigation">
                        <li><a href="#">Physical and Chemical Properties</a></li>
                        <li><a href="#">Rheology</a></li>
                        <li><a href="#">Solids math</a></li>
                </ul>
                
                <div class="simpleTabsContent">
                        <fieldset>
                                <table>
                                        <tr>
                                                <td></td>
						<td class="unit_field"></td>
						<td class="label_m"><label>Program</label></td>
						<td class="label_m">
							<select style="width:70px;" class="clock_1">
                                                                <?php for($i=0 ; $i<24; $i++) { ?>                                                                        
                                                                        <?php $hour = str_pad($i, 2, "0", STR_PAD_LEFT); ?>
                                                                        <?php $tmp1 = "$hour:00"; ?>  
                                                                        <?php $tmp2 = "$hour:30"; ?> 
                                                                        <?php $selected = ($tmp1=='06:00') ? 'selected="selected"' : ''; ?>
                                                                        <option value="<?= $tmp1; ?>" <?= $selected; ?>><?= $tmp1; ?></option>
                                                                        <option value="<?= $tmp2; ?>" <?= $selected; ?>><?= $tmp2; ?></option>
                                                                <?php } ?>								
							</select>
						</td>
						<td class="label_m">
							<select style="width:70px;" class="clock_2">
								<?php for($i=0 ; $i<24; $i++) { ?>                                                                        
                                                                        <?php $hour = str_pad($i, 2, "0", STR_PAD_LEFT); ?>
                                                                        <?php $tmp1 = "$hour:00"; ?>  
                                                                        <?php $tmp2 = "$hour:30"; ?> 
                                                                        <?php $selected = ($tmp1=='14:00') ? 'selected="selected"' : ''; ?>
                                                                        <option value="<?= $tmp1; ?>" <?= $selected; ?>><?= $tmp1; ?></option>
                                                                        <option value="<?= $tmp2; ?>" <?= $selected; ?>><?= $tmp2; ?></option>
                                                                <?php } ?>								
							</select>
						</td>
						<td class="label_m">
							<select style="width:70px;" class="clock_3">
								<?php for($i=0 ; $i<24; $i++) { ?>                                                                        
                                                                        <?php $hour = str_pad($i, 2, "0", STR_PAD_LEFT); ?>
                                                                        <?php $tmp1 = "$hour:00"; ?>  
                                                                        <?php $tmp2 = "$hour:30"; ?> 
                                                                        <?php $selected = ($tmp1=='23:00') ? 'selected="selected"' : ''; ?>
                                                                        <option value="<?= $tmp1; ?>" <?= $selected; ?>><?= $tmp1; ?></option>
                                                                        <option value="<?= $tmp2; ?>" <?= $selected; ?>><?= $tmp2; ?></option>
                                                                <?php } ?>
							</select>
						</td>
					</tr>   
                                        
                                        <? $pandcp = $this->Api->get_where('test', array('active'=>1, 'type_test'=>1)); ?>
                                        <?php foreach($pandcp as $test) : ?>
                                        <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$test['id'], 'phase'=>$project['current_phase'])); ?>
                                        <?php $value = empty($program[0]['value_program']) ? '' : $program[0]['value_program']; ?>
					
                                        <?php if($test['test']=='depth') { ?>
					<tr>
						<td class="label_m"><label>depth</label></td>
						<td class="unit_field">ft</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='pit/flow line') { ?>
					<tr>
						<td class="label_m"><label>pit/flow line</label></td>
						<td class="unit_field"></td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td>
							<select style="width:70px;">
								<option val="">Select...</option>
								<option val="pit">Pit</option>
								<option val="flow_line">Flow Line</option>
							</select>
						</td>
						<td>
							<select style="width:70px;">
								<option val="">Select...</option>
								<option val="pit">Pit</option>
								<option val="flow_line">Flow Line</option>
							</select>
						</td>
						<td>
							<select style="width:70px;">
								<option val="">Select...</option>
								<option val="pit">Pit</option>
								<option val="flow_line">Flow Line</option>
							</select>
						</td>
					</tr>
                                        <?php } else if($test['test']=='flowline temp') { ?>
					<tr>
						<td class="label_m"><label>flowline temp</label></td>
						<td class="unit_field">ºF</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" id="ztemp_1" name="ztemp_1" style="width:56px;" class="ztemp"></td>
						<td><input type="text" id="ztemp_2" name="ztemp_2" style="width:56px;" class="ztemp"></td>
						<td><input type="text" id="ztemp_3" name="ztemp_3" style="width:56px;" class="ztemp"></td>
					</tr>
                                        <?php } else if($test['test']=='mud weight') { ?>
					<tr>
						<td class="label_m"><label>mud weight</label></td>
						<td class="unit_field">ppg</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;" id="mw_1" class="mw"></td>
						<td><input type="text" style="width:56px;" id="mw_2" class="mw"></td>
						<td><input type="text" style="width:56px;" id="mw_3" class="mw"></td>
					</tr>
                                        <?php } else if($test['test']=='Funnel viscosity') { ?>
					<tr>
						<td class="label_m"><label>Funnel viscosity</label></td>
						<td class="unit_field">sec/qt</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;" id="funelv_1" name="funelv_1" class="funelv"></td>
						<td><input type="text" style="width:56px;" id="funelv_2" name="funelv_2" class="funelv"></td>
						<td><input type="text" style="width:56px;" id="funelv_3" name="funelv_3" class="funelv"></td>
					</tr>
                                        <?php } else if($test['test']=='API fl/cake') { ?>
					<tr>
						<td class="label_m"><label>API fl/cake</label></td>
						<td class="unit_field">c.c./30min</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;" placeholder="00/00"></td>
						<td><input type="text" style="width:56px;" placeholder="00/00"></td>
						<td><input type="text" style="width:56px;" placeholder="00/00"></td>
					</tr>
                                        <?php } else if($test['test']=='Sand') { ?>
					<tr>
						<td class="label_m"><label>Sand</label></td>
						<td class="unit_field">% vol</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='Lubricant') { ?>
					<tr>
						<td class="label_m"><label>Lubricant</label></td>
						<td class="unit_field">% vol</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='Inhibitor') { ?>
					<tr>
						<td class="label_m"><label>Inhibitor</label></td>
						<td class="unit_field">gpb</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='pH METER') { ?>        
					<tr>
						<td class="label_m"><label>pH METER</label></td>
						<td class="unit_field"></td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='PM') { ?>
					<tr>
						<td class="label_m"><label>PM</label></td>
						<td class="unit_field">ml <span style="text-transform:uppercase">H<sub>2</sub>SO<sub>4</sub></span></td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='PF/MF') { ?>
					<tr>
						<td class="label_m"><label>PF/MF</label></td>
						<td class="unit_field">ml <span style="text-transform:uppercase">H<sub>2</sub>SO<sub>4</sub></span></td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='MBT') { ?>
					<tr>
						<td class="label_m"><label>MBT</label></td>
						<td class="unit_field">lb/bbl eq</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='CHLORIDES') { ?>
					<tr>
						<td class="label_m"><label>CHLORIDES</label></td>
						<td class="unit_field">mg/l</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else if($test['test']=='Ca++') { ?>
					<tr>
						<td class="label_m"><label>Ca++</label></td>
						<td class="unit_field">mg/l</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } else { ?>
					<tr>
						<td><input type="text" class="medium"><?= $test['test'];?></td>
						<td class="unit_field"><input type="text" style="width:20px;margin-right:0;" /><?= $test['uint_test'];?></td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
						<td><input type="text" style="width:56px;"></td>
					</tr>
                                        <?php } ?>
					<?php endforeach; ?>
				</table>
			</fieldset>    
                </div>
	    <div class="simpleTabsContent">
			<table style="width:100%;">
                                <? $rehology = $this->Api->get_where('test', array('active'=>1, 'type_test'=>2)); ?>
				<tr>
					<td style="width:380px;">
						<fieldset style="width:380px;">
							<table>
								<tr>
									<td></td>
									<td class="label_m"><label>Program</label></td>
									<td class="label_m">
										<label class="clock_1_label">06:00</label>
									</td>
									<td class="label_m">
										<label class="clock_2_label">14:00</label>
									</td>
									<td class="label_m">
										<label class="clock_3_label">23:00</label>
									</td>
								</tr>
                                                                <?php foreach($rehology as $test) : ?>
                                                                        <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$test['id'], 'phase'=>$project['current_phase'])); ?>
                                                                        <?php $value = empty($program[0]['value_program']) ? '' : $program[0]['value_program']; ?>
                                                                
                                                                <?php if($test['test']=='&theta;600') { ?>
								<tr>
									<td class="label_m"><label>&theta;600</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;" class="t_600" id="teta_601" name="teta_601" /></td>
									<td><input type="text" style="width:65px;" class="t_600" id="teta_602" name="teta_602"></td>
									<td><input type="text" style="width:65px;" class="t_600" id="teta_603" name="teta_603"></td>
								</tr>
                                                                <?php } else if($test['test']=='&theta;300') { ?>
								<tr>
									<td class="label_m"><label>&theta;300</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;" class="t_300" id="teta_301" name="teta_301"></td>
									<td><input type="text" style="width:65px;" class="t_300" id="teta_302" name="teta_302"></td>
									<td><input type="text" style="width:65px;" class="t_300" id="teta_303" name="teta_303"></td>
								</tr>
                                                                <?php } else if($test['test']=='&theta;200') { ?>
								<tr>
									<td class="label_m"><label>&theta;200</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;" class="t_200" id="teta_201" name="teta_201"></td>
									<td><input type="text" style="width:65px;" class="t_200" id="teta_202" name="teta_202"></td>
									<td><input type="text" style="width:65px;" class="t_200" id="teta_203" name="teta_203"></td>
								</tr>
                                                                <?php } else if($test['test']=='&theta;100') { ?>
								<tr>
									<td class="label_m"><label>&theta;100</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;" class="t_100" id="teta_101" name="teta_101"></td>
									<td><input type="text" style="width:65px;" class="t_100" id="teta_102" name="teta_102"></td>
									<td><input type="text" style="width:65px;" class="t_100" id="teta_103" name="teta_103"></td>
								</tr>
                                                                <?php } else if($test['test']=='&theta;6') { ?>
								<tr>
									<td class="label_m"><label>&theta;6</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;" class="t_6" id="teta_61" name="teta_61"></td>
									<td><input type="text" style="width:65px;" class="t_6" id="teta_62" name="teta_62"></td>
									<td><input type="text" style="width:65px;" class="t_6" id="teta_63" name="teta_63"></td>
								</tr>
                                                                <?php } else if($test['test']=='&theta;3') { ?>
								<tr>
									<td class="label_m"><label>&theta;3</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;" class="t_3" id="teta_31" name="teta_31"></td>
									<td><input type="text" style="width:65px;" class="t_3" id="teta_32" name="teta_32"></td>
									<td><input type="text" style="width:65px;" class="t_3" id="teta_33" name="teta_33"></td>
								</tr>
                                                                <?php } ?>
                                                                <?php endforeach; ?>
								<tr>
									<td style="height:16px;"></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td class="label_m"><label>GEL:</label></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
                                                                <?php foreach($rehology as $test): ?>	
                                                                        <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$test['id'], 'phase'=>$project['current_phase'])); ?>
                                                                        <?php $value = empty($program[0]['value_program']) ? '' : $program[0]['value_program']; ?>
                                                                
                                                                <?php if($test['test']=='10"') { ?>
                                                                <tr>
									<td class="label_m"><label>10"</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;"></td>
									<td><input type="text" style="width:65px;"></td>
									<td><input type="text" style="width:65px;"></td>
								</tr>
                                                                <?php } else if($test['test']=="10'") { ?>
								<tr>
									<td class="label_m"><label>10'</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;"></td>
									<td><input type="text" style="width:65px;"></td>
									<td><input type="text" style="width:65px;"></td>
								</tr>
                                                                <?php } else if($test['test']=="30'") { ?>
								<tr>
									<td class="label_m"><label>30'</label></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:65px;"></td>
									<td><input type="text" style="width:65px;"></td>
									<td><input type="text" style="width:65px;"></td>
								</tr> 
                                                                <?php } ?>
                                                                <?php endforeach; ?>
							</table>
						</fieldset>
					</td>
					<td style="width:436px;">
						<fieldset>
							<table>
								<tr>
									<td></td>
									<td></td>
									<td class="label_m"><label>PROGRAM</label></td>
									<td class="label_m">
										<label class="clock_1_label">06:00</label>
									</td>
									<td class="label_m">
										<label class="clock_2_label">14:00</label>
									</td>
									<td class="label_m">
										<label class="clock_3_label">23:00</label>
									</td>
								</tr>
                                                                <?php foreach($rehology as $test): ?>	
                                                                        <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$test['id'], 'phase'=>$project['current_phase'])); ?>
                                                                        <?php $value = empty($program[0]['value_program']) ? '' : $program[0]['value_program']; ?>
                                                                
                                                                <?php if($test['test']=='pv') { ?>                                                                
								<tr>
									<td class="label_m"><label>pv</label></td>
									<td class="unit_field">cp</td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="pv_1" name="pv_1" class="pv"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="pv_2" name="pv_2" class="pv"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="pv_3" name="pv_3" class="pv"></td>
								</tr>
                                                                <?php } else if($test['test']=='yp') { ?>                                                                
								<tr>
									<td class="label_m"><label>yp</label></td>
									<td class="unit_field">lbf/100 ft<sup>2</sup></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="yp_1" name="yp_1" class="yp"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="yp_2" name="yp_2" class="yp"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="yp_3" name="yp_3" class="yp"></td>
								</tr>
                                                                <?php } else if($test['test']=='YS') { ?>                                                                
								<tr>
									<td class="label_m"><label>YS</label></td>
									<td class="unit_field">lbf/100 ft<sup>2</sup></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="ys_1" name="ys_1"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="ys_2" name="ys_2"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="ys_3" name="ys_3"></td>
								</tr>
                                                                <?php } else if($test['test']=='n') { ?>                                                                
								<tr>
									<td class="label_m"><label style="text-transform:lowercase;">n</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="n_1" name="n_1"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="n_2" name="n_2"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="n_3" name="n_3"></td>
								</tr>
                                                                <?php } else if($test['test']=='k') { ?>                                                                
								<tr>
									<td class="label_m"><label style="text-transform:lowercase;">k</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="k_1" name="k_1"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="k_2" name="k_2"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="k_3" name="k_3"></td>
								</tr>
                                                                <?php } else if($test['test']=='c.c.i.') { ?>                                                                
								<tr>
									<td class="label_m"><label>c.c.i.</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="cci_1" name="cci_1"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="cci_2" name="cci_2"></td>
									<td><input type="text" style="width:60px;" disabled="disabled" id="cci_3" name="cci_3"></td>
								</tr>	
                                                                <?php } ?>
                                                                <?php endforeach; ?>
							</table>
						</fieldset>
					</td>
				</tr>
			</table>
	    </div>
	    <div class="simpleTabsContent">
                        <? $solids_math = $this->Api->get_where('test', array('active'=>1, 'type_test'=>3)); ?>
			<fieldset>
				<table>
					<tr>
						<td></td>
						<td></td>
						<td class="label_m"><label>PROGRAM</label></td>
						<td class="label_m">
							<label class="clock_1_label">06:00</label>
						</td>
						<td class="label_m">
							<label class="clock_2_label">14:00</label>
						</td>
						<td class="label_m">
							<label class="clock_3_label">23:00</label>
						</td>
					</tr>
                                        <?php foreach($solids_math as $test): ?>	
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$test['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $value = empty($program[0]['value_program']) ? '' : $program[0]['value_program']; ?>
                                        <?php if($test['test']=='Water') { ?>                                                                
					<tr>
						<td class="label_m" style="width:78px;"><label>Water</label></td>
						<td class="unit_field">% Vol</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
						<td><input type="text" style="width:50px;" id="wa_1" name="wa_1" value="0"></td>
						<td><input type="text" style="width:50px;" id="wa_2" name="wa_2" value="0"></td>
						<td><input type="text" style="width:50px;" id="wa_3" name="wa_3" value="0"></td>
					</tr>
                                        <?php } else if($test['test']=='Oil') { ?>                                                                
					<tr>
						<td class="label_m"><label>Oil</label></td>
						<td class="unit_field">% Vol</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
						<td><input type="text" style="width:50px;" id="oil_1" name="oil_1" value="0"></td>
						<td><input type="text" style="width:50px;" id="oil_2" name="oil_2" value="0"></td>
						<td><input type="text" style="width:50px;" id="oil_3" name="oil_3" value="0"></td>
					</tr>				
                                        <?php } ?>
                                        <?php endforeach; ?>
				</table>
			</fieldset>
		
			<fieldset>
				<table>
					<tr>
						<td></td>
						<td></td>
						<td class="label_m"><label>PROGRAM</label></td>
						<td class="label_m">
							<label class="clock_1_label">06:00</label>
						</td>
						<td class="label_m">
							<label class="clock_2_label">14:00</label>
						</td>
						<td class="label_m">
							<label class="clock_3_label">23:00</label>
						</td>
						<td></td>
					</tr>
                                        <?php foreach($solids_math as $test): ?>	
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$test['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $value = empty($program[0]['value_program']) ? '' : $program[0]['value_program']; ?>                                        					
                                        <?php if($test['test']=='Solids') { ?>                                                                
					<tr>
						<td class="label_m"><label>Solids</label></td>
						<td class="unit_field">% Vol</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="sol_1" name="sol_1"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="sol_2" name="sol_2"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="sol_3" name="sol_3"></td>
						<td></td>
					</tr>
                                        <?php } else if($test['test']=='ASG Solids') { ?>                                                                
					<tr>
						<td class="label_m"><label>ASG Solids</label></td>
						<td class="unit_field"></td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="asg_1" name="asg_1"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="asg_2" name="asg_2"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="asg_3" name="asg_3"></td>
						<td></td>
					</tr>
                                        <?php } else if($test['test']=='LGS') { ?>                                                                
					<tr>
						<td class="label_m"><label>LGS</label></td>
						<td class="unit_field">ppb</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="lgsppb_1" name="lgsppb_1"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="lgsppb_2" name="lgsppb_2"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="lgsppb_3" name="lgsppb_3"></td>
						<td></td>
					</tr>
                                        <?php } else if($test['test']=='HGS') { ?>                                                                
					<tr>
						<td class="label_m"><label>HGS</label></td>
						<td class="unit_field">ppb</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="hgsppb_1" name="hgsppb_1"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="hgsppb_2" name="hgsppb_2"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="hgsppb_3" name="hgsppb_3"></td>
						<td></td>
					</tr>
                                        <?php } else if($test['test']=='LGS') { ?>                                                                
					<tr>
						<td class="label_m"><label>LGS</label></td>
						<td class="unit_field">% Vol.</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="lgspercent_1" name="lgspercent_1"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="lgspercent_2" name="lgspercent_2"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="lgspercent_3" name="lgspercent_3"></td>
						<td></td>
					</tr>
                                        <?php } else if($test['test']=='LGS vol') { ?>                                                                
					<tr>
						<td class="label_m"><label>HGS</label></td>
						<td class="unit_field">% Vol.</td>
						<td><input type="text" style="width:60px;" value="<?=$value;?>" ></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="hgspercent_1" name="hgspercent_1" class="hgspercent"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="hgspercent_2" name="hgspercent_2" class="hgspercent"></td>
						<td><input type="text" style="width:50px;" disabled="disabled" id="hgspercent_3" name="hgspercent_3" class="hgspercent"></td>
						<td class="label_m" id="hgspercent_alert"></td>
					</tr>	
                                        <?php } ?>                                                                
                                        <?php endforeach; ?>
				</table>
			</fieldset>
	    </div>
	</div>	
</div>