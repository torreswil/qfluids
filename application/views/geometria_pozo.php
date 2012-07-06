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
	      <li><a href="#">Hole</a></li>
	      <li><a href="#">Drill String</a></li>
	      <li><a href="#">Casing</a></li>
	    </ul>
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
				<fieldset style="margin-top:10px;">
					<table>
						<tr>
							<td class="label_m"><label>SECTION:</label></td>
							<td class="label_m"><label>OD:</label></td>
							<td class="label_m"><label>ID:</label></td>
							<td class="label_m"><label>LENGTH:</label></td>
						</tr>
						<tr>
							<td><input type="text" class="medium"/></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
						</tr>
						<tr>
							<td><input type="text" class="medium"/></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
						</tr>
						<tr>
							<td><input type="text" class="medium"/></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
						</tr>
						<tr>
							<td><input type="text" class="medium"/></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
						</tr>
						<tr>
							<td><input type="text" class="medium"/></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
						</tr>
						<tr>
							<td><input type="text" class="medium"/></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
							<td><input type="text" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>DRILL PIPE DIAM.:</label></td>
							<td><input type="text" disabled="disabled" /></td>
							<td><input type="text" disabled="disabled" /></td>
							<td><input type="text" disabled="disabled" /></td>
						</tr>
					</table>
				</fieldset>
        </div>
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
	</div>
</div>