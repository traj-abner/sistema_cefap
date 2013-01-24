
<?php 
    $this->load->view('header');  
	$today = getdate();
	#@TODO definir nível de acesso
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/modal-style.css"/>
<div id="myModal" class="modal hide fade">
</div>

<div id="main_content">	
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well"><h2>Lista de Boletos</h2>
        <div class="qntd_usuario_listar">
            <h3>Boletos por página:</h3>
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
    
<!-- tabela -->	
    <ul class="pager">
            <li><a href="<?php echo $buttonArray[0]; ?>"><i class="icon-fast-backward"></i></a></li>
            <li><a href="<?php echo $buttonArray[1]; ?>"><i class="icon-backward"></i></a></li>
            <li><input type="text" id="gotopage" class="input-mini input-page" /></li>
            <li><a href="<?php echo $buttonArray[2]; ?>"><i class="icon-forward"></i></a></li>
            <li><a href="<?php echo $buttonArray[3]; ?>"><i class="icon-fast-forward"></i></a></li> 
    </ul>
     
<table class="table">
    <caption >Lista de Boletos</caption>
        <thead>
                <tr>    
                        <th><input type="checkbox" name="selectALL" id="checkAll" onClick="toggleChecked(this.checked)"> </th>
                        <th><a href='<?php echo base_url("creditos/listar/nosso_numero/$limit/$perpage/ASC"); ?>'>Nosso Numero
                            <?php 
                                if(isset($img) && $img == 'nosso_numero'){
                                    echo '<a href="';
                                    echo base_url("creditos/listar/nosso_numero/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/listar/nosso_numero/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("creditos/listar/valor_total/$limit/$perpage/ASC"); ?>'>Valor
                            <?php 
                                if(isset($img) && $img == 'valor_total'){
                                    echo '<a href="';
                                    echo base_url("creditos/listar/valor_total/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/listar/valor_total/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("creditos/listar/usuario_nome/$limit/$perpage/ASC"); ?>'>Usuario
                            <?php 
                                if(isset($img) && $img == 'usuario_nome'){
                                    echo '<a href="';
                                    echo base_url("creditos/listar/usuario_nome/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/listar/usuario_nome/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("creditos/listar/data_vencimento/$limit/$perpage/ASC"); ?>'>Data de Vencimento
                            <?php 
                                if(isset($img) && $img == 'data_vencimento'){
                                    echo '<a href="';
                                    echo base_url("creditos/listar/data_vencimento/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/listar/data_vencimento/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("creditos/listar/status/$limit/$perpage/ASC"); ?>'>Status
                            <?php 
                                if(isset($img) && $img == 'status'){
                                    echo '<a href="';
                                    echo base_url("creditos/listar/status/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("creditos/listar/status/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        
                        <th>Opções</th>
                </tr>
        </thead>
        
        <tbody>  
            <?php 
			$i = 0;
			foreach($bols as $bol): ?>

                <tr class="listar_usuario" id="usuario-<?php echo $bol->id?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $bol->nosso_numero;?></td>
                        <td><?php echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($bol->valor_total,2,TS,DS)?></td>
                        <td><?php 
						$usr = new Usuario();
						$usr->where('id',$bol->usuario_id)->get();
						echo $usr->nome;
						 ?></td>
                        <td><?php echo $dvc[$i];?></td>
                        <td><?php 
							switch ($bol->status):
								case STATUS_BOLETO_EM_ABERTO: echo 'Em Aberto'; break;
								case STATUS_BOLETO_VENCIDO: echo 'Vencido'; break;
								case STATUS_BOLETO_PAGO: echo 'Pago'; break;
								case STATUS_BOLETO_CANCELADO: echo 'Cancelado'; break;
							endswitch;
						?>
                        </td>
                        <td>
                            <select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                
                                <option value="ver_detalhes">Ver detalhes</option>                                   
                                        <option value='<?php echo ("creditos/enviar/$bol->id"); ?>'>Enviar ao Usu&aacute;rio</option>
                                        <option value='dados_pessoais' data-toggle="modal">Dados do Usu&aacute;rio</option>
                                        <?php if ($bol->status != STATUS_BOLETO_PAGO):?>
                                            <option value="<?php echo ("creditos/mudar_status_boleto/$bol->id/" . STATUS_BOLETO_PAGO); ?>">Marcar como Pago</option>
                                        <?php else: ?>
                                            <option value="<?php echo ("creditos/mudar_status_boleto/$bol->id/" . STATUS_BOLETO_EM_ABERTO); ?>">Marcar como Pendente</option>
                                        <?php endif; ?>
                                        <?php
										if($bol->status == STATUS_BOLETO_EM_ABERTO):
											$d_vc = explode('/',$dvc[$i]);
											if($today['year'] > $d_vc[2]): 
											 ?>
												<option value="<?php echo ("creditos/mudar_status_boleto/$bol->id/" . STATUS_BOLETO_VENCIDO); ?>">Marcar como Vencido</option>
											<?php 
											else:
												if($today['month'] >= $d_vc[1] && $today['mday'] > $d_vc[0]):?>
													<option value="<?php echo ("creditos/mudar_status_boleto/$bol->id/" . STATUS_BOLETO_VENCIDO); ?>">Marcar como Vencido</option>
												<?php endif; 
											endif; 
										endif;?>
                                        <?php if ($bol->status < STATUS_BOLETO_PAGO):?>
                                            <option value="<?php echo ("creditos/mudar_status_boleto/$bol->id/" . STATUS_BOLETO_CANCELADO); ?>">Cancelar Boleto</option>
                                        <?php endif; ?>
                                        <?php if ($bol->status == STATUS_BOLETO_PAGO && $uRole == CREDENCIAL_USUARIO_SUPERADMIN):?>
                                            <option value="<?php echo ("creditos/mudar_status_boleto/$bol->id/" . STATUS_BOLETO_CANCELADO); ?>">Cancelar Boleto</option>
                                        <?php endif; ?>
                            </select>
                        </td>
                </tr>
                
                <?php $i++;
				endforeach; ?>
        
        </tbody>
    </table>
    
     <?php if($uRole >= CREDENCIAL_USUARIO_ADMIN):?>
    <div class="select">
        <p>Com marcados:
            <select class="change_option" id="comMarcados">
                <option value="selecione">Selecione...</option>
                <option value="<?php echo STATUS_BOLETO_PAGO; ?>">Marcar como Pago</option>
                <option value="<?php echo STATUS_BOLETO_EM_ABERTO; ?>">Marcar como Em Aberto</option>
                <option value="<?php echo STATUS_BOLETO_VENCIDO; ?>">Marcar como Vencido</option>
                <option value="<?php echo STATUS_BOLETO_CANCELADO; ?>">Marcar como Cancelado</option>
            </select>
        </p>
    </div>
    <?php endif; ?>
    
    <?php echo $page; ?>
    
    
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
           window.location.href = '<?php echo base_url("creditos/listar/id");  ?>' + '/' + option + '/1' ;
        });
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("creditos/listar/id");  ?>' + '/' + qtd + '/' + option ;
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