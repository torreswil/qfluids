<?php $reporte = $this->session->userdata('report'); ?>
<?php $reporte = $this->Api->get_where('reports', array('id'=>$reporte['id'])); ?>
<?php $reporte = isset($reporte[0]) ? $reporte[0] : null; ?>
<fieldset id="pressure_loss_fieldset">
        <?php $rs = $this->Api->get_where('project_report_pressure_loss', array('report_id'=>$reporte['id'])); ?>        
    <legend>PRESSURE LOSS RESUME</legend>
    <p style="margin-top:0px;">Please check the row you want to appear in the report...</p>
    <table>
        <tr>
            <td class="label_m"></td>
            <td class="label_m" style="width:111px"><label></label></td>
            <td class="label_m" style="text-align:center;"><label>SURFACE</label></td>
            <td class="label_m" style="text-align:center;"><label>STRING</label></td>
            <td class="label_m" style="text-align:center;"><label>MOTR+MWD</label></td>
            <td class="label_m" style="text-align:center;"><label>BIT</label></td>
            <td class="label_m" style="text-align:center;"><label>ANNULAR</label></td>
            <td class="label_m" style="text-align:center;"><label>TOTAL</label></td>
            <td></td>
        </tr>
        <tr>
            <td class="label_m"></td>
            <td class="label_m"><label></label></td>
            <td class="label_m" style="text-align:center;">psi</td>
            <td class="label_m" style="text-align:center;">psi</td>
            <td class="label_m" style="text-align:center;">psi</td>
            <td class="label_m" style="text-align:center;">psi</td>
            <td class="label_m" style="text-align:center;">psi</td>
            <td class="label_m" style="text-align:center;">psi</td>
            <td></td>
        </tr>
        <tr class="hpressure_loss_resume">
            <td class="label_m"><input type="radio" name="hreporttoshow" value="powerlaw" <?= ( (isset($rs[0]['hydraulic_type']) && $rs[0]['hydraulic_type'] == 'powerlaw') or empty($rs[1]['hydraulic_type']) ) ? 'checked="checked"' : ''; ?>></td>
            <td class="label_m"><label>Power Law</label></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="lossesurf" class="hsurface" name="lossesurf" disabled="disabled" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="ztotalstringpow" class="hstring" name="ztotalstringpow" disabled="disabled" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="totalmotor_1" class="hmotor" name="totalmotor_1" value="<?= empty($rs[0]['motor']) ? '0' : $rs[0]['motor']; ?>" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="zpdbit" class="hbit" name="zpdbit" disabled="disabled" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="ztotalanulpow" class="hannular" name="ztotalanulpow" disabled="disabled" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="totallossespow" class="htotal" name="totallossespow" disabled="disabled" /></td>
            <td class="label_m" style="padding-left:20px;">Show the <a href="#ds_panel">Drill String Math</a></td>
        </tr>
        <tr class="hpressure_loss_resume">
            <td class="label_m"><input type="radio" name="hreporttoshow" value="bingham" <?= (isset($rs[1]['hydraulic_type']) && $rs[1]['hydraulic_type'] == 'bingham') ? 'checked="checked"' : ''; ?>></td>
            <td class="label_m"><label>Bingham</label></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="zlossesurf" class="hsurface" name="zlossesurf" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="ztotalstringbing" class="hstring" name="ztotalstringbing" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" name="totalmotor_2" id="totalmotor_2" class="hmotor" value="<?= empty($rs[1]['motor']) ? '0' : $rs[1]['motor']; ?>" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="zzpdbit" class="hbit" name="zzpdbit" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="ztotalanulbin" class="hannular" name="ztotalanulbin" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="totallossesbin" class="htotal" name="totallossesbin" /></td>
            <td class="label_m" style="padding-left:20px;">Show the <a href="#as_panel">Anular Section Math</a></td>
        </tr>
    </table> 
</fieldset>


<fieldset>
    <table style="float:left;">
        <tr>
            <td class="label_m" style="width:125px;"><label>Velocity</label></td>
            <td class="label_m"><label>ANULAR</label></td>
            <td class="label_m"><label>CRITICAL</label></td>
            <td class="label_m"><label>Q<sub>c</sub></label></td>
        </tr>
        <tr>
            <td class="label_m"></td>
            <td class="label_m">ft/sec</td>
            <td class="label_m">ft/sec</td>
            <td class="label_m">gpm</td>
        </tr>
        <tr>
            <td class="label_m"><label>Casing/DP:</label></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zcdpvel" name="zcdpvel" /></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zcdpvelcrit" name="zcdpvelcrit" /></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zcdpqc" name="zcdpqc" /></td>
        </tr>
        <tr>
            <td class="label_m"><label>DP/OH:</label></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zdpohvel" name="zdpohvel" /></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zdpohvelcrit" name="zdpohvelcrit" /></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zdpohqc" name="zdpohqc" /></td>
        </tr>
        <tr>
            <td class="label_m"><label>DC/OH:</label></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zbhavel_1" name="zbhavel_1" /></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zbhavelcrit_1" name="zbhavelcrit_1" /></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zbhagc_1"  name="zbhagc_1"  /></td>
        </tr>
        <tr>
            <td class="label_m"><label>DC/OH:</label></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zbhavel_2" name="zbhavel_2" /></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zbhavelcrit_2" name="zbhavelcrit_2" /></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px;margin-right:0;" id="zbhagc_2"  name="zbhagc_2"  /></td>
        </tr> 
    </table>

    <table style="float:left;margin-left:90px;margin-top:35px;">
        <tr>
            <td class="label_m"><label>Bouyancy:</label></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px" id="bouyancy" name="bouyancy" /></td>
        </tr>
        <tr>
            <td class="label_m"><label>ECD:</label> (ppg)</td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px" id="ecd" name="ecd" /></td>
        </tr>
        <tr>
            <td class="label_m"><label>% W/OUT:</label></td>
            <td class="label_m"><input type="text" disabled="disabled" style="width:70px" id="zwout" name="zwout" /></td>
        </tr>
    </table>
</fieldset>

<fieldset>
    <legend>Annular section description</legend>
    <table>
        <thead>
            <tr>
                <td class="label_m"><label>Description</label></td>
                <td class="label_m" style="text-align:center;"><label>ID Hole</label></td>
                <td class="label_m" style="text-align:center;"><label>OD STRN.</label></td>
                <td class="label_m" style="text-align:center;"><label>LENGTH</label></td>
                <td class="label_m" style="text-align:center;"><label>AN.CAP.</label></td>
                <td class="label_m" style="text-align:center;"><label>VEL.CRITICAL</label></td>
                <td class="label_m" style="text-align:center;" colspan="2"><label>PRESSURE LOSSES</label></td>
                <td class="label_m" style="text-align:center;"><label>REGIME</label></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align:center;">in</td>
                <td style="text-align:center;">in</td>
                <td style="text-align:center;">ft</td>
                <td style="text-align:center;">bbl</td>
                <td style="text-align:center;">ft/s</td>
                <td style="text-align:center;">Power</td>
                <td style="text-align:center;">Bingh</td>
                <td style="text-align:center;"></td>
            </tr>
        </thead>
        <tbody id="hidraulics_table_content">
        </tbody>
        <tfooter>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="vertical-align:middle;text-align:right;"><label>Total:</label></td>
                <td><input type="text" id="capanultotal" name="capanultotal" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
                <td></td>
                <td><input type="text" id="totalanulpow" name="totalanulpow" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
                <td><input type="text" id="totalanulbin" name="totalanulbin" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
                <td></td>
            </tr>
        </tfooter>
    </table>
</fieldset>