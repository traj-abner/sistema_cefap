<?php
class Log extends Datamapper{
    
    public $model = 'log';
    
    public $has_one = array(
        'usuario'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'logs'
         ),
        
        'facility'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'facility',			// This relationship is with the model class 'book'
                'other_field'   => 'logs'
         ),
    );
    
    public $has_many = array();
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
