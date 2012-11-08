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

<div class="this_panel" id="comments">
        <h2>Comments</h2>
	<div class="simpleTabs">
                <ul class="simpleTabsNavigation">
			<li><a href="#">Comments</a></li>			
                </ul>
                <!-- Comments -->
                <div class="simpleTabsContent"> 
                        <form id="data_input_comments">
                                <table style="width:100%;" class="">
                                        <tr>
                                                <td style="width: 50%">
                                                        <!-- BIT -->
                                                        <fieldset style="height:277px;width:90%;">
                                                                <table>
                                                                        <tr>
                                                                                <td class="label_m"><label>Comments:</label></td>                                                                            
                                                                        </tr>
                                                                        <tr>                                                                                
                                                                                <td>
                                                                                        <textarea rows="5" cols="45" class="counter[2500] medium" counter-target="counter-word" counter-size-enter="74" id="report_comments" name="report_comments" style="min-width: 300px !important"><?= empty($comments['comments']) ? '' : str_replace('<br />', '', $comments['comments']); ?></textarea>
                                                                                        <p class="help-block">
                                                                                                Caracteres permitidos: <span class="label label-info">2500</span>. Utilizados <span class="label label-warning counter-word">0</span>
                                                                                        </p>
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="label_m"><label>CHARLA HSE:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td><input type="text" class="medium" id="report_charla_hse" name="report_charla_hse" style="min-width:300px !important;" value="<?= empty($comments['charla_hse']) ? '' : $comments['charla_hse']; ?>"></td>
                                                                        </tr>
                                                                </table>
                                                        </fieldset>
                                                </td>
                                                <td style="width: 50%">
                                                        <fieldset style="height:277px;width:90%;">
                                                                <table>
                                                                        <tr>
                                                                                <td class="label_m"><label>PUSHER:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td><input type="text" class="medium" id="report_pusher" name="report_pusher" style="min-width:300px !important;" value="<?= empty($comments['pusher']) ? '' : $comments['pusher']; ?>"></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="label_m"><label>COMPANY MAN:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td><input type="text" class="medium" id="report_company_man" name="report_company_man" style="min-width:300px !important;" value="<?= empty($comments['company_man']) ? '' : $comments['company_man']; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="label_m"><label>REPRESENTATIVE:</label></td>
                                                                        </tr>                                                                        
                                                                        <tr>                                                                             
                                                                                <td><input type="text" class="medium" id="report_representative" name="report_representative" style="min-width:300px !important;" value="<?= empty($comments['representative']) ? '' : $comments['representative']; ?>"></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="label_m"><label>MUD ENNGINERS:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td><input type="text" class="medium" id="report_mud_enginers_1" name="report_mud_enginers_1" style="min-width:300px !important;" value="<?= empty($comments['mud_enginers_1']) ? '' : $comments['mud_enginers_1']; ?>"></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td><input type="text" class="medium" id="report_mud_enginers_2" name="report_mud_enginers_2" style="min-width:300px !important;" value="<?= empty($comments['mud_enginers_2']) ? '' : $comments['mud_enginers_2']; ?>"></td>
                                                                        </tr>
                                                                </table>
                                                        </fieldset>
                                                </td>
                                        </tr>
                                </table>                        
                        </form>
                </div>
        </div>
</div>