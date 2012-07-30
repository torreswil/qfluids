<div class="this_panel" id="geometria_pozo" style="display:block;">
	<h2>Hole Geometry</h2>
	<fieldset>
		<table>
			<tr>
				<td class="label_m">
					<label class="emphasis">DEPTH MD:</label>
				</td>
				<td class="label_m" style="padding-right:20px;">
					<input type="text" style="margin-right:5px;width:40px;" /> ft
				</td>
				<td class="label_m">
					<label class="emphasis">BIT DEPTH:</label>
				</td>
				<td class="label_m" style="padding-right:20px;">
					<input type="text" style="margin-right:5px;width:40px;" /> ft
				</td>
			</tr>
		</table>
	</fieldset>
	
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
	      <li><a href="#">Casing</a></li>
	      <li><a href="#">Hole</a></li>
	      <li><a href="#">Drill String</a></li>
	      <li><a href="#">Drill String Math</a></li>
	      <li><a href="#">Anular Section Math</a></li>
	    </ul>
	    <div class="simpleTabsContent" style="height:329px;">
			<!-- CASING -->
			<fieldset>
				<table id="casing_table">
					<tr>
						<td class="label_m"><label>NAME</label></td>
						<td class="label_m"><label>OD [<span style="text-transform:lowercase;">in</span>]</label></td>
						<td class="label_m"><label>ID [<span style="text-transform:lowercase;">in</span>]</label></td>
						<td class="label_m"><label>TOP [<span style="text-transform:lowercase;">ft</span>]</label></td>	
						<td class="label_m"><label>BOTTOM [<span style="text-transform:lowercase;">ft</span>]</label></td>
						<td class="label_m"><label>VOLUME[<span style="text-transform:lowercase;">bbl</span>]</label></td>
						<td class="label_m"><label>LENGTH[<span style="text-transform:lowercase;">ft</span>]</label></td>														
						<td></td>
					</tr>
					<tr id="casing_tool_1" class="casing_tool_row">
						<td>
							<input type="text" value="Select..." class="pick_casing" id="picker_1" style="width:100px;">
						</td>
						<td>
							<input type="hidden" class="od" disabled="disabled" value="0" />
							<input type="text" class="od_dummie" style="width:60px;" disabled="disabled" value="0" />
						</td>
						<td><input type="text" class="id" disabled="disabled" value="0" /></td>
						<td><input type="text" class="top" disabled="disabled" value="0" /></td>
						<td><input type="text" class="bottom" disabled="disabled" value="0" /></td>
						<td><input type="text" class="volume" disabled="disabled" value="0" /></td>
						<td><input type="text" class="length" disabled="disabled" value="0" /></td>
						<td><a href="#casingclear_1" class="casingclear" style="display:none;">Clear</a></td>					
					</tr>
					<tr id="casing_tool_2" class="casing_tool_row">
						<td>
							<input type="text" value="Select..." class="pick_casing" id="picker_2" style="width:100px;">
						</td>
						<td>
							<input type="hidden" class="od" disabled="disabled" value="0" />
							<input type="text" class="od_dummie" style="width:60px;" disabled="disabled" value="0" />
						</td>
						<td><input type="text" class="id" disabled="disabled" value="0" /></td>
						<td><input type="text" class="top" disabled="disabled" value="0" /></td>
						<td><input type="text" class="bottom" disabled="disabled" value="0" /></td>
						<td><input type="text" class="volume" disabled="disabled" value="0" /></td>
						<td><input type="text" class="length" disabled="disabled" value="0" /></td>
						<td><a href="#casingclear_2" class="casingclear" style="display:none;">Remove</a></td>						
					</tr>
					<tr id="casing_tool_3" class="casing_tool_row">
						<td>
							<input type="text" value="Select..." class="pick_casing" id="picker_3" style="width:100px;">
						</td>
						<td>
							<input type="hidden" class="od" disabled="disabled" value="0" />
							<input type="text" class="od_dummie" style="width:60px;" disabled="disabled" value="0" />
						</td>
						<td><input type="text" class="id" disabled="disabled" value="0" /></td>
						<td><input type="text" class="top" disabled="disabled" value="0" /></td>
						<td><input type="text" class="bottom" disabled="disabled" value="0" /></td>
						<td><input type="text" class="volume" disabled="disabled" value="0" /></td>
						<td><input type="text" class="length" disabled="disabled" value="0" /></td>
						<td><a href="#casingclear_3" class="casingclear" style="display:none;">Remove</a></td>						
					</tr>
					<tr id="casing_tool_4" class="casing_tool_row">
						<td>
							<input type="text" value="Select..." class="pick_casing" id="picker_4" style="width:100px;">
						</td>
						<td>
							<input type="hidden" class="od" disabled="disabled" value="0" />
							<input type="text" class="od_dummie" style="width:60px;" disabled="disabled" value="0" />
						</td>
						<td><input type="text" class="id" disabled="disabled" value="0" /></td>
						<td><input type="text" class="top" disabled="disabled" value="0" /></td>
						<td><input type="text" class="bottom" disabled="disabled" value="0" /></td>
						<td><input type="text" class="volume" disabled="disabled" value="0" /></td>
						<td><input type="text" class="length" disabled="disabled" value="0" /></td>
						<td><a href="#casingclear_4" class="casingclear" style="display:none;">Remove</a></td>						
					</tr>
					<tr id="casing_tool_5" class="casing_tool_row">
						<td>
							<input type="text" value="Select..." class="pick_casing" id="picker_5" style="width:100px;">
						</td>
						<td>
							<input type="hidden" class="od" disabled="disabled" value="0" />
							<input type="text" class="od_dummie" style="width:60px;" disabled="disabled" value="0" />
						</td>
						<td><input type="text" class="id" disabled="disabled" value="0" /></td>
						<td><input type="text" class="top" disabled="disabled" value="0" /></td>
						<td><input type="text" class="bottom" disabled="disabled" value="0" /></td>
						<td><input type="text" class="volume" disabled="disabled" value="0" /></td>
						<td><input type="text" class="length" disabled="disabled" value="0" /></td>
						<td><a href="#casingclear_5" class="casingclear" style="display:none;">Remove</a></td>						
					</tr>
					<tr id="casing_tool_6" class="casing_tool_row">
						<td>
							<input type="text" value="Select..." class="pick_casing" id="picker_6" style="width:100px;">
						</td>
						<td>
							<input type="hidden" class="od" disabled="disabled" value="0" />
							<input type="text" class="od_dummie" style="width:60px;" disabled="disabled" value="0" />
						</td>
						<td><input type="text" class="id" disabled="disabled" value="0" /></td>
						<td><input type="text" class="top" disabled="disabled" value="0" /></td>
						<td><input type="text" class="bottom" disabled="disabled" value="0" /></td>
						<td><input type="text" class="volume" disabled="disabled" value="0" /></td>
						<td><input type="text" class="length" disabled="disabled" value="0" /></td>
						<td><a href="#casingclear_6" class="casingclear" style="display:none;">Remove</a></td>						
					</tr>
					<tr id="casing_tool_7" class="casing_tool_row">
						<td>
							<input type="text" value="Select..." class="pick_casing" id="picker_7" style="width:100px;">
						</td>
						<td>
							<input type="hidden" class="od" disabled="disabled" value="0" />
							<input type="text" class="od_dummie" style="width:60px;" disabled="disabled" value="0" />
						</td>
						<td><input type="text" class="id" disabled="disabled" value="0" /></td>
						<td><input type="text" class="top" disabled="disabled" value="0" /></td>
						<td><input type="text" class="bottom" disabled="disabled" value="0" /></td>
						<td><input type="text" class="volume" disabled="disabled" value="0" /></td>
						<td><input type="text" class="length" disabled="disabled" value="0" /></td>
						<td><a href="#casingclear_7" class="casingclear" style="display:none;">Remove</a></td>						
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
										<td><input type="text" style="width:40px;" /></td>

										<td class="label_m"><label>TOTAL LENGTH BHA:</label></td>
										<td><input type="text" name="totalbha" id="totalbha" disabled="disabled" style="width:40px;" /></td>
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
											<td class="label_m" style="text-align:center;"><label>OD:</label></td>
											<td class="label_m" style="text-align:center;"><label>ID:</label></td>
											<td class="label_m" style="text-align:center;"><label>LENGTH:</label></td>
											<td class="label_m" style="text-align:center;"><label>Capac.</label></td>
											<td class="label_m" style="text-align:center;"><label>Displac.</label></td>
											<td class="label_m" style="text-align:center;"><label>Capac.</label></td>
											<td class="label_m" style="text-align:center;"><label>Displa.</label></td>
											<td class="label_m" colspan="2" style="text-align:center;"><label>Pressure Losses</label></td>
											<td></td>
										</tr>
										<tr>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;"></td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">Vol bbl</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">Vol bbl</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">bbl/ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">bbl/ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">Power</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">Bingh</td>
										</tr>
										<tr>
											<td class="label_m"><label>DRILL PIPE:</label></td>
											<td><input type="text" name="oddp" id="oddp" /></td>
											<td><input type="text" name="iddp" id="iddp" /></td>
											<td><input type="text" name="longdp" id="longdp" value="0" style="width:40px;" /></td>
											<td><input type="text" name="capvdp" id="capvdp" disabled="disabled"/></td>
											<td><input type="text" name="dispvdp" id="dispvdp" disabled="disabled"/></td>
											<td><input type="text" name="capdp" id="capdp" disabled="disabled" style="width:40px;" /></td>
											<td><input type="text" name="dispdp" id="dispdp" disabled="disabled" style="width:40px;"/></td>
											<td><input type="text" name="powerlosspb" id="powerlosspb" disabled="disabled"/></td>
											<td><input type="text" name="zbinglosspb" id="zbinglosspb" disabled="disabled"/></td>
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
												<select class="select_drill_string drillstring_tool_1" id="select_drill_string_1">
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
											<td><input type="text" type="text" name="odbha_1" id="odbha_1" class="odbha_1 odbha" /></td>
											<td><input type="text" type="text" name="idbha_1" id="idbha_1" class="idbha_1 idbha" /></td>
											<td><input type="text" type="text" name="longbha_1" id="longbha_1" class="longbha_1 longbha" value="0" style="width:40px;" /></td>
											<td><input type="text" type="text" name="capvbha_1" id="capvbha_1" disabled="disabled" class="capvbha_1 capvbha" /></td>
											<td><input type="text" type="text" name="dispvbha_1" id="dispvbha_1" class="dispvbha_1 dispvbha" disabled="disabled"/></td>
											<td><input type="text" type="text" name="capbha_1" id="capbha_1" class="capbha_1 capbha" disabled="disabled" style="width:40px;" /></td>
											<td><input type="text" type="text" name="dispbha_1" id="dispbha_1" class="dispbha_1 dispbha" disabled="disabled" style="width:40px;" /></td>
											<td><input type="text" type="text" name="powerlossbha_1" id="powerlossbha_1" disabled="disabled"/></td>
											<td><input type="text" type="text" name="zbinglossbha_1" id="zbinglossbha_1" disabled="disabled"/></td>
											<td class="label_m"><a href="#removeds_1" class="remove_ds">Remove</a></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td class="label_m"><label>TOTAL:</label></td>
											<td><input type="text" disabled="disabled" id="totalds" name="totalds" style="width:40px;" /></td>
											<td><input type="text" disabled="disabled" id="captotal" name="captotal"/></td>
											<td><input type="text" disabled="disabled" id="disptotal" name="disptotal" /></td>
											<td></td>
											<td class="label_m"><label>TOTAL:</label></td>
											<td><input type="text" disabled="disabled" /></td>
											<td><input type="text" disabled="disabled" /></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</fieldset>
						</td>						
					</tr>
				</table>
        </div>
        <!-- DRILL STRING MATH -->
        <div class="simpleTabsContent" id="ds_math">
        	<?php $this->load->view('ds_math'); ?>
        </div>
        <!-- ANULAR SECTION MATH -->
        <div class="simpleTabsContent" id="as_math">
        	<?php $this->load->view('as_math'); ?>
        </div>
	</div>
</div>