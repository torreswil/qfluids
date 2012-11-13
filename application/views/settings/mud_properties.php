<div class="config_panel" id="mudproperties">
	<div class="simpleTabs">
        <ul class="simpleTabsNavigation">
			<li><a href="#">Physical and Chemical Properties</a></li>
			<li><a href="#">Rheology</a></li>
			<li><a href="#">Solids math</a></li>
			<li><a href="#">Aditional Tests</a></li>
    	</ul>
        <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
                <legend>Phisical and Chemical properties program</legend>
        		<table id="settings_physical_and_chemical_list" class="mproperties_table">
                                                                
                        </table>
                        <div class="">
                            <input type="button" value="Save program" class="save_program_test" style="margin-top:10px;display:none;" />    
                        </div>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
                 <legend>Rheology program</legend>
        		<table id="settings_rheology_list" class="mproperties_table">
                                
                        </table>
                        <div class="">
                            <input type="button" value="Save program" class="save_program_test" style="margin-top:10px;display:none;" />    
                        </div>
        	</fieldset>
        </div>
        <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
        	<fieldset>
               <legend>Solids Math program</legend>
	        	<table id="settings_solids_math_list" class="mproperties_table">
                                
                        </table>
                        <div class="">
                            <input type="button" value="Save program" class="save_program_test" style="margin-top:10px;display:none;" />    
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