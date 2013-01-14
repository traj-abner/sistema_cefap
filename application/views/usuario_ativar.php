<?php $this->load->view('header'); ?>

	<div id="main_content">
<?php
    if(isset($msg) && isset($msg_type)){ ?>
       <div class="alert <?php echo $msg_type?>" id="alert-success">
           <button type="button" class="close" data-dismiss="alert">×</button>
           <?php echo $msg; ?>
       </div> 
    <?php 

    }else{
        echo ('');

    }

     ?> 
	</div><!-- end main_content -->

<?php $this->load->view('footer'); ?>

<script type="text/javascript">

	var delay	= 4000;
	var url		= '<?php echo base_url("/main/"); ?>';
	setTimeout(function(){ window.location.href = url; }, delay);

</script>