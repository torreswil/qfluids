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
                                                        <fieldset style="height:700px;width:90%;">                                                                
                                                                <table>
                                                                        <tr>                                                                                
                                                                                <td>                                                                       
                                                                                        <p class="help-block">
                                                                                                Caracteres permitidos: <span class="label label-info">2230</span>. Utilizados <span class="label label-warning counter-word">0</span>
                                                                                        </p>
                                                                                </td>
                                                                        </tr>
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
                                                                                <td class="label_m"><label>CHARLA HSE:</label></td>
                                                                        </tr>
                                                                        <tr>                                                                             
                                                                                <td>
                                                                                        <select class="medium" id="report_charla_hse" name="report_charla_hse" style="min-width: 450px !important">
                                                                                                <option value="">Please select...</option>
                                                                                                <option value="INDUCCION DE HSEQ A PERSONAL DE PATIO NUEVO" <?= ($comments['charla_hse']=="INDUCCION DE HSEQ A PERSONAL DE PATIO NUEVO") ? 'selected' : ''; ?>>INDUCCION DE HSEQ A PERSONAL DE PATIO NUEVO</option>
                                                                                                <option value="POLITICA QSSIMA Y POLITICA DE ALCOHOL Y DROGAS" <?= ($comments['charla_hse']=="POLITICA QSSIMA Y POLITICA DE ALCOHOL Y DROGAS") ? 'selected' : ''; ?>>POLÍTICA QSSIMA Y POLÍTICA DE ALCOHOL Y DROGAS</option>
                                                                                                <option value="MANEJO DE PRODUCTOS QUIMICOS" <?= ($comments['charla_hse']=="MANEJO DE PRODUCTOS QUIMICOS") ? 'selected' : ''; ?>>MANEJO DE PRODUCTOS QUÍMICOS</option>
                                                                                                <option value="MSDS DE LA SODA CAUSTICA" <?= ($comments['charla_hse']=="MSDS DE LA SODA CAUSTICA") ? 'selected' : ''; ?>>MSDS DE LA SODA CAUSTICA</option>
                                                                                                <option value="USO DE LOS ELEMENTOS DE PROTECCIÓN PERSONAL" <?= ($comments['charla_hse']=="USO DE LOS ELEMENTOS DE PROTECCIÓN PERSONAL") ? 'selected' : ''; ?>>USO DE LOS ELEMENTOS DE PROTECCIÓN PERSONAL</option>
                                                                                                <option value="CUIDADO DE LAS MANOS" <?= ($comments['charla_hse']=="CUIDADO DE LAS MANOS") ? 'selected' : ''; ?>>CUIDADO DE LAS MANOS</option>
                                                                                                <option value="PROTECCIÓN SOLAR" <?= ($comments['charla_hse']=="PROTECCIÓN SOLAR") ? 'selected' : ''; ?>>PROTECCIÓN SOLAR</option>
                                                                                                <option value="PROTECCIÓN AUDITIVA" <?= ($comments['charla_hse']=="PROTECCIÓN AUDITIVA") ? 'selected' : ''; ?>>PROTECCIÓN AUDITIVA</option>
                                                                                                <option value="PROTECCIÓN RESPIRATORIA" <?= ($comments['charla_hse']=="PROTECCIÓN RESPIRATORIA") ? 'selected' : ''; ?>>PROTECCIÓN RESPIRATORIA</option>
                                                                                                <option value="SUPERFICIES RESBALOSAS" <?= ($comments['charla_hse']=="SUPERFICIES RESBALOSAS") ? 'selected' : ''; ?>>SUPERFICIES RESBALOSAS</option>
                                                                                                <option value="PROGRAMA STOP / TARJETAS" <?= ($comments['charla_hse']=="PROGRAMA STOP / TARJETAS") ? 'selected' : ''; ?>>PROGRAMA STOP / TARJETAS</option>
                                                                                                <option value="USO CORRECTO DE HERRAMIENTAS" <?= ($comments['charla_hse']=="USO CORRECTO DE HERRAMIENTAS") ? 'selected' : ''; ?>>USO CORRECTO DE HERRAMIENTAS</option>
                                                                                                <option value="MANEJO MANUAL DE CARGAS" <?= ($comments['charla_hse']=="MANEJO MANUAL DE CARGAS") ? 'selected' : ''; ?>>MANEJO MANUAL DE CARGAS</option>
                                                                                                <option value="MANEJO MECÁNICO DE CARGAS" <?= ($comments['charla_hse']=="MANEJO MECÁNICO DE CARGAS") ? 'selected' : ''; ?>>MANEJO MECÁNICO DE CARGAS</option>
                                                                                                <option value="MANIPULACION Y TRASIEGO DE FLUIDOS" <?= ($comments['charla_hse']=="MANIPULACION Y TRASIEGO DE FLUIDOS") ? 'selected' : ''; ?>>MANIPULACION Y TRASIEGO DE FLUIDOS</option>
                                                                                                <option value="LIMPIEZA DE TANQUES Y ESPACIOS CONFINADOS " <?= ($comments['charla_hse']=="LIMPIEZA DE TANQUES Y ESPACIOS CONFINADOS ") ? 'selected' : ''; ?>>LIMPIEZA DE TANQUES Y ESPACIOS CONFINADOS </option>
                                                                                                <option value="EVALUACION DE RIESGOS" <?= ($comments['charla_hse']=="EVALUACION DE RIESGOS") ? 'selected' : ''; ?>>EVALUACION DE RIESGOS</option>
                                                                                                <option value="PLANES DE EVACUACION Y  PUNTO DE REUNION" <?= ($comments['charla_hse']=="PLANES DE EVACUACION Y  PUNTO DE REUNION") ? 'selected' : ''; ?>>PLANES DE EVACUACION Y  PUNTO DE REUNION</option>
                                                                                                <option value="LINEAS DE ALTA PRESION" <?= ($comments['charla_hse']=="LINEAS DE ALTA PRESION") ? 'selected' : ''; ?>>LINEAS DE ALTA PRESION</option>
                                                                                                <option value="PERMISOS DE TRABAJO" <?= ($comments['charla_hse']=="PERMISOS DE TRABAJO") ? 'selected' : ''; ?>>PERMISOS DE TRABAJO</option>
                                                                                                <option value="CONDICIONES INSEGURAS" <?= ($comments['charla_hse']=="CONDICIONES INSEGURAS") ? 'selected' : ''; ?>>CONDICIONES INSEGURAS</option>
                                                                                                <option value="ERGONOMIA Y ESFUERZOS" <?= ($comments['charla_hse']=="ERGONOMIA Y ESFUERZOS") ? 'selected' : ''; ?>>ERGONOMIA Y ESFUERZOS</option>
                                                                                                <option value="ACONDICIONAMIENTO FÍSICO PARA LA LABOR" <?= ($comments['charla_hse']=="ACONDICIONAMIENTO FÍSICO PARA LA LABOR") ? 'selected' : ''; ?>>ACONDICIONAMIENTO FÍSICO PARA LA LABOR</option>
                                                                                                <option value="SIMULACROS" <?= ($comments['charla_hse']=="SIMULACROS") ? 'selected' : ''; ?>>SIMULACROS</option>
                                                                                        </select>
                                                                                </td>
                                                                        </tr>
                                                                </table>
                                                        </fieldset>
                                                </td>                                                
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
                                                                                <p class="help-block hidden">
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
                                                                                <p class="help-block hidden">
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
                                                                                <p class="help-block hidden">
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
                
                <div class="simpleTabsContent">                         
                        <table style="width:100%;" class="">
                                <tr>                
                                        <td style="width: 50%">
                                                <fieldset style="height:277px;width:97%;">
                                                        <table>
                                                                <tr>
                                                                        <td class="label_m"><label>DAILY ENGINEERING COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m"><label>DAILY FILTRATION UNIT OPERATOR COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m"><label>DAILY FLOCULATION UNIT OPERATOR COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m"><label>DAILY SILOS UNIT OPERATOR COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>                                                                
                                                                <tr>
                                                                        <td class="label_m"><label>DAILY PATION HANDS COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>
                                                        </table>
                                                </fieldset>
                                        </td>
                                        
                                        <td style="width: 50%">
                                                <fieldset style="height:277px;width:97%;">
                                                        <table>                                                                                                                                
                                                                <tr>
                                                                        <td class="label_m"><label>DAILY MUD COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m"><label>CUM. MUD COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m"><label>DAILY PERSONNEL COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m"><label>CUM. PERSONNEL COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>                                                                
                                                                <tr>
                                                                        <td class="label_m"><label>TOTAL COST $: </label></td>
                                                                        <td><input type="text" class="small" value=""></td>
                                                                        <td><input type="text" class="medium" value=""></td>
                                                                </tr>
                                                        </table>
                                                </fieldset>
                                        </td>
                                </tr>
                        </table>                                                
                </div>
        </div>
</div>