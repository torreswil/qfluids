<?php $reporte = $this->session->userdata('report'); ?>
<?php $reporte = $this->Api->get_where('reports', array('id'=>$reporte['id'])); ?>
<?php $reporte = isset($reporte[0]) ? $reporte[0] : null; ?>
<div class="this_panel plusribbon" id="geometria_pozo">
	<h2>Hole Geometry</h2>
	<fieldset class="top_ribbon">
		<table style="float:left;">
			<tr>
				<td class="label_m">
					<label class="emphasis">DEPTH MD:</label>
				</td>
				<td class="label_m" style="padding-right:20px;">
					<input type="text" id="md" name="md" style="margin-right:5px;width:40px;" value="<?= empty($reporte['depth_md']) ? '0' : $reporte['depth_md']; ?>" /> ft
				</td>
				<td class="label_m">
					<label class="emphasis">BIT DEPTH:</label>
				</td>
				<td class="label_m" style="padding-right:20px;">
					<input type="text" name="bitdepth" id="bitdepth" style="margin-right:5px;width:40px;" value="<?= empty($reporte['bit_depth']) ? '0' : $reporte['bit_depth']; ?>" disabled="disabled" /> ft
				</td>
			</tr>
		</table>
		<span class="warning" style="display:none;"><strong>Warning:</strong> The <strong>BIT DEPTH</strong> can not be greater than the <strong>DEPTH MD</strong>.</span>
	</fieldset>
	
	<div class="simpleTabs">
		<ul class="simpleTabsNavigation">
	      <li><a href="#">Casing</a></li>
	      <li><a href="#">Hole</a></li>
	      <li><a href="#">Drill String</a></li>
	      <li><a href="#">Hydraulics</a></li>
	    </ul>
	    <div class="simpleTabsContent">
			<!-- CASING -->
			<fieldset>
				<legend>Active Casing</legend>
				<div class="info_panel" id="ip_add_casing">
					<p>To add casing for the first time  please make sure the <strong>Depth MD</strong>  is greater than 0 and hit the button <strong>'Add Casing'</strong> below.</p>
				</div>
				<table id="casing_table" style="float:left;display:none;">
					<thead>
						<tr>
							<td class="label_m"><label>NAME:</label></td>
							<td class="label_m"  style="text-align: center"><label>OD: </td>
							<td class="label_m"  style="text-align: center"><label>ID: </td>
							<td class="label_m"  style="text-align: center"><label>TOP: </td>	
							<td class="label_m"  style="text-align: center"><label>BOTTOM: </td>
							<td class="label_m"  style="text-align: center"><label>CAPAC.:</td>
							<td class="label_m"  style="text-align: center"><label>LENGTH:</td>														
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td class="label_m" style="text-align:center">
								<span style="text-transform:lowercase;">in</span></td>
							<td class="label_m" style="text-align: center">
								<span style="text-transform:lowercase;">in</span></td>
							<td class="label_m" style="text-align: center">
								<span style="text-transform:lowercase;">ft</span></td>	
							<td class="label_m" style="text-align: center">
								<span style="text-transform:lowercase;">ft</span></td>
							<td class="label_m" style="text-align: center">
								<span style="text-transform:lowercase;">bbl</span></td>
							<td class="label_m" style="text-align: center">
								<span style="text-transform:lowercase;">ft</span></td>														
							<td></td>
						</tr>
					</thead>
					<tbody>
						<!-- todo: completar dinamicamente -->
						<?php 
							$revestidores = $this->Api->sql("SELECT * FROM project_report_casing INNER JOIN casing ON casing.id = project_report_casing.casing_id WHERE project_report_casing.report_id = {$reporte['id']} ORDER BY project_report_casing.id ASC"); 
							$count = 0;
							foreach ($revestidores as $revestidor) {
								$count++;
							?>
		 						<tr id="casing_tool_<?= $count; ?>" class="casing_tool_row active" style="display: table-row;">
            					   <td>
            					       <input type="text" value="<?= $revestidor['type'] ?>" id="picker_<?= $count; ?>" style="width:100px;margin-right:0;" class="pick_casing" disabled="disabled" />
            					       <input type="hidden" value="<?= $revestidor['casing_id'] ?>"  id="picker_id_<?= $count; ?>" class="pick_casing_id" />
            					   </td>
            					   <td>
            					       <input type="hidden" class="od" value="<?= $revestidor['oddeci'] ?>" name="odcsg_<?= $count; ?>" id="odcsg_<?= $count; ?>" />
            					       <input type="text" class="od_dummie" style="width:60px;margin-right:0;" disabled="disabled" value="<?= $revestidor['odfrac'] ?>" id="od_dummie_<?= $count; ?>" />
            					  </td>
            					       <td><input type="text" class="id" style="width:60px;margin-right:0;" disabled="disabled" value="<?= $revestidor['iddeci'] ?>" name="idcsg_<?= $count; ?>" id="idcsg_<?= $count; ?>" /></td>
            					       <td><input type="text" class="top" style="width:60px;margin-right:0;" disabled="disabled" value="<?= $revestidor['top'] ?>" name="topcsg_<?= $count; ?>" id="topscsg_<?= $count; ?>" /></td>
            					       <td><input type="text" class="bottom" style="width:60px;margin-right:0;" disabled="disabled" value="<?= $revestidor['bottom'] ?>" name="bottomcsg_<?= $count; ?>" id="bottomcsg_<?= $count; ?>" /></td>
            					       <td><input type="text" class="volume" style="width:60px;margin-right:0;" disabled="disabled" name="volcsg_<?= $count; ?>" id="volcsg_<?= $count; ?>" /></td>
            					   <td>
            					       <input type="text" class="length" style="width:60px;margin-right:0;" disabled="disabled" name="longcsg_<?= $count; ?>" id="longcsg_<?= $count; ?>" />
            					       <input type="hidden" class="zrrange_top" id="zrrange_top_<?= $count; ?>" name="zrrange_top_<?= $count; ?>" disabled="disabled" value="0">
            					       <input type="hidden" class="zrrange_btm" id="zrrange_btm_<?= $count; ?>" name="zrrange_btm_<?= $count; ?>" disabled="disabled" value="0">
            					  </td>
            					   <td class="label_m"><a href="#remove_casing" class="remove_casing"><img src="/img/delete.png" /></a></td>
            					</tr>								
						<?php	}
						?>
						
					</tbody>
				</table>
				<div style="float:left;width:100%;margin-top:10px;">
					<input type="button" value="Add Casing" id="btn_add_casing" />
				</div>
			</fieldset>
        </div>
	    <div class="simpleTabsContent">
    		<!-- HOLE -->
                        <? $rs = $this->Api->get_where('project_report_hole', array('report_id'=>$reporte['id'])); ?>  
                        <? $rs = isset($rs[0]) ? $rs[0] : null; ?>                        
			<fieldset>
				<table style="float:left;">
					<tr>
						<td class="label_m"><label class="emphasis">OPEN HOLE:</label></td>
						<td>
		                    <input type="hidden" name="zholed" id="zholed" disabled="disabled">
		                    <input type="text" name="zhole" id="zhole" value="<?= empty($rs['open_hole']) ? '0' : $rs['open_hole']; ?>"></td>
						<td class="label_m">in [decimals, not fracs]</td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset>
				<legend>Washout Estimation From...:</legend>
				<div class="info_panel" style="margin-bottom:20px;">
					<table>
						<tr>
							<td class="label_m"><input type="radio" name="calculo_openhole" checked="checked" value="normal" /></td>
							<td class="label_m">Open Hole and Washout calcs</td>
						</tr>
						<tr>
							<td class="label_m"><input type="radio" name="calculo_openhole" value="washout" /></td>
							<td class="label_m">Open Hole calc (with Washout previous knowledge)</td>
						</tr>
					</table>
				</div>
				

				<p style="margin-top:0px;">
					Open hole increment in inches, by the following items:
				</p>
				<table style="float:left;" id="hole_left">
					<tr>
						<td class="label_m"><label>Rice & Carbide Test:</label></td>
						<td><input class="zero" type="text" name="zrice" id="zrice" style="margin-right:3px;" value="<?= empty($rs['rice_carbide_test']) ? '' : $rs['rice_carbide_test']; ?>"></td>
						<td class="label_m" style="text-align:left;">in</td>
					</tr>
					<tr>
						<td class="label_m"><label>Cuttings & Caving record:</label></td>
						<td><input class="zero" type="text" name="zcuttings" id="zcuttings" style="margin-right:3px;" value="<?= empty($rs['cuttings_caving_record']) ? '' : $rs['cuttings_caving_record']; ?>"></td>
						<td class="label_m" style="text-align:left;">in</td>
					</tr>
					<tr>
						<td class="label_m"><label>Caliper:</label></td>
						<td><input class="zero" type="text" name="zcalipper" id="zcaliper" style="margin-right:3px;" value="<?= empty($rs['caliper']) ? '' : $rs['caliper']; ?>"></td>
						<td class="label_m" style="text-align:left;">in</td>
					</tr>
				</table>
				<table style="float:left;margin-left:50px;" id="hole_right" >
					<tr>
						<td class="label_m" style="padding-left:6px;"><label>WASHOUT:</label></td>
						<td><input type="text" name="zwashout" id="zwashout" disabled="disabled" style="width:50px;" value="<?= empty($rs['washout']) ? '' : $rs['washout']; ?>"></td>
						<td class="label_m">%</td>
					</tr>
					<tr>
						<td class="label_m" style="padding-left:6px;"><label>AVERAGE HOLE:</label></td>
						<td><input type="text" name="openhole" id="openhole" disabled="disabled" style="width:50px;" value="<?= empty($rs['average_hole']) ? '' : $rs['average_hole']; ?>"></td>
						<td class="label_m">in</td>
					</tr>
					<tr>
						<td class="label_m" style="padding-left:6px;"><label>OPEN HOLE LENGTH:</label></td>
						<td><input type="text" name="longhoyo" id="longhoyo" disabled="disabled" style="width:50px;" value="<?= empty($rs['open_hole_length ']) ? '' : $rs['open_hole_length ']; ?>"></td>
						<td class="label_m">ft</td>
					</tr>
				</table>
			</fieldset>
	    </div>
        <div class="simpleTabsContent">
        		<!-- DRILL STRING -->
                <? $rs = $this->Api->get_where('project_report_drill_string', array('report_id'=>$reporte['id'])); ?>                               
				<table>
					<tr>
						<td colspan="2">
							<fieldset>
								<table>
									<tr>
										<td class="label_m"><label>BHA#:</label></td>
										<td><input type="text" style="width:40px;" id="dsbha" value="<?= empty($reporte['bha']) ? '' : $reporte['bha']; ?>" /></td>

										<td class="label_m"><label>TOTAL LENGTH BHA:</label></td>
										<td><input type="text" name="totalbha" id="totalbha" disabled="disabled" style="width:40px;" value="<?= empty($reporte['bha_length']) ? '' : $reporte['bha_length']; ?>" /></td>
									</tr>
								</table>
							</fieldset>
						</td>
					</tr>
					<tr>
						<td>
							<fieldset style="margin-top:10px;">
								<table>
									<thead>
										<tr>
											<td class="label_m"><label>SECTION:</label></td>
											<td class="label_m" style="text-align:center;"><label>OD:</label></td>
											<td class="label_m" style="text-align:center;"><label>ID:</label></td>
											<td class="label_m" style="text-align:center;"><label>LENGTH:</label></td>
											<td class="label_m" style="text-align:center;"><label>Capac.</label></td>
											<td class="label_m" style="text-align:center;"><label>Displac.</label></td>
											<td class="label_m" style="text-align:center;"><label>Capac.</label></td>
											<td class="label_m" style="text-align:center;"><label>Displa.</label></td>
											<td class="label_m" colspan="2" style="text-align:center;"><label>Pressure Losses</label></td>
											<td></td>
										</tr>
										<tr>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;"></td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">Vol bbl</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">Vol bbl</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">bbl/ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">bbl/ft</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">Power</td>
											<td class="unit_field" style="text-align:center;padding-rigth:5px;">Bingh</td>
										</tr>
										<tr style="display:none;">
											<td class="label_m"><label>DRILL PIPE:</label></td>
											<td><input type="text" name="oddp" id="oddp" value="0" /></td>
											<td><input type="text" name="iddp" id="iddp" value="0" /></td>
											<td><input type="text" name="longdp" id="longdp" value="0" style="width:40px;" /></td>
											<td><input type="text" name="capvdp" id="capvdp" value="0" disabled="disabled"/></td>
											<td><input type="text" name="dispvdp" id="dispvdp" value="0" disabled="disabled"/></td>
											<td><input type="text" name="capdp" id="capdp" disabled="disabled" style="width:40px;" value="0" /></td>
											<td><input type="text" name="dispdp" id="dispdp" disabled="disabled" style="width:40px;" value="0"/></td>
											<td><input type="text" name="powerlosspb" id="powerlosspb" disabled="disabled" value="0"/></td>
											<td><input type="text" name="zbinglosspb" id="zbinglosspb" disabled="disabled" value="0"/></td>
											<td></td>
										</tr>
										<tr>
											<td><a href="#" id="add_another_drill">Add a BHA tool...</a></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</thead>
									<tbody class="drill_string_pieces">
                                        <?php $tam = count($rs); ?>
                                        <?php if($tam>1) { ?>
                                                <?php for($i=1 ; $i<=$tam ; $i++) { ?>
                                        <tr id="row_select_drill_string_<?=$i;?>" class="row_select_drill_string">
                                                <td>
                                                    <select class="select_drill_string drillstring_tool_<?=$i;?>" id="select_drill_string_<?=$i;?>">
                                                        <option value="">Select...</option>
                                                        <option value="bit_sub" <?= (isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='bit_sub') ? 'selected' : ''; ?>>Bit + Sub</option>
                                                        <option value="bit" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='bit' ? 'selected' : ''; ?>>Bit</option>
                                                        <option value="dc" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='dc' ? 'selected' : ''; ?>>DC</option>
                                                        <option value="hw" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='hw' ? 'selected' : ''; ?>>HW</option>
                                                        <option value="motor" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='motor' ? 'selected' : ''; ?>>Motor</option>
                                                        <option value="stb" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='stb' ? 'selected' : ''; ?>>STB</option>
                                                        <option value="xo" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='xo' ? 'selected' : ''; ?>>XO</option>
                                                        <option value="hwdp" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='hwdp' ? 'selected' : ''; ?>>HWDP</option>
                                                        <option value="mwd" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='mwd' ? 'selected' : ''; ?>>MWD</option>
                                                        <option value="dp" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='dp' ? 'selected' : ''; ?>>DP</option>
                                                        <option value="xodp" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='xodp' ? 'selected' : ''; ?>>XODP</option>
                                                        <option value="jar" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='jar' ? 'selected' : ''; ?>>Jar</option>
                                                        <option value="power_drive" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='power_drive' ? 'selected' : ''; ?>>Power Drive</option>
                                                        <option value="vortex" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='vortex' ? 'selected' : ''; ?>>Vortex</option>
                                                        <option value="lwd" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='lwd' ? 'selected' : ''; ?>>LWD</option>
                                                        <option value="csg" <?= isset($rs[$i-1]['bha_name']) && $rs[$i-1]['bha_name']=='csg' ? 'selected' : ''; ?>>CSG</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" type="text" name="odbha_<?=$i;?>" id="odbha_<?=$i;?>" class="odbha_<?=$i;?> odbha" value="<?= empty($rs[$i-1]['oddeci']) ? '' : $rs[$i-1]['oddeci']; ?>" /></td>
                                                <td><input type="text" type="text" name="idbha_<?=$i;?>" id="idbha_<?=$i;?>" class="idbha_<?=$i;?> idbha" value="<?= empty($rs[$i-1]['iddeci']) ? '' : $rs[$i-1]['iddeci']; ?>"/></td>
                                                <td><input type="text" type="text" name="longbha_<?=$i;?>" id="longbha_<?=$i;?>" class="longbha_<?=$i;?> longbha" value="<?= empty($rs[$i-1]['length']) ? '0' : $rs[$i-1]['length']; ?>" style="width:40px;" /></td>
                                                <td><input type="text" type="text" name="capvbha_<?=$i;?>" id="capvbha_<?=$i;?>" disabled="disabled" class="capvbha_<?=$i;?> capvbha" value="<?= empty($rs[$i-1]['capacity_vol']) ? '' : $rs[$i-1]['capacity_vol']; ?>" /></td>
                                                <td><input type="text" type="text" name="dispvbha_<?=$i;?>" id="dispvbha_<?=$i;?>" class="dispvbha_<?=$i;?> dispvbha" disabled="disabled" value="<?= empty($rs[$i-1]['displacement_vol']) ? '' : $rs[$i-1]['displacement_vol']; ?>"/></td>
                                                <td><input type="text" type="text" name="capbha_<?=$i;?>" id="capbha_<?=$i;?>" class="capbha_<?=$i;?> capbha" disabled="disabled" style="width:40px;" value="<?= empty($rs[$i-1]['capacity_ft']) ? '' : $rs[$i-1]['capacity_ft']; ?>" /></td>
                                                <td><input type="text" type="text" name="dispbha_<?=$i;?>" id="dispbha_<?=$i;?>" class="dispbha_<?=$i;?> dispbha" disabled="disabled" style="width:40px;" value="<?= empty($rs[$i-1]['displacement_ft']) ? '' : $rs[$i-1]['displacement_ft']; ?>" /></td>
                                                <td><input type="text" type="text" name="powerlossbha_<?=$i;?>" id="powerlossbha_<?=$i;?>" class="powerlossbha" disabled="disabled" value="<?= empty($rs[$i-1]['pressure']) ? '0' : $rs[$i-1]['pressure']; ?>"/></td>
                                                <td><input type="text" type="text" name="zbinglossbha_<?=$i;?>" id="zbinglossbha_<?=$i;?>" class="zbinglossbha" disabled="disabled" value="<?= empty($rs[$i-1]['losses']) ? '0' : $rs[$i-1]['losses']; ?>"/></td>
                                                <td class="label_m"><a href="#removeds_<?=$i;?>" class="remove_ds">Remove</a></td>
                                        </tr>                                                                                                
                                                                                        <?php } ?>
                                                                                <?php } else { ?>
										<tr id="row_select_drill_string_1" class="row_select_drill_string">											
                                                                                                        <td>
                                                                                                                <select class="select_drill_string drillstring_tool_1" id="select_drill_string_1">
                                                                                                                        <option value="">Select...</option>
                                                                                                                        <option value="bit_sub" <?= (isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='bit_sub') ? 'selected' : ''; ?>>Bit + Sub</option>
                                                                                                                        <option value="bit" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='bit' ? 'selected' : ''; ?>>Bit</option>
                                                                                                                        <option value="hw" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='hw' ? 'selected' : ''; ?>>HW</option>
                                                                                                                        <option value="dc" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='dc' ? 'selected' : ''; ?>>DC</option>
                                                                                                                        <option value="motor" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='motor' ? 'selected' : ''; ?>>Motor</option>
                                                                                                                        <option value="stb" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='stb' ? 'selected' : ''; ?>>STB</option>
                                                                                                                        <option value="xo" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='xo' ? 'selected' : ''; ?>>XO</option>
                                                                                                                        <option value="hwdp" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='hwdp' ? 'selected' : ''; ?>>HWDP</option>
                                                                                                                        <option value="mwd" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='mwd' ? 'selected' : ''; ?>>MWD</option>
                                                                                                                        <option value="dp" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='dp' ? 'selected' : ''; ?>>DP</option>
                                                                                                                        <option value="xodp" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='xodp' ? 'selected' : ''; ?>>XODP</option>
                                                                                                                        <option value="jar" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='jar' ? 'selected' : ''; ?>>Jar</option>
                                                                                                                        <option value="power_drive" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='power_drive' ? 'selected' : ''; ?>>Power Drive</option>
                                                                                                                        <option value="vortex" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='vortex' ? 'selected' : ''; ?>>Vortex</option>
                                                                                                                        <option value="lwd" <?= isset($rs[0]['bha_name']) && $rs[0]['bha_name']=='lwd' ? 'selected' : ''; ?>>LWD</option>
                                                                                                                </select>
                                                                                                        </td>
                                                                                                        <td><input type="text" type="text" name="odbha_1" id="odbha_1" class="odbha_1 odbha" value="<?= empty($rs[0]['oddeci']) ? '' : $rs[0]['oddeci']; ?>" /></td>
                                                                                                        <td><input type="text" type="text" name="idbha_1" id="idbha_1" class="idbha_1 idbha" value="<?= empty($rs[0]['iddeci']) ? '' : $rs[0]['iddeci']; ?>"/></td>
                                                                                                        <td><input type="text" type="text" name="longbha_1" id="longbha_1" class="longbha_1 longbha" value="<?= empty($rs[0]['length']) ? '0' : $rs[0]['length']; ?>" style="width:40px;" /></td>
                                                                                                        <td><input type="text" type="text" name="capvbha_1" id="capvbha_1" disabled="disabled" class="capvbha_1 capvbha" value="<?= empty($rs[0]['capacity_vol']) ? '' : $rs[0]['capacity_vol']; ?>" /></td>
                                                                                                        <td><input type="text" type="text" name="dispvbha_1" id="dispvbha_1" class="dispvbha_1 dispvbha" disabled="disabled" value="<?= empty($rs[0]['displacement_vol']) ? '' : $rs[0]['displacement_vol']; ?>"/></td>
                                                                                                        <td><input type="text" type="text" name="capbha_1" id="capbha_1" class="capbha_1 capbha" disabled="disabled" style="width:40px;" value="<?= empty($rs[0]['capacity_ft']) ? '' : $rs[0]['capacity_ft']; ?>" /></td>
                                                                                                        <td><input type="text" type="text" name="dispbha_1" id="dispbha_1" class="dispbha_1 dispbha" disabled="disabled" style="width:40px;" value="<?= empty($rs[0]['displacement_ft']) ? '' : $rs[0]['displacement_ft']; ?>" /></td>
                                                                                                        <td><input type="text" type="text" name="powerlossbha_1" id="powerlossbha_1" class="powerlossbha" disabled="disabled" value="<?= empty($rs[0]['pressure']) ? '0' : $rs[0]['pressure']; ?>"/></td>
                                                                                                        <td><input type="text" type="text" name="zbinglossbha_1" id="zbinglossbha_1" class="zbinglossbha" disabled="disabled" value="<?= empty($rs[0]['losses']) ? '0' : $rs[0]['losses']; ?>"/></td>
                                                                                                        <td class="label_m"><a href="#removeds_1" class="remove_ds">Remove</a></td>
                                                                                                </tr>
                                                                                <?php } ?>
										<tr>
											<td></td>
											<td></td>
											<td class="label_m"><label>TOTAL:</label></td>
											<td><input type="text" disabled="disabled" id="totalds" name="totalds" style="width:40px;" /></td>
											<td><input type="text" disabled="disabled" id="captotal" name="captotal"/></td>
											<td><input type="text" disabled="disabled" id="disptotal" name="disptotal" /></td>
											<td></td>
											<td class="label_m"><label>TOTAL:</label></td>
											<td><input type="text" disabled="disabled" id="totalstringpow" name="totalstringpow" /></td>
											<td><input type="text" disabled="disabled" id="totalstringbing" name="totalstringbing" /></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</fieldset>
						</td>						
					</tr>
				</table>
        </div>
        <!-- HYDRAULICS -->
        <div class="simpleTabsContent" id="hydraulics">
        	<?php $this->load->view('hydraulics'); ?>
        </div>   
	</div>
</div>
<?php // <div id="name_list"></div> ?>