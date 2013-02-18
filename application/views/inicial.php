<?php 
    $this->load->view('header');
     
?>
    <div id="main_content">
        
        <?php //echo set_breadcrumb(); ?>
		
		<?php
		session_start();
		if(isset($_SESSION['msg']) && isset($_SESSION['msg_type']))
		{
			$msg = $_SESSION['msg'];
			$msg_type = $_SESSION['msg_type'];
			
			unset($_SESSION['msg']);
			unset($_SESSION['msg_type']);
		}
		?>
		
        <?php
            if(isset($msg) && isset($msg_type)){ ?>
                <div class="alert <?php echo $msg_type?>" id="alert-success">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                   <?php echo $msg; ?>
                </div> 
            <?php 

            }else{
                echo ('');
            }
        ?>
        <div class="informacao">
            <p>O <strong>CEFAP - Centro de Facilidades de Apoio à Pesquisa ICB/USP</strong> oferece aos seus usuários um sistema eletrônico de agendamento de uso das facilidades e gerenciamento de créditos pessoais. Efetue seu cadastro no sistema para iniciar sua utilização ou, caso já possua cadastro, efetue seu login.</p>
        </div>
        <div class="conteudo row-fluid">  
            <div class="span6 pie">
                <h1>Cadastro</h1>
                <p>Se esta é a primeira vez que você acessa o sistema, efetue seu cadastro antes de logar-se.</p>
                <br>
                <div class="inputCenter">
                    <input type="submit" name="submit" value="Preencher formulário de cadastro" class="btn btn-primary" onclick="window.location.href='usuarios/adicionar'"/>
                </div>
            </div> 

            <?php 
			if ($this->session->userdata('logged_in')){
				echo "<button type='button' onclick='alert('Hello world!')'>Click Me!</button>";
			}else{  
            ?>
            <div class="span6 pie">
				<h1>Login</h1>
				<br>
				<?php echo form_open('usuarios/login/', array('class' => 'form-horizontal', 'id' => 'form_logar')); ?>
						<input type="text" name="username" placeholder="Username"/><br><br>
						<input type="password" name="senha" placeholder="Senha"/><br>
						<div class="inputCenter"><br>
							<input type="submit" name="submit" value="Entrar" class="btn btn-primary" /><br><br>
							<a href="usuarios/lembrete_senha">Esqueceu seu username ou senha?</a>
						</div>
				<?php echo form_close(); ?>                 
            </div>
        </div>
    </div>
<?php
    }
    $this->load->view('footer'); 
?>   