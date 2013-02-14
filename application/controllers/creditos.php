<?php

class Creditos extends CI_Controller{
    
	
	private function getMonth($monthNum){
		switch ($monthNum):
			case 1: return 'Janeiro'; break;
			case 2: return 'Fevereiro'; break;
			case 3: return 'Mar&ccedil;o'; break;
			case 4: return 'Abril'; break;
			case 5: return 'Maio'; break;
			case 6: return 'Junho'; break;
			case 7: return 'Julho'; break;
			case 8: return 'Agosto'; break;
			case 9: return 'Setembro'; break;
			case 10: return 'Outubro'; break;
			case 11: return 'Novembro'; break;
			case 12: return 'Dezembro'; break;
		endswitch;
	}
	

   public function __constructor(){
        
        parent::__constructor();
		// if user is NOT logged in...
        if ( ! $this->session->userdata('logged_in')) {
            // initialize user role with FALSE;
                $this->uRole = FALSE;
        }
        // else, user is logged in...
        else {
            $u = new Usuario();
            $u->select('credencial')->where('id', $this->session->userdata('id'))->get();
            // initialize user role with proper value
            $this->uRole = $u->credencial;
        }
        
    }
    
    public function index(){
			redirect('main');       
    }
        
    public function listar(){
			$bol = new Boleto();
			$usr = new Usuario();
			$bol->where_not_in('status',STATUS_BOLETO_CANCELADO);
			$usr->where('id', $this->session->userdata('id'))->get();
			if ($usr->credencial < CREDENCIAL_USUARIO_ADMIN):
				$bol->where('usuario_id',$usr->id);
			endif;
				
				$limit = $npage = $paqe = $offset = 1;
				$total = $bol->count();
				if ($total > 0 ):
						$order = $this->uri->segment(3, NULL); #ordena de acordo com a opção escolhida pelo usuário
						$limit = $this->uri->segment(4, 5); #limite de resultados por página
						$npage = $this->uri->segment(5, 0); //número da página 
						$exib = $this->uri->segment(6,'CRESC'); //segmento que vai passar o valor de CRES ou DECRES.
		
					$offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
					if($offset < 0):
						$offset = 0;
					endif;				
				 
					 
				else:
					
				endif; 
				
				/* PAGINAÇÃO */
					$pagination = $total / $limit;
					$page = ceil($pagination);
					$links = "";
					if ($npage > $page)
							{
								$buttonArray[2] = '#';
								$buttonArray[3] = '#';
							}
					for($i = 1; $i <= $page; $i++){
						$order = $this->uri->segment(3, 'data_emissao');
						$exib = 'DESC';
		
						$url = base_url("creditos/listar/$order/$limit/$i");
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
						$usr->select('credencial')->where('id', $this->session->userdata('id'))->get();
						// initialize user role with proper value
						$data['uRole'] = $usr->credencial;
						$bol->limit($limit, $offset)->get(); 
						if(empty($order)):
							$bol->order_by('id', $exib);
						else:
							$bol->order_by($order, $exib);
						endif;
						$bol->get();
						$data['img'] = $order;
						$data['bols'] = $bol; 
						$data['limit'] = $limit;
						$data['offset'] = $offset;
						$data['perpage'] = $npage;
						$i = 0;
						foreach($bol as $bl):
							$dvc = explode('-',$bl->data_vencimento);
							$d_vc[$i] = $dvc[2] . '/' . $dvc[1] . '/' . $dvc[0];
							$i++;
						endforeach;
						$data['dvc'] = $d_vc;
						
				$data['uID'] = $this->session->userdata('id');
				$data['title'] = 'Lista de Boletos';
				
				$this->load->view('creditos_listar',$data);
			
        
    }
    
    public function extrato(){
		$lcn = new Lancamento();
		$usr = new Usuario();
		$lcl = new Lancamento();
		
		for ($i = 0; $i < 4; $i++) $buttonArray[$i] = '#';
		
		$limit = $npage = $paqe = $offset = 1;
		$exib = 'DESC';
		$order = 'modified';
		$total = $lcn->where('usuario_id',$this->uri->segment(3))->count();
		$data['numrows'] = $total;
		if ($total > 0 ):
				$order = $this->uri->segment(4, NULL); #ordena de acordo com a opção escolhida pelo usuário
				$limit = $this->uri->segment(5, 5); #limite de resultados por página
				$npage = $this->uri->segment(6, 0); //número da página 
				$exib = $this->uri->segment(7,'CRESC'); //segmento que vai passar o valor de CRES ou DECRES.

			$offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
			if($offset < 0):
				$offset = 0;
			endif;				
		 
			 
		else:
			
		endif; 
		
		/* PAGINAÇÃO */
			$pagination = $total / $limit;
			$page = ceil($pagination);
			$links = "";
			if ($npage > $page)
					{
						$buttonArray[2] = '#';
						$buttonArray[3] = '#';
					}
			for($i = 1; $i <= $page; $i++){
				$order = $this->uri->segment(4, 'id');

				$url = base_url("creditos/extrato/".$this->uri->segment(3)."/$order/$limit/$i");
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
				$usr->select('credencial')->where('id', $this->session->userdata('id'))->get();
				// initialize user role with proper value
				$data['uRole'] = $usr->credencial;
				$lcn->include_related('boleto')->where('usuario_id',$this->uri->segment(3));
				$lcn->limit($limit, $offset); 
				if(empty($order)):
					$lcn->order_by('modified', $exib);
				else:
					$lcn->order_by($order, $exib);
				endif;
				$lcn->get();
				$data['uid'] = $this->uri->segment(3);
				$data['img'] = $order;
				$data['lcn'] = $lcn; 
				$data['limit'] = $limit;
				$data['offset'] = $offset;
				$data['perpage'] = $npage;
				$i = 0;
				$d_vc = '';
				foreach($lcn as $lc):
					$dvc = explode(' ',$lc->modified);
					$dvc_d = explode('-',$dvc[0]);
					$dvc_h = explode(':',$dvc[1]);
					$d_vc[$i] = $dvc_d[2] . '/' . $dvc_d[1] . '/' . $dvc_d[0] . ' ' . $dvc_h[0] . ':' . $dvc_h[1];
					$i++;
				endforeach;
				$data['dvc'] = $d_vc;
				
		
		$lcn_sm = new Lancamento();
		$sum = 0;
		$lcn_sm->select_sum('valor','soma')->where('usuario_id',$this->uri->segment(3))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_CREDITO)->get();
		$sum += $lcn_sm->soma;
		$lcn_sm->select_sum('valor','soma')->where('usuario_id',$this->uri->segment(3))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_DEBITO)->get();
		$sum -= $lcn_sm->soma;	
		$data['sum'] = $sum;	
		$data['uID'] = $this->session->userdata('id');
		$data['title'] = 'Lista de Boletos';
        
        $this->load->view('creditos_extrato', $data);
        
    }
	
	public function pdf(){
		$usr = new Usuario();
		$usr->get_by_id($this->uri->segment(3));
		$data['usr'] = $usr;
		$lcn = new Lancamento();
		  $lcn->include_related('boletos')->where('usuario_id',$usr->id)->order_by('modified','ASC')->get();
		$data['lcn'] = $lcn;
		
		$config = new Configuracao();
		$config->where('param','creditos_projeto_fusp')->get();
		$data['config'] = $config;
		
		$lcn_sm = new Lancamento();
		$lcn_sm->select_sum('valor','soma')->where('usuario_id',$this->uri->segment(3))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_CREDITO)->get();
		$data['credit'] = $lcn_sm->soma;
		
		$lcn_sm->select_sum('valor','soma')->where('usuario_id',$this->uri->segment(3))->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_DEBITO)->get();
		$data['debit'] = $lcn_sm->soma;
		
		$data['cashout'] = $data['credit'] - $data['debit'];
		
		$this->load->view('creditos_pdf', $data);
    }
	
    public function inserir(){
        $usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$data['uRole'] = $usr->credencial;
		$data['msg'] = '';
		$usr->where('status',STATUS_USUARIO_ATIVO)->order_by('nome')->get();
		$data['ur'] = $usr;
		if ($this->uri->segment(3) == 'st2'):
			$stage = 2;
		else:
			if ($this->uri->segment(3) == 'st3'):
				$stage = 3;
			else:
				$stage = 1;
			endif;
		endif;
		if ($data['uRole'] < CREDENCIAL_USUARIO_SUPERADMIN):
			$stage = 2;
			$data['to'] = $this->session->userdata('id');
			$data['select_user'] = false;
		else:
			$data['select_user'] = true;
		endif;
		
		if (isset($_POST['valor'])):
			$stage = 3;
		endif;
		
		$conf = new Configuracao();
		$conf->get();
		foreach($conf as $config):
			switch ($config->param):
				case 'creditos_taxa_boleto': $tax = number_format($config->valor,2,TS,DS); break;
				case 'creditos_prazo': $days_to_go = $config->valor; break;
				case 'creditos_projeto_fusp': $codigo_projeto = $config->valor; break;
			endswitch;
		endforeach;
		
		if (isset($_POST['to'])) $stage = 2;
		
		if ($stage == 1):
			if ($this->uri->segment(3) != ''):
				$data['directed'] = true;
				$stage = 2;
				$data['to'] = $this->uri->segment(3);
			else:
				$data['directed'] = false;
			endif;
		endif;
		
		if ($stage == 2):
			if ($data['uRole'] == CREDENCIAL_USUARIO_SUPERADMIN):
				$data['to'] = implode('_',$_POST['to']) or die;
			endif;
			$data['taxa_boleto'] = $tax;
		endif;
		
		if ($stage == 3):
			$options = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$code = "";
			$length = 32;
			for($i = 0; $i < $length; $i++):
				$key = rand(0, strlen($options) - 1);
				$code .= $options[$key];
			endfor;
			if ($data['uRole'] < CREDENCIAL_USUARIO_SUPERADMIN):
					
				$received_value = str_replace(',','.',$_POST['valor']);
				
				$bol = new Boleto();
				$lcn = new Lancamento();
				$bol->chave = $code;
				$bol->data_emissao = CURRENT_DB_DATETIME;
				$bol->data_vencimento = date('Y-m-d',strtotime(CURRENT_DB_DATE. ' + ' . $days_to_go . ' days'));
				$bol->valor_creditos = $received_value;
				$bol->taxa = $tax;
				$bol->valor_total = $tax + $received_value;
				$bol->status = STATUS_BOLETO_EM_ABERTO;
				$bol->usuario_id = $this->session->userdata('id');
				$bol->obs = $_POST['obs'];
				$bol->save();
				
				$bol->where('chave',$code)->get();
				$lcn->usuario_id = $bol->usuario_id;
				$lcn->facility_id = 0;
				$lcn->chave = $code;
				$lcn->valor = $bol->valor_creditos;
				$lcn->autor_id = $this->session->userdata('id');
				$lcn->created = CURRENT_DB_DATETIME;
				$lcn->modified = CURRENT_DB_DATETIME;
				$lcn->status = STATUS_LANCAMENTO_INATIVO;
				$lcn->metodo_pagto = METODO_PAGTO_BOLETO;
				$lcn->tipo = LANCAMENTO_CREDITO;
				$lcn->lancamento_direto = LANCAMENTO_DIRETO_NAO;
				$lcn->boleto_id = $bol->id;
				$lcn->save();	
				
				$data['code'] = $code;	
				$data['msg'] = 'Lançamento gerado com sucesso.';
				$data['alert_class'] = 'alert alert-success';
			else:
				$to = explode('_',$_POST['receivers']);
				$received_value = str_replace(',','.',$_POST['valor']);
				foreach ($to as $rec):
					$lcn = new Lancamento();
					$lcn->usuario_id = $rec;
					$lcn->facility_id = 0;
					$lcn->chave = $code;
					$lcn->valor = $received_value;
					$lcn->autor_id = $this->session->userdata('id');
					$lcn->created = CURRENT_DB_DATETIME;
					$lcn->modified = CURRENT_DB_DATETIME;
					$lcn->status = STATUS_LANCAMENTO_ATIVO;
					$lcn->tipo = LANCAMENTO_CREDITO;
					$lcn->lancamento_direto = LANCAMENTO_DIRETO_SIM;
					$lcn->metodo_pagto = METODO_PAGTO_DINHEIRO;
					$lcn->obs = $_POST['obs'];
					$lcn->save();
					header( 'Location: '.base_url('creditos/lancamentos') ) ;
				endforeach;
			endif;
		endif;
		
		$data['title'] = 'Inserir Cr&eacute;ditos';
		$data['stage'] = $stage;
		
		$this->load->view('creditos_inserir', $data);
        
    }
    
    public function lancamentos(){
        $lcn = new Lancamento();
		$usr = new Usuario();
		$lcl = new Lancamento();
		
		for ($i = 0; $i < 4; $i++) $buttonArray[$i] = '#';
		
		$limit = $npage = $paqe = $offset = 1;
		$exib = 'DESC';
		$order = 'modified';
		$total = $lcn->count();
		$data['numrows'] = $total;
		if ($total > 0 ):
			if ($this->uri->segment(3) == 'cancelados'):
				$order = $this->uri->segment(4, NULL); #ordena de acordo com a opção escolhida pelo usuário
				$limit = $this->uri->segment(5, 5); #limite de resultados por página
				$npage = $this->uri->segment(6, 0); //número da página 
				$exib = $this->uri->segment(7,'DESC'); //segmento que vai passar o valor de CRES ou DECRES.
			else:
				$order = $this->uri->segment(3, NULL); #ordena de acordo com a opção escolhida pelo usuário
				$limit = $this->uri->segment(4, 5); #limite de resultados por página
				$npage = $this->uri->segment(5, 0); //número da página 
				$exib = $this->uri->segment(6,'DESC'); //segmento que vai passar o valor de CRES ou DECRES.
			endif;

			$offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
			if($offset < 0):
				$offset = 0;
			endif;				
		 
			 
		else:
			
		endif; 
		
		/* PAGINAÇÃO */
			$pagination = $total / $limit;
			$page = ceil($pagination);
			$links = "";
			if ($npage > $page)
					{
						$buttonArray[2] = '#';
						$buttonArray[3] = '#';
					}
			for($i = 1; $i <= $page; $i++){
				
				
				if ($this->uri->segment(3) == 'cancelados'):
					$order = $this->uri->segment(4, 'modified');
				else:
					$order = $this->uri->segment(3, 'modified');
				endif;

				$url = base_url("creditos/lancamentos/$order/$limit/$i");
				if ($this->uri->segment(3) == 'cancelados') $url = base_url("creditos/lancamentos/cancelados/$order/$limit/$i"); 
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
				$usr->select('credencial')->where('id', $this->session->userdata('id'))->get();
				// initialize user role with proper value
				$data['uRole'] = $usr->credencial;
				$lcn->include_related('boleto')->include_related('usuario');
				if ($this->uri->segment(3) == 'cancelados'):
					$lcn->where('status',STATUS_LANCAMENTO_CANCELADO);
				else:
					$lcn->where_not_in('status',STATUS_LANCAMENTO_CANCELADO);
				endif;
				$lcn->limit($limit, $offset); 
				if(empty($order)):
					$lcn->order_by('modified', $exib);
				else:
					$lcn->order_by($order, $exib);
				endif;
				$lcn->get();
				$data['uid'] = $this->uri->segment(3);
				$data['img'] = $order;
				$data['lcn'] = $lcn; 
				$data['limit'] = $limit;
				$data['offset'] = $offset;
				$data['perpage'] = $npage;
				$i = 0;
				$d_vc = '';
				foreach($lcn as $lc):
					$dvc = explode(' ',$lc->modified);
					$dvc_d = explode('-',$dvc[0]);
					$dvc_h = explode(':',$dvc[1]);
					$d_vc[$i] = $dvc_d[2] . '/' . $dvc_d[1] . '/' . $dvc_d[0] . ' ' . $dvc_h[0] . ':' . $dvc_h[1];
					$i++;
				endforeach;
				$data['dvc'] = $d_vc;
				
		
		$lcn_sm = new Lancamento();
		$sum = 0;
		$lcn_sm->select_sum('valor','soma')->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_CREDITO)->get();
		$sum += $lcn_sm->soma;
		$lcn_sm->select_sum('valor','soma')->where('status',STATUS_LANCAMENTO_ATIVO)->where('tipo',LANCAMENTO_DEBITO)->get();
		$sum -= $lcn_sm->soma;	
		$data['sum'] = $sum;	
		$data['uID'] = $this->session->userdata('id');
		$data['title'] = 'Lista de Lan&ccedil;amentos';
        
        $this->load->view('creditos_lancamentos', $data);
        
        
    }
    
    
    public function enviar_boleto(){
    	$bol = new Boleto();
    	$bol->include_related('usuario')->get_by_id($this->uri->segment(3));
    	$this->load->library('email');
    		
    	
    	$this->email->from(EMAIL_FROM, EMAIL_NAME);
    	$this->email->to($bol->usuario_email);
    		
    	$this->email->subject('Impress�o do Boleto '.$bol->nosso_numero);
    	$this->email->message('Ol�, ' .$bol->usuario_nome. '!<br /><br />Clique <a href="'.base_url('creditos/imprimir_boleto/'.$bol->chave).'">aqui</a> para imprimir o boleto');
    		
    	$this->email->send();
    	redirect(base_url('creditos/listar/'));
        
    }
    
    public function mudar_status_boleto(){
        $bol = new Boleto();
		$lcn = new Lancamento();
        $bol->include_related('usuario','*')->where('id', $this->uri->segment(3))->get();
        $data['bol'] = $bol;      		
		$bol->status = $this->uri->segment(4);
		if( !$bol->save() ) { 
		
			$data['msg'] = $fclt->error->string;;
			$data['msg_type'] = 'error';	
		
		}else {
			$today = getdate();
			switch ($bol->status):
						case STATUS_BOLETO_EM_ABERTO: $b_st = 'Em Aberto'; break;
						case STATUS_BOLETO_VENCIDO: $b_st = 'Vencido'; break;
						case STATUS_BOLETO_PAGO: $b_st = 'Pago'; break;
						case STATUS_BOLETO_CANCELADO: $b_st = 'Cancelado'; break;
					endswitch;
					
			$lcn->where('boleto_id', $this->uri->segment(3))->get();
			$option = $this->uri->segment(4);
	
			$lcn = new Lancamento();
			$lcn->where('boleto_id',$bol->id)->get();
			if ($option == STATUS_BOLETO_PAGO):
				$lcn->status = STATUS_LANCAMENTO_ATIVO;
			endif;
			if ($option == STATUS_BOLETO_EM_ABERTO):
				$lcn->status = STATUS_LANCAMENTO_INATIVO;
			endif;
			if ($option == STATUS_BOLETO_VENCIDO or $option == STATUS_BOLETO_CANCELADO):
				$lcn->status = STATUS_LANCAMENTO_CANCELADO;
				$lcn->cancelamento_autor_id = $this->session->userdata('id');
				$lcn->cancelamento_datetime = CURRENT_DB_DATETIME;
				if ($option == STATUS_BOLETO_VENCIDO):
					$lcn->cancelamento_justificativa = 'Boleto Vencido';
				else:
					$lcn->cancelamento_justificativa = 'Boleto Cancelado';
				endif;
			endif;
			$lcn->modified = CURRENT_DB_DATETIME;
			if( !$lcn->save() ) { 
			
				$data['msg'] = $lcn->error->string;;
				$data['msg_type'] = 'error';
					
			
			}else {
			}
			
			
			$this->load->library('email');
			
						
			$this->email->from(EMAIL_FROM, EMAIL_NAME);
			$this->email->to($bol->usuario_email);
			
			$this->email->subject('Alteração no Boleto '.$bol->nosso_numero);
			  $this->email->message('Olá, ' .$bol->usuario_nome. '!<br /><br />O status do boleto nº ' . $bol->nosso_numero . ' foi atualizado para "' . $b_st . '" em ' . $today['mday'] . '/' . $today['mon'] . '/' . $today['year'] . ' &agrave;s ' . $today['hours'] . 'h' . $today['minutes'] . '.');
			
			$this->email->send();
			
		}
		
		redirect(base_url('creditos/listar',$data));
    }
    
	public function mudar_status_boleto_multiplo(){
		$ids = $this->uri->segment(3);
            $id = explode('_', $ids);
            
            $option = $this->uri->segment(4);
            $erros = 0;
            
            $bol = new Boleto();
           !($bol->where_in('id',$id)->update('status', $option)) ? $erros++ : NULL;
            if($erros > 0){
                $data['msg'] = 'Erro ao atualizar dados';
                $data['msg_type'] = 'alert-error';
            }else{
                $data['msg'] = 'Dados atualizados com sucesso!';
                $data['msg_type'] = 'alert-success';
				
				foreach ($id as $b):
					$bl = new Boleto();
					$lcn = new Lancamento();
					$bl->get_by_id($b);
					$lcn->where('boleto_id',$b)->get();
					if ($option == STATUS_BOLETO_PAGO):
						$lcn->status = STATUS_LANCAMENTO_ATIVO;
					endif;
					if ($option == STATUS_BOLETO_EM_ABERTO):
						$lcn->status = STATUS_LANCAMENTO_INATIVO;
					endif;
					if ($option == STATUS_BOLETO_VENCIDO or $option == STATUS_BOLETO_CANCELADO):
						$lcn->status = STATUS_LANCAMENTO_CANCELADO;
						$lcn->cancelamento_autor_id = $this->session->userdata('id');
						$lcn->cancelamento_datetime = CURRENT_DB_DATETIME;
						if ($option == STATUS_BOLETO_VENCIDO):
							$lcn->cancelamento_justificativa = 'Boleto Vencido';
						else:
							$lcn->cancelamento_justificativa = 'Boleto Cancelado';
						endif;
					endif;
					$lcn->modified = CURRENT_DB_DATETIME;
					$lcn->save();
					
					
				endforeach;
            };
			
            redirect(base_url('creditos/listar',$data));
	}
	
    public function mudar_status_lancamento(){
		$lcn = new Lancamento();
        $lcn->where('id', $this->uri->segment(4))->get();
        $data['lcn'] = $lcn;      		
		$lcn->status = $this->uri->segment(3);
		$today = getdate();
			$lcn->modified = $today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
			if( !$lcn->save() ) { 
			
				$data['msg'] = $lcn->error->string;;
				$data['msg_type'] = 'error';	
			
			}else {
			}
		
		redirect(base_url('creditos/lancamentos',$data));
        
    }
	
	public function mundar_status_lancamento_multiplo() {
		    $ids = $this->uri->segment(3);
            $id = explode('_', $ids);
            
            $option = $this->uri->segment(4);
            $erros = 0;
            
            $lcn = new Lancamento();
           !($lcn->where_in('id',$id)->update('status', $option)) ? $erros++ : NULL;
            if($erros > 0){
                $data['msg'] = 'Erro ao atualizar dados';
                $data['msg_type'] = 'alert-error';
            }else{
                $data['msg'] = 'Dados atualizados com sucesso!';
                $data['msg_type'] = 'alert-success';
            };
            redirect(base_url('creditos/lancamentos',$data));
	}
	
	public function cancelar(){
		  $id = $this->uri->segment(3);
		if ($this->uri->segment(4) == "boleto"):
			$bol = new Boleto();
			$bol->where('id',$id)->get();
			$id = $bol->usuario_id;
		endif;
        
        $user = new Usuario();
        $user->where('id', $id);
        $user->get();
            
        $data['user'] = $user;
        
        $this->load->view('creditos_cancelar', $data);
	}
	
	public function cancelado(){
		$lcn = new Lancamento();
		$lcn->where('id',$this->uri->segment(3))->get();
		$lcn->status = STATUS_LANCAMENTO_CANCELADO;
		$lcn->cancelamento_justificativa	 = $_GET['justificativa'];
		$today = getdate();
		$bd_today = $today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'];
		$lcn->modified = $bd_today;
		$lcn->cancelamento_datetime = $bd_today;
		$lcn->cancelamento_autor_id =  $this->session->userdata('id');
		if( !$lcn->save() ) { 
			
			}else {
			}
		
		?>
        	<script>
				document.location.href = "<?php echo  base_url('creditos/lancamentos/'); ?>";
			</script>
            <?php
			
	}
	
	public function imprimir_boleto()
	{
		$data['uID'] = $this->session->userdata('id');
		$conf = new Configuracao();
		$bol = new Boleto();
		$bol->where('chave',$this->uri->segment(3))->get();
		$data['bol'] = $bol;
		$data['config'] = $conf->get();
		
		foreach($conf as $config):
			switch ($config->param):
				case 'creditos_codigo_cedente': $data['nosso_numero'] = $config->valor; break;
				case 'creditos_agencia': $data['agencia'] = $config->valor; break;
				case 'creditos_conta': $data['cc'] = $config->valor; break;
				case 'creditos_cedente_nome': $data['cedente_nome'] = $config->valor; break;
				case 'creditos_cedente_cnpj': $data['cedente_cnpj'] = $config->valor; break;
				case 'creditos_cedente_endereco_linha1': $data['cedente_endereco1'] = $config->valor; break;
				case 'creditos_cedente_endereco_linha2': $data['cedente_endereco2'] = $config->valor; break;
				case 'creditos_demonstrativo1': $data['demonstrativo1'] = $config->valor; break;
				case 'creditos_projeto_fusp': $data['codigo_projeto'] = $config->valor; break;
			endswitch;
		endforeach;
		
		$usr = new Usuario();
		$data['usr'] = $usr->get_by_id($bol->usuario_id);
		
		$dt = explode('-',$bol->data_vencimento);
		$data['data_vencimento'] = $dt[2].'/'.$dt[1].'/'.$dt[0];
		$dt = explode(' ',$bol->data_emissao);
		$dt = explode('-',$dt[0]);
		$data['data_emissao'] = $dt[2].'/'.$dt[1].'/'.$dt[0];
		
		$this->load->view('creditos_imprimir_boleto', $data);
	}
    
    public function remover(){
        $usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$data['uRole'] = $usr->credencial;
		$data['msg'] = '';
		$usr->where('status',STATUS_USUARIO_ATIVO)->order_by('nome')->get();
		$data['ur'] = $usr;
		if ($this->uri->segment(3) == 'st2'):
			$stage = 2;
		else:
			if ($this->uri->segment(3) == 'st3'):
				$stage = 3;
			else:
				$stage = 1;
			endif;
		endif;
		if ($data['uRole'] < CREDENCIAL_USUARIO_SUPERADMIN):
			header( 'Location: '.base_url('creditos/lancamentos') ) ;
		else:
			$data['select_user'] = true;
		endif;
		
		if (isset($_POST['valor'])):
			$stage = 3;
		endif;
		
		$conf = new Configuracao();
		$conf->get();
		foreach($conf as $config):
			switch ($config->param):
				case 'creditos_taxa_boleto': $tax = SIMBOLO_MOEDA_DEFAULT . '&nbsp;' . number_format($config->valor,2,TS,DS);; break;
				case 'creditos_prazo': $days_to_go = $config->valor; break;
				case 'creditos_projeto_fusp': $codigo_projeto = $config->valor; break;
			endswitch;
		endforeach;
		
		if (isset($_POST['to'])) $stage = 2;
		
		if ($stage == 1):
			if ($this->uri->segment(3) != ''):
				$data['directed'] = true;
				$stage = 2;
				$data['to'] = $this->uri->segment(3);
			else:
				$data['directed'] = false;
			endif;
		endif;
		
		if ($stage == 2):
			if ($data['uRole'] == CREDENCIAL_USUARIO_SUPERADMIN):
				$data['to'] = implode('_',$_POST['to']) or die;
			endif;
			$data['taxa_boleto'] = $tax;
		endif;
		
		if ($stage == 3):
			$options = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$code = "";
			$length = 32;
			for($i = 0; $i < $length; $i++):
				$key = rand(0, strlen($options) - 1);
				$code .= $options[$key];
			endfor;
	
			$to = explode('_',$_POST['receivers']);
			$received_value = str_replace(',','.',$_POST['valor']);
			foreach ($to as $rec):
				$lcn = new Lancamento();
				$lcn->usuario_id = $rec;
				$lcn->facility_id = 0;
				$lcn->chave = $code;
				$lcn->valor = $received_value;
				$lcn->autor_id = $this->session->userdata('id');
				$lcn->created = CURRENT_DB_DATETIME;
				$lcn->modified = CURRENT_DB_DATETIME;
				$lcn->status = STATUS_LANCAMENTO_ATIVO;
				$lcn->tipo = LANCAMENTO_DEBITO;
				$lcn->lancamento_direto = LANCAMENTO_DIRETO_SIM;
				$lcn->metodo_pagto = METODO_PAGTO_DINHEIRO;
				$lcn->obs = $_POST['obs'];
				$lcn->save();
				header( 'Location: '.base_url('creditos/lancamentos') ) ;
			endforeach;
		endif;
		
		$data['title'] = 'Remover Créditos';
		$data['stage'] = $stage;
		
		$this->load->view('creditos_remover', $data);
        
    }
    
    public function __destruct(){
        
        //parent::__destruct();
    }
	
}
?>
