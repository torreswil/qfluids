<!-- FORMULARIO SELECCION BROCAS -->
<div class="overlay_wrapper" id="select_bit_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog">
			<h5>Seleccione una broca:</h5>
			<div class="content">
				<table id="table_bit_picker">
					<tr>
						<td class="label_m"><label>Tipo de broca:</label></td>
						<td>
							<select id="bit_overlay_listabrocas">
								<option selected="selected" value="">Seleccione...</option>
								<?php foreach ($lista_brocas as $tipo_broca) {
									?><option value="<?= $tipo_broca['id'] ?>"><?= $tipo_broca['nombre_broca'] ?></option><?php
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>OD:</label></td>
						<td>
							<select id="bit_overlay_listaods">
								<option selected="selected" value="">Seleccione...</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Modelo:</label></td>
						<td>
							<select id="bit_overlay_listamodelos">
								<option selected="selected" value="">Seleccione...</option>
							</select>
						</td>
					</tr>
				</table>	
				
				<p><input type="checkbox" id="checkbox_bit_not_found" value="model_not_found" /> No encuentro mi modelo, deseo crear uno nuevo.</p>
				
				<form id="new_bit_form">
					<table id="table_bit_creator" style="display:none;">	
						<tr>
							<td class="label_m"><label>Tipo de broca:</label></td>
							<td>
								<select id="bit_overlay_listabrocas_new" disabled="disabled" name="id_broca" class="required">
									<option selected="selected" value="">Seleccione...</option>
									<?php foreach ($lista_brocas as $tipo_broca) {
										?><option value="<?= $tipo_broca['id'] ?>"><?= $tipo_broca['nombre_broca'] ?></option><?php
									} ?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>OD:</label></td>
							<td>
								<input type="text" disabled="disabled" name="odfracc" class="required" /> <em>ej.: 3 1/4</em>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Modelo:</label></td>
							<td>
								<input type="text" disabled="disabled" name="nombre_modelo" class="required" />
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Longitud:</label></td>
							<td>
								<input type="text" disabled="disabled" name="length" class="required" /> <em>ft.</em>
							</td>
						</tr>
					</table>
					<input type="hidden" name="odddeci" class="required" />
					<input type="hidden" name="unit_oddfracc" value="in" />
					<input type="hidden" name="unit_odddeci" value="in" />
					<input type="hidden" name="unit_length" value="ft" />
				</form>
			</div>

			<div class="cancel_link">
				<a href="#cancel" class="cancel_overlay">Cancelar</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Continuar" id="btn_bit_selected" />
			</div>
		</div>
	</div>
</div>