
<?php 
    $this->load->view('header');  
?>
<style>
   .select p {text-align: center; background-color: #FFFFFF; border: 0px #FFFFFF}
   .qntd_usuario_listar {float: right; margin-top:-32px;}
   #selectQntd {margin-top: 2px; margin-left:25%}
   .img-order{background-image: url(images/asc.png);}
   /*CSS DOS DADOS PESSOAIS*/
   .form-actions {width:800px;}
   .user_info {margin-left:30px; margin-top:30px; width: 800px;}
   .pull-right #Creditos {width:500px;}
   h1 {font-size: 30px; color: #B1C5C9; float: left;}
   #myModal {height:800px; width: 885px;}
   .modal.fade.in {top:27%; bottom: 10%;}
   .modal-body {max-height:588px;}
   .modal {left: 41%;}
   .btn-right {margin-left: 550px;}
   .btn-right-creditos {margin-left: 389px; margin-top: -30px;}
   .modal th {background-color: #ccc}
   #btn-right-listar{float:right; margin-right: 20px;}
   
</style>

<div id="myModal" class="modal hide fade">
</div>


<div id="main_content">	
   <div id="breadcrumbs"><?php echo set_breadcrumb(); ?> </div> 

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
            <li><a href="#"><i class="icon-fast-backward"></i></a></li>
            <li><a href="#"><i class="icon-backward"></i></a></li>
            <li><input type="text" class="input-mini input-page" /></li>
            <li><a href="#"><i class="icon-forward"></i></a></li>
            <li><a href="#"><i class="icon-fast-forward"></i></a></li>
    </ul>

   <input type="submit" class="btn btn-primary" id="btn-right-listar" name="submit" value="Adicionar" onclick="window.location.href='../usuarios/adicionar'" />
     
<table class="table">
    <caption >Lista de Usuários</caption>
        <thead>
                <tr>    
                        <th><input type="checkbox" name="selectALL" id="checkAll" onClick="toggleChecked(this.checked)"> </th>
                        <th><a href=''>Nome
                            
                            </a>
                        </th>
                        <th><a href=''>Agendamento
                                              
                            </a>
                        </th>
                        <th><a href=''>Administradores
                            
                            </a>
                        </th>
                        <th><a href=''>Arquivos
                           
                            </a>
                        </th>
                        
                        <th>Opções</th>
                </tr>
        </thead>
        
        <tbody>  
            <?php foreach($fclts as $fclt){ ?>

                <tr class="listar_usuario" id="id-<?php echo $fclt->id?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td><?php echo $fclt->nome;?></td>
                        <td><?php echo $fclt->tipo_agendamento;?></td>
                        <td></td>
                        <td><?php echo $fclt->arquivos;?></td>
                        <td>
                            <select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                <option value='<?php echo ("facilities/editar/$fclt->id"); ?>'>Editar</option>
                                <option value="ver_detalhes">Ver detalhes</option>
                                <option value="ver_extrato">Ver extrato</option>
                                <option value="inativar">Inativar</option>
                            </select>
                        </td>
                </tr>
           <?php } ?>
        
        </tbody>
    </table>
         
    
    <div class="select">
        <p>Com marcados:
            <select class="change_option" id="comMarcados">
                <option value="selecione">Selecione...</option>
                <option value="">Ativar</option>
                <option value="">Inativar</option>
                <option value="">Bloquear</option>
                
                <option value="">Enviar Mensagem</option>
            </select>
        </p>
    </div>
    
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
           window.location.href = '<?php echo base_url("usuarios/listar/id");  ?>' + '/' + option + '/0' ;
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

                    case 'ver_detalhes':      
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
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
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
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
                        var id = jQuery(this).closest("tr.listar_usuario").attr("id").split("-");
                        id = id[1];
                        window.location.href = '<?php echo base_url(''); ?>' + option;
                     break;
                }  
           }
        });    
    });
    
    
</script>