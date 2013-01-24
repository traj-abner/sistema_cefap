<?php
class Lancamento extends Datamapper{
    
    public $table = 'lancamentos';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array(
            'usuario'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class'         => 'usuario',			// This relationship is with the model class 'book'
                    'other_field'   => 'lancamento'
             ),
        
            'boleto' => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class' => 'boleto',			// This relationship is with the model class 'book'
                    'other_field' => 'lancamento'
              ),
                            
            'autor' => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class' => 'usuario',			// This relationship is with the model class 'book'
                    'other_field' => 'lancamentos_criados'
              ),
                
            'cancelamento_autor' => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class' => 'usuario',			// This relationship is with the model class 'book'
                    'other_field' => 'lancamentos_cancelados'
              ),
        	'facility' => array(			
                    'class' => 'facility',			
                    'other_field' => 'lancamento'
              ),
        );
    
   public $has_many = array();
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
