<?php
class Periodo extends Datamapper{
    
    public $model = 'periodo';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array(
        
        'autor'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'periodos'
         ),
        
        'facility'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'facility',			// This relationship is with the model class 'book'
                'other_field'   => 'periodos'
         )
    );
    
    public $has_many = array();
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
