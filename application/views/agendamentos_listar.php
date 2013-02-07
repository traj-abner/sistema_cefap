
<?php 
    $this->load->view('header');  
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/modal-style.css"/>
<div id="myModal" class="modal hide fade">
</div>


<div id="main_content">	
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well">
        <h2>Lista de Agendamentos</h2>
        <div class="qntd_usuario_listar">
            <h3>Agendamentos por página:</h3>
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
    
          
         	<a href="../agendamentos/criar" class="btn btn-primary" id="btn-right-listar">Adicionar</a>
<table class="table">
    <caption >Lista de Usuários</caption>
        <thead>
                <tr>    
                        <th><input type="checkbox" name="selectALL" id="checkAll" onClick="toggleChecked(this.checked)"> </th>
                        <th><a href='<?php echo base_url("agendamentos/listar/id/$limit/$perpage/DESC"); ?>'>ID
                            <?php 
                                if(isset($img) && $img == 'id'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("agendamentos/listar/usuario_id/$limit/$perpage/DESC"); ?>'>Usuário
                            <?php 
                                if(isset($img) && $img == 'usuario_id'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/usuario_id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/usuario_id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>                  
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("agendamentos/listar/facility_id/$limit/$perpage/DESC"); ?>'>Facility
                            <?php 
                                if(isset($img) && $img == 'facility_id'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/facility_id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/facility_id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("agendamentos/listar/projeto_id/$limit/$perpage/DESC"); ?>'>Projeto
                            <?php 
                                if(isset($img) && $img == 'projeto_id'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/projeto_id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/projeto_id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("agendamentos/listar/periodo_inicial/$limit/$perpage/DESC"); ?>'>Periodo Solicitado
                            <?php 
                                if(isset($img) && $img == 'periodo_inicial'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/periodo_inicial/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                      
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/periodo_inicial/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("agendamentos/listar/periodo_inicial_marcado/$limit/$perpage/DESC"); ?>'>Periodo Agendado
                            <?php 
                                if(isset($img) && $img == 'periodo_inicial_marcado'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/periodo_inicial_marcado/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                      
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/periodo_inicial_marcado/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("agendamentos/listar/status/$limit/$perpage/DESC"); ?>'>Status
                            <?php 
                                if(isset($img) && $img == 'status'){
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/status/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("agendamentos/listar/status/$limit/$perpage/ASC");
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
		$us = new Usuario();
		$ft = new Facility();
		$pj = new Projeto();
		foreach($agn as $ag){ ?>

                <tr class="listar_usuario" id="usuario-<?php echo $ag->id; ?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $ag->id;?></td>
                        <td><?php $us->get_by_id($ag->usuario_id); echo $us->nome; ?></td>
                        <td><?php $ft->get_by_id($ag->facility_id); echo $ft->nome; ?></td>
                        <td><?php $pj->get_by_id($ag->projeto_id); echo $pj->titulo; ?></td>
                        <td><?php echo date('d/m/Y H:i',strtotime($ag->periodo_inicial)).' a '.date('H:i',strtotime($ag->periodo_final)); ?></td>
                        <td> <?php if ($ag->periodo_inicial_marcado == '0000-00-00 00:00:00'):
										echo '';
									else:
										//echo $ag->periodo_inicial_marcado;
										echo date('d/m/Y H:i',strtotime($ag->periodo_inicial_marcado)).' a '.date('H:i',strtotime($ag->periodo_final_marcado));
									endif;
						 ?>
                        </td>
                       
                        <td> <?php
							switch ($ag->status):
								case AGENDAMENTO_STATUS_SOLICITADO: echo 'Solicitado'; break;
								case AGENDAMENTO_STATUS_APROVADO: echo 'Aprovado'; break;
								case AGENDAMENTO_STATUS_NEGADO: echo 'Negado'; break;
								case AGENDAMENTO_STATUS_FALTOU: echo 'Faltou'; break;
								case AGENDAMENTO_STATUS_COMPARECEU: echo 'Compareceu'; break;
								case AGENDAMENTO_STATUS_CANCELADO: echo 'Cancelado'; break;
							endswitch;
						?>
                        </td>
                        <td>
                            <select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                <option value='dados_pessoais' data-toggle="modal">Ver Detalhes</option>
                                <?php
									if ($uRole >= CREDENCIAL_USUARIO_ADMIN):
										 $cn = $ft->where_related_usuario('id',$this->session->userdata('id'))->where('id',$ag->facility_id)->count();
										
										if ($cn > 0 or $uRole == CREDENCIAL_USUARIO_SUPERADMIN):
								 ?>
                                <option value='<?php echo ("agendamentos/editar/".$ag->id);?>'>Editar</option>
                                	<?php endif; ?>
                                <?php endif; ?>
                               </optgroup>
                            </select>
                        </td>
                </tr>
           <?php } ?>  
           </tbody>
    </table>
         
  
    

    <?php 
    //require_once 'usuario_dados_pessoais.php';
    //ver o código do renato no sistema de boletos para recuperar essa página com AJAX.
    //para que o conteúdo da próxima view só seja carregado quando o usuário selecionar a opção de 'dados pessoais'.
    
        echo $page;
        
    ?>
    
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
           window.location.href = '<?php echo base_url("agendamentos/listar/id");  ?>' + '/' + option + '/1' ;
        });
   		
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("agendamentos/listar/id");  ?>' + '/' + qtd + '/' + option ;
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
						if (option == 'mensagem'){
                         window.location.href = '<?php echo base_url('mensagens/escrever/to/'); ?>' + '/' + id;}
						else {
							window.location.href = '<?php echo base_url('usuarios/mudar_status'); ?>' + '/' + id + '/' + option;
						}
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

                    case 'dados_pessoais':      
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        
                        jQuery.ajax({
                            url: "<?php echo base_url("projetos/ver/"); ?>/" + id,
                            dataType: "html"
                        }).done(function(data){
                            jQuery("#myModal").html(data);
                            jQuery("#myModal").modal();
                        });
						
                    break;
					
					case 'creditos':      
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        
                        jQuery.ajax({
                            url: "<?php echo base_url("creditos/extrato/"); ?>/" + id,
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