<div class="this_panel" id="concentrations">
	<h2>Concentrations</h2>

     <div class="simpleTabs">
          <ul class="simpleTabsNavigation">
               <li><a href="#">Status</a></li>        
          </ul>
          <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
			<fieldset>
				<legend>Material Concentrations status per Tank</legend>
				<table>
				     <thead>
				          <tr>
				            <td class="label_m"><label>Material</label></td>
				            <td class="label_m"><label>Unit</label></td>
				            <td class="label_m"><label>Active</label></td>
				            <?php foreach($trip_tanks as $tank){ ?>
				              <td class="label_m"><label><?= $tank['tank_name'] ?></label></td>
				            <?php }?>
				            <td class="label_m"><label>OSC</label></td>
				            <?php foreach($pill_tanks as $tank){ ?>
				              <td class="label_m"><label><?= $tank['tank_name'] ?></label></td>
				            <?php }?>
				            <?php foreach($reserve_tanks as $tank){ ?>
				                <td class="label_m"><label><?= $tank['tank_name'] ?></label></td>
				            <?php }?>
				          </tr>
				     </thead>
				     <tbody id="current_concentrations_table">
				        <!-- AJAX -->
				     </tbody>
				</table>
			</fieldset> 
		</div>
	</div>
</div>