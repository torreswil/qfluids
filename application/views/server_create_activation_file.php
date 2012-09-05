<?php if($filename == ''){ ?>
	<?= form_open('/server/index'); ?>
		<table style="margin:20px auto;">
			<tr>
				<td>ERP PROJECT ID:</td>
				<td><input type="text" name="transactional_id"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Create Activation File"></td>
			</tr>
		</table>
	<?= form_close(); ?>
<?php }else{ ?>
	<p style="margin-top:20px;text-align:center;">Activation key created. <a href="/<?= $filename?>" download>Save now</a></p>
<?php } ?>