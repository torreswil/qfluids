<fieldset>
    <legend>Ley de Potencias</legend>
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
            		<td class="label_m"><label>VEL<br /><span style="text-transform:lowercase;">ft/s</span></label></td>
            		<td class="label_m"><label>N<sub>R<span style="text-transform:lowercase;">e</span></sub></label></td>
            		<td class="label_m"><label>F<sub>p</sub><br />Laminar</label></td>
            		<td class="label_m"><label>F<sub>p</sub><br />Turbulento</label></td>
            		<td class="label_m"><label>PDp<br />Turbulento</label></td>
            		<td class="label_m"><label>PDp</label></td>
            	</tr>
                <tr>
                    <td class="label_m"><label>dp</label></td>
                    <td><input type="text" id="veltubdp" name="veltubdp" /></td>
                    <td><input type="text" id="retdp" name="retdp" /></td>
                    <td><input type="text" id="fft_dp_lami" name="fft_dp_lami"></td>
                    <td><input type="text" id="fft_dp_tur" name="fft_dp_tur" /></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
            </thead>
    	<tbody id="ds_group">
            <tr id="ds_group_1">
        		<td class="label_m"><label>ds_1</label></td>
        		<td><input type="text" id="veltubbha_1" name="veltubbha_1"></td>
        		<td><input type="text" id="retbha_1" name="retbha_1"></td>
        		<td><input type="text" id="fft_bha_lami_1" name="fft_bha_lami_1"></td>
        		<td><input type="text" id="fft_bha_tur_1" name="fft_bha_tur_1"></td>
        		<td><input type="text"></td>
        		<td><input type="text"></td>
        	</tr>
        </tbody>
    </table>		
</fieldset>

<fieldset>
    <legend>Ley de Bingham</legend>
    <table>
        <thead>
            <tr>
                <td></td>
                <td class="label_m"><label>Vc</label></td>
                <td class="label_m"><label>PBingham<br />Laminar</label></td>
                <td class="label_m"><label>Pbingham<br />Turbulento</label></td>
                <td class="label_m"><label>PDp</label></td>
                <td></td>
            </tr>
            <tr>
                <td class="label_m"><label>dp</label></td>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
            </tr>
        </thead>
        <tbody id="bingham_group">
            <tr id="bingham_1">
                <td class="label_m"><label>ds_1</label></td>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
            </tr>
        </tbody>
    </table>	
</fieldset>