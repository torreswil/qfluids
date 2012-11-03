<?php $reporte = $this->session->userdata('report'); ?>
<?php $comments = $this->Api->get_where('project_report_comments', array('report_id'=>$reporte['id'])); ?>
<?php $comments = isset($comments[0]) ? $comments[0] : null; ?>
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
                                                        <fieldset style="height:257px;width:90%;">
                                                                <table>
                                                                        <tr>
                                                                                <td class="label_m"><label>Comments:</label></td>                                                                            
                                                                        </tr>
                                                                        <tr>                                                                                
                                                                                <td><textarea rows="5" class="medium" id="report_comments" name="report_comments" style="min-width: 300px !important"><?= empty($comments['comments']) ? '' : $comments['comments']; ?></textarea></td>
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
                                                        <fieldset style="height:257px;width:90%;">
                                                                <table>
                                                                        <tr>
                                                                                <td class="label_m"><label>PUSHER:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td><input type="text" class="medium" id="report_pusher" name="report_pusher" style="min-width:300px !important;" value="<?= empty($comments['pusher']) ? '' : $comments['pusher']; ?>"></td>
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