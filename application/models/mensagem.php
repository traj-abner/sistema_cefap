<?php
class Mensagem extends Datamapper{
    
    public $model = 'mensagem';
    public $table = 'mensagens';
    
    public $has_one = array(
        'from'      => array(			// in the code, we will refer to this relation by using the object name 'book'
                'class'         => 'usuario',			// This relationship is with the model class 'book'
                'other_field'   => 'mensagem'
         )
    );
    
    public $has_many = array(
		'usuario' => array(
			'class' => 'usuario',
			'other_field' => 'mensagem',
			'join_self_as' => 'mensagem',
			'join_other_as' => 'usuario',
			'join_table' => 'mensagens_usuarios'
		),
	);
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
