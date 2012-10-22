<!-- FORMULARIO DE TRANSFERENCIAS DE LODO DESDE Y HACIA LAS RESERVAS -->
<div class="overlay_wrapper" id="tv_osc_overlay">
	<div class="overlay_dialog_wrapper" style="width:542px;">
		<div class="overlay_dialog" style="width:542px;">
			<h5>Tansfer Mud:</h5>
			<fieldset>
				<legend></legend>
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
						            <td><input style="width:110px;margin-right:0;" type="text" disabled="disabled" value="" id="soc_concentration_<?= $material['product_id']?>" class="soc_concentration" /></td>
						        </tr> <?php
							} ?>
						</tr>
					</tbody>
				</table>
			</fieldset>

			<input type="button" value="Working..." id="transfer_osc_volume_btn_working" style="float:right;margin-top:20px;display:none;" />
			<input type="hidden" value="" id="osc_transfer_tank" />
			

			<!-- ULTRA IMPORTANT -->
			<input type="hidden" value="" id="tv_osc_origin" />
			<input type="hidden" value="" id="tv_osc_destiny" />
			<input type="hidden" value="" id="tv_osc_volume" />
			<!-- ULTRA IMPORTANT -->


			<input type="button" value="Transfer Mud" style="margin-top:20px;float:right;" id="transfer_osc_btn" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:27px;">Cancel</a>
		</div>
	</div>
</div>