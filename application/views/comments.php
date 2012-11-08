<?php $reporte = $this->session->userdata('report'); ?>
<?php $comments = $this->Api->get_where('project_report_comments', array('report_id'=>$reporte['id'])); ?>
<?php $comments = isset($comments[0]) ? $comments[0] : null; ?>

<style type="text/css">
        p.help-block {
                font-size: 11px;
        }
        p.help-block .label {
                border-radius: 3px 3px 3px 3px;
                background-color: #999999;
                color: #FFFFFF;
                display: inline-block;
                font-size: 11.844px;
                font-weight: bold;
                line-height: 12px;
                padding: 2px 4px;
                text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
                vertical-align: baseline;
                white-space: nowrap;
        }
        
        p.help-block .label-warning {
                background-color: #F89406;
        }
        
        p.help-block .label-important {
                background-color: #B94A48;
        }
</style>
<style type="text/css">
        .txt-monospace {
                font-family: monospace; 
                text-align: justify;
        }
</style>

<div class="this_panel" id="comments">
        <h2>Comments</h2>
	<div class="simpleTabs">
                <ul class="simpleTabsNavigation">
			<li><a href="#">Comments</a></li>			
                  <li><a href="#">Personal</a></li>			
                  <li><a href="#">Cost</a></li>			
                </ul>
                <!-- Comments -->
                <div class="simpleTabsContent"> 
                        <form id="data_input_comments">
                                <table style="width:100%;" class="">
                                        <tr>
                                                <td style="width: 100%">                                                        
                                                        <fieldset style="height:600px;width:90%;">
                                                                <table>
                                                                        <tr>
                                                                                <td class="label_m"><label>Rig activity:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                                
                                                                                <td>
                                                                                        <textarea rows="5" cols="74" class="counter[2230] medium txt-monospace counter-join" counter-target="counter-word" counter-size-enter="75" id="report_rig_activity" name="report_right_activity" style="min-width: 300px !important"><?= empty($comments['rig_activity']) ? 'RIG ACTIVITY: ' : str_replace('<br />', '', $comments['rig_activity']); ?></textarea>
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="label_m"><label>Mud activity:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                                
                                                                                <td>
                                                                                        <textarea rows="5" cols="74" class="medium txt-monospace counter-join" counter-target="counter-word" counter-size-enter="75" id="report_mud_activity" name="report_mud_activity" style="min-width: 300px !important"><?= empty($comments['mud_activity']) ? 'MUD ACTIVITY: ' : str_replace('<br />', '', $comments['mud_activity']); ?></textarea>
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="label_m"><label>Comments:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                                
                                                                                <td>
                                                                                        <textarea rows="5" cols="74" class="medium txt-monospace counter-join" counter-target="counter-word" counter-size-enter="75" id="report_comments" name="report_comments" style="min-width: 300px !important"><?= empty($comments['comments']) ? 'COMMENTS: ' : str_replace('<br />', '', $comments['comments']); ?></textarea>
                                                                                </td>
                                                                        </tr>
                                                                        <tr>                                                                                
                                                                                <td>                                                                       
                                                                                        <p class="help-block">
                                                                                                Caracteres permitidos: <span class="label label-info">2230</span>. Utilizados <span class="label label-warning counter-word">0</span>
                                                                                        </p>
                                                                                </td>
                                                                        </tr>
                                                                </table>
                                                        </fieldset>
                                                </td>
                                                <!--
                                                <td style="width: 30%">
                                                        <fieldset style="height:277px;width:90%;">
                                                                <table>                                                                        
                                                                        
                                                                        <tr>
                                                                                <td class="label_m"><label>CHARLA HSE:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td><input type="text" class="medium" id="report_charla_hse" name="report_charla_hse" style="min-width:300px !important;" value="<?= empty($comments['charla_hse']) ? '' : $comments['charla_hse']; ?>"></td>
                                                                        </tr>
                                                                </table>
                                                        </fieldset>
                                                </td>-->
                                        </tr>
                                </table>                        
                        </form>
                </div>
                <div class="simpleTabsContent">                         
                        <table style="width:100%;" class="">
                                <tr>                
                                        <td style="width: 50%">
                                                <fieldset style="height:277px;width:90%;">
                                                        <table>
                                                                <tr>
                                                                        <td class="label_m"><label>PUSHER:</label></td>
                                                                </tr>
                                                                <tr>                                                                             
                                                                        <td>
                                                                                <input type="text" class="counter[18] medium" counter-target="counter-word" id="report_pusher" name="report_pusher" style="min-width:300px !important;" value="<?= empty($comments['pusher']) ? '' : $comments['pusher']; ?>">
                                                                                <p class="help-block">
                                                                                        Caracteres permitidos: <span class="label label-info">18</span>. Utilizados <span class="label label-warning counter-word">0</span>
                                                                                </p>
                                                                        </td>
                                                                </tr>
                                                                <tr>                                                                             
                                                                        <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m"><label>REPRESENTATIVE:</label></td>
                                                                </tr>
                                                                <tr>                                                                             
                                                                        <td><input type="text" class="medium disabled" disabled="disabled" style="min-width:300px !important;" value="<?= $project['operator'] ?>"></td>
                                                                </tr>
                                                                <tr>                                                                             
                                                                        <td>&nbsp;</td>
                                                                </tr>
                                                        </table>
                                                </fieldset>
                                        </td>
                                        
                                        <td style="width: 50%">
                                                <fieldset style="height:277px;width:90%;">
                                                        <table>                                                                                                                                
                                                                <tr>
                                                                        <td class="label_m"><label>COMPANY MAN 1:</label></td>
                                                                </tr>
                                                                <tr>                                                                             
                                                                        <td>
                                                                                <input type="text" class="counter[18] medium" counter-target="counter-word" id="report_company_man_1" name="report_company_man_1" style="min-width:300px !important;" value="<?= empty($comments['company_man']) ? '' : $comments['company_man']; ?>">
                                                                                <p class="help-block">
                                                                                        Caracteres permitidos: <span class="label label-info">18</span>. Utilizados <span class="label label-warning counter-word">0</span>
                                                                                </p>
                                                                        </td>
                                                                </tr>
                                                                <tr>                                                                             
                                                                        <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m"><label>COMPANY MAN 2:</label></td>
                                                                </tr>                                                                        
                                                                <tr>                                                                             
                                                                        <td>
                                                                                <input type="text" class="counter[18] medium" counter-target="counter-word" id="report_company_man_2" name="report_company_man_2" style="min-width:300px !important;" value="<?= empty($comments['representative']) ? '' : $comments['representative']; ?>">
                                                                                <p class="help-block">
                                                                                        Caracteres permitidos: <span class="label label-info">18</span>. Utilizados <span class="label label-warning counter-word">0</span>
                                                                                </p>
                                                                        </td>
                                                                </tr>
                                                                <tr>                                                                             
                                                                        <td>&nbsp;</td>
                                                                </tr>
                                                        </table>
                                                </fieldset>
                                        </td>
                                </tr>
                        </table>                                                
                </div>
        </div>
</div>