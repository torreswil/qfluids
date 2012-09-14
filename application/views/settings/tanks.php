<div class="config_panel" id="tanks">
	<h2>Tanks</h2>
	
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Active</a></li>
			<li><a href="#">Reserve</a></li>
	    </ul>
	  
	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<legend>Create an active tank:</legend>
        		<fieldset>
        			<legend>Tank Properties</legend>
	        		<table style="float:left;">
	        			<tr>
	        				<td class="label_m"><label>Tank name:</label></td>
	        				<td class="label_m"><label>Agitators #:</label></td>
	        				<td class="label_m"><label>Jets:</label></td>
	        				<td class="label_m"><label>Tank type:</label></td>
	        				<td class="label_m"><label>Vol. Cap. (bbl):</label></td>
	        				<td class="label_m"><label>Max. headroom:</label></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m">
	        					<select style="width:125px;">
	        						<option value="">Select...</option>
	        						<?php foreach($tank_names_active as $name){ ?>
	        							<option value="<?= $name['id'] ?>"><?= $name['name'] ?></option>
	        						<?php } ?>
	        					</select>
	        				</td>
	        				<td>
	        					<select style="width:125px;">
	        						<option value="0">0</option>
	        						<option value="1">1</option>
	        						<option value="2">2</option>
	        						<option value="3">3</option>
	        						<option value="4">4</option>
	        						<option value="5">5</option>
	        						<option value="6">6</option>
	        						<option value="7">7</option>
	        						<option value="8">8</option>
	        						<option value="9">9</option>
	        					</select>
	        				</td>
	        				<td>
	        					<select style="width:125px;">
	        						<option value="1">Yes</option>
	        						<option value="0">No</option>
	        					</select>
	        				</td>
	        				<td class="label_m">
	        					<select style="width:120px;" id="active_type">
	        						<option value="">Select...</option>
	        						<?php foreach($tank_types as $type){ ?>
	        							<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
	        						<?php } ?>
	        					</select>
	        				</td>
	        				<td>
	        					<input type="text" disabled="disabled" style="width:110px;margin-right:5px;"/>
	        				</td>
	        				<td>
	        					<input type="text" disabled="disabled" style="width:110px;margin-right:5px;" />
	        				</td>
	        			</tr>
	        		</table>
	        	</fieldset>

        		<fieldset class="tank_measures_fieldset_active" style="display:none;">
        			<legend>Tank measures</legend>
	        		<!-- cuadrado -->
	        		<table style="display:none;" id="active_cuadrado" class="tank_type_form_active">
	        			<tr>
	        				<td class="label_m"><label>Length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_largo"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Width:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_ancho"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Heigth:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_alto"></td>
	        			</tr>
	        		</table>


	        		<!-- semicircular -->
	        		<table style="display:none;" id="active_semicircular" class="tank_type_form_active">
	        			<tr>
	        				<td class="label_m"><label>Cube length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_largo"></td>
	        				<td class="label_m"><label>Semicilinder length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_largo"></td>
	        			</tr>
	        			<tr>	
	        				<td class="label_m"><label>Cube width:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_ancho"></td>
	        				<td class="label_m"><label>Semicilinder width:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_ancho"></td>
	        			</tr>
	        			<tr>	
	        				<td class="label_m"><label>Cube height:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_alto"></td>
	        				<td class="label_m"><label>Semicilinder height:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_alto"></td>
	        			</tr>
	        		</table>

	        		<!-- tipo trailer -->
	        		<table style="display:none;" id="active_trailer" class="tank_type_form_active">
	        			<tr>
	        				<td class="label_m"><label>Superior section length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_largo"></td>
	        				<td class="label_m"><label>Inferior section length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_largo"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Superior section width:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_ancho"></td>
	        				<td class="label_m"><label>Inferior section width.:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_ancho"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Superior section height:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_alto"></td>
	        				<td class="label_m"><label>Inferior section height:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_alto"></td>
	        			</tr>
	        		</table>
	        		
	        		<!-- cilindro horizontal -->
	        		<table style="display:none;" id="active_horizontal" class="tank_type_form_active">
	        			<tr>
	        				<td class="label_m"><label>Diameter:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="diameter"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_largo"></td>
	        			</tr>
	        		</table>
        		</fieldset>
        		<input type="button" value="Create tank" style="margin-top:10px;display:none" id="btn_create_active_tank" />
        	</fieldset>

        	<fieldset>
        		<legend>Current active tanks:</legend>
        	</fieldset>
	    </div>


	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<legend>Create a reserve tank</legend>
        		<fieldset>
        			<legend>Tank Properties</legend>
	        		<table style="float:left;">
	        			<tr>
	        				<td class="label_m"><label>Tank name:</label></td>
	        				<td class="label_m"><label>Agitators #:</label></td>
	        				<td class="label_m"><label>Jets:</label></td>
	        				<td class="label_m"><label>Tank type:</label></td>
	        				<td class="label_m"><label>Vol. Cap. (bbl):</label></td>
	        				<td class="label_m"><label>Max. headroom:</label></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m">
	        					<select style="width:126px;">
	        						<option value="">Select...</option>
	        						<?php foreach($tank_names_reserve as $name){ ?>
	        							<option value="<?= $name['id'] ?>"><?= $name['name'] ?></option>
	        						<?php } ?>
	        					</select>
	        				</td>
	        				<td>
	        					<select style="width:126px;">
	        						<option value="0">0</option>
	        						<option value="1">1</option>
	        						<option value="2">2</option>
	        						<option value="3">3</option>
	        						<option value="4">4</option>
	        						<option value="5">5</option>
	        						<option value="6">6</option>
	        						<option value="7">7</option>
	        						<option value="8">8</option>
	        						<option value="9">9</option>
	        					</select>
	        				</td>
	        				<td>
	        					<select style="width:126px;">
	        						<option value="1">Yes</option>
	        						<option value="0">No</option>
	        					</select>
	        				</td>
	        				<td class="label_m">
	        					<select style="width:120px;" id="reserve_type">
	        						<option value="">Select...</option>
	        						<?php foreach($tank_types as $type){ ?>
	        							<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
	        						<?php } ?>
	        					</select>
	        				</td>
	        				<td>
	        					<input type="text" disabled="disabled" style="width:110px;margin-right:5px;"/>
	        				</td>
	        				<td>
	        					<input type="text" disabled="disabled" style="width:110px;margin-right:5px;" />
	        				</td>
	        			</tr>
	        		</table>
	        	</fieldset>	
	        	<fieldset class="tank_measures_fieldset_reserve" style="display:none;">
	        		<legend>Tank measures</legend>
	        		<!-- cuadrado -->
	        		<table style="display:none;" id="reserve_cuadrado" class="tank_type_form_reserve">
	        			<tr>
	        				<td class="label_m"><label>Length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_largo"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Width:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_ancho"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Heigth:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_alto"></td>
	        			</tr>
	        		</table>


	        		<!-- semicircular -->
	        		<table style="display:none;" id="reserve_semicircular" class="tank_type_form_reserve">
	        			<tr>
	        				<td class="label_m"><label>Cube length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_largo"></td>
	        				<td class="label_m"><label>Semicilinder length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_largo"></td>
	        			</tr>
	        			<tr>	
	        				<td class="label_m"><label>Cube width:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_ancho"></td>
	        				<td class="label_m"><label>Semicilinder width:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_ancho"></td>
	        			</tr>
	        			<tr>	
	        				<td class="label_m"><label>Cube height:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_alto"></td>
	        				<td class="label_m"><label>Semicilinder height:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_alto"></td>
	        			</tr>
	        		</table>

	        		<!-- tipo trailer -->
	        		<table style="display:none;" id="reserve_trailer" class="tank_type_form_reserve">
	        			<tr>
	        				<td class="label_m"><label>Superior section length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_largo"></td>
	        				<td class="label_m"><label>Inferior section length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_largo"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Superior section width:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_ancho"></td>
	        				<td class="label_m"><label>Inferior section width.:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_ancho"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Superior section height:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_alto"></td>
	        				<td class="label_m"><label>Inferior section height:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_2_alto"></td>
	        			</tr>
	        		</table>
	        		
	        		<!-- cilindro horizontal -->
	        		<table style="display:none;" id="reserve_horizontal" class="tank_type_form_reserve">
	        			<tr>
	        				<td class="label_m"><label>Diameter:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="diameter"></td>
	        			</tr>
	        			<tr>
	        				<td class="label_m"><label>Length:</label></td>
	        				<td><input type="text" style="width:110px;margin-right:5px;" class="section_1_largo"></td>
	        			</tr>
	        		</table>
	        	</fieldset>	

        		<input type="button" value="Create tank" style="margin-top:10px;display:none" id="btn_create_reserve_tank" />        		
        	</fieldset>
        	
        	<fieldset>
        		<legend>Current reserve tanks</legend>
        		
        	</fieldset>	
	    </div>
	</div>
</div>