<fieldset id="pressure_loss_fieldset">
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
        <tr>
            <td class="label_m"><input type="radio" name="hreporttoshow" value="powerlaw" checked="checked"></td>
            <td class="label_m"><label>Power Law</label></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="lossesurf" name="lossesurf" disabled="disabled" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="ztotalstringpow" name="ztotalstringpow" disabled="disabled" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="totalmotor_1" name="totalmotor_1" value="0" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="zpdbit" name="zpdbit" disabled="disabled" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="ztotalanulpow" name="ztotalanulpow" disabled="disabled" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" id="totallossespow" name="totallossespow" disabled="disabled" /></td>
            <td class="label_m" style="padding-left:20px;">Show the <a href="#ds_panel">Drill String Math</a></td>
        </tr>
        <tr>
            <td class="label_m"><input type="radio" name="hreporttoshow" value="bingham"></td>
            <td class="label_m"><label>Bingham</label></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="zlossesurf" name="zlossesurf" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="ztotalstringbing" name="ztotalstringbing" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" name="totalmotor_2" id="totalmotor_2" value="0" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="zzpdbit" name="zzpdbit" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="ztotalanulbin" name="ztotalanulbin" /></td>
            <td><input type="text" style="width:70px;margin-right:0;" disabled="disabled" id="totallossesbin" name="totallossesbin" /></td>
            <td class="label_m" style="padding-left:20px;">Show the <a href="#as_panel">Anular Section Math</a></td>
        </tr>
    </table>
    
</fieldset>

<fieldset>
    <legend>Annular section description</legend>
    <table>
        <tr>
            <td class="label_m"><label>Description</label></td>
            <td class="label_m" style="text-align:center;"><label>ID Hole</label></td>
            <td class="label_m" style="text-align:center;"><label>OD STRN.</label></td>
            <td class="label_m" style="text-align:center;"><label>LENGTH</label></td>
            <td class="label_m" style="text-align:center;"><label>AN.CAP.</label></td>
            <td class="label_m" style="text-align:center;" colspan="2"><label>PRESSURE LOSSES</label></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:center;">in</td>
            <td style="text-align:center;">in</td>
            <td style="text-align:center;">ft</td>
            <td style="text-align:center;">bbl</td>
            <td style="text-align:center;">Power</td>
            <td style="text-align:center;">Bingh</td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_1" name="idhole_1" class="idhole" style="margin-right: 0px; width: 70px;" /></td>
            <td><input type="text" id="odstring_1" name="odstring_1" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_1" name="longanular_1" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_1" name="capanul_1" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_1" name="zapowerloss_1" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_1" name="zabinghloss_1" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_2" name="idhole_2" class="idhole" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="odstring_2" name="odstring_2" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_2" name="longanular_2" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_2" name="capanul_2" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_2" name="zapowerloss_2" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_2" name="zabinghloss_2" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_3" name="idhole_3" class="idhole" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="odstring_3" name="odstring_3" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_3" name="longanular_3" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_3" name="capanul_3" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_3" name="zapowerloss_3" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_3" name="zabinghloss_3" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_4" name="idhole_4" class="idhole" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="odstring_4" name="odstring_4" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_4" name="longanular_4" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_4" name="capanul_4" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_4" name="zapowerloss_4" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_4" name="zabinghloss_4" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_5" name="idhole_5" class="idhole" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="odstring_5" name="odstring_5" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_5" name="longanular_5" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_5" name="capanul_5" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_5" name="zapowerloss_5" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_5" name="zabinghloss_5" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_6" name="idhole_6" class="idhole" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="odstring_6" name="odstring_6" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_6" name="longanular_6" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_6" name="capanul_6" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_6" name="zapowerloss_6" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_6" name="zabinghloss_6" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_7" name="idhole_7" class="idhole" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="odstring_7" name="odstring_7" class="odstring" style="margin-right: 0px; width: 70px;" /></td>
            <td><input type="text" id="longanular_7" name="longanular_7" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_7" name="capanul_7" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_7" name="zapowerloss_7" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_7" name="zabinghloss_7" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_8" name="idhole_8" class="idhole" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="odstring_8" name="odstring_8" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_8" name="longanular_8" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_8" name="capanul_8" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_8" name="zapowerloss_8" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_8" name="zabinghloss_8" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_9" name="idhole_9" class="idhole" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="odstring_9" name="odstring_9" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_9" name="longanular_9" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_9" name="capanul_9" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_9" name="zapowerloss_9" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_9" name="zabinghloss_9" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td><input type="text" style="width:100px;" /></td>
            <td><input type="text" id="idhole_10" name="idhole_10" class="idhole" style="margin-right: 0px; width: 70px;" /></td>
            <td><input type="text" id="odstring_10" name="odstring_10" class="odstring" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="longanular_10" name="longanular_10" class="longanular" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" disabled="disabled" id="capanul_10" name="capanul_10" class="capanul" style="margin-right: 0px; width: 70px;"/></td>
            <td><input type="text" id="zapowerloss_10" name="zapowerloss_10" class="zapowerloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="zabinghloss_10" name="zabinghloss_10" class="zabinghloss" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="vertical-align:middle;text-align:right;"><label>Total:</label></td>
            <td><input type="text" id="capanultotal" name="capanultotal" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="totalanulpow" name="totalanulpow" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            <td><input type="text" id="totalanulbin" name="totalanulbin" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
        </tr>
    </table>
</fieldset>