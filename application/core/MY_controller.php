<?php

class MY_Controller extends CI_Controller {
   
    protected $currUser;     # usuário acessando o sistema
   
    public function __construct()
    {
        parent::__construct();
        $this->currUser = new Usuario();
        // if user is logged in...
        if ( $this->session->userdata('logged_in')) {
            $this->currUser->where('id', $this->session->userdata('id'))->get();
        }
   
    }
   
}

?>