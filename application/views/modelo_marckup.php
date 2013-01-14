<?php 
    $this->load->view('header');
?>

<div id="main_content">
		<h2>Agendamentos » <span>Novo agendamento</span></h2>
	<?php echo set_breadcrumb(); ?>
	      
        <?php echo (isset($msg) && isset($msg_type) )? msg($msg, $msg_type) : ''; ?>          
	<!-- tabela -->
	
	<div class="well">
		<h2 class="pull-left">Tabela</h2>
		<div class="btn-group pull-right">
			<button class="btn">Nova facility</button>
			<button class="btn">Nova facility</button>
			<button class="btn">Nova facility</button>
		</div>
	</div>
	
		<ul class="pager">
			<li><a href="#">Primeira</a></li>
			<li><a href="#">anterior</a></li>
			<li><input type="text" class="input-mini input-page" /></li>
			<li><a href="#"><i class="icon-forward"></i></a></li>
			<li><a href="#">última</a></li>
		</ul>
	
		<table class="table">
			<caption>table caption</caption>
			<thead>
				<tr>
					<th></th>
					<th>nome</th>
					<th>agendamento</th>
					<th>administradores</th>
					<th>arquivos</th>
					<th>opções</th>
				</tr>
			</thead>
			<tfoot></tfoot>
			<tbody>
				<tr>
					<td><input type="checkbox" /></td>
					<td><a href='<?php echo base_url('usuarios/listar'); ?>'>Link para Listar</a></td>
					<td><a href='<?php echo base_url('usuarios/adicionar'); ?>'>Link para Adicionar</a></td>
					<td><a href='<?php echo base_url('usuarios/editar'); ?>'>Link para Editar</a></td>
					<td></td>
					<td><select class="input-medium"><option>Selecione...</option></select></td>
				</tr>
				<tr>
					<td><input type="checkbox" /></td>
					<td><a href='<?php echo base_url('usuarios/lembrete_senha'); ?>'>Link para Lembrete de Senha</a></td>
					<td><a href='<?php echo base_url('usuarios/dados_pessoais'); ?>'>Link para Dados Pessoais</a></td>
					<td><a href='<?php echo base_url('usuarios/login'); ?>'>Login</a></td>
                                        <td></td>
					<td><select class="input-medium"><option>Selecione...</option></select></td>
				</tr>
				<tr>
					<td><input type="checkbox" /></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><select class="input-medium"><option>Selecione...</option></select></td>
				</tr>
			</tbody>
		</table>
		
	<!-- formulário -->
	<div class="well">Formulário</div>
	
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="input_userName">Username</label>
				<div class="controls">
					<input type="text" id="input_userName" />
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="input_pw">Senha</label>
				<div class="controls">
					<input type="password" id="input_pw" />
				</div>
			</div>
			
			<div class="control-group error">
				<label class="control-label" for="input_qualquerCoisaErrada">Label campo com erro</label>
				<div class="controls">
					<input type="text" id="input_qualquerCoisaErrada" />
					<span class="help-inline">Por favor corrija os erros</span>
				</div>
			</div>
			
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button type="button" class="btn">Cancelar</button> 
			</div>
		</form>
		
		<input class="input-mir" />
		<input class="input-small" />
		<input class="input-medium" />
		<input class="input-large" />
		<input class="input-xlarge" />
		
	<!-- misc -->	
		
		<div><i class="icon-trash"></i><i class="icon-plus"></i><i class="icon-forward"></i>teste de icons</div>
		
		
	
	</div><!-- end main_content -->
        
<?php 
    $this->load->view('footer');
?>
