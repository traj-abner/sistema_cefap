
<?php 
    $this->load->view('header');  
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/modal-style.css"/>
<div id="myModal" class="modal hide fade">
</div>


<div id="main_content">	
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well"><h2>Lista de Usu&aacute;rios</h2>
        <div class="qntd_usuario_listar">
            <h3>Usuários por página:</h3>
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
         <input type="submit" class="btn btn-primary" id="btn-right-listar" name="submit" value="Adicionar" onclick="window.location.href='../usuarios/adicionar'" />
    <?php } ?>      
<table class="table">
    <caption >Lista de Usuários</caption>
        <thead>
                <tr>    
                        <th><input type="checkbox" name="selectALL" id="checkAll" onClick="toggleChecked(this.checked)"> </th>
                        <th><a href='<?php echo base_url("projetos/listar/id/$limit/$perpage/DESC"); ?>'>ID
                            <?php 
                                if(isset($img) && $img == 'id'){
                                    echo '<a href="';
                                    echo base_url("projetos/listar/id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("projetos/listar/id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("projetos/listar/titulo/$limit/$perpage/DESC"); ?>'>Tituto
                            <?php 
                                if(isset($img) && $img == 'titulo'){
                                    echo '<a href="';
                                    echo base_url("projetos/listar/titulo/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("projetos/listar/titulo/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>                  
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("projetos/listar/responsavel/$limit/$perpage/DESC"); ?>'>Responsavel
                            <?php 
                                if(isset($img) && $img == 'email'){
                                    echo '<a href="';
                                    echo base_url("projetos/listar/email/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("projetos/listar/email/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("projetos/listar/instituicao/$limit/$perpage/DESC"); ?>'>Instituição
                            <?php 
                                if(isset($img) && $img == 'instituicao'){
                                    echo '<a href="';
                                    echo base_url("projetos/listar/instituicao/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("projetos/listar/instituicao/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("projetos/listar/departamento/$limit/$perpage/DESC"); ?>'>Departamento
                            <?php 
                                if(isset($img) && $img == 'credencial'){
                                    echo '<a href="';
                                    echo base_url("projetos/listar/credencial/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                      
                                    echo '<a href="';
                                    echo base_url("projetos/listar/credencial/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("projetos/listar/status/$limit/$perpage/DESC"); ?>'>Status
                            <?php 
                                if(isset($img) && $img == 'status'){
                                    echo '<a href="';
                                    echo base_url("projetos/listar/status/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("projetos/listar/status/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th>Opções</th>
                </tr>
        </thead>
        
        <tbody>
        <?php foreach($proj as $p){ ?>

                <tr class="listar_usuario" id="usuario-<?php echo $p->id; ?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $p->id;?></td>
                        <td><?php echo $p->titulo; ?></td>
                        <td><?php echo $p->responsavel; ?></td>
                        <td><?php echo $p->instituicao; ?></td>
                        <td> <?php echo $p->departamento; ?>
                        </td>
                       
                        <td> <?php
							switch ($p->status):
								case STATUS_PROJETO_ATIVO: echo 'Ativo'; break;
								case STATUS_PROJETO_INATIVO: echo 'Inativo'; break;
								case STATUS_PROJETO_EXCLUIDO: echo 'Excluido'; break;
							endswitch;
						?>
                        </td>
                        <td>
                            <select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                <option value='dados_pessoais' data-toggle="modal">Ver Detalhes</option>
                                <?php if ($uRole == STATUS_CREDENCIAL_SUPERADMIN or $p->created_by == $this->session->userdata('id')): ?>
                                <option value='<?php echo ("projetos/editar/".$p->id);?>'>Editar Dados</option>
									<?php if ($p->status == STATUS_PROJETO_INATIVO): ?><option value="<?php echo ("projetos/status/".STATUS_PROJETO_ATIVO.'/'.$p->id); ?>">Ativar</option>
                                    <?php else: ?><option value="<?php echo ("projetos/status/".STATUS_PROJETO_INATIVO.'/'.$p->id); ?>">Inativar</option> <?php endif; ?>
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
           window.location.href = '<?php echo base_url("projetos/listar/id");  ?>' + '/' + option + '/1' ;
        });
   		
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("projetos/listar/id");  ?>' + '/' + qtd + '/' + option ;
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