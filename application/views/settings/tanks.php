<div class="config_panel" id="tanks">
	<div style="float:left;">
		<h2 style="float:left;width:70px;">Tanks</h2>
		<a href="#create_tank" id="link_create_tank" style="float:left;width:100px;text-decoration:underline;margin-top:3px;">[+ Add Tank]</a>
	</div>
	
	<fieldset style="float:left;width:95%;">
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

	<fieldset style="float:left;width:95%;">
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