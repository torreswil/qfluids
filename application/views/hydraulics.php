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
    <table>
        <tr>
            <td class="label_m"><label>Annular</label> (ft/sec)</td>
            <td class="label_m"><label>Velocity</label></td>
            <td class="label_m"><label>Critical</label></td>
            <td class="label_m"><label>Q<sub>c</sub></label>(gpm)</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" /></td>
            <td><input type="text" /></td>
            <td><input type="text" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" /></td>
            <td><input type="text" /></td>
            <td><input type="text" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" /></td>
            <td><input type="text" /></td>
            <td><input type="text" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" /></td>
            <td><input type="text" /></td>
            <td><input type="text" /></td>
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
                <td><input type="text" id="totalanulpow" name="totalanulpow" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
                <td><input type="text" id="totalanulbin" name="totalanulbin" style="margin-right: 0px; width: 70px;" disabled="disabled" /></td>
            </tr>
        </tfooter>
    </table>
</fieldset>