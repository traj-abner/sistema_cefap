<?php
class Mensagem extends Datamapper{
    
    public $model = 'mensagem';
    public $table = 'mensagens';
    
    public $has_one = array(
        'from'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'msgs_enviadas'
         ),
        
        'to'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'msgs_recebidas'
         ),
    );
    
    public $has_many = array();
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
