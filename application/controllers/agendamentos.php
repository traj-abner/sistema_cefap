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
		
		if ($ur->credencial == CREDENCIAL_USUARIO_COMUM)
			$agn->where('usuario_id',$this->session->userdata('id'));
		
		$fcl = new Facility();
		if ($usr->credencial == CREDENCIAL_USUARIO_ADMIN):
			$fcl->include_related('usuarios')->where_related_usuario('id',$this->session->userdata)->get();
			$total = $agn->where_not_in('status',AGENDAMENTO_STATUS_EXCLUIDO)->where_in('facility_id',$fcl)->count();
		else:
			$total = $agn->where_not_in('status',AGENDAMENTO_STATUS_EXCLUIDO)->count();
		endif;
		
		
		
		if ($total == 0)
			error_reporting(0);
		if ($total > 0 ){
			$order = $this->uri->segment(3, NULL); #ordena de acordo com a opção escolhida pelo usuário
			$limit = $this->uri->segment(4, 5); #limite de resultados por página
			$npage = $this->uri->segment(5, 0); //número da página 
			$exib = $this->uri->segment(6,'CRESC'); //segmento que vai passar o valor de CRES ou DECRES.
			
			
			
			$offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
			if($offset < 0){
				$offset = 0;
			}                    
			if ($ur->credencial == CREDENCIAL_USUARIO_COMUM):
				$agn->where('usuario_id',$this->session->userdata('id'))->limit($limit, $offset);
			elseif ($ur->credencial == CREDENCIAL_USUARIO_ADMIN):
				$agn->where_not_in('status',AGENDAMENTO_STATUS_EXCLUIDO)->where_in('facility_id',$fcl)->limit($limit, $offset);
			else:
				$agn->where_not_in('status',AGENDAMENTO_STATUS_EXCLUIDO)->limit($limit, $offset);
			endif;
			
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
			$data['msg_type'] = 'alert';
		
		}else{
			$data['msg'] = '<strong>Nenhum agendamento encontrado.</strong>';
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
		
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$data['uRole'] = $usr->credencial;
		
		$all_usr = new Usuario();
		$all_usr->order_by('nome')->get();
		$data['us'] = $all_usr;
		
		$flc = new Facility();
		$data['fcl'] = $flc->where('status',STATUS_FACILITIES_ATIVO)->order_by('nome')->get();
		$proj = new Projeto();
		$data['proj'] = $proj->where('status',STATUS_PROJETO_ATIVO)->order_by('titulo')->get();
		
		$data['msg'] = '';
		$data['title'] = 'Criar Agendamento';
		
		$this->load->view('agendamentos_criar',$data);
		
		
        
    }
	
	public function novo(){
		$options = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$code = "";
		$length = 32;
		for($i = 0; $i < $length; $i++):
			$key = rand(0, strlen($options) - 1);
			$code .= $options[$key];
		endfor;
		$agn = new Agendamento();
		$usr = new Usuario();
		$fcl = new Facility();
		$prj = new Projeto();
		
		$usr->get_by_id($this->session->userdata('id'));
		
		if ($usr->credencial == CREDENCIAL_USUARIO_SUPERADMIN):
			$agn->usuario_id = $_POST['usuario'];
		else:
			$agn->usuario_id = $this->session->userdata('id');
		endif;
		$agn->facility_id = $_POST['facility'];
		$agn->projeto_id = $_POST['projeto'];
		$agn->status = AGENDAMENTO_STATUS_SOLICITADO;
		$agn->periodo_inicial = $_POST['dateField'].' '.$_POST['hinicio'].':'.$_POST['minicio'].':00';
		$agn->periodo_final = $_POST['dateField'].' '.$_POST['hfim'].':'.$_POST['mfim'].':59';
		$agn->status_pagto = STATUS_PAGTO_NAO_PAGO;
		$agn->chave = $code;
		$agn->save();
		$data = '';
		redirect(base_url('agendamentos/listar/',$data));
		
	}
	
	public function calendario(){
		$usr = new Usuario(); #current user
		$usr->get_by_id($this->session->userdata('id'));
		$data['uRole'] = $usr->credencial;
		
		$ag = new Agendamento();
		$ag->get_by_id($this->uri->segment(3));
		$data['ag'] = $ag;
		$ur = new Usuario();
		$ur->get_by_id($ag->usuario_id);
		$data['ur'] = $ur;
		
		$ur_all = new Usuario();
		$ur_all->order_by('nome')->get();
		$data['ur_all'] = $ur_all;
		
		
		$agn_all = new Agendamento();
		$agn_all->include_related('facilities')->include_related('usuario')->include_related('projeto')->where('periodo_inicial >',date('Y-m-d 00:00:00'));
		if ($this->uri->segment(3) != '') $agn_all->where('facility_id',$this->uri->segment(3));
		$agn_all->get();
		$data['agn'] = $agn_all;
		
		$flc = new Facility();
		$data['fcl'] = $flc->where('id',$ag->facility_id)->get();
		$flc_all = new Facility();
		$data['fcl_all'] = $flc_all->order_by('nome')->get();
		
		
		$proj = new Projeto();
		$data['proj'] = $proj->where('id',$ag->projeto_id)->get();
		$proj_all = new Projeto();
		$data['proj_all'] = $proj_all->order_by('titulo')->get();
		
		$data['msg'] = '';
		$data['title'] = 'Calendário de Agendamentos';

		$this->load->view('agendamentos_calendario',$data);
		
	}
    
    public function ver(){
    	$usr = new Usuario(); #current user
    	$usr->get_by_id($this->session->userdata('id'));
    	$data['uRole'] = $usr->credencial;
    	
    	$ag = new Agendamento();
    	$ag->get_by_id($this->uri->segment(3));
    	$data['ag'] = $ag;
    	$ur = new Usuario();
    	$ur->get_by_id($ag->usuario_id);
    	$data['ur'] = $ur;
    	
    	
    	$flc = new Facility();
    	$data['fcl'] = $flc->where('id',$ag->facility_id)->get();
    	$flc_all = new Facility();
    	$data['fcl_all'] = $flc_all->order_by('nome')->get();
    	
    	
    	$proj = new Projeto();
    	$data['proj'] = $proj->where('id',$ag->projeto_id)->get();
    	$proj_all = new Projeto();
    	$data['proj_all'] = $proj_all->order_by('titulo')->get();
    	
    	$data['msg'] = '';
    	$data['title'] = 'Editar Agendamento';
    	$isadmin = $flc->include_related('usuario')->where('id',$ag->facility_id)->where_related_usuario('id',$this->session->userdata('id'))->count();
    	
    	switch($usr->credencial):
    	case CREDENCIAL_USUARIO_COMUM:
    		if ($ag->usuario_id != $this->session->userdata('id')):
    		redirect('main');
    	else:
    	$data['adminRights'] = true;
    	$data['canApprove'] = false;
    	endif;
    	break;
    	case CREDENCIAL_USUARIO_ADMIN:
    		if ($isadmin == 1):
    		$data['adminRights'] = true;
    		$data['canApprove'] = true;
    		else:
    		$data['adminRights'] = false;
    		endif;
    		break;
    	case CREDENCIAL_USUARIO_SUPERADMIN: $data['adminRights'] = true; $data['canApprove'] = true; break;
    	endswitch;
    	$this->load->view('agendamentos_ver',$data);
        
    }
	
	public function editar(){
		$usr = new Usuario(); #current user
		$usr->get_by_id($this->session->userdata('id'));
		$data['uRole'] = $usr->credencial;
		
		$ag = new Agendamento();
		$ag->get_by_id($this->uri->segment(3));
		$data['ag'] = $ag;
		$ur = new Usuario();
		$ur->get_by_id($ag->usuario_id);
		$data['ur'] = $ur;
		
		$ur_all = new Usuario();
		$ur_all->order_by('nome')->get();
		$data['ur_all'] = $ur_all;
		
		$agn_all = new Agendamento();
		$agn_all->include_related('facilities')->include_related('usuario')->include_related('projeto')->where('facility_id',$ag->facility_id)->get();
		$data['agn'] = $agn_all;
		
		$flc = new Facility();
		$data['fcl'] = $flc->where('id',$ag->facility_id)->get();
		$flc_all = new Facility();
		$data['fcl_all'] = $flc_all->order_by('nome')->get();
		
		
		$proj = new Projeto();
		$data['proj'] = $proj->where('id',$ag->projeto_id)->get();
		$proj_all = new Projeto();
		$data['proj_all'] = $proj_all->order_by('titulo')->get();
		
		$data['msg'] = '';
		$data['title'] = 'Editar Agendamento';
		$isadmin = $flc->include_related('usuario')->where('id',$ag->facility_id)->where_related_usuario('id',$this->session->userdata('id'))->count();
		
		switch($usr->credencial):
		case CREDENCIAL_USUARIO_COMUM: 
			if ($ag->usuario_id != $this->session->userdata('id')):
				redirect('main'); 
			else:
				$data['adminRights'] = true;
				$data['canApprove'] = false;
			endif;
		break;
		case CREDENCIAL_USUARIO_ADMIN:
			if ($isadmin == 1):
				$data['adminRights'] = true;
				$data['canApprove'] = true;
			else:
				$data['adminRights'] = false;
			endif;
			break;
		case CREDENCIAL_USUARIO_SUPERADMIN: $data['adminRights'] = true; $data['canApprove'] = true; break;
		endswitch;
		$this->load->view('agendamentos_editar',$data);
		
	}
    
    public function aprovar(){
        $usr = new Usuario(); #current user
        $usr->get_by_id($this->session->userdata('id'));
        $data['uRole'] = $usr->credencial;
		
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
		$isadmin = $flc->include_related('usuario')->where('id',$ag->facility_id)->where_related_usuario('id',$this->session->userdata('id'))->count();
		
		switch($usr->credencial):
			case CREDENCIAL_USUARIO_COMUM: redirect('main'); break;
			case CREDENCIAL_USUARIO_ADMIN:
				if ($isadmin == 1):
					$data['adminRights'] = true;
				else:
					$data['adminRights'] = false;
				endif;
				break;
			case CREDENCIAL_USUARIO_SUPERADMIN: $data['adminRights'] = true;
		endswitch;
		$this->load->view('agendamentos_aprovar',$data);
        
    }
    
    public function negar(){
        
        
    }
    
    public function salvar(){
    	$cur = new Usuario(); #current user
    	$cur->get_by_id($this->session->userdata('id'));
    	
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
		
		
		
		if ($_POST['how'] == 'change' and $cur->credencial > CREDENCIAL_USUARIO_COMUM):
			$agn->periodo_inicial_marcado = $_POST['dateField'].' '.$_POST['hinicio'].':'.$_POST['minicio'].':00';
			$agn->periodo_final_marcado = $_POST['dateField'].' '.$_POST['hfim'].':'.$_POST['mfim'].':59';
		else:
			if ($cur->credencial > CREDENCIAL_USUARIO_COMUM):
				$agn->periodo_inicial_marcado = $agn->periodo_inicial;
				$agn->periodo_final_marcado = $agn->periodo_final;
			else:
				$agn->periodo_inicial = $_POST['dateField'].' '.$_POST['hinicio'].':'.$_POST['minicio'].':00';
				$agn->periodo_final = $_POST['dateField'].' '.$_POST['hfim'].':'.$_POST['mfim'].':59';
			endif;
		endif;
		if (isset($_POST['facility'])):
			$agn->facility_id = $_POST['facility'];
			$agn->projeto_id = $_POST['projeto'];
		endif;
		
		if ($cur->credencial == CREDENCIAL_USUARIO_SUPERADMIN):
			if (isset($_POST['usuario'])):
				$agn->usuario_id = $_POST['usuario'];
			endif;
		endif;
		
		
		if ($cur->credencial > CREDENCIAL_USUARIO_COMUM):
			$agn->status = $_POST['status'];
			$agn->status_pagto = $_POST['pagto'];
			$received_value = str_replace(',','.',$_POST['valor']);
			$agn->valor_total = $received_value;
			
			$agn->aprovado_por_id = $this->session->userdata('id');
		endif;
		if ($agn->chave == ''):
			$agn->chave = $code;
		else:
			$lcn->where('chave',$agn->chave)->get();
		endif;
		$agn->save();
		
		if ($cur->credencial > CREDENCIAL_USUARIO_COMUM):
			$lcn->usuario_id = $agn->usuario_id;
			$lcn->facility_id = $agn->facility_id;
			$lcn->chave = $agn->chave;
			$lcn->valor = $received_value;
			$lcn->autor_id = $this->session->userdata('id');
			$lcn->modified = CURRENT_DB_DATETIME;
			$lcn->status = STATUS_LANCAMENTO_ATIVO;
			$lcn->tipo = LANCAMENTO_DEBITO;
			$lcn->lancamento_direto = LANCAMENTO_DIRETO_SIM;
			$lcn->metodo_pagto = METODO_PAGTO_DINHEIRO;
			$lcn->obs = 'Agendamento da Facility '. $fcl->nome;
			$lcn->save();
		endif;
		
		$data = '';
				
		redirect(base_url('agendamentos/listar/',$data));
        
    }
	
    
    public function excluir(){
        $agn = new Agendamento();
        $agn->get_by_id($this->uri->segment(3)) or die;
        $agn->status = AGENDAMENTO_STATUS_EXCLUIDO;
        $agn->aprovado_por_id = $this->session->userdata('id');
        
        $agn->save();
        $data = '';
        redirect(base_url('agendamentos/listar/',$data));
        
    }
    
    public function __destruct(){
        
       // parent::__destruct();
    }
}
?>
