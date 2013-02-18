<?php 
    $this->load->view('header'); 
	
	function traduz_status_agendamento($s)
	{
		switch($s)
		{
			case AGENDAMENTO_STATUS_SOLICITADO: return "solicitado";
			case AGENDAMENTO_STATUS_APROVADO: return "aprovado";
			case AGENDAMENTO_STATUS_NEGADO: return "negado";
			case AGENDAMENTO_STATUS_FALTOU: return "faltou";
			case AGENDAMENTO_STATUS_COMPARECEU: return "compareceu";
			case AGENDAMENTO_STATUS_CANCELADO: return "cancelado";
			case AGENDAMENTO_STATUS_EXCLUIDO: return "excluído";
		}
	}		


	function traduz_status_agendamento_classe($s)
	{
		switch($s)
		{
			case AGENDAMENTO_STATUS_SOLICITADO: return "label-warning";
			case AGENDAMENTO_STATUS_APROVADO: return "label-success";
			case AGENDAMENTO_STATUS_NEGADO: return "label-important";
			case AGENDAMENTO_STATUS_FALTOU: return "label-important";
			case AGENDAMENTO_STATUS_COMPARECEU: return "label-success";
			case AGENDAMENTO_STATUS_CANCELADO: return "llabel-important";
			case AGENDAMENTO_STATUS_EXCLUIDO: return "excluído";
		}
	}		
?>
<div id="main_content">
    <?php 
        if(isset($msg) && isset($msg_type)): ?>
           <div class="alert <?php echo $msg_type?>" id="alert-success">
               <?php echo $msg; ?>
           </div> 
		<?php endif; ?>
        <?php 

        $u = $this->session->userdata('credencial');
        $userId = $this->session->userdata('id');
    ?>
	
	<?php // ======================================= COMUM ======================================== ?>
	<?php if($u == CREDENCIAL_USUARIO_COMUM): ?>
	<div class="row-fluid">
		<div class="span8 div-dashboard" style="min-height: 140px;">
			<h3>Acesso rápido</h3>
			<div class="row-fluid">
				<div class="span6">
					<div>
						<ul>
							<li><a href="<?php echo base_url("usuarios/editar/$userId"); ?>">Editar meu dados cadastrais</a></li>
							<li><a href="<?php echo base_url("usuarios/trocar_senha/$userId"); ?>">Trocar minha senha de acesso ao sistema</a></li>
							<li><a href="<?php echo base_url("projetos/listar_meus"); ?>">Gerenciar meus projetos científicos</a></li>

						</ul>
					</div>
				</div>
				<div class="span6">
					<div>
						<ul>
							<li><a href="<?php echo base_url("projetos/listar_meus"); ?>">Conhecer melhor as facilities</a></li>
							<li><a href="<?php echo base_url("ajuda"); ?>">FAQ - Perguntas mais frequentes</a></li>
							<li><a href="<?php echo base_url("creditos/extrato/$userId"); ?>">Obter extrato de crédito</a></li>   
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<div class="span4 div-dashboard" style="text-align: center; min-height: 140px;">
			<h3>Último acesso</h3>
			A última vez que você efetuou login <br>no sistema foi em:<br>
			<div style="margin-top: 8px; line-height: 18px; font-size: 14px;">
			<strong>13/08/2012 20:40</strong><br>
			IP: <strong>200.129.345.456</strong>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	
	<div class="row-fluid">
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3><?php echo $tit_novas_mensagens; ?></h3>
			
        	<?php 
			if ($n_mensagens > 0):
			$um = new Usuario();
			
			foreach ($received_messages as $rm): ?>
				<p class="p-msg"><strong>De</strong>: 
				<?php $um->get_by_id($rm->from_id);
				echo $um->nome . " " . $um->sobrenome . " (" . $um->username . ")";
				?>
				<br><strong>Data</strong>: <?php echo date('d/m/Y H:i',strtotime($rm->data_envio)); ?>
				<br><strong>Assunto</strong>: <a href="<?php echo base_url('mensagens/ler/'.$rm->keygen);?>"><?php echo $rm->assunto; ?></a>
				</p>
            <?php endforeach; ?>
				<?php if($n_mensagens > 2) echo "(...)"; ?>
				<div style="text-align: center;"><br>
				<a href="<?php echo base_url('mensagens/recebidas/'); ?>">Caixa de entrada</a> &nbsp;|&nbsp; <a href="<?php echo base_url('mensagens/escrever'); ?>">Nova mensagem</a>
				</div>
			
			<?php else:?>
				<p style="text-align:center">
                	Você não possui nenhuma mensagem não lida.
                </p>
			<?php endif;
			?>
			
			
		</div>
		
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3>Minha conta</h3>
			<div style="width: 100%; text-align: center; margin-top: 20px;">saldo: <span style="font-size: 22px;"><?php echo $saldo; ?></span>
			<div class="clear" style="height: 20px;"></div>
			<input type="button" value="Inserir Créditos" class="btn btn-success" onclick="document.location='<?php echo base_url('creditos/inserir'); ?>'">
			</div>
			<h4>Últimos boletos</h4>
			<?php if (count($bols) > 0):
				foreach ($bols as $b):
			 ?>
            <p style="text-align:left"><?php echo '<strong>' . SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($b->valor_total,2,TS,DS) . '</strong> (venc: ' . date('d/m/Y',strtotime($b->data_vencimento)) . ', '; 
				switch($b->status):
					case STATUS_BOLETO_EM_ABERTO: echo '<span style="color: orange">Em Aberto</span>';break;
					case STATUS_BOLETO_VENCIDO: echo '<span style="color: red">Vencido</span>'; break;
					case STATUS_BOLETO_PAGO: echo '<span style="color: green">Pago</span>'; break;
					case STATUS_BOLETO_CANCELADO: echo '<span style="color: red">Cancelado</span>'; break;
				endswitch;
			?>) 
			<?php if($b->status == STATUS_BOLETO_EM_ABERTO) : ?>
				<a href="<?php echo base_url('creditos/imprimir_boleto/'.$b->chave); ?>" target="_blank"><i class="icon-print"></i></a><br></p>
			<?php endif; ?>
			
            <br>
            <?php endforeach;
			else: echo '<p>Nenhum boleto encontrado</p>';
			endif; ?>
			<div style="text-align: center;">
			<a href="<?php echo base_url('creditos/listar'); ?>">Todos os boletos</a> &nbsp;|&nbsp; <a href="<?php echo base_url('creditos/lancamentos'); ?>">Extrato</a>
			</div>
		</div>
		
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3>Meus agendamentos</h3>
			
			<?php 
	
			if ($n_agn > 0): 
			foreach ($agn as $ag):?>
            <p style="margin-bottom:15px; text-align:left">
            <?php 	

					
					echo "<span class='label " . traduz_status_agendamento_classe($ag->status) . "'>" . traduz_status_agendamento($ag->status) . "</span>&nbsp;";
					
					echo "<strong>" . $ag->facility_nome_abreviado . '</strong> - ';
					if ($ag->periodo_inicial_marcado != '0000-00-00 00:00:00'): 
						echo date('d/m/Y H:i',strtotime($ag->periodo_inicial_marcado)) . ' às ' . date('H:i',strtotime($ag->periodo_final_marcado)) ;
					else:
						echo date('d/m/Y H:i',strtotime($ag->periodo_inicial)) . ' às ' . date('H:i',strtotime($ag->periodo_final)) ;
					endif; 
					
					 ?>
            </p>
           
            <?php endforeach;

			else: echo '<p style="text-align: center;">Nenhum agendamento encontrado.</p>';
			endif; ?>
			
			<?php if($n_agn > 2) echo "(...)"; ?>
			
			<div style="text-align: center; margin-top: 8px;">
				<input type="button" value="Novo agendamento" class="btn btn-primary" onclick="document.location='<?php echo base_url('agendamentos/criar'); ?>'"><br><br>
				<a href="<?php echo base_url('agendamentos/listar'); ?>">Todos os agendamentos</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
		
		
	<div class="row-fluid div-rss">
		<div class="span6 div-dashboard">
			<h3>RSS CEFAP</h3>
		</div>
		
		<div class="span6 div-dashboard">
			<h3>RSS outra fonte</h3>
			
		</div>
	</div>
	<div class="clear"></div>
	
	
	<?php endif; ?>
	
	
	
	<?php // ======================================= ADMIN ======================================== ?>
	<?php if($u == CREDENCIAL_USUARIO_ADMIN) : ?>
	
	<div class="row-fluid">
	
		<div class="span12 div-dashboard">
			<div class="tabbable">
			  <ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab">Agendamentos</a></li>
				<li><a href="#tab2" data-toggle="tab">Créditos</a></li>
				<li><a href="#tab3" data-toggle="tab">Usuários</a></li>
			  </ul>
			  <div class="tab-content">
				<div class="tab-pane active" id="tab1">
				  <p>I'm in Section 1.</p>
				</div>
				<div class="tab-pane" id="tab2">
				  <p>Howdy, I'm in Section 2.</p>
				</div>
				<div class="tab-pane" id="tab3">
				  <p>Howdy, I'm in Section 3.</p>
				</div>
			  </div>
			</div>
		</div>
	</div>
	
	<div class="row-fluid">
	
		<div class="span8 div-dashboard" style="min-height: 140px;">
			<h3>Acesso rápido</h3>
			<div class="row-fluid">
				<div class="span6">
					<div>
						<ul>
							<li><a href="<?php echo base_url("usuarios/editar/$userId"); ?>">Editar meu dados cadastrais</a></li>
							<li><a href="<?php echo base_url("usuarios/trocar_senha/$userId"); ?>">Trocar minha senha de acesso ao sistema</a></li>
							<li><a href="<?php echo base_url("projetos/listar_meus"); ?>">Gerenciar meus projetos científicos</a></li>

						</ul>
					</div>
				</div>
				<div class="span6">
					<div>
						<ul>
							<li><a href="<?php echo base_url("agendamentos/listar"); ?>">Agendamentos solicitados</a></li>
							<li><a href="<?php echo base_url("relatorios"); ?>">Relatórios</a></li>
							<li><a href="<?php echo base_url("mensagens/adicionar"); ?>">Escrever nova mensagem</a></li>   
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<div class="span4 div-dashboard" style="text-align: center; min-height: 140px;">
			<h3>Último acesso</h3>
			A última vez que você efetuou login <br>no sistema foi em:<br>
			<div style="margin-top: 8px; line-height: 18px; font-size: 14px;">
			<strong>13/08/2012 20:40</strong><br>
			IP: <strong>200.129.345.456</strong>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	
	<div class="row-fluid">
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3><?php echo $tit_novas_mensagens; ?></h3>
			
        	<?php 
			if ($n_mensagens > 0):
			$um = new Usuario();
			
			
			
			foreach ($received_messages as $rm): ?>
				<p class="p-msg"><strong>De</strong>: 
				<?php $um->get_by_id($rm->from_id);
				echo $um->nome . " " . $um->sobrenome . " (" . $um->username . ")";
				?>
				<br><strong>Data</strong>: <?php echo date('d/m/Y H:i',strtotime($rm->data_envio)); ?>
				<br><strong>Assunto</strong>: <a href="<?php echo base_url('mensagens/ler/'.$rm->keygen);?>"><?php echo $rm->assunto; ?></a>
				</p>
            <?php endforeach; ?>
				<?php if($n_mensagens > 2) echo "(...)"; ?>
				<div style="text-align: center;"><br>
				<a href="<?php echo base_url('mensagens/recebidas/'); ?>">Caixa de entrada</a> &nbsp;|&nbsp; <a href="<?php echo base_url('mensagens/escrever'); ?>">Nova mensagem</a>
				</div>
			
			<?php else:?>
				<p style="text-align:center">
                	Você não possui nenhuma mensagem não lida.
                </p>
			<?php endif;
			?>
			
			
		</div>
		
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3>Boletos</h3>

			<?php //@TODO boletos dashboard admin ?>
			
			<div style="text-align: center;">
			<a href="<?php echo base_url('creditos/listar'); ?>">Todos os boletos</a> &nbsp;|&nbsp; <a href="<?php echo base_url('creditos/lancamentos'); ?>">Extrato</a>
			</div>
		</div>
		
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3>Agendamentos solicitados</h3>
			<?php //@TODO testar agendamentos dashboard admin ?>
			<?php 
	
			if ($n_agn > 0): 
			foreach ($agn as $ag):?>
            <p style="margin-bottom:15px; text-align:left">
            <?php 	

					$ag->usuarios->get();
					echo "<span class='label'>" . $ag->usuarios->username . "</span>&nbsp;";
					
					echo "<strong>" . $ag->facility_nome_abreviado . '</strong> - ';
					if ($ag->periodo_inicial_marcado != '0000-00-00 00:00:00'): 
						echo date('d/m/Y H:i',strtotime($ag->periodo_inicial_marcado)) . ' às ' . date('H:i',strtotime($ag->periodo_final_marcado)) ;
					else:
						echo date('d/m/Y H:i',strtotime($ag->periodo_inicial)) . ' às ' . date('H:i',strtotime($ag->periodo_final)) ;
					endif; 

					 ?>
					 <a href="<?php echo base_url('agendamentos/editar/'.$ag->id); ?>" title="Ver"><i class="icon-search"></i></a>
            </p>
           
            <?php endforeach;

			else: echo '<p style="text-align: center;">Nenhum agendamento encontrado.</p>';
			endif; ?>
			
			<?php if($n_agn > 2) echo "(...)"; ?>
			<div style="text-align: center; margin-top: 8px;">
				<input type="button" value="Novo agendamento" class="btn btn-primary" onclick="document.location='<?php echo base_url('agendamentos/criar'); ?>'"><br><br>
				<a href="<?php echo base_url('agendamentos/listar'); ?>">Todos os agendamentos</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
		
		
	<div class="row-fluid div-rss">
		<div class="span6 div-dashboard">
			<h3>RSS CEFAP</h3>
		</div>
		
		<div class="span6 div-dashboard">
			<h3>RSS outra fonte</h3>
			
		</div>
	</div>
	<div class="clear"></div>
	
	<?php endif; ?>
	
	
	<?php // ======================================= SUPERADMIN ======================================== ?>
	<?php if($u == CREDENCIAL_USUARIO_SUPERADMIN) : ?>
	<div class="row-fluid">
	
		<div class="span12 div-dashboard">
			<div class="tabbable">
			  <ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab">Agendamentos</a></li>
				<li><a href="#tab2" data-toggle="tab">Créditos</a></li>
				<li><a href="#tab3" data-toggle="tab">Usuários</a></li>
			  </ul>
			  <div class="tab-content">
				<div class="tab-pane active" id="tab1">
				  <p>I'm in Section 1.</p>
				</div>
				<div class="tab-pane" id="tab2">
				  <p>Howdy, I'm in Section 2.</p>
				</div>
				<div class="tab-pane" id="tab3">
				  <p>Howdy, I'm in Section 3.</p>
				</div>
			  </div>
			</div>
		</div>
	</div>
	
	<div class="row-fluid">
	
		<div class="span8 div-dashboard" style="min-height: 140px;">
			<h3>Acesso rápido</h3>
			<div class="row-fluid">
				<div class="span6">
					<div>
						<ul>
							<li><a href="<?php echo base_url("usuarios/editar/$userId"); ?>">Editar meu dados cadastrais</a></li>
							<li><a href="<?php echo base_url("usuarios/trocar_senha/$userId"); ?>">Trocar minha senha de acesso ao sistema</a></li>
							<li><a href="<?php echo base_url("projetos/listar_meus"); ?>">Gerenciar meus projetos científicos</a></li>

						</ul>
					</div>
				</div>
				<div class="span6">
					<div>
						<ul>
							<li><a href="<?php echo base_url("agendamentos/listar"); ?>">Agendamentos solicitados</a></li>
							<li><a href="<?php echo base_url("relatorios"); ?>">Relatórios</a></li>
							<li><a href="<?php echo base_url("mensagens/adicionar"); ?>">Escrever nova mensagem</a></li>   
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<div class="span4 div-dashboard" style="text-align: center; min-height: 140px;">
			<h3>Último acesso</h3>
			A última vez que você efetuou login <br>no sistema foi em:<br>
			<div style="margin-top: 8px; line-height: 18px; font-size: 14px;">
			<strong>13/08/2012 20:40</strong><br>
			IP: <strong>200.129.345.456</strong>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	
	<div class="row-fluid">
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3><?php echo $tit_novas_mensagens; ?></h3>
			
        	<?php 
			if ($n_mensagens > 0):
			$um = new Usuario();
			
			
			
			foreach ($received_messages as $rm): ?>
				<p class="p-msg"><strong>De</strong>: 
				<?php $um->get_by_id($rm->from_id);
				echo $um->nome . " " . $um->sobrenome . " (" . $um->username . ")";
				?>
				<br><strong>Data</strong>: <?php echo date('d/m/Y H:i',strtotime($rm->data_envio)); ?>
				<br><strong>Assunto</strong>: <a href="<?php echo base_url('mensagens/ler/'.$rm->keygen);?>"><?php echo $rm->assunto; ?></a>
				</p>
            <?php endforeach; ?>
				<?php if($n_mensagens > 2) echo "(...)"; ?>
				<div style="text-align: center;"><br>
				<a href="<?php echo base_url('mensagens/recebidas/'); ?>">Caixa de entrada</a> &nbsp;|&nbsp; <a href="<?php echo base_url('mensagens/escrever'); ?>">Nova mensagem</a>
				</div>
			
			<?php else:?>
				<p style="text-align:center">
                	Você não possui nenhuma mensagem não lida.
                </p>
			<?php endif;
			?>
			
			
		</div>
		
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3>Boletos</h3>

			<?php //@TODO boletos dashboard admin ?>
			
			<div style="text-align: center;">
			<a href="<?php echo base_url('creditos/listar'); ?>">Todos os boletos</a> &nbsp;|&nbsp; <a href="<?php echo base_url('creditos/lancamentos'); ?>">Extrato</a>
			</div>
		</div>
		
		<div class="span4 div-dashboard" style="min-height: 250px;">
			<h3>Agendamentos solicitados</h3>
			<?php 
	
			if ($n_agn > 0): 
			foreach ($agn as $ag):?>
            <p style="margin-bottom:15px; text-align:left">
            <?php 	
					$ag->usuarios->get();
					echo "<span class='label'>" . $ag->usuarios->username . "</span>&nbsp;";
					
					
					
					echo "<strong>" . $ag->facility_nome_abreviado . '</strong> - ';
					if ($ag->periodo_inicial_marcado != '0000-00-00 00:00:00'): 
						echo date('d/m/Y H:i',strtotime($ag->periodo_inicial_marcado)) . ' às ' . date('H:i',strtotime($ag->periodo_final_marcado)) ;
					else:
						echo date('d/m/Y H:i',strtotime($ag->periodo_inicial)) . ' às ' . date('H:i',strtotime($ag->periodo_final)) ;
					endif; 

					 ?>
					 <a href="<?php echo base_url('agendamentos/editar/'.$ag->id); ?>" title="Ver"><i class="icon-search"></i></a>
            </p>
           
            <?php endforeach;

			else: echo '<p style="text-align: center;">Nenhum agendamento encontrado.</p>';
			endif; ?>
			
			<?php if($n_agn > 2) echo "(...)"; ?>
			<div style="text-align: center; margin-top: 8px;">
				<input type="button" value="Novo agendamento" class="btn btn-primary" onclick="document.location='<?php echo base_url('agendamentos/criar'); ?>'"><br><br>
				<a href="<?php echo base_url('agendamentos/listar'); ?>">Todos os agendamentos</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
		
		
	<div class="row-fluid div-rss">
		<div class="span6 div-dashboard">
			<h3>RSS CEFAP</h3>
		</div>
		
		<div class="span6 div-dashboard">
			<h3>RSS outra fonte</h3>
			
		</div>
	</div>
	<div class="clear"></div>
		
	<?php endif; ?>

</div>  
  
<?php
    
    $this->load->view('footer'); 
?>  