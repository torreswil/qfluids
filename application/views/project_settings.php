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
				<li><a href="#enginers">Personal</a></li>
			</ul>
			<p>NO OLVIDAR: este boton debe ser siempre cancelar a menos que se haga un cambio en la configuración (se convierte en reload project).</p>
			<input type="button" value="Reload Project & Close">
			<a href="#cancel" id="link_cancel_settings" style="display:block;float:left;width:100%;margin-top:15px;">Cancel</a>
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