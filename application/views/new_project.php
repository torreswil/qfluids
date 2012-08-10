<!-- FORMULARIO CREACION DE PROYECTOS -->
<div class="overlay_wrapper" id="create_project_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog">
			<div class="step_1">
				<h5>Create Project:</h5>
				<div class="content">
					<form id="create_project">
						<table>
							<tr>
								<td class="label_m"><label>Well Name:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Operator:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>RIG:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Location:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Contract Number:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Field:</label></td>
								<td><input type="text" /></td>
							</tr>	
						</table>
					</form>
				</div>
			</div>
			<div class="step_2">
				<h5>Rig Setup</h5>
				<div class="content">
					<form id="create_project">
						<table>
							<tr>
								<td class="label_m"><label>Rig Name:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Rig Power:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Stand Lenght:</label></td>
								<td>
									<select>
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
									<select>
										<option value="">Select...</option>
										<option value="kelly">Kelly</option>
										<option value="top_drive">Top Drive</option>
										<option value="power_swivel">Power Swivel</option>
									</select>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>

			<div class="cancel_link">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Back" id="btn_cp_back" />
				<input type="button" value="Next" id="btn_cp_next" />
				<input type="hidden" value="1" />
			</div>
		</div>
	</div>
</div>