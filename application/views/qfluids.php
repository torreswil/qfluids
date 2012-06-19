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
			<table style="float:right;">
				<tr>
					<td class="label_m"><strong>Spud Day:</strong></td>
					<td class="label_m">2012-06-19</td>
				</tr>
				<tr>	
					<td class="label_m"><strong>Date:</strong></td>
					<td class="label_m">2012-06-19</td>
				</tr>
			</table>
			<table style="float:right;margin-right:20px;">
				<tr>
					<td class="label_m"><strong>Operadora:</strong></td>
					<td class="label_m">QMAX.DEV</td>
				</tr>
				<tr>
					<td class="label_m"><strong>Report #:</strong></td>
					<td class="label_m">0001</td>
				</tr>
			</table>
			<table style="float:right;text-align:right;">
				<tr>
					<td class="label_m" style="text-align:right;"><strong>Well:</strong></td>
					<td><input type="text" placeholder="Nombre del Pozo" /></td>
				</tr>
				<tr>
					<td class="label_m" style="text-align:right;"><strong>Rig:</strong></td>
					<td><input type="text" placeholder="Nombre del taladro" /></td>
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