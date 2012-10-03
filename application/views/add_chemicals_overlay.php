<!-- FORMULARIO ADICION DE QUIMICA -->
<div class="overlay_wrapper" id="add_chemicals_overlay">
	<div class="overlay_dialog_wrapper" style="width:670px;">
		<div class="overlay_dialog" style="width:670px;">
			<h5>Add chemicals:</h5>
			
			<table style="margin-bottom:20px;">
				<thead>
					<tr>
						<td class="label_m"><label>Material Name:</label></td>
						<td class="label_m"><label>Unit</label></td>
						<td class="label_m"><label>Stock</label></td>
						<td class="label_m"><label>Used</label></td>
						<td class="label_m"><label>Volume</label></td>
						<td class="label_m"><label>Conc.</label></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($materials as $material){ ?>
						<tr class="this_material_<?= $material['product_id']?> ">
							<td><input style="width:300px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['avaliable'] ?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" class="chemical_qty" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" disabled="disabled" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" disabled="disabled" /></td>
			            </tr>	
					<?php } ?>
				</tbody>
			</table>
			<input type="hidden" name="report" value="1">
			<input type="hidden" name="project" value="<?= $project['id'] ?>">
			
			<input type="button" value="Add" style="float:right;" id="addchemical_btn" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:10px;">Cancel</a>
		</div>
	</div>
</div>