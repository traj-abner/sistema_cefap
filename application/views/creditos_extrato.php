
<?php 
    $this->load->view('header');  
	$today = getdate();
	$usr_id = $this->uri->segment(3);
	#@TODO definir nível de acesso
	$usr = new Usuario();
	$usr->where('id',$usr_id)->get();
?>
<style type="text/css">
	.saldo { color:#093; }
	.nome { color:#999; }
	.lancamento0 { color:#000; }
	.lancamento1 { color:#C00; }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/modal-style.css"/>
<div id="myModal" class="modal hide fade">
</div>

<div id="main_content">	
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well"><h2><strong class="nome"><?php echo $usr->nome; ?></strong> (Saldo)<br /><strong class="saldo"><?php echo SIMBOLO_MOEDA . '&nbsp;' . number_format($sum,2,TS,DS)?></strong></h2>
        <div class="qntd_usuario_listar">
            <h3>Lan&ccedil;amentos por página:</h3>
            <select id="selectQntd" class="input-mini">
                    <option <?php if ($limit == '5') echo 'selected="selected"'; ?> value="5">5</option>
                    <option <?php if ($limit == '10') echo 'selected="selected"'; ?> value="10">10</option>
                    <option <?php if ($limit == '20') echo 'selected="selected"'; ?> value="20">20</option>
                    <option <?php if ($limit == '30') echo 'selected="selected"'; ?> value="30">30</option>
            </select>
        </div>
    </div>
    

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
    <?php if ($numrows > 0): ?>
<!-- tabela -->	
    <ul class="pager">
            <li><a href="<?php echo $buttonArray[0]; ?>"><i class="icon-fast-backward"></i></a></li>
            <li><a href="<?php echo $buttonArray[1]; ?>"><i class="icon-backward"></i></a></li>
            <li><input type="text" id="gotopage" class="input-mini input-page" /></li>
            <li><a href="<?php echo $buttonArray[2]; ?>"><i class="icon-forward"></i></a></li>
            <li><a href="<?php echo $buttonArray[3]; ?>"><i class="icon-fast-forward"></i></a></li> 
    </ul>
     
<table class="table">
    <caption >Lista de Lan&ccedil;amentos</caption>
        <thead>
                <tr>    
                        <th><input type="checkbox" name="selectALL" id="checkAll" onClick="toggleChecked(this.checked)"> </th>
                        <th><a href='<?php echo base_url("creditos/extrato/$usr_id/modified/$limit/$perpage/DESC"); ?>'>Data
                            <?php 
                                if(isset($img) && $img == 'modified'){
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/modified/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/modified/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("creditos/extrato/$usr_id/tipo/$limit/$perpage/ASC"); ?>'>Tipo de Lançamento
                            <?php 
                                if(isset($img) && $img == 'tipo'){
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/tipo/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/tipo/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("creditos/extrato/$usr_id/metodo_pagto/$limit/$perpage/ASC"); ?>'>Metodo de Pagamento
                            <?php 
                                if(isset($img) && $img == 'metodo_pagto'){
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/metodo_pagto/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/metodo_pagto/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("creditos/extrato/$usr_id/valor/$limit/$perpage/ASC"); ?>'>Valor
                            <?php 
                                if(isset($img) && $img == 'valor'){
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/valor/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/valor/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("creditos/extrato/$usr_id/status/$limit/$perpage/ASC"); ?>'>Status
                            <?php 
                                if(isset($img) && $img == 'status'){
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/status/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/status/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                         <th><a href='<?php echo base_url("creditos/extrato/$usr_id/obs/$limit/$perpage/ASC"); ?>'>Obs
                            <?php 
                                if(isset($img) && $img == 'obs'){
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/obs/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/extrato/$usr_id/obs/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                </tr>
        </thead>
        
        <tbody>  
            <?php 
			$i = 0;
			foreach($lcn as $lc): ?>

                <tr class="listar_usuario" id="usuario-<?php echo $lc->id?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $dvc[$i];?></td>
                        <td><?php 
							switch ($lc->tipo):
								case LANCAMENTO_CREDITO: echo 'Cr&eacute;dito'; break;
								case LANCAMENTO_DEBITO: echo 'D&eacute;bito'; break;
							endswitch;
						?></td>
                        <td><?php 
						if (strlen($lc->metodo_pagto) > 0):
							switch ($lc->metodo_pagto):
								case METODO_PAGTO_BOLETO: echo 'Boleto'; 
									echo ' - ('.$lc->boleto_nosso_numero.')';
									break;
								case METODO_PAGTO_DINHEIRO: echo 'Dinheiro'; break;
								case NULL: echo ''; break;
							endswitch;
						endif;	
						 ?></td>
                        <td class="lancamento<?php echo $lc->tipo; ?>"><?php if ($lc->tipo == LANCAMENTO_DEBITO) echo '- '; ?><?php echo SIMBOLO_MOEDA . '&nbsp;' . number_format($lc->valor,2,TS,DS)?></td>
                        <td><?php 
						switch ($lc->status):
								case STATUS_LANCAMENTO_ATIVO: echo 'Ativo'; break;
								case STATUS_LANCAMENTO_INATIVO: echo 'Inativo'; break;
								case STATUS_LANCAMENTO_CANCELADO: echo 'Cancelado'; break;
							endswitch;
						 ?>
                        </td>
                        <td><?php echo $lc->obs;?></td>
                </tr>
                
                
                <?php $i++;
				endforeach; ?>
        
        </tbody>
    </table>
    
    <?php echo $page; ?>
    <? else: 
	echo 'Nenhum registro encontrado';
	endif; ?>
    
</div>
<?php
    $this->load->view('footer'); 
?>
<script type="text/javascript">
    $(function () {
    $("#checkAll").change(function(){
    if (this.checked) {
        $(".chM").attr({ checked: true });
    }else {
        $(".chM").attr({ checked: false });
     }
    });
    $(".chM").change(function(){
        if ($("#main").attr('checked') == true) {
            $("#main").attr({ checked: false })
        }
    });
    });
    
    jQuery(document).ready(function(){
        Array.prototype.join = function(separator){
        if (separator == undefined){separator = ','}
        var text = new String;
        for (obj in this){
          text += this[obj] + separator}
        return text.slice(0,text.length - separator.length)}
        
        
        jQuery('#selectQntd').change(function(){
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("creditos/extrato/$usr_id");  ?>' + '/' + option + '/1' ;
        });
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("creditos/extrato/$usr_id");  ?>' + '/' + qtd + '/' + option ;
        });
		
				   
         jQuery(".change_option").change(function(){
         
           var option = jQuery(this).val();
           
           if (jQuery(this).attr('id') == 'comMarcados' ) {
               
               if (option == 'selecione'){
                   alert('Selecione outra opção');
               }else{
                    var checked = jQuery("input[name='user_List']:checked");

                    if(checked.length > 0){
                        var userIds = [];

                         checked.each(function(index){
                             var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                             id = id[1];
                             userIds[index] = id;
                         });
                         id = userIds.join('_');

                         window.location.href = '<?php echo base_url('creditos/mudar_status_boleto'); ?>' + '/' + id + '/' + option;
                    }else{
                         alert('Selecione pelo menos um boleto');
                         return;
                    }
                }
            }else {
            
                switch(option){
                    case 'selecione':
                        alert('Selecione outra opção');  
                    break;

                    case 'dados_pessoais':      
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        
                        jQuery.ajax({
                            url: "<?php echo base_url("usuarios/dados_pessoais/"); ?>/" + id + '/boleto',
                            dataType: "html"
                        }).done(function(data){
                            jQuery("#myModal").html(data);
                            jQuery("#myModal").modal();
                        });
						
                    break;

                    default:
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        window.location.href = '<?php echo base_url(''); ?>' + option;
                     break;
                } 
				
           }
        });    
    });
    
    
</script>