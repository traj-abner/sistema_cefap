<?php $this->load->view('header');	?>
<div id="main_content">
	<div id="breadcrumbs"><?php echo set_breadcrumb();	?></div>
    
<?php
    if(isset($msg) && isset($msg_type)){ 
?>
    <div class="alert <?php echo $msg_type?>" id="alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
<?php 
    echo $msg; 
?>
    </div> 
<?php 
    };
    $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar'),
        "label" => array('class' => 'control-label')
    );
    echo form_open('usuarios/adicionar',$attributes['form']);

?>
<script type="text/javascript">
$(document).ready(function(){
	// Input masks
	$('#cpf').mask('999.999.999-99');
	$('#telefone').mask('(99) 99999999? ********************');
	$('#celular').mask('(99) 99999999?9');
	$('#cep').mask('99999-999');
	$('#data_nascimento').mask('99/99/9999');
	
	// CPF validation
	$('#cpf').blur(function(){
		var cpf = $(this).val();
		
		$.ajax({
			url: "<?php echo base_url('geral/checar_cpf'); ?>/?cpf=" + cpf,
			dataType: "html"
		}).done(function(data){
			if(data == 'ok')
			{
				$("#val-cpf").hide();
			}
			else
			{
				$("#cpf").val('');
				$("#val-cpf").html('Digite um CPF válido.');
				$("#val-cpf").show();
			}
		});
	});	
});
</script>


				<h2>Cadastro de usuário</h2>
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Instruções</h4>
					Preencha o formulário abaixo com seus dados pessoais.<br>Todos os campos são de preenchimento obrigatório.
				</div>

                 <div class="control-group">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                            <input type="text" name="username" id="username" class="input-medium s-popover" data-placement="right" data-title="Username" data-content="Digite somente caracteres Aa-Zz, números 0-9 ou underline (_)" value="<?php (empty($_SESSION['username'])) ? print '' : print $_SESSION['username']; ?>"/>
                    </div>
                </div>
                 
                 <div class="control-group">
                    <label class="control-label" for="senha">Senha</label>
                    <div class="controls">
                            <input type="password" name="senha" class="input-medium s-popover" data-placement="right" data-title="Senha" data-content="Não são aceitos espaços. Digite de 8 a 20 caracteres."/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="senha_conf">Redigite a Senha</label>
                    <div class="controls">
                            <input type="password" name="senha_conf" class="input-medium"/>
                    </div>
                </div>
                    
                 <div class="control-group">
                    <label class="control-label" for="nome">Nome</label>
                    <div class="controls">
                            <input type="text" name="nome" class="input-medium" value="<?php (empty($_SESSION['nome'])) ? print '' : print $_SESSION['nome']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="sobrenome">Sobrenome</label>
                    <div class="controls">
                            <input type="text" name="sobrenome" class="input-xlarge" value="<?php (empty($_SESSION['sobrenome'])) ? print '' : print $_SESSION['sobrenome']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="endereco">Endereço</label>
                    <div class="controls">
                            <textarea name="endereco" class="input-xlarge s-popover" data-placement="right" data-title="Exemplo" data-content="Av. Brig. Faria Lima, 400 - Ap. 35 - Bloco 4" ><?php (empty($_SESSION['endereco'])) ? print '' : print $_SESSION['endereco']; ?></textarea><br>
                    </div>
                </div>
                 
                <div class="control-group">
                    <label class="control-label" for="cep">CEP</label>
                    <div class="controls">
                            <input type="text" name="cep" id="cep" class="input-small" value="<?php (empty($_SESSION['cep'])) ? print '' : print $_SESSION['cep']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="cidade">Cidade</label>
                    <div class="controls">
                        <input type="text" name="cidade" class="input-large" value="<?php (empty($_SESSION['cidade'])) ? print '' : print $_SESSION['cidade']; ?>"/>
                    </div>
                </div>
     
                <div class="control-group">
                    <label class="control-label" for="uf">UF</label>
                    <div class="controls">
                        <select name="uf"> 
                            <option value="">Selecione o Estado</option> 
                            <option value="ac">Acre</option> 
                            <option value="al">Alagoas</option> 
                            <option value="am">Amazonas</option> 
                            <option value="ap">Amapá</option> 
                            <option value="ba">Bahia</option> 
                            <option value="ce">Ceará</option> 
                            <option value="df">Distrito Federal</option> 
                            <option value="es">Espírito Santo</option> 
                            <option value="go">Goiás</option> 
                            <option value="ma">Maranhão</option> 
                            <option value="mt">Mato Grosso</option> 
                            <option value="ms">Mato Grosso do Sul</option> 
                            <option value="mg">Minas Gerais</option> 
                            <option value="pa">Pará</option> 
                            <option value="pb">Paraíba</option> 
                            <option value="pr">Paraná</option> 
                            <option value="pe">Pernambuco</option> 
                            <option value="pi">Piauí</option> 
                            <option value="rj">Rio de Janeiro</option> 
                            <option value="rn">Rio Grande do Norte</option> 
                            <option value="ro">Rondônia</option> 
                            <option value="rs">Rio Grande do Sul</option> 
                            <option value="rr">Roraima</option> 
                            <option value="sc">Santa Catarina</option> 
                            <option value="se">Sergipe</option> 
                            <option value="sp">São Paulo</option> 
                            <option value="to">Tocantins</option> 
                        </select>
                    </div>
                </div>
                 
                <div class="control-group">
                    <label class="control-label" for="instituicao">Instituição</label>
                    <div class="controls">
                            <input type="text" name="instituicao" class="input-xlarge" value="<?php (empty($_SESSION['instituicao'])) ? print '' : print $_SESSION['instituicao']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="departamento">Departamento</label>
                    <div class="controls">
                            <input type="text" name="departamento" class="input-xlarge" value="<?php (empty($_SESSION['departamento'])) ? print '' : print $_SESSION['departamento']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="telefone">Telefone</label>
                    <div class="controls">
                            <input type="text" name="telefone" id="telefone" class="input-medium" value="<?php (empty($_SESSION['telefone'])) ? print '' : print $_SESSION['telefone']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="celular">Celular</label>
                    <div class="controls">
                            <input type="text" name="celular" id="celular" class="input-medium" value="<?php (empty($_SESSION['celular'])) ? print '' : print $_SESSION['celular']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="data_nascimento">Data de Nascimento</label>
                    <div class="controls">
                            <input type="text" name="data_nascimento" id="data_nascimento" class="input-small" value="<?php (empty($_SESSION['data_nascimento'])) ? print '' : print $_SESSION['data_nascimento']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="cpf">CPF</label>
                    <div class="controls">
                            <input type="text" name="cpf" id="cpf" class="input-medium" value="<?php (empty($_SESSION['cpf'])) ? print '' : print $_SESSION['cpf']; ?>"/>
							<label for="cpf" class="error" id="val-cpf"></label>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls">
                            <input type="text" name="email" class="input-large" value="<?php (empty($_SESSION['email'])) ? print '' : print $_SESSION['email']; ?>"/>
                    </div>
                </div>
        
                <div class="control-group">
				<label class="control-label" for="tipo">Nível Acadêmico</label>
				<div class="controls">
					<div class="radio-container"><input <?php echo (!empty($_SESSION['tipo']) && $_SESSION['tipo'] == TIPO_USUARIO_PROFESSOR) ? "checked='checked'" : "" ?> type="radio" name="tipo" value="<?php echo TIPO_USUARIO_PROFESSOR; ?>">Professor</div>
					<div class="radio-container"><input <?php echo (!empty($_SESSION['tipo']) && $_SESSION['tipo'] == TIPO_USUARIO_POSDOC) ? "checked='checked'" : "" ?> type="radio" name="tipo" value="<?php echo TIPO_USUARIO_POSDOC;	?>"/>Pós-doc</div>
					<div class="radio-container"><input <?php echo (!empty($_SESSION['tipo']) && $_SESSION['tipo'] == TIPO_USUARIO_JOVEM_PESQUISADOR) ? "checked='checked'" : "" ?> type="radio" name="tipo" value="<?php echo TIPO_USUARIO_JOVEM_PESQUISADOR; ?>"/>Jovem Pesquisador</div>
					<div class="radio-container"><input <?php echo (!empty($_SESSION['tipo']) && $_SESSION['tipo'] == TIPO_USUARIO_MESTRANDO) ? "checked='checked'" : "" ?> type="radio" name="tipo" value="<?php echo TIPO_USUARIO_MESTRANDO; ?>"/>Mestrando</div>
					<div class="radio-container"><input <?php echo (!empty($_SESSION['tipo']) && $_SESSION['tipo'] == TIPO_USUARIO_DOUTORANDO) ? "checked='checked'" : "" ?> type="radio" name="tipo" value="<?php echo TIPO_USUARIO_DOUTORANDO; ?>"/>Doutorando</div>
					<div class="radio-container"><input <?php echo (!empty($_SESSION['tipo']) && $_SESSION['tipo'] == TIPO_USUARIO_PESQUISADOR) ? "checked='checked'" : "" ?> type="radio" name="tipo" value="<?php echo TIPO_USUARIO_PESQUISADOR; ?>"/>Pesquisador</div>
				</div>
			</div>

                 <div class="control-group">
                 	<div class="controls"> 
                		<label class="checkbox">
                 			<input type="checkbox" name="newsletter" value="1" <?php echo (!empty($_SESSION['newsletter']) && $_SESSION['newsletter'] == 1) ? "checked='checked'" : "" ?> /> Desejo receber informações sobre o CEFAP
                 		</label>
                 	</div>
                 </div>

                 <?php if ($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN) : ?>
                 <div class="control-group">
                 	<label class="control-label" for="credencial">Credencial</label>
                 	<div class="controls">
                 		<select name="credencial">
                 			<option>Selecione...</option>
		                    <option value="<?php echo CREDENCIAL_USUARIO_COMUM; ?>" >Usuário</option>
		                    <option value="<?php echo CREDENCIAL_USUARIO_ADMIN; ?>" >Administrador</option>
		                    <option value="<?php echo CREDENCIAL_USUARIO_SUPERADMIN; ?>" >Super-administrador</option>
		                 </select>
                 	</div>
                 </div>
                <?php endif; ?>

                 <div class="form-actions">
                    <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" />
                    <input type="button" class="btn btn-link" name="cancelar" value="Cancelar" onclick="window.location.href='<?php echo base_url('usuarios/listar'); ?>'"/>
                </div>
        </form>   
    </div>
<?php
    
    $this->load->view('footer'); 
?> 