<?php $reporte = $this->session->userdata('report'); ?>
<?php $reporte = $this->Api->get_where('reports', array('id'=>$reporte['id'])); ?>
<?php $reporte = isset($reporte[0]) ? $reporte[0] : null; ?>
<div class="this_panel plusribbon" id="informacion_operacional">
	<h2>Operational Info</h2>
	<fieldset class="top_ribbon">
		<table>
			<tr>
				<td class="label_m"><label class="emphasis">Activity:</label></td>
				<td><input type="text" class="medium" id="operational_info_activity" style="width:140px;"  value="<?= empty($reporte['activity']) ? '' : $reporte['activity']; ?>" /></td>
				<td class="label_m"><label class="emphasis">Formation</label></td>
				<td><input type="text" class="medium" id="operational_info_formation" style="width:140px;"  value="<?= empty($reporte['formation']) ? '' : $reporte['formation']; ?>" /></td>
			</tr>
		</table>
	</fieldset>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Bit Data</a></li>
	      	<li><a href="#">Mud Pump Data</a></li>
	      	<li><a href="#">Drilling Time</a></li>
	      	<li><a href="#">Drilling Parameters</a></li>
	      	<li><a href="#">Survey</a></li>
	    </ul>
	    <div class="simpleTabsContent">
	    	<table style="width:100%;" class="operational_info_bit_data">
                                <? $rs = $this->Api->get_where('project_report_bit', array('report_id'=>$reporte['id'])); ?>
                                <? $rs = isset($rs[0]) ? $rs[0] : null; ?>
                                <? $bit_data = (empty($rs['brocas_modelos_id'])) ? null : $this->Api->sql("SELECT brocas_modelos.*, brocas.nombre_broca FROM brocas_modelos INNER JOIN brocas ON brocas_modelos.id_broca = brocas.id WHERE brocas_modelos.id = {$rs['brocas_modelos_id']}"); ?>
                                <? $bit_data = isset($bit_data[0]) ? $bit_data[0] : null; ?>
				<tr>
					<td style="width:50%;">
						<!-- BIT -->
						<fieldset style="height:217px;width:90%;">
							<table>
								<tr>
									<td class="label_m"><label>Bit #:</label></td>
									<td><input type="text" class="medium" id="bit_bitnumber" style="width:144px;" value="<?= empty($rs['bit_number']) ? '' : $rs['bit_number']; ?>"></td>
								</tr>
								<tr>
									<td class="label_m"><label>BIT TYPE:</label></td>
									<td><input type="text" class="medium pick_bit" style="width:144px;" id="broca_bit_type" placeholder="Click to select..." value="<?= empty($bit_data['nombre_broca']) ? '' : $bit_data['nombre_broca']; ?>"></td>
								</tr>
								<tr>		
									<td class="label_m">
										<label>Bit Diameter:</label>
										<input type="hidden" name="broca_bit_oddeci" id="broca_bit_oddeci" />
									</td>
									<td id="broca_bit_diameter" style="height:23px;vertical-align:middle;padding-left:6px;font-size:13px;"><?= empty($bit_data['odfracc']) ? '' : $bit_data['odfracc'].' '.$bit_data['unit_oddfracc']; ?><!-- DATA VIENE DE OVERLAY --></td>
								</tr>
								<tr>		
									<td class="label_m">
										<label>Bit MODEL:</label>
										<input type="hidden" name="broca_bit_model_id" id="broca_bit_model_id"  value="<?= empty($rs['brocas_modelos_id']) ? '' : $rs['brocas_modelos_id']; ?>" />
									</td>
									<td id="broca_bit_model" style="height:23px;vertical-align:middle;padding-left:6px;font-size:13px;"><?= empty($bit_data['nombre_modelo']) ? '' : $bit_data['nombre_modelo']; ?><!-- DATA VIENE DE OVERLAY --></td>
								</tr>
							</table>
							<fieldset style="width:235px;">
								<legend>Jets</legend>
								<table style="float:left;">
									<tr>
										<td><input type="text" class="broca_jet" id="j_1" value="<?= empty($rs['jets1']) ? '' : $rs['jets1']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_2" value="<?= empty($rs['jets2']) ? '' : $rs['jets2']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_3" value="<?= empty($rs['jets3']) ? '' : $rs['jets3']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_4" value="<?= empty($rs['jets4']) ? '' : $rs['jets4']; ?>"></td>
									</tr>
									<tr>
										<td><input type="text" class="broca_jet" id="j_5" value="<?= empty($rs['jets5']) ? '' : $rs['jets5']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_6" value="<?= empty($rs['jets6']) ? '' : $rs['jets6']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_7" value="<?= empty($rs['jets7']) ? '' : $rs['jets7']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_8" value="<?= empty($rs['jets8']) ? '' : $rs['jets8']; ?>"></td>
									</tr>
									<tr>
										<td><input type="text" class="broca_jet" id="j_9" value="<?= empty($rs['jets9']) ? '' : $rs['jets9']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_10" value="<?= empty($rs['jets10']) ? '' : $rs['jets10']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_11" value="<?= empty($rs['jets11']) ? '' : $rs['jets11']; ?>"></td>
										<td><input type="text" class="broca_jet" id="j_12" value="<?= empty($rs['jets12']) ? '' : $rs['jets12']; ?>"></td>
									</tr>
								</table>
							</fieldset>
						</fieldset>
					</td>
					<td style="width:50%;">
						<fieldset style="height:217px;">
							<table>
								<tr>
									<td class="label_m"><label>Jets:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:105px;" id="jets_string" name="jets_string" id="jets_string"  value="<?= empty($rs['result_jets']) ? '' : $rs['result_jets']; ?>"/></td>
								</tr>
								<tr>
									<td class="label_m"><label>TFA:</label></td>
									<td class="label_m"><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="tfa" name="tfa"  value="<?= empty($rs['fta']) ? '' : $rs['tfa']; ?>"/> in<sup>2</sup></td>
								</tr>
								<tr>
									<td class="label_m"><label>Vel Jets:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" name="veljet" id="veljet"  value="<?= empty($rs['vel_jets']) ? '' : $rs['vel_jets']; ?>" /> ft/seg</td>
								</tr>
								<tr>
									<td class="label_m"><label>PD <sub>BIT</sub>:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="pdbit" name="pdbit"  value="<?= empty($rs['pd1']) ? '' : $rs['pd1']; ?>" /> psi</td>
								</tr>
								<tr>
									<td class="label_m"><label>% PD <sub>BIT</sub>:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="bitxcien" name="bitxcien"  value="<?= empty($rs['pd2']) ? '' : $rs['pd2']; ?>" /> %</td>
								</tr>
								<tr>
									<td class="label_m"><label>HHP <sub>BIT</sub>:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="hhp" name="hhp"  value="<?= empty($rs['hhp']) ? '' : $rs['hhp']; ?>"/> hp</td>
								</tr>
								<tr>
									<td class="label_m"><label>HSI <sub>BIT</sub>:</label> </td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="hsi" name="hsi"  value="<?= empty($rs['hsi']) ? '' : $rs['hsi']; ?>" /> hp/in<sup>2</sup></td>
								</tr>
							</table>
						</fieldset>
					</td>
				</tr>
			</table>
	    </div>
	    <div class="simpleTabsContent">
                <? $rs = $this->Api->get_where('project_report_pump', array('report_id'=>$reporte['id'])); ?>
                <? $pump1 = isset($rs[0]) ? $rs[0] : null; ?>
                <? $pump2 = isset($rs[1]) ? $rs[1] : null; ?>
                <? $pump3 = isset($rs[2]) ? $rs[2] : null; ?>
                    
                <? $pump_data1 = (empty($pump1['bombas_id'])) ? null : $this->Api->get_where('bombas', array('id'=>$pump1['bombas_id'])); ?>
                <? $pump_data2 = (empty($pump2['bombas_id'])) ? null : $this->Api->get_where('bombas', array('id'=>$pump2['bombas_id'])); ?>
                <? $pump_data3 = (empty($pump3['bombas_id'])) ? null : $this->Api->get_where('bombas', array('id'=>$pump3['bombas_id'])); ?>
                
	    	<table style="width:100%;">
	    		<tr>
	    			<td style="width:50%">
	    				<fieldset style="width:93%;">
	    					<legend>Pump system</legend>
				    		<table>
								<tr>
									<td></td>
									<td></td>
									<td class="label_m"><label>PUMP 1:</label><input type="hidden" id="pump_1_maker_id" value="<?= empty($pump_data1[0]['id']) ? '' : $pump_data1[0]['id']; ?>" /></td>
									<td class="label_m"><label>PUMP 2:</label><input type="hidden" id="pump_2_maker_id" value="<?= empty($pump_data2[0]['id']) ? '' : $pump_data2[0]['id']; ?>" /></td>
									<td class="label_m"><label>PUMP 3:</label><input type="hidden" id="pump_3_maker_id" value="<?= empty($pump_data3[0]['id']) ? '' : $pump_data3[0]['id']; ?>" /></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>MAKER:</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:75px;" class="pick_pump pump_1" id="pump_1_maker" placeholder="Select..." value="<?= empty($pump_data1[0]['maker']) ? '' : $pump_data1[0]['maker']; ?>"/></td>
									<td><input type="text" style="width:75px;" class="pick_pump pump_2" id="pump_2_maker" placeholder="Select..." value="<?= empty($pump_data2[0]['maker']) ? '' : $pump_data2[0]['maker']; ?>"/></td>
									<td><input type="text" style="width:75px;" class="pick_pump pump_3" id="pump_3_maker" placeholder="Select..." value="<?= empty($pump_data3[0]['maker']) ? '' : $pump_data3[0]['maker']; ?>"/></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>Efficiency:</label></td>
									<td class="unit_field">%</td>
									<td><input type="text" style="width:75px;" class="pump_1" name="eff_1" id="eff_1" value="<?= empty($pump1['efficiency']) ? '' : $pump1['efficiency']; ?>"/></td>
									<td><input type="text" style="width:75px;" class="pump_2" name="eff_2" id="eff_2" value="<?= empty($pump2['efficiency']) ? '' : $pump2['efficiency']; ?>"/></td>
									<td><input type="text" style="width:75px;" class="pump_3" name="eff_3" id="eff_3" value="<?= empty($pump3['efficiency']) ? '' : $pump3['efficiency']; ?>"/></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>SPM:</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:75px;" class="pump_1" name="spm_1" id="spm_1" value="<?= empty($pump1['spm']) ? '0' : $pump1['spm']; ?>" /></td>
									<td><input type="text" style="width:75px;" class="pump_2" name="spm_2" id="spm_2" value="<?= empty($pump2['spm']) ? '0' : $pump2['spm']; ?>" /></td>
									<td><input type="text" style="width:75px;" class="pump_3" name="spm_3" id="spm_3" value="<?= empty($pump3['spm']) ? '0' : $pump3['spm']; ?>" /></td>
									
								</tr>
							</table>			
	    				</fieldset>
	    				<fieldset style="width:93%">
	    					<legend>Lag Strokes & Lag Time</legend>
	    					<table>
	    						<tr>
	    							<td class="label_m" style="width:90px;"><label>Bottoms up:</label></td>
	    							<td class="label_m"><input type="text" disabled="disabled" style="margin-right:2px;width:43px;" name="bottomsup" id="bottomsup" value="<?= empty($reporte['bottoms_up']) ? '' : $reporte['bottoms_up']; ?>"></td>
	    							<td class="label_m" style="padding-right:5px;">min</td>
	    							<td class="label_m"><input type="text" disabled="disabled" style="margin-right:2px;width:43px;margin-left:14px;" name="spmbottoms" id="spmbottoms" value="<?= empty($reporte['bottoms_up_stk']) ? '' : $reporte['bottoms_up_stk']; ?>"></td>
	    							<td class="label_m" style="padding-right:5px;">stk</td>
	    						</td>
	    						<tr>
	    							<td class="label_m"><label>Lag Down:</label></td>
	    							<td class="label_m"><input type="text" disabled="disabled" style="margin-right:2px;width:43px;" name="lapdown" id="lapdown"  value="<?= empty($reporte['lag_down']) ? '' : $reporte['lag_down']; ?>"></td>
	    							<td class="label_m" style="padding-right:5px;">min</td>
	    							<td class="label_m"><input type="text" disabled="disabled" style="margin-right:2px;width:43px;margin-left:14px;" name="spmdown" id="spmdown"  value="<?= empty($reporte['lag_down_stk']) ? '' : $reporte['lag_down_stk']; ?>"></td>
	    							<td class="label_m" style="padding-right:5px;">stk</td>
	    						</td>
	    						<tr>
	    							<td class="label_m"><label>Total Lag:</label></td>
	    							<td class="label_m"><input type="text" disabled="disabled" style="margin-right:2px;width:43px;" name="totallap" id="totallap"  value="<?= empty($reporte['total_lag']) ? '' : $reporte['total_lag']; ?>"></td>
	    							<td class="label_m" style="padding-right:5px;">min</td>
	    							<td class="label_m"><input type="text" disabled="disabled" style="margin-right:2px;width:43px;margin-left:14px;" name="spmtotallap" id="spmtotallap" value="<?= empty($reporte['total_lag_stk']) ? '' : $reporte['total_lag_stk']; ?>"></td>
	    							<td class="label_m" style="padding-right:5px;">stk</td>
	    						</td>
	    						<tr>
	    							<td class="label_m"><label>Circulate:</label></td>
	    							<td class="label_m"><input type="text" disabled="disabled" style="margin-right:2px;width:43px;" value="<?= empty($reporte['circulate']) ? '' : $reporte['circulate']; ?>"></td>
	    							<td class="label_m" style="padding-right:5px;">min</td>
	    							<td class="label_m"><input type="text" disabled="disabled" style="margin-right:2px;width:43px;margin-left:14px;" value="<?= empty($reporte['circulate_stk']) ? '' : $reporte['circulate_stk']; ?>"></td>
	    							<td class="label_m" style="padding-right:5px;">stk</td>
	    						</td>
	    					</table>
	    				</fieldset>
	    			</td>
	    			<td style="width:50%">
	    				<fieldset>
	    					<legend>Pump properties</legend>
				    		<table>
								<tr>
									<td></td>
									<td></td>
									<td class="label_m"><label>PUMP 1:</label></td>
									<td class="label_m"><label>PUMP 2:</label></td>
									<td class="label_m"><label>PUMP 3:</label></td>
								</tr>
								<tr>
									<td class="label_m"><label>MODEL:</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_model" disabled="disabled" value="<?= empty($pump_data1[0]['modelo']) ? '' : $pump_data1[0]['modelo']; ?>"/></td>
									<td><input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_model" disabled="disabled" value="<?= empty($pump_data2[0]['modelo']) ? '' : $pump_data2[0]['modelo']; ?>" /></td>
									<td><input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_model" disabled="disabled" value="<?= empty($pump_data3[0]['modelo']) ? '' : $pump_data3[0]['modelo']; ?>" /></td>
								</tr>
								<tr>
									<td class="label_m"><label>TYPE:</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_type" name="pump_1_type" disabled="disabled" value="<?= empty($pump_data1[0]['type']) ? '' : $pump_data1[0]['type']; ?>"/></td>
									<td><input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_type" name="pump_2_type" disabled="disabled" value="<?= empty($pump_data2[0]['type']) ? '' : $pump_data2[0]['type']; ?>"/></td>
									<td><input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_type" name="pump_3_type" disabled="disabled" value="<?= empty($pump_data3[0]['type']) ? '' : $pump_data3[0]['type']; ?>"/></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>MAX PRESS:</label></td>
									<td class="unit_field">psi</td>
									<td><input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_presure" name="pump_1_presure" disabled="disabled" value="<?= empty($pump_data1[0]['presion']) ? '' : $pump_data1[0]['presion']; ?>"/></td>
									<td><input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_presure" name="pump_2_presure" disabled="disabled" value="<?= empty($pump_data2[0]['presion']) ? '' : $pump_data2[0]['presion']; ?>" /></td>
									<td><input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_presure" name="pump_3_presure" disabled="disabled" value="<?= empty($pump_data3[0]['presion']) ? '' : $pump_data3[0]['presion']; ?>" /></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>ROD:</label></td>
									<td class="unit_field">in</td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_rod_dummie" disabled="disabled" value="<?= empty($pump_data1[0]['rodfrac']) ? '0' : $pump_data1[0]['rodfrac']; ?>" />
										<input type="hidden" class="pump_1" id="pump_1_rod" name="pump_1_rod" value="<?= empty($pump_data1[0]['rod']) ? '' : $pump_data1[0]['rod']; ?>" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_rod_dummie" disabled="disabled" value="<?= empty($pump_data2[0]['rodfrac']) ? '0' : $pump_data2[0]['rodfrac']; ?>" />
										<input type="hidden" class="pump_2" id="pump_2_rod" name="pump_2_rod" value="<?= empty($pump_data2[0]['rod']) ? '' : $pump_data2[0]['rod']; ?>" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_rod_dummie" disabled="disabled" value="<?= empty($pump_data3[0]['rodfrac']) ? '0' : $pump_data2[0]['rodfrac']; ?>" />
										<input type="hidden" class="pump_3" id="pump_3_rod" name="pump_3_rod"value="<?= empty($pump_data3[0]['rod']) ? '' : $pump_data2[0]['rod']; ?>"/>
									</td>
								</tr>
								<tr>
									<td class="label_m"><label>Stroke/Length:</label></td>
									<td class="unit_field">in</td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_stroke_dummie" disabled="disabled" value="<?= empty($pump_data1[0]['strokefrac']) ? '' : $pump_data1[0]['strokefrac']; ?>" />
										<input type="hidden" class="pump_1" id="pump_1_stroke" name="pump_1_stroke" value="<?= empty($pump_data1[0]['strokelength']) ? '' : $pump_data1[0]['strokelength']; ?>"/>
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_stroke_dummie" disabled="disabled" value="<?= empty($pump_data2[0]['strokefrac']) ? '' : $pump_data2[0]['strokefrac']; ?>" />
										<input type="hidden" class="pump_2" id="pump_2_stroke" name="pump_2_stroke" value="<?= empty($pump_data2[0]['strokelength']) ? '' : $pump_data2[0]['strokelength']; ?>"/>
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_stroke_dummie" disabled="disabled" value="<?= empty($pump_data3[0]['strokefrac']) ? '' : $pump_data3[0]['strokefrac']; ?>" />
										<input type="hidden" class="pump_3" id="pump_3_stroke" name="pump_3_stroke" value="<?= empty($pump_data3[0]['strokelength']) ? '' : $pump_data3[0]['strokelength']; ?>"/>
									</td>
								</tr>					
								<tr>
									<td class="label_m"><label>Liner/Diameter:</label></td>
									<td class="unit_field">in</td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_diameter_dummie" disabled="disabled" value="<?= empty($pump_data1[0]['linerdiameter_frac']) ? '' : $pump_data1[0]['linerdiameter_frac']; ?>" />
										<input type="hidden" class="pump_1" id="pump_1_diameter" name="pump_1_diameter"  value="<?= empty($pump_data1[0]['linerdiameter']) ? '' : $pump_data1[0]['linerdiameter']; ?>"/>
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_diameter_dummie" disabled="disabled" value="<?= empty($pump_data2[0]['linerdiameter_frac']) ? '' : $pump_data2[0]['linerdiameter_frac']; ?>"/>
										<input type="hidden" class="pump_2" id="pump_2_diameter" name="pump_2_diameter" value="<?= empty($pump_data2[0]['linerdiameter']) ? '' : $pump_data2[0]['linerdiameter']; ?>"/>
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_diameter_dummie" disabled="disabled" value="<?= empty($pump_data3[0]['linerdiameter_frac']) ? '' : $pump_data3[0]['linerdiameter_frac']; ?>"/>
										<input type="hidden" class="pump_3" id="pump_3_diameter" name="pump_3_diameter" value="<?= empty($pump_data3[0]['linerdiameter']) ? '' : $pump_data3[0]['linerdiameter']; ?>" />
									</td>
									
								</tr>
								<tr>
									<td class="label_m"><label style="text-transform:capitalize;">Gal/Stk:</label></td>
									<td class="unit_field"></td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" disabled="disabled" id="galstk_1" name="galstk_1" value="<?= empty($pump1['gal']) ? '' : $pump1['gal']; ?>"/>
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" disabled="disabled" id="galstk_2" name="galstk_2" value="<?= empty($pump2['gal']) ? '' : $pump2['gal']; ?>" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" disabled="disabled" id="galstk_3" name="galstk_2" value="<?= empty($pump3['gal']) ? '' : $pump3['gal']; ?>" />
									</td>
									
								</tr>
								<tr>
									<td class="label_m"><label>GPM:</label></td>
									<td class="unit_field"></td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" disabled="disabled" name="qgal_1" id="qgal_1" value="<?= empty($pump1['gpm']) ? '' : $pump1['gpm']; ?>"/>
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" disabled="disabled" name="qgal_2" id="qgal_2" value="<?= empty($pump2['gpm']) ? '' : $pump2['gpm']; ?>"/>
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" disabled="disabled" name="qgal_3" id="qgal_3" value="<?= empty($pump3['gpm']) ? '' : $pump3['gpm']; ?>"/>
									</td>
									
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td class="label_m"><label>TOTAL GAL:</label></td>
									<td><input type="text" style="width:75px;" id="qgaltotal" name="qgaltotal" value="0" class="white_disabled" disabled="disabled" /></td>
								</tr>
							</table>			
	    				</fieldset>
	    			</td>
	    		</tr>
	    	</table>
	    </div>
	    <div class="simpleTabsContent">
                <? $rs = $this->Api->get_where('project_report_drilling_time', array('report_id'=>$reporte['id'])); ?>
	    	<table class="operational_info_drilling_time">
	    		<tr>
	    			<td class="label_m"><label>Activity</label></td>
	    			<td class="label_m"><label>Time</label></td>
	    		</tr>
	    		<tr>
	    			<td><input type="text" disabled="disabled" style="width:86px;" class="drilling_time_select" value="Drilling"></td>
	    			<td><input type="text" name="drillingt_0" id="drillingt_0" class="drillingt" value="<?= empty($rs[0]['time']) ? '' : $rs[0]['time']; ?>"/></td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_1">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[1]['drilling']) && $rs[1]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_1" name="drillingt_1" class="drillingt"  value="<?= empty($rs[1]['time']) ? '' : $rs[1]['time']; ?>" />
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_2">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[2]['drilling']) && $rs[2]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_2" name="drillingt_2" class="drillingt" value="<?= empty($rs[2]['time']) ? '' : $rs[2]['time']; ?>"/>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_3">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[3]['drilling']) && $rs[3]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_3" name="drillingt_3" class="drillingt" value="<?= empty($rs[3]['time']) ? '' : $rs[3]['time']; ?>" />
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_4">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[4]['drilling']) && $rs[4]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_4" name="drillingt_4" class="drillingt" value="<?= empty($rs[4]['time']) ? '' : $rs[4]['time']; ?>" />
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_5">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[5]['drilling']) && $rs[5]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_5" name="drillingt_5" class="drillingt" value="<?= empty($rs[5]['time']) ? '' : $rs[5]['time']; ?>" />
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_6">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[6]['drilling']) && $rs[6]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_6" name="drillingt_6" class="drillingt" value="<?= empty($rs[6]['time']) ? '' : $rs[6]['time']; ?>" />
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_7">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[7]['drilling']) && $rs[7]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_7" name="drillingt_7" class="drillingt" value="<?= empty($rs[7]['time']) ? '' : $rs[7]['time']; ?>" />
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_8">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[8]['drilling']) && $rs[8]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_8" name="drillingt_8" class="drillingt" value="<?= empty($rs[8]['time']) ? '' : $rs[8]['time']; ?>" />
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<select style="width:100px;" class="drilling_time_select" id="drillingtime_9">
	    					<option value="">Select...</option>
	    					<option value="Trips" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Trips") ? 'selected' : ''; ?>>Trips</option>
	    					<option value="Circulating" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Circulating") ? 'selected' : ''; ?>>Circulating</option>
	    					<option value="Rig" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Rig") ? 'selected' : ''; ?>>Rig</option>
	    					<option value="Surveys" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Surveys") ? 'selected' : ''; ?>>Surveys</option>
	    					<option value="Fishing" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Fishing") ? 'selected' : ''; ?>>Fishing</option>
	    					<option value="Run Casing" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Run Casing") ? 'selected' : ''; ?>>Run Casing</option>
	    					<option value="Coring" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Coring") ? 'selected' : ''; ?>>Coring</option>
	    					<option value="Reaming" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Reaming") ? 'selected' : ''; ?>>Reaming</option>
	    					<option value="Testing" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Testing") ? 'selected' : ''; ?>>Testing</option>
	    					<option value="Logging" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Logging") ? 'selected' : ''; ?>>Logging</option>
	    					<option value="Dir work" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Dir work") ? 'selected' : ''; ?>>Dir work</option>
	    					<option value="Repair" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Repair") ? 'selected' : ''; ?>>Repair</option>
	    					<option value="Cementation" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Cementation") ? 'selected' : ''; ?>>Cementation</option>
	    					<option value="Harden" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Harden") ? 'selected' : ''; ?>>Harden</option>
	    					<option value="Connection" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Connection") ? 'selected' : ''; ?>>Connection</option>
	    					<option value="Others" <?= (!empty($rs[9]['drilling']) && $rs[9]['drilling']=="Others") ? 'selected' : ''; ?>>Others</option>
	    				</select>
	    			</td>
	    			<td>
	    				<input type="text" id="drillingt_9" name="drillingt_9" class="drillingt" value="<?= empty($rs[9]['time']) ? '' : $rs[9]['time']; ?>" />
	    			</td>
	    		</tr>
	    		<tr>
	    			<td class="label_m" style="text-align:right;"><label>Total:</label></td>
	    			<td><input type="text" disabled="disabled" id="drillingtimetotal" name="drillingtimetotal"/></td>
	    		</tr>
	    	</table>	
	    </div>
	    <div class="simpleTabsContent">
	    	<table>
	    		<tr>
	    			<td style="width:450px;">
						<fieldset>	
							<table style="float:left;" class="operational_info_drilling_parameters">
                                                                <? $rs = $this->Api->get_where('project_report_drilling_parameters', array('report_id'=>$reporte['id'])); ?>
								<tr>
									<td class="label_m" style="padding-right:20px;"><label>Daily RPM:</label></td>
									<td class="unit_field"></td>
                                                                        <td><input type="hidden" class="medium drillingp_name" value="Daily RPM" /></td>
                                                                        <td><input type="hidden" class="medium drillingp_unit" value="" /></td>
									<td><input type="text" class="medium drillingp_value" style="width:70px;" value="<?= empty($rs[0]['value']) ? '' : $rs[0]['value']; ?>" /></td>
								</tr>
								<tr>	
									<td class="label_m" style="padding-right:20px;"><label>Daily WOB:</label></td>
									<td class="unit_field"></td>
                                                                        <td><input type="hidden" class="medium drillingp_name" value="Daily WOB" /></td>
                                                                        <td><input type="hidden" class="medium drillingp_unit" value="" /></td>
									<td><input type="text" class="medium drillingp_value" style="width:70px;" value="<?= empty($rs[1]['value']) ? '' : $rs[1]['value']; ?>"></td>
								</tr>
								<tr>	
									<td class="label_m" style="padding-right:20px;"><label>Circ. Press:</label></td>
									<td class="unit_field">psi</td>
                                                                        <td><input type="hidden" class="medium drillingp_name" value="Circ. Press" /></td>
                                                                        <td><input type="hidden" class="medium drillingp_unit" value="psi" /></td>
									<td><input type="text" class="medium drillingp_value" style="width:70px;" value="<?= empty($rs[2]['value']) ? '' : $rs[2]['value']; ?>" /></td>
								</tr>
								<tr>	
									<td class="label_m" style="padding-right:20px;"><label>Average cavings while:</label></td>
									<td class="unit_field">bbl/h</td>
                                                                        <td><input type="hidden" class="medium drillingp_name" value="Average cavings while" /></td>
                                                                        <td><input type="hidden" class="medium drillingp_unit" value="bbl/h" /></td>
									<td><input type="text" class="medium drillingp_value" style="width:70px;" value="<?= empty($rs[3]['value']) ? '' : $rs[3]['value']; ?>" /></td>
								</tr>
								<tr>	
									<td class="label_m" style="padding-right:20px;"><label>Average cutting while:</label></td>
									<td class="unit_field">bbl/h</td>
                                                                        <td><input type="hidden" class="medium drillingp_name" value="Average cutting while" /></td>
                                                                        <td><input type="hidden" class="medium drillingp_unit" value="bbl/h" /></td>
									<td><input type="text" class="medium drillingp_value" style="width:70px;" value="<?= empty($rs[4]['value']) ? '' : $rs[4]['value']; ?>" /></td>                                                                        
								</tr>
							</table>
						</fieldset>
	    			</td>
	    			<td>
						<fieldset style="margin-left:20px;">	
							<table style="float:left;" class="operational_info_drilling_parameters">                                                          
								<tr>
									<td class="label_m" style="padding-right:20px;"><label>Feet drilling:</label></td>
									<td class="unit_field">ft</td>
                                                                        <td><input type="hidden" class="medium drillingp_name" value="Feet drilling" /></td>
                                                                        <td><input type="hidden" class="medium drillingp_unit" value="ft" /></td>
									<td><input type="text" disabled="disabled" class="medium feet_drilling drillingp_value" style="width:70px;" value="<?= empty($rs[5]['value']) ? '' : $rs[5]['value']; ?>" /></td>
								</tr>
								<tr>	
									<td class="label_m" style="padding-right:20px;"><label>Daily ROP:</label></td>
									<td class="unit_field">ft</td>
                                                                        <td><input type="hidden" class="medium drillingp_name" value="Daily ROP" /></td>
                                                                        <td><input type="hidden" class="medium drillingp_unit" value="ft" /></td>
									<td><input type="text" disabled="disabled" class="medium daily_rop drillingp_value" style="width:70px;" value="<?= empty($rs[6]['value']) ? '' : $rs[6]['value']; ?>" /></td>
								</tr>
								<tr>	
									<td class="label_m" style="padding-right:20px;"><label>Daily avge Temp:</label></td>
									<td class="unit_field">ºF</td>
                                                                        <td><input type="hidden" class="medium drillingp_name" value="Daily avge Temp" /></td>
                                                                        <td><input type="hidden" class="medium drillingp_unit" value="ºF" /></td>
									<td><input type="text" disabled="disabled" class="medium daily_avge_temp drillingp_value" style="width:70px;" name="zavgtemp" id="zavgtemp" value="<?= empty($rs[7]['value']) ? '' : $rs[7]['value']; ?>" /></td>
								</tr>
							</table>
						</fieldset>
	    			</td>
	    		</tr>
	    	</table>
	    </div>
	    <div class="simpleTabsContent">
	    	<fieldset>
					<table style="float:left;" class="operational_info_survey">
                                                <? $rs = $this->Api->get_where('project_report_survey', array('report_id'=>$reporte['id'])); ?>
						<tr>
							<td class="label_m" style="padding-right:20px;"><label>SURVEY MD:</label></td>
							<td class="unit_field">ft</td>
                                                        <td><input type="hidden" class="medium survey_name" value="SURVEY MD" /></td>
                                                        <td><input type="hidden" class="medium survey_unit" value="ft" /></td>
							<td><input type="text" style="width:70px" class="survey_value"  value="<?= empty($rs[0]['value']) ? '' : $rs[0]['value']; ?>" /></td>
						</tr>
						<tr>	
							<td class="label_m" style="padding-right:20px;"><label>SURVEY TVD:</label></label></td>
							<td class="unit_field">ft</td>
                                                        <td><input type="hidden" class="medium survey_name" value="SURVEY TVD" /></td>
                                                        <td><input type="hidden" class="medium survey_unit" value="ft" /></td>
							<td><input type="text" style="width:70px"  class="survey_value" value="<?= empty($rs[1]['value']) ? '' : $rs[1]['value']; ?>" /></td>
						</tr>
						<tr>	
							<td class="label_m" style="padding-right:20px;"><label>INCLINATION:</label></td>
							<td class="unit_field">Deg.</td>
                                                        <td><input type="hidden" class="medium survey_name" value="INCLINATION" /></td>
                                                        <td><input type="hidden" class="medium survey_unit" value="Deg" /></td>
							<td><input type="text" style="width:70px"  class="survey_value" value="<?= empty($rs[2]['value']) ? '' : $rs[2]['value']; ?>" /></td>
						</tr>
						<tr>	
							<td class="label_m" style="padding-right:20px;"><label>AZIMUT:</label></td>
							<td class="unit_field"></td>
                                                        <td><input type="hidden" class="medium survey_name" value="AZIMUT" /></td>
                                                        <td><input type="hidden" class="medium survey_unit" value="" /></td>
							<td><input type="text" style="width:70px"  class="survey_value" value="<?= empty($rs[3]['value']) ? '' : $rs[3]['value']; ?>" /></td>
						</tr>
						<tr>	
							<td class="label_m" style="padding-right:20px;"><label>DOG LEG:</label></td>
							<td class="unit_field"></td>
                                                        <td><input type="hidden" class="medium survey_name" value="DOG LEG" /></td>
                                                        <td><input type="hidden" class="medium survey_unit" value="" /></td>
							<td><input type="text" style="width:70px"  class="survey_value" value="<?= empty($rs[4]['value']) ? '' : $rs[4]['value']; ?>" /></td>
						</tr>
					</table>
				</fieldset>
			</fieldset>
	    </div>
	</div>
</div>