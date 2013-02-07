<?php

class Agendamentos extends CI_Controller{
    
   public function __constructor(){
        
        parent::__constructor();
        
    }
    
    public function index(){
        
        
    }
        
    public function listar(){
        $proj = new Projeto();
		$usr = new Usuario();
		$agn = new Agendamento();
		$ur = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$ur = $usr;
		if ($ur->credencial < CREDENCIAL_USUARIO_ADMIN):
			redirect('main');
		endif;
		
		$total = $agn->count();

		if ($total > 0 ){
			$order = $this->uri->segment(3, NULL); #ordena de acordo com a opção escolhida pelo usuário
			$limit = $this->uri->segment(4, 5); #limite de resultados por página
			$npage = $this->uri->segment(5, 0); //número da página 
			$exib = $this->uri->segment(6,'CRESC'); //segmento que vai passar o valor de CRES ou DECRES.
			
			
			
			$offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
			if($offset < 0){
				$offset = 0;
			}                    
			
			$agn->limit($limit, $offset);
			
			//ordena de acordo com a opção que o usuário escolher    
			if(empty($order)){
				$agn->order_by('id', $exib);

			}else{
				$agn->order_by($order, $exib);
			}
			
			$agn->get();

			$data['img'] = $order;
			$data['agn'] = $agn; 
			$data['limit'] = $limit;
			$data['offset'] = $offset;
			$data['perpage'] = $npage;
		
		}else{
			$data['msg'] = '<strong>Nenhum projeto encontrado.</strong>';
			$data['msg_type'] = 'alert-block';
		}     
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
				
				$url = base_url("agendamentos/listar/$order/$limit/$i");
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
				$data['buttonArray'] = $buttonArray;
				$data['urlarray'] = $urlarray;  
				$data['page'] =  $links;

				
				
		 /*END PAGINAÇÃO*/     
         $data['uRole'] = $usr->credencial;
         $data['title'] = 'Lista de Agendamentos';
         $this->load->view('agendamentos_listar',$data);
        
    }
    
    public function mudar_status(){
        
        
    }
    
    public function criar(){
        $agn_all = new Agendamento();
		$agn_all->include_related('facilities')->include_related('usuario')->include_related('projeto')->where('status',-1)->get();
		$data['agn'] = $agn_all;
		
		$flc = new Facility();
		$data['fcl'] = $flc->where('status',STATUS_FACILITIES_ATIVO)->order_by('nome')->get();
		$proj = new Projeto();
		$data['proj'] = $proj->where('status',STATUS_PROJETO_ATIVO)->order_by('titulo')->get();
		
		$data['msg'] = '';
		$data['title'] = 'Criar Agendamento';
		
		$this->load->view('agendamentos_criar',$data);
		
		
        
    }
	
	public function novo(){
		$agn = new Agendamento();
		$usr = new Usuario();
		$fcl = new Facility();
		$prj = new Projeto();
		
		$agn->usuario_id = $this->session->userdata('id');
		$agn->facility_id = $_POST['facility'];
		$agn->projeto_id = $_POST['projeto'];
		$agn->status = AGENDAMENTO_STATUS_SOLICITADO;
		$agn->periodo_inicial = $_POST['dateField'].' '.$_POST['hinicio'].':'.$_POST['minicio'].':00';
		$agn->periodo_final = $_POST['dateField'].' '.$_POST['hfim'].':'.$_POST['mfim'].':59';
		$agn->status_pagto = STATUS_PAGTO_NAO_PAGO;
		$agn->save();
		redirect(base_url('agendamentos/listar/',$data));
		
	}
    
    public function ver(){
        
        
    }
	
	public function editar(){}
    
    public function aprovar(){
       
		
		$ag = new Agendamento();
		$ag->get_by_id($this->uri->segment(3));
		$data['ag'] = $ag;
		$ur = new Usuario();
		$ur->get_by_id($ag->usuario_id);
		$data['ur'] = $ur;
		
		 $agn_all = new Agendamento();
		$agn_all->include_related('facilities')->include_related('usuario')->include_related('projeto')->where('facility_id',$ag->facility_id)->get();
		$data['agn'] = $agn_all;
		
		$flc = new Facility();
		$data['fcl'] = $flc->where('id',$ag->facility_id)->get();
		$proj = new Projeto();
		$data['proj'] = $proj->where('id',$ag->projeto_id)->get();
		
		$data['msg'] = '';
		$data['title'] = 'Aprovar Agendamento';
		
		$this->load->view('agendamentos_aprovar',$data);
        
    }
    
    public function negar(){
        
        
    }
    
    public function salvar(){
		$options = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$code = "";
		$length = 32;
		for($i = 0; $i < $length; $i++):
			$key = rand(0, strlen($options) - 1);
			$code .= $options[$key];
		endfor;
        $agn = new Agendamento();
		$agn->get_by_id($this->uri->segment(3));
		
		$fcl = new Facility();
		$fcl->get_by_id($agn->facility_id);
		
		$lcn = new Lancamento();
		
		$agn->status = $_POST['status'];
		$agn->status_pagto = $_POST['pagto'];
		
		if ($_POST['how'] == 'change'):
			$agn->periodo_inicial_marcado = $_POST['dateField'].' '.$_POST['hinicio'].':'.$_POST['minicio'].':00';
			$agn->periodo_final_marcado = $_POST['dateField'].' '.$_POST['hfim'].':'.$_POST['mfim'].':59';
		else:
			$agn->periodo_inicial_marcado = $agn->periodo_inicial;
			$agn->periodo_final_marcado = $agn->periodo_final;
		endif;
		
		$received_value = str_replace(',','.',$_POST['valor']);
		$agn->valor_total = $received_value;
		
		$agn->aprovado_por_id = $this->session->userdata('id');
		if ($agn->chave == ''):
			$agn->chave = $code;
		else:
			$lcn->where('chave',$agn->chave)->get();
		endif;
		$agn->save();
		
		$lcn->usuario_id = $agn->usuario_id;
		$lcn->facility_id = $agn->facility_id;
		$lcn->chave = $code;
		$lcn->valor = $received_value;
		$lcn->autor_id = $this->session->userdata('id');
		$lcn->modified = CURRENT_DB_DATETIME;
		$lcn->status = STATUS_LANCAMENTO_ATIVO;
		$lcn->tipo = LANCAMENTO_DEBITO;
		$lcn->lancamento_direto = LANCAMENTO_DIRETO_SIM;
		$lcn->metodo_pagto = METODO_PAGTO_DINHEIRO;
		$lcn->obs = 'Agendamento da Facility '. $fcl->nome;
		$lcn->save();
		
		$data = '';
				
		redirect(base_url('agendamentos/aprovar/'.$this->uri->segment(3),$data));
        
    }
	
    
    public function excluir(){
        
        
    }
    
    public function __destruct(){
        
       // parent::__destruct();
    }
}
?>
