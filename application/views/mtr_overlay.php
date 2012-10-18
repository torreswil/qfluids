<!-- FORMULARIO DE TRANSFERENCIAS DE LODO DESDE Y HACIA LAS RESERVAS -->
<div class="overlay_wrapper" id="mtr_overlay">
	<div class="overlay_dialog_wrapper" style="width:542px;">
		<div class="overlay_dialog" style="width:542px;">
			<h5>Tansfer Mud:</h5>
			
			<fieldset>
				<table>
					<tr>
						<td class="label_m"><label>Origin:</label></td>
						<td class="label_m"><label>Destiny:</label></td>
						<td class="label_m"><label>Volumen (bbl):</label></td>
					</tr>
					<tr>
						<td>
							<select id="tv_origin">
								<option value="">Select...</option>
								<?php foreach($pill_tanks as $tank){ ?>
									<option value="<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></option>
								<?php } ?>
								<?php foreach($trip_tanks as $tank){ ?>
									<option value="<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></option>
								<?php } ?>
								<?php foreach($reserve_tanks as $tank){ ?>
									<option value="<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></option>
								<?php } ?>
							</select>
						</td>
						<td>
							<select id="tv_destiny">
								<option value="">Select...</option>
								<?php foreach($pill_tanks as $tank){ ?>
									<option value="<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></option>
								<?php } ?>
								<?php foreach($trip_tanks as $tank){ ?>
									<option value="<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></option>
								<?php } ?>
								<?php foreach($reserve_tanks as $tank){ ?>
									<option value="<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></option>
								<?php } ?>
							</select>
						</td>
						<td class="label_m"><input type="text" style="width:100px;" id="tv_volume" /></td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<legend>Concentraciones resultantes en destino:</legend>
				<table>
					<thead>
						<tr>
							<td class="label_m"><label>Material Name</label></td>
                            <td class="label_m"><label>Unit</label></td>
                            <td class="label_m"><label>Concentratrion</label></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php foreach ($materials as $material) { ?>
								<tr class="this_material_<?= $material['product_id']?> ">
						            <td><input style="width:255px;max-width:255px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
						            <td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
						            <td><input style="width:110px;margin-right:0;" type="text" disabled="disabled" value="" id="sconcentration_<?= $material['product_id']?>" class="sconcentration" /></td>
						        </tr> <?php
							} ?>
						</tr>
					</tbody>
				</table>
			</fieldset>
			<input type="button" value="Transfer Mud" style="margin-top:20px;float:right;" id="transfer_volume_btn" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:27px;">Cancel</a>
		</div>
	</div>
</div>