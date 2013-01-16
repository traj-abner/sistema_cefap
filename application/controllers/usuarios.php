<?php
class Usuarios extends CI_Controller{
    
    public function __construct(){
        
        parent::__construct();
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
        //usuários com credencial 'comum' não tem acesso a esta página e são redirecionados para a main automaticamente.
        if ( $this->uRole == CREDENCIAL_USUARIO_COMUM) {
               redirect('main');
            }
            else{ //Só usuários com credencial de ADMIN ou SUPERAMDIN podem visualizar.
                $total = $this->db->count_all("usuarios");

                if ($total > 0 ){
                    $order = $this->uri->segment(3, NULL); #ordena de acordo com a opção escolhida pelo usuário
                    $limit = $this->uri->segment(4, 5); #limite de resultados por página
                    $npage = $this->uri->segment(5, 0); //número da página 
                    $exib = $this->uri->segment(6,'CRESC'); //segmento que vai passar o valor de CRES ou DECRES.
                    
                    
                    if($limit == 'usuarios' && $npage == 'adicionar'){
                        redirect('usuarios/adicionar');
                    }
                    
                    
                    $offset = ($npage - 1) * $limit; //calcula o offset para exibir os resultados de acordo com a página que o usuário clicar
                    if($offset < 0){
                        $offset = 0;
                    }                    
                    $user = new Usuario();
                    
                    switch ($this->uRole){ //verifica a credencial do usuário. Se for superadmin, poderá visualizar tudo. Se for admin, não poderá visualizar os usuário que estiverem com status excluido.
                        case CREDENCIAL_USUARIO_SUPERADMIN :
                            $user->select('id, nome, email, tipo, status, instituicao, credencial')->limit($limit, $offset);
                        break;
                        //usuário com a credencial de admin não poderá ver a lista de usuários excluídos.
                        case CREDENCIAL_USUARIO_ADMIN :
                            $user->select('id, nome, email, tipo, status, instituicao, credencial')->where_not_in('status', STATUS_USUARIO_EXCLUIDO)->limit($limit, $offset); 
                        break;
                        }
                    //ordena de acordo com a opção que o usuário escolher    
                    if(empty($order)){
                        $user->order_by('id', $exib);

                    }else{
                        $user->order_by($order, $exib);
                    }
                    
                    $user->get();

                    $data['img'] = $order;
                    $data['user'] = $user; 
                    $data['limit'] = $limit;
                    $data['offset'] = $offset;
                    $data['perpage'] = $npage;
                
                }else{
                    $data['msg'] = '<strong>Nenhum usuário encontrado.</strong>';
                    $data['msg_type'] = 'alert-block';
                }     
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
                        
                        $url = base_url("usuarios/listar/$order/$limit/$i");
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
        
         $data['title'] = 'Lista de Usuários';
         $this->load->view('usuario_listar',$data);
        
    }
	

		
    
    public function adicionar(){
		
                //checa se o usuário já está logado e qual a credencial. Caso seja admin ou comum, eles não podem adicionar novos usuários 
                if ($this->session->userdata('logged_in')){
                    if ( $this->uRole == CREDENCIAL_USUARIO_ADMIN || $this->uRole == CREDENCIAL_USUARIO_COMUM )
		    redirect('main');
               }
        // default view
        $view = 'usuario_adicionar';
		
		if($this->input->post('submit')){
			/* 
			 * 1- gravar usuário no banco
			 * 2- enviar e-mail de confirmação
			 * 3- mostrar mensagem de sucesso
			 * */
			$u = new Usuario();
			$post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
			
			$u->username 		= $post['username'];
			$u->senha		= md5($post['senha']);
			$u->senha_conf		= md5($post['senha_conf']);
			$u->nome		= $post['nome'];
			$u->sobrenome		= $post['sobrenome'];
			$u->endereco		= $post['endereco'];
			$u->cidade		= $post['cidade'];
			$u->uf			= $post['uf'];
			$u->instituicao		= $post['instituicao'];
			$u->departamento	= $post['departamento'];
			$u->data_nascimento	= $post['data_nascimento'];
			$u->key			= create_guid();
			$u->status		= STATUS_USUARIO_INATIVO;
			// $u->obs		= '';
			$u->credencial		= ($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN) ? $post['credencial'] : CREDENCIAL_USUARIO_COMUM; // check if user submitting form is a superadmin
			$u->email		= $post['email'];
			$u->celular		= isset($post['celular']) ? $post['celular'] : 0;
			$u->telefone		= $post['telefone'];
			$u->cpf			= $post['cpf'];
			$u->tipo                = isset($post['tipo']) ? $post['tipo'] : NULL;
			$u->newsletter		= isset($post['newsletter']) ? $post['newsletter'] : 0;
			$u->cep			= $post['cep'];
			
                        /* Recupera os dados digitados se retornar erro */
                        session_start(); // iniciamos a session
                        $_SESSION['username'] = $_POST['username']; 
                        $_SESSION['nome'] = $_POST['nome'];
                        $_SESSION['sobrenome'] = $_POST['sobrenome'];
                        $_SESSION['endereco'] = $_POST['endereco'];
                        $_SESSION['cep'] = $_POST['cep'];
                        $_SESSION['cidade'] = $_POST['cidade'];
                        $_SESSION['uf'] = $_POST['uf'];
                        $_SESSION['instituicao'] = $_POST['instituicao'];
                        $_SESSION['departamento'] = $_POST['departamento'];
                        $_SESSION['telefone'] = $_POST['telefone'];
                        $_SESSION['celular'] = $_POST['celular'];
                        $_SESSION['data_nascimento'] = $_POST['data_nascimento'];
                        $_SESSION['cpf'] = $_POST['cpf'];
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['tipo'] = $_POST['tipo'];
                        
			if( !$u->save() ) { // error on save
				
				if ( $u->valid ) { // validation ok; database error on insert or update
					$data['msg'] = MSG_ERRO_BD;
					$data['msg_type'] = 'error';
                                        
				} else { // validation error
					$data['msg'] = $u->error->string;
					$data['msg_type'] = 'error';	
				}
				
			} else { // success
				
				$this->load->library('email');
				
                                
				$this->email->from(EMAIL_FROM, EMAIL_NAME);
				$this->email->to($u->email);
				
				$this->email->subject('Confirmação de Cadastro');
				$this->email->message('Olá, ' .$u->nome. '! Confirme seu cadastro <a href="' .base_url('usuarios/ativar/'.$u->key). '">clicando aqui</a>.');
				
				$this->email->send();
				
				// echo $this->email->print_debugger();
				
                                $data['msg']        = 'Novo usário ' .$u->username. ' cadastrado com sucesso!';
                                $data['msg_type']   = 'success';
                	
			}
			
                    }
		$data['title'] = 'Cadastro de Usuário';
		$this->load->view($view, $data);
		
	}
        
        public function ativar(){
        
	
		$u = new Usuario();
	
		// se o segmento 3 existe e é uma key válida cadastrada para um usuário do banco, ativa o usuário
		if($this->uri->segment(3) && $u->where('key', $this->uri->segment(3))->count() > 0) {
				
			$key = $this->uri->segment(3);
				
			$u->where('key', $key)->update('status', STATUS_USUARIO_ATIVO);
				
			$data['title'] = "Cadastro Confirmado";
                        $data['msg'] = 'Usuário ativado com sucesso! <br><br>Dentro de alguns instantes você será redirecionado para a página inicial.';
                        $data['msg_type'] = "alert-success";
			// @TODO preparar $data['msg'] para ser mostrada na view
			$this->load->view('usuario_ativar', $data);
				
		// se não há key para se trabalhar, então redireciona à home
		} else {
			redirect('main');
		}
    }
    
     public function editar(){
		
		// dump unauthorized users (guests or common users trying to edit other users)		
		if ( ! isset($this->uRole) || ( $this->uRole == CREDENCIAL_USUARIO_COMUM && $this->session->userdata('id') != $this->uri->segment(3) ) )
			redirect('main');
		
		$u = new Usuario();
		$u->where('id', $this->uri->segment(3))->get();
			
		if ($this->input->post('submit')) {
	
			$post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
				
			$u->username 		= $post['username'];
			$u->nome			= $post['nome'];
			$u->sobrenome		= $post['sobrenome'];
			$u->endereco		= $post['endereco'];
			$u->cidade			= $post['cidade'];
			$u->uf				= $post['uf'];
			$u->instituicao		= $post['instituicao'];
			$u->departamento	= $post['departamento'];
			$u->data_nascimento	= $post['data_nascimento'];
			$u->email			= $post['email'];
			$u->celular			= isset($post['celular']) ? $post['celular'] : null;
			$u->telefone		= $post['telefone'];
			$u->cpf				= $post['cpf'];
			$u->tipo			= $post['tipo'];
			$u->credencial		= ($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN) ? $post['credencial'] : CREDENCIAL_USUARIO_COMUM; // check if user submitting form is a superadmin
			$u->newsletter		= isset($post['newsletter']) ? $post['newsletter'] : NEWSLETTER_NAO_RECEBE;
			$u->cep				= $post['cep'];
				
			if( !$u->save() ) { // error on update
	
				if ( $u->valid ) { // validation ok; database error on insert or update
	
					$data['msg'] = '<strong>Erro na gravação no banco de dados.</strong><br />Tente novamente e, se o problema persistir, notifique o administrador do sistema.';
					$data['msg_type'] = 'alert-error';
	
				} else { // validation error
	
					$data['msg'] = $u->error->string;
					$data['msg_type'] = 'alert-error';
	
				}
					
			} else { // success
	
				$data['msg'] = 'Dados atualizados com sucesso.';
				$data['msg_type'] = 'alert-success';
	
			}
	
		}
			
		$data['u'] = $u;
		$data['currUser'] = $this->uRole;
		$data['title'] = 'Edição de Usuário';
		$this->load->view('usuario_editar', $data);

	}
        
        public function trocar_senha(){
            if (! isset($this->uRole) || ($this->uRole == CREDENCIAL_USUARIO_COMUM && $this->session->userdata('id') != $this->uri->segment(3)))
			redirect('main');
        
            $id = $this->uri->segment(3);

            if ($this->uri->segment(3) == 'index'){
                redirect('main');
            }
            if ($this->input->post(NULL,TRUE)) {

                $post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter

                $user->senha = md5($post['senha_atual']);

                $senhaBD = new Usuario();
                $senhaBD->where('id',$id);
                $senhaBD->get();
                
                //compara se a senha digitada é a mesma do banco de dados.
                if($user->senha == $senhaBD->senha){

                    $user->senha_nova = md5($post['nova_senha']);
                    $user->conf_senha = md5($post['conf_senha']);
                    //compara se a senha digitada no campo 'senha atual' é a mesma da senha digitada no campo 'redigite a senha'
                    if($user->senha_nova == $user->conf_senha){
                        $usuario = new Usuario();
                        $usuario->where('id',$id)->update('senha', $user->senha_nova);
                        $usuario->get();
                        $data['msg'] = 'Senha atualizado com sucesso!';
                        $data['msg_type'] = 'alert-success';
                        $this->load->view('usuario_trocar_senha', $data);

                        }else {
                            $data['msg'] = 'Senha digitada não confere com a confirmação de senha';
                            $data['msg_type'] = 'alert-error';
                            $this->load->view('usuario_trocar_senha', $data);
                            
                        }

                    }else {

                        $data['msg'] = 'Senha digitada não confere com a senha atual';
                        $data['msg_type'] = 'alert-error';
                        $this->load->view('usuario_trocar_senha', $data);

                    }
            }else{
                $id = $this->uri->segment(3);
                $this->load->view('usuario_trocar_senha', $id);
            }
    }
    
    public function mudar_status(){
            //Colocar a regra de que um ADMIN não pode alterar o status de um SUPERADMIN
            $ids = $this->uri->segment(3);
            $id = explode('_', $ids);
            
            $option = $this->uri->segment(4);
            $erros = 0;
            
            $u = new Usuario();
           switch($option){
                case STATUS_USUARIO_EXCLUIDO:
                    if($this->uRole == CREDENCIAL_USUARIO_SUPERADMIN){
                        !($u->where_in('id',$id)->update('status', $option)) ? $erros++ : NULL;
                        
                    }else{
                        $data['msg'] = 'Sem permissão para excluir este usuário';
                        $data['msg_type'] = 'alert-error';
                    }
                break;
                
                case STATUS_USUARIO_BLOQUEADO:
                    !($u->where_in('id',$id)->update('status', $option)) ? $erros++ : NULL;
                break;
                    
                case STATUS_USUARIO_ATIVO:
                    !($u->where_in('id',$id)->update('status', $option)) ? $erros++ : NULL;
                break;
                
                case STATUS_USUARIO_INATIVO:
                    !($u->where_in('id',$id)->update('status', $option)) ? $erros++ : NULL;
                break;
                
            }
            if($erros > 0){
                $data['msg'] = 'Erro ao atualizar dados';
                $data['msg_type'] = 'alert-error';
            }else{
                $data['msg'] = 'Dados atualizados com sucesso!';
                $data['msg_type'] = 'alert-success';
            };
            redirect(base_url('usuarios/listar', $data));
    }   
    
    public function mudar_credencial(){
        
        $option = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        
        $u = new Usuario();
        $erros = 0;
        switch($option){
                case CREDENCIAL_USUARIO_COMUM:
                    !($u->where_in('id',$id)->update('credencial', $option)) ? $erros++ : NULL;
                    break;
                
                case CREDENCIAL_USUARIO_ADMIN:
                    !($u->where_in('id',$id)->update('credencial', $option)) ? $erros++ : NULL;
                    break;
                    
                case CREDENCIAL_USUARIO_SUPERADMIN:
                    !($u->where_in('id',$id)->update('credencial', $option)) ? $erros++ : NULL;
                    break;
                      
                default:
                    redirect(base_url('usuarios/listar')); 
                    break;
            }
            if($erros > 0){
                $data['msg'] = 'Erro ao atualizar dados';
                $data['msg_type'] = 'alert-error';
            
            }else{
                $data['msg'] = 'Dados atualizados com sucesso.';
                $data['msg_type'] = 'alert-success';
                redirect(base_url('usuarios/listar',$data));
            }
    }
    public function lembrete_senha(){
            if($this->input->post(NULL, TRUE)){
                $post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
                
                $lembrete = $post['lembrete_senha'];
                                
                //CRIANDO SENHA ALEATÓRIA
                $CaracteresAceitos = 'abcdefghijklmnopqrstxywzABCDEFGHIJKLMNOPQRSTZYWZ0123456789'; 
                $max = strlen($CaracteresAceitos)-1;
                $password = null;
                
                for($i=0; $i < 8; $i++) { 
                   $password .= $CaracteresAceitos{mt_rand(0, $max)}; 
                }
                
                $pass = md5($password);

                $username = new Usuario();
                $user_Email = new Usuario();
                
                $username->select('username, nome, email, senha')->where('username', $lembrete)->get();
                
                $user_Email->select('username, nome, email, senha')->where('email', $lembrete)->get();
                
                //VERIFICA SE A INFORMAÇÃO DIGITADA EXISTE NO BANCO DE DADOS
                if($username->username != $lembrete && $user_Email->username != $lembrete && $username->email != $lembrete && $user_Email->email != $lembrete){
                    $data['msg'] = 'Informação digitada não confere no banco de dados.<br>Por favor, verifique se seu nome de usuário ou e-mail foi digitado corretamente.';
                    $data['msg_type'] = 'alert-error';
                }else{
                    
                    $erros = 0;
                    !($username->where('username',$lembrete)->update('senha', $pass)) ? $erros++ : NULL;
                    !($user_Email->where('email',$lembrete)->update('senha', $pass)) ? $erros++ : NULL;

                    if($erros > 0){
                        $data['msg'] = 'Erro ao atualizar dados';
                        $data['msg_type'] = 'alert-error';
                    }else{

                    //ENVIANDO EMAIL COM A SENHA NOVA
                    $this->load->library('email');

                     $this->email->from(EMAIL_FROM, EMAIL_NAME);
                     $this->email->to($username->email.$user_Email->email);

                     $this->email->subject('Nova senha para acesso ao CEFAP');
                     $this->email->message('Olá, ' .$username->nome.$user_Email->nome. '! Criamos uma nova senha de acesso ao sistema.<br><br><strong>Seu nome de usuário é:</strong> '.$username->username.$user_Email->username.'<br><strong>Sua nova senha é:</strong> '. $password.'<br><br> Acesse o sistema através do link e mude sua senha no primeiro acesso: <a href="' .base_url('main'). '">clique aqui</a>.');

                     $this->email->send();
                     
                     // MENSAGEM DE SUCESSO EXIBIDA NA VIEW
                     $data['msg'] = 'Senha alterada com sucesso! Por favor, verifique seu email cadastrado para obter a nova senha.';
                     $data['msg_type'] = 'alert-success';
                };
            }
        }
        $data['title'] = "Lembre de Senha";
        $this->load->view('usuario_lembrete_senha', $data);
    }
    
    public function dados_pessoais(){
        
        $id = $this->uri->segment(3);
        
        $user = new Usuario();
        $user->where('id', $id);
        $user->get();
            
        $data['user'] = $user;
        
        $this->load->view('usuario_dados_pessoais', $data);
    }
    
    public function login() {
        
            // Create user object
        $u = new Usuario();
		$post = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $post['username'];
        $u->senha	 = md5($post['senha']);

        // Attempt to log user in with the data they supplied, using the login function setup in the User model
        // You might want to have a quick look at that login function up the top of this page to see how it authenticates the user
        if ($u->login()) {
        	$data['msg'] = 'Bem-vindo, ' .$u->username. '!';
        	$data['msg_type'] = 'alert-success';
                
        	$userdata = array(
        			'id'		=> $u->id,
        			'username'      => $u->username,
        			'email'         => $u->email,
                                'credencial'    => $u->credencial,
        			'logged_in'     => TRUE
        	);
        	
        	$this->session->set_userdata($userdata);
                redirect('main');   
        }else{
            $data['msg'] = 'Usuário ou senha Incorretos.';
            $data['msg_type'] = 'alert-error';
            
            $this->load->view('inicial', $data); 
        }
        
        
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('main');
    }

}
?>
