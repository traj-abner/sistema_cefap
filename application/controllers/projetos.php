<?php

class Projetos extends CI_Controller{
    
   public function __constructor(){
        
        parent::__constructor();
        
    }
    
    public function index(){
        
        
    }
	
	public function ver(){
		$proj = new Projeto();
		$proj->get_by_id($this->uri->segment(3));
		$data['proj'] = $proj;
		$usr = new Usuario();
		$usr->get_by_id($proj->created_by);
		$data['usr'] = $usr;
		
		if (!empty($proj->modified)):
			$dvc = explode(' ',$proj->modified);
			$dvc_d = explode('-',$dvc[0]);
			$dvc_h = explode(':',$dvc[1]);
			$data['last_modified'] = $dvc_d[2] . '/' . $dvc_d[1] . '/' . $dvc_d[0] . ' ' . $dvc_h[0] . ':' . $dvc_h[1];
			$data['modified'] = true;
		else:
			$data['modified'] = false;
		endif;
		
		$inst = explode(';',$proj->inst_fomento);
		$data['inst'] = implode(', ', $inst);
		
		$this->load->view('projetos_ver',$data);
	}
	
	public function listar(){
       	$proj = new Projeto();
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		
		$total = $proj->count();

		if ($total > 0 ){
			$order = $this->uri->segment(3, NULL); #ordena de acordo com a opção escolhida pelo usuário
			$limit = $this->uri->segment(4, 5); #limite de resultados por página
			$npage = $this->uri->segment(5, 0); //número da página 
			$exib = $this->uri->segment(6,'CRESC'); //segmento que vai passar o valor de CRES ou DECRES.
			
			
			
			$offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
			if($offset < 0){
				$offset = 0;
			}                    
			
			
			if ($usr->credencial < CREDENCIAL_USUARIO_SUPERADMIN):
				$proj->limit($limit, $offset);
			else:
				$proj->where_not_in('status',STATUS_PROJETO_CANCELADO)->limit($limit, $offset);
			endif;
			
			//ordena de acordo com a opção que o usuário escolher    
			if(empty($order)){
				$proj->order_by('id', $exib);

			}else{
				$proj->order_by($order, $exib);
			}
			
			$proj->get();

			$data['img'] = $order;
			$data['proj'] = $proj; 
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
				
				$url = base_url("projetos/listar/$order/$limit/$i");
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
         $data['title'] = 'Lista de Projetos';
         $this->load->view('projetos_listar',$data);
        
    }
	
	public function status(){
		$usr = new Usuario();
		$proj = new Projeto();
		$data = '';
		
		$usr->get_by_id($this->session->userdata('id'));
		$proj->get_by_id($this->uri->segment(4));
		
		if ($usr->credencial < CREDENCIAL_USUARIO_SUPERADMIN and $proj->created_by != $usr->id or ($this->uri->segment(3) != STATUS_PROJETO_ATIVO and $this->uri->segment(3) != STATUS_PROJETO_INATIVO)):
			$result = 'invalid';
			redirect(base_url('projetos/inserir/'.$result,$data));
		endif;
		
		$proj->status = $this->uri->segment(3);
		$proj->save();
		
		redirect(base_url('projetos/listar/',$data));
	}
	
	public function inserir(){
		$data['title'] = 'Criar Projeto';
		$data['msg'] = '';
		
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$data['uRole'] = $usr->credencial;
		
		if ($this->uri->segment(3) == 'success'):
			$data['msg'] = 'Projeto criado com sucesso';
			$data['alert_class'] = 'alert alert-success';
		endif;
		if ($this->uri->segment(3) == 'invalid'):
			$data['msg'] = '<b>Ação Inválida</b><br>Verifique se o projeto existe ou se você tem permissão para editá-lo';
			$data['alert_class'] = 'alert alert-error';
		endif;
		if ($this->uri->segment(3) == 'fail'):
			$data['msg'] = 'Falha ao salvar o projeto';
			$data['alert_class'] = 'alert alert-error';
		endif;
				
		$this->load->view('projetos_inserir',$data);	
	}
	
	public function novo(){
		$proj = new Projeto();
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		
		$proj->titulo = $_POST['titulo'];
		$proj->resumo = $_POST['resumo'];
		$proj->inst_fomento = implode(';',$_POST['inst_fomento']);
		$proj->responsavel = $_POST['responsavel'];
		$proj->departamento = $_POST['departamento'];
		$proj->instituicao = $_POST['instituicao'];
		$proj->telefone1 = $_POST['telefone1'];
		$proj->telefone2 = $_POST['telefone2'];
		$proj->email = $_POST['email'];
		$proj->created_by = $usr->id;
		$proj->status = STATUS_PROJETO_ATIVO;
		
		
		//upload file
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf|doc|docx|odf';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('uploadForponto'))
		{
			echo $this->upload->display_errors();
			die;
		}
		else
		{
		}

		$this->upload->do_upload('arquivos');
		$dados = $this->upload->data();
		$proj->arquivos = $dados['file_name'];
		
		if ($proj->save_usuario($usr->all)):
			$result = 'success';
		else:
			$result = 'fail';
		endif;
		$data = '';
		redirect(base_url('projetos/inserir/'.$result,$data));
	}
	
	public function editar(){
		$data['title'] = 'Editar Projeto';
		$data['msg'] = '';
		
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$data['uRole'] = $usr->credencial;
		
		$proj = new Projeto();
		$proj->where('id',$this->uri->segment(3));
		$count = $proj->count();
		$proj->get_by_id($this->uri->segment(3));
		if ($count == 0 or ($proj->created_by != $this->session->userdata('id') and $usr->credencial < CREDENCIAL_USUARIO_SUPERADMIN)):
			$result = 'invalid';
			redirect(base_url('projetos/inserir/'.$result,$data));
		endif;
		
		
		$data['proj'] = $proj;

		$this->load->view('projetos_editar',$data);	
	}
	
	public function salvar(){
		$proj = new Projeto();
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$proj->get_by_id($_POST['projeto']);
		
		
		$proj->titulo = $_POST['titulo'];
		$proj->resumo = $_POST['resumo'];
		$proj->inst_fomento = implode(';',$_POST['inst_fomento']);
		$proj->responsavel = $_POST['responsavel'];
		$proj->departamento = $_POST['departamento'];
		$proj->instituicao = $_POST['instituicao'];
		$proj->telefone1 = $_POST['telefone1'];
		$proj->telefone2 = $_POST['telefone2'];
		$proj->email = $_POST['email'];
		$proj->status = $_POST['status'];
		
		
		//upload file
		if (isset($_POST['uploadForponto'])):
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'pdf|doc|docx|odf';
			$config['encrypt_name'] = TRUE;
	
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload('uploadForponto'))
			{
				echo $this->upload->display_errors();
				die;
			}
			else
			{
			}
	
			$this->upload->do_upload('arquivos');
			$dados = $this->upload->data();
			$proj->arquivos = $dados['file_name'];
		endif;
		
		if ($proj->save_usuario($usr->all)):
			$result = 'success';
		else:
			$result = 'fail';
		endif;
		$data = '';
		redirect(base_url('projetos/editar/'.$_POST['projeto'],$data));
	}
	
	public function excluir(){
		$usr = new Usuario();
		$usr->get_by_id($this->session->userdata('id'));
		$data['uRole'] = $usr->credencial;
		
		$proj = new Projeto();
		$proj->where('id',$this->uri->segment(3));
		$count = $proj->count();
		$proj->get_by_id($this->uri->segment(3));
		if ($count == 0 or ($proj->created_by != $this->session->userdata('id') and $usr->credencial < CREDENCIAL_USUARIO_SUPERADMIN)):
			$result = 'invalid';
			redirect(base_url('projetos/inserir/'.$result,$data));
		endif;
		
		$proj->status = STATUS_PROJETO_EXCLUIDO;
		$proj->save();
		redirect(base_url('projetos/listar/',$data));
		
	}
    
    public function __destruct(){
        
        //parent::__destruct();
    }
}
?>
