<?php

class Geral extends CI_Controller{
    
   public function __constructor(){
        
        parent::__constructor();
        
    }
    
	public function checar_cpf()
	{
		$cpf = $_GET["cpf"];
		$cpf = str_replace(".", "" ,$cpf);
		$cpf = str_replace("-", "" ,$cpf);
		if(check_cpf($cpf)) echo 'ok';
		else echo 'erro';
	}
	
    public function index(){
        
        
    }
        
    public function construir_menu_superior(){
        
        
    }
    
    public function construir_menu(){
        
        
    }
    
    public function dashboard(){
        
        
    }
    
    public function incio(){
        
        
    }
    
    public function ajuda(){
        
        
    }
    
    public function ajuda_editar(){
        
        
    }
    
    public function ajuda_ver(){
        
        
    }
    
    public function limpar_dados(){
        
        
    }
    

}
?>
