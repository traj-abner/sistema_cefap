<?php

class Mensagens extends CI_Controller{
    
   public function __constructor(){
        
        parent::__constructor();
        
    }
    
    public function index(){
        
        
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
		if ($reply):
			$msg = new Mensagem();
			$msg->where('id',$this->uri->segment(4))->get();
			$data['ms'] = $msg;
			$ur = new Usuario();
			$ur->include_related('mensagem','*')->where('mensagem_id',$this->uri->segment(4))->get();
			$i=0;
			foreach($ur as $us):
				$to[$i] = $us->id;
				$receiver[$i] = $us->nome;
				$i++;
			endforeach;
			$data['receiver'] = implode(', ',$receiver);
			$to[$i]=$msg->from_id;
			$data['to'] = implode('_',$to);
			$ur->where('id',$msg->from_id)->get();
			$data['sender'] = $ur;
		endif;	
		if ($forward):
			$msg = new Mensagem();
			$msg->where('id',$this->uri->segment(4))->get();
			$data['ms'] = $msg;
			$ur = new Usuario();
			$ur->include_related('mensagem','*')->where('mensagem_id',$this->uri->segment(4))->get();
			$i=0;
			foreach($ur as $us):
				$to[$i] = $us->id;
				$receiver[$i] = $us->nome;
				$i++;
			endforeach;
			$data['receiver'] = implode(', ',$receiver);
			$to[$i]=$msg->from_id;
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
		
		$msg = new Mensagem();
		$msg->from_id = $this->session->userdata('id');
		$msg->conteudo = $_POST['elm1'];
		$msg->assunto = $_POST['assunto'];
		$msg->data_envio = $bd_today;
		$msg->cont_leituras = '0';
		$msg->status = STATUS_MSG_NAO_LIDA;
		
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
		
		if( !$msg->save_usuario($to->all) ):
			//error
		else:
			$from = new Usuario();
			$from->where('id',$this->session->userdata('id'))->get();
			$this->load->library('email');
			
						
			$this->email->from(EMAIL_FROM, EMAIL_NAME);
			$recipients = '';
			foreach ($to as $rec) $recipients .= $rec->email . ','; 
			$this->email->to($recipients);
			
			$this->email->subject($_POST['assunto']);
			  $this->email->message('<b>Enviado por:</b> '.$from->nome.'<br><b>Assunto:</b> ' . $_POST['assunto'] . '<br><br>'.$_POST['elm1']);
			
			$this->email->send();
		endif;
		
		header( 'Location: '.base_url('mensagens/escrever/sent') ) ;

	}
    
    public function ler(){
		$today = getdate();
		$db_date = $today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
        $msg = new Mensagem();
		$msg->where('id',$this->uri->segment(3))->get();
		$data['ms'] = $msg;
		$msg->data_ultima_leitura = $db_date;
		$msg->cont_leituras = $msg->cont_leituras + 1;
		if ($msg->status == STATUS_MSG_NAO_LIDA) $msg->status = STATUS_MSG_LIDA;
		
		$msg->save();
				
		$usr = new Usuario();
		$usr->where('id',$msg->from_id)->get();
		$data['sender'] = $usr;
		
		$ur = new Usuario();
		$ur->include_related('mensagem','*')->where('mensagem_id',$this->uri->segment(3))->get();
		$i=0;
		foreach($ur as $us):
			$receiver[$i] = $us->nome;
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
		$usr->where('id', $this->session->userdata('id'))->get();
		
		$msg->include_related('usuario')->where('usuario_id',$usr->id)->where_not_in('status',STATUS_MSG_EXCLUIDA);
		
		
			
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
				$usr->select('*')->where('id', $this->session->userdata('id'))->get();
				// initialize user role with proper value
				$data['uRole'] = $usr->credencial;
				$msg->where_not_in('status',STATUS_MSG_EXCLUIDA);
				$msg->include_join_fields();
				$msg->$usr->where_join_field('mensagem','usuario_id',$usr->id);
				$msg->limit($limit, $offset); 
				if(empty($order)):
					$msg->order_by('data_envio', $exib);
				else:
					$msg->order_by($order, $exib);
				endif;
				$msg->get();
				$data['img'] = $order;
				$data['msg'] = $msg; 
				$data['limit'] = $limit;
				$data['offset'] = $offset;
				$data['perpage'] = $npage;
				$i = 0;
				foreach($msg as $m):
					$dvc = explode(' ',$m->data_envio);
					$dvc_d = explode('-',$dvc[0]);
					$dvc_h = explode(':',$dvc[1]);
					$d_vc[$i] = $dvc_d[2] . '/' . $dvc_d[1] . '/' . $dvc_d[0] . ' ' . $dvc_h[0] . ':' . $dvc_h[1];
					$i++;
				endforeach;
				$data['dvc'] = $d_vc;
				
		$data['uID'] = $this->session->userdata('id');
		$data['title'] = 'Mensagens Recebidas';
		
		$this->load->view('mensagens_recebidas',$data);
        
        
    }
    
    public function enviadas(){
        
        
    }
    
	
    public function mudar_status(){
        $today = getdate();
		$msg = new Mensagem();
		$msg->where('id',$this->uri->segment(4))->get();
        $msg->status = $this->uri->segment(3);
		$msg->data_ultima_leitura = $today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
		$msg->save();
		
		header( 'Location: '.base_url('mensagens/recebidas/') ) ;
    }
    
    public function __destruct(){
        
       // parent::__destruct();
    }
}
?>
