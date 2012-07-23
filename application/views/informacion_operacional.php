<div class="this_panel" id="informacion_operacional">
	<h2>Operational Info</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
	      <li><a href="#">Mud Pump Data</a></li>
	      <li><a href="#">Bit Data</a></li>
	    </ul>
	    <div class="simpleTabsContent">
	    	<table>
	    		<tr>
	    			<td style="width:50%">
	    				<fieldset style="width:402px;">
				    		<table>
								<tr>
									<td></td>
									<td></td>
									<td class="label_m"><label>PUMP 1:</label></td>
									<td class="label_m"><label>PUMP 2:</label></td>
									<td class="label_m"><label>PUMP 3:</label></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>MAKER:</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:75px;" class="pick_pump pump_1" id="pump_1_maker" placeholder="Select..." /></td>
									<td><input type="text" style="width:75px;" class="pick_pump pump_2" id="pump_2_maker" placeholder="Select..." /></td>
									<td><input type="text" style="width:75px;" class="pick_pump pump_3" id="pump_3_maker" placeholder="Select..." /></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>Efficiency:</label></td>
									<td class="unit_field">%</td>
									<td><input type="text" style="width:75px;" class="pump_1" name="eff_1" id="eff_1" /></td>
									<td><input type="text" style="width:75px;" class="pump_2" name="eff_2" id="eff_2" /></td>
									<td><input type="text" style="width:75px;" class="pump_3" name="eff_3" id="eff_3" /></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>SPM:</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:75px;" class="pump_1" name="spm_1" id="spm_1" /></td>
									<td><input type="text" style="width:75px;" class="pump_2" name="spm_2" id="spm_2" /></td>
									<td><input type="text" style="width:75px;" class="pump_3" name="spm_3" id="spm_3" /></td>
									
								</tr>
							</table>			
	    				</fieldset>
	    			</td>
	    			<td style="width:50%">
	    				<fieldset>
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
									<td><input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_model" disabled="disabled" /></td>
									<td><input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_model" disabled="disabled" /></td>
									<td><input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_model" disabled="disabled" /></td>
								</tr>
								<tr>
									<td class="label_m"><label>TYPE:</label></td>
									<td class="unit_field"></td>
									<td><input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_type" name="pump_1_type" disabled="disabled" /></td>
									<td><input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_type" name="pump_2_type" disabled="disabled" /></td>
									<td><input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_type" name="pump_3_type" disabled="disabled" /></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>MAX PRESS:</label></td>
									<td class="unit_field">psi</td>
									<td><input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_presure" name="pump_1_presure" disabled="disabled" /></td>
									<td><input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_presure" name="pump_2_presure" disabled="disabled" /></td>
									<td><input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_presure" name="pump_3_presure" disabled="disabled" /></td>
									
								</tr>
								<tr>
									<td class="label_m"><label>ROD:</label></td>
									<td class="unit_field">in</td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_rod_dummie" disabled="disabled" />
										<input type="hidden" class="pump_1" id="pump_1_rod" name="pump_1_rod" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_rod_dummie" disabled="disabled" />
										<input type="hidden" class="pump_2" id="pump_2_rod" name="pump_2_rod" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_rod_dummie" disabled="disabled" />
										<input type="hidden" class="pump_3" id="pump_3_rod" name="pump_3_rod" />
									</td>
								</tr>
								<tr>
									<td class="label_m"><label>Stroke/Length:</label></td>
									<td class="unit_field">in</td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_stroke_dummie" disabled="disabled" />
										<input type="hidden" class="pump_1" id="pump_1_stroke" name="pump_1_stroke"  />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_stroke_dummie" disabled="disabled" />
										<input type="hidden" class="pump_2" id="pump_2_stroke" name="pump_2_stroke" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_stroke_dummie" disabled="disabled" />
										<input type="hidden" class="pump_3" id="pump_3_stroke" name="pump_3_stroke" />
									</td>
								</tr>					
								<tr>
									<td class="label_m"><label>Liner/Diameter:</label></td>
									<td class="unit_field">in</td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" id="pump_1_diameter_dummie" disabled="disabled" />
										<input type="hidden" class="pump_1" id="pump_1_diameter" name="pump_1_diameter" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" id="pump_2_diameter_dummie" disabled="disabled" />
										<input type="hidden" class="pump_2" id="pump_2_diameter" name="pump_2_diameter" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" id="pump_3_diameter_dummie" disabled="disabled" />
										<input type="hidden" class="pump_3" id="pump_3_diameter" name="pump_3_diameter" />
									</td>
									
								</tr>
								<tr>
									<td class="label_m"><label style="text-transform:capitalize;">Gal/Stk:</label></td>
									<td class="unit_field"></td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" disabled="disabled" id="galstk_1" name="galstk_1" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" disabled="disabled" id="galstk_2" name="galstk_2" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" disabled="disabled" id="galstk_3" name="galstk_2" />
									</td>
									
								</tr>
								<tr>
									<td class="label_m"><label>GPM:</label></td>
									<td class="unit_field"></td>
									<td>
										<input type="text" style="width:75px;" class="pump_1 white_disabled" disabled="disabled" name="qgal_1" id="qgal_1" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_2 white_disabled" disabled="disabled" name="qgal_2" id="qgal_2" />
									</td>
									<td>
										<input type="text" style="width:75px;" class="pump_3 white_disabled" disabled="disabled" name="qgal_3" id="qgal_3" />
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
	    	<table style="width:100%;">
				<tr>
					<td style="width:50%;">
						<!-- BIT -->
						<fieldset style="height:217px;width:90%;">
							<table>
								<tr>
									<td class="label_m"><label>Bit #:</label></td>
									<td><input type="text" class="medium" id="bit_bitnumber" style="width:144px;"></td>
								</tr>
								<tr>
									<td class="label_m"><label>BIT TYPE:</label></td>
									<td><input type="text" class="medium pick_bit" style="width:144px;" id="broca_bit_type" placeholder="Click to select..."></td>
								</tr>
								<tr>		
									<td class="label_m">
										<label>Bit Diameter:</label>
										<input type="hidden" name="broca_bit_oddeci" id="broca_bit_oddeci" />
									</td>
									<td id="broca_bit_diameter" style="height:23px;vertical-align:middle;padding-left:6px;font-size:13px;"><!-- DATA VIENE DE OVERLAY --></td>
								</tr>
								<tr>		
									<td class="label_m">
										<label>Bit MODEL:</label>
										<input type="hidden" name="broca_bit_model_id" id="broca_bit_model_id" />
									</td>
									<td id="broca_bit_model" style="height:23px;vertical-align:middle;padding-left:6px;font-size:13px;"><!-- DATA VIENE DE OVERLAY --></td>
								</tr>
							</table>
							<fieldset style="width:235px;">
								<legend>Jets</legend>
								<table style="float:left;">
									<tr>
										<td><input type="text" class="broca_jet" id="j_1"></td>
										<td><input type="text" class="broca_jet" id="j_2"></td>
										<td><input type="text" class="broca_jet" id="j_3"></td>
										<td><input type="text" class="broca_jet" id="j_4"></td>
									</tr>
									<tr>
										<td><input type="text" class="broca_jet" id="j_5"></td>
										<td><input type="text" class="broca_jet" id="j_6"></td>
										<td><input type="text" class="broca_jet" id="j_7"></td>
										<td><input type="text" class="broca_jet" id="j_8"></td>
									</tr>
									<tr>
										<td><input type="text" class="broca_jet" id="j_9"></td>
										<td><input type="text" class="broca_jet" id="j_10"></td>
										<td><input type="text" class="broca_jet" id="j_11"></td>
										<td><input type="text" class="broca_jet" id="j_12"></td>
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
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="jets_string" name="jets_string" id="jets_string" /></td>
								</tr>
								<tr>
									<td class="label_m"><label>TFA:</label></td>
									<td class="label_m"><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="tfa" name="tfa" /> in<sup>2</sup></td>
								</tr>
								<tr>
									<td class="label_m"><label>Vel Jets:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" name="veljet" id="veljet" /> ft/seg</td>
								</tr>
								<tr>
									<td class="label_m"><label>PD <sub>BIT</sub>:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="pdbit" name="pdbit" /> psi</td>
								</tr>
								<tr>
									<td class="label_m"><label>% PD <sub>BIT</sub>:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" /></td>
								</tr>
								<tr>
									<td class="label_m"><label>HHP <sub>BIT</sub>:</label></td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="hhp" name="hhp" /> hp</td>
								</tr>
								<tr>
									<td class="label_m"><label>HSI <sub>BIT</sub>:</label> </td>
									<td><input type="text" disabled="disabled" style="margin-right:5px;width:55px;" id="hsi" name="hsi" /> hp/in<sup>2</sup></td>
								</tr>
							</table>
						</fieldset>
					</td>
				</tr>
			</table>
	    </div>
	</div>
</div>