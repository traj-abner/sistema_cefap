<?php

class Mensagens extends CI_Controller{
    
   public function __constructor(){
        
        parent::__constructor();
        
    }
    
    public function index(){
        
        
    }
        
    public function escrever(){
        if ($this->uri->segment(3) != 'to')
			$directed = false;
		else
			$directed = true;
		$data['directed'] = $directed;
		
		if ($this->uri->segment(3) == 'sent'):
			$data['msg'] = 'Mensagem enviada com sucesso';
			$data['alert_class'] = 'alert alert-success';
		else:
			$data['msg'] = '';
		endif;
		
		if ($directed):
			$data['to'] = explode('_',$this->uri->segment(4));
		endif;	
			
		$data['directed'] = $directed;
		
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
		foreach($_POST['to'] as $_to):
			$they[$i] = $_to;
			$i++;
		endforeach;
		
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
			foreach ($to as $rec) $this->email->to($rec->email);
			
			$this->email->subject($_POST['assunto']);
			  $this->email->message('<b>Enviado por:</b>'.$from->nome.'<hr><br><br><br>'.$_POST['elm1']);
			
			$this->email->send();
		endif;
		
		?>
        	<script>
				document.location.href = "<?php echo  base_url('mensagens/escrever/sent'); ?>";
			</script>
            <?php
	}
    
    public function ler(){
        
        
    }
    
    public function recebidas(){
        
        
    }
    
    public function enviadas(){
        
        
    }
    
    public function mudar_status(){
        
        
    }
    
    public function __destruct(){
        
       // parent::__destruct();
    }
}
?>
