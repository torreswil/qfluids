<div class="config_panel" id="mudproperties">
	<h2>Mud Properties</h2>
	<div class="simpleTabs">
        <ul class="simpleTabsNavigation">
			<li><a href="#">Phases</a></li>
			<li><a href="#">Physical and Chemical Properties</a></li>
			<li><a href="#">Rheology</a></li>
			<li><a href="#">Solids math</a></li>
			<li><a href="#">Adicional Tests</a></li>
    	</ul>
        
		<div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
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
	        				<td><input type="button" value="Save phases number" id="save_phases_number" style="margin-top:10px;" /></td>
	        			</tr>
				</table>
			</fieldset>
		</div>
        <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<table id="settings_physical_and_chemical_list">
                                                                
                        </table>	
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<table id="settings_rheology_list">
                                
                        </table>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
	        	<table id="settings_solids_math_list">
                                
                        </table>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:65px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
        		<legend>Create a new test</legend>
                        <form id="form_new_test">
                                <table>
                                        <tr>
                                                <td class="label_m"><label>Test name:</label></td>
                                                <td class="label_m"><label>Report Unit:</label></td>
                                                <td class="label_m"><label>Type:</label></td>
                                                <td></td>
                                        </tr>

                                        <tr>
                                                <td><input type="text" name="test" style="width:110px;" /></td>
                                                <td><input type="text" name="unit_test" style="width:110px;" /></td>
                                                <td>
                                                        <select name="type_test" style="width:200px;">
                                                                <option value="">Select...</option>
                                                                <option value="1">Physical and Chemical properties</option>
                                                                <option value="2">Rheology</option>
                                                                <option value="3">Solids Math</option>
                                                        </select>
                                                </td>            
                                                <td class="label_m">
                                                        <a href="#create_test">Create</a>                                                
                                                        <input type="hidden" name="custom" value="1" />
                                                </td>
                                        </tr>                                

                                </table>
                        </form>
                        <table id="custom_test_list"></table>
        	</fieldset>
        </div>
    </div>
</div>