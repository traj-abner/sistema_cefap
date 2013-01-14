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
   
    $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar'),
        "label" => array('class' => 'control-label')
    );
    echo form_open('usuarios/adicionar',$attributes['form']);

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
                            <input type="text" name="username" value="<?php (empty($_SESSION['username'])) ? print '' : print $_SESSION['username']; ?>"/>
                    </div>
                </div>
                 
                 <div class="control-group">
                    <label class="control-label" for="senha">Senha</label>
                    <div class="controls">
                            <input type="password" name="senha"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="senha_conf">Redigite a Senha</label>
                    <div class="controls">
                            <input type="password" name="senha_conf"/>
                    </div>
                </div>
                    
                 <div class="control-group">
                    <label class="control-label" for="nome">Nome</label>
                    <div class="controls">
                            <input type="text" name="nome" value="<?php (empty($_SESSION['nome'])) ? print '' : print $_SESSION['nome']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="sobrenome">Sobrenome</label>
                    <div class="controls">
                            <input type="text" name="sobrenome" value="<?php (empty($_SESSION['sobrenome'])) ? print '' : print $_SESSION['sobrenome']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="endereco">Endereço</label>
                    <div class="controls">
                            <input type="text" name="endereco" value="<?php (empty($_SESSION['endereco'])) ? print '' : print $_SESSION['endereco']; ?>"/><br>
                            <span class="span-ex-end">Ex: Av. Brig. Faria Lima, 400 - ap.35</span>
                    </div>
                </div>
                 
                <div class="control-group">
                    <label class="control-label" for="cep">CEP</label>
                    <div class="controls">
                            <input type="text" name="cep" value="<?php (empty($_SESSION['cep'])) ? print '' : print $_SESSION['cep']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="cidade">Cidade</label>
                    <div class="controls">
                        <input type="text" name="cidade" value="<?php (empty($_SESSION['cidade'])) ? print '' : print $_SESSION['cidade']; ?>"/>
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
                            <input type="text" name="instituicao" value="<?php (empty($_SESSION['instituicao'])) ? print '' : print $_SESSION['instituicao']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="departamento">Departamento</label>
                    <div class="controls">
                            <input type="text" name="departamento" value="<?php (empty($_SESSION['departamento'])) ? print '' : print $_SESSION['departamento']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="telefone">Telefone</label>
                    <div class="controls">
                            <input type="text" name="telefone" value="<?php (empty($_SESSION['telefone'])) ? print '' : print $_SESSION['telefone']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="celular">Celular</label>
                    <div class="controls">
                            <input type="text" name="celular" value="<?php (empty($_SESSION['celular'])) ? print '' : print $_SESSION['celular']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="data_nascimento">Data de Nascimento</label>
                    <div class="controls">
                            <input type="text" name="data_nascimento"  value="<?php (empty($_SESSION['data_nascimento'])) ? print '' : print $_SESSION['data_nascimento']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="cpf">CPF</label>
                    <div class="controls">
                            <input type="text" name="cpf"  value="<?php (empty($_SESSION['cpf'])) ? print '' : print $_SESSION['cpf']; ?>"/>
                    </div>
                </div>
    
                <div class="control-group">
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls">
                            <input type="text" name="email" value="<?php (empty($_SESSION['email'])) ? print '' : print $_SESSION['email']; ?>"/>
                    </div>
                </div>
        
                 <div class="control-group">
				<label class="control-label" for="tipo">Nível Acadmêmico</label>
				<div class="controls">
                                    <input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_PROFESSOR; ?>">Professor
                                    <input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_POSDOC;	?>"/>Pós-doc
                                    <input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_JOVEM_PESQUISADOR; ?>"/>Jovem Pesquisador
                                    <input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_MESTRANDO; ?>"/>Mestrando
                                    <input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_DOUTORANDO; ?>"/>Doutorando
                                    <input type="radio" name="tipo" value="<?php echo TIPO_USUARIO_PESQUISADOR; ?>"/>Pesquisador
				</div>
			</div>

                 <div class="control-group">
                 	<div class="controls"> 
                		<label class="checkbox">
                 			<input type="checkbox" name="newsletter" value="1" /> Desejo receber informações sobre o CEFAP
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
                    <input type="button" class="btn" name="cancelar" value="Cancelar" onclick="window.location.href='../usuarios/listar'"/>
                </div>
        </form>   
    </div>
<?php
    
    $this->load->view('footer'); 
?> 