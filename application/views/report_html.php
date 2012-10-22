<?php $reporte = $this->session->userdata('report'); ?>

<div class="row">
        <table class="table table-stripted table-condensed b-bottom">
                <tr class="">
                        <td class="span2 txt-center b-right-2 b-bottom-2">
                                <img width="80" src="/img/qmax_logo.png">
                        </td>
                        <td class="span6 txt-center-all b-right-2 b-bottom-2">
                                <h3>DAILY DRILLING FLUIDS REPORT N. <?= $reporte['number']; ?></h3>
                        </td>
                        <td class="span2 txt-center b-right-2 b-bottom-2">
                                <img width="80" src="/img/qmax_logo.png">
                        </td>
                        <td class="span2 txt-center-all b-bottom-2">
                                Fo IF 002 V-01 <br />
                                1 de 1                                        
                        </td>
                </tr>
        </table>
        
        <table class="table table-stripted table-condensed b-bottom">
                <tr class="">
                        <td class="span2"><span class="strong">Date:</span> <?= $reporte['date']; ?></td>
                        
                        <td class="span2"><span class="strong">WELL:</span> <?= $project['well_name']; ?></td>
                        
                        <td class="span2"><span class="strong">DEPTH MD:</span> <?= $reporte['depth_md']; ?></td>                        
                        
                        <td class="span2"><span class="strong">ACTIVITY:</span> <?= $reporte['activity']; ?></td>
                        
                        <td class="span2"><span class="strong">RIG:</span> <?= $project['rig']; ?></td>                        
                </tr>
                <tr class="">
                        <td class="span2"><span class="strong">Spud date:</span> <?= $project['spud_date']; ?></td>
                        
                        <td class="span2"><span class="strong">FIELD:</span> <?= $project['field']; ?></td>
                        
                        <td class="span2"><span class="strong">BIT DEPTH:</span> <?= $reporte['bit_depth']; ?></td>                        
                        
                        <td class="span2"><span class="strong">FORMATION:</span> <?= $reporte['formation']; ?></td>
                        
                        <td class="span2"><span class="strong">PUSHER:</span> CARLOS DUARTE</td>
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
                                                        <td><?= (empty($fila['oddeci'])) ? '' : number_format($fila['oddeci'], 2, ',', ''); ?></td>
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
                                                                <th class="txt-center span4">OD</th>
                                                                <th class="txt-center span4">ID</th>
                                                                <th class="txt-center span4">LENGTH</th>
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
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['maker']) ? '' : $mud_pumps[0]['maker']; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['maker']) ? '' : $mud_pumps[1]['maker']; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['maker']) ? '' : $mud_pumps[2]['maker']; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">MODEL</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['modelo']) ? '' : $mud_pumps[0]['modelo']; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['modelo']) ? '' : $mud_pumps[1]['modelo']; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['modelo']) ? '' : $mud_pumps[2]['modelo']; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">Diam./stk:</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['maker']) ? '' : $mud_pumps[0]['linerdiameter_frac'].'" X '.$mud_pumps[0]['strokefrac'].'"'; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['maker']) ? '' : $mud_pumps[0]['linerdiameter_frac'].'" X '.$mud_pumps[0]['strokefrac'].'"'; ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['maker']) ? '' : $mud_pumps[0]['linerdiameter_frac'].'" X '.$mud_pumps[0]['strokefrac'].'"'; ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">Eff (%)</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['efficiency']) ? '' : number_format($mud_pumps[0]['efficiency'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['efficiency']) ? '' : number_format($mud_pumps[1]['efficiency'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['efficiency']) ? '' : number_format($mud_pumps[2]['efficiency'],2,",",''); ?></td>
                                                        </tr>                                        
                                                        <tr>
                                                                <td class="txt-left span3">Gal/Stk:</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['gal']) ? '' : number_format($mud_pumps[0]['gal'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['gal']) ? '' : number_format($mud_pumps[1]['gal'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['gal']) ? '' : number_format($mud_pumps[2]['gal'],2,",",''); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">SPM:</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['spm']) ? '' : number_format($mud_pumps[0]['spm'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['spm']) ? '' : number_format($mud_pumps[1]['spm'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['spm']) ? '' : number_format($mud_pumps[2]['spm'],2,",",''); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="txt-left span3">GPM</td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[0]['gpm']) ? '' : number_format($mud_pumps[0]['gpm'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[1]['gpm']) ? '' : number_format($mud_pumps[1]['gpm'],2,",",''); ?></td>
                                                                <td class="txt-center span3"><?= empty($mud_pumps[2]['gpm']) ? '' : number_format($mud_pumps[2]['gpm'],2,",",''); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td colspan="2" class="txt-left span5">SSP, psi: <?= empty($drilling_parameters[2]['value']) ? '' : $drilling_parameters[2]['value']; ?></td>
                                                                <td colspan="2" class="txt-left span7">T. GPM: <?= number_format(0 + (empty($mud_pumps[0]['gpm']) ? 0 : $mud_pumps[0]['gpm']) + (empty($mud_pumps[1]['gpm']) ? 0 : $mud_pumps[1]['gpm']) + (empty($mud_pumps[2]['gpm']) ? 0 : $mud_pumps[2]['gpm']),2,",",''); ?></td> 
                                                        </tr>                                        
                                                </tbody> 
                                        </table>
                                </div>
                                
                                <!-- HIDRAULYCS -->
                                
                                <div class="data-table b-right" style="width: 49.4%;">
                                        <div class="sub-header b-bottom"><h5>HYDRAULICS</h5></div>                                        
                                        <div class="data-table" style="width: 64%">
                                                <table class="table table-stripted table-condensed b-bottom">
                                                        <thead>
                                                                <tr class="txt-center">                                        
                                                                        <th class="span3">ANNULAR:</th>
                                                                        <th class="span3">Actual vel</th>
                                                                        <th class="span3">Critical:</th>
                                                                        <th class="span3">Qc (gpm):</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td class="txt-left">Casing/DP:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['casing1']) ? '' : number_format($velocity[0]['casing1'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['casing2']) ? '' : number_format($velocity[0]['casing2'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['casing3']) ? '' : number_format($velocity[0]['casing3'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">DP/OH:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dp1']) ? '' : number_format($velocity[0]['dp1'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dp2']) ? '' : number_format($velocity[0]['dp2'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dp3']) ? '' : number_format($velocity[0]['dp3'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">DP/OH:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc11']) ? '' : number_format($velocity[0]['dc11'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc12']) ? '' : number_format($velocity[0]['dc12'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc13']) ? '' : number_format($velocity[0]['dc13'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">DP/OH:</td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc21']) ? '' : number_format($velocity[0]['dc21'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc22']) ? '' : number_format($velocity[0]['dc22'], 2, ',', ''); ?></td>
                                                                        <td class="txt-center"><?= empty($velocity[0]['dc23']) ? '' : number_format($velocity[0]['dc23'], 2, ',', ''); ?></td>
                                                                </tr>                                                
                                                        </tbody>                                         
                                                </table>
                                                <table class="table table-stripted table-condensed">
                                                        <tbody>
                                                                <tr>
                                                                        <td class="txt-left span3">Bouyancy:</td>
                                                                        <td class="txt-center span3"><?= empty($velocity[0]['bouyancy']) ? '' : number_format($velocity[0]['bouyancy'], 3, ',', ''); ?></td>
                                                                        <td class="txt-center span3"></td>
                                                                        <td class="txt-center span3"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left">ECD (ppg):</td>
                                                                        <td class="txt-center span3"><?= empty($velocity[0]['ecd']) ? '' : number_format($velocity[0]['ecd'], 3, ',', ''); ?></td>
                                                                        <td class="txt-center span3"></td>
                                                                        <td class="txt-center span3"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="txt-left span3">W/out:</td>
                                                                        <td class="txt-center span3"><?= empty($velocity[0]['w_out']) ? '' : number_format($velocity[0]['w_out'], 3, ',', ''); ?></td>
                                                                        <td class="txt-center span3"></td>
                                                                        <td class="txt-center span3"></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                        </div>
                                        <div class="data-table b-left" style="width: 35.7%">
                                                <table class="table table-stripted table-condensed b-bottom">
                                                        <thead>
                                                                <tr>                                        
                                                                        <th colspan="2" class="txt-center">CIRCULATION</th>
                                                                </tr>                                                
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td>Bttms/Up:</td>
                                                                        <td class="txt-right"></td><!-- REVISAR -->
                                                                </tr>
                                                                <tr>
                                                                        <td>Surf/Bit:</td>
                                                                        <td class="txt-right"></td><!-- REVISAR -->
                                                                </tr>
                                                                <tr>
                                                                        <td>total Circ:</td>
                                                                        <td class="txt-right"></td><!-- REVISAR -->
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
                                                                        <td class="txt-right"></td><!-- REVISAR -->
                                                                </tr>
                                                                <tr>
                                                                        <td>Hole empty:</td>
                                                                        <td class="txt-right"></td><!-- REVISAR -->
                                                                </tr>
                                                                <tr>
                                                                        <td>Hole W/String:</td>
                                                                        <td class="txt-right"></td><!-- REVISAR -->
                                                                </tr>                                                
                                                        </tbody>
                                                </table>
                                        </div>                                         
                                </div>
                                
                        </div>
                        
                        
                        <div class="container-fluid">
                                <div class="data-table b-right" style="width: 50%; margin-left: 1px">
                                        <div class="sub-header b-bottom  b-top"><h5>BIT #: <?= empty($bit[0]['bit_number']) ? '' : $bit[0]['bit_number']; ?></h5></div>
                                        <table class="table table-stripted table-condensed">                                               
                                                <tbody>
                                                        <tr>
                                                                <td class="strong span2">DIAMETER:</td>
                                                                <td class="span2"><?= empty($bit[0]['odfracc']) ? '' : $bit[0]['odfracc']; ?></td>
                                                                <td class="strong span2">TFA:</td>
                                                                <td class="span2"><?= empty($bit[0]['tfa']) ? '' : number_format($bit[0]['tfa'], 3, ',', ''); ?></td>
                                                                <td class="strong span2">JETS VEL:</td>
                                                                <td class="span2"><?= empty($bit[0]['vel_jets']) ? '' : number_format($bit[0]['vel_jets'], 3, ',', ''); ?></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="strong span2">TYPE:</td>
                                                                <td class="span2"><?= empty($bit[0]['nombre_broca']) ? '' : $bit[0]['nombre_broca']; ?></td>
                                                                <td class="strong span2">JETS:</td>
                                                                <td class="span2"><?= empty($bit[0]['result_jets']) ? '' : $bit[0]['result_jets']; ?></td>
                                                                <td class="strong span2">HHP (HP):</td>
                                                                <td class="span2"><?= empty($bit[0]['hhp']) ? '' : number_format($bit[0]['hhp'], 3, ',', ''); ?></td>                                                                   
                                                        </tr>
                                                        <tr>
                                                                <td class="strong span2">MODEL:</td>
                                                                <td colspan="3" class="span6"><?= empty($bit[0]['nombre_modelo']) ? '' : $bit[0]['nombre_modelo']; ?></td>
                                                                <td class="strong span2">HSI (HP/in2):</td>
                                                                <td class="span2"><?= empty($bit[0]['hsi']) ? '' : number_format($bit[0]['hsi'], 3, ',', ''); ?></td>                                                                   
                                                        </tr>
                                                </tbody>                                
                                        </table>
                                </div>
                                <div class="data-table b-right" style="width: 49.5%">
                                        <div class="sub-header b-bottom b-top"><h5>VOLUME RESUM IN BBL</h5></div>
                                        <table class="table table-stripted table-condensed">
                                                <tbody>
                                                        <tr>
                                                                <td class="strong span3">Active pits:</td>
                                                                <td class="span3"></td>
                                                                <td class="strong span3">Total circulate:</td>
                                                                <td class="span3"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="strong span3">Pill:</td>
                                                                <td class="span3"></td>
                                                                <td class="strong span3">Total Reserve:</td>
                                                                <td class="span3"></td>                                                                
                                                        </tr>
                                                        <tr>
                                                                <td class="strong span3">Trip tank:</td>
                                                                <td class="span3"></td>
                                                                <td class="strong span3">Total mud:</td>
                                                                <td class="span3"></td>                                                                
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
                                        </tbody> 
                                </table>
                                <div class="b-top" style="width: 100%;"></div>
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <tr>
                                                        <td class="span6">Water / Oil</td>
                                                        <td class="span5 txt-right">% Vol.</td>
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
                                        </tbody> 
                                </table>
                                <div class="b-top" style="width: 100%;"></div>
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <tr>
                                                        <td class="span6">Lubricant</td>
                                                        <td class="span5 txt-right">% Vol.</td>
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
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[21]['id'])); ?>
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
                                        </tbody> 
                                </table>                                
                                
                                <div class="b-top" style="width: 100%;"></div>
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[30]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs1 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[30]['id'])); ?>
                                                <?php $rs2 = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[31]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[0]['value']) && empty($rs2[0]['value']) ) ? '&nbsp' : $rs1[0]['value'].'/'.$rs2[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[1]['value']) && empty($rs2[1]['value']) ) ? '&nbsp' : $rs1[1]['value'].'/'.$rs2[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= (empty($rs1[2]['value']) && empty($rs2[2]['value']) ) ? '&nbsp' : $rs1[2]['value'].'/'.$rs2[2]['value']; ?></td>
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
                                        </tbody> 
                                </table>
                                <div class="b-top" style="width: 100%;"></div>
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <?php $program = $this->Api->get_where('program', array('project_id'=>$project['id'], 'test_id'=>$tests[7]['id'], 'phase'=>$project['current_phase'])); ?>
                                                <?php $rs = $this->Api->get_where('project_report_test', array('report_id'=>$reporte['id'], 'test_id'=>$tests[7]['id'])); ?>
                                                <tr>
                                                        <td class="span3 txt-center"><?= empty($program[0]['value_program']) ? '&nbsp' : $program[0]['value_program'];?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[0]['value']) ? '&nbsp' : $rs[0]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[1]['value']) ? '&nbsp' : $rs[1]['value']; ?></td>
                                                        <td class="span3 txt-center"><?= empty($rs[2]['value']) ? '&nbsp' : $rs[2]['value']; ?></td>
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
                        <div class="data-table b-right" style="width: 100%;">
                                <div class="sub-header b-bottom b-top"><h5>VOLUME BALANCE IN BBL</h5></div>
                                <table class="table table-stripted table-condensed">
                                        <thead>
                                                <tr class="">
                                                        <th class="span2 txt-left">VOLUME</th>
                                                        <th class="span1 txt-center">ACTIVE</th>
                                                        <th class="span1 txt-center">RESERVE</th>
                                                        <th colspan="4" class="span8 txt-center">LOSSES ANALYSIS</th>
                                                </tr>
                                        </thead>
                                        
                                        <tbody>
                                                <tr class="">
                                                        <td class="">Starting Vol</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Surface</td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Daily Surf. Losses</td>
                                                        <td class="txt-center"></td>                                                        
                                                </tr>                                                                                                                                               
                                                <tr class="">
                                                        <td class="">Transferred Mud</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Shakers/Cvg's</td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Cum. surf. losses</td>
                                                        <td class="txt-center"></td>                                                        
                                                </tr>
                                                <tr class="">
                                                        <td class="">Received Mud</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Mud Cleaner</td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Daily Surf. Losses</td>
                                                        <td class="txt-center"></td>                                                        
                                                </tr>				
                                                <tr class="">
                                                        <td class="">Chemicals</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Centrifuges</td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Cum. S/Surf. losses</td>
                                                        <td class="txt-center"></td>                                                        
                                                </tr>
                                                <tr class="">
                                                        <td class="">Water</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Dewatering</td>
                                                        <td class="txt-center"></td>
                                                        <td class="">&nbsp;</td>
                                                        <td class="txt-center">&nbsp;</td>                                                        
                                                </tr>
                                                <tr class="">
                                                        <td class="strong">Total Additions</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Surface</td>
                                                        <td class="txt-center"></td>
                                                        <td class="strong" colspan="2">BY EVAPORATED bbl/day</td>                                                        
                                                </tr>                                                				
                                                <tr class="strong">
                                                        <td class="">FINAL VOLUME</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Behind Casing</td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Water Evaporated.</td>
                                                        <td class="txt-center"></td>                                                        
                                                </tr>
                                                <tr class="">
                                                        <td class="">Section mud made:</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Others</td>
                                                        <td class="txt-center"></td>
                                                        <td class="">Water added by Evp.</td>
                                                        <td class="txt-center"></td>                                                        
                                                </tr>
																			
                                                <tr class="">
                                                        <td class="">Cum. Mud made:</td>
                                                        <td class="txt-center"></td>
                                                        <td class="txt-center"></td>
                                                        <td class="strong">Total Losses</td>
                                                        <td class="txt-center"></td>
                                                        <td class=""></td>
                                                        <td class="txt-center"></td>                                                        
                                                </tr>                                                
                                        </tbody> 
                                </table>
                                
                                <!-- DAILY CONSUMPTIONS AND COSTS -->
                                
                                <div class="sub-header b-bottom b-top"><h5>DAILY CONSUMPTIONS AND COSTS</h5></div>
                                <table class="table table-stripted table-condensed">                                        
                                        <thead>
                                                <tr>
                                                        <th class="span4">MATERIAL</th>
                                                        <th class="span1">Size</th>
                                                        <th class="span1">U. Cost</th>
                                                        <th class="span1">Initial</th>
                                                        <th class="span1">Recv</th>
                                                        <th class="span1">Transf.</th>
                                                        <th class="span1">Used</th>
                                                        <th class="span1">Stock</th>
                                                        <th class="span1">T. Cost</th>
                                                </tr>
                                        </thead>
                                        <tbody>  
                                                <?php $counter = 1; ?>
                                                <?php while($counter <= 21) { ?>
                                                <tr>
                                                        <td class="">&nbsp;</td>
                                                        <td class="txt-right"></td>
                                                        <td class="txt-right"></td>
                                                        <td class="txt-right"></td>
                                                        <td class="txt-right"></td>
                                                        <td class="txt-right"></td>
                                                        <td class="txt-right"></td>
                                                        <td class="txt-right"></td>
                                                        <td class="txt-right"></td>
                                                </tr>
                                                <?php $counter++; ?>
                                                <?php } ?>                                                
                                                
                                                <tr>
                                                        <td class="">&nbsp;</td>
                                                        <td class="txt-right">&nbsp</td>
                                                        <td class="txt-right">&nbsp</td>
                                                        <td class="txt-right">&nbsp</td>
                                                        <td class="txt-right">&nbsp</td>
                                                        <td class="txt-right">&nbsp</td>
                                                        <td class="txt-right">&nbsp</td>
                                                        <td class="txt-right">&nbsp</td>
                                                        <td class="txt-right">&nbsp</td>
                                                </tr>
                                        </tbody> 
                                </table>
                                
                                <div class="b-top" style="width: 100%;"></div>
                                <table class="table table-stripted table-condensed">                                                                                
                                        <tbody>  
                                                 <tr>
                                                        <td class="span4">Daily Engineering Cost US$:</td>
                                                        <td class="span1"></td>
                                                        <td class="span6 strong" colspan="5">Daily mud cost US$:</td>                                                        
                                                        <td class="span1"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span4">Daily Operator Cost US$:</td>
                                                        <td class="span1"></td>
                                                        <td class="span6 strong" colspan="5">Cum. Mud Cost US$:</td>                                                        
                                                        <td class="span1"></td>
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
                        <div class="data-table b-right" style="width: 100%;">
                                <!--<div class="b-top"></div>-->
                                <table class="table table-stripted table-condensed">
                                        <tbody>
                                                <tr>
                                                        <td class="span4">Daily Patio Handsc Cost US$:</td>
                                                        <td class="span1"></td>
                                                        <td class="span2">Cost / ft (USD)</td>
                                                        <td class="span1"></td>
                                                        <td class="span1">Daily:</td>
                                                        <td class="span1"></td>
                                                        <td class="span1">Section:</td>
                                                        <td class="span1"></td>
                                                </tr>
                                                <tr>
                                                        <td class="span4  strong">Cum. Personnel Cost US$:</td>
                                                        <td class="span1">500</td>
                                                        <td class="span2">Dilution, Bbl/ft</td>
                                                        <td class="span1"></td>
                                                        <td class="span1">Daily:</td>
                                                        <td class="span1"></td>
                                                        <td class="span1">Section:</td>
                                                        <td class="span1"></td>
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
                                                                        <th class="span5 txt-center" colspan="2">CONCENTRATION</th>
                                                                </tr>
                                                                <tr>                                                                            
                                                                        <th class="span2 txt-center">Program</th>
                                                                        <th class="span2 txt-center">Current.</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                        <td class="txt-center">&nbsp</td>
                                                                </tr>
                                                                <tr>
                                                                        <td colspan="3">&nbsp;</td><!--*0,42 gpb = 1% Vol-->                                                                        
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <div class="sub-header b-top b-bottom"><h5>CONTROL EQUIPMENT</h5></div>
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="span2">SHAKER</th>
                                                                        <th class="span9 txt-center" colspan="5">Screens</th>
                                                                        <th class="span1">Hours</th>
                                                                </tr>                                                                
                                                        </thead>
                                                        <tbody>
                                                                <?php $total = count($shakers); ?>
                                                                <?php $counter = 0; ?>
                                                                <?php foreach($shakers as $fila) : ?>
                                                                <tr>
                                                                        <td><?= $fila['maker']; ?></td>
                                                                        <td class="txt-center"><?= $fila['screens1']; ?></td>
                                                                        <td class="txt-center"><?= $fila['screens2']; ?></td>
                                                                        <td class="txt-center"><?= $fila['screens3']; ?></td>
                                                                        <td class="txt-center"><?= $fila['screens4']; ?></td>
                                                                        <td class="txt-center"><?= $fila['screens5']; ?></td>
                                                                        <td class="txt-center"><?= $fila['operational_hours']; ?></td>
                                                                </tr>
                                                                <?php $counter++; ?>
                                                                <?php endforeach; ?>
                                                                <?php $counter++; ?>
                                                                <?php while($counter <= 4 ) { ?>
                                                                <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>
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
                                                                        <td>DESANDER</td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['desander_cones']) ? '' : $mudcleaner[0]['desander_cones'].'*'.$mudcleaner[0]['desander_conediameter']; ?></td>
                                                                        <td colspan="2" class="txt-center"><?= empty($mudcleaner[0]['desander_flow']) ? '' : $mudcleaner[0]['desander_flow'].' gpm'; ?></td>
                                                                        <td colspan="2" class="txt-center"><?= empty($mudcleaner[0]['desander_presure']) ? '' : $mudcleaner[0]['desander_presure'].' psi'; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['desander_hours']) ? '' : $mudcleaner[0]['desander_hours']; ?></td>
                                                                </tr> 
                                                                <tr>
                                                                        <td>DESILTER</td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['desilter_cones']) ? '' : $mudcleaner[0]['desilter_cones'].'*'.$mudcleaner[0]['desilter_conediameter']; ?></td>
                                                                        <td colspan="2" class="txt-center"><?= empty($mudcleaner[0]['destiler_flow']) ? '' : $mudcleaner[0]['destiler_flow'].' gpm'; ?></td>
                                                                        <td colspan="2" class="txt-center"><?= empty($mudcleaner[0]['destiler_presure']) ? '' : $mudcleaner[0]['destiler_presure'].' psi'; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['destiler_hours']) ? '' : $mudcleaner[0]['destiler_hours']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td>SHAKER</td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['maker']) ? '' : $mudcleaner[0]['maker']; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['screens1']) ? '' : $mudcleaner[0]['screens1']; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['screens2']) ? '' : $mudcleaner[0]['screens2']; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['screens3']) ? '' : $mudcleaner[0]['screens3']; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['screens4']) ? '' : $mudcleaner[0]['screens4']; ?></td>
                                                                        <td class="txt-center"><?= empty($mudcleaner[0]['operational_hours']) ? '' : $mudcleaner[0]['operational_hours']; ?></td>
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
                                                                        <td><?= $fila['maker']; ?></td>
                                                                        <td class="txt-center"><?= $fila['speed']; ?></td>
                                                                        <td class="txt-center"><?= $fila['overflow']; ?></td>
                                                                        <td class="txt-center"><?= $fila['underflow']; ?></td>
                                                                        <td class="txt-center"><?= $fila['feet_rate']; ?></td>
                                                                        <td class="txt-center"><?= $fila['operational_hours']; ?></td>                                                                        
                                                                </tr>
                                                                <?php $counter++; ?>
                                                                <?php endforeach; ?>
                                                                <?php $counter++; ?>
                                                                <?php while($counter <= 4 ) { ?>
                                                                <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>
                                                                        <td class="txt-center"></td>                                                                        
                                                                </tr>
                                                                <?php $counter++; ?>
                                                                <?php } ?>                                                                
                                                        </tbody>
                                                </table>                                                
                                        </div>
                                        <div class="data-table-container" style="float:left; width: 34.8%">
                                                <div class="sub-header b-right b-bottom"><h5>TIME BREAK DOWN</h5></div>                                                
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="span7 txt-center">ACTIVITY</th>
                                                                        <th class="span5 txt-center">TIME</th>
                                                                </tr>                                                                
                                                        </thead>
                                                        <tbody>
                                                                <?php $total = count($drilling_time); ?>
                                                                <?php $counter = 0; ?>
                                                                <?php $total_time = 0 ; ?>
                                                                <?php foreach($drilling_time as $fila): ?>
                                                                        <tr>                                                                        
                                                                                <td class=""><?= strtoupper($fila['drilling']); ?></td>
                                                                                <td class="txt-center"><?= empty($fila['time']) ? '&nbsp;' : number_format($fila['time'], 2, ',', ''); ?></td>
                                                                        </tr>                                                                        
                                                                        <?php $counter++; ?>
                                                                        <?php $total_time = $total_time + $fila['time']; ?>
                                                                <?php endforeach; ?>
                                                                <?php $counter++; ?>
                                                                <?php while($counter <= 10) { ?>
                                                                        <tr>                                                                        
                                                                                <td class="">&nbsp;</td>
                                                                                <td class="txt-center"></td>
                                                                        </tr>
                                                                        <?php $counter++; ?>
                                                                <?php } ?>
                                                                <tr>                                                                        
                                                                        <td class="">TOTAL</td>
                                                                        <td class="txt-center"><?= number_format($total_time, 2, ',', '');?></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <div class="sub-header b-top b-bottom"><h5>DRILLING PARAMETERS</h5></div>
                                                <table class="table table-stripted table-condensed">
                                                        <thead>
                                                                <tr>
                                                                        <th class="span7 txt-center">ACTIVITY</th>
                                                                        <th class="span5 txt-center">TIME</th>
                                                                </tr>                                                                
                                                        </thead>
                                                        <tbody>
                                                                <tr>                                                                        
                                                                        <td class="">Feet Drilled:</td>
                                                                        <td class="txt-center"><?= empty($drilling_parameters[5]['value']) ? '' : number_format($drilling_parameters[5]['value'], 2, ',', ''); ?></td>
                                                                </tr> 
                                                                <tr>                                                                        
                                                                        <td class="">Daily ROP:</td>
                                                                        <td class="txt-center"><?= empty($drilling_parameters[6]['value']) ? '' : number_format($drilling_parameters[6]['value'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Daily RPM:</td>
                                                                        <td class="txt-center"><?= empty($drilling_parameters[0]['value']) ? '' : number_format($drilling_parameters[0]['value'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Daily WOB:</td>
                                                                        <td class="txt-center"><?= empty($drilling_parameters[1]['value']) ? '' : number_format($drilling_parameters[1]['value'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Daily avge Temp °F:</td>
                                                                        <td class="txt-center"><?= empty($drilling_parameters[7]['value']) ? '' : number_format($drilling_parameters[7]['value'], 2, ',', ''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Average caving bbl/h:</td>
                                                                        <td class="txt-center"><?= empty($drilling_parameters[3]['value']) ? '' : number_format($drilling_parameters[3]['value'], 2, ',', '') ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Average cuttings bbl/h:</td>
                                                                        <td class="txt-center"><?= empty($drilling_parameters[4]['value']) ? '' : number_format($drilling_parameters[4]['value'], 2, ',', '') ?></td>
                                                                </tr>                                                                
                                                        </tbody>
                                                </table>                                                                                                                                                
                                                <div class="sub-header b-top b-bottom"><h5>LAST SURVEY</h5></div>
                                                <table class="table table-stripted table-condensed">                                                        
                                                        <tbody>
                                                                <tr>                                                                        
                                                                        <td class="">Survey MD:</td>
                                                                        <td class="txt-center"><?= empty($survey[0]['value']) ? '' : number_format($survey[0]['value'], 2 , ',',''); ?></td>
                                                                </tr> 
                                                                <tr>                                                                        
                                                                        <td class="">Survey TVD:</td>
                                                                        <td class="txt-center"><?= empty($survey[1]['value']) ? '' : number_format($survey[1]['value'], 2 , ',',''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Inclination:</td>
                                                                        <td class="txt-center"><?= empty($survey[2]['value']) ? '' : number_format($survey[2]['value'], 2 , ',',''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Azimuth:</td>
                                                                        <td class="txt-center"><?= empty($survey[3]['value']) ? '' : number_format($survey[3]['value'], 2 , ',',''); ?></td>
                                                                </tr>
                                                                <tr>                                                                        
                                                                        <td class="">Dog leg:</td>
                                                                        <td class="txt-center"><?= empty($survey[4]['value']) ? '' : number_format($survey[4]['value'], 2 , ',',''); ?></td>
                                                                </tr>                                                                
                                                        </tbody>
                                                </table>                                                                                                
                                        </div>
                                </div>                                                                                                                                                               
                        </div>
                
                        <div class="data-table b-right" style="width: 100%;">
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