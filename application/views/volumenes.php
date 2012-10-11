<div class="this_panel plusribbon" id="volumenes" >
	<h2>Volumes</h2>
	
	<fieldset class="top_ribbon">
		<table style="float:left;" >
			<tr>
				<td class="label_m"><label class="emphasis">Balance del Fluido</label></td>
				<td><input type="text" style="width:100px;" disabled="disabled" name="balancefluido" id="balancefluido"></td>
			</tr>
		</table>
	</fieldset>

	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Volumes Resume</a></li>
			<li><a href="#">Active Volume</a></li>
			<li><a href="#">Reserve Volume & Out of Circuit</a></li>
			<li><a href="#">Losses Analisis</a></li>
	    </ul>
	    <div class="simpleTabsContent">
	    	<table style="width:100%;">
	    		<tr>
	    			<td>
	    				<fieldset style="width:93%;">
	    					<table>
		    					<tr>
		    						<td class="label_m"><label>Total Act. Circulate:</label></td>
		    						<td class="label_m"><input id="totalcirculate" name="totalcirculate" type="text" disabled="disabled" style="width:100px;" value="0" /> bbl</td>
		    					</tr>
		    				</table>
	    				</fieldset>
	    			</td>
	    			<td>

	    			</td>
	    		</tr>
	    		<tr>
	    			<td style="width:50%;">
				    	<fieldset style="width:93%">
							<legend>Hole resume:</legend>
							<table>
								<tr>
									<td class="label_m"><label>Casing:</label></td>
									<td><input type="text" name="volcsgt" id="volcsgt" disabled="disabled" style="width:100px;" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Open Hole:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="volhole" name="volhole" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Total Empty Hole:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="volholeempty" name="volholeempty" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>String Displacement:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" name="zdisptotal" id="zdisptotal" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Hole W/ String:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="volwstring" name="volwstring" /></td>
									<td class="label_m">bbl</td>
								</tr>
							</table>
						</fieldset>
	    			</td>
	    			<td style="width:50%;">
						<fieldset style="width:93%">
							<legend>Tanks resume:</legend>
							<table>
								<tr>
									<td class="label_m"><label>Trip Tank:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="triptank" name="triptank" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Active Pits:</label></td>
									<td><input type="text" name="activepits" id="activepits" disabled="disabled" style="width:100px;" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Pill:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="pill" name="pill" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Total Reserve:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" name="totalreserve" id="totalreserve" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Total Mud:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="totalmud" name="totalmud" /></td>
									<td class="label_m">bbl</td>
								</tr>
							</table>
						</fieldset>
	    			</td>
	    		</tr>
	    	</table>	
	    </div>	
		
		<div class="simpleTabsContent">
			<table style="width:100%;margin-top:20px;">
				<tr>
					<td class="label_m"><label><a href="#show_active_system_tanks" id="show_active_system_tanks" class="show">Show Tanks</a></label></td>
				</tr>
				<tr style="display:none;" id="show_active_tanks_tr">
					<td>
						<fieldset>
							<?php 
								$tanks_qty = count($trip_tanks) + count($active_tanks); 
								if($tanks_qty == 0){
									echo '<fieldset><legend>Tanks</legend><p>There are no configured tanks. Plase go "Menu - Settings - Tanks" and create some to get started.</p></fieldset>';
								}else{ ?>
									<fieldset>
										<table>
											<thead>
												<tr>
													<td class="label_m" style="width:123px;"><label>TANK NAME:</label></td>
							        				<td class="label_m" style="width:91px;"><label>AGITATORS #:</label></td>
							        				<td class="label_m" style="width:50px;"><label>JETS:</label></td>
							        				<td class="label_m" style="width:112px;"><label>TANK TYPE:</label></td>
							        				<td class="label_m" style="text-align:center;width:105px;"><label>VOL. CAPACITY:</label></td>
							        				<td class="label_m" style="text-align:center;width:109px;"><label>MAX HEADROOM:</label></td>
							        				<td class="label_m" style="text-align:center;width:100px;"><label>HEADROOM:</label></td>
							        				<td class="label_m" style="text-align:center;width:100px;"><label>VOLUME:</label></td>
							        				<td class="label_m" style="text-align:center;"></td>
							        				<td class="label_m" style="text-align:center;"></td>
												</tr>
												<tr>
													<td class="label_m" style="text-align:center;"></td>
							        				<td class="label_m" style="text-align:center;"></td>
							        				<td class="label_m" style="text-align:center;"></td>
							        				<td class="label_m" style="text-align:center;"></td>
							        				<td class="label_m" style="text-align:center;">bbl</td>
							        				<td class="label_m" style="text-align:center;">in.</td>
							        				<td class="label_m" style="text-align:center;">in.</td>
							        				<td class="label_m" style="text-align:center;">bbl</td>
							        				<td class="label_m" style="text-align:center;"></td>
							        				<td class="label_m" style="text-align:center;"></td>
												</tr>
											</thead>
										</table>
									</fieldset>
									
									<?php if(count($active_tanks) > 0){ ?>
										<fieldset>
											<legend>Active Tanks</legend>
											<table id="inside_circuit_active_tanks">		
												<?php
													//ACTIVE TANKS 
													foreach($active_tanks as $tank){ 
														$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
												?>
													<tr id="this_active_tank_<?= $tank['id'] ?>">
														<td class="label_m"><input type="text" style="margin-right:0;width:110px;" disabled="disabled" value="<?= $tank['tank_name'] ?>" /></td>
								        				<td class="label_m"><input type="text" style="margin-right:0;width:70px;"  disabled="disabled" value="<?= $tank['agitators'] ?>" /></td>
								        				<td class="label_m"><input type="text" style="margin-right:0;width:30px;"  disabled="disabled" value="<?= $has_jets ?>" /></td>
								        				<td class="label_m">
								        					<input type="text" style="margin-right:0;width:110px;" disabled="disabled" value="<?= $tank['tank_type'] ?>" />
								        					<input type="hidden" value="<?= $tank['type'] ?>" id="tank_type_id_<?= $tank['id'] ?>" />
								        					
								        					<input type="hidden" value="<?= $tank['sh1'] ?>" id="sh1_<?= $tank['id'] ?>" />
								        					<input type="hidden" value="<?= $tank['sa1'] ?>" id="sa1_<?= $tank['id'] ?>" />
								        					<input type="hidden" value="<?= $tank['sl1'] ?>" id="sl1_<?= $tank['id'] ?>" />
								        					<input type="hidden" value="<?= $tank['sh2'] ?>" id="sh2_<?= $tank['id'] ?>" />
								        					<input type="hidden" value="<?= $tank['sa2'] ?>" id="sa2_<?= $tank['id'] ?>" />
								        					<input type="hidden" value="<?= $tank['sl2'] ?>" id="sl2_<?= $tank['id'] ?>" />
								        					<input type="hidden" value="<?= $tank['diametro'] ?>" id="diametro_<?= $tank['id'] ?>" />
								        				</td>
								        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" id="voltkaforo_<?= $tank['id'] ?>" class="voltkaforo" /></td>
								        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" id="hlibremax_<?= $tank['id'] ?>" /></td>
														<td class="label_m"><input type="text" style="margin-right:0;width:90px;" class="hlibre" id="hlibre_<?= $tank['id'] ?>" name="hlibre_<?= $tank['id'] ?>" value="<?= $tank['hlibremax'] ?>" /></td>
								        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" class="volrealtk" id="volrealtk_<?= $tank['id'] ?>" name="volrealtk_<?= $tank['id'] ?>" disabled="disabled" /></td>
								        				<td class="label_m" style="text-align:center;"><input type="checkbox" style="margin-top:4px;margin-left:5px;margin-right:5px;" checked="checked" class="remove_activetank" id="active_tank_<?= $tank['id'] ?>" /></td>
							        					<td class="label_m" style="text-align:center;">Fluid Circuit</td>
													</tr>
												<?php } ?>
											</table>		
										</fieldset>
									<?php } ?>

									<fieldset style="display:none;">
										<legend>Out of active</legend>
										<table id="out_of_active_table"></table>
									</fieldset>						
							<?php } ?>
						</fieldset>
					</td>
				</tr>
			</table>

			<fieldset>
				<legend>Active</legend>
				<label id="tank_name_label_0" style="display:none;">Active</label>
				<table>
					<tr>
						<td></td>
						<td class="label_m"><label>STARTING VOLUME</label></td>
						<td class="label_m"><input id="volstartact" name="volstartact" class="label_m" type="text" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><img src="/img/bullet_add.png" /></td>
						<td class="label_m"><label><a href="#received_mud_from_reserves" class="mta_link" style="text-decoration:underline;">RECEIVED MUD FROM RESERVES</a></label></td>
						<td class="label_m"><input class="label_m" type="text" disabled style="width:100px;margin-right:3px;" id="volrecact" name="volrecact"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><img src="/img/bullet_add.png" /></td>
						<td class="label_m"><label><a href="#add_chemicals_overlay" class="show_add_chemicals_overlay" style="text-decoration:underline;" id="link_add_chemicals_0">CHEMICAL ADITIONS</a></label></td>
						<td class="label_m"><input class="label_m" type="text" disabled style="width:100px;margin-right:3px;" id="volchem_0" name="volchem_0"> bbl</td>
					</tr>
					<tr>
						<td></td>
						<td class="label_m"><label>WATER ADITIONS</label></td>
						<td class="label_m"><input id="volwateract" name="volwateract" class="label_m" type="text"  style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td></td>
						<td class="label_m"><label>BUILDED MUD</label></td>
						<td class="label_m"><input disabled id="volconsact" name="volconsact" class="label_m" type="text"  style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td><img src="/img/bullet_delete.png" /></td>
						<td class="label_m"><label><a href="#transfer_mud_to_reserves" class="mtr_link" style="text-decoration:underline;">MUD TRANSFERED TO RESERVES</a></label></td>
						<td class="label_m"><input class="label_m" disabled type="text" style="width:100px;margin-right:3px;" id="voltransfact" name="voltransfact"> bbl</td>
					</tr>
					<tr>
						<td></td>
						<td class="label_m"><label>TOTAL LOSSES</label></td>
						<td class="label_m"><input class="label_m" type="text" style="width:100px;margin-right:3px;" name="totallosses" id="totallosses" disabled /> bbl</td>
					</tr>
					<tr>
						<td></td>
						<td class="label_m"><label style="color:#333;">FINAL VOLUME</label></td>
						<td class="label_m"><input disabled id="volfinalact" name="volfinalact" class="label_m" type="text" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
				</table>
			</fieldset>	
			
			<fieldset style="margin-top:10px;">
				<table>
					<tr>
						<td class="label_m"><label>SECTION MUD MADE</label></td>
						<td><input type="text"></td>
						<td class="label_m"><label>ACCUM. MUD MADE</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="simpleTabsContent">
			<fieldset>
				<legend>Reserve Tanks</legend>
				<p>Pick the tank you want to use...</p>
				<table style="width:100%;">
				<?php foreach ($trip_tanks as $tank) { 
						$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes';
				?>
					<tr>
						<td class="label_m" style="width:16px;"><a href="toggle_plus_<?= $tank['id'] ?>" class="show_n_hide_reserves closed"><img src="/img/bullet_toggle_plus.png" /></a></td> <!-- ojo aca -->
						<td class="label_m"><label id="tank_name_label_<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></label></strong></td>
					</tr>
					<tr class="tank" id="this_tank_<?= $tank['id'] ?>">
						<td></td>
						<td>
							<fieldset style="display:none;margin-bottom:20px;margin-top:10px;float:left;width:40%;margin-right:20px;height:196px;" class="reserve_td reserve_td_<?= $tank['id'] ?>">
								<legend>Balance</legend>
								<table>
									<tr>
										<td class="label_m"><label>STARTING VOLUME:</label></td>
										<td class="label_m"><input class="label_m" type="text" style="width:100px;margin-right:3px;" id="volstart_<?= $tank['id'] ?>" name="volstart_<?= $tank['id'] ?>"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>RECEIVED MUD FROM ACTIVE:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m" type="text" style="width:100px;margin-right:3px;" id="volrec_<?= $tank['id'] ?>" name="volrec_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									
									<tr style="display:none;">
										<td class="label_m"><label><a href="#add_chemicals_overlay" class="show_add_chemicals_overlay" id="link_add_chemicals_<?= $tank['id'] ?>" style="text-decoration:underline;">CHEMICAL ADITIONS</a></label></td>
										<td class="label_m"><input disabled class="label_m" type="text"  style="width:100px;margin-right:3px;" id="volchem_<?= $tank['id'] ?>" name="volchem_<?= $tank['id'] ?>"> bbl</td>
									</tr>
									<tr style="display:none;">
										<td class="label_m"><label>WATER ADITIONS:</label></td>
										<td class="label_m"><input class="label_m" type="text"  style="width:100px;margin-right:3px;" name="volwater_<?= $tank['id'] ?>" id="volwater_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									<tr style="display:none;">
										<td class="label_m"><label>BUILDED MUD:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m" type="text"  style="width:100px;margin-right:3px;" name="volcons_<?= $tank['id'] ?>" id="volcons_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>MUD TRANSFERED TO ACTIVE:</label></td>
										<td class="label_m"><input class="label_m voltransf" type="text" style="width:100px;margin-right:3px;" name="voltransf_<?= $tank['id'] ?>" id="voltransf_<?= $tank['id'] ?>" /> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label style="color:#333;">FINAL VOLUME:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m volfinalpill" type="text" style="width:100px;margin-right:3px;" id="volfinal_<?= $tank['id'] ?>" name="volfinal_<?= $tank['id'] ?>"> bbl</td>
									</tr>
								</table>
							</fieldset>
							
							<fieldset style="display:none;margin-bottom:20px;margin-top:10px;float:left;width:40%;" class="reserve_td reserve_td_<?= $tank['id'] ?>">
								<legend>Tank</legend>
								<table>
									<tr>
										<td class="label_m"><label>Agitators:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;"  disabled="disabled" value="<?= $tank['agitators'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Jets:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;"  disabled="disabled" value="<?= $has_jets ?>" /></td>

									</tr>
									<tr>
										<td class="label_m"><label>Tank Type:</label></td>
										<td class="label_m">
											<input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['tank_type'] ?>" />
											<input type="hidden" value="<?= $tank['type'] ?>" id="tank_type_id_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sh1'] ?>" id="sh1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sa1'] ?>" id="sa1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sl1'] ?>" id="sl1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sh2'] ?>" id="sh2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sa2'] ?>" id="sa2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sl2'] ?>" id="sl2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['diametro'] ?>" id="diametro_<?= $tank['id'] ?>" />
										</td>
									</tr>
									<tr>
										<td class="label_m"><label>Vol. Capacity:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" id="voltkaforo_<?= $tank['id'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Max. Headroom:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" id="hlibremax_<?= $tank['id'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Headroom:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" class="hlibre" id="hlibre_<?= $tank['id'] ?>" name="hlibre_<?= $tank['id'] ?>" value="0" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Volume:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" class="volrealtk" id="volrealtk_<?= $tank['id'] ?>" name="volrealtk_<?= $tank['id'] ?>" disabled="disabled" /></td>
									</tr>
								</table>
							</fieldset>	
						</td>
					</tr>	
				<?php }?>

				<?php 
					foreach($pill_tanks as $tank){ 
						$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
				?>
					<tr>
						<td class="label_m" style="width:16px;"><a href="toggle_plus_<?= $tank['id'] ?>" class="show_n_hide_reserves closed"><img src="/img/bullet_toggle_plus.png" /></a></td> <!-- ojo aca -->
						<td class="label_m"><label id="tank_name_label_<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></label></strong></td>
					</tr>
					<tr class="tank" id="this_tank_<?= $tank['id'] ?>">
						<td></td>
						<td>
							<fieldset style="width:40%;display:none;" class="reserve_td reserve_td_<?= $tank['id'] ?>">
								<table>
									<td class="label_m" style="width:110px;"><label>Function:</label></td>
									<td class="label_m"><input type="text" style="margin-right:0;width:300px;max-width:500px;" value="" /></td>
								</table>
							</fieldset>
							<fieldset style="display:none;margin-bottom:20px;margin-top:10px;float:left;width:40%;margin-right:20px;" class="reserve_td reserve_td_<?= $tank['id'] ?>">
								<legend>Balance</legend>
								<table>
									<tr>
										<td class="label_m"><label>STARTING VOLUME:</label></td>
										<td class="label_m"><input class="label_m" type="text" style="width:100px;margin-right:3px;" id="volstart_<?= $tank['id'] ?>" name="volstart_<?= $tank['id'] ?>"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>RECEIVED MUD FROM ACTIVE:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m" type="text" style="width:100px;margin-right:3px;" id="volrec_<?= $tank['id'] ?>" name="volrec_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									
									<tr>
										<td class="label_m"><label><a href="#add_chemicals_overlay" class="show_add_chemicals_overlay" id="link_add_chemicals_<?= $tank['id'] ?>" style="text-decoration:underline;">CHEMICAL ADITIONS</a></label></td>
										<td class="label_m"><input disabled class="label_m" type="text"  style="width:100px;margin-right:3px;" id="volchem_<?= $tank['id'] ?>" name="volchem_<?= $tank['id'] ?>"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>WATER ADITIONS:</label></td>
										<td class="label_m"><input class="label_m" type="text"  style="width:100px;margin-right:3px;" name="volwater_<?= $tank['id'] ?>" id="volwater_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>BUILDED MUD:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m" type="text"  style="width:100px;margin-right:3px;" name="volcons_<?= $tank['id'] ?>" id="volcons_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									

									<tr>
										<td class="label_m"><label>MUD TRANSFERED TO ACTIVE:</label></td>
										<td class="label_m"><input class="label_m voltransf" type="text" style="width:100px;margin-right:3px;" name="voltransf_<?= $tank['id'] ?>" id="voltransf_<?= $tank['id'] ?>" /> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label style="color:#333;">FINAL VOLUME:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m volfinalpill" type="text" style="width:100px;margin-right:3px;" id="volfinal_<?= $tank['id'] ?>" name="volfinal_<?= $tank['id'] ?>"> bbl</td>
									</tr>
								</table>
							</fieldset>
							<fieldset style="display:none;margin-bottom:20px;margin-top:10px;float:left;width:40%;" class="reserve_td reserve_td_<?= $tank['id'] ?>">
								<legend>Tank</legend>
								<table>
									<tr>
										<td class="label_m"><label>Agitators:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;"  disabled="disabled" value="<?= $tank['agitators'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Jets:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;"  disabled="disabled" value="<?= $has_jets ?>" /></td>

									</tr>
									<tr>
										<td class="label_m"><label>Tank Type:</label></td>
										<td class="label_m">
											<input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['tank_type'] ?>" />
											<input type="hidden" value="<?= $tank['type'] ?>" id="tank_type_id_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sh1'] ?>" id="sh1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sa1'] ?>" id="sa1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sl1'] ?>" id="sl1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sh2'] ?>" id="sh2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sa2'] ?>" id="sa2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sl2'] ?>" id="sl2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['diametro'] ?>" id="diametro_<?= $tank['id'] ?>" />
										</td>
									</tr>
									<tr>
										<td class="label_m"><label>Vol. Capacity:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" id="voltkaforo_<?= $tank['id'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Max. Headroom:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" id="hlibremax_<?= $tank['id'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Headroom:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" class="hlibre" id="hlibre_<?= $tank['id'] ?>" name="hlibre_<?= $tank['id'] ?>" value="0" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Volume:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" class="volrealtk" id="volrealtk_<?= $tank['id'] ?>" name="volrealtk_<?= $tank['id'] ?>" disabled="disabled" /></td>
									</tr>
								</table>
							</fieldset>
						</td>
					</tr>
				<?php } ?>
				<?php 
					foreach($reserve_tanks as $tank){ 
						$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
				?>
					<tr>
						<td class="label_m" style="width:16px;"><a href="toggle_plus_<?= $tank['id'] ?>" class="show_n_hide_reserves closed"><img src="/img/bullet_toggle_plus.png" /></a></td> <!-- ojo aca -->
						<td class="label_m"><label id="tank_name_label_<?= $tank['id'] ?>"><?= $tank['tank_name'] ?></label></strong></td>
					</tr>
					<tr class="tank" id="this_tank_<?= $tank['id'] ?>">
						<td></td>
						<td>
							<fieldset style="width:40%;display:none;" class="reserve_td reserve_td_<?= $tank['id'] ?>">
								<table>
									<td class="label_m" style="width:110px;"><label>Function:</label></td>
									<td class="label_m"><input type="text" style="margin-right:0;width:300px;max-width:500px;" value="" /></td>
								</table>
							</fieldset>
							<fieldset style="display:none;margin-bottom:20px;margin-top:10px;float:left;width:40%;height:196px;margin-right:20px;" class="reserve_td reserve_td_<?= $tank['id'] ?>">
								<legend>Balance</legend>
								<table>
									<tr>
										<td class="label_m"><label>STARTING VOLUME:</label></td>
										<td class="label_m"><input class="label_m" type="text" style="width:100px;margin-right:3px;" id="volstart_<?= $tank['id'] ?>" name="volstart_<?= $tank['id'] ?>"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>RECEIVED MUD FROM ACTIVE:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m" type="text" style="width:100px;margin-right:3px;" id="volrec_<?= $tank['id'] ?>" name="volrec_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									<?php if($tank['name'] > 32){ $style="display:none;";}else{$style="";} ?>
									<tr style="<?= $style; ?>">
										<td class="label_m"><label><a href="#add_chemicals_overlay" class="show_add_chemicals_overlay" id="link_add_chemicals_<?= $tank['id'] ?>" style="text-decoration:underline;">CHEMICAL ADITIONS</a></label></td>
										<td class="label_m"><input class="label_m" type="text"  style="width:100px;margin-right:3px;" id="volchem_<?= $tank['id'] ?>" name="volchem_<?= $tank['id'] ?>" disabled /> bbl</td>
									</tr>
									<tr style="<?= $style; ?>">
										<td class="label_m"><label>WATER ADITIONS:</label></td>
										<td class="label_m"><input class="label_m" type="text"  style="width:100px;margin-right:3px;" name="volwater_<?= $tank['id'] ?>" id="volwater_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									<tr style="<?= $style; ?>">
										<td class="label_m"><label>BUILDED MUD:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m" type="text"  style="width:100px;margin-right:3px;" name="volcons_<?= $tank['id'] ?>" id="volcons_<?= $tank['id'] ?>" > bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>MUD TRANSFERED TO ACTIVE:</label></td>
										<td class="label_m"><input class="label_m voltransf" type="text" style="width:100px;margin-right:3px;" name="voltransf_<?= $tank['id'] ?>" id="voltransf_<?= $tank['id'] ?>"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label style="color:#333;">FINAL VOLUME:</label></td>
										<td class="label_m"><input disabled="disabled" class="label_m volfinalreserve" type="text" style="width:100px;margin-right:3px;" id="volfinal_<?= $tank['id'] ?>" name="volfinal_<?= $tank['id'] ?>" > bbl</td>
									</tr>
								</table>
							</fieldset>
							<fieldset style="display:none;margin-bottom:20px;margin-top:10px;float:left;width:40%;" class="reserve_td reserve_td_<?= $tank['id'] ?>">
								<legend>Tank</legend>
								<table>
									<tr>
										<td class="label_m"><label>Agitators:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;"  disabled="disabled" value="<?= $tank['agitators'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Jets:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;"  disabled="disabled" value="<?= $has_jets ?>" /></td>

									</tr>
									<tr>
										<td class="label_m"><label>Tank Type:</label></td>
										<td class="label_m">
											<input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['tank_type'] ?>" />
											<input type="hidden" value="<?= $tank['type'] ?>" id="tank_type_id_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sh1'] ?>" id="sh1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sa1'] ?>" id="sa1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sl1'] ?>" id="sl1_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sh2'] ?>" id="sh2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sa2'] ?>" id="sa2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['sl2'] ?>" id="sl2_<?= $tank['id'] ?>" />
											<input type="hidden" value="<?= $tank['diametro'] ?>" id="diametro_<?= $tank['id'] ?>" />
										</td>
									</tr>
									<tr>
										<td class="label_m"><label>Vol. Capacity:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" id="voltkaforo_<?= $tank['id'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Max. Headroom:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" id="hlibremax_<?= $tank['id'] ?>" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Headroom:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" class="hlibre" id="hlibre_<?= $tank['id'] ?>" name="hlibre_<?= $tank['id'] ?>" value="0" /></td>
									</tr>
									<tr>
										<td class="label_m"><label>Volume:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" class="volrealtk" id="volrealtk_<?= $tank['id'] ?>" name="volrealtk_<?= $tank['id'] ?>" disabled="disabled" /></td>
									</tr>
								</table>
							</fieldset>
						</td>
					</tr>
				<?php } ?>
				</table>
			</fieldset>
		</div>

		<div class="simpleTabsContent">
			<fieldset>
				<table>
					<tr>
						<td>
							<table>
								<tr>
									<td class="label_m"><label>SUB/SURFACE:</label></td>
									<td><input type="text" style="width:100px;" name="subsurf" id="subsurf" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>SURFACE:</label></td>
									<td class="label_m"><input type="text" style="width:100px;" name="surf" id="surf" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>CAVINGS:</label></td>
									<td class="label_m"><input type="text" style="width:100px;" name="caving" id="caving" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>SHAKERS:</label></td>
									<td class="label_m"><input type="text" style="width:100px;" name="shakes" id="shakes" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>MUD CLEANER:</label></td>
									<td class="label_m"><input type="text" style="width:100px;" name="cleaner" id="cleaner" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>CENTRIFUGUES:</label></td>
									<td class="label_m"><input type="text" style="width:100px;" name="centri" id="centri" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>DEWATERING:</label></td>
									<td class="label_m"><input type="text" style="width:100px;" name="dew" id="dew" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>BEHIND CASING:</label></td>
									<td class="label_m"><input type="text" style="width:100px;" name="becsg" id="becsg" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>OTHERS:</label></td>
									<td class="label_m"><input type="text" style="width:100px;" name="other" id="other" /> bbl</td>
								</tr>
							</table>	
						</td>
						<td style="padding-left:50px;">
							<table>
								<tr>
									<td class="label_m"><label>Daily Surface losses:</label></td>
									<td class="label_m"><input type="text" disabled="disabled" style="width:100px;" id="dailysurface" name="dailysurface" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Cumulative Surface losses:</label></td>
									<td class="label_m"><input type="text" disabled="disabled" style="width:100px;" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Daily Sub/Surface losses:</label></td>
									<td class="label_m"><input type="text" disabled="disabled" style="width:100px;" name="dailysubsurface" id="dailysubsurface" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Cumulative Sub/Surface losses:</label></td>
									<td class="label_m"><input type="text" disabled="disabled" style="width:100px;" /> bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Total losses:</label></td>
									<td class="label_m"><input type="text" disabled="disabled" style="width:100px;" id="ztotallosses" name="ztotallosses" /> bbl</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</fieldset>		
		</div>
	</div>
</div>