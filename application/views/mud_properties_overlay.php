<?php $reporte = $this->session->userdata('report'); ?>
<?php $reporte = $this->Api->get_where('reports', array('id'=>$reporte['id'])); ?>
<?php $reporte = isset($reporte[0]) ? $reporte[0] : null; ?>
<!-- FORMULARIO PARA EL TIPO DE REPORTE -->
<div class="overlay_wrapper" id="report_mud_properties_overlay" data-project="<?=$project['id']; ?>">
	<div class="overlay_dialog_wrapper" style="margin-top:50px">
		<div class="overlay_dialog" style="min-width:640px;">
                        <div class="simpleTabs">
                                <ul class="simpleTabsNavigation">
                                        <li><a href="#">Physical and Chemical Properties</a></li>
                                        <li><a href="#">Rheology</a></li>
                                        <li><a href="#">Solids math</a></li>
                                </ul>
                
                                <div class="simpleTabsContent" style="position: relative !important; top: auto; max-height: 300px;">
                                        <fieldset>
                                                <table>
                                                        <tbody>
                                                                <? $pandcp = $this->Api->get_where('test', array('type_test'=>1)); ?>
                                                                <?php foreach($pandcp as $test) : ?>                                                                                                        
                                                                <tr>
                                                                        <?php if($test['test']=='depth') { ?> 
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">depth</label></td>
                                                                                <td class="unit_field">ft</td>                                                                        
                                                                        <?php } else if($test['test']=='pit/flow line') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">pit/flow line</label></td>
                                                                                <td class="unit_field"></td>
                                                                        <?php } else if($test['test']=='flowline temp') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">flowline temp</label></td>
                                                                                <td class="unit_field">ºF</td>                                                        
                                                                        <?php } else if($test['test']=='mud weight') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">mud weight</label></td>
                                                                                <td class="unit_field">ppg</td>                                                                        
                                                                        <?php } else if($test['test']=='Funnel viscosity') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">Funnel viscosity</label></td>
                                                                                <td class="unit_field">sec/qt</td>
                                                                        <?php } else if($test['test']=='API fl/cake') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">API fl/cake</label></td>
                                                                                <td class="unit_field">c.c./30min</td>                                                        
                                                                        <?php } else if($test['test']=='Sand') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">Sand</label></td>
                                                                                <td class="unit_field">% vol</td>                                                        
                                                                        <?php } else if($test['test']=='Lubricant') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">Lubricant</label></td>
                                                                                <td class="unit_field">% vol</td>                                                        
                                                                        <?php } else if($test['test']=='Inhibitor') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">Inhibitor</label></td>
                                                                                <td class="unit_field">gpb</td>                                                        
                                                                        <?php } else if($test['test']=='pH METER') { ?>        
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">pH METER</label></td>
                                                                                <td class="unit_field"></td>                                                        
                                                                        <?php } else if($test['test']=='PM') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">PM</label></td>
                                                                                <td class="unit_field">ml <span style="text-transform:uppercase">H<sub>2</sub>SO<sub>4</sub></span></td>                                                        
                                                                        <?php } else if($test['test']=='PF/MF') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">PF/MF</label></td>
                                                                                <td class="unit_field">ml <span style="text-transform:uppercase">H<sub>2</sub>SO<sub>4</sub></span></td>                                                        
                                                                        <?php } else if($test['test']=='MBT') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">MBT</label></td>
                                                                                <td class="unit_field">lb/bbl eq</td>                                                        
                                                                        <?php } else if($test['test']=='CHLORIDES') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">CHLORIDES</label></td>
                                                                                <td class="unit_field">mg/l</td>                                                        
                                                                        <?php } else if($test['test']=='Ca++') { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">Ca++</label></td>
                                                                                <td class="unit_field">mg/l</td>                                                        
                                                                        <?php } else { ?>
                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>"><?= $test['test'];?></label></td>
                                                                                <td class="unit_field"><?= $test['unit_test'];?></td>
                                                                        <?php } ?>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                        </tbody>                                        
                                                </table>
                                        </fieldset>    
                                </div>
                                <div class="simpleTabsContent" style="position: relative !important; top: auto; max-height: 300px;">
                                        <table style="width:100%;">
                                                <? $rehology = $this->Api->get_where('test', array('active'=>1, 'type_test'=>2)); ?>
                                                <tr>
                                                        <td style="width:200px;">
                                                                <fieldset style="width:200px;">
                                                                        <table>                                                                                
                                                                                <tbody>
                                                                                        <?php foreach($rehology as $test) : ?>                                                                                        
                                                                                        <tr>
                                                                                        <?php if($test['test']=='&theta;600') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">&theta;600</label></td>
                                                                                        <?php } else if($test['test']=='&theta;300') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">&theta;300</label></td>
                                                                                        <?php } else if($test['test']=='&theta;200') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">&theta;200</label></td>
                                                                                        <?php } else if($test['test']=='&theta;100') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">&theta;100</label></td>
                                                                                        <?php } else if($test['test']=='&theta;6') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">&theta;6</label></td>                                                                                
                                                                                        <?php } else if($test['test']=='&theta;3') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>                                                                                                
                                                                                        <?php } ?>
                                                                                        </tr>
                                                                                        <?php endforeach; ?>
                                                                                        <tr>
                                                                                                <td style="height:16px;"></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">GEL:</label></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                        </tr>
                                                                                        <?php foreach($rehology as $test): ?>
                                                                                        <tr>
                                                                                        <?php if($test['test']=='10"') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">10"</label></td>
                                                                                        <?php } else if($test['test']=="10'") { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">10'</label></td>
                                                                                        <?php } else if($test['test']=="30'") { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">30'</label></td>
                                                                                        <?php } ?>
                                                                                        </tr> 
                                                                                        <?php endforeach; ?>
                                                                                </tbody>                                                                
                                                                        </table>
                                                                </fieldset>
                                                        </td>
                                                        <td style="width:200px;">
                                                                <fieldset>
                                                                        <table>                                                                        
                                                                                <tbody>
                                                                                        <?php foreach($rehology as $test): ?>
                                                                                        <tr>
                                                                                        <?php if($test['test']=='pv') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">pv</label></td>
                                                                                                <td class="unit_field">cp</td>
                                                                                        <?php } else if($test['test']=='yp') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">yp</label></td>
                                                                                                <td class="unit_field">lbf/100 ft<sup>2</sup></td>
                                                                                        <?php } else if($test['test']=='ys') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">YS</label></td>
                                                                                                <td class="unit_field">lbf/100 ft<sup>2</sup></td>
                                                                                        <?php } else if($test['test']=='n') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                                <td class="label_m"><label style="text-transform:lowercase;">n</label></td>
                                                                                                <td class="unit_field"></td>                                                                                                
                                                                                        <?php } else if($test['test']=='k') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                                                <td class="label_m"><label style="text-transform:lowercase;">k</label></td>
                                                                                                <td class="unit_field"></td>
                                                                                        <?php } else if($test['test']=='c.c.i.') { ?>
                                                                                                <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>" disabled=""></td>
                                                                                                <td class="label_m"><label for="list_<?=$test['test']; ?>">c.c.i.</label></td>
                                                                                                <td class="unit_field"></td>                                                                                                
                                                                                        <?php } ?>
                                                                                        </tr>	
                                                                                        <?php endforeach; ?>
                                                                                </tbody>
                                                                        </table>
                                                                </fieldset>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="simpleTabsContent" style="position: relative !important; top: auto; max-height: 300px;">
                                        <? $solids_math = $this->Api->get_where('test', array('active'=>1, 'type_test'=>3)); ?>
                                        <fieldset>
                                                <table>                                                        
                                                        <tbody>
                                                                <?php foreach($solids_math as $test): ?>
                                                                <tr>
                                                                <?php if($test['test']=='Water') { ?>
                                                                        <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                        <td class="label_m" style="width:78px;"><label for="list_<?=$test['test']; ?>">Water</label></td>
                                                                        <td class="unit_field">% Vol</td>                                                                        
                                                                <?php } else if($test['test']=='Oil') { ?>
                                                                        <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                        <td class="label_m"><label for="list_<?=$test['test']; ?>">Oil</label></td>
                                                                        <td class="unit_field">% Vol</td>                                                                        
                                                                <?php } ?>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                        </tbody>                                        
                                                </table>
                                        </fieldset>		
                                        <fieldset>
                                                <table>                                        
                                                        <tbody>
                                                                <?php foreach($solids_math as $test): ?>
                                                                <tr>
                                                                <?php if($test['test']=='Solids') { ?>
                                                                        <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                        <td class="label_m"><label for="list_<?=$test['test']; ?>">Solids</label></td>
                                                                        <td class="unit_field">% Vol</td>
                                                                <?php } else if($test['test']=='ASG Solids') { ?>
                                                                        <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                        <td class="label_m"><label for="list_<?=$test['test']; ?>">ASG Solids</label></td>
                                                                        <td class="unit_field"></td>                                                                        
                                                                <?php } else if($test['test']=='LGS') { ?>
                                                                        <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                        <td class="label_m"><label for="list_<?=$test['test']; ?>">LGS</label></td>
                                                                        <td class="unit_field">ppb</td>
                                                                <?php } else if($test['test']=='HGS') { ?>
                                                                        <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                        <td class="label_m"><label for="list_<?=$test['test']; ?>">HGS</label></td>
                                                                        <td class="unit_field">ppb</td>
                                                                <?php } else if($test['test']=='LGS vol') { ?>
                                                                        <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                        <td class="label_m"><label for="list_<?=$test['test']; ?>">LGS</label></td>
                                                                        <td class="unit_field">% Vol.</td>
                                                                <?php } else if($test['test']=='HGS vol') { ?>
                                                                        <td><input type="checkbox" value="<?=$test['id'];?>" id="list_<?=$test['test']; ?>"></td>
                                                                        <td class="label_m"><label for="list_<?=$test['test']; ?>">HGS</label></td>
                                                                        <td class="unit_field">% Vol.</td>
                                                                <?php } ?>                                
                                                                </tr>
                                                                <?php endforeach; ?>
                                                        </tbody>
                                                </table>
                                        </fieldset>
                                </div>    
                                <input type="button" value="View report" style="float:right;" id="btn_select_mud_properties_list" />
                                <a href="#close" class="close_link" style="display:block;float:left;margin-top:10px;">Cancel</a>
                        </div>		
                </div>
        </div>
</div>