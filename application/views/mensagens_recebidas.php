
<?php 
    $this->load->view('header');  
	$today = getdate();
	$usr_id = $this->uri->segment(3);
	#@TODO definir nível de acesso
	$usr = new Usuario();
	$usr->where('id',$usr_id)->get();
	
?>
<style type="text/css">
	.unread { font-weight:bold; }
	.unread a { font-style:normal }
	.unread a:link { color:#333; }
	.unread a:visited { color:#333; }
	.unread a:hover { font-style:italic; color:#666; }
	.msg-link a { font-style:normal }
	.msg-link a:link { color:#333; }
	.msg-link a:visited { color:#333; }
	.msg-link a:hover { font-style:italic; color:#666; }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/modal-style.css"/>
<div id="myModal" class="modal hide fade">
</div>

<div id="main_content">	
   <div id="breadcrumbs"><?php    echo set_breadcrumb(); ?> </div> 
    <div class="well"><h2>Mensagens Recebidas</h2>
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
                        <th><a href='<?php echo base_url("mensagens/recebidas/data_envio/$limit/$perpage/DESC"); ?>'>Recebido em
                            <?php 
                                if(isset($img) && $img == 'data_envio'){
                                    echo '<a href="';
                                    echo base_url("mensagens/recebidas/data_envio/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("mensagens/recebidas/data_envio/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("mensagens/recebidas/from_id/$limit/$perpage/ASC"); ?>'>Enviado por
                            <?php 
                                if(isset($img) && $img == 'from_id'){
                                    echo '<a href="';
                                    echo base_url("mensagens/recebidas/from_id/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("mensagens/recebidas/from_id/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href='<?php echo base_url("mensagens/recebidas/assunto/$limit/$perpage/ASC"); ?>'>Assunto
                            <?php 
                                if(isset($img) && $img == 'assunto'){
                                    echo '<a href="';
                                    echo base_url("mensagens/recebidas/assunto/$limit/$perpage/DESC");
                                    echo '"<i class="icon-chevron-down"></i>';
                                    
                                    echo '<a href="';
                                    echo base_url("mensagens/recebidas/assunto/$limit/$perpage/ASC");
                                    echo '"<i class="icon-chevron-up"></i>';
                                } 
                            ?>
                            </a>
                        </th>
                        <th><a href=''>Opções
                            </a>
                        </th>
                </tr>
        </thead>
        
        <tbody>  
            <?php 
			$i = 0;
			$ur = new Usuario();
			foreach($msg as $m): ?>

                <tr class="listar_usuario" id="usuario-<?php echo $m->id?>">
                        <td><input type="checkbox" name="user_List" id="chM" class="chM"/></td>
                        <td <?php if ($m->status == STATUS_MSG_NAO_LIDA): echo 'class="unread"'; else: echo 'class="msg-link"'; endif; ?>> <a href="<?php echo base_url('mensagens/ler/'.$m->keygen); ?>"><?php echo $dvc[$i];?></a></td>
                        <td <?php if ($m->status == STATUS_MSG_NAO_LIDA): echo 'class="unread"'; else: echo 'class="msg-link"'; endif; ?> ><a href="<?php echo base_url('mensagens/ler/'.$m->keygen); ?>"><?php $ur->where('id',$m->from_id)->get(); echo $ur->nome;?></a></td>
                        <td <?php if ($m->status == STATUS_MSG_NAO_LIDA): echo 'class="unread"'; else: echo 'class="msg-link"'; endif; ?> ><a href="<?php echo base_url('mensagens/ler/'.$m->keygen); ?>"><?php echo $m->assunto;?></a></td>
                        <td><select class="input-medium change_option" id="select_emlinha">
                                <option value="selecione">Selecione...</option>
                                <option value="mensagens/escrever/responder/<?php echo $m->keygen; ?>">Responder</option>
                            </select></td>
                </tr>
                
                
                <?php $i++;
				endforeach; ?>
        
        </tbody>
    </table>
    <div class="select">
        <p>Com marcados:
            <select class="change_option" id="comMarcados">
                <option value="selecione">Selecione...</option>
                <option value="<?php echo STATUS_MSG_EXCLUIDA; ?>">Excluir</option>
            </select>
        </p>
    </div>
    <?php echo $page; ?>
    <? else: 
	echo 'Nenhuma mensagem recebida';
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
           window.location.href = '<?php echo base_url("mensagens/recebidas/data_envio");  ?>' + '/' + option + '/1' ;
        });
		jQuery('#gotopage').change(function(){
		   var qtd = $("#selectQntd option:selected").val();
           var option = jQuery(this).val();
           window.location.href = '<?php echo base_url("mensagens/recebidas/data_envio");  ?>' + '/' + qtd + '/' + option ;
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

                         window.location.href = '<?php echo base_url('mensagens/mudar_status_multiplos'); ?>' + '/' + id + '/' + option;
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