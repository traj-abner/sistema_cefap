<?php
class Lancamento extends Datamapper{
    
    public $model = 'lancamento';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array(
            'usuario'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class'         => 'usuario',			// This relationship is with the model class 'book'
                    'other_field'   => 'lancamentos'
             ),
        
            'boleto' => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class' => 'boleto',			// This relationship is with the model class 'book'
                    'other_field' => 'lancamentos'
              ),
                            
            'autor' => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class' => 'usuario',			// This relationship is with the model class 'book'
                    'other_field' => 'lancamentos_criados'
              ),
                
            'cancelamento_autor' => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class' => 'usuario',			// This relationship is with the model class 'book'
                    'other_field' => 'lancamentos_cancelados'
              ),
        
        );
    
   public $has_many = array();
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>