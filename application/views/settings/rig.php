<div class="config_panel" id="rig">
	<h2>Rig Settings</h2>
	<fieldset>
		<fieldset>
			<table>
				<tr>
					<td class="label_m"><label>Rig Name:</label></td>
					<td><input type="text" style="width:150px;" disabled="disabled" value="<?= $project['rig'] ?>" class="rigname" /></td>
				</tr>
				<tr>
					<td class="label_m"><label>Rig Capacity:</label></td>
					<td><input type="text" style="width:150px;" />hp</td>
				</tr>
				<tr>
					<td class="label_m"><label>Stand Lenght:</label></td>
					<td>
						<select style="width:164px;">
							<option value="">Select...</option>
							<option value="single">Single</option>
							<option value="double">Double</option>
							<option value="triple">Triple</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="label_m"><label>Power Unit:</label></td>
					<td>
						<select style="width:164px;">
							<option value="">Select...</option>
							<option value="kelly">Kelly</option>
							<option value="top_drive">Top Drive</option>
							<option value="power_swivel">Power Swivel</option>
						</select>
					</td>
				</tr>
			</table>
		</fieldset>
		
			
		<fieldset>
			<legend>Anular System BOP's</legend>
			<table>
				<tr>
					<td class="label_m"><label>Model:</label></td>
					<td><input type="text" style="width:150px;" /></td>
				</tr>
				<tr>
					<td class="label_m"><label>Nominal Cap.:</label></td>
					<td><input type="text" style="width:150px;" />Psi.</td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>Rams System BOP's</legend>
			<table>
				<tr>
					<td class="label_m"><input type="checkbox" class="cb_piperam" /></td>
					<td class="label_m"><label>Pipe ram</label></td>
					<td></td>
				</tr>
				<tr class="pipe_ram" style="display:none;">
					<td class="label_m"></td>
					<td class="label_m"><label>Model:</label></td>
					<td><input type="text" style="width:150px;" /></td>
				</tr>
				<tr class="pipe_ram" style="display:none;">
					<td></td>
					<td class="label_m"><label>Nominal Cap.:</label></td>
					<td><input type="text" style="width:150px;" />Psi.</td>
				</tr>
				<tr>
					<td class="label_m"><input type="checkbox" class="cb_blindram" /></td>
					<td class="label_m"><label>Blind ram</label></td>
					<td></td>
				</tr>
				<tr class="blindram" style="display:none;">
					<td class="label_m"></td>
					<td class="label_m"><label>Model:</label></td>
					<td><input type="text" style="width:150px;" /></td>
				</tr>
				<tr class="blindram" style="display:none;">
					<td></td>
					<td class="label_m"><label>Nominal Cap.:</label></td>
					<td><input type="text" style="width:150px;" />Psi.</td>
				</tr>
				<tr>
					<td class="label_m"><input type="checkbox" class="cb_shearram" /></td>
					<td class="label_m"><label>Shear ram</label></td>
					<td></td>
				</tr>
				<tr class="shearram" style="display:none;">
					<td class="label_m"></td>
					<td class="label_m"><label>Model:</label></td>
					<td><input type="text" style="width:150px;" /></td>
				</tr>
				<tr class="shearram" style="display:none;">
					<td></td>
					<td class="label_m"><label>Nominal Cap.:</label></td>
					<td><input type="text" style="width:150px;" />Psi.</td>
				</tr>
			</table>
		</fieldset>
		
		<input type="button" value="Update Rig Settings" style="margin-top:20px;">
	</fieldset>
</div>