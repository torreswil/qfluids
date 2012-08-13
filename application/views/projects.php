<div class="project_selector">
	<h1 style="width:600px;padding:0 20px 20px 20px">Please select a Project to start:</h1>
	<div class="projects">
		<div class="filter_section">
			<label>Filter:</label>
			<input type="text" placeholder="Search..." />
		</div>
		<input type="button" value="New Project" id="btn_new_project">
		<table>
			<thead>
				<tr>
					<td>Spud Day</td>
					<td>Operator</td>
					<td>Well Name</td>
					<td>Last Modified</td>
				</tr>
			</thead>
			<tbody id="project_list_tbody">
				<tr>
					<td>2012-08-10</td>
					<td>ECOPETROL</td>
					<td>GUATIGUARÁ 1</td>
					<td>2012-08-10 14:50:25</td>
				</tr>
				<tr>
					<td>2012-08-10</td>
					<td>ECOPETROL</td>
					<td>GUATIGUARÁ 1</td>
					<td>2012-08-10 14:50:25</td>
				</tr>
				<tr>
					<td>2012-08-10</td>
					<td>ECOPETROL</td>
					<td>GUATIGUARÁ 1</td>
					<td>2012-08-10 14:50:25</td>
				</tr>
				<tr>
					<td>2012-08-10</td>
					<td>ECOPETROL</td>
					<td>GUATIGUARÁ 1</td>
					<td>2012-08-10 14:50:25</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div id="hidden_sections">
	<?php $this->load->view('new_project'); ?>
</div>
