			<div class="config_panel" id="enginers">
				<h2>Personal Settings</h2>
	        	<fieldset>
	        		<legend>Engeniering</legend>
		        	<fieldset>
		        		<legend>Report</legend>
		        		<form id="enginer_configuration">
			        		<table>
			        			<tr>
			        				<td class="label_m" style="width:354px;">
			        					<label>Maximun number of enginers to charge:</label>
			        				</td>
			        				<td>
			        					<select style="width:157px;" name="maximun_enginers" id="maximun_enginers">
			        						<option value="1" <?php $project['maximun_enginers'] == '1'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>1</option>
			        						<option value="2" <?php $project['maximun_enginers'] == '2'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>2</option>
			        						<option value="3" <?php $project['maximun_enginers'] == '3'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>3</option>
			        						<option value="4" <?php $project['maximun_enginers'] == '4'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>4</option>
			        					</select>
			        				</td>
			        			</tr>
			        		</table>
		        		</form>
		        		
		        	</fieldset>
		        	<fieldset>
		        		<legend>Create and Remove enginers</legend>
		        		<form id="form_new_enginer">
			        		<table>
			        			<thead>
			        				<tr>
				        				<td class="label_m"><label>First:</label></td>
				        				<td class="label_m"><label>Last:</label></td>
				        				<td class="label_m"><label>Identification:</label></td>
				        				<td class="label_m"><label>Category:</label></td>
				        				<td class="label_m"><label>Daily Rate:</label></td>
				        				<td></td>
				        			</tr>
			        			</thead>
			        			<tbody>
			        				<tr>
					        			<td><input type="text" name="name" style="width:110px;" /></td>
					        			<td><input type="text" name="lastname" style="width:110px;" /></td>
					        			<td><input type="text" name="identification" style="width:110px;" /></td>
					        			<td>
					        				<select style="width:110px;" name="category">
					        					<option value="">Select...</option>
					        					<?php foreach ($engineering_categories as $category) { ?>
					        						<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
					        					<?php } ?>
					        				</select>
					        			</td>
					        			<td><input type="text" name="rate" style="width:110px;" /></td>
					        			<td class="label_m">
					        				<a href="#create_enginer">Create</a>
					        				<input type="hidden" name="project" value="<?= $project['id'] ?>" />
					        			</td>
					        		</tr>
			        			</tbody>
			        		</table>
		        		</form>
		        		<table id="current_enginers_list"></table>
		        	</fieldset>	
	        	</fieldset>
	        	<input type="button" value="Update Settings" style="margin-top:20px;" id="save_enginer_settings" />
			</div>