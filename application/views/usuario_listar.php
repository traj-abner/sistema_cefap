
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
    <?php if($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN){?>
         <input type="submit" class="btn btn-primary" id="btn-right-listar" name="submit" value="Adicionar" onclick="window.location.href='../usuarios/adicionar'" />
    <?php } ?>      
<table class="table">
    <caption >Lista de Usuários</caption>
        <thead>
                <tr>    
                        <th><input type="checkbox" name="selectALL" id="checkAll" onClick="toggleChecked(this.checked)"> </th>
                        <th><a href='<?php echo base_url("usuarios/listar/id/$limit/$perpage"); ?>'>ID
                            <?php 
                                if(isset($img) && $img == 'id'){
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("usuarios/listar/nome/$limit/$perpage"); ?>'>Nome
                            <?php 
                                if(isset($img) && $img == 'nome'){
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/nome/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/nome/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>                  
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("usuarios/listar/email/$limit/$perpage"); ?>'>E-mail
                            <?php 
                                if(isset($img) && $img == 'email'){
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/email/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/email/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("usuarios/listar/instituicao/$limit/$perpage"); ?>'>Instituição
                            <?php 
                                if(isset($img) && $img == 'instituicao'){
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/instituicao/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/instituicao/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("usuarios/listar/credencial/$limit/$perpage"); ?>'>Credencial
                            <?php 
                                if(isset($img) && $img == 'credencial'){
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/credencial/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                      
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/credencial/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("usuarios/listar/status/$limit/$perpage"); ?>'>Status
                            <?php 
                                if(isset($img) && $img == 'status'){
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/status/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("usuarios/listar/status/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th>Opções</th>
                </tr>
        </thead>
        
        <tbody>
        <?php foreach($user as $u){ ?>

                <tr class="listar_usuario" id="usuario-<?php echo $u->id; ?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $u->id;?></td>
                        <td><?php echo $u->nome;?></td>
                        <td><a href="mailto:<?php echo $u->email; ?>"><?php echo $u->email; ?></a></td>
                        <td><?php echo $u->instituicao;?></td>
                        <td><?php 
                                switch ($u->credencial){
                                    default:
                                        break;    

                                    case CREDENCIAL_USUARIO_COMUM:
                                        echo CREDENCIAL_USUARIO_COMUM . ' - Comum';
                                        break;
                                    case CREDENCIAL_USUARIO_ADMIN:
                                        echo CREDENCIAL_USUARIO_ADMIN . ' - Admin';
                                        break;
                                    case CREDENCIAL_USUARIO_SUPERADMIN:
                                        echo CREDENCIAL_USUARIO_SUPERADMIN . ' - SuperAdmin';
                                        break;

                                }
                            ?>
                        </td>
                        <td><?php 
                            switch ($u->status){
                                    default :
                                        break;

                                    case STATUS_USUARIO_EXCLUIDO:
                                        echo  STATUS_USUARIO_EXCLUIDO. ' - Excluido';
                                        break;

                                    case STATUS_USUARIO_BLOQUEADO:
                                        echo STATUS_USUARIO_BLOQUEADO. ' - Bloqueado';
                                        break;

                                    case STATUS_USUARIO_ATIVO:
                                        echo STATUS_USUARIO_ATIVO. ' - Ativo';
                                        break;

                                    case STATUS_USUARIO_INATIVO:
                                        echo STATUS_USUARIO_INATIVO. ' - Inativo';
                                        break;
                                }

                                $ativo = STATUS_USUARIO_ATIVO;
                                $inativo = STATUS_USUARIO_INATIVO;
                                $bloqueado = STATUS_USUARIO_BLOQUEADO;
                                $excluido = STATUS_USUARIO_EXCLUIDO;
                                $admin = CREDENCIAL_USUARIO_ADMIN;
                                $superadmin = CREDENCIAL_USUARIO_SUPERADMIN;
                                $comum = CREDENCIAL_USUARIO_COMUM;

                            ?>
                        </td>
                        <td>
                            <select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                
                                <?php 
                                //verifica se o usuário logado é admin. Caso seja, todas as opções poderão ser exibidas.
                                if($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN){
                                        if($u->status == STATUS_USUARIO_INATIVO || $u->status == STATUS_USUARIO_BLOQUEADO || $u->status == STATUS_USUARIO_EXCLUIDO)//verifica o status atual do usuário a ser modificado para saber qual opção podera exibir.
                                            echo "<option value="; 
                                            echo ("usuarios/mudar_status/$u->id/$ativo ");
                                            echo '">Ativar</option>';

                                        if($u->status == STATUS_USUARIO_ATIVO || $u->status == STATUS_USUARIO_BLOQUEADO || $u->status == STATUS_USUARIO_EXCLUIDO)
                                            echo "<option value="; 
                                            echo ("usuarios/mudar_status/$u->id/$inativo ");
                                            echo '">Inativar</option>';

                                        if($u->status == STATUS_USUARIO_ATIVO || $u->status == STATUS_USUARIO_INATIVO || $u->status == STATUS_USUARIO_EXCLUIDO)
                                            echo "<option value="; 
                                            echo ("usuarios/mudar_status/$u->id/$bloqueado ");
                                            echo '">Bloquear</option>';    

                                        
                                        if($u->status == STATUS_USUARIO_ATIVO || $u->status == STATUS_USUARIO_INATIVO || $u->status == STATUS_USUARIO_BLOQUEADO) 
                                            echo "<option value="; 
                                            echo ("usuarios/mudar_status/$u->id/$excluido "); 
                                            echo '">Excluir</option>';
                                
                                                 
                                //verifica se o usuário logado é um admin. Caso seja, ele só poderá alterar os outros usuários que sejam ADMIN ou COMUM.                 
                                }elseif ($this->uRole == CREDENCIAL_USUARIO_ADMIN) {
                                        if($u->credencial == CREDENCIAL_USUARIO_ADMIN || $u->credencial == CREDENCIAL_USUARIO_COMUM ){
                                            if($u->status == STATUS_USUARIO_INATIVO || $u->status == STATUS_USUARIO_BLOQUEADO || $u->status == STATUS_USUARIO_EXCLUIDO)//verifica o status atual do usuário a ser modificado para saber qual opção podera exibir.
                                            echo "<option value="; 
                                            echo ("usuarios/mudar_status/$u->id/$ativo ");
                                            echo '">Ativar</option>';

                                        if($u->status == STATUS_USUARIO_ATIVO || $u->status == STATUS_USUARIO_BLOQUEADO || $u->status == STATUS_USUARIO_EXCLUIDO)
                                            echo "<option value="; 
                                            echo ("usuarios/mudar_status/$u->id/$inativo ");
                                            echo '">Inativar</option>';

                                        if($u->status == STATUS_USUARIO_ATIVO || $u->status == STATUS_USUARIO_INATIVO || $u->status == STATUS_USUARIO_EXCLUIDO)
                                            echo "<option value="; 
                                            echo ("usuarios/mudar_status/$u->id/$bloqueado ");
                                            echo '">Bloquear</option>';    

                                         
                                        }
                                    }                                
                                ?>

                                <option value='dados_pessoais' data-toggle="modal">Dados Pessoais</option>
                                <option value='<?php echo ("usuarios/editar/$u->id");?>'>Editar Dados</option>
                                <option value="<?php echo ("mensagens/escrever"); ?>">Enviar Mensagem</option>
                                <option value="<?php echo ("relatorios/logdeuso"); ?>">Log de Acesso</option>
                                <option value="<?php echo ("agendamentos/listar"); ?>">Agendamentos</option>
                                <option value="<?php echo ("creditos/listar"); ?>">Créditos</option>
                                
                                
                                <?php if($this->uRole == CREDENCIAL_USUARIO_ADMIN){
                                    if($u->credencial == CREDENCIAL_USUARIO_ADMIN || $u->credencial == CREDENCIAL_USUARIO_COMUM){
                                        echo "<option value=";
                                        echo ("usuarios/trocar_senha/$u->id");
                                        echo '">Trocar Senha</option>';
                                    }
                                    }else {
                                            echo "<option value=";
                                            echo ("usuarios/trocar_senha/$u->id");
                                            echo '">Trocar Senha</option>';
                                    }
                                ?>
                                
                                
                                <?php
                                        if($this->uRole == CREDENCIAL_USUARIO_ADMIN){
                                            switch($u->credencial){
                                                case CREDENCIAL_USUARIO_ADMIN:
                                                    echo '<optgroup label="Mudar credencial">';
                                                    echo "<option value="; 
                                                    echo ("usuarios/mudar_credencial/$comum/$u->id"); 
                                                    echo '">Comum</option>';
                                                                                                        
                                                break;
                                            
                                                case CREDENCIAL_USUARIO_COMUM:
                                                    echo '<optgroup label="Mudar credencial">';
                                                    echo "<option value="; 
                                                    echo ("usuarios/mudar_credencial/$admin/$u->id"); 
                                                    echo '">Administrador</option>';
                                                break;
                                            }
                                        }
                                        if($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN){
                                            
                                            switch ($u->credencial){
                                                case CREDENCIAL_USUARIO_ADMIN:
                                                    echo '<optgroup label="Mudar credencial">';
                                                    echo "<option value="; 
                                                    echo ("usuarios/mudar_credencial/$comum/$u->id"); 
                                                    echo '">Comum</option>';
                                                    
                                                    echo "<option value="; 
                                                    echo ("usuarios/mudar_credencial/$superadmin/$u->id"); 
                                                    echo '">Super - Administrador</option>';
                                                break;
                                            
                                                case CREDENCIAL_USUARIO_COMUM:
                                                    echo '<optgroup label="Mudar credencial">';
                                                    echo "<option value="; 
                                                    echo ("usuarios/mudar_credencial/$admin/$u->id"); 
                                                    echo '">Administrador</option>';
                                                    
                                                    echo "<option value="; 
                                                    echo ("usuarios/mudar_credencial/$superadmin/$u->id"); 
                                                    echo '">Super - Administrador</option>';
                                                break;
                                            
                                                case CREDENCIAL_USUARIO_SUPERADMIN:
                                                    echo '<optgroup label="Mudar credencial">';
                                                    echo "<option value="; 
                                                    echo ("usuarios/mudar_credencial/$admin/$u->id"); 
                                                    echo '">Administrador</option>';
                                                    
                                                    echo "<option value="; 
                                                    echo ("usuarios/mudar_credencial/$comum/$u->id"); 
                                                    echo '">Comum</option>';
                                                break;
                                                
                                            }
                                        }    
                                    ?>     
                               </optgroup>
                            </select>
                        </td>
                </tr>
           <?php } ?>  
           </tbody>
    </table>
         
    <?php if($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN){?>
    <div class="select">
        <p>Com marcados:
            <select class="change_option" id="comMarcados">
                <option value="selecione">Selecione...</option>
                <option value="<?php echo STATUS_USUARIO_ATIVO; ?>">Ativar</option>
                <option value="<?php echo STATUS_USUARIO_INATIVO; ?>">Inativar</option>
                <option value="<?php echo STATUS_USUARIO_BLOQUEADO; ?>">Bloquear</option>
                <?php if($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN){
                    echo "<option value="; 
                    echo ("usuarios/mudar_status/$u->id/$excluido"); 
                    echo '">Excluir</option>';                  
                }?>
                <option value="<?php echo base_url("mensagens/escrever"); ?>">Enviar Mensagem</option>
            </select>
        </p>
    </div>
    <?php } ?>

    

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
           window.location.href = '<?php echo base_url("usuarios/listar/id");  ?>' + '/' + option + '/1' ;
        });
   		
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("usuarios/listar/id");  ?>' + '/' + qtd + '/' + option ;
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

                         window.location.href = '<?php echo base_url('usuarios/mudar_status'); ?>' + '/' + id + '/' + option;
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
                            url: "<?php echo base_url("usuarios/dados_pessoais/"); ?>/" + id,
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