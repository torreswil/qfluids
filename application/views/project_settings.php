<?php 
	if($project['last_report'] == 0){
		$settings_style	='display:block;';
	}else{
		$settings_style	='display:none;';
	}
?>
<div class="options_panel" id="project_settings" style="<?= $settings_style ?>">
	<div class="op_content">
		<div class="options_sidebar">
			<h1>Qmud Plan</h1>
			<ul>
				<li><a href="#general">General</a></li>
				<li><a href="#rig">Rig</a></li>
				<li><a href="#cse">Control Solids Eq.</a></li>
				<li><a href="#tanks">Tanks</a></li>
				<li><a href="#mudproperties">Mud properties</a></li>
				<li><a href="#enginers" id="personal_settings_link">Personal</a></li>
			</ul>
			<input type="button" value="Close Settings" id="close_settings_btn" class="just_close" />
		</div>
		<div class="content">
			<?php $this->load->view('settings/general'); ?>
			<?php $this->load->view('settings/rig'); ?>
			<?php $this->load->view('settings/cse'); ?>
			<?php $this->load->view('settings/tanks'); ?>
			<?php $this->load->view('settings/mud_properties'); ?>
			<?php $this->load->view('settings/personal'); ?>
		</div>
	</div>
</div>