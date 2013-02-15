
<?php 
    $this->load->view('header');  
	$today = getdate();
	$usr_id = $this->uri->segment(3);
	#@TODO definir nível de acesso
	$usr = new Usuario();
	$usr->where('id',$usr_id)->get();
	
?>
<style type="text/css">
.message_to{
	font-size:18px;
	font-weight:bold;
	color:#000;	
}
.message_to_sub {
	font-size:10px;
	font-style:italic;
	color:#666;
}
	.saldo { color:#093; }
	.nome { color:#999; }
	.lancamento0 { color:#000; }
	.lancamento1 { color:#C00; }
	
#message_content
{
	width:100%;
	margin-top:15px;
	margin-bottom:15px;
}
#message_content p
{
	padding-top:12px;
	line-height:200%;
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
    theme : "advanced",
    theme_advanced_buttons1 : "mylistbox,mysplitbutton,bold,italic,underline,strikethrough,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,outdent,indent,blockquote,|,bullist,numlist,|,undo,redo,cut,copy,paste,|,link,unlink,anchor,cleanup,code,|,forecolor,backcolor,|,hr,charmap",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "center",
    theme_advanced_statusbar_location : "bottom"
});
</script>




<!-- /TinyMCE -->


<div id="main_content">	


 <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well"><h2>Ajuda</h2>
      
    </div>
    <div id="message_content"><?php echo $aj->conteudo; ?></div>
</div>
<?php
    $this->load->view('footer'); 
?>
