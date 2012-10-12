<div class="this_panel" id="concentrations">
	<h2>Concentrations</h2>

     <div class="simpleTabs">
          <ul class="simpleTabsNavigation">
               <li><a href="#">Status</a></li>
               <li><a href="#">Concentrationes Iniciales</a></li>            
          </ul>
          <div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
			<fieldset>
				<legend>Material Concentrations status per Tank</legend>
				<table>
				     <thead>
				          <tr>
				            <td class="label_m"><label>Material</label></td>
				            <td class="label_m"><label>Unit</label></td>
				            <td class="label_m"><label>U. Cost</label></td>
				            <td class="label_m"><label>Active</label></td>
				            <?php foreach($pill_tanks as $tank){ ?>
				              <td class="label_m"><label><?= $tank['tank_name'] ?></label></td>
				            <?php }?>
				            <?php foreach($reserve_tanks as $tank){ ?>
				              <?php if($tank['name'] < 32){ ?>
				                <td class="label_m"><label><?= $tank['tank_name'] ?></label></td>
				              <?php } ?>
				            <?php }?>
				            <td class="label_m"><label>T. Consu.</label></td>
				            <td class="label_m"><label>T. Cost</label></td>
				          </tr>
				     </thead>
				     <tbody class="materials_table">
				        <?php foreach ($materials as $material) { ?>
				            <tr class="this_material_<?= $material['product_id']?> ">
				                <td><input style="width:200px;max-width:357px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
				                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
				                <td><input type="text" style="width:55px;margin-right:0;" value="<?= $material['price'] ?>" disabled /></td>
				                <td><input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_0" disabled /></td>
				                <?php foreach($pill_tanks as $tank){ ?>
				                  <td><input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_<?= $tank['id'] ?>" disabled /></td>
				                <?php }?>
				                <?php foreach($reserve_tanks as $tank){ ?>
				                  <?php if($tank['name'] < 32){ ?>
				                    <td><input type="text" style="width:55px;margin-right:0;" id="currentconc_<?= $material['product_id']?>_<?= $tank['id'] ?>" disabled /></td>
				                  <?php } ?>
				                <?php }?>
				                <td><input type="text" style="width:55px;margin-right:0;" disabled /></td>
				                <td><input type="text" style="width:55px;margin-right:0;" disabled /></td>
				            </tr>
				        <?php } ?>
				     </tbody>
				</table>
			</fieldset> 
		</div>
		<div class="simpleTabsContent" style="border-bottom:1px solid #E0E0E0;">
			<fieldset>
				<legend>Chemical concentration per Tank</legend>
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
				          </tr>
				     </thead>
				     <tbody class="materials_table">
				        <?php foreach ($materials as $material) { ?>
				            <tr class="this_material_<?= $material['product_id']?> ">
				                <td><input style="width:200px;max-width:357px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['commercial_name'] ?>" /></td>
				                <td><input style="width:55px;margin-right:0;" type="text" disabled="disabled" value="<?= $material['equivalencia'] ?> <?= $material['unidad_destino'] ?>" /></td>
				                <td><input type="text" style="width:55px;margin-right:0;" id="lastconc_<?= $material['product_id']?>_0" /></td>
				                <?php foreach($pill_tanks as $tank){ ?>
				                  <td><input type="text" style="width:55px;margin-right:0;" id="lastconc_<?= $material['product_id']?>_<?= $tank['id'] ?>" /></td>
				                <?php }?>
				                <?php foreach($reserve_tanks as $tank){ ?>
				                  <?php if($tank['name'] < 32){ ?>
				                    <td><input type="text" style="width:55px;margin-right:0;" id="lastconc_<?= $material['product_id']?>_<?= $tank['id'] ?>" /></td>
				                  <?php } ?>
				                <?php }?>
				            </tr>
				        <?php } ?>
				     </tbody>
				</table>
			</fieldset> 
		</div>
	</div>
</div>