<?php
class Boleto extends Datamapper{
    
   public $model = 'boleto';
    
   public $has_one = array(
        'usuario'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'boletos'
         )
        
        );
    
   public $has_many = array(
        'lancamentos'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'lancamento',			// This relationship is with the model class 'book'
                'other_field'   => 'boleto'
         )
    );
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
