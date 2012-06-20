<div class="top_tools">
	<div class="app_name">
		<h1>Qmax Colombia LTDA:</h1> qFluids V.2012.06.19
	</div>
	<div class="user_tools">
		<span class="user_completename">Juan Pérez</span> - <a href="#">Logout</a>
	</div>
</div>

<div class="qfluids_wrapper">
	<div class="sidebar">
		<?php $this->load->view('partials/sidebar'); ?>
	</div>
	
	<div class="panels">
		<div id="project_info">
			<table>
				<tr>
					<td><strong>SPUD DAY:</strong><br />2012-06-19</td>
					<td width="25"></td>
					<td><strong>DATE:</strong><br />2012-06-19</td>
					<td width="25"></td>
					<td><strong>Operadora:</strong><br />QMAX.DEV</td>
					<td width="25"></td>
					<td><strong>Report #:</strong><br />0001</td>
					<td width="25"></td>
					<td><strong>Well:</strong><br /><input type="text" placeholder="Nombre del Pozo" /></td>
					<td width="25"></td>
					<td><strong>Rig:</strong><br /><input type="text" placeholder="Nombre del Taladro" /></td>
				</tr>
			</table>	
		</div>
		
		<!-- PANELES DE DATOS DE ENTRADA-->
		<?php $this->load->view('estado_mecanico'); ?>
		<?php $this->load->view('datos_medianoche'); ?>
		<?php $this->load->view('propiedades_lodo'); ?>
		<?php $this->load->view('inventario'); ?>
		<?php $this->load->view('volumenes'); ?>

	</div>
</div>