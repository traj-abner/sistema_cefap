
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
   #btn-right-listar{float:right; margin-right: 20px;}
  
</style>

<div id="myModal" class="modal hide fade">
</div>

<div id="main_content">	
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well">
    	<?php if ($this->uri->segment(3) != 'cancelados'): ?>
        	<input type="button" class="btn btn-danger" onclick="location.href='<?php echo base_url('creditos/lancamentos/cancelados');?>'" value="Exibir Cancelados" />	
		<?php else: ?>
         	<input type="button" class="btn btn-success" onclick="location.href='<?php echo base_url('creditos/lancamentos');?>'" value="Exibir Ativos/Inativos" />	
         <?php endif; ?>
        <div class="qntd_usuario_listar">
        	<br /><br />
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
                         <?php if ($this->uri->segment(3) != 'cancelados'): ?><th><a href='<?php echo base_url("creditos/lancamentos/id/$limit/$perpage/DESC"); ?>'>ID
								<?php 
                                    if(isset($img) && $img == 'id'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/id/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/id/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/chave/$limit/$perpage/DESC"); ?>'>Chave
                                <?php 
                                    if(isset($img) && $img == 'chave'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/chave/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/chave/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/usuario_username/$limit/$perpage/ASC"); ?>'>Usu&aacute;rio
                                <?php 
                                    if(isset($img) && $img == 'usuario_username'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/usuario_username/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/usuario_username/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/modified/$limit/$perpage/DESC"); ?>'>Data
                                <?php 
                                    if(isset($img) && $img == 'modified'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/modified/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/modified/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/valor/$limit/$perpage/ASC"); ?>'>Valor
                                <?php 
                                    if(isset($img) && $img == 'valor'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/valor/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/valor/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/tipo/$limit/$perpage/ASC"); ?>'>Tipo
                                <?php 
                                    if(isset($img) && $img == 'tipo'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/tipo/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/tipo/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            
                            <th><a href='<?php echo base_url("creditos/lancamentos/facility_nome_abreviado/$limit/$perpage/ASC"); ?>'>Facility
                                <?php 
                                    if(isset($img) && $img == 'facility_nome_abreviado'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/facility_nome_abreviado/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/facility_nome_abreviado/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            
                            <th><a href='<?php echo base_url("creditos/lancamentos/status/$limit/$perpage/ASC"); ?>'>Status
                                <?php 
                                    if(isset($img) && $img == 'status'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/status/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/status/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                        <?php else: ?>
                        	<th><a href='<?php echo base_url("creditos/lancamentos/cancelados/id/$limit/$perpage/DESC"); ?>'>ID
								<?php 
                                    if(isset($img) && $img == 'id'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/id/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/id/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/cancelados/chave/$limit/$perpage/DESC"); ?>'>Chave
                                <?php 
                                    if(isset($img) && $img == 'chave'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/chave/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/chave/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/cancelados/usuario_username/$limit/$perpage/ASC"); ?>'>Usu&aacute;rio
                                <?php 
                                    if(isset($img) && $img == 'usuario_username'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/usuario_username/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/usuario_username/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/cancelados/modified/$limit/$perpage/DESC"); ?>'>Data
                                <?php 
                                    if(isset($img) && $img == 'modified'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/modified/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/modified/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/cancelados/valor/$limit/$perpage/ASC"); ?>'>Valor
                                <?php 
                                    if(isset($img) && $img == 'valor'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/valor/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/valor/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            <th><a href='<?php echo base_url("creditos/lancamentos/cancelados/tipo/$limit/$perpage/ASC"); ?>'>Tipo
                                <?php 
                                    if(isset($img) && $img == 'tipo'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/tipo/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/tipo/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            
                            <th><a href='<?php echo base_url("creditos/lancamentos/cancelados/facility_nome_abreviado/$limit/$perpage/ASC"); ?>'>Facility
                                <?php 
                                    if(isset($img) && $img == 'facility_nome_abreviado'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/facility_nome_abreviado/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/facility_nome_abreviado/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>
                            
                            <th><a href='<?php echo base_url("creditos/lancamentos/cancelados/cancelamento_justificativa/$limit/$perpage/ASC"); ?>'>Justificativa
                                <?php 
                                    if(isset($img) && $img == 'cancelamento_justificativa'){
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/cancelamento_justificativa/$limit/$perpage/DESC");
                                        echo '"<i class="icon-chevron-down"></i>';
                                        
                                        echo '<a href="';
                                        echo base_url("creditos/lancamentos/cancelados/cancelamento_justificativa/$limit/$perpage/ASC");
                                        echo '"<i class="icon-chevron-up"></i>';
                                    } 
                                ?>
                                </a>
                            </th>

                        <?php endif; ?>
                         <th><a href="">Opções</a>
                        </th>
                </tr>
        </thead>
        
        <tbody>  
            <?php 
			$ft = new Facility();
			$i = 0;
			foreach($lcn as $lc): ?>

                <tr class="listar_usuario" id="usuario-<?php echo $lc->id?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $lc->id;?></td>
                        <td><?php echo $lc->chave;?></td>
                        <td><?php echo $lc->usuario_username;?></td>
                        <td><?php echo $dvc[$i];?></td>
                        <td class="lancamento<?php echo $lc->tipo; ?>"><?php if ($lc->tipo == LANCAMENTO_DEBITO) echo '- '; ?><?php echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($lc->valor,2,TS,DS)?></td>
                        <td><?php 
							switch ($lc->tipo):
								case LANCAMENTO_CREDITO: echo 'Cr&eacute;dito'; break;
								case LANCAMENTO_DEBITO: echo 'D&eacute;bito'; break;
							endswitch;
						?></td>
                        
                        <td><?php $ft->where('id',$lc->facility_id)->get(); echo $ft->nome;?></td>
                        
                        <td><?php 
						if ($this->uri->segment(3) == 'cancelados'):
							echo $lc->cancelamento_justificativa;
						else:
							switch ($lc->status):
								case STATUS_LANCAMENTO_ATIVO: echo 'Ativo'; break;
								case STATUS_LANCAMENTO_INATIVO: echo 'Inativo'; break;
								case STATUS_LANCAMENTO_CANCELADO: echo 'Cancelado'; break;
							endswitch;
						endif;
						 ?>
                        </td>
                        <td>
                         <select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                
                                <option value="ver_detalhes">Ver detalhes</option>
                                <?php if ($uRole >= CREDENCIAL_USUARIO_ADMIN): ?>                                      
                                        <option value="ver_extrato">Ver extrato</option>
                                        <?php if ($lc->status == STATUS_LANCAMENTO_ATIVO):?>
                                            <option value="<?php echo ("creditos/mudar_status_lancamento/".STATUS_LANCAMENTO_INATIVO."/$lc->id"); ?>">Inativar</option>
                                        <?php else: ?>
                                            <option value="<?php echo ("creditos/mudar_status_lancamento/".STATUS_LANCAMENTO_ATIVO."/$lc->id"); ?>">Ativar</option>
                                        <?php endif; ?>
                                        <?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN && $this->uri->segment(3) != 'cancelados'):?>
                                            <option value="cancelar">Cancelar</option>
                                        <?php endif;
                                endif; ?>
                            </select>
                        </td>
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
           window.location.href = '<?php echo base_url("creditos/lancamentos/modified");  ?>' + '/' + option + '/1' ;
        });
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("creditos/lancamentos/modified");  ?>' + '/' + qtd + '/' + option ;
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


					case 'cancelar':      
                         var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        
                        jQuery.ajax({
                            url: "<?php echo base_url("creditos/cancelar/"); ?>/" + id ,
                            dataType: "html"
                        }).done(function(data){
                            jQuery("#myModal").html(data);
                            jQuery("#myModal").modal();
                        });
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