<?php 
    $this->load->view('header'); 
?>
<div id="main_content">
    <?php echo set_breadcrumb(); 
        echo '<br><br>';
        if(isset($msg) && isset($msg_type)){ ?>
           <div class="alert <?php echo $msg_type?>" id="alert-success">
               <?php echo $msg; ?>
           </div> 
        <?php 

        }else{
            echo ('');

        }
        $u = $this->session->userdata('credencial');
        $userId = $this->session->userdata('id');
    ?>
    <!-- Se o usuário não for Admin ou SuperAdmin não terá permissão para visualizar a class 'top-->
    <?php if($u == CREDENCIAL_USUARIO_SUPERADMIN || $u == CREDENCIAL_USUARIO_ADMIN){ ?>
         <div class="top">
        
            <h1>Estatísticas do Sistema</h1>

            <select id="selectDashboard">
                <option>Acessos</option>
                <option>Solicitações de agendamento</option>
                <option>Novos boletos R$</option>
                <option>Agendamentos aprovados</option>
                <option>Novos cadastro de usuários</option>
                <option>Hora de uso das facilities</option>
            </select>
        </div>
    <?php } ?>
    
    
    <br>
    <div class="middle-left">
        <h1>Acesso Rápido</h1>

        <div class="pull-left">
            <ul>
                <li><a href="<?php echo base_url("usuarios/editar/$userId"); ?>">Editar meu dados cadastrais</a></li>
                <li><a href="<?php echo base_url("usuarios/trocar_senha/$userId"); ?>">Trocar minha senha de acesso ao sistema</a></li>
                <?php 
                
                if($u == CREDENCIAL_USUARIO_COMUM){ ?>
                    <li><a href="<?php echo base_url("projetos/listar_meus"); ?>">Gerenciar meus projetos científicos</a></li>
                <?php } 
                
                if($u == CREDENCIAL_USUARIO_SUPERADMIN){ ?>
                    <li><a href="<?php echo base_url("configuracoes/editar"); ?>">Editar as configurações do sistema</a></li>
                    <li><a href="<?php echo base_url("usuarios/listar"); ?>">Listar Usuários</a></li>
                     <?php } ?>
                 
                
                
                
            </ul>
      </div>
        <div class="hr">&nbsp;</div>
        <div class="pull-right">
            <ul>
                
                <?php 
                
                if($u == CREDENCIAL_USUARIO_COMUM){ ?>
                    <li><a href="<?php echo base_url("ajuda"); ?>">FAQ - Perguntas mais frequentes</a></li>
                    <li><a href="<?php echo base_url("mensagens/escrever"); ?>">Escrever nova mensagem</a></li>   
                <?php } 
                
                if($u == CREDENCIAL_USUARIO_SUPERADMIN){ ?>    
                    <li><a href="<?php echo base_url("editar_ajuda"); ?>">Editar conteúdo da ajuda aos usuários</a></li>
                    <li><a href="<?php echo base_url("creditos/listar"); ?>">Boletos emitidos</a></li>
                     <li><a href="<?php echo base_url("mensagem/escrever"); ?>">Escrever nova mensagem</a></li>         
                <?php } 
                
                if($u == CREDENCIAL_USUARIO_ADMIN){ ?>    
                    <li><a href="<?php echo base_url("agendamentos/listar"); ?>">Agendamentos solicitados</a></li>
                    <li><a href="<?php echo base_url("mensagem/escrever"); ?>">Escrever nova mensagem</a></li>         
                <?php } ?>
            </ul>
        </div>
        
    </div>
    <div class="middle-right">
    <div style="vertical-align:bottom;">
             <input type="button" value="Inserir Créditos" class="btn" onclick="document.location='<?php echo base_url('creditos/inserir'); ?>'">
            <input type="button" value="Extrato" class="btn" onclick="document.location='<?php echo base_url('creditos/extrato/'.$this->session->userdata('id')); ?>'">
            </div><br /><br />
            
        <h1>Créditos</h1>
        <div>
        	<p style="font-size:14px;"><strong>Saldo</strong>: 
           <?php echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($sum,2,TS,DS);?>
           </p>
        </div>
    </div>
    
    <div class="middle-down-left" id="middle-down">
    	<div style="vertical-align:bottom;">
             <input type="button" value="Escrever Mensagem" class="btn" onclick="document.location='<?php echo base_url('mensagens/escrever'); ?>'">
            <input type="button" value="Recebidas" class="btn" onclick="document.location='<?php echo base_url('mensagens/recebidas/'); ?>'">
            </div><br />
            
        <h1>Mensagens recebidas</h1><br>
        <div style="text-align:left;">
        	<?php 
			if ($n_mensagens > 0):
			$um = new Usuario();
			
			foreach ($received_messages as $rm): ?>
            <p><strong>Enviado por</strong>: 
            <?php $um->get_by_id($rm->from_id);
			echo $um->nome;
			?>
            <br><strong>Em</strong>: <?php echo date('d/m/Y H:i',strtotime($rm->data_envio)); ?>
            <br><strong>Assunto</strong>: <?php echo $rm->assunto; ?><br>
                <a href="<?php echo base_url('mensagens/ler/'.$rm->keygen);?>">Ler...</a>
            </p>
            <br>
            <?php endforeach; 
			else:?>
				<p style="text-align:center">
                	Nenhuma Mensagem Encontrada
                </p>
			<?php endif;
			?>
        </div>
    </div>
    
    <div class="middle-down-center" id="middle-down">
    	<div style="vertical-align:bottom;">
             <input type="button" value="Todos os Boletos" class="btn" onclick="document.location='<?php echo base_url('creditos/listar'); ?>'">
            <input type="button" value="Lançamentos" class="btn" onclick="document.location='<?php echo base_url('creditos/lancamentos'); ?>'">
            </div><br /><br />
            
        <h1>Boletos</h1><br>
        <div>
        	<?php if (count($bols) > 0):
				foreach ($bols as $b):
			 ?>
            <p style="text-align:left"><a href="<?php echo base_url('creditos/imprimir_boleto/'.$b->chave); ?>" target="_blank"><?php echo 'Venc: ' . date('d/m/Y',strtotime($b->data_vencimento)) . ' - ' . SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($b->valor_total,2,TS,DS) . ' - '; 
				switch($b->status):
					case STATUS_BOLETO_EM_ABERTO: echo 'Em Aberto'; break;
					case STATUS_BOLETO_VENCIDO: echo 'Vencido'; break;
					case STATUS_BOLETO_PAGO: echo 'Pago'; break;
					case STATUS_BOLETO_CANCELADO: echo 'Cancelado'; break;
				endswitch;
			?></a><br></p>
            <br>
            <?php endforeach;
			else: echo '<p>Nenhum boleto encontrado</p>';
			endif; ?>
        </div>
    </div>
    <div class="middle-down-right" id="middle-down">
    	<div style="vertical-align:bottom;">
             <input type="button" value="Novo Agendamento" class="btn" onclick="document.location='<?php echo base_url('agendamentos/criar'); ?>'">
            <input type="button" value="Solicitações" class="btn" onclick="document.location='<?php echo base_url('agendamentos/listar'); ?>'">
            </div><br /><br />
        <?php if ($uRole == CREDENCIAL_USUARIO_COMUM): ?><h1>Meus Agendamentos</h1><br> <?php endif; ?>
        <?php if ($uRole > CREDENCIAL_USUARIO_COMUM): ?><h1>Agendamentos</h1><br> <?php endif; ?>
        <div>
        	
        	<?php 
			if (count($agn) > 0): 
			foreach ($agn as $ag):?>
            <p style="margin-bottom:15px; text-align:left">
            <?php 	
					if ($uRole >= CREDENCIAL_USUARIO_ADMIN):
						echo '<a href="'.base_url('agendamentos/editar/'.$ag->id).'">';
					endif;
					echo $ag->facility_nome_abreviado . ' - ';
					if ($ag->periodo_inicial_marcado != '0000-00-00 00:00:00'): 
						echo date('d/m/Y H:i',strtotime($ag->periodo_inicial_marcado)) . ' às ' . date('H:i',strtotime($ag->periodo_final_marcado)) ;
					else:
						echo date('d/m/Y H:i',strtotime($ag->periodo_inicial)) . ' às ' . date('H:i',strtotime($ag->periodo_final)) ;
					endif; 
					
					echo ' - ' . $ag->usuario_nome;
					
					if ($uRole >= CREDENCIAL_USUARIO_ADMIN):
						echo '</a>';
					endif;
					 ?>
            </p>
           
            <? endforeach;
			else: echo '<p>Nenhum agendamento encontrado</p>';
			endif; ?>
           
        </div>
         
            
    </div>
    
    <div class="down-left" id="down">
        <h1>Notícias do site do CEFAP via RSS</h1><br>
        
    </div>
    <div class="down-right" id="down">
        <h1>Notícias do site do CEFAP via RSS</h1><br>
        
    </div>
    
    
    
    
</div>
<?php
    
    $this->load->view('footer'); 
?>  