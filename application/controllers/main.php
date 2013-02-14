<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
            
            $data['title'] = 'Página inicial';
            if ( $this->session->userdata('logged_in')) {
                // @TODO implementar direcionamento ao dashboard de acordo com a credencial
                // mensagem abaixo meramente para debugar.
                $data['msg'] = 'Bem-vindo, ' .$this->session->userdata('username'). '! <a href="' .base_url('usuarios/logout'). '"><p id="logout-right">LOGOUT</p></a>';
                $data['msg_type'] = 'success';

                $u = $this->session->userdata('credencial');
				
				$msg = new Mensagem();
				$data['n_mensagens'] = $msg->where('to_id',$this->session->userdata('id'))->limit(2)->count();
				if ($data['n_mensagens'] > 0):
				$msg->where('to_id',$this->session->userdata('id'))->limit(2)->get();
				$data['received_messages'] = $msg;
				endif;
				
				
                
                $view = 'dashboard';

            }else{
                $data['title'] = "CEFAP";
                $view = 'inicial';

            }
			
			
			
            
            $this->load->view($view,$data);
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */