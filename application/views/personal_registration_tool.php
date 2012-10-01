<!-- FORMULARIO REGISTRO DE PERSONAL -->
<div class="overlay_wrapper" id="registration_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog" style="width:320px;">
			<h5>Report your work hours:</h5>
			<form id="registration_form">
				<table style="margin-bottom:20px;">
					<tr>
						<td class="label_m"><label>Date:</label></td>
						<td>
							<input name="date" type="text" class="datepicker" value="<?= date('yy-mm-ddd'); ?>" style="width:120px;margin-right:0;" />
						</td>
					</tr>
					<tr>
						<td class="label_m"><label>Identification:</label></td>
						<td><input type="text" name="identification" style="width:120px;;margin-right:0;" /></td>
					</tr>
					<tr>
						<td class="label_m" style="width:180px;"><label>Charge to operator?:</label></td>
						<td>
							<input type="checkbox" checked="checked" name="cover" value="1" /> YES
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