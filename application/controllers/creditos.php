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
					$order = $this->uri->segment(3, 'id');
	
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
		$usr = new Usuario();
		$usr->select('credencial')->where('id', $this->session->userdata('id'))->get();
		// initialize user role with proper value
		$data['uRole'] = $usr->credencial;
        $id = $this->uri->segment(3);
		if ($this->uri->segment(4) == "boleto"):
			$bol = new Boleto();
			$bol->where('id',$id)->get();
			$id = $bol->usuario_id;
		endif;
        
        $user = new Usuario();
        $user->where('id', $id);
        $user->get();
		$cpf = substr($user->cpf,0,3).'.'.substr($user->cpf,3,3).'.'.substr($user->cpf,6,3).'-'.substr($user->cpf,9,2);
        $data['cpf'] = $cpf;
        $data['user'] = $user;
        
        $this->load->view('creditos_extrato', $data);
        
    }
    
    public function inserir(){
        
        
    }
    
    public function lancamentos(){
        
        
    }
    
    public function imprimir_boleto(){
        
        
    }
    
    public function enviar_boleto(){
        
        
    }
    
    public function mudar_status_boleto(){
        $bol = new Boleto();
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
                    $this->load->library('email');
				    
                                
					$this->email->from(EMAIL_FROM, EMAIL_NAME);
					$this->email->to($bol->usuario_email);
					
					$this->email->subject('Alteração no Boleto '.$bol->nosso_numero);
					  $this->email->message('Olá, ' .$bol->usuario_nome. '!<br /><br />O status do boleto nº ' . $bol->nosso_numero . ' foi atualizado para "' . $b_st . '" em ' . $today['mday'] . '/' . $today['mon'] . '/' . $today['year'] . ' &agrave;s ' . $today['hours'] . 'h' . $today['minutes'] . '.');
					
					$this->email->send();
					
                }
				
		
		
		
		redirect(base_url('creditos/listar',$data));
    }
    
    public function mudar_status_lancamento(){
        
        
    }
    
    public function remover(){
        
        
    }
    
    public function __destruct(){
        
        //parent::__destruct();
    }
}
?>
