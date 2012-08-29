<div class="this_panel" id="datos_generales">
	<h2>Team</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Qmax</a></li>
	      	<li><a href="#">Third Party</a></li>
	    </ul>
	  
		<!-- Qmax -->
	    <div class="simpleTabsContent">
	    	<fieldset>
				<table style="float:left;margin-right:20px;">	
					<tr>
						<td></td>
						<td class="label_m"><label>Enginer:</label></td>
						<td class="label_m"><label>Cost:</label></td>
					</tr>
					<?php for($i = 1; $i <= $project['maximun_enginers']; $i++){ ?>
						<tr>
							<td class="label_m"><label>Fluids Enginer <?= $i?>:</label></td>
							<td>
								<select style="width:179px;">
									<option>Please select...</option>
									<?php foreach ($enginers as $enginer) { ?>
						        		<option value="<?= $enginer['id'] ?>" ><?= $enginer['name'] ?> <?= $enginer['lastname'] ?></option>
						        	<?php } ?>	
								</select>
							</td>
							<td>
								<input type="text" class="this_enginer_cost" id="cost_enginer_<?= $i ?>" style="width:100px;" value="0" />
							</td>
						</tr>
					<?php } ?>
				</table>
				<table style="float:left;margin-top:20px;">
					<tr>
						<td class="label_m"><label>Enginering cost [today]:</label></td>
						<td><input type="text" style="width:100px;" disabled="disabled" name="zenginers_cost_today" id="zenginers_cost_today" /></td>
					</tr>
					<tr>
						<?php $enginers_today > $project['maximun_enginers'] ? $tocover = $project['maximun_enginers'] : $tocover = $enginers_today; ?>
						<td class="label_m"><label>Engineres to report [today]:</label></td>
						<td><input type="text" style="width:100px;" disabled="disabled" name="zenginers_today" id="zenginers_today" value="<?= $tocover ?>" /></td>
					</tr>
					<tr>	
						<td class="label_m"><label>Enginering cost [accumulated]:</label></td>
						<td><input type="text" disabled="disabled" style="width:100px;" /></td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<legend>Enginer Report</legend>
				<table class="datatable">
	        		<thead>
	        			<tr>
	        				<td class="label_m">Id</td>
	        				<td class="label_m">Name</td>
	        				<td></td>
	        			</tr>
	        		</thead>
		        	<tbody id="tbody_enginer_report">
			        	<?php foreach ($enginers as $enginer) { ?>
			        		<tr id="enginer_report_<?= $enginer['id'] ?>">
			        			<td><?= $enginer['identification'] ?></td>
			        			<td><?= $enginer['name'] ?> <?= $enginer['lastname'] ?></td>
			        			<td><a target="_blank" href="/main/enginer/<?= $enginer['id'] ?>">View Report</a></td>
			        		</tr>
			        	<?php } ?>
		        	</tbody>
	        	</table>
			</fieldset>	
			<fieldset>
				<legend>Comentarios</legend>
				<table style="float:left;width:100%;">
					<tr>
						<td>
							<textarea style="width:100%;heigth:150px;"></textarea>
						</td>
					</tr>
				</table>
			</fieldset>
	    </div>

	    <!--third party -->
	    <div class="simpleTabsContent">
	    	<fieldset>
				<legend>Personal</legend>
				<table style="float:left;">
					<tr>
						<td class="label_m"><label>Ing. CO-MAN:</label></td><td><input type="text" style="width:165px;" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Ing. CO-MAN:</label></td><td><input type="text" style="width:165px;" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Pusher:</label></td><td><input type="text" style="width:165px;" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Charla Diaria:</label></td><td><input type="text" style="width:165px;" /></td>
					</tr>
				</table>
			</fieldset>
		</div>
	</div>
</div>