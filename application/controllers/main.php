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