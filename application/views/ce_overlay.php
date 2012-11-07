<!-- CREATE MATERIAL OVERLAY -->
<div class="overlay_wrapper" id="ce_overlay">
	<div class="overlay_dialog_wrapper" style="margin-top:0;width:325px;">
		<div class="overlay_dialog" style="width:325px;">
			<h5 style="margin-bottom:0;">New Equipement:</h5>
			<div class="content">
                <form id="new_equipement_form">
					<table style="margin-top:20px;">
						<tr>
							<td class="label_m"><label>Code:</label></td>
							<td><input type="text" name="erp_id"/></td>
						</tr>
						<tr>
							<td class="label_m"><label>Internal Name:*</label></td>
							<td><input type="text" name="product_name" class="required" /></td>
						</tr>
						<tr>	
							<td class="label_m"><label>Commercial Name:</label></td>
							<td><input type="text" name="commercial_name"/></td>
						</tr>
						<tr>	
							<td class="label_m"><label>Unit:</label></td>
							<td>
								<input type="text" style="width:98px;margin-right:0;" name="value" class="required"/>
								<select style="width:60px;" name="unit_value">
									<option value="dias">DAYS</option>
									<option value="unidades">UNITS</option>
								</select>
							</td>
						</tr>
						<tr>	
							<td class="label_m"><label>U. Cost:</label></td>	
							<td><input type="text" name="price" class="default_cero" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Description:</label></td>
							<td><input type="text" name="description" placeholder="Write down the material description, uses, etc" /></td>
						</tr>
                        <tr>
							<td>
								<input type="hidden" name="used_in_project" value="0" />
								<input type="hidden" name="custom" value="1" />
								<input type="hidden" name="category" value="1" />
								<input type="hidden" name="active" value="1" />

							</td>
						</tr>
					</table>
                </form>
			</div>
			<div class="cancel_link" style="width:133px;">
				<a href="#cancel" class="cancel_overlay">Cancel</a>
			</div>
			<div class="continue_button">
				<input type="button" value="Create Equipement" id="btn_equipement_create" />
			</div>
		</div>
	</div>
</div>