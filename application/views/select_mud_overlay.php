<!-- FORMULARIO SELECCION BROCAS -->
<div class="overlay_wrapper" id="select_mud_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog">
			<h5>PICK A MUD TYPE:</h5>
			<div class="content">
				<table id="table_mud_picker">
					<tr>
						<td class="label_m"><label>MUD TYPE:</label></td>
						<td>
							<select id="mud_overlay_listalodos">
								<option selected="selected" value="">Select...</option>
								<?php foreach ($lista_lodos as $lodo) {
									?><option value="<?= $lodo['nombre'] ?>"><?= $lodo['nombre'] ?></option><?php
								} ?>
							</select>
						</td>
					</tr>
				</table>	
				
				<p><input type="checkbox" id="checkbox_mud_not_found" value="model_not_found" /> I can't find my mud. I need to create a new one.</p>
				
				<form id="new_mud_form">
					<table id="table_mud_creator" style="display:none;">	
						<tr>
							<td class="label_m"><label>mud TYPE:</label></td>
							<td>
								<input type="text" name="nombre">
							</td>
						</tr>
					</table>
				</form>
			</div>

			<div class="cancel_link">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Continue" id="btn_mud_selected" />
			</div>
		</div>
	</div>
</div>