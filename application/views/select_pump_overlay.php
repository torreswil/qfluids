<!-- FORMULARIO SELECCION BOMBAS -->
<div class="overlay_wrapper" id="select_pump_overlay">
	<div class="overlay_dialog_wrapper" style="margin-top:50px">
		<div class="overlay_dialog">
			<h5>PICK A PUMP [Pump <span class="current_pump_number"></span>]:</h5>
			<div class="content">
				<table id="table_pump_picker">
					<tr>
						<td class="label_m"><label>Maker:</label></td>
						<td>
							<select id="pump_picker_maker">
								<option value="" selected="selected">Select...</option>
								<?php foreach ($lista_bombas as $bomba) {
									?><option value="<?=$bomba['maker'];?>"><?=$bomba['maker'];?></option><?php
								}?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Type:</label></td>
						<td>
							<select id="pump_picker_type">
								<option value="" selected="selected">Select...</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Stroke/Length:</label></td>
						<td>
							<select id="pump_picker_stroke">
								<option value="" selected="selected">Select...</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Liner/Diameter:</label></td>
						<td>
							<select id="pump_picker_diameter">
								<option value="" selected="selected">Select...</option>
							</select>
						</td>
					</tr>
					<tr class="rod_row">
						<td class="label_m"><label>Rod:</label></td>
						<td>
							<select id="pump_picker_rod">
								<option value="" selected="selected">Select...</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Model:</label></td>
						<td>
							<select id="pump_picker_model">
								<option value="" selected="selected">Select...</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Max Press:</label></td>
						<td>
							<select id="pump_picker_presure">
								<option value="" selected="selected">Select...</option>
							</select>
						</td>
					</tr>	
				</table>
				
				<p><input type="checkbox" id="checkbox_pump_not_found" value="model_not_found" /> I can't find my model. I need to create a new one.</p>
				
				<form id="new_pump_form">
					<table id="table_pump_creator" style="display:none;">	
						<tr>
							<td class="label_m"><label>Maker:</label></td>
							<td><input type="text" name="maker" disabled="disabled" class="required" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Type:</label></td>
							<td>
								<select name="type" disabled="disabled" class="required">
									<option value="">Select...</option>
									<option value="DUPLEX">DUPLEX</option>
									<option value="TRIPLEX">TRIPLEX</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="label_m"><label>Stroke/Length:</label></td>
							<td><input type="text" name="strokelength" disabled="disabled" class="required" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Liner/Diameter:</label></td>
							<td><input type="text" name="linerdiameter" disabled="disabled" class="required" /></td>
						</tr>
						<tr class="new_pump_rod_tr">
							<td class="label_m"><label>Rod:</label></td>
							<td><input type="text" name="rod" disabled="disabled" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Model:</label></td>
							<td><input type="text" name="modelo" disabled="disabled" class="required" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Max Press:</label></td>
							<td><input type="text" name="presion" disabled="disabled" class="required" /></td>
						</tr>
					</table>
				</form>
			</div>

			<div class="cancel_link">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Continue" id="btn_pump_selected" />
			</div>
		</div>
	</div>
</div>