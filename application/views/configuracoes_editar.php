<?php
    $this->load->view('header');
?>
<style>
  p {font-size: 16px; text-align: center; padding: 15px;}  
  #email_SMTPSAuth {margin-right: 3px;}
</style>
<div id="main_content">	
    <?php echo set_breadcrumb(); ?>
    <div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies molestie molestie. Curabitur aliquam ligula sit amet lectus malesuada sed elementum nisi vulputate. 
           Etiam tempor laoreet neque id sodales. Suspendisse potenti. Morbi sed ante in justo vestibulum rhoncus. Pellentesque tincidunt molestie pretium.
        </p>
        
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
    </div>
    <div class="well"><h2>Informações Gerais</h2></div>
    
    <?php $attributes = array(
        "form"  => array('class' => 'form-horizontal', 'id' => 'form_adicionar'),
        "label" => array('class' => 'control-label')
    );

        echo form_open('configuracoes/editar',$attributes['form']);
    ?>
            <div class="control-group">
                <label for="email_host" class="control-label">Email - host</label>
                <div class="controls">
                    <input type="text" name="email_host" id="email_host" value="<?php echo empty( $email_host->valor ) ? $email_host->valor_padrao : $email_host->valor; ?>">
                   
                </div>
            </div>     
            <div class="control-group">
                <label for="email_username" class="control-label">Email - username</label>
                <div class="controls">
                    <input type="text" name="email_username" id="email_username" value="<?php echo empty( $email_username->valor ) ? $email_username->valor_padrao : $email_username->valor; ?>">
                </div>
            </div>
            <div class="control-group">
                <label for="email_password" class="control-label">Email - senha</label>
                <div class="controls">
                    <input type="password" name="email_password" id="email_password" value="<?php echo empty( $email_password->valor ) ? $email_password->valor_padrao : $email_password->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="email_fromName" class="control-label">Email - nome do campo "De"</label>
                <div class="controls">
                    <input type="text" name="email_fromName" id="email_fromName" value="<?php echo empty( $email_fromName->valor ) ? $email_fromName->valor_padrao : $email_fromName->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="email_port" class="control-label">Email - porta</label>
                <div class="controls">
                    <input type="text" name="email_port" id="email_port" value="<?php echo empty( $email_port->valor ) ? $email_port->valor_padrao : $email_port->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="email_SMTPSecure" class="control-label">Email - SMTP Secure</label>
                <div class="controls">
                    <input type="text" name="email_SMTPSecure" id="email_SMTPSecure" value="<?php echo empty( $email_SMTPSecure->valor ) ? $email_SMTPSecure->valor_padrao : $email_SMTPSecure->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="email_SMTPAuth" class="control-label">Email - SMTP Auth</label>
                <div class="controls">
                    
                    <?php if($email_SMTPAuth->valor == 0){
                        echo "<input type='radio' name='email_SMTPAuth' id='email_SMTPAuth' value='1'>Sim&nbsp;";
                        echo "<input type='radio' name='email_SMTPAuth' id='email_SMTPAuth' value='0' checked='checked'>Não";
                    }else{
                        echo "<input type='radio' name='email_SMTPAuth' id='email_SMTPAuth' value='1' checked='checked'>Sim&nbsp;";
                        echo "<input type='radio' name='email_SMTPAuth' id='email_SMTPAuth' value='0'>Não";
                    }?>
                                        
                </div>    
            </div>
            <div class="control-group">
                <label for="backup_path" class="control-label">Backup - local dos arquivos</label>
                <div class="controls">
                    <input type="text" name="backup_path" id="backup_path" value="<?php echo empty( $backup_path->valor ) ? $backup_path->valor_padrao : $backup_path->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="backup_frequencia" class="control-label">Backup - frequencia</label>
                <div class="controls">
                    <select name="backup_frequencia" id="backup_frequencia">
                        <option value="diario">Diário</option>
                        <option value="2 dias">cada 2 dias</option>
                        <option value="3 dias">cada 3 dias</option>
                        <option value="4 dias">cada 4 dias</option>
                        <option value="5 dias">cada 5 dias</option>
                        <option value="6 dias">cada 6 dias</option>
                        <option value="semanal">Semanal</option>
                        <option value="2 dias">cada 14 dias</option>
                        <option value="mensal">Mensal</option>
                    </select>
                </div>    
            </div>
            <div class="control-group">
                <label for="backup_qtde_manter" class="control-label">Backup - quantidade de cópias a manter no servidor</label>
                <div class="controls">
                    <input type="text" name="backup_qtde_manter" id="backup_qtde_manter" value="<?php echo empty( $backup_qtde_manter->valor ) ? $backup_qtde_manter->valor_padrao : $backup_qtde_manter->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="backup_email" class="control-label">Backup - e-mail a ser enviado</label>
                <div class="controls">
                    <input type="text" name="backup_email" id="backup_email" value="<?php echo empty( $backup_email->valor ) ? $backup_email->valor_padrao : $backup_email->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="backup_split_arquivos" class="control-label">Backup - dividir arquivos a cada X megabytes(em branco para não dividir)</label>
                <div class="controls">
                    <input type="text" name="backup_split_arquivos" id="backup_split_arquivos" value="<?php echo empty( $backup_split_arquivos->valor ) ? $backup_split_arquivos->valor_padrao : $backup_split_arquivos->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_prazo" class="control-label">Créditos - dias para vencimentos dos boletos</label>
                <div class="controls">
                    <input type="text" name="creditos_prazo" id="creditos_prazo" value="<?php echo empty( $creditos_prazo->valor ) ? $creditos_prazo->valor_padrao : $creditos_prazo->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_projeto_fusp" class="control-label">Créditos - número do projeto FUSP(5 dígitos)</label>
                <div class="controls">
                    <input type="text" name="creditos_projeto_fusp" id="creditos_projeto_fusp" value="<?php echo empty( $creditos_projeto_fusp->valor ) ? $creditos_projeto_fusp->valor_padrao : $creditos_projeto_fusp->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_taxa_boleto" class="control-label">Créditos - taxa (R$) de cada boleto</label>
                <div class="controls">
                    <input type="text" name="creditos_taxa_boleto" id="creditos_taxa_boleto" value="<?php echo empty( $creditos_taxa_boleto->valor ) ? $creditos_taxa_boleto->valor_padrao : $creditos_taxa_boleto->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_agencia" class="control-label">Créditos - agência do cedente</label>
                <div class="controls">
                    <input type="text" name="creditos_agencia" id="creditos_agencia" value="<?php echo empty( $creditos_agencia->valor ) ? $creditos_agencia->valor_padrao : $creditos_agencia->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_agencia_dv" class="control-label">Créditos - dígito verificador da agência do cedente</label>
                <div class="controls">
                    <input type="text" name="creditos_agencia_dv" id="creditos_agencia_dv" value="<?php echo empty( $creditos_agencia_dv->valor ) ? $creditos_agencia_dv->valor_padrao : $creditos_agencia_dv->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_conta" class="control-label">Créditos - conta corrente do cedente</label>
                <div class="controls">
                    <input type="text" name="creditos_conta" id="creditos_conta" value="<?php echo empty( $creditos_conta->valor ) ? $creditos_conta->valor_padrao : $creditos_conta->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_conta_dv" class="control-label">Créditos - dígito verificador da conta corrente do cedente</label>
                <div class="controls">
                    <input type="text" name="creditos_conta_dv" id="creditos_conta_dv" value="<?php echo empty( $creditos_conta_dv->valor ) ? $creditos_conta_dv->valor_padrao : $creditos_conta_dv->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_banco" class="control-label">Créditos - banco de emissão dos boletos</label>
                <div class="controls">
                    <select name="creditos_banco" id="creditos_banco">
                        <option value="Santander(033)">Santander(033)</option>
                    </select>
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_cedente_nome" class="control-label">Créditos - nome ou razão social do cedente</label>
                <div class="controls">
                    <input type="text" name="creditos_cedente_nome" id="creditos_cedente_nome" value="<?php echo empty( $creditos_cedente_nome->valor ) ? $creditos_cedente_nome->valor_padrao : $creditos_cedente_nome->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_cedente_cnpj" class="control-label">Créditos - CNPJ do cedente</label>
                <div class="controls">
                    <input type="text" name="creditos_cedente_cnpj" id="creditos_cedente_cnpj" value="<?php echo empty( $creditos_cedente_cnpj->valor ) ? $creditos_cedente_cnpj->valor_padrao : $creditos_cedente_cnpj->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_cedente_endereco_linha1" class="control-label">Créditos - endereço do cedente(linha1)</label>
                <div class="controls">
                    <input type="text" name="creditos_cedente_endereco_linha1" id="creditos_cedente_endereco_linha1" value="<?php echo empty( $creditos_cedente_endereco_linha1->valor ) ? $creditos_cedente_endereco_linha1->valor_padrao : $creditos_cedente_endereco_linha1->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_cedente_endereco_linha2" class="control-label">Créditos - endereço do cedente(linha2)</label>
                <div class="controls">
                    <input type="text" name="creditos_cedente_endereco_linha2" id="creditos_cedente_endereco_linha2" value="<?php echo empty( $creditos_cedente_endereco_linha2->valor ) ? $creditos_cedente_endereco_linha2->valor_padrao : $creditos_cedente_endereco_linha2->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="creditos_texto_boleto" class="control-label">Créditos - texto das "instruções" do boleto</label>
                <div class="controls">
                    <textarea name="creditos_texto_boleto" id="creditos_texto_boleto"><?php echo empty( $creditos_texto_boleto->valor ) ? $creditos_texto_boleto->valor_padrao : $creditos_texto_boleto->valor; ?> </textarea>
                </div>    
            </div>
            <div class="control-group">
                <label for="rss_fonte1" class="control-label">RSS - endereço do primeiro quadro de feeds</label>
                <div class="controls">
                    <input type="text" name="rss_fonte1" id="rss_fonte1" value="<?php echo empty( $rss_fonte1->valor ) ? $rss_fonte1->valor_padrao : $rss_fonte1->valor; ?>">
                </div>    
            </div>
            <div class="control-group">
                <label for="rss_fonte2" class="control-label">RSS - endereço do segundo quadro de feeds</label>
                <div class="controls">
                    <input type="text" name="rss_fonte2" id="rss_fonte2" value="<?php echo empty( $rss_fonte2->valor ) ? $rss_fonte2->valor_padrao : $rss_fonte2->valor; ?>">
                </div>    
            </div>
            <div class="form-actions">
                    <input type="submit" name="submit" value="Salvar" class="btn btn-primary">
                    <input type="submit" name="submit" value="Cancelar" class="btn" onclick="<?php base_url('usuarios/listar'); ?>">
                </div>    
            </div>
    </form>
</div>
<?php
    $this->load->view('footer');
?>