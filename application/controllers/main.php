<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct(){
        
        parent::__construct();
        
    } 

	public function index(){
            
            $data['title'] = 'Página inicial';
            if ( $this->session->userdata('logged_in')) {
                // @TODO implementar direcionamento ao dashboard de acordo com a credencial
                $data['msg'] = '<strong>Bem-vindo, ' .$this->session->userdata('username'). '!</strong>';
                $data['msg_type'] = 'alert-info';

                $data['uRole'] = $this->session->userdata('credencial');
				
				$msg = new Mensagem();
				$data['n_mensagens'] = $msg->where('to_id',$this->session->userdata('id'))->where('status', STATUS_MSG_NAO_LIDA)->limit(2)->count();
				
				
				if ($data['n_mensagens'] > 0):
				$msg->where('to_id',$this->session->userdata('id'))->where('status', STATUS_MSG_NAO_LIDA)->order_by('data_envio','desc')->limit(2)->get();
				$data['received_messages'] = $msg;
				endif;
				
				if($data['n_mensagens'] == 0) $data['tit_novas_mensagens'] = "Nenhuma nova mensagem";
				elseif($data['n_mensagens'] == 1) $data['tit_novas_mensagens'] = "1 nova mensagem";
				else $data['tit_novas_mensagens'] = $data['n_mensagens'] . " novas mensagens";
				
				$agn = new Agendamento();
				if ($data['uRole'] == CREDENCIAL_USUARIO_COMUM):
					$agn->include_related('facilities')->include_related('projetos')->where('usuario_id',$this->session->userdata('id'))->where('status <',AGENDAMENTO_STATUS_EXCLUIDO)->order_by('modified, created')->limit(2)->get();
					$data['n_agn'] = $agn->where('usuario_id',$this->session->userdata('id'))->where('status <',AGENDAMENTO_STATUS_EXCLUIDO)->limit(3)->count();
				endif;
				
				
				if ($data['uRole'] == CREDENCIAL_USUARIO_ADMIN):
					$fcl = new Facility();
					$fcl->include_related('usuario')->where('usuario_id',$this->session->userdata('id'))->get();
					$agn->include_related('facilities')->include_related('projetos')->include_related('usuarios')->where_related_facility($fcl)->where('status',AGENDAMENTO_STATUS_SOLICITADO)->order_by('modified, created')->limit(2)->get();
					
					$data['n_agn'] = $agn->where_related_facility($fcl)->where('status',AGENDAMENTO_STATUS_SOLICITADO)->limit(3)->count();
					
				endif;
				if ($data['uRole'] == CREDENCIAL_USUARIO_SUPERADMIN):
					$agn->include_related('facilities')->include_related('projetos')->include_related('usuarios')->order_by('modified, created')->where('status',AGENDAMENTO_STATUS_SOLICITADO)->limit(2)->get();
					
					$data['n_agn'] = $agn->where('status',AGENDAMENTO_STATUS_SOLICITADO)->limit(3)->count();
				endif;
				
				$bols = new Boleto();
				$bols->where('usuario_id',$this->session->userdata('id'))->order_by('data_vencimento','desc')->limit(2)->get();
				$data['bols'] = $bols;
				
				$lcn_sm = new Lancamento();
				$sum = 0;
				$lcn_sm->select_sum('valor','soma')->where('usuario_id',$this->session->userdata('id'))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_CREDITO)->get();
				$sum += $lcn_sm->soma;
				$lcn_sm->select_sum('valor','soma')->where('usuario_id',$this->session->userdata('id'))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_DEBITO)->get();
				$sum -= $lcn_sm->soma;	
				$data['sum'] = $sum;	
				$classe_saldo = ($sum < 0) ? "saldo-negativo" : "saldo-positivo";
				$data['saldo'] = '<span class="' . $classe_saldo . '">' . SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($sum,2,TS,DS) . '</span>';
				
				$data['agn'] = $agn;
				
                
                $view = 'dashboard';
				

            }else{
                $data['title'] = "CEFAP";
                $view = 'inicial';

            }

            $this->load->view($view,$data);
	}
	
	
	 public function __destruct(){
        
        //parent::__destruct();
    }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */