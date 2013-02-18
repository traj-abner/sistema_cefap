<?php
if ($this->session->userdata('id') != NULL):
	$usr = new Usuario();
	$usr->get_by_id($this->session->userdata('id'));
	$uRole = $usr->credencial;
	$ur_m = new Mensagem();
	$m_nao_lidas = $ur_m->where('status',STATUS_MSG_NAO_LIDA)->where('to_id',$this->session->userdata('id'))->count();
	
else:
	$m_nao_lidas = 0;
	$uRole = -1;
endif;
?>

<?php 
// SALDO
if ($uRole == CREDENCIAL_USUARIO_COMUM)
{
	$sum = 0;
	$m_lc = new Lancamento();
	$m_lc->select_sum('valor','soma')->where('usuario_id',$this->session->userdata('id'))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_CREDITO)->get();
	$sum += $m_lc->soma;
	$m_lc->select_sum('valor','soma')->where('usuario_id',$this->session->userdata('id'))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_DEBITO)->get();
	$sum -= $m_lc->soma;
	$classe_saldo = ($sum < 0) ? "saldo-negativo" : "saldo-positivo";
	
	$saldo = '<span class="' . $classe_saldo . '">' . SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($sum,2,TS,DS) . '</span>';
}				
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<!--  jquery core -->
	<script src="<?php echo base_url('js/jquery-1.7.2.min.js'); ?>" type="text/javascript"></script>
	<!--  jquery ui -->
	<script src="<?php echo base_url('js/jquery-ui-1.8.20.custom.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('js/jquery.maskedinput-1.3.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('js/jquery.validate.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('js/bootstrap.js'); ?>" type="text/javascript"></script>
	
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo base_url('js/PIE_IE678.js'); ?>"></script>
	<![endif]-->
	<!--[if IE 9]>
		<script type="text/javascript" src="<?php echo base_url('js/PIE_IE9.js'); ?>"></script>
	<![endif]-->
	
	<link rel='stylesheet' id='bootstrap-css' href='<?php echo base_url('css/bootstrap.css'); ?>' type='text/css' media='all' />
	<link rel='stylesheet' id='main-css-css' href='<?php echo base_url('css/style.css'); ?>' type='text/css' media='all' />	
	<title><?php echo $title; ?> - CEFAP ICB-USP</title>
        
	<meta name='robots' content='noindex,nofollow' />
</head>
<body>

<script type="text/javascript">
$(document).ready(function() {
		if (window.PIE) {
			$('.pie').each(function() {
				PIE.attach(this);
			});
		}
	});
	
$(document).ready(function(){
	$('.s-popover').popover({
		trigger: 'focus'
	});
});

</script>

<div id="wrapper">
	<div id="header">
		<div id="top_bar"><!--
        	LOCAL RESERVADO PARA A BARRA SUPERIOR
            <?php #variável dedicada a mensagens não lidas: $m_nao_lidas; ?>
            -->
            
        </div><!-- end top_bar -->
		<div id="header_container">
		<?php if ($this->session->userdata('logged_in')) : ?>
		
        	<div id="superior">
            	<?php if ($m_nao_lidas > 0): ?><a href="<?php echo base_url('mensagens/recebidas'); ?>"> <?php echo '<span class="badge badge-info">' . $m_nao_lidas . '</span>'; if ($m_nao_lidas > 1): echo ' novas mensagens' ; else: echo ' nova mensagem'; endif;?></a> &nbsp;
				<?php else: ?> Nenhuma nova mensagem&nbsp;&nbsp;
                <?php endif; ?> | 
				
				<?php if ($uRole == CREDENCIAL_USUARIO_COMUM) : ?>
				<?php echo "&nbsp;Saldo:<strong> " . $saldo . "</strong>&nbsp; | "; ?>
				<?php endif; ?>
				
				<a href="<?php echo base_url(); ?>" class="link-superior" title="Página inicial do sistema"><i class="icon-home"></i></a> <a class="btn btn-mini btn-danger" href="<?php echo base_url('usuarios/logout'); ?>" ><i class="icon-remove icon-white"></i> Sair</a>
				<div class="btn-group">
				  <a class="btn dropdown-toggle btn-mini btn-info" data-toggle="dropdown" href="#">
					<i class="icon-cog icon-white"></i>
					<span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu" style="margin-left: -194px;">
					<li><a href="<?php echo base_url('usuarios/editar/'.$this->session->userdata('id')); ?>">Dados Pessoais</a></li>
					<li><a href="<?php echo base_url('usuarios/trocar_senha/'.$this->session->userdata('id')); ?>">Trocar Senha</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo base_url('projetos/listar_meus'); ?>">Projetos Cadastrados por Mim</a></li>
                    <li><a href="<?php echo base_url('projetos/inserir'); ?>">Novo Projeto de Pesquisa</a></li>
					<li class="divider"></li>
                    <li><a href="<?php echo base_url('mensagens/recebidas'); ?>">Mensagens Recebidas</a></li>
                    <li><a href="<?php echo base_url('mensagens/enviadas'); ?>">Mensagens Enviadas</a></li>
                    <li><a href="<?php echo base_url('mensagens/escrever'); ?>">Escrever Mensagem</a></li>
					<li class="divider"></li>
                    <li><a href="<?php echo base_url('configuracoes/ajuda'); ?>">Ajuda</a></li>
					
					<?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN): ?>
					<li><a href="<?php echo base_url('configuracoes/ajuda_editar'); ?>">Editar Ajuda</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo base_url('configuracoes/editar'); ?>">Configurações</a></li>
					<?php endif; ?>
					
					
				  </ul>
				</div>
			</div>

			<?php else: ?>
			
        	<div id="superior">
                <a target="_blank" href="<?php echo URL_SITE_CEFAP; ?>" class="link-superior">Site CEFAP</a>
			</div>
			
			<?php endif; ?>
			<h1><a href="<?php echo base_url(); ?>">CEFAP</a></h1>
			
		
		</div><!-- end header_container -->
	</div><!-- end header -->
	
	<div id="content" class="pie">
   
		<div id="main_menu_container" class="pie">
			<?php if (!$this->session->userdata('id')) : ?>
			
			<div id="bemvindo">
			Bem-vindo ao sistema de agendamento!
			</div>
			<?php endif; ?>
		
		
        	<?php if ($uRole == CREDENCIAL_USUARIO_COMUM): ?>
        	 <!-- REGULAR USER -->
			<ul id="main_menu_left" class="main_menu">
                <li id="mm_agendamentos" class="mm_primeiro"><a href="#">Agendamentos</a>
					<ul class="main_submenu pie" id="main_submenu_agendamentos">
						<li><a href="<?php echo base_url('agendamentos/criar'); ?>">Novo Agendamento</a></li>
                        <li><a href="<?php echo base_url('agendamentos/listar'); ?>">Todos os Agendamentos</a></li>
                        <li><a href="<?php echo base_url('agendamentos/calendario'); ?>">Próximos Agendamentos</a></li>
                        
					</ul><!-- end main_submenu_agendamentos -->
				</li>
                <li id="mm_creditos" class="mm_primeiro"><a href="#">Créditos</a>
					<ul class="main_submenu pie" id="main_submenu_agendamentos">
						<li><a href="<?php echo base_url('creditos/inserir'); ?>">Inserir Créditos</a></li>
                        <li><a href="<?php echo base_url('creditos/extrato/'.$this->session->userdata('id')); ?>">Extrato de Créditos</a></li>
                        <li><a href="<?php echo base_url('creditos/listar'); ?>">Boletos Emitidos</a></li>
						<li class="li-sem-hover"><div class="li-separador"></div></li>
                        <li class="li-sem-hover"><a href="#"><strong>Resumo da Conta</strong>
                        <br /><div style="margin-left:7px;">Saldo:
                        <?php
							$sum = 0;
							$m_lc = new Lancamento();
							$m_lc->select_sum('valor','soma')->where('usuario_id',$this->session->userdata('id'))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_CREDITO)->get();
							$sum += $m_lc->soma;
							$m_lc->select_sum('valor','soma')->where('usuario_id',$this->session->userdata('id'))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_DEBITO)->get();
							
							$sum -= $m_lc->soma;	
							echo SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($sum,2,TS,DS);	

							$m_bl = new Boleto();
							$bls = $m_bl->where('usuario_id',$this->session->userdata('id'))->where('status',STATUS_BOLETO_EM_ABERTO)->count();
							if ($bls == 0):
								echo '<br>Nenhum Boleto em Aberto';
							else:
								echo '<br><a href="' . base_url('creditos/listar') . '">Há ' . $bls . ' boleto';
								if ($bls > 1) echo 's';
								echo ' em aberto</a>';
								
							endif;
						?>
                        </div>
                        </a>
                            	
                        </li>
                        
					</ul><!-- end main_submenu_agendamentos -->
				</li>
				<li id="mm_facilidades" class="mm_primeiro"><a href="#">Facilidades</a>
					<ul class="main_submenu pie" id="main_submenu_facilidades">
                    <?php 
						$m_ft = new Facility();
						$m_ft->order_by('nome')->where('status', STATUS_FACILITIES_ATIVO)->get();
						foreach ($m_ft as $m_f):
					?>
                        <li><a href="<?php echo base_url('agendamentos/calendario/'.$m_f->id); ?>"><?php echo $m_f->nome_abreviado; ?></a></li>	
                        <?php endforeach; ?>
					</ul><!-- end main_submenu_facilidades -->
				</li>
                
			</ul><!-- end main_menu_left -->
			
		
            <!-- END REGULAR USER -->
            <?php endif; ?>
            
            
            <?php if ($uRole == CREDENCIAL_USUARIO_ADMIN): ?>
        	 <!-- ADMIN USER -->
			<ul id="main_menu_left" class="main_menu">
                <li id="mm_agendamentos" class="mm_primeiro"><a href="#">Agendamentos</a>
					<ul class="main_submenu pie" id="main_submenu_agendamentos">
						<li><a href="<?php echo base_url('agendamentos/criar'); ?>">Novo Agendamento</a></li>
                        <li><a href="<?php echo base_url('agendamentos/listar'); ?>">Todos os Agendamentos</a></li>
                        <li><a href="<?php echo base_url('agendamentos/calendario'); ?>">Próximos Agendamentos</a></li>
						<li class="li-sem-hover"><div class="li-separador"></div></li>
                        <li><a href="<?php echo base_url('creditos/lancamentos'); ?>">Lançamentos</a></li>
						<li class="li-sem-hover"><div class="li-separador"></div></li>
                        <li><a href="<?php echo base_url('projetos/listar'); ?>">Projetos de Pesquisa</a></li>
                        <li><a href="<?php echo base_url('projetos/inserir'); ?>">Novo Projeto de Pesquisa</a></li>
					</ul><!-- end main_submenu_agendamentos -->
				</li>
                <li id="mm_creditos" class="mm_primeiro"><a href="#">Créditos</a>
					<ul class="main_submenu pie" id="main_submenu_agendamentos">
						<li><a href="<?php echo base_url('creditos/inserir'); ?>">Inserir Créditos</a></li>
                        <li><a href="<?php echo base_url('creditos/extrato/'.$this->session->userdata('id')); ?>">Extrato de Créditos</a></li>
                        <li><a href="<?php echo base_url('creditos/listar'); ?>">Boletos Emitidos</a></li>
						<li class="li-sem-hover"><div class="li-separador"></div></li>
                        <li class="li-sem-hover"><a href="#"><strong>Resumo da Conta</strong>
                        <br /><div style="margin-left:7px;">Saldo:
						
                        <?php
							
							echo $saldo;

							$m_bl = new Boleto();
							$bls = $m_bl->where('usuario_id',$this->session->userdata('id'))->where('status',STATUS_BOLETO_EM_ABERTO)->count();
							if ($bls == 0):
								echo '<br>Nenhum Boleto em Aberto';
							else:
								echo '<br><a href="' . base_url('creditos/listar') . '">Há ' . $bls . ' boleto';
								if ($bls > 1) echo 's';
								echo ' em aberto';
								
							endif;
						?>
                        </div>
                        </a>
                            	
                        </li>
                        
					</ul><!-- end main_submenu_agendamentos -->
				</li>
				<li id="mm_facilidades" class="mm_primeiro"><a href="#">Facilidades</a>
					<ul class="main_submenu pie" id="main_submenu_facilidades">
                    <?php 
						$m_ft = new Facility();
						$m_ft->include_related('usuario')->where_related_usuario('id',$this->session->userdata('id'))->where('status', STATUS_FACILITIES_ATIVO)->order_by('nome')->get();
						foreach ($m_ft as $m_f):
					?>	<div class="facility"><?php echo $m_f->nome_abreviado; ?><br />
                        <a href="<?php echo base_url('facilities/editar/'.$m_f->id); ?>">Editar</a> | 
                        <a href="<?php echo base_url('facilities/extrato/'.$m_f->id); ?>" target="_blank">Extrato</a>	
                        </div>
                        <?php endforeach; ?>
					</ul><!-- end main_submenu_facilidades -->
				</li>
                
			</ul><!-- end main_menu_left -->
			

            <!-- END ADMIN USER -->
            <?php endif; ?>
            
            <?php if ($uRole == CREDENCIAL_USUARIO_SUPERADMIN): ?>
        	 <!-- ADMIN USER -->
			<ul id="main_menu_left" class="main_menu">
                <li id="mm_agendamentos" class="mm_primeiro"><a href="#">Agendamentos</a>
					<ul class="main_submenu pie" id="main_submenu_agendamentos">
						<li><a href="<?php echo base_url('agendamentos/criar'); ?>">Novo Agendamento</a></li>
                        <li><a href="<?php echo base_url('agendamentos/listar'); ?>">Todos os Agendamentos</a></li>
                        <li><a href="<?php echo base_url('agendamentos/calendario'); ?>">Próximos Agendamentos</a></li>
						<li class="li-sem-hover"><div class="li-separador"></div></li>
                        <li><a href="<?php echo base_url('creditos/listar'); ?>">Boletos Emitidos</a></li>
                        <li><a href="<?php echo base_url('creditos/lancamentos'); ?>">Lançamentos</a></li>
                        <li><a href="<?php echo base_url('creditos/inserir'); ?>">Inserir Créditos</a></li>
                        <li class="li-sem-hover"><div class="li-separador"></div></li>
                        <li><a href="<?php echo base_url('projetos/listar'); ?>">Projetos de Pesquisa</a></li>
                        <li><a href="<?php echo base_url('projetos/inserir'); ?>">Novo Projeto de Pesquisa</a></li>
					</ul><!-- end main_submenu_agendamentos -->
				</li>
                
				<li id="mm_facilidades" class="mm_primeiro"><a href="#">Facilidades</a>
					<ul class="main_submenu pie" id="main_submenu_facilidades">
                    	<div class="facility">Gerenciar<br />
                    	<a href="<?php echo base_url('facilities/listar'); ?>">Listar</a> | 
                        <a href="<?php echo base_url('facilities/adicionar'); ?>">Adicionar</a>
						</div>
						<li class="li-sem-hover"><div class="li-separador"></div></li>
                    <?php 
						$m_ft = new Facility();
						$m_ft->order_by('nome')->where('status', STATUS_FACILITIES_ATIVO)->get();
						foreach ($m_ft as $m_f):
					?>	<div class="facility"><?php echo $m_f->nome_abreviado; ?><br />
                        <a href="<?php echo base_url('facilities/editar/'.$m_f->id); ?>">Editar</a> | 
                        <a href="<?php echo base_url('facilities/extrato/'.$m_f->id); ?>" target="_blank">Extrato</a>	
                        </div>
                        <?php endforeach; ?><br>
					</ul><!-- end main_submenu_facilidades -->
				</li>
                <li id="mm_relatorios" class="mm_primeiro"><a href="#">Relatórios</a>
					<ul class="main_submenu pie" id="main_submenu_agendamentos">
						
                        <li><a href="#">Relatórios</a>
                        
                        </li>
                        
					</ul><!-- end main_submenu_agendamentos -->
				</li>
			</ul><!-- end main_menu_left -->
			
			<ul id="main_menu_right" class="main_menu">
				<li id="mm_meusdados" class="mm_primeiro"><a href="#">Usuários</a>
						<ul class="main_submenu pie" id="main_submenu_meusdados">
                        <li><a href="<?php echo base_url('usuarios/listar/'); ?>">Todos os Usuários</a></li>
                        <li><a href="<?php echo base_url('usuarios/adicionar/'); ?>">Adicionar</a></li>
                        
					</ul><!-- end main_submenu_meusdados -->
				</li>
			</ul><!-- end main_menu_right -->
            <!-- END ADMIN USER -->
            <?php endif; ?>
            
		</div><!-- end main_menu_container -->
        
