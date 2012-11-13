<div class="this_panel" id="inventario">
     <h2>Materials</h2>

        <div class="simpleTabs">
                <ul class="simpleTabsNavigation">
                        <li><a href="#">Daily Report</a></li>            
                        <li><a href="#">Equipment</a></li>
                        <li><a href="#">Status</a></li>               
                        <li><a href="#">Today Consumptions</a></li> 
                        <li><a href="#">Incoming Materials</a></li>
                        <li><a href="#">Outgoing Materials</a></li>
                </ul>
                <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
                        <fieldset>
                                <legend>Please note:</legend>
                                <p>In the report will appear the first 22 products. To set this order, please use the drop down list on the left of each product.</p>
                        </fieldset>
                        <fieldset>

                        </fieldset>
                </div>
                <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
                        <fieldset>
                                <table>
                                        <thead>
                                             <tr>
                                               <td class="label_m"><label>Material Name</label></td>
                                               <td class="label_m"><label>Unit</label></td>
                                               <td class="label_m"><label>SG</label></td>
                                               <td class="label_m"><label>U. Cost</label></td>
                                               <td class="label_m"><label>Initial</label></td>
                                               <td class="label_m"><label>Received.</label></td>
                                               <td class="label_m"><label>Transf.</label></td>
                                               <td class="label_m"><label>Used</label></td>
                                               <td class="label_m"><label>Stock</label></td>
                                               <td class="label_m"><label>T. Cost</label></td>
                                             </tr>     
                                        </thead>
                                        <tbody id="materials_status_table">
                                           <!-- ajax loadaded -->
                                        </tbody>     
                                </table>
                        </fieldset>
                </div> 
                <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
                        <fieldset>
                                <table>
                                        <thead>
                                             <tr>
                                               <td class="label_m" style="width:300px;max-width:500px;"><label>Equipment Name</label></td>
                                               <td class="label_m" style="width:100px;"><label>Unit</label></td>                                
                                               <td class="label_m" style="width:55px;"><label>U. Cost</label></td>
                                               <td class="label_m" style="width:55px;"><label>Used</label></td>                                
                                               <td class="label_m" style="width:55px;"><label>T. Cost</label></td>
                                             </tr>     
                                        </thead>
                                        <tbody id="equipment_status_table">
                                           <!-- ajax loadaded -->
                                        </tbody>     
                                </table>
                        </fieldset>
                </div>
                <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
                        <fieldset>
                                <legend>Material Consumptions for <?php if($project['spud_date'] != ''){ echo $project['last_report_meta']['date'];} ?> (Report <?= str_pad($project['last_report'], 4, "0", STR_PAD_LEFT); ?>)</legend>
                                <table>
                                        <thead>
                                                <tr>
                                                        <td class="label_m"><label>Material</label></td>
                                                        <td class="label_m"><label>Unit</label></td>
                                                        <td class="label_m"><label>Active</label></td>
                                                        <?php foreach($pill_tanks as $tank){ ?>
                                                                <td class="label_m"><label><?= $tank['tank_name'] ?></label></td>
                                                        <?php }?>
                                                        <?php foreach($reserve_tanks as $tank){ ?>
                                                        <?php if($tank['name'] < 32){ ?>
                                                                <td class="label_m"><label><?= $tank['tank_name'] ?></label></td>
                                                        <?php } ?>
                                                        <?php }?>
                                                        <td class="label_m"><label>T. Used</label></td>
                                                </tr>
                                        </thead>
                                        <tbody class="materials_table" id="today_consumptions_table">
                                        <!-- ajax loadaded-->
                                        </tbody>
                                </table>
                        </fieldset> 
                </div>                    
                <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">                        
                        <input type="button" style="margin-top:20px;" value="New incoming stock transfers" class="btn_stock_transfers" />                                
                </div>                
                <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
                        <fieldset>
                                <legend>Outgoing</legend>
                        </fieldset>
                </div>                
        </div>
     
</div>