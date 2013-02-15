
<?php 
    $this->load->view('header');  
	$today = getdate();
	$usr_id = $this->uri->segment(3);
	#@TODO definir nível de acesso
	$usr = new Usuario();
	$usr->where('id',$usr_id)->get();
	
?>
<style type="text/css">
.message_to_sub {
	font-size:10px;
	font-style:italic;
	color:#666;
}

#message_header
{
	width: 100%;
	height: 50px;
	border-bottom:thin;
	border-bottom-style:solid;
	border-bottom-color:#999;
	font-size:12px;
}

#message_content
{
	width:100%;
	height:500px;
	overflow:scroll;
	margin-top:15px;
	margin-bottom:15px;
}
#message_content p
{
	padding-top:12px;
	line-height:200%;
	text-align:justify;
}
#message_content hr
{
	background-color:#333;
	height:1px;
}
#message_content h1 { color:#000; font-size:18px; font-weight:bold; text-align:inherit; padding-left:0px; }
#message_content h3 { color:#000; font-size:16px; font-weight:bold; text-align:inherit; padding-top:20px; }
#message_content h3 { color:#000; font-size:14px; font-weight:bold; text-align:inherit; padding-top:20px; }
#message_content h4 { color:#000; font-size:12px; font-weight:bold; font-style:italic; text-align:inherit; padding-top:20px; }
#message_content h5 { color:#000; font-size:12px; font-style:italic; text-align:inherit; padding-top:20px; }
#message_content h6 { color:#000; font-size:10px; font-style:italic; text-align:inherit; padding-top:20px; }

#message_content ul, ol {
	padding-left:25px;
	padding-bottom:15px;
	padding-top:15px;
	line-height:150%;
	}
#message_content ul li {
	list-style-type:circle;
}
#message_content ol li {
	list-style-type:decimal;
}
#message_content ol li li {
	list-style-type:lower-alpha;
}
#message_content ol li li li {
	list-style-type:lower-greek;
}
#message_content h1 sup, h2 sup, h3 sup, h4 sup, h5 sup, sup {font-size:9px;}
	
	
	
/*css seleção de quantidade de registros por página*/
 .select p {text-align: center; background-color: #FFFFFF; border: 0px #FFFFFF}
   .qntd_usuario_listar {float: right; margin-top:-32px;}
   #selectQntd {margin-top: 2px; margin-left:25%}
   .img-order{background-image: url(images/asc.png);}
   /*css modal*/
   #myModal {height:200px; width: 400px; margin-left: 0px; margin-top:40px;}
   .modal.fade.in {top:27%; bottom: 10%;}
   .modal-body {max-height:588px;}
   .modal {left: 41%;}
   .btn-right {margin-left: 550px;}
   .btn-right-creditos {margin-left: 257px; margin-top: -20px;}
   .modal th {background-color: #ccc}
   #btn-right-listar{float:right; margin-right: 20px;}}


  
</style>

<script type="text/javascript" src="<?php echo base_url('js/tiny_mce/tiny_mce.js'); ?>"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
	
	function confirmDeletion()
	{
	var r = confirm("Deseja realmente excluir essa mensagem?");
	if (r==true)
	  {
	  		window.location.href = '<?php echo base_url('mensagens/mudar_status/'.STATUS_MSG_EXCLUIDA.'/'.$ms->keygen); ?>';
	  }
	else
	  {
	  }
	}
</script>




<!-- /TinyMCE -->


<div id="main_content">	
<?php
	if ($msg != ''): ?>
    
    <div class="<?php echo $alert_class; ?>">
		<?php echo $msg; ?>
	</div>

	
<?php	endif;
?>
 <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well">
    	<div class="btn-group">
          <button class="btn btn-success" onclick="document.location='<?php echo base_url('mensagens/escrever/responder/'.$ms->keygen); ?>'">Responder</button>
          <button class="btn btn-success" onclick="document.location='<?php echo base_url('mensagens/escrever/encaminhar/'.$ms->keygen); ?>'">Encaminhar</button>
        </div>   
        <div class="btn-group">
          <button class="btn" onclick="document.location='<?php echo base_url('mensagens/mudar_status/'.STATUS_MSG_LIDA.'/'.$ms->keygen); ?>'">Marcar como Lida</button>
          <button class="btn" onclick="document.location='<?php echo base_url('mensagens/mudar_status/'.STATUS_MSG_NAO_LIDA.'/'.$ms->keygen); ?>'">Marcar como Não Lida</button>
        </div>  
        <div class="btn-group">
          <button class="btn btn-danger" onclick="confirmDeletion()">Excluir</button>
        </div>  
    </div>
    
    <div id="message_header">
    	<strong>De:</strong> <?php echo $sender->nome; ?><br />
        <strong>Para:</strong> <?php echo $receiver; ?><br />
        <strong>Assunto:</strong> <?php echo $ms->assunto; ?><br />
        <strong>Data de Envio:</strong> <?php echo $sent; ?><br />
    </div>
    <div id="message_content">
    	<?php echo $ms->conteudo; ?>
    </div>

</div>
<?php
    $this->load->view('footer'); 
?>
