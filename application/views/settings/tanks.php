<div class="config_panel" id="tanks">
	<h2>Tanks</h2>
	<a href="#create_tank" id="link_create_tank" style="display:block;float:left;">[+ Add Tank]</a>
	
	<div class="simpleTabs">
		
		<ul class="simpleTabsNavigation">
			<li><a href="#">Active Tans</a></li>
			<li><a href="#">Pill Tanks</a></li>
			<li><a href="#">Reserve Tanks</a></li>
		</ul>
		
		<div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
			<fieldset style="display:none;">
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
			<fieldset style="display:none;">
				<legend>Current pill tanks</legend>
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
					<tbody id="current_pill_tanks">
						
					</tbody>
				</table>
				<input type="button" value="Update order" class="update_tank_order" id="pill_order" />
			</fieldset>		
		</div>
		<div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
			<fieldset style="display:none;">
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