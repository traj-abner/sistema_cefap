<?php
class Campo extends Datamapper{
    
    public $model = 'campo';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array();
    
    public $has_many = array(
        'formularios'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'formulario',			// This relationship is with the model class 'book'
                'other_field'   => 'campos'
         ),
    );
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
