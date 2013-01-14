<?php $this->load->view('header'); ?>

	<div id="main_content">
		<?php echo (!empty($msg)) ? $msg : 'implementar mensagem no controller!!'; ?>
	</div><!-- end main_content -->

<script type="text/javascript">

	var delay	= 3000;
	var url		= '<?php echo base_url($redirTo); ?>';
	setTimeout(function(){ window.location.href = url; }, delay);

</script>