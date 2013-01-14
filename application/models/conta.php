<?php
class Conta extends Datamapper{
    
    public $model = 'conta';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array(
        'usuario'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'conta'
         )
    );
    
    public $has_many = array();
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
