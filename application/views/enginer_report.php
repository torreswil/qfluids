<div style="margin:0 auto; width:800px;">
	<h2 style="color:#259271;text-transform:uppercase;margin-top:50px;"><?= $enginer['name']?> <?= $enginer['lastname']	?> - <?= $enginer['identification']	?></h2>
	<h3 style="color:#666;text-transform:uppercase;margin-bottom:50px;">WORK REPORT FOR <?= $this->session->userdata['project']['well_name'] ?> (<?= $this->session->userdata['project']['operator'] ?>)</h3>

	<?php if(count($periods) > 0){ ?>
        <fieldset>                
                <table class="datatable" style="width:800px">
                        <thead>
                                <tr>
                                        <td>Well</td>
                                        <td>Operator</td>
                                        <td>Date</td>
                                        <td>Rate</td>
                                        <td>Cover</td>
                                </tr>
                        </thead>
                        <tbody>
                                <?php foreach($periods as $period){ ?>
                                <tr style="cursor:default;">
                                        <td><?php echo $period['well_name']; ?></td>
                                        <td><?php echo $period['operator']; ?></td>
                                        <td><?php echo date("Y-m-d", strtotime($period['date']));?></td>
                                        <td><?php echo $period['rate']; ?></td>
                                        <td><?php echo ($period['cover'] == '1') ? 'YES' : 'NO';?></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                </table>
        </fieldset>
	<?php } ?>
</div>
