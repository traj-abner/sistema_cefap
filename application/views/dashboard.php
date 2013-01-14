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
                    <li><a href="<?php echo base_url(""); ?>">Gerenciar meus projetos científicos</a></li>
                <?php } 
                
                if($u == CREDENCIAL_USUARIO_SUPERADMIN){ ?>
                    <li><a href="<?php echo base_url("configuracoes/editar"); ?>">Editar as configurações do sistema</a></li>
                <?php } 
                
                if($u == CREDENCIAL_USUARIO_ADMIN){ ?>
                    <li><a href="<?php echo base_url(""); ?>">Relatório de uso das facilities</a></li>
                <?php } ?>    
                
                
                <li><a href="<?php echo base_url('usuarios/listar'); ?>">Listar</a></li>
                <li><a href="<?php echo base_url('facilities/listar'); ?>">Facilities Listar</a></li>
                <li><a href="<?php echo base_url('facilities/adicionar'); ?>">Facilitites Adicionar</a></li>
            </ul>
        </div>
        <div class="hr">&nbsp;</div>
        <div class="pull-right">
            <ul>
                
                <?php 
                
                if($u == CREDENCIAL_USUARIO_COMUM){ ?>
                    <li><a href="<?php echo base_url(""); ?>">Conhecer melhor as Facilities</a></li>
                    <li><a href="<?php echo base_url(""); ?>">FAQ - Perguntas mais frequentes</a></li>
                    <li><a href="<?php echo base_url(""); ?>">Obter extrato de créditos</a></li> 
                <?php } 
                
                if($u == CREDENCIAL_USUARIO_SUPERADMIN){ ?>    
                    <li><a href="<?php echo base_url(""); ?>">Criar novo backup</a></li>
                    <li><a href="<?php echo base_url(""); ?>">Editar conteúdo da ajuda aos usuários</a></li>
                    <li><a href="<?php echo base_url(""); ?>">Boletos emitidos</a></li>         
                <?php } 
                
                if($u == CREDENCIAL_USUARIO_ADMIN){ ?>    
                    <li><a href="<?php echo base_url(""); ?>">Agendamentos solicitados</a></li>
                    <li><a href="<?php echo base_url(""); ?>">Download de relatórios já gerados</a></li>
                    <li><a href="<?php echo base_url(""); ?>">Escrever nova mensagem</a></li>         
                <?php } ?>
            </ul>
        </div>
        
    </div>
    <div class="middle-right">
        <h1>Último acesso</h1>
        <div>
            <p>A ultima vez que você efetuou o login no sistema foi em:<br><br>
                Sáb ado, 1 3/0 8 /2 0 1 2 2 0 : 4 0<br><br>
                IP: 2 0 0 . 1 2 9. 34 5 . 4 5 6
            </p>
        </div>
    </div>
    
    <div class="middle-down-left" id="middle-down">
        <h1>Mensagens recebidas</h1><br>
        <div>
            <p>A ultima vez que você efetuou o login no sistema foi em:<br><br>
                <a href=''>mais...</a>
            </p>
            <br>
            
            <p>A ultima vez que você efetuou o login no sistema foi em:<br><br>
                <a href=''>mais...</a>
            </p>
        </div>
    </div>
    
    <div class="middle-down-center" id="middle-down">
        <h1>Boletos</h1><br>
        <div>
            <p>12 bol. em aberto: R$ 650,00<br><br></p>
            <p>12 bol. em aberto: R$ 650,00<br><br></p>
            <p>12 bol. em aberto: R$ 650,00<br><br></p>
            <input type="submit" value="todos os boletos"><br><br>
            <a href="">lista de lançamentos</a>
            <br>
        </div>
    </div>
    <div class="middle-down-right" id="middle-down">
        <h1>Solicitações de agendamentos</h1><br>
        <div>
            <p>Ciclano 13/09/2012 14:00 às 16:00hs - BIOMASS<br><br></p>
            <p>Ciclano 13/09/2012 14:00 às 16:00hs - BIOMASS<br><br></p>
            <p>Ciclano 13/09/2012 14:00 às 16:00hs - BIOMASS<br><br></p>
            <input type="submit" value="novo agendamento"><br><br>
            <a href="">todas as solicitações</a>
            <br>
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