<div class="config_panel" id="general" style="display:block;">
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">General Properties</a></li>
	    </ul>
	  
	    <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
	    	<fieldset>
	    		<form id="general_properties_form">
			    	<table>
						<tr>
							<td class="label_m" style="width:175px;"><label>Well Name*:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['well_name'] ?>" name="well_name" class="required" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Operator*:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['operator'] ?>" name="operator" class="required" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>RIG*:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['rig'] ?>" class="rigname_source" name="rig" class="required" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Location*:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['geozone'] ?>" name="geozone" class="required" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Contract Number:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['contract_number'] ?>" name="contract_number" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Field:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['field'] ?>" name="field" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Phases:</label></td>
							<td>
								<select name="max_phase" style="width:164px;">
	                                <?php for($i=1 ; $i<11 ; $i++) { ?>
	                                        <?php $selected = ($project['max_phase'] == $i) ? 'selected="selected"' : ''; ?>
	                                        <option value="<?= $i; ?>" <?= $selected; ?>><?= $i; ?></option>
	                                <?php } ?>
	    							<option value="1" >1</option>																
								</select>
							</td>
						</tr>
						<tr style="display:none;">
							<td class="label_m"><label>Operator Logo*:</label></td>
							<td><input type="text" style="width:150px;" placeholder="Click to select..." /></td>
						</tr>
						<tr>
							<td class="label_m" style="width:175px;"><label>ERP ID:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['transactional_id'] ?>" name="transactional_id" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="button" value="Update Settings" style="margin-top:20px;display:none;" id="btn_save_general_settings" /></td>
						</tr>	
					</table>
			</form>
			</fieldset>
	    </div>
	</div>
</div>