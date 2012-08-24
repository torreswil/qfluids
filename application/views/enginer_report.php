<div style="margin:0 auto; width:800px;">
	<h1 style="color:#259271;text-transform:uppercase;margin-top:50px;"><?= $enginer['name']?> <?= $enginer['lastname']	?> - <?= $enginer['identification']	?></h1>
	<h2 style="color:#666;text-transform:uppercase;margin-bottom:50px;">WORK REPORT FOR <?= $this->session->userdata['project']['well_name'] ?> (<?= $this->session->userdata['project']['operator'] ?>)</h2>

	<?php if(count($periods) > 0){ ?>

	<table class="datatable" style="width:800px">
		<thead>
			<tr>
				<td>Well</td><td>Date</td><td>Period</td><td>Registered at</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($periods as $period){ ?>
			<tr style="cursor:default;">
				<td><?= $this->session->userdata['project']['well_name'] ?></td>
				<td>
					<?php 
						$dia = date_create($period['timestamp']);
						echo date_format($dia, 'Y-m-d');
					?>
				</td>
				<td>
					<?php $period['period'] == '1' ? $period_st = '06:00 - 17:59' : $period_st = '18:00 - 5:59'; ?>
					<?= $period_st; ?>
				</td>
				<td>
					<?php 
						$hora = date_create($period['timestamp']);
						echo date_format($hora, 'H:i:s');
					?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>
</div>
