<?php

class Mensagens extends CI_Controller{
    
   public function __constructor(){
        
        parent::__constructor();
        
    }
    
    public function index(){
        header( 'Location: '.base_url('mensagens/recebidas') ) ;
        
    }
	
	private function keygen($length=32)
	{
		$key = '';
		list($usec, $sec) = explode(' ', microtime());
		mt_srand((float) $sec + ((float) $usec * 100000));
		
		$inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));
	
		for($i=0; $i<$length; $i++)
		{
			$key .= $inputs{mt_rand(0,61)};
		}
		return $key;
	}
        
    public function escrever(){
        if ($this->uri->segment(3) != 'to') $directed = false;
			else $directed = true;
		$data['directed'] = $directed;
		
		if ($this->uri->segment(3) == 'responder') $reply = true;
			else $reply = false;
		$data['reply'] = $reply;
		
		if ($this->uri->segment(3) == 'encaminhar') $forward = true;
			else $forward = false;
		$data['forward'] = $forward;
		
		if ($this->uri->segment(3) == 'sent'):
			$data['msg'] = 'Mensagem enviada com sucesso';
			$data['alert_class'] = 'alert alert-success';
		else:
			$data['msg'] = '';
		endif;
		
		if ($directed) $data['to'] = explode('_',$this->uri->segment(4));
		if ($reply or $forward):
			$msg = new Mensagem();
			$msg->where('keygen',$this->uri->segment(4))->where('to_id',$this->session->userdata('id'))->get();
			$data['ms'] = $msg;
			$ur = new Usuario();
			$m_rec = new Mensagem();
			$m_rec->where('keygen',$this->uri->segment(4))->get();
			$i=0;
			foreach($m_rec as $m):
				$ur->get_by_id($m->to_id);
				$receiver[$i] = $ur->nome;
				$to[$i]=$m->to_id;
				$from = $m->from_id;
				$i++;
			endforeach;
			$to[$i] = $from;
			$data['receiver'] = implode(', ',$receiver);
			$to = array_unique($to);
			$data['to'] = implode('_',$to);
			$ur->where('id',$msg->from_id)->get();
			$data['sender'] = $ur;
		endif;	
				
		$usr = new Usuario();
		$usr->where('status',STATUS_USUARIO_ATIVO)->order_by('nome')->get();
		$data['ur'] = $usr;
		$data['title'] = 'Escrever Mensagem';
		$this->load->view('mensagens_escrever', $data);
        
    }
	
	public function enviar(){
		$today = getdate();
		$bd_today = $today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
		$options = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$code = "";
		$length = 32;
		for($i = 0; $i < $length; $i++)
		{
		$key = rand(0, strlen($options) - 1);
		$code .= $options[$key];
		}
		
		
		
		$i = 0;
		if ($_POST['reply'] == 'false'):
			foreach($_POST['to'] as $_to):
				$they[$i] = $_to;
				$i++;
			endforeach;
		else:
			$they = explode('_',$_POST['to']);
		endif;
		
		$to = new Usuario();
		$to->where_in('id',$they)->get();
		$data['to'] = $to;
		
		$mail_u = new Usuario();
		$from = new Usuario();
		$from->get_by_id($this->session->userdata('id'));
		
		foreach($they as $recipient):
			$msg = new Mensagem();
			$msg->from_id = $this->session->userdata('id');
			$msg->to_id = $recipient;
			$msg->conteudo = $_POST['elm1'];
			$msg->assunto = $_POST['assunto'];
			$msg->data_envio = $bd_today;
			$msg->cont_leituras = '0';
			$msg->status = STATUS_MSG_NAO_LIDA;
			$msg->keygen = $code;
			$msg->save();
			
			$this->load->library('email');
			$mail_u->get_by_id($recipient);
						
			$this->email->from(EMAIL_FROM, EMAIL_NAME);
			$this->email->to($mail_u->email);
			
			$this->email->subject($_POST['assunto']);
			 $this->email->message('<b>Enviado por:</b> '.$from->nome.'<br><b>Assunto:</b> ' . $_POST['assunto'] . '<br><br>'.$_POST['elm1']);
			
			$this->email->send();
		endforeach;
		
		header( 'Location: '.base_url('mensagens/escrever/sent') ) ;

	}
    
    public function ler(){
		
		$today = getdate();
		$db_date = $today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
        $msg = new Mensagem();
		
		$msg->where('keygen',$this->uri->segment(3))->where('to_id',$this->session->userdata('id'))->get();
		$data['ms'] = $msg;
		
		$msg->data_ultima_leitura = CURRENT_DB_DATETIME;
		
		$msg->cont_leituras = $msg->cont_leituras + 1;
		if ($msg->status == STATUS_MSG_NAO_LIDA) $msg->status = STATUS_MSG_LIDA;
		
		$msg->save();
				
		$usr = new Usuario();
		$usr->where('id',$msg->from_id)->get();
		$data['sender'] = $usr;
		
		$ur = new Usuario();
		$m_rec = new Mensagem();
		$m_rec->where('keygen',$this->uri->segment(3))->get();
		$i=0;
		foreach($m_rec as $m):
			$ur->get_by_id($m->to_id);
			$receiver[$i] = $ur->nome;
			$i++;
		endforeach;
		$data['receiver'] = implode(', ',$receiver);
		
		$dvc = explode(' ',$msg->data_envio);
		$dvc_d = explode('-',$dvc[0]);
		$dvc_h = explode(':',$dvc[1]);
		$data['sent'] = $dvc_d[2] . '/' . $dvc_d[1] . '/' . $dvc_d[0] . ' ' . $dvc_h[0] . ':' . $dvc_h[1];
		
		$data['title'] = 'Mensagem | ' . $msg->Assunto;
		$data['msg'] = '';
		$this->load->view('mensagens_ler', $data);
        
    }
    
    public function recebidas(){
		#@TODO: acertar relacionamento
		$msg = new Mensagem();
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));

		$msg->where_not_in('status',STATUS_MSG_EXCLUIDA);
		$msg->where('to_id',$this->session->userdata('id'));
		
			
		$limit = $npage = $paqe = $offset = 1;
		$exib = 'DESC';
		$total = $msg->count();
		$data['numrows'] = $total;
		if ($total > 0 ):
				$order = $this->uri->segment(3, NULL); #ordena de acordo com a opção escolhida pelo usuário
				$limit = $this->uri->segment(4, 5); #limite de resultados por página
				$npage = $this->uri->segment(5, 0); //número da página 
				$exib = $this->uri->segment(6,'DESC'); //segmento que vai passar o valor de CRES ou DECRES.

			$offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
			if($offset < 0):
				$offset = 0;
			endif;				
		 
			 
		else:
			
		endif; 
		
		/* PAGINAÇÃO */
			$pagination = $total / $limit;
			$page = ceil($pagination); 
			if ($page < 1) $page = 1;
			$links = "";
			if ($npage > $page)
					{
						$buttonArray[2] = '#';
						$buttonArray[3] = '#';
					}
			for($i = 1; $i <= $page; $i++){
				$order = $this->uri->segment(3, 'data_envio');

				$url = base_url("mensagens/recebidas/$order/$limit/$i");
				$links .= "<a href='$url'>$i</a>&nbsp;";   
				$urlarray[$i-1]=$url;
							if ($i == 1) 
							{
								$buttonArray[0] = $url;
								$buttonArray[1] = '#';
							}
							if ($i >= 1) 
									if ($i == $npage - 1):
										$buttonArray[1] = $url;
									endif;
							else
								$buttonArray[1] = '#';
							if ($i <= $page)
							{
									if ($i == $npage): $buttonArray[2] = '#'; endif;
									if ($i == $npage + 1): $buttonArray[2] = $url; endif;
							}
							else
								$buttonArray[2] = '#';
							if ($i == $page) 
							{
								$buttonArray[3] = $url;
							}
				}
				
				$data['limit'] = $limit;    
				$data['buttonArray'] = $buttonArray;
				$data['page'] =  $links; 
				/*END PAGINAÇÃO*/   
				// initialize user role with proper value
				$data['uRole'] = $usr->credencial;
				$msg->limit($limit, $offset); 
				if(empty($order)):
					$msg->order_by('data_envio', $exib);
				else:
					$msg->order_by($order, $exib);
				endif;
				$msg->where('to_id',$this->session->userdata('id'));
				$msg->where_not_in('status',STATUS_MSG_EXCLUIDA);
				$msg->get();
				$data['img'] = $order;
				$data['msg'] = $msg; 
				$data['limit'] = $limit;
				$data['offset'] = $offset;
				$data['perpage'] = $npage;
				$d_vc = '';
				$i = 0;
				foreach($msg as $m):
					$dvc = explode(' ',$m->data_envio);
					$dvc_d = explode('-',$dvc[0]);
					$dvc_h = explode(':',$dvc[1]);
					$d_vc[$i] = $dvc_d[2] . '/' . $dvc_d[1] . '/' . $dvc_d[0] . ' ' . $dvc_h[0] . ':' . $dvc_h[1];
					$i++;
				endforeach;
				$i = 0;
				$data['dvc'] = $d_vc;	
		$data['uID'] = $this->session->userdata('id');
		$data['title'] = 'Mensagens Recebidas';
		
		$this->load->view('mensagens_recebidas',$data);
        
        
    }
    
    public function enviadas(){
        
        
    }
    
	
    public function mudar_status(){
		$msg = new Mensagem();
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$msg->where('keygen',$this->uri->segment(4))->where('to_id',$usr->id)->get();
        $msg->status = $this->uri->segment(3);
		$msg->data_ultima_leitura = CURRENT_DB_DATETIME;
		$msg->save();
		
		header( 'Location: '.base_url('mensagens/recebidas/') ) ;
    }
    
    public function __destruct(){
        
       // parent::__destruct();
    }
}
?>
