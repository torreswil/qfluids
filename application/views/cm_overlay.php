<!-- CREATE MATERIAL OVERLAY -->
<div class="overlay_wrapper" id="cm_overlay">
	<div class="overlay_dialog_wrapper" style="margin-top:0;width:325px;">
		<div class="overlay_dialog" style="width:325px;">
			<h5 style="margin-bottom:0;">New Material:</h5>
			<div class="content">
                                <form id="new_material_form">
					<table style="margin-top:20px;">
							<tr>
								<td class="label_m"><label>Code:</label></td>
								<td><input type="text" name="erp_id"/></td>
							</tr>
							<tr>
								<td class="label_m"><label>Internal Name:</label></td>
								<td><input type="text" name="internal_name"/></td>
							</tr>
							<tr>	
								<td class="label_m"><label>Commercial Name:</label></td>
								<td><input type="text" name="commercial_name"/></td>
							</tr>
							<tr>	
								<td class="label_m"><label>Unit:</label></td>
								<td>
									<input type="text" style="width:98px;margin-right:0;" name="value"/>
									<select style="width:60px;" name="unit_value">
										<option value="lb">lb</option>
										<option value="gal">gal</option>
									</select>
								</td>
							</tr>
							<tr>	
								<td class="label_m"><label>SG:</label></td>
								<td><input type="text" name="egravity"/></td>
							</tr>
							<tr>	
								<td class="label_m"><label>U. Cost:</label></td>	
								<td><input type="text" name="price" /></td>
							</tr>
							<tr>
								<td class="label_m"><label>Description:</label></td>
								<td><input type="text" name="description" placeholder="Write down the material description, uses, etc" /></td>
							</tr>
                                                        <tr>
								<td><input type="hidden" name="used_in_project" value="0" /></td>
								<td><input type="hidden" name="custom" value="1" /></td>
							</tr>
                                                        <tr>
								<td><input type="hidden" name="category" value="1" /></td>
								<td><input type="hidden" name="active" value="1" /></td>
							</tr>
					</table>
                                </form>
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