
<?php 
    $this->load->view('header');  
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/modal-style.css"/>
<div id="myModal" class="modal hide fade">
</div>

<div id="main_content">	
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well"><h2>Lista de Facilities</h2>
        <div class="qntd_usuario_listar">
            <h3>Facilities por página:</h3>
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

   <?php if($uRole == CREDENCIAL_USUARIO_SUPERADMIN){?>
         <input type="submit" class="btn btn-primary" id="btn-right-listar" name="submit" value="Adicionar" onclick="window.location.href='<?php echo base_url("facilities/adicionar");  ?>'" />
    <?php } ?>      
     
<table class="table">
    <caption >Lista de Facilities</caption>
        <thead>
                <tr>    
                        <th><input type="checkbox" name="selectALL" id="checkAll" onClick="toggleChecked(this.checked)"> </th>
                        <th><a href='<?php echo base_url("facilities/listar/nome/$limit/$perpage/ASC"); ?>'>Nome
                            <?php 
                                if(isset($img) && $img == 'nome'){
                                    echo '<a href="';
                                    echo base_url("facilities/listar/nome/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("facilities/listar/nome/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("facilities/listar/tipo_agendamento/$limit/$perpage/ASC"); ?>'>Agendamento
                            <?php 
                                if(isset($img) && $img == 'tipo_agendamento'){
                                    echo '<a href="';
                                    echo base_url("facilities/listar/tipo_agendamento/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("facilities/listar/tipo_agendamento/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href=''>Administradores
                            
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("facilities/listar/arquivos/$limit/$perpage/ASC"); ?>'>Arquivos
                            <?php 
                                if(isset($img) && $img == 'arquivos'){
                                    echo '<a href="';
                                    echo base_url("facilities/listar/arquivos/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("facilities/listar/arquivos/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        
                        <th>Opções</th>
                </tr>
        </thead>
        
        <tbody>  
            <?php foreach($fclts as $fclt){ ?>

                <tr class="listar_facilities" id="id-<?php echo $fclt->id?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $fclt->nome;?></td>
                        <td><?php 
							if ($fclt->tipo_agendamento == TIPO_AGENDAMENTO_AGENDA):
								echo 'Calendario';
							else:
								echo 'Individualizado';
							endif;
						?></td>
                        <td align="center"><a href="#myModal<?php echo $fclt->id; ?>" role="button" class="btn" data-toggle="modal">Visualizar</a></td>
                        <td><?php echo $fclt->arquivos;?></td>
                        <td>
                            <select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                
                                <option value="ver_detalhes">Ver detalhes</option>
                                <?php if ($uRole >= CREDENCIAL_USUARIO_ADMIN): ?>                                      
									<?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN): ?>
                                        <option value='<?php echo ("facilities/editar/$fclt->id"); ?>'>Editar</option>
                                    <?php endif; ?>
                                    <?php
                                    $ft = new Facility();
                                    $ft->include_related('usuarios','*')->where('id', $fclt->id)->where('usuario_id',$uID)->get();
                                    if ($ft->usuario_id == $uID || $uRole == CREDENCIAL_USUARIO_SUPERADMIN):
                                    ?>
                                        <option value="ver_extrato">Ver extrato</option>
                                        <?php if ($fclt->status == STATUS_FACILITIES_ATIVO):?>
                                            <option value="<?php echo ("facilities/inativar/$fclt->id"); ?>">Inativar</option>
                                        <?php else: ?>
                                            <option value="<?php echo ("facilities/ativar/$fclt->id"); ?>">Ativar</option>
                                        <?php endif; ?>
                                        <?php if ($fclt->status != STATUS_FACILITIES_EXCLUIDO && $uRole == CREDENCIAL_USUARIO_SUPERADMIN):?>
                                            <option value="<?php echo ("facilities/excluir/$fclt->id"); ?>">Excluir</option>
                                        <?php endif;
                                	endif;
                                endif; ?>
                            </select>
                        </td>
                </tr>
                <div id="myModal<?php echo $fclt->id; ?>" style="height:200px; width: 350px; min-height:120px; margin-left:0px; margin-top:70px;" class="modal hide fade">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Lista de Administradores da Facility <?php echo $fclt->nome; ?></h3>
                    </div>
                    <div class="modal-body-small">
                    	<ul>
							<?php 
								$cd = new Usuario();
								$ft = new Facility();
								$ft->include_related('usuarios','*')->where('id',$fclt->id)->get();
								$i=0;
								foreach($ft as $fct)
								{
									if ($i == 0 && strlen($fct->usuario_nome) < 1)
										echo 'Nenhum registro encontrado';
									echo '<li>'.$fct->usuario_nome.'</li>';
									$i++;
								}
							?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                    </div>
                </div>
                <?php } ?>
        
        </tbody>
    </table>
         
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
           window.location.href = '<?php echo base_url("facilities/listar/id");  ?>' + '/' + option + '/1' ;
        });
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("facilities/listar/id");  ?>' + '/' + qtd + '/' + option ;
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

                         window.location.href = '<?php echo base_url('facilities/mudar_status'); ?>' + '/' + id + '/' + option;
                    }else{
                         alert('Selecione pelo menos um usuário');
                         return;
                    }
                }
            }else {
            
                switch(option){
                    case 'selecione':
                        alert('Selecione outra opção');  
                    break;

                    case 'ver_detalhes':      
                        var id = jQuery(this).closest("tr.listar_facilities").attr("id").split("-");
                        id = id[1];
                        
                        jQuery.ajax({
                            url: "<?php echo base_url("facilities/ver/"); ?>/" + id,
                            dataType: "html"
                        }).done(function(data){
                            jQuery("#myModal").html(data);
                            jQuery("#myModal").modal();
                        });
                    break;
                    
                    case 'ver_extrato':
                        var id = jQuery(this).closest("tr.listar_facilities").attr("id").split("-");
                        id = id[1];
                        
                        jQuery.ajax({
                            url: "<?php echo base_url("facilities/extrato/"); ?>/" + id,
                            dataType: "html"
                        }).done(function(data){
                            jQuery("#myModal").html(data);
                            jQuery("#myModal").modal();
                        });
                    
                    break;
                    default:
                        var id = jQuery(this).closest("tr.listar_facilities").attr("id").split("-");
                        id = id[1];
                        window.location.href = '<?php echo base_url(''); ?>' + option;
                     break;
                }  
           }
        });    
    });
    
    
</script>