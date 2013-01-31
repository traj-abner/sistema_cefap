
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
	
table td{
	padding-left:20px;
	padding-top: 20px;
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
		theme : "simple"
	});
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
    <div class="well"><h2>Adicionar Créditos</h2>
      
    </div>
    
    <?php 
	#stage 1
	if ($stage == 1): ?>
     <?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'usuarios_creditos', 'name' => 'frmusuarios')
    );

        echo form_open('creditos/inserir',$attributes['form']);
    ?>
  		
    
    <div><strong class="message_to">Inserir Créditos para:</strong><br /><em class="message_to_sub">(Segure a tecla Ctrl para selecionar mais de um)</em></div> 
    <select name="to[]" multiple="multiple" size="4">
                <?php foreach ($ur as $u):?>
                    <option 
                    <?php
                        if ($directed):
                            foreach($to as $rec):
                                if ($rec == $u->id):
                                    echo 'selected="selected" ';
                                endif;
                            endforeach;
                        endif;
                    
                    ?>
                    value="<?php echo $u->id; ?>"><?php echo $u->nome; ?></option>
                <?php endforeach; ?>
            </select>
         	<br />
                <input type="submit" class="btn btn-primary" style="margin-top:20px;" />
      </form><?php endif; ?>
      
      <?php 
	  #stage 2
	  if ($stage == 2): ?>
     <?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'usuarios_creditos', 'name' => 'frmusuarios')
    );

        echo form_open('creditos/inserir',$attributes['form']);
    ?>
  		
		<table>
        	<tr>
            	<td align="right">Valor a Inserir:</td>
                <td align="left" class="td"><?php echo SIMBOLO_MOEDA_DEFAULT; ?> <input type="text" name="valor" /> </td>
            </tr>
            <?php if ($uRole < CREDENCIAL_USUARIO_SUPERADMIN): ?>
            <tr>
            	<td align="right">Taxa de Geração de Boleto:</td>
                <td align="left" class="td"><?php echo $taxa_boleto; ?></td>
            </tr>
            <?php endif; ?>
            <tr>
            	<td align="right"> Observações:</td>
                <td align="left"><input type="text" name="obs" style="width:650px;" maxlength="300" /></td>
            </tr>
            <tr>
            	<td align="right"><input type="submit" class="btn btn-primary" /></td>
                <td align="left">&nbsp;</td>
            </tr>
        </table>
      <input type="hidden" name="to" value="<?php echo $to; ?>" />
      </form><?php endif; ?>
      
      <?php
	  if ($stage == 3 and $uRole < CREDENCIAL_USUARIO_SUPERADMIN):
	  ?>
        <div>
        	<a class="btn btn-success" href="<?php echo base_url('creditos/imprimir_boleto/'.$code); ?>" target="_blank"><i class="icon-print icon-white"></i> Imprimir Boleto</a>
        </div>
      <?php endif; ?>
</div>

<?php
    $this->load->view('footer'); 
?>
