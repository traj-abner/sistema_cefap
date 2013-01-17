<style>
    #descricao{width: 500px; margin: 0 auto;}
    .fclt_info {height: 145px;}
    #tipo_agendamento {margin: 35px 15px;}
	#fclt_ver_nome_abreviado { max-width:510px }
</style>
<script src="<?php echo base_url(); ?>js/jquery.weekcalendar.js"></script> 
<script src="<?php echo base_url(); ?>js/calendar.js"></script> 
<link rel="stylesheet" type="text/css"
href="<?php echo base_url(); ?>js/jquery-ui.css" /> 
<link rel="stylesheet" type="text/css" 
href="<?php echo base_url(); ?>js/jquery.weekcalendar.css"/>
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="fclt_ver_nome_abreviado"> 
            <h1><?php echo $fclt->nome_abreviado; ?><br /></h1>
        </div>
       
        
        <div class="btn-right">
            <input type="submit" class="btn" name="submit" value="Log de acesso">
            <input type="button" class="btn" name="cancelar" value="Escrever Mensagem">
        </div>    
<br />
        <div class="user_info">
			<div id="fclt_ver_nome">
            <h2><strong><?php echo $fclt->nome; ?></strong></h2>
        </div>
            <div class="row">
                <div class="span2">Status: <?php echo ''; ?></div>           
                <div class="span2">Cadastrado em: <?php echo ''; ?> </div>
            </div>
            <br>
            
       </div>
    </div>
    <div class="modal-body">

        <div class="form-actions">
            <h2><p>Informações Gerais</p></h2>
            <div class="btn-right">
                <button type="button" class="btn pull-right" name="submit" onClick="<?php /*base_url("usuarios/editar/$user->id")*/ ?>">Editar</button>
            </div>
        </div>

        <div class="fclt_info">  
            <div id="descricao">Descrição: <?php echo $fclt->descricao; ?></div>
            
            <div id="tipo_agendamento">Tipo de Agendamento: <?php echo $fclt->tipo_agendamento; ?></div>
        </div>

        <div class="form-actions">
            <h2><p>Administradores</p></h2>
            <div class="span2"><?php 
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
							?></div>    
        </div>
        
        <div class="form-actions">
            <h2><p>Arquivos</p></h2>
            <div class="span2"><?php echo $fct->arquivos; ?></div>    
        </div>

        <div class="form-actions">
            <h2><p>Formulários de requisição de agendamento</p></h2>
            <div class="span2"><?php echo ''; ?></div>    
        </div>
        
        <div class="form-actions">
        <?php //@todo calendário ?>
            <h2><p>Calendário de agendamento</p></h2>
            <div class="span2"><div id="calendar_wrapper" style="height:500px"></div> </div>    
        </div>
        
        <div class="form-actions">
            <h2><p>Relatórios</p></h2>
            <div class="span2"><?php echo ''; ?></div>    
        </div>

        
    </div>
    <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>

