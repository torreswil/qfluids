<!-- FORMULARIO ADICION DE LODO A LAS RESERVAS -->
<div class="overlay_wrapper" id="mta_overlay">
	<div class="overlay_dialog_wrapper" style="width:300px;">
		<div class="overlay_dialog" style="width:300px;">
			<h5>Tansfered Mud from Reserves:</h5>
			
			<table style="margin-bottom:20px;">
				<thead>
					<tr>
						<td class="label_m"><label>Reserve Tank Name:</label></td>
						<td class="label_m"><label>Mud qty:</label></td>
					</tr>
				</thead>
				<tbody id="mta_inputs">
					<?php foreach ($trip_tanks as $tank){ ?>
						<tr class="this_trip_tank_<?= $tank['id']?> ">
							<td><input style="width:190px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $tank['tank_name'] ?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" id="mta_<?= $tank['id']?>" class="qty" disabled /></td>
							<td class="label_m">bbl</td>
			            </tr>	
					<?php } ?>
					<?php foreach ($pill_tanks as $tank){ ?>
						<tr class="this_pill_tank_<?= $tank['id']?> ">
							<td><input style="width:190px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $tank['tank_name'] ?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" id="mta_<?= $tank['id']?>" class="qty" disabled /></td>
							<td class="label_m">bbl</td>
			            </tr>	
					<?php } ?>
					<?php foreach ($reserve_tanks as $tank){ ?>
						<tr class="this_reserserve_tank_<?= $tank['id']?> ">
							<td><input style="width:190px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $tank['tank_name'] ?>" /></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" id="mta_<?= $tank['id']?>" class="qty" disabled /></td>
							<td class="label_m">bbl</td>
			            </tr>	
					<?php } ?>
					<tr>
						<td class="label_m" style="text-align:right;"><label>Total:</label></td>
						<td class="label_m"><input type="text" style="width:55px;margin-right:0;" id="total_mta" disabled="disabled" /></td>
						<td class="label_m">bbl</td>
					</tr>
				</tbody>
			</table>
			<input type="hidden" name="report" value="1">
			<input type="hidden" name="project" value="<?= $project['id'] ?>">
			
			<input type="button" value="Close" style="float:right;" id="mta_btn" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:10px;">Cancel</a>
		</div>
	</div>
</div>