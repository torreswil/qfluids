<div class="this_panel" id="inventario">
     <h2>Materials</h2>

     <div class="simpleTabs">
          <ul class="simpleTabsNavigation">
               <li><a href="#">Status</a></li>
               <!-- <li><a href="#">Incoming Materials</a></li> -->
               <!-- <li><a href="#">Outgoing Materials</a></li> --> 
               <li><a href="#">Today Consumptions</a></li> 
               <li><a href="#">Volumenes por quimica</a></li>             
          </ul>
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
                            <?php foreach ($materials as $material) { ?>
                              <tr class="this_material_<?= $material['product_id']?> ">
                                <td><input style="width:300px;max-width:500px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
                                <td><input style="width:100px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['egravity'] ?>" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="$<?= $material['price'] ?>" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" id="minitial_<?= $material['product_id']?>" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" id="mreceived_<?= $material['product_id']?>" value="" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" id="mtransf_<?= $material['product_id']?>" value="" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="" id="stotal_consumption_today_<?= $material['product_id']?>" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="" id="mstock_<?= $material['product_id']?>" class="mstock" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="" /></td>
                              </tr> 
                            <?php } ?>
                         </tbody>     
                    </table>
               </fieldset>
          </div>
          <!--
          <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
               <fieldset id="incoming_stock_transfer_fieldset">
                    <legend>Incoming</legend>
                    <table style="margin-bottom:20px;" class="general_st_info">
                        <tr>
                            <td class="label_m"><label>Stock Transfer Number:</label></td>
                            <td class="label_m"><label>Origin:</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" style="width:200px;" class="st_number" /></td>
                            <td><input type="text" style="width:200px;" class="st_origin" /></td>
                        </tr>
                    </table>
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
                    <input type="button" style="margin-top:20px;" value="Load Materials" class="btn_new_transfer" />
               </fieldset>
               <fieldset>
                    <legend>Archive</legend>
                    <table>
                         <thead>
                              <tr>
                                <td></td>
                                <td class="label_m"><label>Date</label></td>
                                <td class="label_m"><label>Code</label></td>
                                <td class="label_m"><label>Origin</label></td>
                                <td class="label_m"><label>Destiny</label></td>
                              </tr>
                         </thead>
                         <tbody id="incoming_stock_list">
                              
                         </tbody>
                    </table>
               </fieldset>
            </div>
            <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
               <fieldset>
                    <legend>Outgoing</legend>
               </fieldset>
            </div>
          -->
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
                     <tbody class="materials_table">
                        <?php foreach ($materials as $material) { ?>
                            <tr class="this_material_<?= $material['product_id']?> ">
                                <td><input style="width:200px;max-width:357px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
                                <td><input type="text" style="width:55px;margin-right:0;" id="iused_<?= $material['product_id'] ?>_0" class="used_<?= $material['product_id'] ?>" disabled /></td>
                                <?php foreach($pill_tanks as $tank){ ?>
                                  <td><input type="text" style="width:55px;margin-right:0;" id="iused_<?= $material['product_id'] ?>_<?= $tank['id'] ?>" class="used_<?= $material['product_id'] ?>" disabled /></td>
                                <?php }?>
                                <?php foreach($reserve_tanks as $tank){ ?>
                                  <?php if($tank['name'] < 32){ ?>
                                    <td><input type="text" style="width:55px;margin-right:0;" id="iused_<?= $material['product_id'] ?>_<?= $tank['id'] ?>" class="used_<?= $material['product_id'] ?>" disabled /></td>
                                  <?php } ?>
                                <?php }?>
                                <td><input type="text" style="width:55px;margin-right:0;" disabled id="total_consumption_today_<?= $material['product_id'] ?>" class="total_consumption_today" disabled /></td>
                            </tr>
                        <?php } ?>
                     </tbody>
                </table>
              </fieldset> 
            </div>


            <!-- TABLA DE VOLUMENES POR QUIMICA -->
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
                     <tbody class="materials_table">
                        <?php foreach ($materials as $material) { ?>
                            <tr class="this_material_<?= $material['product_id']?> ">
                                <td><input style="width:200px;max-width:357px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
                                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
                                <td><input type="text" style="width:55px;margin-right:0;" id="ivolincr_<?= $material['product_id'] ?>_0" class="used_<?= $material['product_id'] ?>" disabled /></td>
                                <?php foreach($pill_tanks as $tank){ ?>
                                  <td><input type="text" style="width:55px;margin-right:0;" id="ivolincr_<?= $material['product_id'] ?>_<?= $tank['id'] ?>" class="used_<?= $material['product_id'] ?>" disabled /></td>
                                <?php }?>
                                <?php foreach($reserve_tanks as $tank){ ?>
                                  <?php if($tank['name'] < 32){ ?>
                                    <td><input type="text" style="width:55px;margin-right:0;" id="ivolincr_<?= $material['product_id'] ?>_<?= $tank['id'] ?>" class="used_<?= $material['product_id'] ?>" disabled /></td>
                                  <?php } ?>
                                <?php }?>
                                <td><input type="text" style="width:55px;margin-right:0;" disabled id="total_consumption_today_<?= $material['product_id'] ?>" class="total_consumption_today" disabled /></td>
                            </tr>
                        <?php } ?>
                     </tbody>
                </table>
              </fieldset> 
            </div>  
     </div>
</div>