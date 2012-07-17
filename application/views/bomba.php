<div class="this_panel" id="bomba">
	<h2>Datos de la Bomba</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
	      <li><a href="#">Mud Pump</a></li>
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
	</div>
</div>