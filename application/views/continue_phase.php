<!-- FORMULARIO PARA CONTINUAR LA FASE -->
<div class="overlay_wrapper" id="continue_phase_overlay">
	<div class="overlay_dialog_wrapper">
		<div class="overlay_dialog" style="width:320px;">
			<h5>Create Report</h5>
			<form id="continue_phase_form">
				<table style="margin-bottom:20px;">					                                       
                    <tr>						
						<td><input type="radio" checked name="phase" value="<?= isset($project['last_report_meta']['phase']) ? $project['last_report_meta']['phase'] : 1; ?>" /> Continue in the phase <?= $project['last_report_meta']['phase'] ?></td>
                                  
					</tr>
                    <tr>
						<td><input type="radio" name="phase" value=" <?= isset($project['last_report_meta']['phase']) ? ($project['last_report_meta']['phase'] + 1): 1; ?>" /> Start phase <?= $project['last_report_meta']['phase'] + 1 ?></td>
					</tr>
				</table>				
			</form>
			<input type="button" value="Create" style="float:right;" id="continue_phase_btn" />
			<a href="#close" class="close_link" style="display:block;float:left;margin-top:10px;">Cancel</a>
		</div>
	</div>
</div>