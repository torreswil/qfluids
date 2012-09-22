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
	      <li><a href="#">Hole Geometry</a></li>
	      <li><a href="#">Tanks Volume</a></li>
	      <li><a href="#">Active Volume</a></li>
	      <li><a href="#">Losses Analisis</a></li>
	      <li><a href="#">Old</a></li>
	    </ul>
	    <div class="simpleTabsContent">
	    	<fieldset>
				<legend>Volume resume:</legend>
				<table>
					<tr>
						<td class="label_m"><label>Casing:</label></td>
						<td><input type="text" name="volcsgt" id="volcsgt" disabled="disabled" /></td>
						<td class="label_m">bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>Open Hole:</label></td>
						<td><input type="text" disabled="disabled" id="volhole" name="volhole" /></td>
						<td class="label_m">bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>Total Empty Hole:</label></td>
						<td><input type="text" disabled="disabled" id="volholeempty" name="volholeempty" /></td>
						<td class="label_m">bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>String Displacement:</label></td>
						<td><input type="text" disabled="disabled" name="zdisptotal" id="zdisptotal" /></td>
						<td class="label_m">bbl</td>
					</tr>
					<tr>
						<td class="label_m"><label>Hole W/ String:</label></td>
						<td><input type="text" disabled="disabled" id="volwstring" name="volwstring" /></td>
						<td class="label_m">bbl</td>
					</tr>
				</table>
			</fieldset>
	    </div>	
		<div class="simpleTabsContent">
			<fieldset>
				<legend>Active Tanks</legend>
				<table>
					<thead>
						<tr>
							<td class="label_m"><label>TANK NAME:</label></td>
	        				<td class="label_m"><label>AGITATORS #:</label></td>
	        				<td class="label_m"><label>JETS:</label></td>
	        				<td class="label_m"><label>TANK TYPE:</label></td>
	        				<td class="label_m" style="text-align:center;"><label>VOL. CAPACITY:</label></td>
	        				<td class="label_m" style="text-align:center;"><label>MAX HEADROOM:</label></td>
	        				<td class="label_m" style="text-align:center;"><label>HEADROOM:</label></td>
	        				<td class="label_m" style="text-align:center;"><label>VOLUME:</label></td>
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
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($active_tanks as $tank){ 
								$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
						?>
							<tr>
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
							</tr>

						<?php } ?>
					</tbody>
				</table>
			</fieldset>
			<fieldset>
				<legend>Reserve Tanks</legend>
				<table>
					<thead>
						<tr>
							<td class="label_m"><label>TANK NAME:</label></td>
	        				<td class="label_m"><label>AGITATORS #:</label></td>
	        				<td class="label_m"><label>JETS:</label></td>
	        				<td class="label_m"><label>TANK TYPE:</label></td>
	        				<td class="label_m" style="text-align:center;"><label>VOL. CAPACITY:</label></td>
	        				<td class="label_m" style="text-align:center;"><label>MAX HEADROOM:</label></td>
	        				<td class="label_m" style="text-align:center;"><label>HEADROOM:</label></td>
	        				<td class="label_m" style="text-align:center;"><label>VOLUME:</label></td>
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
						</tr>
					</thead>
					<?php 
							foreach($reserve_tanks as $tank){ 
								$tank['jets'] == 0 ? $has_jets = 'No' : $has_jets = 'Yes'; 
						?>
							<tr>
								<td class="label_m"><input type="text" style="margin-right:0;width:110px;" disabled="disabled" value="<?= $tank['tank_name'] ?>" /></td>
		        				<td class="label_m"><input type="text" style="margin-right:0;width:70px;"  disabled="disabled" value="<?= $tank['agitators'] ?>" /></td>
		        				<td class="label_m"><input type="text" style="margin-right:0;width:30px;"  disabled="disabled" value="<?= $has_jets ?>" /></td>
		        				<td class="label_m"><input type="text" style="margin-right:0;width:110px;" disabled="disabled" value="<?= $tank['tank_type'] ?>" /></td>
		        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['voltkaforo'] ?>" /></td>
		        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" value="<?= $tank['hlibremax'] ?>" /></td>
								<td class="label_m"><input type="text" style="margin-right:0;width:90px;" /></td>
		        				<td class="label_m"><input type="text" style="margin-right:0;width:90px;" disabled="disabled" /></td>
							</tr>

						<?php } ?>
				</table>
			</fieldset>
		</div>
		<div class="simpleTabsContent">
			<fieldset>
				<table>
					<tr>
						<td></td>
						<td class="label_m"><label>Active</label></td>
					</tr>
					<tr>
						<td class="label_m"><label>STARTING VOL</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
					<tr>
						<td class="label_m"><label>TRANSFERED MUD TO RESERVES</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
					<tr>
						<td class="label_m"><label>RECEIVED MUD TO RESERVES</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
					<tr>
						<td class="label_m"><label>CHEMICAL ADDED</label></td>
						<td><input type="text" style="margin-right:5px;"> BBL</td>
					</tr>
					<tr>
						<td class="label_m"><label>TOTAL ADDED</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
					<tr>
						<td class="label_m"><label>FINAL VOL</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset style="margin-top:10px;">
				<table>
					<tr>
						<td></td>
						<td class="label_m"><label>RESERVE 1</label></td>
						<td class="label_m"><label>RESERVE 2</label></td>
					</tr>
					<tr>
						<td class="label_m"><label>STARTING VOL</label></td>
						<td><input type="text" disabled="disabled" /></td>
						<td><input type="text" disabled="disabled" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>REC. FROM ACTV. TO RES.</label></td>
						<td class="label_m"><input type="text" style="margin-right:5px;" />BBL</td>
						<td class="label_m"><input type="text" style="margin-right:5px;" />BBL</td>
					</tr>
					<tr>
						<td class="label_m"><label>TRANS. FROM RES. TO ACTV</label></td>
						<td class="label_m" class="label_m"><input type="text" style="margin-right:5px;" />BBL</td>
						<td class="label_m" class="label_m"><input type="text" style="margin-right:5px;" />BBL</td>
					</tr>
					<tr>
						<td class="label_m"><label>CHEMICAL ADDED</label></td>
						<td><input type="text" disabled="disabled" /></td>
						<td><input type="text" disabled="disabled" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>WATER ADDED</label></td>
						<td class="label_m"><input type="text" style="margin-right:5px;" />BBL</td>
						<td class="label_m"><input type="text" style="margin-right:5px;" />BBL</td>
					</tr>
					<tr>
						<td class="label_m"><label>TOTAL ADDED</label></td>
						<td><input type="text" disabled="disabled" /></td>
						<td><input type="text" disabled="disabled" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>FINAL VOL</label></td>
						<td><input type="text" disabled="disabled" /></td>
						<td><input type="text" disabled="disabled" /></td>
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
		<div class="simpleTabsContent">
			<table style="width:930px;">
				<tr>
					<td colspan='2'>
						<fieldset>
							<legend>VOLUMENES TANQUE</legend>
							
							<fieldset>
								<table>
								<td class="label_m"><label>Max altura libre</label></td>
								<td><input type="text" disabled="disabled" /></td>
								</table>
							</fieldset>

							<fieldset style="margin-top:10px;">
								<table>
									<tr>
										<td></td>
										<td class="label_m"><label>Altura Libre in</label></td>
										<td class="label_m"><label>Volumen en Barriles</label></td>
									</tr>
									<tr>
										<td class="label_m"><label>Tanque de Viaje</label></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td class="label_m"><label>Pildora</label></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td class="label_m"><label>Reserva1</label></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td class="label_m"><label>Reserva2</label></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
								</table>	
							</fieldset>
							
							<fieldset style="margin-top:10px;">
								<table>
									<tr>
										<td class="label_m"><label>Activo</label></td>
										<td class="label_m"><input type="text" disabled="disabled" style="margin-right:5px;" />BBL</td>
										<td style="width:15px;"></td>
										<td class="label_m"><label>Pildora</label></td>
										<td class="label_m"><input type="text" disabled="disabled" style="margin-right:5px;" />BBL</td>
										<td style="width:15px;"></td>
										<td class="label_m"><label>Tanque de Viaje</label></td>
										<td class="label_m"><input type="text" disabled="disabled" style="margin-right:5px;" />BBL</td>
									</tr>
								</table>
							</fieldset>
						</fieldset>		
					</td>
				</tr>
				<tr>	
					<td colspan='2'>
						<fieldset>
						<legend>MEDIDAS TANQUES</legend>
							<fieldset>
								<table>
									<tr>
										<td></td>
										<td class="label_m"><label>Altura in</label></td>
										<td class="label_m"><label>Ancho in</label></td>
										<td class="label_m"><label>largo in</label></td>
										<td class="label_m"><label>Fondo del tanque semicirculo altura in</label></td>
										<td class="label_m"><label>Volumen en Barriles</label></td>
									</tr>
									<tr>
										<td class="label_m"><label>Tanque de Viaje</label></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td class="label_m"><label>Pildora</label></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td><input type="text" style="width:90px;" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
									</tr>
									<tr>
										<td class="label_m"><label>Reserva1</label></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
										</tr>
										<tr>
										<td class="label_m"><label>Reserva2</label></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" /></td>
										<td><input type="text" disabled="disabled" />BBL</td>
										</tr>
								</table>
							</fieldset>		
						</fieldset>
					</td>	
				</tr>
			</table>
		</div>
	</div>
</div>