<?php
class Relatorio extends Datamapper{
    
    public $model = 'relatorio';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array(
        'autor'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'relatorios'
         )
    );
    
    public $has_many = array();
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
