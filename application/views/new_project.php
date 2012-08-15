<!-- FORMULARIO CREACION DE PROYECTOS -->
<div class="overlay_wrapper" id="create_project_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog">
			<div class="step" style="display:block;" id="page_1">
				<h5>New Project:</h5>
				<div class="content">
					<form id="create_project">
						<table>
							<tr>
								<td class="label_m" style="width:175px;"><label>Well Name:</label></td>
								<td><input type="text" name="well_name" class="required" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Operator:</label></td>
								<td><input type="text" name="operator" class="required" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>RIG:</label></td>
								<td><input type="text" name="rig" class="required" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>City:</label></td>
								<td><input type="text" name="geozone" class="required" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Contract Number:</label></td>
								<td><input type="text" name="contract_number" class="required" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Field:</label></td>
								<td><input type="text" name="field" class="required" /></td>
							</tr>	
						</table>
						<input type="hidden" name="universal_identifier" value="<?= $global_id; ?>">
						<input type="hidden" name="method" value="new_project">
					</form>
				</div>
			</div>
			<div class="cancel_link">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Create Project" id="btn_cp_next" />
				<input type="hidden" value="1" class="pager" id="cp_pager" />
			</div>
		</div>
	</div>
</div>