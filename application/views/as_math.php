<fieldset>
    <legend>Power Law</legend>
    <table>
    	<tr>
    		<td class="label_m"><label>&#216;600</label></td><td><input type="text" value="0" id="t_600" name="t_600"></td>
    		<td class="label_m"><label style="text-transform:lowercase">n<sub>p</sub></label></td><td><input type="text" value="0" id="npt" name="npt"></td>
    		<td class="label_m"><label style="text-transform:lowercase">a</label></td><td><input type="text" value="0" id="at" name="at"></td>
            <td class="label_m"><label>N<sub>R<span style="text-transform:lowercase;">ec</span></sub></label></td><td><input type="text" value="0" id="retc" name="retc"></td>
    	</tr>
    	<tr>
    		<td class="label_m"><label>&#216;300</label></td><td><input type="text" value="0" id="t_300" name="t_300"></td>
    		<td class="label_m"><label style="text-transform:lowercase;">k<sub>p</sub></label></td><td><input type="text" value="0" id="kpt" name="kpt"></td>
    		<td class="label_m"><label style="text-transform:lowercase;">b</label></td><td><input type="text" value="0" id="bt" name="bt"></td>
    	    <td></td><td></td>
        </tr>
    </table>

    <table style="margin-top:20px;">
    	<thead>
                <tr>
            		<td></td>
            		<td class="label_m"><label>N<sub>R<span style="text-transform:lowercase;">e</span></sub></label></td>
            		<td class="label_m"><label>F<sub>p</sub><br />Laminate</label></td>
            		<td class="label_m"><label>F<sub>p</sub><br />Turbulent</label></td>
            		<td class="label_m"><label>&Delta; P.<br />Laminate</label> Psi</td>
            		<td class="label_m"><label>&Delta; P.<br />turbulent</label> Psi</td>
            	   <td></td>
                </tr>
                <tr>
                    <td class="label_m"><label>dp</label></td>
                    <td><input type="text" style="width:50px;" id="retdp" name="retdp" /></td>
                    <td><input type="text" style="width:50px;" id="fft_dp_lami" name="fft_dp_lami"></td>
                    <td><input type="text" style="width:50px;" id="fft_dp_tur" name="fft_dp_tur" /></td>
                    <td><input type="text" style="width:50px;" id="ptpldp" name="ptpldp"></td>
                    <td><input type="text" style="width:50px;" id="ptptdp" name="ptptdp"></td>
                    <td><input type="text" style="width:50px;" id="laminarlabeldp" name="laminarlabeldp" /></td>
                </tr>
            </thead>
    	<tbody id="ds_group">
            <tr id="ds_group_1">
        		<td class="label_m"><label>ds_1</label></td>
        		<td><input type="text" style="width:50px;" id="retbha_1" name="retbha_1"></td>
        		<td><input type="text" style="width:50px;" id="fft_bha_lami_1" name="fft_bha_lami_1"></td>
        		<td><input type="text" style="width:50px;" id="fft_bha_tur_1" name="fft_bha_tur_1"></td>
        		<td><input type="text" style="width:50px;" id="ptpl_1" name="ptpl_1"></td>
        		<td><input type="text" style="width:50px;" id="ptpt_1" name="ptpt_1"></td>
                <td><input type="text" style="width:50px;" id="laminarlabelbha_1" name="laminarlabelbha_1" /></td>
        	</tr>
        </tbody>
    </table>		
</fieldset>

<fieldset>
    <legend>Bingham</legend>
    <table>
        <thead>
            <tr>
                <td></td>
                <td class="label_m"><label>VEL<br /><span style="text-transform:lowercase;">ft/s</span></label></td>
                <td class="label_m"><label>Vel Critical<br /><span style="text-transform:lowercase;">ft/s</span></label></td>
                <td class="label_m"><label>&Delta; P.<br />Laminate</label> Psi</td>
                <td class="label_m"><label>&Delta; P.<br />Turbulent</label> Psi</td>
                <td class="label_m"><label></label></td>
            </tr>
            <tr>
                <td class="label_m"><label>dp</label></td>
                <td><input type="text" style="width:50px;" id="veltubdp" name="veltubdp" /></td>
                <td><input type="text" style="width:50px;" id="velcritdp" name="velcritdp" /></td>
                <td><input type="text" style="width:50px;" id="ptbldp" name="ptbldp" /></td>
                <td><input type="text" style="width:50px;" id="ptbtdp" name="ptbtdp"  /></td>
                <td><input type="text" style="width:50px;" id="zbinghamflujodp" name="zbinghamflujodp" /></td>
            </tr>
        </thead>
        <tbody id="bingham_group">
            <tr id="bingham_1">
                <td class="label_m"><label>ds_1</label></td>
                <td><input type="text" style="width:50px;" id="veltubbha_1" name="veltubbha_1"></td>
                <td><input type="text" style="width:50px;" id="velcritbha_1" name="velcritbha_1" /></td>
                <td><input type="text" style="width:50px;" id="ptblbha_1" name="ptblbha_1" /></td>
                <td><input type="text" style="width:50px;" id="ptbtbha_1" name="ptbtbha_1" /></td>
                <td><input type="text" style="width:50px;" id="zbinghamflujobha_1" name="zbinghamflujobha_1" /></td>
            </tr>
        </tbody>
    </table>	
</fieldset>