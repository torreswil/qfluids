<div class="config_panel" id="inventario">
	<h2>Materials & Equipement</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Materials</a></li>
			<li><a href="#">Equipement</a></li>
	    </ul>
	  
	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
			<fieldset>
				<table>
					<thead>
						<tr>
							<td></td>
							<td class="label_m"><label>Code</label></td>
							<td class="label_m"><label>Internal Name</label></td>
							<td class="label_m"><label>Commercial Name</label></td>
							<td class="label_m"><label>Unit</label></td>
							<td class="label_m"><label>SG</label></td>
							<td class="label_m"><label>U. Cost</label></td>	
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width:25px;"></td>
							<td>
								<input style="width:100px;margin-right:0;" type="text" />	
							</td>
							<td><input style="width:200px;max-width:500px;margin-right:0;" type="text" /></td>
							<td><input style=";width:200px;max-width:500px;margin-right:0;" type="text" length="30" /></td>
							<td><input style="width:100px;margin-right:0;" type="text" /></td>
							<td><input style="width:50px;margin-right:0;" type="text" /></td>
							<td><input style="width:50px;margin-right:0;" type="text" /></td>
						</tr>
						<tr>
							<td></td>
							<td colspan="6"><input type="text" style="width:780px;max-width:1000px;margin-right:0;" placeholder="Write down the material description, uses, etc"></td>
						</tr>
						<tr>
							<td></td>
							<td colspan="6">
								<input type="button" value="Create Material" style="margin-top:10px;margin-right:0;" />
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			<fieldset>
				<table>
					<thead>
						<tr>
							<td></td>
							<td class="label_m"><label>Code</label></td>
							<td class="label_m"><label>Internal Name</label></td>
							<td class="label_m"><label>Commercial Name</label></td>
							<td class="label_m"><label>Unit</label></td>
							<td class="label_m"><label>SG</label></td>
							<td class="label_m"><label>U. Cost</label></td>
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
								<td>
									<input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="00000" />	
								</td>
								<td><input title="Lubricante y reductor de torque - Anti-acresión y anti embotamiento (base hidrocarburo y/o vegetal)" style="cursor:pointer;width:200px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
								<td><input title="Lubricante y reductor de torque - Anti-acresión y anti embotamiento (base hidrocarburo y/o vegetal)" style="cursor:pointer;width:200px;max-width:500px;margin-right:0;" type="text" value="<?= $material['commercial_name'] ?>" length="30" /></td>
								<td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['unit_name'] ?> (<?= $material['equivalencia'] ?><?= $material['unidad_destino'] ?>)" /></td>
								<td><input style="width:50px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['egravity'] ?>" /></td>
								<td><input style="width:50px;margin-right:0;" type="text" value="<?= $material['price'] ?>" /></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<input type="button" value="Save" class="update_materials" style="margin:10px 25px;" />
	    	</fieldset>
	    </div>
	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">

	    </div>
	</div>
</div>