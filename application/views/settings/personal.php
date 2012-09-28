<div class="config_panel" id="enginers">
	<h2>Personnel Settings</h2>
	
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Report Settings</a></li>
			<li><a href="#">Enginers</a></li>
			<li><a href="#">Operators</a></li>
	      	<li><a href="#">Yard Workers</a></li>
	    </ul>
	  
	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<form id="enginer_configuration">
	        		<table>
	        			<tr>
	        				<td class="label_m" style="width:354px;">
	        					<label>Maximun number of enginers to charge:</label>
	        				</td>
	        				<td>
	        					<select style="width:149px;" name="maximun_enginers" id="maximun_enginers">
	        						<option value="1" <?php $project['maximun_enginers'] == '1'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>1</option>
	        						<option value="2" <?php $project['maximun_enginers'] == '2'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>2</option>
	        						<option value="3" <?php $project['maximun_enginers'] == '3'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>3</option>
	        						<option value="4" <?php $project['maximun_enginers'] == '4'? $selected = 'selected="selected"' : $selected = ''; ?> <?= $selected ?>>4</option>
	        					</select>
	        				</td>
	        			</tr>
                                        <tr style="height: 50px;">
	        				<td class="label_m" style="width:354px;">
	        					<label>Este proyecto tiene operarios de máquina? </label>
	        				</td>	        				
                                                <td class="label_m" style="width:354px;">
	        					<label>Este proyecto tiene obreros de patio?</label>
	        				</td>	        				
	        			</tr>
                                        <tr>						
                                                <?php $checked = ($project['operators']) ? 'checked' : ''; ?>
						<td><input type="radio" <?= $checked; ?> name="operators" value="1" /> YES</td>
                                                <?php $checked = ($project['yard_workers']) ? 'checked' : ''; ?>
                                                <td><input type="radio" <?= $checked; ?> name="yard_workers" value="1" /> YES</td>
                                                
					</tr>
                                        <tr>
                                                <?php $checked = (!$project['operators']) ? 'checked' : ''; ?>
						<td><input type="radio" <?= $checked; ?> name="operators" value="0" /> NO</td>
                                                <?php $checked = (!$project['yard_workers']) ? 'checked' : ''; ?>
                                                <td><input type="radio" <?= $checked; ?> name="yard_workers" value="0" /> NO</td>
					</tr>
	        			<tr>
	        				<td></td>	
	        				<td><input type="button" value="Save report setings" id="save_enginer_settings" style="margin-top:5px;" /></td>
	        			</tr>
	        		</table>
        		</form>
        	</fieldset>
	    </div>


	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
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
			        				<input type="hidden" name="type" value="enginer" />
			        			</td>
			        		</tr>
	        			</tbody>
	        		</table>
        		</form>
        		<table id="current_enginers_list"></table>
        	</fieldset>	
	    </div>


	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<legend>Create and Remove Operators</legend>
        		<form id="form_new_operator">
	        		<table>
	        			<thead>
	        				<tr>
		        				<td class="label_m"><label>First:</label></td>
		        				<td class="label_m"><label>Last:</label></td>
		        				<td class="label_m"><label>Identification:</label></td>
		        				<td class="label_m"><label>Daily Rate:</label></td>
		        				<td></td>
		        			</tr>
	        			</thead>
	        			<tbody>
	        				<tr>
			        			<td><input type="text" name="name" style="width:110px;" /></td>
			        			<td><input type="text" name="lastname" style="width:110px;" /></td>
			        			<td><input type="text" name="identification" style="width:110px;" /></td>
			        			<td><input type="text" name="rate" style="width:110px;" value="<?= $operator_categories[0]['default_rate'] ?>" /></td>
			        			<td class="label_m">
			        				<a href="#create_operator">Create</a>
			        				<input type="hidden" name="project" value="<?= $project['id'] ?>" />
			        				<input type="hidden" name="category" value="4" />
			        				<input type="hidden" name="type" value="operator" />
			        			</td>
			        		</tr>
	        			</tbody>
	        		</table>
        		</form>
        		<table id="current_operators_list"></table>
        	</fieldset>
	    </div>


	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
			<fieldset>
        		<legend>Create and Remove Yard Workers</legend>
        		<form id="form_new_yardworker">
	        		<table>
	        			<thead>
	        				<tr>
		        				<td class="label_m"><label>First:</label></td>
		        				<td class="label_m"><label>Last:</label></td>
		        				<td class="label_m"><label>Identification:</label></td>
		        				<td class="label_m"><label>Daily Rate:</label></td>
		        				<td></td>
		        			</tr>
	        			</thead>
	        			<tbody>
	        				<tr>
			        			<td><input type="text" name="name" style="width:110px;" /></td>
			        			<td><input type="text" name="lastname" style="width:110px;" /></td>
			        			<td><input type="text" name="identification" style="width:110px;" /></td>
			        			<td><input type="text" name="rate" style="width:110px;" value="<?= $yardworker_categories[0]['default_rate'] ?>" /></td>
			        			<td class="label_m">
			        				<a href="#create_yardworker">Create</a>
			        				<input type="hidden" name="project" value="<?= $project['id'] ?>" />
			        				<input type="hidden" name="category" value="5" />
			        				<input type="hidden" name="type" value="yard_worker" />
			        			</td>
			        		</tr>
	        			</tbody>
	        		</table>
        		</form>
        		<table id="current_yardworkers_list"></table>
        	</fieldset>
	    </div>
	</div>

</div>