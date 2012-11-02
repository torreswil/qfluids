<!-- CREATE MATERIAL OVERLAY -->
<div class="overlay_wrapper" id="cm_overlay">
	<div class="overlay_dialog_wrapper" style="margin-top:0;width:325px;">
		<div class="overlay_dialog" style="width:325px;">
			<h5 style="margin-bottom:0;">New Material:</h5>
			<div class="content">
					<table style="margin-top:20px;">
							<tr>
								<td class="label_m"><label>Code:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Internal Name:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>	
								<td class="label_m"><label>Commercial Name:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>	
								<td class="label_m"><label>Unit:</label></td>
								<td>
									<input type="text" style="width:98px;margin-right:0;" />
									<select style="width:60px;">
										<option value="lb">lb</option>
										<option value="lb">gal</option>
									</select>
								</td>
							</tr>
							<tr>	
								<td class="label_m"><label>SG:</label></td>
								<td><input type="text" /></td>
							</tr>
							<tr>	
								<td class="label_m"><label>U. Cost:</label></td>	
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Description:</label></td>
								<td><input type="text" placeholder="Write down the material description, uses, etc" /></td>
							</tr>
					</table>
			</div>
			<div class="cancel_link" style="width:133px;">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Create Material" id="btn_material_create" />
			</div>
		</div>
	</div>
</div>