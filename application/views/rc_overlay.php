<!-- FORMULARIO ADICION DE QUIMICA -->
<div class="overlay_wrapper" id="rc_overlay">
	<div class="overlay_dialog_wrapper" style="width:550px;">
		<div class="overlay_dialog" style="width:550px;">
			<h5>Concentraciones resultantes en Reserve 1<br />(100 bbl from Active to Reserve 1):</h5>
			
			<table style="margin-bottom:20px;">
				<thead>
					<tr>
						<td class="label_m"><label>Material Name:</label></td>
						<td class="label_m"><label>Unit</label></td>
						<td class="label_m"><label>Conc. Original</label></td>
						<td class="label_m"><label>Conc. Result.</label></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($materials as $material){ ?>
						<tr class="this_material_rc" id="this_material_<?= $material['product_id']?> ">
							<td><input style="width:230px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
							<td>
								<input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" />
								<input type="hidden" name="size_<?= $material['product_id']?>" value="<?= $material['equivalencia'] ?>" />
								<input type="hidden" name="unit_<?= $material['product_id']?>" value="<?= $material['unidad_destino'] ?>" />
							</td>
							<td><input style="width:100px;margin-right:0;" type="text" value="0" disabled="disabled" /></td>
							<td><input style="width:100px;margin-right:0;" type="text" value="0" disabled="disabled" /></td>
			            </tr>	
					<?php } ?>
				</tbody>
			</table>
			<input type="hidden" name="report" value="1">
			<input type="hidden" name="project" value="<?= $project['id'] ?>">
			
			<input type="button" value="Close" style="float:right;" id="rc_btn" />
			<!-- <a href="#close" class="close_link" style="display:block;float:left;margin-top:10px;">Cancel</a> -->
		</div>
	</div>
</div>