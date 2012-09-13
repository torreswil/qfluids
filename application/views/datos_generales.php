<div class="this_panel" id="datos_generales">
	<h2>Team</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Enginers</a></li>
			<li><a href="#">Operators</a></li>
			<li><a href="#">Yard Workers</a></li>
	      	<li><a href="#">Third Party</a></li>
	    </ul>
	  
		<!-- Enginers -->
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
								<select style="width:179px;" class="this_enginer" id="this_enginer_<?= $i ?>">
									<option value="">Please select...</option>
									<?php foreach ($enginers as $enginer) { ?>
						        		<option value="<?= $enginer['id'] ?>" ><?= $enginer['name'] ?> <?= $enginer['lastname'] ?></option>
						        	<?php } ?>	
								</select>
							</td>
							<td>
								<input type="text" class="this_enginer_cost" id="this_enginer_cost_<?= $i ?>" style="width:100px;" value="0" disabled="disabled" />
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
						<td class="label_m"><label>Engineres to report [today]:</label></td>
						<td><input type="text" style="width:100px;" disabled="disabled" name="zenginers_today" id="zenginers_today" value="0" /></td>
					</tr>
					<tr>	
						<td class="label_m"><label>Enginering cost [accumulated]:</label></td>
						<td><input type="text" disabled="disabled" style="width:100px;" name="costoing_acumulado" id="costoing_acumulado" value="0" /></td>
					</tr>
				</table>
			</fieldset>
	    </div>

	    <!-- Operators -->
	    <div class="simpleTabsContent">
	    	<fieldset>
	    		<table style="float:left;margin-right:20px;">
	    			<tr>
	    				<td class="label_m"></td>
	    				<td class="label_m"><label>Operator</label></td>
	    				<td class="label_m"><label>Cost</label></td>
	    			</tr>
	    			<?php foreach ($operators as $operator){ ?>
	    				<tr>
		    				<td class="label_m" style="padding-right:15px;"><input type="checkbox" class="operator_checkbox" id="operator_checkbox_<?= $operator['id'] ?>" /></td>
		    				<td class="label_m"><input type="text" disabled="disabled" value="<?= strtoupper($operator['name']) ?> <?= strtoupper($operator['lastname']) ?>" style="width:150px;" /></td>
		    				<td class="label_m"><input type="text" disabled="disabled" value="<?= strtoupper($operator['rate']) ?>" style="width:100px;" id="operator_cost_<?= $operator['id'] ?>" /></td>
		    			</tr>
	    			<?php } ?>
	    		</table>
	    		<table style="float:left;margin-top:20px;">
					<tr>
						<td class="label_m"><label>Operators cost [today]:</label></td>
						<td><input type="text" style="width:100px;" disabled="disabled" name="zoperators_cost_today" id="zoperators_cost_today" value="0" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Operators to report [today]:</label></td>
						<td><input type="text" style="width:100px;" disabled="disabled" name="zoperators_today" id="zoperators_today" value="0" /></td>
					</tr>
					<tr>	
						<td class="label_m"><label>Operators cost [accumulated]:</label></td>
						<td><input type="text" disabled="disabled" style="width:100px;" name="costo_operators_acumulado" id="costo_operators_acumulado" value="0" /></td>
					</tr>
				</table>
	    	</fieldset>	
		</div>

		<!-- Yard Workers -->
	    <div class="simpleTabsContent">
			<fieldset>
	    		<table style="float:left;margin-right:20px;">
	    			<tr>
	    				<td class="label_m"></td>
	    				<td class="label_m"><label>Yard Worker</label></td>
	    				<td class="label_m"><label>Cost</label></td>
	    			</tr>
	    			<?php foreach ($yardworkers as $worker){ ?>
	    				<tr>
		    				<td class="label_m" style="padding-right:15px;"><input type="checkbox" class="worker_checkbox" id="worker_checkbox_<?= $worker['id'] ?>" /></td>
		    				<td class="label_m"><input type="text" disabled="disabled" value="<?= strtoupper($worker['name']) ?> <?= strtoupper($worker['lastname']) ?>" style="width:150px;" /></td>
		    				<td class="label_m"><input type="text" disabled="disabled" value="<?= strtoupper($worker['rate']) ?>" style="width:100px;" id="worker_cost_<?= $worker['id'] ?>" /></td>
		    			</tr>
	    			<?php } ?>
	    		</table>
	    		<table style="float:left;margin-top:20px;">
					<tr>
						<td class="label_m"><label>Yard workers cost [today]:</label></td>
						<td><input type="text" style="width:100px;" disabled="disabled" name="zworkers_cost_today" id="zworkers_cost_today" value="0" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Yard workers to report [today]:</label></td>
						<td><input type="text" style="width:100px;" disabled="disabled" name="zworkers_today" id="zworkers_today" value="0" /></td>
					</tr>
					<tr>	
						<td class="label_m"><label>Yard workers cost [accumulated]:</label></td>
						<td><input type="text" disabled="disabled" style="width:100px;" name="costo_operators_acumulado" id="costo_operators_acumulado" value="0" /></td>
					</tr>
				</table>
	    	</fieldset>		    	
		</div>

		<!-- Third Party -->
	    <div class="simpleTabsContent">
	    	
		</div>
	</div>
</div>