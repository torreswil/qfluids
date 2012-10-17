<!-- FORMULARIO ADICION DE QUIMICA -->
<div class="overlay_wrapper" id="add_chemicals_overlay">
	<div class="overlay_dialog_wrapper" style="width:623px;">
		<div class="overlay_dialog" style="width:623px;">
			<h5>Add Chemicals to</h5>
			<fieldset>
				<table style="width:601px">
					<thead>
						<tr>
							<td class="label_m"><label>Material Name:</label></td>
							<td class="label_m"><label>Unit</label></td>
							<td class="label_m"><label>SG</label></td>
							<td class="label_m"><label>Stock</label></td>
							<td class="label_m"><label>Used</label></td>
							<td class="label_m"><label>Volume</label></td>
						</tr>
					</thead>
					<tbody id="ac_status">
						<!-- ajax loadaded -->
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5" class="label_m" style="text-align:right;"><label>Volume Increment by Chemical Aditions:</label></td>
							<td><input style="width:55px;margin-right:0;" type="text" value="0" class="voltotalchem" id="voltotalchem" name="voltotalchem" disabled="disabled" /></td>
			            </tr>
			            <tr>
							<td colspan="5" class="label_m" style="text-align:right;"><label>Water Aditions:</label></td>
							<td><input style="width:55px;margin-right:0;" type="text" id="ca_wa" /></td>
			            </tr>
					</tfoot>
				</table>
			</fieldset>
			<input type="hidden" id="ca_tank" value="" />
			<input type="button" value="Add Chemicals" id="add_chemicals_btn" style="float:right;margin-top:20px;" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:26px;">Cancel</a>
		</div>
	</div>
</div>