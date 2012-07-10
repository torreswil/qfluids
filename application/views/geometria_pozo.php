<div class="this_panel" id="geometria_pozo">
	<h2>Geometría del Pozo</h2>
	<fieldset>
		<table>
			<tr>
				<td class="label_m">
					<label class="emphasis">DEPTH MD:</label>
				</td>
				<td class="label_m" style="padding-right:20px;">
					<input type="text" style="margin-right:5px;" /> ft
				</td>
				<td class="label_m">
					<label class="emphasis">BIT DEPTH:</label>
				</td>
				<td class="label_m" style="padding-right:20px;">
					<input type="text" style="margin-right:5px;" /> ft
				</td>
			</tr>
		</table>
	</fieldset>
	
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
	      <li><a href="#">Casing</a></li>
	      <li><a href="#">Hole</a></li>
	      <li><a href="#">Drill String</a></li>
	    </ul>
	    <div class="simpleTabsContent" style="height:329px;">
			<!-- CASING -->
			<fieldset>
				<table>
					<tr>
						<td class="label_m"><label>NAME</label></td>
						<td class="label_m"><label>OD [<span style="text-transform:lowercase;">in</span>]</label></td>
						<td class="label_m"><label>ID [<span style="text-transform:lowercase;">in</span>]</label></td>
						<td class="label_m"><label>TOP [<span style="text-transform:lowercase;">ft</span>]</label></td>	
						<td class="label_m"><label>BOTTOM [<span style="text-transform:lowercase;">ft</span>]</label></td>														
					</tr>
					<tr>
						<td>
							<select class="pick_casing">
								<option>Seleccione...</option>
								<option value="casing">Casing</option>
								<option valie="liner">Liner</option>
							</select>
						</td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>						
					</tr>						
				</table>
			</fieldset>
        </div>
	    <div class="simpleTabsContent" style="height:329px;">
	    	<!-- HOLE -->
			<fieldset>
				<h4>Washout Estimation From:</h4>
				<p>
					Estimación del washout por incremento en pulgadas del diametro del pozo estimada
					por los siguientes items:
				</p>
				<table style="float:left;">
					<tr>
						<td class="label_m"><label class="emphasis">OPEN HOLE:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label>Rice & Carbide Test:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label>Cuttings & Caving record:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label>Caliper:</label></td>
						<td><input type="text"></td>
					</tr>
				</table>
				<table style="float:left;">
					<tr>
						<td class="label_m"><label class="emphasis">WASHOUT (%):</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
					<tr>
						<td class="label_m"><label class="emphasis">AVERAGE HOLE:</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
				</table>
			</fieldset>
	    </div>
        <div class="simpleTabsContent" style="height:329px;">
        		<!-- DRILL STRING -->
				<table>
					<tr>
						<td colspan="2">
							<fieldset>
								<table>
									<tr>
										<td class="label_m"><label>BHA#:</label></td>
										<td><input type="text" /></td>

										<td class="label_m"><label>TOTAL LENGTH BHA:</label></td>
										<td><input type="text" /></td>
									</tr>
								</table>
							</fieldset>
						</td>
					</tr>
					<tr>
						<td>
							<fieldset style="margin-top:10px;">
								<table>
									<thead>
										<tr>
											<td class="label_m"><label>SECTION:</label></td>
											<td class="label_m"><label>OD:</label></td>
											<td class="label_m"><label>ID:</label></td>
											<td class="label_m"><label>LENGTH:</label></td>
											<td class="label_m"><label>Capac.</label></td>
											<td class="label_m"><label>Displac.</label></td>
											<td class="label_m"><label>Vel.</label></td>
											<td class="label_m"><label>Capac.</label></td>
											<td class="label_m"><label>Displa.</label></td>
											<td class="label_m" colspan="2"><label>Pressure Losses</label></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td class="unit_field" style="text-align:center;">ft</td>
											<td class="unit_field" style="text-align:center;">Vol bbl</td>
											<td class="unit_field" style="text-align:center;">Vol bbl</td>
											<td class="unit_field" style="text-align:center;">ft/sec</td>
											<td class="unit_field" style="text-align:center;">bbl/ft</td>
											<td class="unit_field" style="text-align:center;">bbl/ft</td>
											<td class="unit_field" style="text-align:center;">Power</td>
											<td class="unit_field" style="text-align:center;">Bingh</td>
										</tr>
										<tr>
											<td class="label_m"><label>DRILL PIPE:</label></td>
											<td><input type="text" /></td>
											<td><input type="text" /></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td></td>
										</tr>
										<tr>
											<td><a href="#" id="add_another_drill">Add another...</a></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</thead>
									<tbody class="drill_string_pieces">
										<tr id="row_select_drill_string_1" class="row_select_drill_string">
											<td>
												<select class="select_drill_string" id="select_drill_string_1">
													<option value="">Select...</option>
													<option value="bit_sub">Bit + Sub</option>
													<option value="bit">Bit</option>
													<option value="hw">HW</option>
													<option value="dc">DC</option>
													<option value="motor">Motor</option>
													<option value="stb">STB</option>
													<option value="xo">XO</option>
													<option value="hwdp">HWDP</option>
													<option value="mwd">MWD</option>
													<option value="dp">DP</option>
													<option value="xodp">XODP</option>
													<option value="jar">Jar</option>
													<option value="power_drive">Power Drive</option>
													<option value="vortex">Vortex</option>
													<option value="lwd">LWD</option>
												</select>
											</td>
											<td><input type="text" /></td>
											<td><input type="text" /></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td><input type="text" disabled="disabled"/></td>
											<td class="label_m"><a href="#removeds_1" class="remove_ds">Remove</a></td>
										</tr>
									</tbody>
								</table>
							</fieldset>
						</td>						
					</tr>
				</table>
        </div>
	</div>
</div>