<?php

class Configuracoes extends CI_Controller{
    
   public function __constructor(){
        
        parent::__constructor();
        
    }
    
    public function index(){
        
        
    }
        
    public function editar(){
        $conf = new Configuracao();
        $conf->select('id, param, label, tipo_campo, opcoes, valor, valor_padrao'); 
        $conf->get();
        
        foreach ($conf as $c){
            $data[$c->param] = $c;
        }
                
        if ($this->input->post('submit')) {

            $post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter

            $email_host                              = $post['email_host'];
            $email_username                          = $post['email_username'];
            $email_password                          = $post['email_password'];
            $email_fromName                          = $post['email_fromName'];
            $email_port                              = $post['email_port'];
            $email_SMTPSecure                        = $post['email_SMTPSecure'];
            $email_SMTPAuth                          = $post['email_SMTPAuth'];
            $backup_path                             = $post['backup_path'];
            $backup_frequencia                       = $post['backup_frequencia'];
            $backup_qtde_manter                      = $post['backup_qtde_manter'];
            $backup_email                            = $post['backup_email'];
            $backup_split_arquivos                   = $post['backup_split_arquivos'];
            $creditos_prazo                          = $post['creditos_prazo'];
            $creditos_projeto_fusp                   = $post['creditos_projeto_fusp'];
            $creditos_taxa_boleto                    = $post['creditos_taxa_boleto'];
            $creditos_agencia                        = $post['creditos_agencia'];
            $creditos_agencia_dv                     = $post['creditos_agencia_dv'];
            $creditos_conta                          = $post['creditos_conta'];
            $creditos_conta_dv                       = $post['creditos_conta_dv'];
            $creditos_banco                          = $post['creditos_banco'];
            $creditos_cedente_nome                   = $post['creditos_cedente_nome'];
            $creditos_cedente_cnpj                   = $post['creditos_cedente_cnpj'];
            $creditos_cedente_endereco_linha1        = $post['creditos_cedente_endereco_linha1'];
            $creditos_cedente_endereco_linha2        = $post['creditos_cedente_endereco_linha2'];
            $creditos_texto_boleto                   = $post['creditos_texto_boleto'];
            $rss_fonte1                              = $post['rss_fonte1'];
            $rss_fonte2                              = $post['rss_fonte2'];
            
            
            $erros = 0;
            $conf = new Configuracao();
            !($conf->where('param','email_host')->update('valor', $email_host)) ? $erros++ : NULL;
            !($conf->where('param','email_username')->update('valor', $email_username)) ? $erros++ : NULL;
            !($conf->where('param','email_password')->update('valor', $email_password)) ? $erros++ : NULL;
            !($conf->where('param','email_fromName')->update('valor', $email_fromName)) ? $erros++ : NULL;
            !($conf->where('param','email_port')->update('valor', $email_port)) ? $erros++ : NULL;
            !($conf->where('param','email_SMTPSecure')->update('valor', $email_SMTPSecure)) ? $erros++ : NULL;
            !($conf->where('param','email_SMTPAuth')->update('valor', $email_SMTPAuth)) ? $erros++ : NULL;
            !($conf->where('param','backup_path')->update('valor', $backup_path)) ? $erros++ : NULL;
            !($conf->where('param','backup_frequencia')->update('valor', $backup_frequencia)) ? $erros++ : NULL;
            !($conf->where('param','backup_qtde_manter')->update('valor', $backup_qtde_manter)) ? $erros++ : NULL;
            !($conf->where('param','backup_email')->update('valor', $backup_email)) ? $erros++ : NULL;
            !($conf->where('param','backup_split_arquivos')->update('valor', $backup_split_arquivos)) ? $erros++ : NULL;
            !($conf->where('param','creditos_prazo')->update('valor', $creditos_prazo)) ? $erros++ : NULL;
            !($conf->where('param','creditos_projeto_fusp')->update('valor', $creditos_projeto_fusp)) ? $erros++ : NULL;
            !($conf->where('param','creditos_taxa_boleto')->update('valor', $creditos_taxa_boleto)) ? $erros++ : NULL;
            !($conf->where('param','creditos_agencia')->update('valor', $creditos_agencia)) ? $erros++ : NULL;
            !($conf->where('param','creditos_agencia_dv')->update('valor', $creditos_agencia_dv)) ? $erros++ : NULL;
            !($conf->where('param','creditos_conta')->update('valor', $creditos_conta)) ? $erros++ : NULL;
            !($conf->where('param','creditos_conta_dv')->update('valor', $creditos_conta_dv)) ? $erros++ : NULL;
            !($conf->where('param','creditos_banco')->update('valor', $creditos_banco)) ? $erros++ : NULL;
            !($conf->where('param','creditos_cedente_nome')->update('valor', $creditos_cedente_nome)) ? $erros++ : NULL;
            !($conf->where('param','creditos_cedente_cnpj')->update('valor', $creditos_cedente_cnpj)) ? $erros++ : NULL;
            !($conf->where('param','creditos_cedente_endereco_linha1')->update('valor', $creditos_cedente_endereco_linha1)) ? $erros++ : NULL;
            !($conf->where('param','creditos_cedente_cnpj')->update('valor', $creditos_cedente_cnpj)) ? $erros++ : NULL;
            !($conf->where('param','creditos_cedente_endereco_linha1')->update('valor', $creditos_cedente_endereco_linha1)) ? $erros++ : NULL;
            !($conf->where('param','creditos_cedente_endereco_linha2')->update('valor', $creditos_cedente_endereco_linha2)) ? $erros++ : NULL;
            !($conf->where('param','creditos_texto_boleto')->update('valor', $creditos_texto_boleto)) ? $erros++ : NULL;
            !($conf->where('param','rss_fonte1')->update('valor', $rss_fonte1)) ? $erros++ : NULL;
            !($conf->where('param','rss_fonte2')->update('valor', $rss_fonte2)) ? $erros++ : NULL;
            
            if($erros > 0){
                $data['msg'] = 'Erro ao atualizar dados';
                $data['msg_type'] = 'alert-error';
            }else{
                $data['msg'] = 'Dados atualizados com sucesso!';
                $data['msg_type'] = 'alert-success';
            };
            
        }else{
            $data['title'] = 'Edição de Configurações';
         }
         $data['title'] = 'Editar Configurações';
         $this->load->view('configuracoes_editar', $data);
    }
    
    public function __destruct(){
        
    }
    
}
?>
