<!-- FORMULARIO ADICION MANUAL DE LODO A UN TANQUE DE STORAGE -->
<div class="overlay_wrapper" id="mts_overlay">
	<div class="overlay_dialog_wrapper" style="width:540px;">
		<div class="overlay_dialog" style="width:540px;">
			<h5>Storage Setup:</h5>
			
			<fieldset>
				<p>
					<strong>Please take note:</strong> You will be able to modify this properties only if you have not started volume transfers to the active system.
					If so, you have to empty this tank first in order to define them again.
				</p>
				<table>
					<tr>
						<td class="label_m"><label>Tank Volume (bbl):</label></td>
						<td><input type="text" id="mte_current_volume" /></td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<legend>Volume & Concentrations:</legend>
				<table>
					<thead>
						<tr>
							<td class="label_m"><label>Material Name</label></td>
                            <td class="label_m"><label>Unit</label></td>
                            <td class="label_m"><label>Concentration</label></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($materials as $material) { ?>
								<tr class="this_material_<?= $material['product_id']?> ">
						            <td><input style="width:255px;max-width:255px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
						            <td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
						            <td><input style="width:110px;margin-right:0;" type="text" value="" id="mteconcentration_<?= $material['product_id']?>" class="mteconcentration" /></td>
						        </tr> <?php
							} ?>
						</tr>
					</tbody>
				</table>
			</fieldset>

			<input type="button" value="Working..." id="setup_volume_working" style="float:right;margin-top:20px;display:none;" />
			<input type="hidden" value="" id="mts_tank" />
			<input type="button" value="Save" style="margin-top:20px;float:right;" id="setup_volume_btn" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:27px;">Cancel</a>
		</div>
	</div>
</div>