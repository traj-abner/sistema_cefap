<?php
class Agendamento extends Datamapper{
    
    public $model = 'agendamento';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array(
        'usuario'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'agdms'
         ),
        
        'aprovado_por'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'agdms_aprovados'
         ),
        
        'projeto'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'projeto',			// This relationship is with the model class 'book'
                'other_field'   => 'agendamentos'
         ),
        
        'facility'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'facility',			// This relationship is with the model class 'book'
                'other_field'   => 'agendamentos'
         )
    );
    
    public $has_many = array();
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
