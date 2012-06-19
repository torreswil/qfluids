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
		

		<div class="this_panel" id="estado_mecanico">
			<h2>Estado Mecánico</h2>
			<table>
				<tr>
					<td class="label_m">
						<label>DEPTH MD:</label>
					</td>
					<td>
						<input type="text" />
					</td>
					<td class="label_m">
						<label>BIT DEPTH:</label>
					</td>
					<td>
						<input type="text" />
					</td>
				</tr>
			</table>
			
			<!-- HOLE -->
			<fieldset>
				<legend>Hole</legend>
				<h4>Washout Estimation From:</h4>
				<p>
					Estimación del washout por incremento en pulgadas del diametro del pozo estimada
					por los siguientes items:
				</p>
				<table style="float:left;">
					<tr>
						<td class="label_m"><label class="emphasis">OPEN HOLE:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label>Rice & Carbide Test:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label>Cuttings & Caving record:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label>Caliper:</label></td>
						<td><input type="text"></td>
					</tr>
				</table>
				<table style="float:left;">
					<tr>
						<td class="label_m"><label class="emphasis">WASHOUT (%):</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
					<tr>
						<td class="label_m"><label class="emphasis">AVERAGE HOLE:</label></td>
						<td><input type="text" disabled="disabled"></td>
					</tr>
				</table>
			</fieldset>

			<!-- BIT -->
			<fieldset>
				<legend>Bit</legend>
				<table>
					<tr>
						<td class="label_m"><label>Bit #:</label></td>
						<td><input type="text"></td>
						
						<td class="label_m"><label>Bit Diameter:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label>Type:</label></td>
						<td><input type="text"></td>
						
						<td class="label_m"><label>Jets Number:</label></td>
						<td><input type="text"></td>
					</tr>
				</table>
				<fieldset>
					<legend>Jets</legend>
					<table>
						<tr>
							<td><input type="text" placeholder="1"></td>
							<td><input type="text" placeholder="2"></td>
							<td><input type="text" placeholder="3"></td>
							<td><input type="text" placeholder="4"></td>
						</tr>
						<tr>
							<td><input type="text" placeholder="5"></td>
							<td><input type="text" placeholder="6"></td>
							<td><input type="text" placeholder="7"></td>
							<td><input type="text" placeholder="8"></td>
						</tr>
						<tr>
							<td><input type="text" placeholder="9"></td>
							<td><input type="text" placeholder="10"></td>
							<td><input type="text" placeholder="11"></td>
							<td><input type="text" placeholder="12"></td>
						</tr>
					</table>
				</fieldset>
			</fieldset>

			<!-- CASING -->
			<fieldset>
				<legend>Casing</legend>

				<table>
					<tr>
						<td class="label_m"><label>Name:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Name:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Name:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Name:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Name:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Name:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr>
				</table>
			</fieldset>

			<!-- DRILL STRING -->
			<fieldset>
				<legend>Drill String</legend>
				<table>
					<tr>
						<td class="label_m"><label>BHA#:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>TOTAL LENGTH BHA:</label></td>
						<td><input type="text" /></td>
					</tr>
				</table>
				<table>
					<tr>
						<td class="label_m"><label>Section:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>Section:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr><tr>
						<td class="label_m"><label>Section:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr><tr>
						<td class="label_m"><label>Section:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr><tr>
						<td class="label_m"><label>Section:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr><tr>
						<td class="label_m"><label>Section:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>OD:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>ID:</label></td>
						<td><input type="text" /></td>
						
						<td class="label_m"><label>Length:</label></td>
						<td><input type="text" /></td>
					</tr>	
				</table>
				<table>
					<tr>
						<td class="label_m"><label>Drill Pipe diameter [internal]:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>Drill Pipe diameter [external]:</label></td>
						<td><input type="text" /></td>
					</tr>
				</table>
			</fieldset>

			<!-- MUD PUMP -->
			<fieldset>
				<legend>Mud pump</legend>
				<table>
					<tr>
						<td></td>
						<td class="label_m"><label>PUMP 1:</label></td>
						<td class="label_m"><label>PUMP 2:</label></td>
						<td class="label_m"><label>PUMP 3:</label></td>
						<td class="label_m"><label>PUMP 4:</label></td>
					</tr>
					<tr>
						<td class="label_m"><label>LINER/STK:</label></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>GAL/STK:</label></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>SPM/STK:</label></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td class="label_m"><label>GAL:</label></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
						<td><input type="text" /></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="label_m"><label>TOTAL GAL:</label></td>
						<td><input type="text" /></td>
					</tr>
				</table>
			</fieldset>
		</div>

	</div>
</div>