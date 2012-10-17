<?php $reporte = $this->session->userdata('report'); ?>
<div class="this_panel" id="datos_generales">
	<h2>Personnel</h2>
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Enginers</a></li>
			<li class="tab_operators"><a href="#">Operators</a></li>                        
			<li class="tab_yard_workers"><a href="#">Patio Hands</a></li>                                                
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
                                        <? $rs = $this->Api->get_where('project_report_personal', array('report_id'=>$reporte['id'], 'personal_categories_id'=>1)); ?>
					<?php for($i = 1; $i <= $project['maximun_enginers']; $i++){ ?>                                                                                        
						<tr class="personal_engineers_data">
							<td class="label_m"><label>Fluids Enginer <?= $i?>:</label></td>
							<td>
								<select style="width:179px;" class="this_enginer data-reset" id="this_enginer_<?= $i ?>">
									<option value="">Please select...</option>
									<?php foreach ($enginers as $enginer) { ?>
                                                                        <?= $id = (empty($rs[$i-1]['personal_id'])) ? '' : $rs[$i-1]['personal_id']; ?>
						        		<option value="<?= $enginer['id'] ?>" <?= $id==$enginer['id'] ? 'selected' : ''; ?>  ><?= $enginer['name'] ?> <?= $enginer['lastname'] ?></option>
						        	<?php } ?>	
								</select>
							</td>
							<td>
								<input type="text" class="this_enginer_cost data-reset" id="this_enginer_cost_<?= $i ?>" style="width:100px;" value="<?= (empty($rs[$i-1]['cost'])) ? '0' : $rs[$i-1]['cost']; ?>" disabled="disabled" />
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
                        <fieldset>
                                <legend>Enginers list</legend>                    
                                <table>
                                        <thead>
                                                <tr>                                
                                                <th style="text-align: left">IDENDIFICATION</th>                                
                                                <th style="text-align: left">NAME</th>
                                                <th style="text-align: left">LAST NAME</th>
                                                <th style="text-align: left">CATEGORY</th>                                                                                                    
                                                <th></th>
                                            </tr>                            
                                        </thead>                            
                                        <tbody>
                                            <?php foreach ($enginers as $enginer): ?>                                                
                                                <tr id="this_enginers_list_<?php echo $enginer['id']?>">
                                                    <td><input type="text" disabled="disabled" style="width:100px;" value="<?php echo $enginer['identification'] ?>" /></td>
                                                    <td><input type="text" disabled="disabled" style="width:100px;" value="<?php echo $enginer['name'] ?>" /></td>
                                                    <td><input type="text" disabled="disabled" style="width:100px;" value="<?php echo $enginer['lastname']; ?>" /></td>
                                                    <td><input type="text" disabled="disabled" style="width:100px;" value="<?php echo $enginer['category_name'] ?>" /></td>
                                                    <td class="label_m"><a href="/main/enginer/<?php echo $enginer['id']; ?>" target="_blank" class="">View report</a></td>
                                                </tr>                                                
                                            <?php endforeach; ?>
                                        </tbody>
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
                                <? $rs = $this->Api->get_where('project_report_personal', array('report_id'=>$reporte['id'], 'personal_id'=>$operator['id'])); ?>
	    				<tr class="personal_operators_data">
		    				<td class="label_m" style="padding-right:15px;"><input type="checkbox" class="operator_checkbox data-reset" id="operator_checkbox_<?= $operator['id'] ?>" <?= (empty($rs[0]['personal_id'])) ? '' : 'checked'; ?> /></td>
		    				<td class="label_m"><input type="text" disabled="disabled" value="<?= strtoupper($operator['name']) ?> <?= strtoupper($operator['lastname']) ?>" style="width:150px;" /></td>
		    				<td class="label_m"><input type="text" disabled="disabled" value="<?= strtoupper($operator['rate']) ?>" style="width:100px;" id="operator_cost_<?= $operator['id'] ?>" class="this_operator_cost" /></td>
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
                        <td class="label_m"><label>Turn</label></td>
	    			</tr>
	    			<?php foreach ($yardworkers as $worker){ ?>
                                        <? $rs = $this->Api->get_where('project_report_personal', array('report_id'=>$reporte['id'], 'personal_id'=>$worker['id'])); ?>
                                        <? $turn = (empty($rs[0]['turn'])) ? '' : $rs[0]['turn']; ?>
	    				<tr id="this_yardworkers_list_<?php echo $worker['id']?>" class="personal_yardworkers_data">                                                
		    				<td class="label_m" style="padding-right:15px;"><input type="checkbox" class="worker_checkbox data-reset" id="worker_checkbox_<?= $worker['id'] ?>" <?= (empty($rs[0]['personal_id'])) ? '' : 'checked'; ?> /></td>
		    				<td class="label_m"><input type="text" disabled="disabled" value="<?= strtoupper($worker['name']) ?> <?= strtoupper($worker['lastname']) ?>" style="width:150px;" /></td>
		    				<td class="label_m"><input type="text" disabled="disabled" value="<?= strtoupper($worker['rate']) ?>" style="width:100px;" id="worker_cost_<?= $worker['id'] ?>" class="this_worker_cost" /></td>
                                                <td class="label_m">
                                                <select id="this_yardworker_<?= $worker['id']; ?>" class="this_yardworker this_worker_turn" style="width:179px; height: 25px;">
                                                        <option value="">Please select...</option>
                                                        <option value="1" <?= ($turn==1) ? 'selected' : ''; ?> >1 - 06:00 AM - 02:00 PM</option>
                                                        <option value="2" <?= ($turn==2) ? 'selected' : ''; ?>>2 - 02:00 PM - 10:00 PM</option>
                                                        <option value="3" <?= ($turn==3) ? 'selected' : ''; ?>>3 - 10:00 PM - 06:00 AM</option>
                                                        <option value="4" <?= ($turn==4) ? 'selected' : ''; ?>>4 - 06:00 AM - 06:00 PM</option>
                                                        <option value="5" <?= ($turn==1) ? 'selected' : ''; ?>>5 - 06:00 PM - 06:00 AM</option>
                                                </select>
                                            </td>
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