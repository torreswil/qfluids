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
							<td class="label_m"><label>Internal Name</label></td>
							<td class="label_m"><label>Commercial Name</label></td>
							<td class="label_m"><label>Unit</label></td>
							<td class="label_m"><label>SG</label></td>
							<td class="label_m"><label>U. Cost</label></td>
							<td class="label_m"><label style="display:none;">Code</label></td>
							<td></td>
						</tr>
					</thead>
					<tbody id="materials_activation_table">
						<!-- AJAX LOADADED -->
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
				<table style="margin-bottom:20px;">
					<tr>
						<td style="width:20px;"></td>
						<td class="label_m"><input type="text" placeholder="Filter..." style="width:200px;" id="filter_equipement" /></td>
						<td class="label_m" style="padding-left:20px;">
							<a href="#show_hide_unselected_equipement" class="shon_n_hide_unselected_equipement">Show selected equipement only</a>
						</td>
					</tr>
				</table>
				<table>
					<thead>
						<tr>
							<td></td>
							<td class="label_m"><label>Internal Name</label></td>
							<td class="label_m"><label>Commercial Name</label></td>
							<td class="label_m"><label>Unit</label></td>
							<td class="label_m"><label>U. Cost</label></td>
							<td class="label_m"><label style="display:none;">Code</label></td>
							<td></td>
						</tr>
					</thead>
					<tbody id="equipement_activation_table">
						<!-- AJAX LOADADED-->
					</tbody>
				</table>
				<input type="button" value="Save" class="update_equipement" style="margin:10px 25px;" />
			</fieldset>	
	    </div>
	</div>
</div>