<div class="this_panel plusribbon" id="volumenes" >
	<h2>Volumes</h2>
	
	<fieldset class="top_ribbon">
		<table style="float:left;" >
			<tr>
				<td class="label_m"><label class="emphasis">Balance del Fluido</label></td>
				<td><input type="text" disabled="disabled"></td>
			</tr>
		</table>
	</fieldset>

	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
			<li><a href="#">Volumes Resume</a></li>
			<li><a href="#">Tanks Volume</a></li>
			<li><a href="#">Active Volume</a></li>
			<li><a href="#">Reserve Volume</a></li>
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
		    						<td class="label_m"><input type="text" disabled="disabled" style="width:100px;" /> bbl</td>
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
									<td class="label_m"><label>Active Pits:</label></td>
									<td><input type="text" name="volcsgt" id="volcsgt" disabled="disabled" style="width:100px;" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Pill:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="volhole" name="volhole" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Trip Tank:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="volholeempty" name="volholeempty" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Total Reserve:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" name="zdisptotal" id="zdisptotal" /></td>
									<td class="label_m">bbl</td>
								</tr>
								<tr>
									<td class="label_m"><label>Total Mud:</label></td>
									<td><input type="text" disabled="disabled" style="width:100px;" id="volwstring" name="volwstring" /></td>
									<td class="label_m">bbl</td>
								</tr>
							</table>
						</fieldset>
	    			</td>
	    		</tr>
	    	</table>

			
	    </div>	
		<div class="simpleTabsContent">
			<?php 
				$tanks_qty = count($trip_tanks) + count($active_tanks) + count($pill_tanks); 
				if($tanks_qty == 0){
					echo '<fieldset><legend>Tanks</legend><p>There are no configured tanks. Plase go "Menu - Settings - Tanks" and create some to get started.</p></fieldset>';
				}else{ ?>
					<fieldset>
						<legend>Tanks</legend>
						<table>
							<thead>
								<tr>
									<td class="label_m"><label>SYSTEM:</label></td>
									<td class="label_m"><label>TANK NAME:</label></td>
			        				<td class="label_m"><label>AGITATORS #:</label></td>
			        				<td class="label_m"><label>JETS:</label></td>
			        				<td class="label_m"><label>TANK TYPE:</label></td>
			        				<td class="label_m" style="text-align:center;"><label>VOL. CAPACITY:</label></td>
			        				<td class="label_m" style="text-align:center;"><label>MAX HEADROOM:</label></td>
			        				<td class="label_m" style="text-align:center;"><label>HEADROOM:</label></td>
			        				<td class="label_m" style="text-align:center;"><label>VOLUME:</label></td>
			        				<td class="label_m" style="text-align:center;"></td>
			        				<td class="label_m" style="text-align:center;"></td>
								</tr>
								<tr>
									<td class="label_m" style="text-align:center;"></td>
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
							<tbody>

								<?php 
									//TRIP TANK
									foreach($trip_tanks as $tank){ 
										$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
								?>
									<tr>
										<td class="label_m"><input type="text" style="margin-right:0;width:110px;" disabled="disabled" value="Trip Tank" /></td>
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
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" id="voltkaforo_<?= $tank['id'] ?>" /></td>
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" id="hlibremax_<?= $tank['id'] ?>" /></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:90px;" class="hlibre" id="hlibre_<?= $tank['id'] ?>" name="hlibre_<?= $tank['id'] ?>" value="0" /></td>
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" class="volrealtk" id="volrealtk_<?= $tank['id'] ?>" name="volrealtk_<?= $tank['id'] ?>" disabled="disabled" /></td>
										<td class="label_m" style="text-align:center;"></td>
			        					<td class="label_m" style="text-align:center;"></td>
									</tr>
								<?php } ?>

								<?php
									//ACTIVE TANKS 
									foreach($active_tanks as $tank){ 
										$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
								?>
									<tr>
										<td class="label_m"><input type="text" style="margin-right:0;width:110px;" disabled="disabled" value="Active Tanks" /></td>
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
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" id="voltkaforo_<?= $tank['id'] ?>" /></td>
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" id="hlibremax_<?= $tank['id'] ?>" /></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:90px;" class="hlibre" id="hlibre_<?= $tank['id'] ?>" name="hlibre_<?= $tank['id'] ?>" value="0" /></td>
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" class="volrealtk" id="volrealtk_<?= $tank['id'] ?>" name="volrealtk_<?= $tank['id'] ?>" disabled="disabled" /></td>
				        				<td class="label_m" style="text-align:center;"><input type="checkbox" style="margin-top:4px;margin-left:5px;margin-right:5px;" /></td>
			        					<td class="label_m" style="text-align:center;">Fluid Circuit</td>
									</tr>
								<?php } ?>

								<?php 
									foreach($pill_tanks as $tank){ 
										$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
								?>
									<tr>
										<td class="label_m"><input type="text" style="margin-right:0;width:110px;" disabled="disabled" value="Pill Tanks" /></td>
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
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" id="voltkaforo_<?= $tank['id'] ?>" /></td>
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" id="hlibremax_<?= $tank['id'] ?>" /></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:90px;" class="hlibre" id="hlibre_<?= $tank['id'] ?>" name="hlibre_<?= $tank['id'] ?>" value="0" /></td>
				        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" class="volrealtk" id="volrealtk_<?= $tank['id'] ?>" name="volrealtk_<?= $tank['id'] ?>" disabled="disabled" /></td>
										<td class="label_m" style="text-align:center;"></td>
			        					<td class="label_m" style="text-align:center;"></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</fieldset>
			<?php } ?>
		</div>

		<div class="simpleTabsContent">
			<fieldset>
				<legend>Active</legend>
				<table>
					<tr>
						<td class="label_m"><label>STARTING VOLUME</label></td>
						<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>RECEIVED MUD FROM RESERVES</label></td>
						<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>RECEIVED MUD FROM OTHERS</label></td>
						<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label><a href="#add_chemicals_overlay" class="show_add_chemicals_overlay" style="text-decoration:underline;">CHEMICAL ADITIONS</a></label></td>
						<td class="label_m"><input class="label_m" type="text"  disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>WATER ADITIONS</label></td>
						<td class="label_m"><input class="label_m" type="text"  disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>BUILDED MUD</label></td>
						<td class="label_m"><input class="label_m" type="text"  disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label><a href="#" class="" style="text-decoration:underline;">MUD TRANSFERED TO RESERVES</a></label></td>
						<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label><a href="#" class="" style="text-decoration:underline;">MUD TRANSFERED TO OTHERS</a></label></td>
						<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>TOTAL LOSSES</label></td>
						<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>VOLUMEN POR FUERA DEL CIRCUITO ACTIVO</label></td>
						<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label style="color:#333;">FINAL VOLUME</label></td>
						<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset style="margin-top:10px;">
				<table>
					<tr>
						<td class="label_m"><label>SECTION MUD MADE</label></td>
						<td><input type="text"></td>
						<td class="label_m"><label>CUM. MUD MADE</label></td>
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
				<?php 
					foreach($reserve_tanks as $tank){ 
						$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
				?>
					<tr>
						<td class="label_m" style="width:16px;"><a href="toggle_plus_<?= $tank['id'] ?>" class="show_n_hide_reserves"><img src="/img/bullet_toggle_plus.png" /></a></td> <!-- ojo aca -->
						<td class="label_m"><label><?= $tank['tank_name'] ?></label></strong></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<fieldset style="display:none;margin-bottom:20px;margin-top:10px;" id="reserve_td_<?= $tank['id'] ?>" class="reserve_td">
								<table>
									<tr>
										<td class="label_m"><label>Current function:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" value="" /></td>

										<td style="width:50px;"></td>

										<td class="label_m"><label>STARTING VOLUME:</label></td>
										<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>Agitators:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;"  disabled="disabled" value="<?= $tank['agitators'] ?>" /></td>

										<td style="width:50px;"></td>

										<td class="label_m"><label>RECEIVED MUD FROM ACTIVE:</label></td>
										<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>Jets:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;"  disabled="disabled" value="<?= $has_jets ?>" /></td>

										<td style="width:50px;"></td>

										<td class="label_m"><label><a href="#add_chemicals_overlay" class="show_add_chemicals_overlay" style="text-decoration:underline;">CHEMICAL ADITIONS</a></label></td>
										<td class="label_m"><input class="label_m" type="text"  disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
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

										<td style="width:50px;"></td>

										<td class="label_m"><label>WATER ADITIONS:</label></td>
										<td class="label_m"><input class="label_m" type="text"  disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>Vol. Capacity:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" id="voltkaforo_<?= $tank['id'] ?>" /></td>

										<td style="width:50px;"></td>

										<td class="label_m"><label>BUILDED MUD:</label></td>
										<td class="label_m"><input class="label_m" type="text"  disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>Max. Headroom:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" id="hlibremax_<?= $tank['id'] ?>" /></td>

										<td style="width:50px;"></td>

										<td class="label_m"><label><a href="#" class="" style="text-decoration:underline;">MUD TRANSFERED TO ACTIVE:</a></label></td>
										<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>Headroom:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" class="hlibre" id="hlibre_<?= $tank['id'] ?>" name="hlibre_<?= $tank['id'] ?>" value="0" /></td>

										<td style="width:50px;"></td>

										<td class="label_m"><label>TOTAL LOSSES:</label></td>
										<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
									</tr>
									<tr>
										<td class="label_m"><label>Volume:</label></td>
										<td class="label_m"><input type="text" style="margin-right:0;width:100px;" class="volrealtk" id="volrealtk_<?= $tank['id'] ?>" name="volrealtk_<?= $tank['id'] ?>" disabled="disabled" /></td>

										<td style="width:50px;"></td>

										<td class="label_m"><label style="color:#333;">FINAL VOLUME:</label></td>
										<td class="label_m"><input class="label_m" type="text" disabled="disabled" style="width:100px;margin-right:3px;"> bbl</td>
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
						<td class="label_m"><label>SURFACE</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>SHAKERS/CAVINGS</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>MUD CLEANER</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>CENTRIFUGUES</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>DEWATERING</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>BEHIND CASING</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>OTHERS</label></td>
						<td><input type="text" /></td>
					</tr>
					
				</table>
			</fieldset>
			<fieldset style="margin-top:10px;">
				<table>
					<tr>
						<td class="label_m"><label>sub/surface</label></td>
						<td><input type="text" /></td>
					</tr>
				</table>
			</fieldset>
			<fieldset style="margin-top:10px;">
				<table>
					<tr>
						<td class="label_m"><label>Daily Surf.losses:</label></td>
						<td><input type="text" disabled="disabled" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Cum Surf.losse:</label></td>
						<td><input type="text" disabled="disabled" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Daily Sub/Surf.losse:</label></td>
						<td><input type="text" disabled="disabled" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Cum. Sub/Surf.losse:</label></td>
						<td><input type="text" disabled="disabled" /></td>
					</tr>
				</table>
			</fieldset>
		</div>
	</div>
</div>