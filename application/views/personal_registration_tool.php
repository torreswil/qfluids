<!-- FORMULARIO REGISTRO DE PERSONAL -->
<div class="overlay_wrapper" id="registration_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog">
			<h5>Report your work hours:</h5>
			<form id="registration_form">
				<table style="margin-bottom:20px;">
					<tr>
						<td class="label_m"><label>Report Date:</label></td>
						<td>
							<input name="date" type="text" disabled="disabled" value="" />
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Identification:</label></td>
						<td><input type="text" name="identification" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Work Period:</label></td>
						<td>
							<select style="width:163px;" name="period">
								<option value="">Select...</option>
								<option value="1">06:00 - 17:59</option>
								<option value="2">18:00 - 23:59</option>
							</select>
						</td>
					</tr>
				</table>
				<input type="hidden" name="report" value="1">
				<input type="hidden" name="project" value="<?= $project['id'] ?>">
			</form>
			<input type="button" value="Register" style="float:right;" id="register_btn" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:10px;">Cancel</a>
		</div>
	</div>
</div>