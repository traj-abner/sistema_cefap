<?php
class Formulario extends Datamapper{
    
    public $model = 'formulario';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array(
        'autor'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'formularios'
         )
    );
    
    public $has_many = array(
        'respostas'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'resposta',			// This relationship is with the model class 'book'
                'other_field'   => 'formularios'
         ),
        
        'facilities'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'facility',			// This relationship is with the model class 'book'
                'other_field'   => 'formularios'
         ),
        
        'campos'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'campo',			// This relationship is with the model class 'book'
                'other_field'   => 'formularios'
         )
    );
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
