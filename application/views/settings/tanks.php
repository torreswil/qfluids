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
        		
        		<table style="float:left;">
        			<tr>
        				<td class="label_m"><label>Tank name:</label></td>
        				<td class="label_m"><label>Agitators #:</label></td>
        				<td class="label_m"><label>Jets:</label></td>
        				<td class="label_m"><label>Vol. Cap. (bbl):</label></td>
        				<td class="label_m"><label>Max. headroom:</label></td>
        				<td class="label_m"><label>Tank type:</label></td>
        			</tr>
        			<tr>
        				<td class="label_m">
        					<select style="width:126px;">
        						<option value="">Select...</option>
        						<?php foreach($tank_names_active as $name){ ?>
        							<option value="<?= $name['id'] ?>"><?= $name['name'] ?></option>
        						<?php } ?>
        					</select>
        				</td>
        				<td>
        					<input type="text" style="width:110px;" />
        				</td>
        				<td>
        					<input type="text" style="width:110px;" />
        				</td>
        				<td>
        					<input type="text" disabled="disabled" style="width:110px;"/>
        				</td>
        				<td>
        					<input type="text" disabled="disabled" style="width:110px;" />
        				</td>
        				<td class="label_m">
        					<select style="width:120px;" id="active_type">
        						<option value="">Select...</option>
        						<?php foreach($tank_types as $type){ ?>
        							<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
        						<?php } ?>
        					</select>
        				</td>
        			</tr>
        		</table>

        		<!-- cuadrado -->
        		<table style="display:none;" id="active_cuadrado" class="tank_type_form_active">
        			<tr>
        				<td class="label_m"><label>Length:</label></td>
        				<td class="label_m"><label>Width:</label></td>
        				<td class="label_m"><label>Heigth:</label></td>
        			</tr>
        			<tr>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        			</tr>
        		</table>


        		<!-- semicircular -->
        		<table style="display:none;" id="active_semicircular" class="tank_type_form_active">
        			<tr>
        				<td class="label_m"><label>Cube length.:</label></td>
        				<td class="label_m"><label>Cube width:</label></td>
        				<td class="label_m"><label>Cube height:</label></td>
        				<td class="label_m"><label>Semicil. length.:</label></td>
        				<td class="label_m"><label>Semicil. width:</label></td>
        				<td class="label_m"><label>Semicil. height:</label></td>
        			</tr>
        			<tr>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        			</tr>
        		</table>

        		<!-- tipo trailer -->
        		<table style="display:none;" id="active_trailer" class="tank_type_form_active">
        			<tr>
        				<td class="label_m"><label>Sup. sect. len.:</label></td>
        				<td class="label_m"><label>Sup. sect. width:</label></td>
        				<td class="label_m"><label>Sup. sect. height:</label></td>
        				<td class="label_m"><label>Inf. sect. len.:</label></td>
        				<td class="label_m"><label>Inf. sect. width.:</label></td>
        				<td class="label_m"><label>Inf. sect. height:</label></td>
        			</tr>
        			<tr>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        			</tr>
        		</table>
        		
        		<!-- cilindro horizontal -->
        		<table style="display:none;" id="active_horizontal" class="tank_type_form_active">
        			<tr>
        				<td class="label_m"><label>Diameter:</label></td>
        				<td class="label_m"><label>Length:</label></td>
        			</tr>
        			<tr>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        			</tr>
        		</table>

        		<input type="button" value="Create tank" style="margin-top:10px;display:none" id="btn_create_active_tank" />

        	</fieldset>

        	<fieldset>
        		<legend>Current active tanks:</legend>
        		
        	</fieldset>
	    </div>


	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<legend>Create a reserve tank</legend>

        		<table style="float:left;">
        			<tr>
        				<td class="label_m"><label>Tank name:</label></td>
        				<td class="label_m"><label>Agitators #:</label></td>
        				<td class="label_m"><label>Jets:</label></td>
        				<td class="label_m"><label>Vol. Cap. (bbl):</label></td>
        				<td class="label_m"><label>Max. headroom:</label></td>
        				<td class="label_m"><label>Tank type:</label></td>
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
        					<input type="text" style="width:110px;" />
        				</td>
        				<td>
        					<input type="text" style="width:110px;" />
        				</td>
        				<td>
        					<input type="text" disabled="disabled" style="width:110px;"/>
        				</td>
        				<td>
        					<input type="text" disabled="disabled" style="width:110px;" />
        				</td>
        				<td class="label_m">
        					<select style="width:120px;" id="reserve_type">
        						<option value="">Select...</option>
        						<?php foreach($tank_types as $type){ ?>
        							<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
        						<?php } ?>
        					</select>
        				</td>
        			</tr>
        		</table>

        		<!-- cuadrado -->
        		<table style="display:none;" id="reserve_cuadrado" class="tank_type_form_reserve">
        			<tr>
        				<td class="label_m"><label>Length:</label></td>
        				<td class="label_m"><label>Width:</label></td>
        				<td class="label_m"><label>Heigth:</label></td>
        			</tr>
        			<tr>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        			</tr>
        		</table>


        		<!-- semicircular -->
        		<table style="display:none;" id="reserve_semicircular" class="tank_type_form_reserve">
        			<tr>
        				<td class="label_m"><label>Cube length.:</label></td>
        				<td class="label_m"><label>Cube width:</label></td>
        				<td class="label_m"><label>Cube height:</label></td>
        				<td class="label_m"><label>Semicil. length.:</label></td>
        				<td class="label_m"><label>Semicil. width:</label></td>
        				<td class="label_m"><label>Semicil. height:</label></td>
        			</tr>
        			<tr>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        			</tr>
        		</table>

        		<!-- tipo trailer -->
        		<table style="display:none;" id="reserve_trailer" class="tank_type_form_reserve">
        			<tr>
        				<td class="label_m"><label>Sup. sect. len.:</label></td>
        				<td class="label_m"><label>Sup. sect. width:</label></td>
        				<td class="label_m"><label>Sup. sect. height:</label></td>
        				<td class="label_m"><label>Inf. sect. len.:</label></td>
        				<td class="label_m"><label>Inf. sect. width.:</label></td>
        				<td class="label_m"><label>Inf. sect. height:</label></td>
        			</tr>
        			<tr>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        			</tr>
        		</table>
        		
        		<!-- cilindro horizontal -->
        		<table style="display:none;" id="reserve_horizontal" class="tank_type_form_reserve">
        			<tr>
        				<td class="label_m"><label>Diameter:</label></td>
        				<td class="label_m"><label>Length:</label></td>
        			</tr>
        			<tr>
        				<td><input type="text" style="width:110px;"></td>
        				<td><input type="text" style="width:110px;"></td>
        			</tr>
        		</table>

        		<input type="button" value="Create tank" style="margin-top:10px;display:none" id="btn_create_reserve_tank" />        		
        		
        	</fieldset>
        	<fieldset>
        		<legend>Current reserve tanks</legend>
        		
        	</fieldset>	
	    </div>


	    
	</div>

</div>