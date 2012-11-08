<div class="config_panel" id="mudproperties">
	<div class="simpleTabs">
        <ul class="simpleTabsNavigation">
			<li><a href="#">Phases</a></li>
			<li><a href="#">Physical and Chemical Properties</a></li>
			<li><a href="#">Rheology</a></li>
			<li><a href="#">Solids math</a></li>
			<li><a href="#">Adicional Tests</a></li>
    	</ul>
        
		<div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
			<fieldset>
				<legend>Phases Number</legend>
				<table>
					<tr>
						<td>How many phases this project will have?</td>
						<td>
							<select name="phase_number">
                                                                <?php for($i=1 ; $i<11 ; $i++) { ?>
                                                                        <?php $selected = ($project['max_phase'] == $i) ? 'selected="selected"' : ''; ?>
                                                                        <option value="<?= $i; ?>" <?= $selected; ?>><?= $i; ?></option>
                                                                <?php } ?>
								<option value="1" >1</option>																
							</select>
						</td>
					</tr>
                                        <tr>
	        				<td></td>	
	        				<td><input type="button" value="Save phases number" id="save_phases_number" style="margin-top:10px;display:none;" /></td>
	        			</tr>
				</table>
			</fieldset>
		</div>
        <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<table id="settings_physical_and_chemical_list">
                                                                
                        </table>
                        <div class="">
                            <input type="button" value="Save program" class="save_program_test" style="margin-top:10px;" />    
                        </div>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<table id="settings_rheology_list">
                                
                        </table>
                        <div class="">
                            <input type="button" value="Save program" class="save_program_test" style="margin-top:10px;" />    
                        </div>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
	        	<table id="settings_solids_math_list">
                                
                        </table>
                        <div class="">
                            <input type="button" value="Save program" class="save_program_test" style="margin-top:10px;" />    
                        </div>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<legend>Create a new test</legend>
                        <form id="form_new_test">
                                <table>
                                        <tr>
                                                <td class="label_m"><label>Test name:</label></td>
                                                <td class="label_m"><label>Report Unit:</label></td>                                                
                                                <td></td>
                                        </tr>

                                        <tr>
                                                <td><input type="text" name="test" style="width:110px;" /></td>
                                                <td><input type="text" name="unit_test" style="width:110px;" /></td>
                                                <td class="label_m">
                                                        <a href="#create_test">Create</a>                                                
                                                        <input type="hidden" name="custom" value="1" />
                                                        <input type="hidden" name="type_test" value="1" />
                                                </td>
                                        </tr>                                

                                </table>
                        </form>
                        <table id="custom_test_list"></table>
        	</fieldset>
        </div>
    </div>
</div>