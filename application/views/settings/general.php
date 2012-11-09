<div class="config_panel" id="general" style="display:block;">
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">General Properties</a></li>
	    </ul>
	  
	    <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
	    	<fieldset>
	    		<form id="">
			    	<table>
						<tr>
							<td class="label_m" style="width:175px;"><label>Well Name*:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['well_name'] ?>" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Operator*:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['operator'] ?>" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>RIG*:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['rig'] ?>" class="rigname_source" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Location*:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['geozone'] ?>" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Contract Number:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['contract_number'] ?>" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Field:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['field'] ?>" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Operator Logo*:</label></td>
							<td><input type="text" style="width:150px;" placeholder="Click to select..." /></td>
						</tr>
						<tr>
							<td class="label_m" style="width:175px;"><label>ERP ID:</label></td>
							<td><input type="text" style="width:150px;" value="<?= $project['transactional_id'] ?>" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="button" value="Update Settings" style="margin-top:20px;" id="btn_save_general_settings" /></td>
						</tr>	
					</table>
			</form>
			</fieldset>
	    </div>
	</div>
</div>