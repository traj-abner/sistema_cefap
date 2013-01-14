<?php
class Backup extends Datamapper{
    
    public $model = 'backup';
    
    public $has_one = array(
        
    );
    
    public $has_many = array(
        'emails'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'backup_email',			// This relationship is with the model class 'book'
                'other_field'   => 'backup'
         )
    );
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
