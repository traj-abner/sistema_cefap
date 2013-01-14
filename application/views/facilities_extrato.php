<style>
    #descricao{width: 500px; margin: 0 auto;}
    .fclt_info {height: 145px;}
    #tipo_agendamento {margin: 35px 15px;}
</style>

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="fclt_ver_nome_abreviado"> 
            <h1>Extrato de utilização de facilities</h1>
        </div>
        
        <div class="row">
            <div class="span2">Usuário: <?php echo ''; ?></div>
            <div class="span2">CPF: <?php echo ''; ?></div>             
            <div class="span2">Instituição: <?php echo ''; ?> </div>
            <div class="span2">Departamento: <?php echo ''; ?></div>
        </div>
        
        <div class="btn-right">
            <input type="submit" class="btn" name="submit" value="Log de acesso">
            <input type="button" class="btn" name="cancelar" value="Escrever Mensagem">
        </div>    

        <div class="user_info">

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
            <div id="descricao">Descrição: <?php echo ''; ?></div>
            
            <div id="tipo_agendamento">Tipo de Agendamento: <?php echo ''; ?></div>
        </div>

        <div class="form-actions">
            <h2><p>Administradores</p></h2>
            <div class="span2"><?php echo ''; ?></div>    
        </div>
        
        <div class="form-actions">
            <h2><p>Arquivos</p></h2>
            <div class="span2"><?php echo ''; ?></div>    
        </div>

        <div class="form-actions">
            <h2><p>Formulários de requisição de agendamento</p></h2>
            <div class="span2"><?php echo ''; ?></div>    
        </div>
        
        <div class="form-actions">
            <h2><p>Calendário de agendamento</p></h2>
            <div class="span2"><?php echo ''; ?></div>    
        </div>
        
        <div class="form-actions">
            <h2><p>Relatórios</p></h2>
            <div class="span2"><?php echo ''; ?></div>    
        </div>

        
    </div>
    <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>

