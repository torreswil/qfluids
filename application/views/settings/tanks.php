<div class="config_panel" id="tanks">
	<h2>Tanks</h2>
	
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Active</a></li>
			<li><a href="#">Reserve</a></li>
	    </ul>
	  
	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<form id="form_active_tank">
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
		        					<select style="width:125px;" class="name">
		        						<option value="">Select...</option>
		        						<?php foreach($tank_names_active as $name){ ?>
		        							<option value="<?= $name['id'] ?>"><?= $name['name'] ?></option>
		        						<?php } ?>
		        					</select>
		        				</td>
		        				<td>
		        					<select style="width:85px;" class="agitators">
		        						<option value="0" selected="selected">0</option>
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
		        					<select style="width:55px;" class="jets">
		        						<option value="1">Yes</option>
		        						<option value="0" selected="selected">No</option>
		        					</select>
		        				</td>
		        				<td class="label_m">
		        					<select style="width:160px;" id="active_type" class="type">
		        						<option value="">Select...</option>
		        						<?php foreach($tank_types as $type){ ?>
		        							<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
		        						<?php } ?>
		        					</select>
		        				</td>
		        				<td>
		        					<input type="text" disabled="disabled" style="width:110px;margin-right:5px;" class="voltkaforo" />
		        				</td>
		        				<td>
		        					<input type="text" disabled="disabled" style="width:110px;margin-right:5px;" class"hlibremax" />
		        				</td>
		        			</tr>
		        		</table>
		        	</fieldset>

	        		<fieldset class="tank_measures_fieldset_active" style="display:none;">
	        			<legend>Tank measures</legend>

		        		<!-- cuadrado -->
		        		<table style="display:none;" id="active_cuadrado" class="tank_type_form_active medidas_cuadrado">
		        			<tr>
		        				<td class="label_m"><label>Length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_1">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><label>Width:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_1">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><label>Heigth:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_1">in.</td>
		        			</tr>
		        		</table>


		        		<!-- semicircular -->
		        		<table style="display:none;" id="active_semicircular" class="tank_type_form_active medidas_semicircular">
		        			<tr>
		        				<td class="label_m" style=""><label>Cube:</label></td>
		        				<td></td>
		        				<td class="label_m" style="padding-left:20px;"><label>Semicilinder:</label></td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td class="label_m" style=""><label>Length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>Length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_2">in.</td>
		        			</tr>
		        			<tr>	
		        				<td class="label_m" style=""><label>Width:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>Width:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_2">in.</td>
		        			</tr>
		        			<tr>	
		        				<td class="label_m" style=""><label>Height:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>Height:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_2">in.</td>
		        			</tr>
		        		</table>

		        		<!-- tipo trailer -->
		        		<table style="display:none;" id="active_trailer" class="tank_type_form_active medidas_trailer">
		        			<tr>
		        				<td class="label_m" style=""><label>Superior section:</label></td>
		        				<td></td>
		        				<td class="label_m" style="padding-left:20px;"><label>Inferior section:</label></td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td class="label_m" style=""><label>length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_2">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m" style=""><label>width:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>width.:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_2">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m" style=""><label>height:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>height:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_2">in.</td>
		        			</tr>
		        		</table>
		        		
		        		<!-- cilindro horizontal -->
		        		<table style="display:none;" id="active_horizontal" class="tank_type_form_active medidas_cilindro">
		        			<tr>
		        				<td class="label_m"><label>Diameter:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="diametro">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><label>Length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_1">in.</td>
		        			</tr>
		        		</table>
	        		</fieldset>
	        		<input type="button" class="btn_create_tank" value="Create tank" style="margin-top:10px;display:none" id="btn_create_active_tank" />
        		</form>
        	</fieldset>

        	<fieldset>
        		<legend>Current active tanks:</legend>
        		<table>
        			<thead>
	        			<tr>
	        				<td></td>
	        				<td class="label_m"><label>Order</label></td>
	        				<td class="label_m"><label>TANK NAME:</label></td>
	        				<td class="label_m"><label>AGITATORS #:</label></td>
	        				<td class="label_m"><label>JETS:</label></td>
	        				<td class="label_m"><label>TANK TYPE:</label></td>
	        				<td class="label_m"><label>VOL. CAP. (BBL):</label></td>
	        				<td class="label_m"><label>MAX HEADROOM:</label></td>
	        			</tr>
        			</thead>
        			<tbody id="current_active_tanks">

        			</tbody>
        		</table>
        		<input type="button" value="Update order" class="update_tank_order" id="active_order" />
        	</fieldset>
	    </div>


	    <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
	        <form id="form_reserve_tank">
	        	<fieldset>
	        		<legend>Create a reserve tank:</legend>
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
		        					<select style="width:125px;" class="name">
		        						<option value="">Select...</option>
		        						<?php foreach($tank_names_reserve as $name){ ?>
		        							<option value="<?= $name['id'] ?>"><?= $name['name'] ?></option>
		        						<?php } ?>
		        					</select>
		        				</td>
		        				<td>
		        					<select style="width:85px;" class="agitators">
		        						<option value="0" selected="selected">0</option>
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
		        					<select style="width:55px;" class="jets">
		        						<option value="1">Yes</option>
		        						<option value="0" selected="selected">No</option>
		        					</select>
		        				</td>
		        				<td class="label_m">
		        					<select style="width:160px;" id="reserve_type" class="type">
		        						<option value="">Select...</option>
		        						<?php foreach($tank_types as $type){ ?>
		        							<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
		        						<?php } ?>
		        					</select>
		        				</td>
		        				<td>
		        					<input type="text" disabled="disabled" style="width:110px;margin-right:5px;" class="voltkaforo" />
		        				</td>
		        				<td>
		        					<input type="text" disabled="disabled" style="width:110px;margin-right:5px;" class"hlibremax" />
		        				</td>
		        			</tr>
		        		</table>
		        	</fieldset>
		        	<fieldset class="tank_measures_fieldset_reserve" style="display:none;">
	        			<legend>Tank measures</legend>

		        		<!-- cuadrado -->
		        		<table style="display:none;" id="reserve_cuadrado" class="tank_type_form_reserve medidas_cuadrado">
		        			<tr>
		        				<td class="label_m"><label>Length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_1">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><label>Width:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_1">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><label>Heigth:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_1">in.</td>
		        			</tr>
		        		</table>


		        		<!-- semicircular -->
		        		<table style="display:none;" id="reserve_semicircular" class="tank_type_form_reserve medidas_semicircular">
		        			<tr>
		        				<td class="label_m" style=""><label>Cube:</label></td>
		        				<td></td>
		        				<td class="label_m" style="padding-left:20px;"><label>Semicilinder:</label></td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td class="label_m" style=""><label>Length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>Length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_2">in.</td>
		        			</tr>
		        			<tr>	
		        				<td class="label_m" style=""><label>Width:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>Width:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_2">in.</td>
		        			</tr>
		        			<tr>	
		        				<td class="label_m" style=""><label>Height:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>Height:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_2">in.</td>
		        			</tr>
		        		</table>

		        		<!-- tipo trailer -->
		        		<table style="display:none;" id="reserve_trailer" class="tank_type_form_reserve medidas_trailer">
		        			<tr>
		        				<td class="label_m" style=""><label>Superior section:</label></td>
		        				<td></td>
		        				<td class="label_m" style="padding-left:20px;"><label>Inferior section:</label></td>
		        				<td></td>
		        			</tr>
		        			<tr>
		        				<td class="label_m" style=""><label>length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_2">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m" style=""><label>width:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>width.:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sa_2">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m" style=""><label>height:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_1">in.</td>
		        				<td class="label_m" style="padding-left:20px;"><label>height:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sh_2">in.</td>
		        			</tr>
		        		</table>
		        		
		        		<!-- cilindro horizontal -->
		        		<table style="display:none;" id="reserve_horizontal" class="tank_type_form_reserve medidas_cilindro">
		        			<tr>
		        				<td class="label_m"><label>Diameter:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="diametro">in.</td>
		        			</tr>
		        			<tr>
		        				<td class="label_m"><label>Length:</label></td>
		        				<td><input type="text" style="width:50px;margin-right:5px;" class="sl_1">in.</td>
		        			</tr>
		        		</table>
	        		</fieldset>
	        		<input type="button" class="btn_create_tank" value="Create tank" style="margin-top:10px;display:none" id="btn_create_reserve_tank" />        		
        		</form>
        	</fieldset>
        	
        	<fieldset>
        		<legend>Current reserve tanks</legend>
        		<table>
        			<thead>
	        			<tr>
	        				<td></td>
	        				<td class="label_m"><label>Order</label></td>
	        				<td class="label_m"><label>TANK NAME:</label></td>
	        				<td class="label_m"><label>AGITATORS #:</label></td>
	        				<td class="label_m"><label>JETS:</label></td>
	        				<td class="label_m"><label>TANK TYPE:</label></td>
	        				<td class="label_m"><label>VOL. CAP. (BBL):</label></td>
	        				<td class="label_m"><label>MAX HEADROOM:</label></td>
	        			</tr>
        			</thead>
        			<tbody id="current_reserve_tanks">
        				
        			</tbody>
        		</table>
        		<input type="button" value="Update order" class="update_tank_order" id="reserve_order" />
        	</fieldset>	
	    </div>
	</div>
</div>