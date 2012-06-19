<?php $this->load->view('partials/head'); ?>
	<div class="main_content <?= $main_content ?>">
		<?php $this->load->view($main_content); ?>
	</div>
<?php $this->load->view('partials/footer'); ?>