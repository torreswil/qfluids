<!-- FORMULARIO ADICION DE QUIMICA -->
<div class="overlay_wrapper" id="add_chemicals_overlay">
	<div class="overlay_dialog_wrapper" style="width:870px;">
		<div class="overlay_dialog" style="width:870px;">
			<h5>Add chemicals:</h5>
			
			<table style="margin-bottom:20px;">
				<thead>
					<tr>
						<td class="label_m"><label>Material Name:</label></td>
						<td class="label_m"><label>Unit</label></td>
						<td class="label_m"><label>SG</label></td>
						<td class="label_m"><label>Stock</label></td>
						<td class="label_m"><label>Used</label></td>
						<td class="label_m"><label>Volume</label></td>
						<td class="label_m"><label>Conc.</label></td>
						<td class="label_m"><label>C.x.quim.</label></td>
						<td class="label_m"><label>Ult. conc.</label></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($materials as $material){ ?>
						<tr class="this_material_ac" id="this_material_<?= $material['product_id']?> ">
							<td><input style="width:230px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
							<td>
								<input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" />
								<input type="hidden" name="size_<?= $material['product_id']?>" id="size_<?= $material['product_id']?>" class="size" value="<?= $material['equivalencia'] ?>" />
								<input type="hidden" name="unit_<?= $material['product_id']?>" id="unit_<?= $material['product_id']?>" class="unit" value="<?= $material['unidad_destino'] ?>" />
							</td>
							<td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['egravity'] ?>" name="sg_<?= $material['product_id']?>" id="sg_<?= $material['product_id']?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['avaliable'] ?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="" class="used" name="used_<?= $material['product_id']?>" id="used_<?= $material['product_id']?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" disabled="disabled" id="volincr_<?= $material['product_id']?>" name="volincr_<?= $material['product_id']?>" class="volincr" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" disabled="disabled" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" disabled="disabled" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" disabled="disabled" /></td>
			            </tr>	
					<?php } ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td colspan="2" class="label_m" style="text-align:right;"><label>Total Volume:</label></td>
						<td><input style="width:55px;margin-right:0;" type="text" value="0" class="voltotalchem" id="voltotalchem" name="voltotalchem" disabled="disabled" /></td>
						<td></td>
						<td></td>
						<td></td>
		            </tr>
				</tbody>
			</table>
			<input type="hidden" name="report" value="1">
			<input type="hidden" name="project" value="<?= $project['id'] ?>">
			<input type="hidden" name="tank" value="">
			
			<input type="button" value="Add" style="float:right;" id="addchemical_btn" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:10px;">Cancel</a>
		</div>
	</div>
</div>