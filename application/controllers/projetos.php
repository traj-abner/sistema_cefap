<?php

class Projetos extends CI_Controller{
    
   public function __constructor(){
        
        parent::__constructor();
        
    }
    
    public function index(){
        
        
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
