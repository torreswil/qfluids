<?php $reporte = $this->session->userdata('report'); ?>

<div class="row">
        <table class="table table-stripted table-condensed b-bottom table-fixed">
                <tr class="">
                        <td class="span2 txt-center b-right-2 b-bottom-2">
                                <img width="80" src="/img/qmax_logo.png">
                        </td>
                        <td class="span5 txt-center-all b-right-2 b-bottom-2">
                                <h3>DAILY DRILLING FLUIDS REPORT N. <?= $reporte['number']; ?></h3>
                        </td>
                        <td class="span3 txt-center b-right-2 b-bottom-2">
                                <img width="80" src="/img/qmax_logo.png">
                        </td>
                        <td class="txt-center-all b-bottom-2" style="width: 100px;">
                                Fo IF 002 V-01 <br />
                                1 de 1                                        
                        </td>
                </tr>
        </table>
        
        <table class="table table-stripted table-condensed b-bottom table-fixed">
                <tr class="">
                        <td style="width: 6.5%"><span class="strong">Date:</span></td>
                        <td style="width: 6.5%"><?= date("d-M-y", strtotime($reporte['date'])); ?></td>
                        
                        <td style="width: 4%"><span class="strong">WELL: </td>
                        <td style="width: 15.875%"><?= $project['well_name']; ?></td>
                        
                        <td style="width: 6.5%"><span class="strong">DEPTH MD:</span> </td>
                        <td style="width: 15.875%"><?= $reporte['depth_md']; ?></td>
                        
                        <td style="width: 7%"><span class="strong">ACTIVITY:</span> </td>
                        <td style="width: 15.875%"><?= $reporte['activity']; ?></td>
                        
                        <td style="width: 6%"><span class="strong">RIG:</span> </td>
                        <td style="width: 15.875%"><?= $project['rig']; ?></td>
                </tr>
                <tr class="">
                        <td><span class="strong">Spud date:</td>
                        <td><?= date("d-M-y", strtotime($project['spud_date'])); ?></td>
                        
                        <td><span class="strong">FIELD:</span> </td>
                        <td style="width: 15.875%"><?= $project['field']; ?></td>
                        
                        <td><span class="strong">BIT DEPTH:</span> </td>
                        <td style="width: 15.875%"><?= $reporte['bit_depth']; ?></td>                        
                        
                        <td><span class="strong">FORMATION:</span> </td>
                        <td style="width: 15.875%"><?= $reporte['formation']; ?></td>
                        
                        <td><span class="strong">PUSHER:</span> </td>
                        <td style="width: 15.875%" class="txt-overflow"> CARLOS DUARTE MELENDEZ SANCHEZ IVAN DAVID CARLOS DUARTE MELENDEZ SANCHEZ IVAN DAVID CARLOS DUARTE MELENDEZ SANCHEZ IVAN DAVID</td>
                </tr>
        </table>
        
        <div class="container-fluid">
                
                <div class="data-table-container" style="float:left; width: 25%">
                        <div class="data-table b-right" style="width: 100%">  
                                <div class="sub-header b-bottom"><h5>DRILL STRING # <?= empty($reporte['bha']) ? '' : $reporte['bha']; ?></h5></div>
                                <table class="table table-stripted table-condensed">
                                        <thead>
                                                <tr class="txt-center">
                                                        <th class="span4">TOOLS</th>
                                                        <th class="span2">OD</th>
                                                        <th class="span2">ID</th>
                                                        <th class="span2">LENGTH</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php $total = count($drill_string); ?>                                                
                                                <?php $counter = 0; ?>
                                                <?php $total_length = 0; ?>
                                                <?php foreach($drill_string as $fila) : ?>
                                                <tr>
                                                        <td><?= str_replace('_', ' ', strtoupper($fila['bha_name'])); ?></td>
                                                        <td><?= (empty($fila['oddeci'])) ? '&nbsp;' : number_format($fila['oddeci'], 2, ',', ''); ?></td>
                                                        <td><?= (empty($fila['iddeci'])) ? '' : number_format($fila['iddeci'], 2, ',', ''); ?></td>
                                                        <td class="txt-right"><?= (empty($fila['length'])) ? '' : number_format($fila['length'], 2, ',', ''); ?></td>
                                                        <?php $counter++; ?>
                                                        <?php $total_length = $total_length + $fila['length']; ?>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php $counter++; ?>                                                
                                                <?php while($counter <= 9) { ?>
                                                <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>                                                
                                                        <td>&nbsp;</td>  
                                                        <?php $counter++; ?>
                                                </tr>
                                                <?php } ?>                                               
                                        </tbody>
                                        <tfoot>
                                                <tr>
                                                        <th colspan="3" class="txt-right">TOTAL BHA</th>
                                                        <th class="txt-right"><?= empty($reporte['bha_length']) ? '' : number_format($reporte['bha_length'], 2, ',',''); ?></th>
                                                </tr>
                                                <tr>
                                                        <th colspan="3" class="txt-right">TOTAL STRING</th>
                                                        <th class="txt-right"><?= number_format($total_length, 2, ',', ''); ?></th>
                                                </tr>
                                        </tfoot>
                                </table>
                        </div>
                </div>
                
                <div class="data-table-container" style="float:left; width: 75%">
                        <div class="container-fluid">
                                
                                <!-- CASING -->
                                
                                <div class="data-table b-right" style="width: 18%; margin-left: 1px">  
                                        <div class="sub-header b-bottom"><h5>CASING</h5></div>
                                        <table class="table table-stripted table-condensed">
                                                <thead>
                                                        <tr class="">                                        
                                                                <th class="txt-center" style="width: 33%;">OD</th>
                                                                <th class="txt-center" style="width: 33%;">ID</th>
                                                                <th class="txt-center" style="width: 33%;">LENGTH</th>
                                                        </tr>
                                                </thead>
                                                <tbody>    
                                                        <?php $total = count($casing); ?>
                                                        <?php $counter = 0; ?>
                                                        <?php foreach($casing as $fila) : ?>
                                                        <tr>
                                                                <td class="txt-center"><?= $fila['odfrac']; ?></td>
                                                                <td class="txt-center"><?= number_format($fila['iddeci'], 3, ',', ''); ?></td>
                                                                <td><?= $fila['length']; ?></td>                                                
                                                                <?php $counter++; ?>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <?php $counter++; ?>
                                                        <?php while($counter <= 7) { ?>
                                                        <tr>
                                                                <td class="txt-center">&nbsp;</td>
                                                                <td class="txt-center">&nbsp;</td>
                                                                <td>&nbsp;</td>                                                
                                                                <?php $counter++; ?>
                                                        </tr>
                                                        <?php } ?>                                                       
                                                </tbody>                                
                                        </table>
                                </div>
                                
                                <!-- MUD PUMPS -->
                                
                                <div class="data-table b-right" style="width: 32%">
                                        <div class="sub-header b-bottom"><h5>MUD PUMPS</h5></div>
                                        <table class="table table-stripted table-condensed">
                                                <tbody>
                                                        <tr>
                                                                <td class="txt-left span3">MAKER</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['maker']) ? '&nbsp;' : $mud_pumps[0]['maker']; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['maker']) ? '&nbsp;' : $mud_pumps[1]['maker']; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['maker']) ? '&nbsp;' : $mud_pumps[2]['maker']; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">MODEL</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['modelo']) ? '&nbsp;' : $mud_pumps[0]['modelo']; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['modelo']) ? '&nbsp;' : $mud_pumps[1]['modelo']; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['modelo']) ? '&nbsp;' : $mud_pumps[2]['modelo']; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">Diam./stk:</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['maker']) ? '&nbsp;' : str_replace('"','',$mud_pumps[0]['linerdiameter_frac'].'" X '.$mud_pumps[0]['strokefrac'].'"'); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['maker']) ? '&nbsp;' : str_replace('"','',$mud_pumps[0]['linerdiameter_frac'].'" X '.$mud_pumps[0]['strokefrac'].'"'); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['maker']) ? '&nbsp;' : str_replace('"','',$mud_pumps[0]['linerdiameter_frac'].'" X '.$mud_pumps[0]['strokefrac'].'"'); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">Eff (%)</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['efficiency']) ? '&nbsp;' : number_format($mud_pumps[0]['efficiency'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['efficiency']) ? '' : number_format($mud_pumps[1]['efficiency'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['efficiency']) ? '' : number_format($mud_pumps[2]['efficiency'],2,",",''); ?></td>
                                                        </tr>                                        
                                                        <tr>
                                                                <td class="txt-left span3">Gal/Stk:</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['gal']) ? '&nbsp;' : number_format($mud_pumps[0]['gal'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['gal']) ? '&nbsp;' : number_format($mud_pumps[1]['gal'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['gal']) ? '&nbsp;' : number_format($mud_pumps[2]['gal'],2,",",''); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">SPM:</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['spm']) ? '&nbsp;' : number_format($mud_pumps[0]['spm'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['spm']) ? '&nbsp;' : number_format($mud_pumps[1]['spm'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['spm']) ? '&nbsp;' : number_format($mud_pumps[2]['spm'],2,",",''); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">GPM</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['gpm']) ? '&nbsp;' : number_format($mud_pumps[0]['gpm'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['gpm']) ? '&nbsp;' : number_format($mud_pumps[1]['gpm'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['gpm']) ? '&nbsp;' : number_format($mud_pumps[2]['gpm'],2,",",''); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td colspan="2" class="txt-left span5">SSP, psi: <?= empty($drilling_parameters[2]['value']) ? '' : $drilling_parameters[2]['value']; ?></td>
                                                                <td colspan="2" class="txt-left span7">T. GPM: <?= number_format(0 + (empty($mud_pumps[0]['gpm']) ? 0 : $mud_pumps[0]['gpm']) + (empty($mud_pumps[1]['gpm']) ? 0 : $mud_pumps[1]['gpm']) + (empty($mud_pumps[2]['gpm']) ? 0 : $mud_pumps[2]['gpm']),2,",",''); ?></td> 
                                                        </tr>                                        
                                                </tbody> 
                                        </table>
                                </div>
                                
                                <!-- HIDRAULYCS -->
                                
                                <div class="data-table" style="width: 49.4%;">
                                        <div class="sub-header b-bottom"><h5>HYDRAULICS</h5></div>                                        
                                        <div class="data-table" style="width: 60%">
                                                <table class="table table-stripted table-condensed b-bottom">
                                                        <thead>
                                                                <tr class="txt-center">                                        
                                                                        <th style="width: 28%">VEL.(ft/s)</th>
                                                                        <th style="width: 24%">Annular</th>
                                                                        <th style="width: 24%">Critical</th>
                                                                        <th style="width: 24%">Qc (gpm)</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td class="txt-left">Casing/DP:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['casing1']) ? '&nbsp;' : number_format($velocity[0]['casing1'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['casing2']) ? '&nbsp;' : number_format($velocity[0]['casing2'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['casing3']) ? '&nbsp;' : number_format($velocity[0]['casing3'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">DP/OH:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dp1']) ? '&nbsp;' : number_format($velocity[0]['dp1'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dp2']) ? '&nbsp;' : number_format($velocity[0]['dp2'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dp3']) ? '&nbsp;' : number_format($velocity[0]['dp3'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">DP/OH:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc11']) ? '&nbsp;' : number_format($velocity[0]['dc11'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc12']) ? '&nbsp;' : number_format($velocity[0]['dc12'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc13']) ? '&nbsp;' : number_format($velocity[0]['dc13'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">DP/OH:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc21']) ? '&nbsp;' : number_format($velocity[0]['dc21'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc22']) ? '&nbsp;' : number_format($velocity[0]['dc22'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc23']) ? '&nbsp;' : number_format($velocity[0]['dc23'], 2, ',', ''); ?></td>
                                                                </tr>                                                
                                                        </tbody>                                         
                                                </table>
                                                <table class="table table-stripted table-condensed">
                                                        <tbody>
                                                                <tr>
                                                                        <td class="txt-left" style="width: 28%;">Bouyancy:</td>
                                                                        <td class="txt-center" style="width: 24%;"><?= empty($velocity[0]['bouyancy']) ? '&nbsp;' : number_format($velocity[0]['bouyancy'], 3, ',', ''); ?></td>
                                                                        <td class="txt-center" style="width: 24%;">&nbsp;</td>
                                                                        <td class="txt-center" style="width: 24%;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">ECD (ppg):</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['ecd']) ? '&nbsp;' : number_format($velocity[0]['ecd'], 3, ',', ''); ?></td>
                                                                        <td class="txt-center" style="width: 24%;">&nbsp;</td>
                                                                        <td class="txt-center" style="width: 24%;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">W/out:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['w_out']) ? '&nbsp;' : number_format($velocity[0]['w_out'], 3, ',', ''); ?></td>
                                                                        <td class="txt-center" style="width: 24%;">&nbsp;</td>
                                                                        <td class="txt-center" style="width: 24%;">&nbsp;</td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                        </div>
                                        <div class="data-table b-left" style="width: 39.7%">
                                                <table class="table table-stripted table-condensed b-bottom">
                                                        <thead>
                                                                <tr>                                        
                                                                        <th colspan="2" class="txt-center">CIRCULATION</th>
                                                                </tr>                                                
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td>Bttms/Up:</td>
                                                                        <td class="txt-right" style="width: 50%;">&nbsp;</td><!-- REVISAR -->
                                                                </tr>
                                                                <tr>
                                                                        <td>Surf/Bit:</td>
                                                                        <td class="txt-right">&nbsp;</td><!-- REVISAR -->
                                                                </tr>
                                                                <tr>
                                                                        <td>total Circ:</td>
                                                                        <td class="txt-right">&nbsp;</td><!-- REVISAR -->
                                                                </tr>                                                
                                                        </tbody>
                                                </table>
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>                                        
                                                                        <th colspan="2" class="txt-center">VOLUMEN</th>
                                                                </tr>                                                
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td>Annular:</td>
                                                                        <td class="txt-right" style="width: 50%;">&nbsp;</td><!-- REVISAR -->
                                                                </tr>
                                                                <tr>
                                                                        <td>Hole empty:</td>
                                                                        <td class="txt-right">&nbsp;</td><!-- REVISAR -->
                                                                </tr>
                                                                <tr>
                                                                        <td>Hole W/String:</td>
                                                                        <td class="txt-right">&nbsp;</td><!-- REVISAR -->
                                                                </tr>                                                
                                                        </tbody>
                                                </table>
                                        </div>                                         
                                </div>
                                
                        </div>
                        
                        
                        <div class="container-fluid">
                                <div class="data-table b-right b-left" style="width: 50.15%;">
                                        <div class="sub-header b-bottom  b-top"><h5>BIT #: <?= empty($bit[0]['bit_number']) ? '' : $bit[0]['bit_number']; ?></h5></div>
                                        <table class="table table-stripted table-condensed">                                               
                                                <tbody>
                                                        <tr>
                                                                <td class="strong span2">DIAMETER:</td>
                                                                <td class="span2"><?= empty($bit[0]['odfracc']) ? '&nbsp;' : $bit[0]['odfracc']; ?></td>
                                                                <td class="strong span2">TFA:</td>
                                                                <td class="span2"><?= empty($bit[0]['tfa']) ? '&nbsp;' : number_format($bit[0]['tfa'], 3, ',', ''); ?></td>
                                                                <td class="strong span2">JETS VEL:</td>
                                                                <td class="span2"><?= empty($bit[0]['vel_jets']) ? '&nbsp;' : number_format($bit[0]['vel_jets'], 3, ',', ''); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="strong span2">TYPE:</td>
                                                                <td class="span2"><?= empty($bit[0]['nombre_broca']) ? '&nbsp;' : $bit[0]['nombre_broca']; ?></td>
                                                                <td class="strong span2">JETS:</td>
                                                                <td class="span2"><?= empty($bit[0]['result_jets']) ? '&nbsp;' : $bit[0]['result_jets']; ?></td>
                                                                <td class="strong span2">HHP (HP):</td>
                                                                <td class="span2"><?= empty($bit[0]['hhp']) ? '&nbsp;' : number_format($bit[0]['hhp'], 3, ',', ''); ?></td>                                                                   
                                                        </tr>
                                                        <tr>
                                                                <td class="strong span2">MODEL:</td>
                                                                <td colspan="3" class="span6"><?= empty($bit[0]['nombre_modelo']) ? '' : $bit[0]['nombre_modelo']; ?></td>
                                                                <td class="strong span2">HSI (HP/in2):</td>
                                                                <td class="span2"><?= empty($bit[0]['hsi']) ? '&nbsp;' : number_format($bit[0]['hsi'], 3, ',', ''); ?></td>                                                                   
                                                        </tr>
                                                </tbody>                                
                                        </table>
                                </div>
                                <div class="data-table" style="width: 49.5%">
                                        <div class="sub-header b-bottom b-top"><h5>VOLUME RESUM IN BBL</h5></div>
                                        <table class="table table-stripted table-condensed">
                                                <tbody>
                                                        <tr>
                                                                <td class="strong span3">Active pits:</td>
                                                                <td class="span3">&nbsp;</td>
                                                                <td class="strong span3">Total circulate:</td>
                                                                <td class="span3">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                                <td class="strong span3">Pill:</td>
                                                                <td class="span3">&nbsp;</td>
                                                                <td class="strong span3">Total Reserve:</td>
                                                                <td class="span3">&nbsp;</td>                                                                
                                                        </tr>
                                                        <tr>
                                                                <td class="strong span3">Trip tank:</td>
                                                                <td class="span3">&nbsp;</td>
                                                                <td class="strong span3">Total mud:</td>
                                                                <td class="span3">&nbsp;</td>                                                                
                                                        </tr>
                                                </tbody> 
                                        </table>
                                </div>
                        </div>
                </div>                
        </div> 
        
        <div class="container-fluid">
                
                <div class="data-table-container" style="float:left; width: 45%">
                        
                        <!-- MUD PROPERTIES -->
                        
                        <div class="data-table b-right" style="width: 35%">
                                <div class="sub-header b-bottom b-top"><h5>MUD PROPERTIES</h5></div>
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <tr>
                                                        <td class="span6">Time Sample</td>
                                                        <td class="span5 txt-right">hr.</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Depth</td>
                                                        <td class="span5 txt-right">ft.</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Pit/flowline</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Flowline Temp.</td>
                                                        <td class="span5 txt-right">°F</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Mud Weight,</td>
                                                        <td class="span5 txt-right">ppg</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Funnel Visc.</td>
                                                        <td class="span5 txt-right">Sec/qt</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">PV @120  F</td>
                                                        <td class="span5 txt-right">cp</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">YP @120  F</td>
                                                        <td class="span5 txt-right">lbf/100 ft2</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">YS @120  F</td>
                                                        <td class="span5 txt-right">lbf/100 ft2</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Gels:</td>
                                                        <td class="span5 txt-right">lbf/100 ft2</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">600/300</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">200/100</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">6/3</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">pH Meter</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Pm</td>
                                                        <td class="span5 txt-right">ml H2SO4</td>
                                                </tr>                                                
                                                <tr>
                                                        <td class="span6">pf/mf</td>
                                                        <td class="span5 txt-right">ml H2SO4</td>
                                                </tr>                                                
                                                <tr>
                                                        <td colspan="2" class="span12">API FL/Cake ml/30 min. 32nd</td>                                                        
                                                </tr>                                                
                                                <tr>
                                                        <td class="span6">Sand</td>
                                                        <td class="span5 txt-right">% Vol.</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">M.B.T.</td>
                                                        <td class="span5 txt-right">lb/bbl eq.</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Chlorides</td>
                                                        <td class="span5 txt-right">mg/lt</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Ca++</td>
                                                        <td class="span5 txt-right">mg/lt</td>
                                                </tr>                                                                                                        
                                                <tr>
                                                        <td class="b-top span6">Water / Oil</td>
                                                        <td class="b-top span5 txt-right">% Vol.</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Sol./Sol. Corr. Salt</td>
                                                        <td class="span5 txt-right">%</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">ASG Solids</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">LGS / HGS</td>
                                                        <td class="span5 txt-right">ppb</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">LGS / HGS</td>
                                                        <td class="span5 txt-right">% Vol.</td>
                                                </tr>                                                                                         
                                                <tr>
                                                        <td class="b-top span6">Lubricant</td>
                                                        <td class="b-top span5 txt-right">% Vol.</td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">Inhibitor</td>
                                                        <td class="span5 txt-right">gpb</td>
                                                </tr>
                                                <?php $counter = 0; ?>
                                                <?php foreach($pacp as $fila): ?>  
                                                        <?php if($fila['custom']==1) { ?>
                                                                <?php $counter++; ?>
                                                                <tr>
                                                                        <td class="span6"><?= ucfirst($fila['test']);?></td>
                                                                        <td class="span5 txt-right"><?= $fila['unit_test'];?></td>
                                                                </tr>                                                                 
                                                                <?php if($counter==5) { break; } ?>                                                        
                                                        <?php } ?>
                                                <?php endforeach; ?>
                                                <?php $counter++; ?>
                                                <?php while($counter <= 5) { ?>
                                                        <tr>
                                                                <td class="span6">&nbsp;</td>
                                                                <td class="span5 txt-right">&nbsp;</td>
                                                        </tr>                                                                 
                                                        <?php $counter++; ?>
                                                <?php } ?>
                                                <tr>
                                                        <td class="span6">n</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">k</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span6">C.C.I</td>
                                                        <td class="span5 txt-right"></td>
                                                </tr>
                                        </tbody> 
                                </table>
                        </div>
                        
                        <!-- MUD TYPE -->
                        
                        <div class="data-table b-right" style="width: 64.5%">
                                <div class="sub-header b-bottom b-top"><h5>MUD TYPE: <?= $reporte['mud_type']; ?></h5></div>
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <tr>
                                                        <td class="span3 strong">PROGRAM</td>
                                                        <td class="span3 txt-center"><?= (empty($mud_properties_hour[0]['hour'])) ? '&nbsp' : date("H:i", strtotime($mud_properties_hour[0]['hour'])); ?></td>
                                                        <td class="span3 txt-center"><?= (empty($mud_properties_hour[1]['hour'])) ? '&nbsp' : date("H:i", strtotime($mud_properties_hour[1]['hour'])); ?></td>
                                                        <td class="span3 txt-center"><?= (empty($mud_properties_hour[2]['hour'])) ? '&nbsp' : date("H:i", strtotime($mud_properties_hour[2]['hour'])); ?></td>
                                                </tr>                                                
                                                
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[0]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[0]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[1]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[1]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : strtoupper($rs[0]['value']); ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : strtoupper($rs[1]['value']); ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : strtoupper($rs[2]['value']); ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[2]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[2]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>		
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[3]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[3]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[4]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[4]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[24]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[24]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[25]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[25]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs[0]['value'])) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs[1]['value'])) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs[2]['value'])) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[26]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[26]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[21]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[21]['id'])); ?>
                                                <?php $rs2 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[22]['id'])); ?>
                                                <?php $rs3 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[23]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[0]['value']) && empty($rs2[0]['value']) && empty($rs3[0]['value']) ) ? '&nbsp' : $rs1[0]['value'].'/'.$rs2[0]['value'].'/'.$rs3[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[1]['value']) && empty($rs2[1]['value']) && empty($rs3[1]['value']) ) ? '&nbsp' : $rs1[1]['value'].'/'.$rs2[1]['value'].'/'.$rs3[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[2]['value']) && empty($rs2[2]['value']) && empty($rs3[2]['value']) ) ? '&nbsp' : $rs1[2]['value'].'/'.$rs2[2]['value'].'/'.$rs3[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[15]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[15]['id'])); ?>
                                                <?php $rs2 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[16]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[0]['value']) && empty($rs2[0]['value']) ) ? '&nbsp' : $rs1[0]['value'].'/'.$rs2[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[1]['value']) && empty($rs2[1]['value']) ) ? '&nbsp' : $rs1[1]['value'].'/'.$rs2[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[2]['value']) && empty($rs2[2]['value']) ) ? '&nbsp' : $rs1[2]['value'].'/'.$rs2[2]['value']; ?></td>
                                                </tr>                                                
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[16]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[17]['id'])); ?>
                                                <?php $rs2 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[18]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[0]['value']) && empty($rs2[0]['value']) ) ? '&nbsp' : $rs1[0]['value'].'/'.$rs2[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[1]['value']) && empty($rs2[1]['value']) ) ? '&nbsp' : $rs1[1]['value'].'/'.$rs2[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[2]['value']) && empty($rs2[2]['value']) ) ? '&nbsp' : $rs1[2]['value'].'/'.$rs2[2]['value']; ?></td>
                                                </tr>                                                
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[19]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[19]['id'])); ?>
                                                <?php $rs2 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[20]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[0]['value']) && empty($rs2[0]['value']) ) ? '&nbsp' : $rs1[0]['value'].'/'.$rs2[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[1]['value']) && empty($rs2[1]['value']) ) ? '&nbsp' : $rs1[1]['value'].'/'.$rs2[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[2]['value']) && empty($rs2[2]['value']) ) ? '&nbsp' : $rs1[2]['value'].'/'.$rs2[2]['value']; ?></td>
                                                </tr>                                                                                                
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[9]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[9]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[10]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[10]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[11]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[11]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[5]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[5]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[6]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[6]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[12]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[12]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[13]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[13]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[14]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[14]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[30]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[30]['id'])); ?>
                                                <?php $rs2 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[31]['id'])); ?>
                                                <tr class="">
                                                        <td class="b-top span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="b-top span3 txt-center"><?= (empty($rs1[0]['value']) && empty($rs2[0]['value']) ) ? '&nbsp' : $rs1[0]['value'].'/'.$rs2[0]['value']; ?></td>
                                                        <td class="b-top span3 txt-center"><?= (empty($rs1[1]['value']) && empty($rs2[1]['value']) ) ? '&nbsp' : $rs1[1]['value'].'/'.$rs2[1]['value']; ?></td>
                                                        <td class="b-top span3 txt-center"><?= (empty($rs1[2]['value']) && empty($rs2[2]['value']) ) ? '&nbsp' : $rs1[2]['value'].'/'.$rs2[2]['value']; ?></td>
                                                </tr> 
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[32]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[32]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[33]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[33]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[34]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[34]['id'])); ?>
                                                <?php $rs2 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[35]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[0]['value']) && empty($rs2[0]['value']) ) ? '&nbsp' : $rs1[0]['value'].'/'.$rs2[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[1]['value']) && empty($rs2[1]['value']) ) ? '&nbsp' : $rs1[1]['value'].'/'.$rs2[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[2]['value']) && empty($rs2[2]['value']) ) ? '&nbsp' : $rs1[2]['value'].'/'.$rs2[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[36]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[36]['id'])); ?>
                                                <?php $rs2 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[37]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[0]['value']) && empty($rs2[0]['value']) ) ? '&nbsp' : $rs1[0]['value'].'/'.$rs2[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[1]['value']) && empty($rs2[1]['value']) ) ? '&nbsp' : $rs1[1]['value'].'/'.$rs2[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[2]['value']) && empty($rs2[2]['value']) ) ? '&nbsp' : $rs1[2]['value'].'/'.$rs2[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[7]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[7]['id'])); ?>
                                                <tr>
                                                        <td class="b-top span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="b-top span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="b-top span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="b-top span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[8]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[8]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $counter = 0; ?>                                                
                                                <?php foreach($pacp as $fila): ?>  
                                                        <?php if($fila['custom']==1) { ?>
                                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$fila['id'], 'phase'=>$project['current_phase'])); ?>
                                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$fila['id'])); ?>
                                                                <?php $counter++; ?>
                                                                <tr>
                                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                                </tr>                                                                 
                                                                <?php if($counter==5) { break; } ?>                                                        
                                                        <?php } ?>
                                                <?php endforeach; ?>
                                                <?php $counter++; ?>
                                                <?php while($counter <= 5) { ?>
                                                        <tr>
                                                                <td class="span3 txt-center">&nbsp;</td>
                                                                <td class="span3 txt-center">&nbsp;</td>
                                                                <td class="span3 txt-center">&nbsp;</td>
                                                                <td class="span3 txt-center">&nbsp;</td>
                                                        </tr>                                                                 
                                                        <?php $counter++; ?>
                                                <?php } ?>
                                                
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[27]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[27]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[28]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[28]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[29]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[29]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
                                                </tr>
                                        </tbody> 
                                </table>                                                        
                        </div>
                        
                        
                        
                        
                </div>
                
                <div class="data-table-container" style="float:left; width: 55%;margin-left: -1px">
                        <div class="data-table" style="width: 100%;">
                                <div class="sub-header b-bottom b-top b-left"><h5>VOLUME BALANCE IN BBL</h5></div>
                                <table class="table table-stripted table-condensed">
                                        <thead>
                                                <tr class="">
                                                        <th class="txt-left b-point-right" style="width: 20%">VOLUME</th>
                                                        <th class="txt-center b-point-right" style="width: 14%">ACTIVE</th>
                                                        <th class="txt-center b-point-right" style="width: 14%">RESERVE</th>
                                                        <th colspan="4" class="txt-center"  style="width: 52%; border-bottom: 0px;">LOSSES ANALYSIS</th>
                                                </tr>
                                        </thead>
                                        
                                        <tbody>
                                                <tr class="">
                                                        <td class="b-point-top b-point-right">Starting Vol</td>
                                                        <td class="b-point-top b-point-right txt-center">&nbsp;</td>
                                                        <td class="b-point-top b-point-right txt-center">&nbsp;</td>
                                                        <td class="b-point-top b-point-right" style="width: 17%">Sub/surface</td>
                                                        <td class="b-point-top b-point-right txt-center" style="width: 8%;">&nbsp;</td>
                                                        <td class="b-point-top b-point-right" style="width: 17%">Daily Surf. Losses</td>
                                                        <td class="b-point-top txt-center" style="width: 8%">&nbsp;</td>                                                        
                                                </tr>                                                                                                                                               
                                                <tr class="">
                                                        <td class="b-point-top b-point-right">Received Mud</td>
                                                        <td class="b-point-top b-point-right txt-center"></td>
                                                        <td class="b-point-top b-point-right txt-center"></td>
                                                        <td class="b-point-top b-point-right">Surface</td>
                                                        <td class="b-point-top b-point-right txt-center"></td>
                                                        <td class="b-point-top b-point-right">Cum. surf. losses</td>
                                                        <td class="b-point-top txt-center"></td>                                                        
                                                </tr>
                                                <tr class="">
                                                        <td class="b-point-top b-point-right">Chemicals</td>
                                                        <td class="b-point-top b-point-right txt-center"></td>
                                                        <td class="b-point-top b-point-right txt-center"></td>
                                                        <td class="b-point-top b-point-right">Cavingsr</td>
                                                        <td class="b-point-top b-point-right txt-center"></td>
                                                        <td class="b-point-top b-point-right">Daily S/Surf.losses</td>
                                                        <td class="b-point-top txt-center"></td>                                                        
                                                </tr>				
                                                <tr class="">
                                                       <td class="b-point-top b-point-right ">Water</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right ">Shakers</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right ">Cum. S/Surf. losses</td>
                                                       <td class="b-point-top txt-center"></td>                                                        
                                                </tr>
                                                <tr class="">
                                                       <td class="b-point-top b-point-right ">Builded mud</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right ">Centrifugues</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top" style="border-right: 0px !important">&nbsp;</td>
                                                       <td class="b-point-top txt-center" style="border-left: 0px !important">&nbsp;</td>
                                                </tr>
                                                <tr class="">
                                                       <td class="b-point-top b-point-right ">Transferred Mud</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right ">Dewatering</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top strong" style="border-right: 0px !important">BY EVAPORATED</td>
                                                       <td class="b-point-top txt-center strong" style="border-left: 0px !important">bbl/day</td>                                                        
                                                </tr>                                                				
                                                <tr class="">
                                                       <td class="b-point-top b-point-right ">Total losses</td>
                                                       <td class="b-point-top b-point-right txt-center strong"></td>
                                                       <td class="b-point-top b-point-right txt-center strong"></td>
                                                       <td class="b-point-top b-point-right ">Behind Casing</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right ">Water Evaporated</td>
                                                       <td class="b-point-top txt-center"></td>                                                        
                                                </tr>
                                                <tr class="">
                                                       <td class="b-point-top b-point-right strong">FINAL VOLUME</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right ">Others</td>
                                                       <td class="b-point-top b-point-right txt-center"></td>
                                                       <td class="b-point-top b-point-right ">Water added by Evp</td>
                                                       <td class="b-point-top txt-center"></td>                                                        
                                                </tr>
																			
                                                <tr class="">
                                                       <td class="b-point-top b-point-right strong b-top b-point-right" >Section mud made:</td>
                                                       <td class="b-point-top b-point-right txt-center b-top b-point-right">&nbsp</td>
                                                       <td class="b-point-top b-point-right txt-center b-top b-point-right">&nbsp</td>
                                                       <td class="b-point-top b-point-right strong b-top b-point-right">Cum. Mud made</td>
                                                       <td class="b-point-top b-point-right txt-center b-top b-right">&nbsp</td>
                                                       <td class="b-point-top b-point-right ">&nbsp</td>
                                                       <td class="b-point-top txt-center">&nbsp</td>                                                        
                                                </tr>                                                
                                        </tbody> 
                                </table>
                                
                                <!-- DAILY CONSUMPTIONS AND COSTS -->
                                
                                <div class="sub-header b-bottom b-top b-left"><h5>DAILY CONSUMPTIONS AND COSTS</h5></div>
                                <table class="table table-stripted table-condensed">                                        
                                        <thead>
                                                <tr class="">
                                                        <th class="span4 b-point-right">MATERIAL</th>
                                                        <th class="span1 txt-center b-point-right">Size</th>
                                                        <th class="span1 txt-center b-point-right">U. Cost</th>
                                                        <th class="span1 txt-center b-point-right">Initial</th>
                                                        <th class="span1 txt-center b-point-right">Recv</th>
                                                        <th class="span1 txt-center b-point-right">Transf</th>
                                                        <th class="span1 txt-center b-point-right">Used</th>
                                                        <th class="span1 txt-center b-point-right">Stock</th>
                                                        <th class="span1 txt-center">T. Cost</th>
                                                </tr>
                                        </thead>
                                        <tbody>  
                                                <?php $counter = 1; ?>
                                                <?php while($counter <= 21) { ?>                                                
                                                <tr class="">
                                                        <td class="b-point-top b-point-right">&nbsp;</td>
                                                        <td class="txt-right b-point-top b-point-right">&nbsp;</td>
                                                        <td class="txt-right b-point-top b-point-right">&nbsp;</td>
                                                        <td class="txt-right b-point-top b-point-right">&nbsp;</td>
                                                        <td class="txt-right b-point-top b-point-right">&nbsp;</td>
                                                        <td class="txt-right b-point-top b-point-right">&nbsp;</td>
                                                        <td class="txt-right b-point-top b-point-right">&nbsp;</td>
                                                        <td class="txt-right b-point-top b-point-right">&nbsp;</td>
                                                        <td class="txt-right b-point-top" style="border-right: 0px !important;"></td>
                                                </tr>                                                                          
                                                <?php $counter++; ?>
                                                <?php } ?>                                                                                                
                                                <tr class="">
                                                        <td class="b-point-top b-point-right">&nbsp;</td>
                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                        <td class="b-point-top txt-right">&nbsp</td>
                                                </tr>
                                        </tbody> 
                                </table>
                                
                                <div class="b-top" style="width: 100%;"></div>
                                <table class="table b-left table-stripted table-condensed">                                                                                
                                        <tbody>                                                  
                                                <tr>
                                                        <td class="" style="width: 39.1%">Daily Engineering Cost US$:</td>
                                                        <td class="b-point-right" style="width: 10.9%">88,00</td>                                                        
                                                        <td class="span4 b-point-bottom strong" style="width: 39.1%">&nbsp;Daily Mud Cost US$:</td>
                                                        <td class="b-point-bottom" style="width: 10.9%">88,00</td>
                                                </tr>
                                                <tr>
                                                        <td class="span4 b-point-top">Daily Operator Cost US$:</td>
                                                        <td class="span2 b-point-top b-point-right">&nbsp;</td>
                                                        <td class="span5 b-point-top strong">&nbsp;Cum. Mud Cost US$:</td> 
                                                        <td class="span2 b-point-top">&nbsp;</td>
                                                </tr>
                                        </tbody> 
                                </table>                               
                        </div>
                </div>
        </div>
        
        <div class="container-fluid">
                                
                <div class="data-table-container" style="float:left; width: 44.9%">
                        
                        <!-- COMMENTS -->
                        
                        <div class="data-table b-right" style="width: 100%;">
                                <div class="sub-header b-bottom b-top"><h5>COMMENTS</h5></div>
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <tr>
                                                        <td style="height: 458px">
                                                                <p class="txt-justify">
                                                                        RIG ACTIVITY: Se recibio taladro sinopec 166, y se inicio operaciones de perforacion a las XXXX.
                                                                </p>
                                                        </td>
                                                </tr>
                                        </tbody>
                                </table>
                                
                                <div class="b-top"></div>
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <tr>
                                                        <td class="span2 strong">CHARLA HSE:</td>
                                                        <td class="span10"></td>
                                                </tr>
                                        </tbody>
                                </table>                                                               
                        </div>
                        
                </div>
                
                <div class="data-table-container" style="float:left; width: 55%;margin-left: 1px">
                        <div class="data-table" style="width: 100%;">
                                <!--<div class="b-top"></div>-->
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <tr>
                                                        <td class="" style="width: 39%">Daily Patio Handsc Cost US$:</td>
                                                        <td class="b-point-right" style="width: 11%">88,00</td>
                                                        <td class="b-point-bottom" style="width: 39%">&nbsp;Cost / ft (USD) Daily:</td>
                                                        <td class="b-point-bottom" style="width: 11%">88,00</td>
                                                </tr>
                                                <tr>
                                                        <td class="span4 b-point-top strong">Cum. Personnel Cost US$:</td>
                                                        <td class="b-point-top b-point-right" style="width: 11%">&nbsp;</td>
                                                        <td class="span5 b-point-top strong">&nbsp;Dilution, Bbl/ft Daily:</td> 
                                                        <td class="b-point-top" style="width: 11%">88,00</td>
                                                </tr>                                                
                                        </tbody>
                                </table>                                                                
                                
                                <div class="b-top"></div>
                                
                                <div class="container-fluid">
                                        <div class="data-table-container b-right" style="float:left; width: 65%;">
                                                <div class="sub-header b-bottom"><h5>PRODUCT CONCENTRATIONS, PPB / GPB</h5></div>
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="span7 txt-center-all" rowspan="2">MATERIAL</th>
                                                                        <th class="span5 txt-center b-point-left" colspan="2">CONCENTRATION</th>
                                                                </tr>
                                                                <tr>                                                                            
                                                                        <th class="span2 txt-center b-point-top b-point-left b-point-right">Program</th>
                                                                        <th class="span2 txt-center b-point-top b-point-left">Current.</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top b-point-right">&nbsp</td>
                                                                        <td class="txt-center b-point-top">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td colspan="3" class="b-point-top">*0,42 gpb = 1% Vol</td><!--*0,42 gpb = 1% Vol-->                                                                        
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <div class="sub-header b-top b-bottom"><h5>CONTROL EQUIPMENT</h5></div>
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="span2 txt-center b-point-right">SHAKER</th>
                                                                        <th class="span5 txt-center b-point-right" colspan="5">Screens "mesh - API"</th>
                                                                        <th class="span1 txt-center b-point-right">Hours</th>
                                                                </tr>                                                                
                                                        </thead>
                                                        <tbody>
                                                                <?php $total = count($shakers); ?>
                                                                <?php $counter = 0; ?>
                                                                <?php foreach($shakers as $fila) : ?>
                                                                <tr>
                                                                        <td class="b-point-right"><?= $fila['maker']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= $fila['screens1']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= $fila['screens2']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= $fila['screens3']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= $fila['screens4']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= $fila['screens5']; ?></td>
                                                                        <td class="span1 txt-center"><?= $fila['operational_hours']; ?></td>
                                                                </tr>
                                                                <?php $counter++; ?>
                                                                <?php endforeach; ?>
                                                                <?php $counter++; ?>
                                                                <?php while($counter <= 4 ) { ?>
                                                                <tr>
                                                                        <td class="b-point-right">&nbsp;</td>
                                                                        <td class="span1 txt-center b-point-right"></td>
                                                                        <td class="span1 txt-center b-point-right"></td>
                                                                        <td class="span1 txt-center b-point-right"></td>
                                                                        <td class="span1 txt-center b-point-right"></td>
                                                                        <td class="span1 txt-center b-point-right"></td>
                                                                        <td class="span1 txt-center"></td>
                                                                </tr>
                                                                <?php $counter++; ?>
                                                                <?php } ?>
                                                                                                                                
                                                        </tbody>
                                                </table>
                                                
                                                <div class="sub-header b-top"></div>
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="txt-center" colspan="7">MUD CLEANER</th>
                                                                </tr>                                                                
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td class="b-point-right">SHAKER</td>                                                                        
                                                                        <td class="span1 txt-center b-point-right"><?= empty($mudcleaner[0]['screens1']) ? '&nbsp;' : $mudcleaner[0]['screens1']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= empty($mudcleaner[0]['screens2']) ? '&nbsp;' : $mudcleaner[0]['screens2']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= empty($mudcleaner[0]['screens3']) ? '&nbsp;' : $mudcleaner[0]['screens3']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= empty($mudcleaner[0]['screens4']) ? '&nbsp;' : $mudcleaner[0]['screens4']; ?></td>
                                                                        <td class="span1 txt-center b-point-right"><?= empty($mudcleaner[0]['screens5']) ? '&nbsp;' : $mudcleaner[0]['screens5']; ?></td>
                                                                        <td class="span1 txt-center"><?= empty($mudcleaner[0]['operational_hours']) ? '&nbsp;' : $mudcleaner[0]['operational_hours']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="b-point-right">DESANDER</td>
                                                                        <td colspan="2" class="txt-center b-point-right"><?= empty($mudcleaner[0]['desander_cones']) ? '' : $mudcleaner[0]['desander_cones'].'*'.$mudcleaner[0]['desander_conediameter']; ?></td>
                                                                        <td colspan="2" class="txt-center b-point-right"><?= empty($mudcleaner[0]['desander_flow']) ? '' : $mudcleaner[0]['desander_flow'].' gpm'; ?></td>
                                                                        <td class="txt-center b-point-right"><?= empty($mudcleaner[0]['desander_presure']) ? '' : $mudcleaner[0]['desander_presure'].' psi'; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['desander_hours']) ? '' : $mudcleaner[0]['desander_hours']; ?></td>
                                                                </tr> 
                                                                <tr>
                                                                        <td class="b-point-right">DESILTER</td>
                                                                        <td colspan="2" class="txt-center b-point-right"><?= empty($mudcleaner[0]['desilter_cones']) ? '' : $mudcleaner[0]['desilter_cones'].'*'.$mudcleaner[0]['desilter_conediameter']; ?></td>
                                                                        <td colspan="2" class="txt-center b-point-right"><?= empty($mudcleaner[0]['destiler_flow']) ? '' : $mudcleaner[0]['destiler_flow'].' gpm'; ?></td>
                                                                        <td class="txt-center b-point-right"><?= empty($mudcleaner[0]['destiler_presure']) ? '' : $mudcleaner[0]['destiler_presure'].' psi'; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['destiler_hours']) ? '' : $mudcleaner[0]['destiler_hours']; ?></td>
                                                                </tr>                                                                
                                                        </tbody>
                                                </table>
                                                
                                                <div class="sub-header b-top"></div>
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="txt-center">CENTRIFUGE</th>
                                                                        <th class="txt-center">Speed</th>
                                                                        <th class="txt-center">Over flow</th>
                                                                        <th class="txt-center">Under flow</th>
                                                                        <th class="txt-center">feet Rate</th>
                                                                        <th class="txt-center">Hours</th>
                                                                </tr>                                                                
                                                        </thead>
                                                        <tbody>
                                                                <?php $total = count($centrifugues); ?>
                                                                <?php $counter = 0; ?>
                                                                <?php foreach($centrifugues as $fila) : ?>
                                                                <tr>
                                                                        <td class="b-point-right"><?= $fila['maker']; ?></td>
                                                                        <td class="txt-center b-point-right"><?= $fila['speed']; ?></td>
                                                                        <td class="txt-center b-point-right"><?= $fila['overflow']; ?></td>
                                                                        <td class="txt-center b-point-right"><?= $fila['underflow']; ?></td>
                                                                        <td class="txt-center b-point-right"><?= $fila['feet_rate']; ?></td>
                                                                        <td class="txt-center"><?= $fila['operational_hours']; ?></td>                                                                        
                                                                </tr>
                                                                <?php $counter++; ?>
                                                                <?php endforeach; ?>
                                                                <?php $counter++; ?>
                                                                <?php while($counter <= 4 ) { ?>
                                                                <tr>
                                                                        <td class="b-point-right">&nbsp;</td>
                                                                        <td class="txt-center b-point-right">&nbsp;</td>
                                                                        <td class="txt-center b-point-right">&nbsp;</td>
                                                                        <td class="txt-center b-point-right">&nbsp;</td>
                                                                        <td class="txt-center b-point-right">&nbsp;</td>
                                                                        <td class="txt-center">&nbsp;</td>                                                                        
                                                                </tr>
                                                                <?php $counter++; ?>
                                                                <?php } ?>                                                                
                                                        </tbody>
                                                </table>                                                
                                        </div>
                                        <div class="data-table-container" style="float:left; width: 34.8%">
                                                <div class="sub-header b-bottom"><h5>TIME BREAK DOWN</h5></div>                                                
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="txt-center" style="width: 60%;">ACTIVITY</th>
                                                                        <th class="txt-center" style="width: 40%;">TIME</th>
                                                                </tr>                                                                
                                                        </thead>
                                                        <tbody>
                                                                <?php $total = count($drilling_time); ?>
                                                                <?php $counter = 0; ?>
                                                                <?php $total_time = 0 ; ?>
                                                                <?php foreach($drilling_time as $fila): ?>
                                                                        <tr>                                                                        
                                                                                <td class=""><?= strtoupper($fila['drilling']); ?></td>
                                                                                <td class="txt-center b-point-left"><?= empty($fila['time']) ? '&nbsp;' : number_format($fila['time'], 2, ',', ''); ?></td>
                                                                        </tr>                                                                        
                                                                        <?php $counter++; ?>
                                                                        <?php $total_time = $total_time + $fila['time']; ?>
                                                                <?php endforeach; ?>
                                                                <?php $counter++; ?>
                                                                <?php while($counter <= 10) { ?>
                                                                        <tr>                                                                        
                                                                                <td class="">&nbsp;</td>
                                                                                <td class="txt-center b-point-left">&nbsp;</td>
                                                                        </tr>
                                                                        <?php $counter++; ?>
                                                                <?php } ?>
                                                                <tr>                                                                        
                                                                        <td class="">TOTAL</td>
                                                                        <td class="txt-center b-point-left"><?= number_format($total_time, 2, ',', '');?></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <div class="sub-header b-top b-bottom"><h5>DRILLING PARAMETERS</h5></div>
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="txt-center" style="width: 60%;">ACTIVITY</th>
                                                                        <th class="txt-center" style="width: 40%;">TIME</th>
                                                                </tr>                                                                
                                                        </thead>
                                                        <tbody>
                                                                <tr>                                                                        
                                                                        <td class="">Feet Drilled:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($drilling_parameters[5]['value']) ? '&nbsp;' : number_format($drilling_parameters[5]['value'], 2, ',', ''); ?></td>
                                                                </tr> 
                                                                <tr>                                                                        
                                                                        <td class="">Daily ROP:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($drilling_parameters[6]['value']) ? '&nbsp;' : number_format($drilling_parameters[6]['value'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Daily RPM:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($drilling_parameters[0]['value']) ? '&nbsp;' : number_format($drilling_parameters[0]['value'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Daily WOB:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($drilling_parameters[1]['value']) ? '&nbsp;' : number_format($drilling_parameters[1]['value'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Daily avge Temp °F:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($drilling_parameters[7]['value']) ? '&nbsp;' : number_format($drilling_parameters[7]['value'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Average caving bbl/h:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($drilling_parameters[3]['value']) ? '&nbsp;' : number_format($drilling_parameters[3]['value'], 2, ',', '') ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Average cuttings bbl/h:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($drilling_parameters[4]['value']) ? '&nbsp;' : number_format($drilling_parameters[4]['value'], 2, ',', '') ?></td>
                                                                </tr>                                                                
                                                        </tbody>
                                                </table>                                                                                                                                                
                                                <div class="sub-header b-top b-bottom"><h5>LAST SURVEY</h5></div>
                                                <table class="table table-stripted table-condensed">                                                        
                                                        <tbody>
                                                                <tr>                                                                        
                                                                        <td class="" style="width: 60%;">Survey MD:</td>
                                                                        <td class="txt-center b-point-left" style="width: 40%;"><?= empty($survey[0]['value']) ? '&nbsp;' : number_format($survey[0]['value'], 2 , ',',''); ?></td>
                                                                </tr> 
                                                                <tr>                                                                        
                                                                        <td class="">Survey TVD:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($survey[1]['value']) ? '&nbsp;' : number_format($survey[1]['value'], 2 , ',',''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Inclination:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($survey[2]['value']) ? '&nbsp;' : number_format($survey[2]['value'], 2 , ',',''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Azimuth:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($survey[3]['value']) ? '&nbsp;' : number_format($survey[3]['value'], 2 , ',',''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Dog leg:</td>
                                                                        <td class="txt-center b-point-left"><?= empty($survey[4]['value']) ? '&nbsp;' : number_format($survey[4]['value'], 2 , ',',''); ?></td>
                                                                </tr>                                                                
                                                        </tbody>
                                                </table>                                                                                                
                                        </div>
                                </div>                                                                                                                                                               
                        </div>
                
                        <div class="data-table" style="width: 100%;">
                                <div class="b-top"></div>
                                
                                <div class="container-fluid">
                                        <div class="data-table-container b-right" style="float:left; width: 50%;">
                                                <strong>Company Man/Representative:</strong>
                                                <p class="txt-center" style="padding-top: 30px; margin-bottom:5px;">OSCAR GOMEZ / JUAN DANIEL MOLANO</p>                                                                                            
                                        </div>
                                        <div class="data-table-container" style="float:left; width: 49.8%">                                                                                                                                                                                                                                                                                            
                                                <strong>Mud Engs.</strong>                                                
                                                <p class="txt-center" style="padding-top: 30px; margin-bottom:5px;">CARLOS PARRA / DEIDER MENGUAL</p>
                                        </div>
                                </div>                                                                                                                                                               
                        </div>
                </div>
                
        </div>                
        
</div>

<div class="row b-top">
        <p style="margin: 0; font-size: 8px;">
                QMAX SOLUTIONS COLOMBIA. Calle 100 No 8A -49. Torre B oficina 1018. Tel 6169022, Fax (571) 2180270
        </p>
</div>