<div class="options_panel" id="stock_transfers_overlay" style="display:none; background-image: none; left: 100px; right: 100px; bottom: 80px; z-index: 998">	
        <div style="margin: 20px">		
                <h5 style="color: #384939; font-family: 'OpenSansSemibold',Arial,sans-serif; font-size: 18px; font-weight: normal; margin: 0 0 20px;">Stock Transfers</h5>		
        </div>
	<div class="op_content">		
		<div class="content" style="left: 0px; min-height: 500px;">                    
			<div class="config_panel" style="display: block; max-height: 470px; padding-bottom: 10px">                        
                        <div class="simpleTabs">
                                <ul class="simpleTabsNavigation">
                                        <li><a href="#">General</a></li>
                                        <li><a href="#">Materials</a></li>
                                        <li><a href="#">Equipment</a></li>                                        
                                </ul>
                                <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
                                        <form id="form_stock_transfers_incoming">
                                                <fieldset>                                
                                                        <table style="margin-bottom:20px;" class="general_st_info">
                                                                <tr>
                                                                        <td class="label_m"><label>Stock Transfer Number:</label></td>                                                
                                                                </tr>
                                                                <tr>
                                                                        <td><input type="text" style="width:200px;" class="st_number" name="code" /></td>
                                                                </tr>                                                                                
                                                        </table>                                
                                                </fieldset>
                                                <fieldset>                                                        
                                                        <table style="width: 100%">
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>FROM: </label></td>
                                                                        <td><input type="text" class="medium st_from" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>TO: </label></td>
                                                                        <td><input type="text" class="medium st_to" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>ORIGIN: </label></td>
                                                                        <td><input type="text" class="medium st_origin" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>DESTINY: </label></td>
                                                                        <td><input type="text" class="medium st_destiny" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>ADDRESS: </label></td>
                                                                        <td><input type="text" class="medium st_address_from" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>ADDRESS: </label></td>
                                                                        <td><input type="text" class="medium st_address_to" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>CITY: </label></td>
                                                                        <td><input type="text" class="medium st_city_from" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>CITY: </label></td>
                                                                        <td><input type="text" class="medium st_city_to" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>DATE: </label></td>
                                                                        <td><input type="text" class="medium st_date" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>ATTENTION: </label></td>
                                                                        <td><input type="text" class="medium st_attention" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>
                                                        </table>
                                                </fieldset>

                                                <fieldset style="margin: 10px 0px;">                                                        
                                                        <table style="width: 100%">
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>CONVEYOR: </label></td>
                                                                        <td><input type="text" class="medium st_conveyor" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>VEHICLE TYPE: </label></td>
                                                                        <td><input type="text" class="medium st_vehicle_type" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>COMPANY: </label></td>
                                                                        <td><input type="text" class="medium st_company" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>ID: </label></td>
                                                                        <td><input type="text" class="medium st_identification" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>DRIVER: </label></td>
                                                                        <td><input type="text" class="medium st_driver" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>PLATES: </label></td>
                                                                        <td><input type="text" class="medium st_plates" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="label_m" width="110px"><label>ENDORSEMENT: </label></td>
                                                                        <td><input type="text" class="medium st_endorsement" value="" style="min-width:250px; width: 250px"></td>
                                                                        <td width="50px">&nbsp;</td>
                                                                        <td class="label_m" width="110px"><label>PHONE: </label></td>
                                                                        <td><input type="text" class="medium st_phone" value="" style="min-width:250px; width: 250px"></td>
                                                                </tr>

                                                        </table>                                                
                                                </fieldset>
                                                <input type="hidden" name="type" value="incoming">
                                        </form>
                                </div>
                                <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">                                        
                                        <table>
                                                <thead>
                                                        <tr>
                                                                <td class="label_m"><label>Material</label></td>
                                                                <td class="label_m"><label>Unit</label></td>
                                                                <td class="label_m"><label>Received</label></td>
                                                        </tr>
                                                </thead>
                                                <tbody class="materials_table">
                                                   <?php foreach ($materials as $material) { ?>
                                                        <tr class="this_material_<?= $material['product_id']?> ">
                                                                <td><input style="width:400px;max-width:357px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
                                                                <td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['unit_name'] ?> (<?= $material['equivalencia'] ?><?= $material['unidad_destino'] ?>)" /></td>                        
                                                                <td><input style="width:55px;margin-right:0;" type="text" value="0" class="material_qty" id="material_<?= $material['product_id']?>" /></td>
                                                        </tr>
                                                   <?php } ?>
                                                </tbody>
                                        </table>                                        
                                </div>
                                <div class="simpleTabsContent" style="top:40px;border-bottom:1px solid #E0E0E0;">
                                        
                                </div>
                        </div>
                </div>
                <a href="#" class="close_link" style="float: left; margin-top: 500px;">Cancel</a>
                <input type="button" value="Register Stock Transfers" style="float:right; margin-top: 500px;" class="btn_new_transfer" />
		</div>
	</div>
</div>
