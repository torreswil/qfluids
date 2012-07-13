<div class="this_panel" id="broca">
	<h2>Bit Data</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
	      <li><a href="#">Bit</a></li>
	    </ul>
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