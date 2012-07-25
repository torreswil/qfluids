<!-- FORMULARIO SELECCION CASING -->
<div class="overlay_wrapper" id="select_casing_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog">
			<h5>Please select a casing tool:</h5>

			<form id="form_pickcasing">
				<table id="table_pickcasing">
					<tr>
						<td>Casing Type:</td>
						<td>
							<select>
								<option value="">Select...</option>
								<option value="Casing">Casing</option>
								<option value="Liner">Liner</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>OD:</td>
						<td>
							<select id="pickcasing_od">
								<option value="">Select...</option>
								<?php foreach($lista_casing as $casing){ ?>
									<option value="<?= $casing['oddeci'] ?>"><?= $casing['odfrac'] ?></option>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr>
						<td>ID:</td>
						<td>
							<select>
								<option value="">Select...</option>
							</select>
						</td>
					</tr>
				</table>
			</form>

			<div class="content">
					
				<p><input type="checkbox" id="checkbox_casing_not_found" /> No encuentro el diámetro, deseo crear uno nuevo.</p>
				
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