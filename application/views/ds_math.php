<div class="this_hidden_panel" id="ds_panel">
    <div class="hp_content" id="ds_math">
        <div class="title">
            <h2>Drill String Math</h2>
            <a href="#close" style="display: block;float: right;margin-right: 20px;margin-top: 10px;">Close</a>
        </div>
        <div class="realcontent" style="max-height:500px;overflow-y:scroll;">
            <fieldset>
                <legend>Power Law</legend>
                <table>
                	<tr>
                		<td class="label_m"><label>&#216;600</label></td><td><input type="text" style="width:70px;" value="0" id="t_600" name="t_600"></td>
                		<td class="label_m"><label style="text-transform:lowercase">n<sub>p</sub></label></td><td><input type="text" style="width:70px;" value="0" id="npt" name="npt"></td>
                		<td class="label_m"><label style="text-transform:lowercase">a</label></td><td><input type="text" style="width:70px;" value="0" id="at" name="at"></td>
                        <td class="label_m"><label>N<sub>R<span style="text-transform:lowercase;">ec</span></sub></label></td><td><input type="text" style="width:70px;" value="0" id="retc" name="retc"></td>
                	</tr>
                	<tr>
                		<td class="label_m"><label>&#216;300</label></td><td><input type="text" style="width:70px;" value="0" id="t_300" name="t_300"></td>
                		<td class="label_m"><label style="text-transform:lowercase;">k<sub>p</sub></label></td><td><input type="text" style="width:70px;" value="0" id="kpt" name="kpt"></td>
                		<td class="label_m"><label style="text-transform:lowercase;">b</label></td><td><input type="text" style="width:70px;" value="0" id="bt" name="bt"></td>
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
                            <tr style="display:none;">
                                <td class="label_m"><label>dp</label></td>
                                
                                <td><input type="text" style="width:100px;" id="retdp" name="retdp" /></td>
                                <td><input type="text" style="width:100px;" id="fft_dp_lami" name="fft_dp_lami"></td>
                                <td><input type="text" style="width:100px;" id="fft_dp_tur" name="fft_dp_tur" /></td>
                                <td><input type="text" style="width:100px;" id="ptpldp" name="ptpldp"></td>
                                <td><input type="text" style="width:100px;" id="ptptdp" name="ptptdp"></td>
                                <td><input type="text" style="width:100px;" id="laminarlabeldp" name="laminarlabeldp" /></td>
                            </tr>
                        </thead>
                	<tbody id="ds_group">
                        <tr id="ds_group_1">
                    		<td class="label_m"><label>ds_1</label></td>
                    		
                    		<td><input type="text" style="width:100px;" id="retbha_1" name="retbha_1"></td>
                    		<td><input type="text" style="width:100px;" id="fft_bha_lami_1" name="fft_bha_lami_1"></td>
                    		<td><input type="text" style="width:100px;" id="fft_bha_tur_1" name="fft_bha_tur_1"></td>
                    		<td><input type="text" style="width:100px;" id="ptpl_1" name="ptpl_1"></td>
                    		<td><input type="text" style="width:100px;" id="ptpt_1" name="ptpt_1"></td>
                            <td><input type="text" style="width:100px;" id="laminarlabelbha_1" name="laminarlabelbha_1" /></td>
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
                        <tr style="display:none;">
                            <td class="label_m"><label>dp</label></td>
                            <td><input type="text" style="width:100px;" id="veltubdp" name="veltubdp" /></td>
                            <td><input type="text" style="width:100px;" id="velcritdp" name="velcritdp" /></td>
                            <td><input type="text" style="width:100px;" id="ptbldp" name="ptbldp" /></td>
                            <td><input type="text" style="width:100px;" id="ptbtdp" name="ptbtdp"  /></td>
                            <td><input type="text" style="width:100px;" id="zbinghamflujodp" name="zbinghamflujodp" /></td>
                        </tr>
                    </thead>
                    <tbody id="bingham_group">
                        <tr id="bingham_1">
                            <td class="label_m"><label>ds_1</label></td>
                            <td><input type="text" style="width:100px;" id="veltubbha_1" name="veltubbha_1"></td>
                            <td><input type="text" style="width:100px;" id="velcritbha_1" name="velcritbha_1" /></td>
                            <td><input type="text" style="width:100px;" id="ptblbha_1" name="ptblbha_1" /></td>
                            <td><input type="text" style="width:100px;" id="ptbtbha_1" name="ptbtbha_1" /></td>
                            <td><input type="text" style="width:100px;" id="zbinghamflujobha_1" name="zbinghamflujobha_1" /></td>
                        </tr>
                    </tbody>
                </table>	
            </fieldset>
        </div>
    </div>
</div>