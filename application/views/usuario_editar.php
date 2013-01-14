<?php	$this->load->view('header');	?>

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
 
    }else{
        echo ('');

    }

    echo form_open('usuarios/editar/' .$u->id, array('class' => 'form-horizontal', 'id' => 'usuario_editar')); 
?>
<style>
    .informacao p {font-size: 16px; text-align: center; margin: 30px 0 30px 0;}
    #size-medium {font-size: 13px;}
    .span-ex-end {margin-top: 5px; margin-left: 13px; color: #B5B1B8;}
</style>		
                        <div class="informacao">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum, risus a suscipit ultrices, velit velit blandit neque, non egestas elit urna at est. Pellentesque tincidunt orci erat, in blandit mauris. 
                                Aliquam tellus lacus, iaculis ut vestibulum a, blandit tincidunt justo. Aliquam facilisis ante imperdiet massa feugiat ac gravida ipsum elementum. </p>
                            <p id='size-medium'><strong>*Todos os campos são de preenchimento obrigatório</strong></p>
                        </div>
			<div class="control-group">
                            <label class="control-label" for="username">Username</label>
                            <div class="controls">
                                    <input type="text" name="username" value="<?php echo $u->username; ?>"/>
                            </div>
			</div>

			<div class="control-group">
                            <label class="control-label" for="nome">Nome</label>
                            <div class="controls">
                                    <input type="text" name="nome" value="<?php echo $u->nome; ?>"/>
                            </div>
			</div>
			<div class="control-group">
                            <label class="control-label" for="sobrenome">Sobrenome</label>
                            <div class="controls">
                                    <input type="text" name="sobrenome" value="<?php echo $u->sobrenome; ?>"/>
                            </div>
			</div>

			<div class="control-group">
                            <label class="control-label" for="endereco">Endereço</label>
                            <div class="controls">
                                    <input type="text" name="endereco" value="<?php echo $u->endereco; ?>"/><br>
                                    <span class="span-ex-end">Ex: Av. Brig. Faria Lima, 400 - ap.35</span>
                            </div>
			</div>

			<div class="control-group">
				<label class="control-label" for="cep">CEP</label>
				<div class="controls">
					<input type="text" name="cep" value="<?php echo $u->cep; ?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="cidade">Cidade</label>
				<div class="controls">
					<input type="text" name="cidade" value="<?php echo $u->cidade; ?>"/>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="uf">UF</label>
				<div class="controls">
                                    <select name="uf">
                                        <option value="ac" <?php echo ($u->uf == "ac") ? 'selected="selected"' : ''; ?>>Acre</option> 
                                        <option value="al" <?php echo ($u->uf == "al") ? 'selected="selected"' : ''; ?>>Alagoas</option> 
                                        <option value="am" <?php echo ($u->uf == "am") ? 'selected="selected"' : ''; ?>>Amazonas</option> 
                                        <option value="ap" <?php echo ($u->uf == "ap") ? 'selected="selected"' : ''; ?>>Amapá</option> 
                                        <option value="ba" <?php echo ($u->uf == "ba") ? 'selected="selected"' : ''; ?>>Bahia</option> 
                                        <option value="ce" <?php echo ($u->uf == "ce") ? 'selected="selected"' : ''; ?>>Ceará</option> 
                                        <option value="df" <?php echo ($u->uf == "df") ? 'selected="selected"' : ''; ?>>Distrito Federal</option> 
                                        <option value="es" <?php echo ($u->uf == "es") ? 'selected="selected"' : ''; ?>>Espírito Santo</option> 
                                        <option value="go" <?php echo ($u->uf == "go") ? 'selected="selected"' : ''; ?>>Goiás</option> 
                                        <option value="ma" <?php echo ($u->uf == "ma") ? 'selected="selected"' : ''; ?>>Maranhão</option> 
                                        <option value="mt" <?php echo ($u->uf == "mt") ? 'selected="selected"' : ''; ?>>Mato Grosso</option> 
                                        <option value="ms" <?php echo ($u->uf == "ms") ? 'selected="selected"' : ''; ?>>Mato Grosso do Sul</option> 
                                        <option value="mg" <?php echo ($u->uf == "mg") ? 'selected="selected"' : ''; ?>>Minas Gerais</option> 
                                        <option value="pa" <?php echo ($u->uf == "pa") ? 'selected="selected"' : ''; ?>>Pará</option> 
                                        <option value="pb" <?php echo ($u->uf == "pb") ? 'selected="selected"' : ''; ?>>Paraíba</option> 
                                        <option value="pr" <?php echo ($u->uf == "pr") ? 'selected="selected"' : ''; ?>>Paraná</option> 
                                        <option value="pe" <?php echo ($u->uf == "pe") ? 'selected="selected"' : ''; ?>>Pernambuco</option> 
                                        <option value="pi" <?php echo ($u->uf == "pi") ? 'selected="selected"' : ''; ?>>Piauí</option> 
                                        <option value="rj" <?php echo ($u->uf == "rj") ? 'selected="selected"' : ''; ?>>Rio de Janeiro</option> 
                                        <option value="rn" <?php echo ($u->uf == "rn") ? 'selected="selected"' : ''; ?>>Rio Grande do Norte</option> 
                                        <option value="ro" <?php echo ($u->uf == "ro") ? 'selected="selected"' : ''; ?>>Rondônia</option> 
                                        <option value="rs" <?php echo ($u->uf == "rs") ? 'selected="selected"' : ''; ?>>Rio Grande do Sul</option> 
                                        <option value="rr" <?php echo ($u->uf == "rr") ? 'selected="selected"' : ''; ?>>Roraima</option> 
                                        <option value="sc" <?php echo ($u->uf == "sc") ? 'selected="selected"' : ''; ?>>Santa Catarina</option> 
                                        <option value="se" <?php echo ($u->uf == "se") ? 'selected="selected"' : ''; ?>>Sergipe</option> 
                                        <option value="sp" <?php echo ($u->uf == "sp") ? 'selected="selected"' : ''; ?>>São Paulo</option> 
                                        <option value="to" <?php echo ($u->uf == "to") ? 'selected="selected"' : ''; ?>>Tocantins</option> 
                                    </select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="instituicao">Instituição</label>
				<div class="controls">
					<input type="text" name="instituicao" value="<?php echo $u->instituicao; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="departamento">Departamento</label>
				<div class="controls">
					<input type="text" name="departamento" value="<?php echo $u->departamento; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="telefone">Telefone</label>
				<div class="controls">
					<input type="text" name="telefone" value="<?php echo $u->telefone; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="celular">Celular</label>
				<div class="controls">
					<input type="text" name="celular" value="<?php echo $u->celular; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="data_nascimento">Data de Nascimento</label>
				<div class="controls">
					<input type="text" name="data_nascimento" value="<?php echo $u->data_nascimento; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="cpf">CPF</label>
				<div class="controls">
					<input type="text" name="cpf" value="<?php echo $u->cpf; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="email">E-mail</label>
				<div class="controls">
					<input type="text" name="email" value="<?php echo $u->email; ?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="tipo">Nível Acadmêmico</label>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_PROFESSOR; ?>"			<?php echo ($u->tipo == TIPO_USUARIO_PROFESSOR) ? 'checked="checked"' : ''; ?>/>Professor
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_POSDOC;	?>"				<?php echo ($u->tipo == TIPO_USUARIO_POSDOC) ? 'checked="checked"' : ''; ?>/>Pós-doc
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_JOVEM_PESQUISADOR; ?>"	<?php echo ($u->tipo == TIPO_USUARIO_JOVEM_PESQUISADOR) ? 'checked="checked"' : ''; ?>/>Jovem Pesquisador
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_MESTRANDO; ?>"			<?php echo ($u->tipo == TIPO_USUARIO_MESTRANDO) ? 'checked="checked"' : ''; ?>/>Mestrando
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_DOUTORANDO; ?>"			<?php echo ($u->tipo == TIPO_USUARIO_DOUTORANDO) ? 'checked="checked"' : ''; ?>/>Doutorando
					</label>
					<label class="radio inline">
						<input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_PESQUISADOR; ?>"			<?php echo ($u->tipo == TIPO_USUARIO_PESQUISADOR) ? 'checked="checked"' : ''; ?>/>Pesquisador
					</label>
				</div>
			</div>
			
			<?php if ($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN) : ?>
                 <div class="control-group">
                 	<label class="control-label" for="credencial">Credencial</label>
                 	<div class="controls">
                 		<select name="credencial">
                 			<option>Selecione...</option>
		                    <option value="<?php echo CREDENCIAL_USUARIO_COMUM; 		?>" <?php if($u->credencial == CREDENCIAL_USUARIO_COMUM)		echo 'selected="selected"'; ?>>Usuário</option>
		                    <option value="<?php echo CREDENCIAL_USUARIO_ADMIN; 		?>" <?php if($u->credencial == CREDENCIAL_USUARIO_ADMIN)		echo 'selected="selected"'; ?>>Administrador</option>
		                    <option value="<?php echo CREDENCIAL_USUARIO_SUPERADMIN;	?>" <?php if($u->credencial == CREDENCIAL_USUARIO_SUPERADMIN)	echo 'selected="selected"'; ?>>Super-administrador</option>
		                 </select>
                 	</div>
                 </div>
            <?php endif; ?>
			
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" name="newsletter" value="<?php echo NEWSLETTER_RECEBE; ?>" <?php echo ($u->newsletter == NEWSLETTER_RECEBE) ? 'checked="checked"' : ''; ?>/>Desejo receber informações sobre o CEFAP
					</label>
				</div>
			</div>
			<div class="form-actions">
            	<input type="submit" class="btn btn-primary" name="submit" value="Confirmar" />
            	<input type="button" class="btn" name="cancelar" value="Cancelar" onclick="window.location.href='../listar'"/>
            </div>
			
<?php	echo form_close();	?>

</div>

<?php	echo $this->load->view('footer'); ?>
