<style>
    #descricao{width: 500px; margin: 0 auto;}
    .fclt_info {height: 145px;}
    #tipo_agendamento {margin: 35px 15px;}
	#fclt_ver_nome_abreviado { max-width:510px }
</style>
 
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="fclt_ver_nome_abreviado"> 
            <h1><?php echo $fclt->nome_abreviado; ?><br /></h1>
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
            <?php
				$ft = new Facility();
				$ft->include_related('usuarios','*')->where('id', $fclt->id)->where('usuario_id',$uID)->get();
				$cd = new Usuario();
				$cd->where('id',$ft->usuario_id)->get();
				if ($ft->usuario_id == $uID || $cd->credencial == CREDENCIAL_USUARIO_SUPERADMIN):
			?>
                <button type="button" class="btn pull-right" name="submit" onClick="<?php echo base_url("facilities/editar/$fclt->id"); ?>">Editar</button>
                <?php endif; ?>
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
        <?php //@TODO calendário ?>
            <h2><p>Calendário de agendamento</p></h2>
                <iframe src="https://www.google.com/calendar/embed?src=r48fg6mnjqjesb3j14rn0ieo9c%40group.calendar.google.com&ctz=America/Sao_Paulo" style="border: 0" width="680" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
        
        <div class="form-actions">
            <h2><p>Relatórios</p></h2>
            <div class="span2"><?php echo ''; ?></div>    
        </div>

        
    </div>
    <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>
