<div class="config_panel" id="inventario">
	<h2>Materials & Equipement</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Materials</a></li>
			<li><a href="#">Equipement</a></li>
	    </ul>
	  
	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
			<fieldset>
				<legend>Instructions</legend>
				<p style="margin:5px 0 10px 0;">
					To activate or deactivate materials from the material list, just check the ones you need 
					and click <strong>'Save'</strong> at the bottom of the list in order to them to appear 
					in the Material Stock tab. If the material you need does not appear in the list, <a href="#link_create_material" class="link_create_material" style="text-decoration:underline;">click here to create it.</a>

				</p>
			</fieldset>
			<fieldset>
				<table style="margin-bottom:20px;">
					<tr>
						<td style="width:20px;"></td>
						<td class="label_m"><input type="text" placeholder="Filter..." style="width:200px;" id="filter_materials" /></td>
						<td class="label_m" style="padding-left:20px;">
							<a href="#show_hide_unselected_materials" class="shon_n_hide_unselected_materials">Show selected materials only</a>
						</td>
					</tr>
				</table>
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
							<td></td>
						</tr>
					</thead>
					<tbody id="materials_activation_table">
						<?php foreach ($all_materials as $material) { ?>
							<tr class="this_material_<?= $material['id']?> buscar_materiales_aqui" id="este_row_material_<?= $material['id']?>">
								<td class="label_m">
									<?php if($material['used_in_project'] == 1){
										$checked = 'checked="checked"';
									}else{
										$checked = '';
									} ?>
									<input type="checkbox" <?= $checked; ?> value="<?= $material['id']?>" style="margin-right:10px;">
									<span style="display:none;">
										<?= $material['description'] ?>	 <br/>
										<?= $material['commercial_name'] ?>	
									</span>
								</td>
								<td>
									<?php if($material['custom'] == 1){ ?>
										<input style="width:100px;margin-right:0;" type="text" value="<?= $material['erp_id']; ?>" />
									<?php }else{ ?>
										<input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['erp_id']; ?>" />
									<?php } ?>	
								</td>
								<td><input title="<?= $material['description'] ?>" style="cursor:pointer;width:200px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
								<td><input title="<?= $material['description'] ?>" style="cursor:pointer;width:200px;max-width:500px;margin-right:0;" type="text" value="<?= $material['commercial_name'] ?>" length="30" /></td>
								<td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?><?= $material['unidad_destino'] ?>" /></td>
								<td><input style="width:50px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['egravity'] ?>" /></td>
								<td><input style="width:50px;margin-right:0;" type="text" value="<?= $material['price'] ?>" /></td>
								<td>
									<?php if($material['custom'] == 1){ ?>
										<a href="#remove_material_<?= $material['id'] ?>"><img src="/img/delete.png" /></a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<input type="button" value="Save" class="update_materials" style="margin:10px 25px;" />
	    	</fieldset>
	    </div>
	    



	    <!-- EQUIPAMIENTO -->
	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
	    	<fieldset>
				<legend>Instructions</legend>
				<p style="margin:5px 0 10px 0;">
					To activate or deactivate equipement, just check the ones you need 
					and click <strong>'Save'</strong> at the bottom of the list in order to them to appear 
					in the Material Stock tab. If the equipement you need does not appear in the list, <a href="#link_create_equipement" class="link_create_equipement" style="text-decoration:underline;">click here to create it.</a>
				</p>
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
							<td class="label_m"><label>U. Cost</label></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($all_equipement as $equipement) { ?>
							<tr>
								<td class="label_m">
									<?php if($equipement['used_in_project'] == 1){
										$checked = 'checked="checked"';
									}else{
										$checked = '';
									} ?>
									<input type="checkbox" <?= $checked; ?> value="<?= $equipement['id']?>" style="margin-right:10px;">
									<span style="display:none;">
										<?= $equipement['description'] ?>	 <br/>
										<?= $equipement['product_name'] ?>	
									</span>
								</td>
								<td class="label_m">
									<?php if($equipement['custom'] == 1){ ?>
									<input type="text" value="<?= $equipement['erp_id'] ?>" style="margin-right:0;width:100px;" />
									<?php }else{?>
									<input type="text" disabled value="<?= $equipement['erp_id'] ?>" style="margin-right:0;width:100px;" />
									<?php } ?>
								</td>
								<td class="label_m"><input type="text" disabled value="<?= $equipement['product_name'] ?>" style="margin-right:0;width:200px;max-width:500px;" /></td>
								<td class="label_m"><input type="text" value="<?= $equipement['commercial_name'] ?>" style="margin-right:0;width:200px;max-width:500px;" /></td>
								<td class="label_m"><input type="text" disabled value="<?= $equipement['equivalencia'] ?><?= $equipement['unidad_destino'] ?>" style="margin-right:0;width:50px;" /></td>
								<td class="label_m"><input type="text" value="<?= $equipement['price'] ?>" style="margin-right:0;width:50px;" /></td>
								<td class="label_m">
									<?php if($equipement['custom'] == 1){ ?>
										<a href="#remove_equipement_<?= $equipement['id'] ?>"><img src="/img/delete.png" /></a>
									<?php } ?>
								</td>
							</tr>
						<?php }?>
					</tbody>
				</table>
			</fieldset>	
	    </div>


	</div>
</div>