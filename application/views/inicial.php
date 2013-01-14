<?php 
    $this->load->view('header');
     
?>
<style>
    .pull-left{width: 450px; float: left;}
    .pull-left p {width:400px; font-size: 14px; text-align: center; margin-bottom: 14px;}
    .pull-right {margin-top: -118px; margin-right: 10%;}
    .hr {width:1px; height:150px; background-color:#ccc; position:relative; top:5%; left:50%; z-index:10;}
    .informacao p {font-size: 16px; text-align: center; margin: 30px 0 30px 0;}
    h1{font-size: 20px; text-align: center;}
    .inputCenter {text-align: center;}
    .conteudo {height: 460px;}
</style>
    <div id="main_content">
        
        <?php echo set_breadcrumb(); ?>
        
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum, risus a suscipit ultrices, velit velit blandit neque, non egestas elit urna at est. Pellentesque tincidunt orci erat, in blandit mauris. 
                Aliquam tellus lacus, iaculis ut vestibulum a, blandit tincidunt justo. Aliquam facilisis ante imperdiet massa feugiat ac gravida ipsum elementum. </p>

        </div>
        <br><br><br>
        <div class="conteudo">  
            <div class="pull-left">
                <br>
                <h1>Cadastro</h1><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Pellentesque vestibulum, risus a suscipit ultrices, velit velit blandit neque, non egestas elit urna at est. 
                    Pellentesque tincidunt orci erat, in blandit mauris. Aliquam tellus lacus, iaculis ut vestibulum a, blandit tincidunt justo.</p>
                <br>
                <div class="inputCenter">
                    <input type="submit" name="submit" value="Preencher formulário de Cadastro" onclick="window.location.href='usuarios/adicionar'"/>
                </div>
            </div> 

            <div class="hr">&nbsp;</div>
            <?php 
                if ($this->session->userdata('logged_in')){
                    echo "<button type='button' onclick='alert('Hello world!')'>Click Me!</button>";
                }else{  
            ?>
            <div class="pull-right">
                    <h1>Digite seu Usuário e Senha</h1>
                    <br>
                    <?php echo form_open('usuarios/login/', array('class' => 'form-horizontal', 'id' => 'form_logar')); ?>
                            <label for="username">Username</label>	
                            <input type="text" name="username" /><br><br>
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" /><br>
                            <div class="inputCenter"><br>
                                <input type="submit" name="submit" value="Entrar" /><br><br>
                                <a href="usuarios/lembrete_senha">Esqueceu seu username ou senha</a>
                            </div>
                    <?php echo form_close(); ?>                 
            </div>
        </div>
    </div>
<?php
    }
    $this->load->view('footer'); 
?>   