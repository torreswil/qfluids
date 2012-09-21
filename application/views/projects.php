<div class="project_selector">
	<h1 style="width:600px;padding:0 20px 20px 20px">Please select a Project to start:</h1>
	<div class="projects">
		<div class="filter_section">
			<label>Filter:</label>
			<input type="text" placeholder="Search..." />
		</div>
		<input type="button" value="New Project" id="btn_new_project">
		<?php if(count($projects) > 0){ ?>
			<table>
				<thead>
					<tr>
						<td>Operator</td>
						<td>Well Name</td>
						<td>Field</td>
						<td>Spud Day</td>
						<td>Last Modified</td>
					</tr>
				</thead>
				<tbody id="project_list_tbody">
					<?php foreach ($projects as $project) { ?>
						<tr id="project_<?= $project['id'] ?>">
							<td><?= $project['operator'] ?></td>
							<td><?= $project['well_name'] ?></td>
							<td><?= $project['field'] ?></td>
							<td><?= $project['spud_date'] ?></td>
							<td><?= $project['last_modified'] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } ?>
	</div>
</div>

<div id="hidden_sections">
	<?php $this->load->view('new_project'); ?>
</div>
