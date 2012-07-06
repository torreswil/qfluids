<!-- FORMULARIO SELECCION BROCAS -->
<div class="overlay_wrapper" id="select_bit_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog">
			<h5>PICK A BIT:</h5>
			<div class="content">
				<table id="table_bit_picker">
					<tr>
						<td class="label_m"><label>BIT TYPE:</label></td>
						<td>
							<select id="bit_overlay_listabrocas">
								<option selected="selected" value="">Select...</option>
								<?php foreach ($lista_brocas as $tipo_broca) {
									?><option value="<?= $tipo_broca['id'] ?>"><?= $tipo_broca['nombre_broca'] ?></option><?php
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>BIT DIAMETER:</label></td>
						<td>
							<select id="bit_overlay_listaods">
								<option selected="selected" value="">Select...</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>MODEL:</label></td>
						<td>
							<select id="bit_overlay_listamodelos">
								<option selected="selected" value="">Select...</option>
							</select>
						</td>
					</tr>
				</table>	
				
				<p><input type="checkbox" id="checkbox_bit_not_found" value="model_not_found" /> I can't find my model. I need to create a new one.</p>
				
				<form id="new_bit_form">
					<table id="table_bit_creator" style="display:none;">	
						<tr>
							<td class="label_m"><label>BIT TYPE:</label></td>
							<td>
								<select id="bit_overlay_listabrocas_new" disabled="disabled" name="id_broca" class="required">
									<option selected="selected" value="">Select...</option>
									<?php foreach ($lista_brocas as $tipo_broca) {
										?><option value="<?= $tipo_broca['id'] ?>"><?= $tipo_broca['nombre_broca'] ?></option><?php
									} ?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>BIT DIAMETER:</label></td>
							<td>
								<input type="text" disabled="disabled" name="odfracc" class="required" id="odfracc_new" /> <em>ej.: 3 1/4</em>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>MODEL:</label></td>
							<td>
								<input type="text" disabled="disabled" name="nombre_modelo" class="required" id="nombre_modelo_new" />
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>LENGTH:</label></td>
							<td>
								<input type="text" disabled="disabled" name="length" class="required" /> <em>ft.</em>
							</td>
						</tr>
					</table>
					<input type="hidden" name="odddeci" />
					<input type="hidden" name="unit_oddfracc" value="in" />
					<input type="hidden" name="unit_odddeci" value="in" />
					<input type="hidden" name="unit_length" value="ft" />
				</form>
			</div>

			<div class="cancel_link">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Continue" id="btn_bit_selected" />
			</div>
		</div>
	</div>
</div>