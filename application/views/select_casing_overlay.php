<!-- FORMULARIO SELECCION CASING -->
<div class="overlay_wrapper" id="select_casing_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog">
			<h5>Please select a tool:</h5>
			<input type="hidden" id="casing_number" />
			<div class="content">
				<form id="form_pickcasing">
					<table id="table_pickcasing">
						<tr>
							<td class="label_m"><label>Type:</label></td>
							<td>
								<select id="pickcasing_type">
									<option value="">Select...</option>
									<option value="Casing">Casing</option>
									<option value="Liner">Liner</option>
								</select>
							</td>
							<td class="label_m"></td>
						</tr>
						<tr>
							<td class="label_m"><label>OD:</label></td>
							<td>
								<select id="pickcasing_od">
									<option value="">Select...</option>
									<?php foreach($lista_casing as $casing){ ?>
										<option value="<?= $casing['oddeci'] ?>"><?= $casing['odfrac'] ?></option>
									<?php }?>
								</select>
							</td>
							<td class="label_m">in</td>
						</tr>
						<tr>
							<td class="label_m"><label>ID:</label></td>
							<td>
								<select id="pickcasing_id">
									<option value="">Select...</option>
								</select>
							</td>
							<td class="label_m">in</td>
						</tr>
						<tr>
							<td class="label_m"><label>Top:</label></td>
							<td><input type="text" name="" id="pickcasing_top" /></td>
							<td class="label_m">ft</td>
						</tr>
						<tr>
							<td class="label_m"><label>Bottom:</label></td>
							<td><input type="text" name="" id="pickcasing_bottom" /></td>
							<td class="label_m">ft</td>
						</tr>
					</table>
				</form>
				<p><input type="checkbox" id="checkbox_casing_not_found" />I can't find the casing I need. I wish to create a new one.</p>
				<form id="form_createcasing">
					<table id="table_createcasing" style="display:none;">
						<tr>
							<td class="label_m"><label>Type:</label></td>
							<td>
								<select id="createcasing_type">
									<option value="">Select...</option>
									<option value="Casing">Casing</option>
									<option value="Liner">Liner</option>
								</select>
							</td>
							<td><strong></strong></td>
						</tr>
						<tr>
							<td class="label_m"><label>OD:</label></td>
							<td>
								<input type="text" name="odfrac" id="createcasing_odfrac" />
								<input type="hidden" name="oddeci" id="createcasing_od" />
							</td>
							<td class="label_m">in <strong>ej. 1 1/2</strong></td>
						</tr>
						<tr>
							<td class="label_m"><label>ID:</label></td>
							<td>
								<input type="text" name="iddeci" id="createcasing_id" />
							</td>
							<td class="label_m">in <strong>ej. 2.05</strong></td>
						</tr>
						<tr>
							<td class="label_m"><label>Top:</label></td>
							<td><input type="text" name="createcasing_top" id="createcasing_top" /></td>
							<td class="label_m">ft</td>
						</tr>
						<tr>
							<td class="label_m"><label>Bottom:</label></td>
							<td><input type="text" name="" id="createcasing_bottom" /></td>
							<td class="label_m">ft</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="cancel_link">
				<a href="#cancel" class="cancel_overlay">Cancelar</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Continuar" id="btn_casing_selected" />
			</div>
		</div>
	</div>
</div>