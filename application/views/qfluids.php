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
					<td><strong>Spud Day:</strong></td><td>2012-06-19</td>
					<td><strong>Date:</strong></td><td>2012-06-19</td>
					<td><strong>Operadora:</strong></td><td>QMAX.DEV</td>
					<td><strong>Report Number:</strong></td><td>0001</td>
					<td><strong>Well:</strong></td><td><input type="text" value="Nombre del Pozo" /></td>
					<td><strong>Rig:</strong></td><td><input type="text" value="Nombre del taladro" /></td>
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
				<table>
					<tr>
						<td class="label_m"><label class="emphasis">OPEN HOLE:</label></td>
						<td><input type="text"></td>
						<td class="label_m"><label>Rice & Carbide Test:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label>Cuttings & Caving record:</label></td>
						<td><input type="text"></td>
						<td class="label_m"><label>Caliper:</label></td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="label_m"><label class="emphasis">WASHOUT (%):</label></td>
						<td><input type="text" disabled="disabled"></td>
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
						<td class="label_m"><label>Drill Pipe diameter [internal]:</label></td>
						<td><input type="text" /></td>

						<td class="label_m"><label>Drill Pipe diameter [external]:</label></td>
						<td><input type="text" /></td>
					</tr>
				</table>
			</fieldset>
		</div>

	</div>
</div>