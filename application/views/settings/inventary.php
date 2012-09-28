<div class="config_panel" id="inventario">
	<h2>Materials</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Active Materials</a></li>
	    </ul>
	  
	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
			<fieldset>
				<legend>Instructions</legend>
				<p style="margin:5px 0 10px 0;">To activate or deactivate materials from the material list, just check the ones you need and click <strong>'Save'</strong> at the bottom of the list in order to them to appear in the Material Stock tab. </p>
			</fieldset>
			<fieldset>
				<table>
					<thead>
						<tr>
							<td></td>
							<td class="label_m"><label>Material Name</label></td>
							<td class="label_m"><label>EG</label></td>
							<td class="label_m"><label>Price</label></td>
							<td class="label_m"><label>Unit</label></td>
						</tr>
					</thead>
					<tbody id="materials_activation_table">
						<?php foreach ($all_materials as $material) { ?>
							<tr class="this_material_<?= $material['id']?> ">
								<td class="label_m">
									<?php if($material['used_in_project'] == 1){
										$checked = 'checked="checked"';
									}else{
										$checked = '';
									} ?>
									<input type="checkbox" <?= $checked; ?> value="<?= $material['id']?>" style="margin-right:10px;">
								</td>
								<td><input style="width:500px;max-width:500px;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
								<td><input style="width:50px;" type="text" disabled="disabled" value="<?= $material['egravity'] ?>" /></td>
								<td><input style="width:100px;" type="text" disabled="disabled" value="<?= $material['price'] ?>" /></td>
								<td><input style="width:100px;" type="text" disabled="disabled" value="<?= $material['unit_name'] ?> (<?= $material['equivalencia'] ?><?= $material['unidad_destino'] ?>)" /></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<input type="button" value="Save" class="update_materials" style="margin:10px 25px;" />
	    	</fieldset>
	    </div>
	</div>
</div>